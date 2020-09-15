<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
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
        $data['title'] = 'Konten Modul';
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
        $data = [
            "tombol_kirim" => $this->input->post('tombol_kirim', true),
            "tombol_keterangan" => $this->input->post('tombol_keterangan', true),
            "tombol_status" => $this->input->post('tombol_status', true),
        ];
        if ($data["tombol_status"] == "on") {
            $data["tombol_status"] = 1;
        } else $data["tombol_status"] = 0;
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tombol_arah', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil diubah!
        </div>');
        redirect(base_url('modul/editnavigasi'));
    }

    public function edittomboltulisan()
    {
        $data = [
            "tombol_kirim" => $this->input->post('tombol_kirimm', true),
            "tombol_keterangan" => $this->input->post('tombol_keterangann', true),
            "tombol_status" => $this->input->post('tombol_statuss', true),
        ];
        if ($data["tombol_status"] == "on") {
            $data["tombol_status"] = 1;
        } else $data["tombol_status"] = 0;
        $this->db->where('id', $this->input->post('idd'));
        var_dump($this->input->post('idd'));
        var_dump($data);
        die;
        $this->db->update('tombol_tulisan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tombol Navigasi berhasil diubah!
        </div>');
        redirect(base_url('modul/editnavigasi'));
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
        redirect(base_url('dosen/modul'));
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
                redirect(base_url('dosen/modul'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect(base_url('dosen/modul'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Upload video modul!
          </div>');
            redirect(base_url('dosen/modul'));
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
}
