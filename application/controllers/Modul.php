<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('Modul_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Set Operator';
        $data['kelompok'] = $this->Modul_model->JumlahKelompok();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/index', $data);
        $this->load->view('template/footer');
    }

    public function operator($id = '')
    { #USER#
        $this->load->model('Modul_model');

        $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/modul/operator';
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

        $data['start'] = $this->uri->segment(4);
        if ($data['start'] == null) {
            $data['start'] = 0;
        }

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $config['total_rows'] = $this->db->count_all_results();
        } else {
            $data['keyword'] = null;
            $config['total_rows'] = $this->Modul_model->JumlahUser();
        }
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->Modul_model->TampilUser($config['per_page'], $data['start'], $data['keyword']);
        $data['no_kelompok'] = $this->uri->segment(3);
        $data['detail'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['title'] = 'User List';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/operator', $data);
        $this->load->view('template/footer');
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
        redirect(base_url('modul'));
    }

    public function penilaian($modul)
    {
        $this->load->model('Asisten_model');
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['list'] = $this->Asisten_model->TampilNilai($modul);
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
        $this->load->view('asisten/penilaian', $data);
        $this->load->view('template/footer');
    }


    public function konten()
    {
        $this->load->model('Modul_model');
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Konten Modul';
        $data['list'] = $this->Modul_model->TampilModul();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/konten', $data);
        $this->load->view('template/footer');
    }

    public function editnavigasi()
    {
        $this->load->model('Modul_model');
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Navigasi Modul';
        $data['list'] = $this->Modul_model->TampilModul();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/editnavigasi', $data);
        $this->load->view('template/footer');
    }

    public function navigasi($id = NULL)
    {
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Navigasi Modul';
        $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
        $data['tombol_arah'] = $this->db->get_where('tombol_arah', ['id_modul' => $id])->result_array();
        $data['tombol_tulisan'] = $this->db->get_where('tombol_tulisan', ['id_modul' => $id])->result_array();
        $data['output_tulisan'] = $this->db->get_where('output_tulisan', ['id_modul' => $id])->result_array();
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $this->db->where('modul_id', $id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/navigasi', $data);
        $this->load->view('template/footer');
    }

    public function edittombolarah()
    {
        $id = $this->input->post('id_modul', true);
        $data = [
            "tombol_kirim" => $this->input->post('tombol_kirim', true),
            "tombol_keterangan" => $this->input->post('tombol_keterangan', true),
            "tombol_status" => $this->input->post('tombol_status', true),
            "data_tampil_output" => $this->input->post('data_tampil_output', true),
            "data_satuan" => $this->input->post('data_satuan', true),
        ];
        if ($data["tombol_status"] == "on") {
            $data["tombol_status"] = 1;
        } else $data["tombol_status"] = 0;
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tombol_arah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil diubah!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function edittomboltulisan()
    {
        $id = $this->input->post('idd_modul', true);
        $data = [
            "tombol_kirim" => $this->input->post('tombol_kirimm', true),
            "tombol_keterangan" => $this->input->post('tombol_keterangann', true),
            "tombol_status" => $this->input->post('tombol_statuss', true),
            "data_tampil_output" => $this->input->post('data_tampil_outputt', true),
            "data_satuan" => $this->input->post('data_satuann', true),
        ];
        if ($data["tombol_status"] == "on") {
            $data["tombol_status"] = 1;
        } else $data["tombol_status"] = 0;
        $this->db->where('id', $this->input->post('idd'));
        $this->db->update('tombol_tulisan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil diubah!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function tambahtomboltulisan()
    {
        $id = $this->input->post('modul_id', true);
        $data = [
            "id_modul" => $id,
            "tombol_kirim" => $this->input->post('nilai', true),
            "tombol_keterangan" => $this->input->post('keterangan', true),
            "tombol_status" => $this->input->post('status', true),
            "data_tampil_output" => $this->input->post('data-output', true),
            "data_satuan" => $this->input->post('data_satuan', true),
        ];
        if ($data["tombol_status"] == "on") {
            $data["tombol_status"] = 1;
        } else $data["tombol_status"] = 0;
        $this->db->insert('tombol_tulisan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil ditambahkan!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function tambahoutput()
    {
        $id = $this->input->post('modul_idddd', true);
        $data = [
            "id_modul" => $id,
            "tulisan" => $this->input->post('tulisann', true),
            "data_tampil_output" => $this->input->post('data_tampil_outputttt', true),
        ];
        $this->db->insert('output_tulisan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil ditambahkan!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function editoutput()
    {
        $id = $this->input->post('iddd_modul', true);
        $data = [
            "tulisan" => $this->input->post('tulisan', true),
            "data_tampil_output" => $this->input->post('data_tampil_outputtt', true),
        ];
        $this->db->where('id', $this->input->post('iddd'));
        $this->db->update('output_tulisan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil diubah!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function editmodul()
    {
        $data = [
            "modul" => $this->input->post('modul', true),
            "name" => $this->input->post('name', true),
            "peralatan" => $this->input->post('peralatan', true),
            "teori" => $this->input->post('teori', true),
            "cara" => $this->input->post('cara', true),
            "tugas_lapres" => $this->input->post('tugas_lapres', true),
            "tugas_pendahuluan" => $this->input->post('tugas_pendahuluan', true),
            "time" => $this->input->post('time', true),
            "tujuan" => $this->input->post('tujuan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('modul', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Modul berhasil diubah!
        </div>');
        redirect(base_url('modul/konten'));
    }

    public function getubah()
    {
        echo json_encode($this->db->get_where('user', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahmodul()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Dosen_model');
        echo json_encode($this->Dosen_model->EditModul($id));
    }

    public function tambahmodul()
    {
        $data = [
            "modul" => $this->input->post('modul', true),
            "name" => $this->input->post('name', true),
            "peralatan" => $this->input->post('peralatan', true),
            "teori" => $this->input->post('teori', true),
            "cara" => $this->input->post('cara', true),
            "tugas_lapres" => $this->input->post('tugas_lapres', true),
            "tugas_pendahuluan" => $this->input->post('tugas_pendahuluan', true),
            "content" => $this->input->post('content', true),
            "video" => $this->input->post('video', true),
            "pdf" => $this->input->post('pdf', true),
            "time" => $this->input->post('time', true),
            "tujuan" => $this->input->post('tujuan', true),
        ];
        $this->db->insert('modul', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Modul berhasil ditambahkan!
        </div>');
        redirect(base_url('modul/konten'));
    }

    public function deletemodul($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tombol_tulisan');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Tombol berhasil dihapus!
        </div>');
        redirect(base_url('modul/konten'));
    }

    public function deletetomboltulisan($id)
    {
        $id_modul = $this->db->get_where('tombol_tulisan', ['id' => $id])->row_array();
        $id_modul = $id_modul['id_modul'];
        $this->db->where('id', $id);
        $this->db->delete('tombol_tulisan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol berhasil dihapus!
        </div>');
        redirect(base_url('modul/navigasi/') . $id_modul);
    }

    public function deleteoutput($id)
    {
        $id_modul = $this->db->get_where('output_tulisan', ['id' => $id])->row_array();
        $id_modul = $id_modul['id_modul'];
        $this->db->where('id', $id);
        $this->db->delete('output_tulisan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol berhasil dihapus!
        </div>');
        redirect(base_url('modul/navigasi/') . $id_modul);
    }


    public function addfilevideo()
    {
        $file = $_FILES['filevideo']['name'];
        if ($file) {
            $data['modul'] = $this->db->get_where('modul', ['id' => $this->input->post('idi', true)])->row_array();

            $config['upload_path'] = './assets/vid/';
            $config['allowed_types'] = 'mp4|mkv ';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('filevideo')) {
                $old_video = $data['modul']['video'];
                unlink(FCPATH . 'assets/vid/' . $old_video);
                $new_video = $this->upload->data('file_name');

                $this->db->set('video', $new_video);
                $this->db->where('id', $this->input->post('idi'));
                $this->db->update('modul');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Video modul berhasil diubah!
            </div>');
                redirect(base_url('modul/konten'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect(base_url('modul/konten'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Upload video modul!
          </div>');
            redirect(base_url('modul/konten'));
        }
    }

    public function getubahvideo()
    {
        echo json_encode($this->db->get_where('modul', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahtombolarah()
    {
        echo json_encode($this->db->get_where('tombol_arah', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahtomboltulisan()
    {
        echo json_encode($this->db->get_where('tombol_tulisan', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahoutput()
    {
        echo json_encode($this->db->get_where('output_tulisan', ['id' => $this->input->post('id')])->row_array());
    }
}
