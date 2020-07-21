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
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();

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
            $data['title'] = 'Modul Praktikum';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('praktikan/modul', $data);
            $this->load->view('template/footer');
        } else {
            $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
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
        $host    = "10.122.10.19";
        $port    = 1000;
        $port2    = 1001;
        //echo "Message To server :" . $message;
        // create socket
        $data['result2'] = NULL;
        $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        $socket2 = socket_create(AF_INET, SOCK_STREAM, 0);
        if ($socket || $socket2) {
            // connect to server    
            $result = socket_connect($socket, $host, $port);
            $result2 = socket_connect($socket2, $host, $port2);
            if ($result || $result2) {
                if ($this->input->post('aksi')) {
                    if ($this->input->post('aksi') == 'data') {
                        $message = "[" . $this->input->post('var') . "," . "500" . "]";
                    } elseif ($this->input->post('aksi') == 'jatuhkan') {
                        $message = "[c,320]";
                    }
                    if (socket_write($socket, $message, strlen($message))) {
                        $result2 = socket_read($socket2, 1024);
                        $result2 = htmlspecialchars($result2);
                        if ($result2) {
                            $data['result2'] = $result2;
                            $id = $this->input->post('id');
                        } else {
                            echo "<script>alert('Tidak dapat membaca respon dari server!');
                            window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
                        }
                    } else {
                        echo "<script>alert('Tidak dapat mengirim data ke server!');
                    window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
                    }
                }
            } else {
                echo "<script>alert('Tidak dapat terhubung ke server!');
                window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
            }
        } else {
            echo "<script>alert('Gagal membuat socket!');
            window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
        }
        $data['title'] = 'Percobaan Praktikum';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('praktikan/percobaan', $data);
        $this->load->view('template/footer');
    }
}
