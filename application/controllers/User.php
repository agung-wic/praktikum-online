<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Praktikum Online';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $this->load->view('user/index', $data);
    }
}
