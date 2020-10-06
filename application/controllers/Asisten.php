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
    $this->load->model('Asisten_model');
    $data['title'] = 'Penilaian';
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['list'] = $this->Asisten_model->TampilNilai();
    $i = 0;
    while ($i < count($data['list'])) {
      $asisten = $data['list'][$i]['asisten'];
      if ($asisten) {
        $nama = $this->db->query("SELECT `name` FROM `user` WHERE `nrp`= $asisten")->row_array();
        $data['list'][$i]['asisten'] = $nama['name'];
      }
      $i++;
    }

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/index', $data);
    $this->load->view('template/footer');
  }

  public function kelompok()
  {
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Pembagian Kelompok';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/kelompok', $data);
    $this->load->view('template/footer');
  }

  public function jadwal()
  {
    $this->load->model('Asisten_model');
    $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/asisten/jadwal';
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

    $data['start'] = $this->uri->segment(3);
    if ($data['start'] == null) {
      $data['start'] = 0;
    }

    if ($this->input->post('keyword1')) {
      $data['keyword'] = $this->input->post('keyword1');
      $this->session->set_userdata('keyword1', $data['keyword']);
      $config['per_page'] = 10;
      $config['total_rows'] = $this->db->count_all_results();
    } else {
      $data['keyword'] = $this->session->userdata('keyword1');
      $config['per_page'] = 10;
      $config['total_rows'] = $this->Asisten_model->JumlahJadwal();
    }
    $this->pagination->initialize($config);

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Jadwal Praktikum';
    $data['modul'] = $this->db->get('modul')->result_array();
    $data['list'] = $this->Asisten_model->TampilJadwal($config['per_page'], $data['start'], $data['keyword']);
    $data['req'] = $this->Asisten_model->TampilReqJadwal();
    if ($this->input->post('keyword2')) {
      $data['req'] = $this->Asisten_model->CariReqJadwal();
    }
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/jadwal', $data);
    $this->load->view('template/footer');
  }

  public function getubahnilai()
  {
    $this->load->model('Asisten_model');
    echo json_encode($this->Asisten_model->TampilNilaiPraktikan($this->input->post('id')));
  }

  public function editnilai()
  {
    $data = [
      'nilai' => $this->input->post('nilai', true),
      'asisten' => $this->session->userdata('nrp')
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('nilai', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Nilai berhasil diubah!
          </div>');
    redirect(base_url('asisten'));
  }
}
