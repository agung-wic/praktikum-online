<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('Praktikan_model');
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['pengumuman'] = $this->Praktikan_model->TampilPengumuman();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/index', $data);
        $this->load->view('template/footer');
    }

    public function modul($id = NULL)
    {
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        if (!$id) {
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $this->db->order_by('modul_id', 'ASC');
            $data['status'] = $this->db->get('jadwal')->result_array();
            $data['title'] = 'Modul Praktikum';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('praktikan/modul', $data);
            $this->load->view('template/footer');
        } else {
            $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
            $this->db->where('modul_id', $id);
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $data['status'] = $this->db->get('jadwal')->row_array();

            $data['title'] = 'Modul Praktikum';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('praktikan/content', $data);
            $this->load->view('template/footer');
        }
    }

    public function percobaan($id = NULL)
    {
        $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $this->db->where('modul_id', $id);
        $cek = $this->db->get('jadwal')->row_array();
        $jadwal = strtotime($cek['jadwal']);
        $batas = strtotime($data['modul']['time']);
        $time = (date('H', $batas) * 60 * 60) + (date('i', $batas) * 60) + date('s', $batas);
        if ((time() >= $jadwal) && ((time() <= ($jadwal + $time)))) {
            if ($cek['status'] == 0) {
                $this->_connectsocket($id);
                $data['output'] = NULL;

                $data['title'] = 'Percobaan Praktikum';
                $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();

                $this->db->select('*');
                $this->db->from('jadwal');
                $this->db->where('nrp', $this->session->userdata('nrp'));
                $this->db->where('modul_id', $id);
                $data['jadwal'] = $this->db->get()->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('praktikan/percobaan', $data);
                $this->load->view('template/footer');
            } else {
                redirect(base_url('praktikan/modul/') . $id);
            }
        } else {
            redirect(base_url('praktikan/modul/') . $id);
        }
    }

    public function selesai($id)
    {
        $data = ['status' => 1];
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $this->db->where('modul_id', $id);
        $this->db->update('jadwal', $data);
        redirect(base_url('praktikan/modul'));
    }

    public function laporan()
    {
        $this->load->model('Praktikan_model');
        $data['title'] = 'Unggah Laporan';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['modul'] = $this->Praktikan_model->TampilModulLaporan($this->session->userdata('nrp'));

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/laporan', $data);
        $this->load->view('template/footer');
    }

    public function uploadlaporan()
    {
        $file = $_FILES['filelaporan']['name'];
        $data['nilai'] = $this->db->get_where('nilai', ['modul' => $this->input->post('modul_id', true)])->row_array();
        if ($data['nilai']['laporan']) {

            $config['upload_path'] = './assets/laporan/';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('filelaporan')) {
                $old_laporan = $data['nilai']['laporan'];
                unlink(FCPATH . 'assets/laporan/' . $old_laporan);
                $new_laporan = $this->upload->data('file_name');

                $this->db->set('laporan', $new_laporan);
                $this->db->where('modul', $this->input->post('modul_id'));
                $this->db->update('nilai');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   Laporan modul berhasil diubah!
                    </div>');
                redirect(base_url('praktikan/laporan'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect(base_url('praktikan/laporan'));
            }
        } else {
            $config['upload_path'] = './assets/laporan/';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('filelaporan')) {
                $nilai = [
                    "nrp" => $this->session->userdata('nrp'),
                    "modul" => $this->input->post('modul_id'),
                    "laporan" => $file,
                    "laporan_time" => time(),
                    "is_acc" => 0
                ];
                $this->db->insert('nilai', $nilai);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Laporan praktikum berhasil diunggah!
                </div>');
                redirect(base_url('praktikan/laporan'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect(base_url('praktikan/laporan'));
            }
        }
    }

    public function getubahlaporan()
    {
        echo json_encode($this->db->get_where('nilail', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahjadwal()
    {
        $this->load->model('Praktikan_model');
        echo json_encode($this->Praktikan_model->TampilJadwalPraktikan());
    }

    private function _connectsocket($id = NULL)
    {
        $host    = "10.122.10.43";
        $port    = 1800;
        $port2    = 1801;
        //echo "Message To server :" . $message;
        // create socket
        $socket1 = socket_create(AF_INET, SOCK_STREAM, 0);
        $socket2 = socket_create(AF_INET, SOCK_STREAM, 0);

        $socket = [$socket1, $socket2];
        $data['result2'] = NULL;
        if ($socket1 && $socket2) {
            // connect to server    
            $result1 = socket_connect($socket1, $host, $port);
            $result2 = socket_connect($socket2, $host, $port2);

            $result = [$result1, $result2];
            if ($result1 || $result2) {
                $success = [$socket, $result];
                return $success;
            } else {
                echo "<script>alert('Tidak dapat terhubung ke server!');
                window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
            }
        } else if ($socket1) {
            // connect to server    
            $result1 = socket_connect($socket1, $host, $port);
            $success = [$socket, $result1];
            return $success;
        } else {
            echo "<script>alert('Gagal membuat socket!');
            window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
        }
    }

    private function _sendsocket($socket1, $socket2, $message, $id)
    {
        if (socket_write($socket1, $message, strlen($message))) {
            $result2 = socket_read($socket2, 1024);
            $result2 = htmlspecialchars($result2);
            if ($result2) {
                return $result2;
            } else {
                echo "<script>alert('Tidak dapat membaca respon dari server!');
                    window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
            }
        } else {
            echo "<script>alert('Tidak dapat mengirim data ke server!');
            window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
        }
    }

    public function getpercobaan()
    {
        $connect = $this->_connectsocket();
        $hasil = $this->_sendsocket($connect[0][0], $connect[0][1], $this->input->post('kirim'), $this->input->post('id'));
        if ($hasil) {
            echo json_encode($hasil);
        } else {
            echo json_encode("Halo");
        }
    }

    public function jadwal()
    {
        $this->load->model('Praktikan_model');

        $config['base_url'] = 'http://localhost/fisdas/praktikan/jadwal';
        $config['total_rows'] = $this->Praktikan_model->JumlahJadwal($this->session->userdata('nrp'));
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<nav aria-label="..."> <ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</li></a>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        if ($data['start'] == null) {
            $data['start'] = 0;
        }

        $data['title'] = 'Jadwal Praktikum';

        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['list'] = $this->Praktikan_model->JadwalPraktikan($this->session->userdata('nrp'), $config['per_page'], $data['start']);
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['total'] = $this->Praktikan_model->JumlahJadwal($this->session->userdata('nrp'));
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/jadwal', $data);
        $this->load->view('template/footer');
    }

    public function reqjadwal()
    {
        $data = [
            "nrp" => $this->input->post('nrp'),
            "modul_id" => $this->input->post('modul'),
            "jadwal_old" => $this->input->post('jadwal_old'),
            "jadwal_new" => $this->input->post('jadwal_new'),
            "ket" => $this->input->post('ket'),
            "is_approved" => 0
        ];

        $this->db->insert('req_jadwal', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengajuan jadwal sukses! Silakan menunggu persetujuan dari Admin.
          </div>');
        redirect(base_url('praktikan/jadwal'));
    }

    public function penilaian()
    {
        $this->load->model('Praktikan_model');
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['list'] = $this->Praktikan_model->PenilaianPraktikan($this->session->userdata('nrp'));
        $this->load->helper('download');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/penilaian', $data);
        $this->load->view('template/footer');
    }
}
