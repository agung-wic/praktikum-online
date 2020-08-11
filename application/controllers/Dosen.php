<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $this->load->model('Dosen_model');
    $data['title'] = 'Nilai Praktikum';
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['list'] = $this->Dosen_model->TampilNilai();
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
    $this->load->view('dosen/index', $data);
    $this->load->view('template/footer');
  }

  public function modul()
  {
    $this->load->model('Dosen_model');
    $data['modul'] = $this->db->get('modul')->result_array();
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Modul Praktikum';
    $data['list'] = $this->Dosen_model->TampilModul();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dosen/modul', $data);
    $this->load->view('template/footer');
  }

  public function editmodul()
  {
    $data = [];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('modul', $data);
    $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Modul berhasil diubah!
        </div>');
    redirect(base_url('dosen/modul'));
  }

  public function tambahmodul()
  {
    $data = [];

    $this->db->insert('modul', $data);
    $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Modul berhasil ditambahkan!
        </div>');
    redirect(base_url('dosen/modul'));
  }

  public function deletemodul($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('modul');
    $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Jadwal berhasil dihapus!
        </div>');
    redirect(base_url('dosen/modul'));
  }

  public function accnilai($id)
  {
    $data = [
      'is_acc' => 1
    ];

    $this->db->where('id', $id);
    $this->db->update('nilai', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Nilai berhasil disetujui!
          </div>');
    redirect(base_url('dosen'));
  }

  public function getubahnilai()
  {
    $this->load->model('Dosen_model');
    echo json_encode($this->Dosen_model->TampilNilaiPraktikan($this->input->post('id')));
  }

  public function editnilai()
  {
    $data = [
      'nilai' => $this->input->post('nilai', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('nilai', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Nilai berhasil diubah!
          </div>');
    redirect(base_url('dosen'));
  }
}
