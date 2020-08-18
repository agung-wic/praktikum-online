<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index($id = '')
    { #USER#
        $this->load->model('Admin_model');

        $config['base_url'] = 'https://virtulab-its.com/admin/index';
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

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $config['total_rows'] = $this->db->count_all_results();
        } else {
            $data['keyword'] = null;
            $config['total_rows'] = $this->Admin_model->JumlahUser();
        }
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->Admin_model->TampilUser($config['per_page'], $data['start'], $data['keyword']);
        $data['detail'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['title'] = 'User List';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          User berhasil dihapus!
          </div>');
        redirect(base_url('admin'));
    }

    public function getdetail()
    {
        echo json_encode($this->db->get_where('user', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubah()
    {
        echo json_encode($this->db->get_where('user', ['id' => $this->input->post('id')])->row_array());
    }

    public function edit()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "nrp" => $this->input->post('nrp', true),
            "role_id" => $this->input->post('role_id', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Data user berhasil diubah!
          </div>');
        redirect(base_url('admin'));
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Role baru berhasil ditambahkan!
            </div>');
            redirect(base_url('admin/role'));
        }
    }

    public function editrole()
    {
        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role berhasil diubah!
        </div>');
        redirect(base_url('admin/role'));
    }

    public function getubahrole()
    {
        echo json_encode($this->db->get_where('user_role', ['id' => $this->input->post('id')])->row_array());
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role berhasil dihapus!
        </div>');
        redirect(base_url('admin/role'));
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role-access', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Role baru berhasil ditambahkan!
            </div>');
            redirect(base_url('admin/role'));
        }
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Akses diubah!
            </div>');
    }

    public function jadwal()
    {
        $this->load->model('Admin_model');
        $config['base_url'] = 'https://virtulab-its.com/admin/jadwal';
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
            $config['total_rows'] = $this->Admin_model->JumlahJadwal();
        }
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Jadwal Praktikum';
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['list'] = $this->Admin_model->TampilJadwal($config['per_page'], $data['start'], $data['keyword']);
        $data['req'] = $this->Admin_model->TampilReqJadwal();
        if ($this->input->post('keyword2')) {
            $data['req'] = $this->Admin_model->CariReqJadwal();
        }
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('template/footer');
    }

    public function pengumuman()
    {
        $this->load->model('Admin_model');

        $config['base_url'] = 'https://virtulab-its.com/admin/pengumuman';
        $config['total_rows'] = $this->Admin_model->JumlahPengumuman();

        $config['per_page'] = 5;
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

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengumuman';
        $data['list'] = $this->Admin_model->TampilPengumuman($config['per_page'], $data['start']);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('template/footer');
    }

    public function editjadwal()
    {

        $data = [
            "id" => $this->input->post('id', true),
            "nrp" => $this->input->post('nrp', true),
            "modul_id" => $this->input->post('modul', true),
            "jadwal" => str_replace("T", " ", $this->input->post('jadwal', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jadwal', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Jadwal praktikan berhasil diubah!
          </div>');
        redirect(base_url('admin/jadwal'));
    }

    public function detailpengajuan($id)
    {
        $this->load->model('Admin_model');
        $data['jadwal'] = $this->Admin_model->DetailJadwal($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail Pengajuan Jadwal";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/detail-pengajuan', $data);
        $this->load->view('template/footer');
    }

    public function accpengajuan()
    {
        $id = $this->input->get('id');
        $action = $this->input->get('action');

        $this->load->model('Admin_model');
        $jadwal = $this->Admin_model->DetailJadwal($id);
        if ($action == 1) {
            $data = [
                'nrp' => $jadwal['nrp'],
                'modul_id' => $jadwal['modul_id'],
                'jadwal' => str_replace("T", " ", $jadwal['jadwal_new'])
            ];
            $this->db->where('nrp', $jadwal['nrp']);
            $this->db->where('modul_id', $jadwal['modul_id']);
            $this->db->update('jadwal', $data);

            $data = [
                'nrp' => $jadwal['nrp'],
                'modul_id' => $jadwal['modul_id'],
                'jadwal_old' => str_replace("T", " ", $jadwal['jadwal_old']),
                'jadwal_new' => str_replace("T", " ", $jadwal['jadwal_new']),
                'is_approved' => 1
            ];
            $this->db->where('id', $id);
            $this->db->update('req_jadwal', $data);
        } elseif ($action == 2) {
            $data = [
                'nrp' => $jadwal['nrp'],
                'modul_id' => $jadwal['modul_id'],
                'jadwal_old' => $jadwal['jadwal_old'],
                'jadwal_new' => $jadwal['jadwal_new'],
                'is_approved' => 2
            ];
            $this->db->where('id', $id);
            $this->db->update('req_jadwal', $data);
        }
        redirect(base_url('admin/jadwal'));
    }

    public function getubahjadwal()
    {
        $this->load->model('Admin_model');
        echo json_encode($this->Admin_model->TampilJadwalPraktikan());
    }

    public function getubahpengumuman()
    {
        $this->load->model('Admin_model');
        echo json_encode($this->Admin_model->EditPengumuman());
    }

    public function tambahjadwal()
    {
        $data = [
            "nrp" => $this->input->post('nrp', true),
            "modul_id" => $this->input->post('modul_id', true),
            "jadwal" => str_replace("T", " ", $this->input->post('jadwal', true))
        ];

        $this->db->insert('jadwal', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Jadwal praktikan berhasil ditambahkan!
          </div>');
        redirect(base_url('admin/jadwal'));
    }

    public function addfilejadwal()
    {
        $file = $_FILES['filejadwal']['name'];

        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'csv';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('filejadwal')) {

            $data = fopen(base_url('assets/file/') . $file, "r");
            while (!feof($data)) {
                $csv = fgetcsv($data, 0, ';');
                $jadwal = [
                    "nrp" => $csv[0],
                    "modul_id" => $csv[1],
                    "jadwal" => str_replace("T", " ", $csv[2])
                ];
                $this->db->insert('jadwal', $jadwal);
            }
            fclose($data);
            unlink(FCPATH . 'assets/file/' . $file);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
            Jadwal praktikan berhasil ditambahkan!
            </div>');
            redirect(base_url('admin/jadwal'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('user'));
        }
    }

    public function deletejadwal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Jadwal berhasil dihapus!
          </div>');
        redirect(base_url('admin/jadwal'));
    }

    public function tambahpengumuman()
    {
        $data = [
            "nrp" => $this->session->userdata('nrp'),
            "judul" => $this->input->post('judul', true),
            "isi" => $this->input->post('isi', true),
            "tanggal" => time()
        ];
        $this->db->insert('pengumuman', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengumuman berhasil ditambahkan!
          </div>');
        redirect(base_url('admin/pengumuman'));
    }

    public function editpengumuman()
    {
        $data = [
            "nrp" => $this->session->userdata('nrp'),
            "judul" => $this->input->post('judul', true),
            "isi" => $this->input->post('isi', true),
            "tanggal" => time()
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pengumuman', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengumuman berhasil diubah!
          </div>');
        redirect(base_url('admin/pengumuman'));
    }

    public function deletepengumuman($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengumuman berhasil dihapus!
          </div>');
        redirect(base_url('admin/pengumuman'));
    }
}
