<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asisten extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Nilai Praktikum';
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dosen/index', $data);
    $this->load->view('template/footer');
  }
}
