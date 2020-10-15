<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role_id'] = $this->db->get_where('user_role', ['id' => $data['user']])->row_array();
    var_dump($data['role_id']);
    die;
    $data['title'] = 'Profil Saya';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('profil/index', $data);
    $this->load->view('template/footer');
  }

  public function changePassword()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Ubah Kata Sandi';

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[1]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[1]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('profil/changepassword', $data);
      $this->load->view('template/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Kata sandi lama salah!
                </div>');
        redirect(base_url('profil/changepassword'));
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Kata sandi baru tidak boleh sama dengan yang lama!
                    </div>');
          redirect(base_url('profil/changepassword'));
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Kata sandi berhasil diubah!
                    </div>');
          redirect(base_url('profil/changepassword'));
        }
      }
    }
  }
}
