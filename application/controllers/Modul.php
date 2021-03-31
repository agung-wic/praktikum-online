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

        $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/modul/operator/' . $id;
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

        $data['no_kelompok'] = $this->uri->segment(3);
        $data['start'] = $this->uri->segment(4);
        if ($data['start'] == null) {
            $data['start'] = 0;
        }

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $config['total_rows'] = $this->db->count_all_results();
        } else {
            $data['keyword'] = null;
            $config['total_rows'] = $this->Modul_model->JumlahUser($data['no_kelompok']);
        }
        $config['per_page'] = 100;
        $this->pagination->initialize($config);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->Modul_model->TampilUser($config['per_page'], $data['start'], $data['keyword'], $data['no_kelompok']);
        $data['detail'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['title'] = 'Set Operator';
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
        redirect(base_url('modul/operator/') . $this->input->post('no_kelompok', true));
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

    public function upload()
    {
        $accepted_origins = array("https://riset.its.ac.id/praktikum-fisdas/");

        // Images upload path
        $imageFolder = $_SERVER['DOCUMENT_ROOT'] . "/praktikum-fisdas/assets/img/";
        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            if (isset($_SERVER['HTTPS_ORIGIN'])) {
                // Same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTPS_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTPS_ORIGIN']);
                } else {
                    header("HTTP/1.1 403 Origin Denied");
                    return;
                }
            }

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            move_uploaded_file($temp['tmp_name'], $filetowrite);
            // Respond to the successful upload with JSON.
            $imageFolder2 = base_url('assets/img/');
            $file = $imageFolder2 . $temp['name'];
            echo json_encode(array('location' => $file));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
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
        if ($data['user']['role_id'] == 1) {
            $this->load->view('modul/editnavigasi', $data);
        } else {
            $this->load->view('template/accessdenied');
        }
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
        $data['video'] = $this->db->get_where('live_stream', ['id_modul' => $id])->result_array();
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

    public function tambahVideoStream()
    {
        $id = $this->input->post('tambah_video_id_modul', true);
        $data = [
            "id_modul" => $id,
            "ket" => $this->input->post('tambah_ket', true),
            "link" => $this->input->post('tambah_link', true),
            "width" => $this->input->post('tambah_width', true),
            "height" => $this->input->post('tambah_height', true),
            "transform" => $this->input->post('tambah_transform', true),
        ];
        $this->db->insert('live_stream', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Video berhasil ditambahkan!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }


    public function editVideoStream()
    {
        $id = $this->input->post('video_id_modul', true);
        $data = [
            "ket" => $this->input->post('ket', true),
            "link" => $this->input->post('link', true),
            "width" => $this->input->post('width', true),
            "height" => $this->input->post('height', true),
            "transform" => $this->input->post('transform', true),
        ];
        $this->db->where('id', $this->input->post('video_id'));
        $this->db->update('live_stream', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Konfigurasi Video Berhasil Diubah!
        </div>');
        redirect(base_url('modul/navigasi/') . $id);
    }

    public function editmodul()
    {
        $data = [
            "ip_address" => $this->input->post('ip', true),
            "port1" => $this->input->post('port1', true),
            "port2" => $this->input->post('port2', true),
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

    public function getuser()
    {
        echo json_encode($this->db->get_where('user', ['nrp' => $this->input->post('nrp')])->row_array());
    }

    public function getubahmodul()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Modul_model');
        echo json_encode($this->Modul_model->EditModul($id));
    }

    public function tambahmodul()
    {
        $data = [
            "ip" => $this->input->post('ip', true),
            "port1" => $this->input->post('port1', true),
            "port2" => $this->input->post('port2', true),
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
        $this->session->set_flashdata('message1', '<div class="alert alert-danger" role="alert">
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
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
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
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Tombol berhasil dihapus!
        </div>');
        redirect(base_url('modul/navigasi/') . $id_modul);
    }

    public function deleteVideoStream($id)
    {
        $id_modul = $this->db->get_where('live_stream', ['id' => $id])->row_array();
        $id_modul = $id_modul['id_modul'];
        $this->db->where('id', $id);
        $this->db->delete('live_stream');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Video Stream berhasil dihapus!
        </div>');
        redirect(base_url('modul/navigasi/') . $id_modul);
    }


    public function addfilevideo()
    {
        $file = $_FILES['filevideo']['name'];
        if ($file) {
            $data['modul'] = $this->db->get_where('modul', ['id' => $this->input->post('idi', true)])->row_array();
            var_dump($this->input->post('idi'));
            die;
            $config['upload_path'] = './assets/vid/';
            $config['allowed_types'] = 'mp4|mkv ';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('filevideo')) {
                if ($data['modul']['video'] != "" || $data['modul']['video'] != NULL) {
                    $old_video = $data['modul']['video'];

                    try {
                        unlink(FCPATH . 'assets/vid/' . $old_video);
                    } catch (Exception $e) {
                    }
                }
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
          Harap pilih video!
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

    public function getubahvideostream()
    {
        echo json_encode($this->db->get_where('live_stream', ['id' => $this->input->post('id')])->row_array());
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
                $no_kelompok = mb_convert_encoding($csv[0], "ISO-8859-1", "UTF-8");
                $id_kelompok = $this->db->get_where('kelompok', ['no_kelompok' => $no_kelompok])->row_array();
                $anggota = $this->db->get_where('anggota_kelompok', ['no_kelompok' => $id_kelompok['id']])->result_array();
                foreach ($anggota as $a) {
                    $jadwal = [
                        "nrp" => $a['nrp'],
                        "modul_id" => $csv[1],
                        "jadwal" => str_replace("T", " ", $csv[2])
                    ];
                    $this->db->insert('jadwal', $jadwal);
                }
            }
            fclose($data);
            unlink(FCPATH . 'assets/file/' . $file);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
            Jadwal praktikan berhasil ditambahkan!
            </div>');
            redirect(base_url('modul/jadwal'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('user'));
        }
    }

    public function addfilekelompok()
    {
        $file = $_FILES['filekelompok']['name'];

        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'csv';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('filekelompok')) {

            $data = fopen(base_url('assets/file/') . $file, "r");
            while (!feof($data)) {
                $csv = fgetcsv($data, 0, ';');
                $no_kelompok = mb_convert_encoding($csv[0], "ISO-8859-1", "UTF-8");
                $nrp = mb_convert_encoding($csv[1], "ISO-8859-1", "UTF-8");
                $nrp = str_replace(" ", "", $nrp);
                if ($csv[0] == NULL || $csv[0] == "") {
                    continue;
                } else {
                    $id_kelompok = $this->db->get_where('kelompok', ['no_kelompok' => $no_kelompok])->row_array();
                    if ($id_kelompok) {
                        $anggota = $this->db->get_where('anggota_kelompok', ['no_kelompok' => $id_kelompok['id'], 'nrp' => $nrp])->row_array();
                        if ($anggota) {
                            continue;
                        } else {
                            $data_anggota = [
                                "nrp" => $nrp,
                                "no_kelompok" => $id_kelompok['id']
                            ];
                            $this->db->insert('anggota_kelompok', $data_anggota);
                        }
                    } else {
                        $kelompok = [
                            'no_kelompok' => $no_kelompok
                        ];
                        $this->db->insert('kelompok', $kelompok);

                        $id_kelompok = $this->db->get_where('kelompok', ['no_kelompok' => $no_kelompok])->row_array();
                        $data_kelompok = [
                            "nrp" => $nrp,
                            "no_kelompok" => $id_kelompok['id']
                        ];
                        $this->db->insert('anggota_kelompok', $data_kelompok);
                    }
                }
            }
            fclose($data);
            unlink(FCPATH . 'assets/file/' . $file);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kelompok berhasil ditambahkan!
            </div>');
            redirect(base_url('modul/kelompok'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('modul/kelompok'));
        }
    }

    public function addfilekelompokasisten()
    {
        $file = $_FILES['filekelompokasisten']['name'];

        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'csv';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('filekelompokasisten')) {
            $data = fopen(base_url('assets/file/') . $file, "r");
            while (!feof($data)) {
                $csv = fgetcsv($data, 0, ';');
                $nrp = mb_convert_encoding($csv[0], "ISO-8859-1", "UTF-8");
                $nrp = str_replace(" ", "", $nrp);
                $id_modul = mb_convert_encoding($csv[1], "ISO-8859-1", "UTF-8");
                $no_kelompok = mb_convert_encoding($csv[2], "ISO-8859-1", "UTF-8");
                if ($nrp == NULL || $nrp == "") {
                    continue;
                } else {
                    $id_kelompok = $this->db->get_where('kelompok', ['no_kelompok' => $no_kelompok])->row_array();
                    if ($id_kelompok) {
                        $cek = $this->db->get_where('kelompok_asisten', ['nrp' => $nrp, 'id_modul' => $id_modul, 'no_kelompok' => $no_kelompok])->row_array();
                        if ($cek) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Tidak boleh menambahkan asisten dalam satu sesi yang sama!
                            </div>');
                            redirect(base_url('modul/konten'));
                        } else {
                            $masuk = [
                                "nrp" => $nrp,
                                "id_modul" => $id_modul,
                                "no_kelompok" => $id_kelompok['id']
                            ];
                            $this->db->insert('kelompok_asisten', $masuk);
                        }
                    } else {
                        $kelompok = [
                            'no_kelompok' => $no_kelompok
                        ];
                        $this->db->insert('kelompok', $kelompok);

                        $id_kelompok = $this->db->get_where('kelompok', ['no_kelompok' => $no_kelompok])->row_array();
                        $masuk = [
                            "nrp" => $nrp,
                            "id_modul" => $id_modul,
                            "no_kelompok" => $id_kelompok['id']
                        ];
                        $this->db->insert('kelompok_asisten', $masuk);
                    }
                }
            }
            fclose($data);
            unlink(FCPATH . 'assets/file/' . $file);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Asisten berhasil ditambahkan!
            </div>');
            redirect(base_url('modul/manajemen'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('modul/manajemen'));
        }
    }

    public function jadwal()
    {
        $this->load->model('Modul_model');
        $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/modul/jadwal';
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
            $config['total_rows'] = $this->Modul_model->JumlahJadwal();
        }
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Jadwal Praktikum';
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['list'] = $this->Modul_model->TampilJadwal($config['per_page'], $data['start'], $data['keyword']);
        $data['req'] = $this->Modul_model->TampilReqJadwal();
        if ($this->input->post('keyword2')) {
            $data['req'] = $this->Modul_model->CariReqJadwal();
        }
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/jadwal', $data);
        $this->load->view('template/footer');
    }

    public function detailpengajuan($id)
    {
        $this->load->model('Modul_model');
        $data['jadwal'] = $this->Modul_model->DetailJadwal($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail Pengajuan Jadwal";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/detail-pengajuan', $data);
        $this->load->view('template/footer');
    }

    public function editjadwal()
    {
        $tanggal = str_replace("T", " ", $this->input->post('jadwal', true));
        $tanggal = explode(" ", $tanggal);
        $jadwal = explode("-", $tanggal[0]);
        $jadwal = $jadwal[2] . "-" . $jadwal[1] . "-" . $jadwal[0] . " " . $tanggal[1];
        $data = [
            "id" => $this->input->post('id', true),
            "nrp" => $this->input->post('nrp', true),
            "modul_id" => $this->input->post('modul', true),
            "jadwal" => $jadwal,
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jadwal', $data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Jadwal praktikan berhasil diubah!
          </div>');
        redirect(base_url('modul/jadwal'));
    }

    public function deletejadwal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
         Jadwal berhasil dihapus!
          </div>');
        redirect(base_url('modul/jadwal'));
    }

    public function getdetail()
    {
        echo json_encode($this->db->get_where('user', ['id' => $this->input->post('id')])->row_array());
    }

    public function detail($id)
    {
        $this->load->model('Modul_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Pembagian Kelompok';
        $data['kelompok'] = $this->Modul_model->Tampildetailkelompok($id);
        $data['id_kelompok'] = $id;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/detail', $data);
        $this->load->view('template/footer');
    }

    public function deleteanggotakelompok($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anggota_kelompok');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Anggota Kelompok berhasil dihapus!
          </div>');
        redirect(base_url('modul/kelompok'));
    }

    public function deleteasistenkelompok()
    {
        $id = $this->uri->segment(5);
        $this->db->where('id', $id);
        $this->db->delete('kelompok_asisten');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Asisten berhasil dihapus!
          </div>');
        redirect(base_url('modul/manajemenasisten/' . $this->uri->segment(3)));
    }

    public function getubahrole()
    {
        echo json_encode($this->db->get_where('user_role', ['id' => $this->input->post('id')])->row_array());
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
        redirect(base_url('modul/role'));
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
        redirect(base_url('modul/jadwal'));
    }

    public function getubahjadwal()
    {
        $this->load->model('Modul_model');
        $data = $this->Modul_model->TampilJadwalPraktikan();
        $tanggal = str_replace("T", "T", $data['jadwal']);
        $tanggal = explode(" ", $tanggal);
        $jadwal = explode("-", $tanggal[0]);
        $jadwal = $jadwal[2] . "-" . $jadwal[1] . "-" . $jadwal[0] . "T" . $tanggal[1];
        $data['jadwal'] = $jadwal;
        echo json_encode($data);
    }

    public function pengumuman()
    {
        $this->load->model('Modul_model');

        $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/modul/pengumuman';
        $config['total_rows'] = $this->Modul_model->JumlahPengumuman();

        $config['per_page'] = 10;
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
        $data['list'] = $this->Modul_model->TampilPengumuman($config['per_page'], $data['start']);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/pengumuman', $data);
        $this->load->view('template/footer');
    }

    public function deletepengumuman($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengumuman berhasil dihapus!
          </div>');
        redirect(base_url('modul/pengumuman'));
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
        redirect(base_url('modul/pengumuman'));
    }

    public function getubahpengumuman()
    {
        $this->load->model('Modul_model');
        echo json_encode($this->Modul_model->EditPengumuman());
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
        redirect(base_url('modul/pengumuman'));
    }

    public function kelompok()
    {
        $this->load->model('Modul_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Pembagian Kelompok';
        $data['kelompok'] = $this->Modul_model->JumlahKelompok();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/kelompok', $data);
        $this->load->view('template/footer');
    }

    public function manajemenasisten()
    {
        $this->load->model('Modul_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Manajemen Asisten';
        $data['id_modul'] = $this->uri->segment(3);
        $data['jumlah_asisten'] = $this->Modul_model->JumlahKelompokAsisten($data['id_modul']);
        $this->db->order_by('id', 'ASC');
        $data['kelompok'] = $this->db->get('kelompok')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/manajemenasisten', $data);
        $this->load->view('template/footer');
    }

    public function detailmanajemenasisten()
    {
        $this->load->model('Modul_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Manajemen Asisten';
        $data['id_modul'] = $this->uri->segment(3);
        $data['no_kelompok'] = $this->uri->segment(4);
        $data['kelompok'] = $this->Modul_model->TampildetailkelompokAsisten($data['id_modul'], $data['no_kelompok']);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/detailmanajemenasisten', $data);
        $this->load->view('template/footer');
    }

    public function tambahasisten()
    {
        $data = [
            "nrp" => $this->input->post('nrp', true),
            "no_kelompok" => $this->input->post('id', true),
            "id_modul" => $this->input->post('id_modul', true)
        ];
        $this->db->insert('kelompok_asisten', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Asisten berhasil ditambahkan!
              </div>');
        redirect(base_url('modul/manajemenasisten/') .  $this->input->post('id_modul') . '/' . $this->input->post('no'));
    }

    public function gettambahasisten()
    {
        echo json_encode($this->db->get_where('kelompok', ['id' => $this->input->post('id')])->row_array());
    }

    public function manajemen()
    {
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Manajemen Asisten';
        $data['list'] = $this->db->get('modul')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('modul/manajemen', $data);
        $this->load->view('template/footer');
    }
}
