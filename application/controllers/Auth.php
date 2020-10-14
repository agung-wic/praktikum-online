<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect(base_url('profil'));
        } else {
            $this->form_validation->set_rules('nrp', 'NRP', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('template/auth_header.php', $data);
                $this->load->view('auth/login.php');
                $this->load->view('template/auth_footer.php');
            } else {
                //VALIDASI BERHASIL
                $this->_login();
            }
        }
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect(base_url('profil'));
        } else {
            $this->form_validation->set_rules('nrp', 'NRP', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('template/auth_header.php', $data);
                $this->load->view('auth/login.php');
                $this->load->view('template/auth_footer.php');
            } else {
                //VALIDASI BERHASIL
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $nrp = $this->input->post('nrp');
        $Password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nrp' => $nrp])->row_array();

        if ($user) {
            if (!$user['email']) {
                if ($Password == $user['password']) {
                    redirect('auth/addemail/' . $nrp);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!!</div>');
                    redirect('auth');
                }
            } else if ($user['password'] == "123") {
                if ($Password == $user['password']) {
                    redirect('auth/addpassword/' . $nrp);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!!</div>');
                    redirect('auth');
                }
            } else {
                if ($user['is_active'] == 1) {
                    if (password_verify($Password, $user['password'])) {
                        $data = [
                            'nrp' => $user['nrp'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'id' => $user['id'],
                            'is_online' => 1
                        ];
                        $this->db->where('nrp', $user['nrp']);
                        $this->db->update('user', $data);
                        $this->session->set_userdata($data);
                        redirect(base_url('profil'));
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum di aktivasi!</div>');
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function addemail()
    {
        if ($this->session->userdata('email')) {
            redirect(base_url('profil'));
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'Email sudah terdaftar!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'min_length' => 'Password minimal 6 karakter!',
                'matches' => 'Password salah!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Daftarkan Email & Ubah Kata Sandi';
                $this->load->view('template/auth_header.php', $data);
                $this->load->view('auth/addemail.php');
                $this->load->view('template/auth_footer.php');
            } else {
                $nrp = $this->input->post('nrp', true);
                $data = [
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 8,
                    'is_active' => 0,
                    'date_created' => time()
                ];
                $this->db->where('nrp', $nrp);
                $this->db->update('user', $data);

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email', true),
                    'token' => $token,
                    'date_created' => time()
                ];

                $user = $this->db->get_where('user', ['nrp' => $nrp])->row_array();

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'verify', $user);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Selamat! Akun berhasil dibuat. Silakan periksa email untuk aktivasi!
                                            </div>');
                redirect(base_url('auth/login'));
            }
        }
    }

    public function addpassword()
    {
        if ($this->session->userdata('password1') == "123") {
            redirect(base_url('profil'));
        } else {
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'min_length' => 'Password minimal 6 karakter!',
                'matches' => 'Password salah!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Ubah Kata Sandi';
                $this->load->view('template/auth_header.php', $data);
                $this->load->view('auth/addpassword.php');
                $this->load->view('template/auth_footer.php');
            } else {
                $nrp = $this->input->post('nrp', true);
                $data = [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 7,
                    'is_active' => 0,
                    'date_created' => time()
                ];
                $user = $this->db->get_where('user', ['nrp' => $nrp])->row_array();
                // $this->db->where('nrp', $nrp);
                // $this->db->update('user', $data);
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $user['email'],
                    'token' => $token,
                    'date_created' => time()
                ];
                var_dump($user_token);
                die;
                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'verify', $user);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Selamat! Akun berhasil dibuat. Silakan periksa email untuk aktivasi!
                                            </div>');
                redirect(base_url('auth/login'));
            }
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect(base_url('profil'));
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('nrp', 'NRP', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'Email sudah terdaftar!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'min_length' => 'Password minimal 6 karakter!',
                'matches' => 'Password salah!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Formulir Pendaftaran Praktikum';
                $this->load->view('template/auth_header.php', $data);
                $this->load->view('auth/registration.php');
                $this->load->view('template/auth_footer.php');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'nrp' => htmlspecialchars($this->input->post('nrp', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 8,
                    'is_active' => 0,
                    'date_created' => time()
                ];
                // token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email', true),
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user', $data);
                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'verify', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun berhasil dibuat. Silakan periksa email untuk aktivasi!
            </div>');
                redirect(base_url('auth/login'));
            }
        }
    }

    private function _sendEmail($token, $type, $data = NULL)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'fisikadasar001@gmail.com',
            'smtp_pass' => '1234asdf!@#$ASDF',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('fisikadasar001@gmail.com', 'Praktikum Fisika Dasar');
        $this->email->to($this->input->post('email', true));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('
            <head>
                <style>
                    section {
                        margin-top: 20px;
                        margin-left: auto;
                        margin-right: auto;
                        background-color: #f6f6f6;
                        padding: 20px;
                        width: 30%;
                        border-top-left-radius: 25px;
                        border-top-right-radius: 25px;
                        border-bottom-left-radius: 25px;
                        border-bottom-right-radius: 25px;
                    }
                    .wrapper h4 {
                        color: #270d10;
                        font-weight: bold;
                    }
                    .wrapper p {
                        color: #5d4e4f;
                    }
                    .wrapper button {
                        display: block;
                        margin: auto;
                        padding-left: 30px;
                        padding-right: 30px;
                        border-top-left-radius: 25px;
                        border-top-right-radius: 25px;
                        border-bottom-left-radius: 25px;
                        border-bottom-right-radius: 25px;
                    }
                </style>
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            </head>
            <section class="content">
                <div class="wrapper">
                    <h4>Verifikasi Akun E-Mail</h4>
                    <hr>
                    <p>Halo <strong>' . $data['name'] . '</strong>,</p>
                    <p>Terimakasih telah membuat akun di https://riset.its.ac.id/praktikum-fisdas/. Klik tombol dibawah ini untuk
                        memverifikasi akun email
                        anda.</p>
                    <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" target="_blank" style="display: inline-block; color: #ffffff; background: linear-gradient(
                        40deg,
                        rgba(111, 140, 252, 1) 8%,
                        rgba(47, 200, 201, 1) 100%
                    ); border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db; ">Konfirmasi</a>
                    <p style="font-size:10px;">Jika anda mengalami kesulitan dalam melakukan klik tombol "Konfirmasi", silakan salin link ini pada browser anda:<strong> ' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '</strong></p>
                </div>
            </section>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script>
            </body>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('
            <head>
                <style>
                    section {
                        margin-top: 20px;
                        margin-left: auto;
                        margin-right: auto;
                        background-color: #f6f6f6;
                        padding: 20px;
                        width: 30%;
                        border-top-left-radius: 25px;
                        border-top-right-radius: 25px;
                        border-bottom-left-radius: 25px;
                        border-bottom-right-radius: 25px;
                    }
                    .wrapper h4 {
                        color: #270d10;
                        font-weight: bold;
                    }
                    .wrapper p {
                        color: #5d4e4f;
                    }
                    .wrapper button {
                        display: block;
                        margin: auto;
                        padding-left: 30px;
                        padding-right: 30px;
                        border-top-left-radius: 25px;
                        border-top-right-radius: 25px;
                        border-bottom-left-radius: 25px;
                        border-bottom-right-radius: 25px;
                    }
                </style>
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            </head>
            <section class="content">
                <div class="wrapper">
                    <h4>Konfirmasi Perubahan Kata Sandi</h4>
                    <hr>
                    <p>Halo <strong>' . $data['name'] . '</strong>,</p>
                    <p>Klik tombol dibawah ini untuk mengatur ulang kata sandi anda.</p>
                    <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" target="_blank" style="display: inline-block; color: #ffffff; background: linear-gradient(
                        40deg,
                        rgba(111, 140, 252, 1) 8%,
                        rgba(47, 200, 201, 1) 100%
                    ); border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db; ">Atur Ulang</a>
                    <p style="font-size:10px;">Jika anda mengalami kesulitan dalam melakukan klik tombol "Atur Ulang", silakan salin link ini pada browser anda: <strong>' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '</strong></p>
                    </div>
            </section>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script>
            </body>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->db->set('is_active', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Akun sudah teraktivasi! Silakan masuk.
                </div>');
                redirect(base_url('auth'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! Token tidak valid.
                </div>');
                redirect(base_url('auth'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! Email salah.
            </div>');
            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $nrp = $this->session->userdata('nrp');
        $user = $this->db->get_where('user', ['nrp' => $nrp])->row_array();
        $data = [
            'is_online' => 0
        ];
        $this->db->where('nrp', $user['nrp']);
        $this->db->update('user', $data);
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nrp');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout berhasil!</div>');
        redirect('auth');
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('template/auth_footer', $data);
        } else {
            $email = $this->input->post('email', true);
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot', $user);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Silakan periksa email untuk mengatur ulang kata sandi!
                </div>');
                redirect(base_url('auth/forgotpassword'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar ataupun teraktivasi!
                </div>');
                redirect(base_url('auth/forgotpassword'));
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Atur ulang kata sandi gagal! Token tidak valid.
                </div>');
                redirect(base_url('auth/login'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Atur ulang kata sandi gagal! Email salah.
                </div>');
            redirect(base_url('auth/login'));
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect(base_url('auth'));
        }
        $data['title'] = 'Ubah Kata Sandi';

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('template/auth_footer', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Kata sandi berhasil diubah! Silakan masuk.
                </div>');
            redirect(base_url('auth/login'));
        }
    }

    public function denied()
    {
        $data['title'] = 'Access Denied';
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/denied');
    }
}
