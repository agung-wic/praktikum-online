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
        $this->load->model('Praktikan_model');
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['pengumuman'] = $this->Praktikan_model->TampilPengumuman();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/index', $data);
        $this->load->view('template/footer');
    }

    public function absen($modul)
    {
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Presensi';
        $data['status'] = $this->db->get_where('jadwal', ['nrp' => $this->session->userdata('nrp'), 'modul_id' => $modul])->row_array();
        $data['modul'] = $this->db->get_where('modul', ['modul' => $data['status']['modul_id']])->row_array();

        #cek waktu
        $cek = $data['status'];
        $jadwal = strtotime($cek['jadwal']);
        $batas = strtotime($data['modul']['time']);
        $time = (date('H', $batas) * 60 * 60) + (date('i', $batas) * 60) + date('s', $batas);

        $absen = $this->db->get_where('absensi', ['nrp' => $this->session->userdata('nrp'), 'modul' => $modul])->row_array();

        if ((time() >= $jadwal) && ((time() <= ($jadwal + $time)))) {
            if ($absen) {
                redirect(base_url('praktikan/percobaan/') . $modul);
            } else {
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('praktikan/absen', $data);
                $this->load->view('template/footer');
            }
        } else {
            redirect(base_url('praktikan/modul/') . $modul);
        }
    }

    public function do_absen()
    {

        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['title'] = 'Presensi';
        $data['status'] = $this->db->get_where('jadwal', ['nrp' => $this->session->userdata('nrp'), 'modul_id' => $this->input->post('modul_id')])->row_array();
        $data['modul'] = $this->db->get_where('modul', ['modul' => $data['status']['modul_id']])->row_array();

        #cek waktu
        $cek = $data['status'];
        $jadwal = strtotime($cek['jadwal']);
        $batas = strtotime($data['modul']['time']);
        $time = (date('H', $batas) * 60 * 60) + (date('i', $batas) * 60) + date('s', $batas);

        $absen = $this->db->get_where('absensi', ['nrp' => $this->session->userdata('nrp'), 'modul' => $this->input->post('modul_id')])->row_array();

        if ((time() >= $jadwal) && ((time() <= ($jadwal + $time)))) {
            if (!$absen) {
                $waktu_jadwal = strtotime($cek['jadwal']);
                $jadwal_menit = (date('H', $waktu_jadwal) * 60) + date('i', $waktu_jadwal);

                $sekarang_menit = (date('H', time()) * 60) + date('i', time());

                if (intval($jadwal_menit) - intval($sekarang_menit) < 0) {
                    if (floor(($sekarang_menit - $jadwal_menit) / 60) > 0) {
                        $terlambat = "Terlambat " . floor(($sekarang_menit - $jadwal_menit) / 60) . " jam " . ($sekarang_menit - $jadwal_menit) % 60 . " menit";
                    } else {
                        $terlambat = "Terlambat " .  ($sekarang_menit - $jadwal_menit) % 60 . " menit";
                    }
                } else {
                    $terlambat = "Tepat waktu";
                }

                $input = [
                    'nrp' => $this->session->userdata('nrp'),
                    'modul' => $this->input->post('modul_id'),
                    'time' => time(),
                    'keterangan' => $terlambat
                ];

                $nilai = [
                    'nrp' => $this->session->userdata('nrp'),
                    'modul' => $this->input->post('modul_id'),
                    'is_acc' => 0
                ];
                $this->db->insert('absensi', $input);
                $this->db->insert('nilai', $nilai);
                redirect(base_url('praktikan/percobaan/') . $this->input->post('modul_id'));
            } else {
                redirect(base_url('praktikan/percobaan/') . $this->input->post('modul_id'));
            }
        } else {
            redirect(base_url('praktikan/modul/') . $this->input->post('modul_id'));
        }
    }

    public function getabsen()
    {
        echo json_encode($this->db->get_where('jadwal', ['id' => $this->input->post('id')])->row_array());
    }

    public function modul($id = NULL)
    {
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $id_kelompok = $this->db->get_where('anggota_kelompok', ['nrp ' => $this->session->userdata('nrp')])->row_array();
        $this->load->model('Praktikan_model');
        if ($id_kelompok != NULL) {
            $data['kelompok'] = $this->db->get_where('kelompok', ['id' => $id_kelompok['no_kelompok']])->row_array();
            $data['list'] = $this->Praktikan_model->TampilKelompokModul($id_kelompok['no_kelompok']);
            $data['asisten'] = $this->Praktikan_model->KelompokAsisten($id_kelompok['no_kelompok']);
        } else {
            $data['asisten'] = NULL;
        }
        if (!$id) {
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $this->db->order_by('modul_id', 'ASC');
            $data['status'] = $this->db->get('jadwal')->result_array();
            $data['title'] = 'Modul Praktikum';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('praktikan/modul', $data);
            $this->load->view('template/footer');
        } else {
            $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
            $this->db->where('modul_id', $id);
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $data['status'] = $this->db->get('jadwal')->row_array();
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
        $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
        $address = $data['modul']['ip_address'];
        $data['tombol_arah'] = $this->db->get_where('tombol_arah', ['id_modul' => $id])->result_array();
        $data['tombol_tulisan'] = $this->db->get_where('tombol_tulisan', ['id_modul' => $id])->result_array();
        $data['output_tulisan'] = $this->db->get_where('output_tulisan', ['id_modul' => $id])->result_array();
        $data['live_stream'] = $this->db->get_where('live_stream', ['id_modul' => $id])->result_array();
        $data['lokasi'] = ($this->uri->segment('3') == NULL) ? 'tes' : $this->uri->segment('3');

        #cek waktu
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $this->db->where('modul_id', $id);
        $cek = $this->db->get('jadwal')->row_array();
        $jadwal = strtotime($cek['jadwal']);
        $batas = strtotime($data['modul']['time']);
        $time = (date('H', $batas) * 60 * 60) + (date('i', $batas) * 60) + date('s', $batas);
        if ($this->session->userdata('role_id') == 1) {
            $this->_connectsocket($id);
            $data['output'] = NULL;

            $data['title'] = 'Percobaan Praktikum';
            $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();

            $this->db->select('*');
            $this->db->from('jadwal');
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $this->db->where('modul_id', $id);
            $data['jadwal'] = $this->db->get()->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar-percobaan', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('praktikan/percobaan', $data);
            $this->load->view('template/footer');
        } else if ((time() >= $jadwal) && ((time() <= ($jadwal + $time)))) {
            if ($cek['status'] == 0) {
                $data['output'] = NULL;

                $data['title'] = 'Percobaan Praktikum';
                $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();

                $this->db->select('*');
                $this->db->from('jadwal');
                $this->db->where('nrp', $this->session->userdata('nrp'));
                $this->db->where('modul_id', $id);
                $data['jadwal'] = $this->db->get()->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                if ($this->session->userdata('role_id') != 8) {
                    $this->_connectsocket($id);
                    $this->load->view('praktikan/percobaan', $data);
                } else {
                    $this->load->view('praktikan/percobaan-viewer', $data);
                }
                $this->load->view('template/footer');
            } else {
                redirect(base_url('praktikan/modul/') . $id);
            }
        } else {
            redirect(base_url('praktikan/modul/') . $id);
        }
    }


    public function selesai($id)
    {
        $data = ['status' => 1];
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $this->db->where('modul_id', $id);
        $this->db->update('jadwal', $data);
        redirect(base_url('praktikan/modul'));
    }

    public function laporan()
    {
        $this->load->model('Praktikan_model');
        $data['title'] = 'Unggah Laporan';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['modul'] = $this->Praktikan_model->TampilModulLaporan($this->session->userdata('nrp'));
        $data['cek'] = 0;
        $data['cek_modul'] = NULL;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/laporan', $data);
        $this->load->view('template/footer');
    }

    public function uploadlaporan()
    {
        $data['nilai'] = $this->db->get_where('nilai', ['modul' => $this->input->post('modul_id', true), 'nrp' => $this->session->userdata('nrp')])->row_array();
        if ($data['nilai']['laporan']) {
            $this->db->set('laporan', $this->input->post('link', true));
            $this->db->set('laporan_time', time());
            $this->db->where('modul', $this->input->post('modul_id'));
            $this->db->where('nrp', $this->session->userdata('nrp'));
            $this->db->update('nilai');
            if ($this->input->post('modul_id') != "" ||  $this->input->post('modul_id') != NULL)
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                               Laporan modul berhasil diubah!
                                               </div>');
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Harap pilih modul terlebih dahulu!
                                </div>');
            }
            if ($this->input->post('cek') == 0) {
                redirect(base_url('praktikan/laporan'));
            } else {
                redirect(base_url('praktikan/percobaan/') . $this->input->post('cek_modul'));
            }
        } else {
            $nilai = [
                "laporan" => $this->input->post('link'),
                "laporan_time" => time()
            ];
            if ($this->input->post('modul_id') != "" ||  $this->input->post('modul_id') != NULL) {
                $this->db->where('modul', $this->input->post('modul_id'));
                $this->db->where('nrp', $this->session->userdata('nrp'));
                $this->db->update('nilai', $nilai);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                           Laporan modul berhasil diubah!
                                           </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Harap pilih modul terlebih dahulu!
                            </div>');
            }
            if ($this->input->post('cek') == 0) {
                redirect(base_url('praktikan/laporan'));
            } else {
                redirect(base_url('praktikan/percobaan/') . $this->input->post('cek_modul'));
            }
        }
    }


    public function getubahnilai()
    {
        $this->load->model('Praktikan_model');
        echo json_encode($this->Praktikan_model->TampilNilaiPraktikan($this->input->post('id')));
    }


    public function getubahlaporan()
    {
        echo json_encode($this->db->get_where('nilail', ['id' => $this->input->post('id')])->row_array());
    }

    public function getubahjadwal()
    {
        $this->load->model('Praktikan_model');
        echo json_encode($this->Praktikan_model->TampilJadwalPraktikan());
    }

    private function _connectsocket($id = NULL)
    {
        // $host    = "10.122.10.43";
        // $port    = 1800;
        // $port2    = 1801;
        $data['modul'] = $this->db->get_where('modul', ['modul' => $id])->row_array();
        // var_dump($data['modul']);
        // die;
        $host = $data['modul']['ip_address'];
        $port = $data['modul']['port1'];
        $port2 = $data['modul']['port2'];

        //echo "Message To server :" . $message;
        // create socket
        $socket1 = socket_create(AF_INET, SOCK_STREAM, 0);
        $socket2 = socket_create(AF_INET, SOCK_STREAM, 0);

        $socket = [$socket1, $socket2];
        $data['result2'] = NULL;


        if ($socket1 || $socket2) {
            // connect to server    
            $result1 = socket_connect($socket1, $host, $port);
            $result2 = socket_connect($socket2, $host, $port2);

            $result = [$result1, $result2];
            if ($result1 && $result2) {
                $success = [$socket, $result];
                return $success;
            } else if ($result1) {
                $success = [$socket1, $result1];
                return $success;
                socket_close($socket2);
            } else {
                echo "<script>alert('Server mati, silahkan hubungi admin!');
                window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
            }
        } else {
            echo "<script>alert('Gagal membuat socket!');
            window.location.href='" . base_url('praktikan/modul/') . $id . "';</script>";
        }
    }

    private function _sendsocket($socket1, $socket2, $message, $id)
    {
        $data = $this->db->get_where('tombol_arah', ['id_modul' => $id, 'tombol_kirim' => $message])->row_array();
        if ($data == NULL) {
            $data = $this->db->get_where('tombol_tulisan', ['id_modul' => $id, 'tombol_kirim' => $message])->row_array();
        }
        if (socket_write($socket1, $message, strlen($message))) {
            $result2 = socket_read($socket2, 1024);
            $result2 = htmlspecialchars($result2);
            if ($result2) {
                $satuan = $data['data_satuan'];
                $result2 = str_replace("][", ",", $result2);
                $result2 = str_replace("[", "", $result2);
                $result2 = str_replace("]", "", $result2);
                $result2 = explode(",", $result2);
                if (count($result2) > 1 && count($result2) <= 2) { //[t,1] [0] => Array ( [0] => t [1] => 1 )
                    if ($result2[0] == "t") {
                        $result_waktu = $result2[1] * 0.3;
                        $result2 = $result_waktu . " " . $satuan;
                    } else {
                        $result2 = $result2[1] . " " . $satuan;
                    }
                } else if (count($result2) > 2 && count($result2) <= 4) { //[t,1][l,2] => Array ( [0] => t [1] => 1 [2] => l [3] => 2 ) 
                    $result2 = $result2[1] . " " . $satuan . ", " .  $result2[3] . " " . $satuan;
                } else if (count($result2) > 4) {
                    for ($i = 0; $i < count($result2); $i = $i + 1) {
                        if ($i % 4 == 0) {
                            $result3[$i] = $result2[$i];
                        } else if (($i + 3) % 4 == 0) {
                            $result4[$i] = $result2[$i];
                        } else if (($i + 2) % 4 == 0) {
                            $result5[$i] = $result2[$i] * 0.001;
                            $result5[$i] = number_format($result5[$i], 3);
                        } else if (($i + 1) % 4 == 0) {
                            $result6[$i] = $result2[$i] * 0.001 * 1.2;
                            $result6[$i] = number_format($result6[$i], 3);
                        }
                    }
                    $result3 = implode(",", $result3);
                    $result3 = explode(",", $result3);
                    $result4 = implode(",", $result4);
                    $result4 = explode(",", $result4);
                    $result5 = implode(",", $result5);
                    $result5 = explode(",", $result5);
                    $result6 = implode(",", $result6);
                    $result6 = explode(",", $result6);
                    $result2 = [
                        "tabel" => $result3,
                        "nomor" => $result4,
                        "waktu" => $result5,
                        "kecepatan" => $result6
                    ];
                } else if (count($result2) > 0) {
                    $result2 = $satuan;
                }
                return $result2;
            } else {
                return "Error 1";
            }
            return $result2;
        } else {
            return "Error 1";
        }
    }


    public function getpercobaan()
    {
        $connect = $this->_connectsocket($this->input->post('id'));
        $hasil = $this->_sendsocket($connect[0][0], $connect[0][1], $this->input->post('kirim'), $this->input->post('id'));
        // $data = [
        //     'nrp_praktikan' => $this->session->userdata('nrp'),
        //     'id_modul' => $this->input->post('id'),
        //     'input' => $this->input->post('kirim'),
        //     'output' => $hasil
        // ];
        // $this->db->insert('audit_log', $data);

        echo json_encode($hasil);
    }

    public function tombolKamera()
    {
        $id = $this->input->post("id");
        $link = $this->db->get_where('live_stream', ['id_modul' => $id])->result_array();
        if ($link) {
            echo json_encode($link);
        } else {
            echo json_encode("Error");
        }
    }

    public function jadwal()
    {
        $this->load->model('Praktikan_model');

        $config['base_url'] = 'https://riset.its.ac.id/praktikum-fisdas/praktikan/index';
        $config['total_rows'] = $this->Praktikan_model->JumlahJadwal($this->session->userdata('nrp'));
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

        $data['title'] = 'Jadwal Praktikum';

        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['list'] = $this->Praktikan_model->JadwalPraktikan($this->session->userdata('nrp'), $config['per_page'], $data['start']);
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['total'] = $this->Praktikan_model->JumlahJadwal($this->session->userdata('nrp'));
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/jadwal', $data);
        $this->load->view('template/footer');
    }

    public function reqjadwal()
    {
        $data = [
            "nrp" => $this->input->post('nrp'),
            "modul_id" => $this->input->post('modul'),
            "jadwal_old" => $this->input->post('jadwal_old'),
            "jadwal_new" => $this->input->post('jadwal_new'),
            "ket" => $this->input->post('ket'),
            "is_approved" => 0
        ];
        $ada = $this->db->get_where('req_jadwal', array('nrp' => $this->input->post('nrp'), 'modul_id' => $this->input->post('modul')))->row_array();
        if ($ada) {
            $this->db->where('nrp', $this->input->post('nrp'));
            $this->db->where('modul_id', $this->input->post('modul'));
            $this->db->update('req_jadwal', $data);
        } else {
            $this->db->insert('req_jadwal', $data);
        }
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
          Pengajuan jadwal sukses! Silakan menunggu persetujuan dari Admin.
          </div>');
        redirect(base_url('praktikan/jadwal'));
    }

    public function penilaian()
    {
        $this->load->model('Praktikan_model');
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['modul'] = $this->db->get('modul')->result_array();
        $data['list'] = $this->Praktikan_model->PenilaianPraktikan($this->session->userdata('nrp'));
        $this->load->helper('download');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/penilaian', $data);
        $this->load->view('template/footer');
    }

    public function kelompok()
    {
        $data['title'] = 'Kelompok';
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $id_kelompok = $this->db->get_where('anggota_kelompok', ['nrp ' => $this->session->userdata('nrp')])->row_array();
        $this->load->model('Praktikan_model');
        if ($id_kelompok != NULL) {
            $data['kelompok'] = $this->db->get_where('kelompok', ['id' => $id_kelompok['no_kelompok']])->row_array();
            $data['list'] = $this->Praktikan_model->TampilKelompok($id_kelompok['no_kelompok']);
        } else {
            $data['kelompok'] = NULL;
            $data['list'] = NULL;
        }


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('praktikan/kelompok', $data);
        $this->load->view('template/footer');
    }

    public function unduh($id)
    {
        $this->load->helper('download');
        force_download(FCPATH . '/assets/laporan/' . $id, null);
    }
}
