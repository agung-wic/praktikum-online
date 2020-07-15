<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
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

    private function _login()
    {
        $nrp = $this->input->post('nrp');
        $Password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nrp' => $nrp])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($Password, $user['password'])) {
                    $data = [
                        'nrp' => $user['nrp'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_Userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum di aktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
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
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun berhasil terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout berhasil!</div>');
        redirect('auth');
    }

    public function forgotpassword()
    {
        $data['title'] = 'Lupa Kata Sandi';
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header.php', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('template/auth_footer.php');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                #KIRIM EMAIL
                redirect('auth/changepassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email salah</div>');
            }
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $this->load->view('template/auth_header.php', $data);
        $this->load->view('auth/change-password');
        $this->load->view('template/auth_footer.php');
    }
}
