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
        $host    = "192.168.43.56";
        $port    = 25003;
        $message = "Hello Server";
        echo "Message To server :" . $message;
        // create socket
        $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        if (!$socket) {
            echo "<script>alert('Gagal membuat socket!');
            window.location.href=" . base_url() . "'/praktikan/modul/" . $id . "';</script>";
        }
        // connect to server
        $result = socket_connect($socket, $host, $port);
        if (!$result) {
            echo "<script>alert('Tidak dapat terhubung ke server!');
            window.location.href=" . base_url() . "'/praktikan/modul/" . $id . "';</script>";
        }
        // send string to server
        socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        // get server response
        $result = socket_read($socket, 1024) or die("Could not read server response\n");
        echo "Reply From Server  :" . $result;
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
