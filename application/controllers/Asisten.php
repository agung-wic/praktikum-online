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
    $data['modul'] = $this->db->get('modul')->result_array();
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Penilaian';
    $data['list'] = $this->db->get('modul')->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/index', $data);
    $this->load->view('template/footer');
  }

  public function penilaian()
  {
    $this->load->model('Asisten_model');
    $data['id_modul'] = $this->uri->segment(3);
    $data['nama_modul'] = $this->db->get_where('modul', ['modul' =>  $data['id_modul']])->row_array();
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Penilaian';
    if ($data['user']['role_id'] == 1) {
      $data['kelompok'] = $this->Asisten_model->KelompokAsistenNilaiAdmin($data['id_modul']);
    } else {
      $data['kelompok'] = $this->Asisten_model->KelompokAsistenNilai($this->session->userdata('nrp'), $data['id_modul']);
    }
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/penilaian', $data);
    $this->load->view('template/footer');
  }

  public function penilaian_detail($id_modul, $id_kelompok)
  {
    $this->load->model('Asisten_model');
    $data['title'] = 'Penilaian';
    $data['keyword'] = $this->input->post('keyword');
    $data['cekrole'] = $this->uri->segment(1);
    $data['id_modul'] = $id_modul;
    $data['id_kelompok'] = $id_kelompok;
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['list'] = $this->Asisten_model->TampilNilai($data['id_modul'], $data['id_kelompok'], $data['keyword']);
    $data['nama_kelompok'] = $this->db->get_where('kelompok', ['id' => $data['id_kelompok']])->row_array();
    $data['nama_modul'] = $this->db->get_where('modul', ['modul' =>  $data['id_modul']])->row_array();
    $data['cek'] = [
      0 => [
        'a' => 'tes'
      ],
      1 => [
        'a' => 'tes'
      ]
    ];


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
    $this->load->view('asisten/penilaian_detail', $data);
    $this->load->view('template/footer');
  }

  public function unduh($id)
  {
    $this->load->helper('download');
    force_download(FCPATH . '/assets/laporan/' . $id, null);
  }

  public function kelompok()
  {
    $this->load->model('Asisten_model');
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Pembagian Kelompok';
    $data['kelompok'] = $this->Asisten_model->JumlahKelompokTotal();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/kelompok', $data);
    $this->load->view('template/footer');
  }

  public function detailkelompok($id)
  {
    $this->load->model('Asisten_model');
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Kelompok';
    $data['kelompok'] = $this->Asisten_model->Tampildetailkelompok($id);
    $data['id_kelompok'] = $id;
    $data['nama_kelompok'] = $this->db->get_where('kelompok', ['id' => $data['id_kelompok']])->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/detailkelompok', $data);
    $this->load->view('template/footer');
  }

  public function kelompokampu()
  {
    $this->load->model('Asisten_model');
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Kelompok';
    if ($data['user']['role_id'] == 1) {
      $data['kelompok'] = $this->Asisten_model->KelompokAsistenAdmin();
    } else {
      $data['kelompok'] = $this->Asisten_model->KelompokAsisten($this->session->userdata('nrp'));
    }
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/kelompokampu', $data);
    $this->load->view('template/footer');
  }

  public function editkelompok()
  {
    $data = [
      "no_kelompok" => $this->input->post('no_kelompok')
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('kelompok', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Kelompok berhasil diubah!
          </div>');
    redirect(base_url('asisten/kelompok'));
  }

  public function detail($id)
  {
    $this->load->model('Asisten_model');
    $data['user'] = $this->db->get_where('f', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $data['title'] = 'Pembagian Kelompok';
    $data['kelompok'] = $this->Asisten_model->Tampildetailkelompok($id);
    $data['id_kelompok'] = $id;
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('asisten/detail', $data);
    $this->load->view('template/footer');
  }

  public function deleteanggotakelompok($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('anggota_kelompok');
    $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">
        Anggota Kelompok berhasil dihapus!
        </div>');
    redirect(base_url('asisten/kelompok'));
  }

  public function tambahkelompok()
  {
    $this->db->insert('kelompok', ['no_kelompok' => $this->input->post('no_kelompok')]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Kelompok baru berhasil ditambahkan!
            </div>');
    redirect(base_url('asisten/kelompok'));
  }

  public function tambahanggota()
  {
    $data = [
      "nrp" => $this->input->post('nrp', true),
      "no_kelompok" => $this->input->post('id', true),
    ];
    if ($this->db->get_where('anggota_kelompok', ['nrp' => $this->input->post('nrp')])->row_array()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Anggota sudah terdaftar di kelompok lain!
       </div>');
      redirect(base_url('asisten/kelompok/') .  $this->input->post('no_kelompok'));
    } else {
      $this->db->insert('anggota_kelompok', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Anggota baru berhasil ditambahkan!
            </div>');
      redirect(base_url('asisten/kelompok/') .  $this->input->post('no_kelompok'));
    }
  }

  public function getuser()
  {
    echo json_encode($this->db->get_where('user', ['nrp' => $this->input->post('nrp')])->row_array());
  }

  public function getubahkelompok()
  {
    echo json_encode($this->db->get_where('kelompok', ['id' => $this->input->post('id')])->row_array());
  }

  public function gettambahanggota()
  {
    echo json_encode($this->db->get_where('kelompok', ['id' => $this->input->post('id')])->row_array());
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

  public function editnilai($id, $id_kelompok)
  {
    $data = [
      'resume' => $this->input->post('resume', true),
      'pretest' => $this->input->post('pretest', true),
      'uji_lisan' => $this->input->post('uji_lisan', true),
      'praktikum' => $this->input->post('praktikum', true),
      'postest' => $this->input->post('postest', true),
      'format' => $this->input->post('format', true),
      'bab' => $this->input->post('bab', true),
      'kesimpulan' => $this->input->post('kesimpulan', true),
      'asisten' => $this->session->userdata('nrp')
    ];
    $id = $id;
    $modul_id = $this->input->post('modul_id', true);
    // $nilai_akhir = (($data['resume'] * 0.25) + ($data['pretest'] * 0.05) + ($data['uji_lisan'] * 0.1) + ($data['praktikum'] * 0.1) + ($data['postest'] * 0.05) + ($data['format'] * 0.1) + ($data['bab'] * 0.25) + ($data['kesimpulan'] * 0.1));
    $nilai_akhir = (($data['resume']) + ($data['pretest']) + ($data['uji_lisan']) + ($data['praktikum']) + ($data['postest']) + ($data['format']) + ($data['bab']) + ($data['kesimpulan']));
    if ($nilai_akhir >= 86 && $nilai_akhir <= 100) {
      $nilai_akhir_abjad = "A";
    } else if ($nilai_akhir >= 76 && $nilai_akhir <= 85) {
      $nilai_akhir_abjad = "AB";
    } else if ($nilai_akhir >= 66 && $nilai_akhir <= 75) {
      $nilai_akhir_abjad = "B";
    } else if ($nilai_akhir >= 61 && $nilai_akhir <= 65) {
      $nilai_akhir_abjad = "BC";
    } else if ($nilai_akhir >= 56 && $nilai_akhir <= 60) {
      $nilai_akhir_abjad = "C";
    } else if ($nilai_akhir >= 41 && $nilai_akhir <= 55) {
      $nilai_akhir_abjad = "D";
    } else if ($nilai_akhir >= 0 && $nilai_akhir <= 40) {
      $nilai_akhir_abjad = "E";
    }
    $data['nilai_akhir'] = $nilai_akhir;
    $data['nilai_akhir_abjad'] = $nilai_akhir_abjad;
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('nilai', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Nilai berhasil diubah!
          </div>');
    redirect(base_url('asisten/penilaian_detail/' . $modul_id . "/" . $id_kelompok));
  }

  public function accnilai($id, $id_kelompok)
  {
    $nilai = $this->db->get_where('nilai', ['id ' => $id])->row_array();
    if ($nilai['is_acc'] == 1) {
      $data = [
        'is_acc' => 0
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Nilai batal disetujui!
          </div>');
    } else if ($nilai['is_acc'] == 0) {
      $data = [
        'is_acc' => 1
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Nilai berhasil disetujui!
          </div>');
    }
    $this->db->where('id', $id);
    $this->db->update('nilai', $data);
    redirect(base_url('asisten/penilaian_detail/' . $nilai['modul'] . "/" . $id_kelompok));
  }

  public function absen()
  {
    $data['id_modul'] = $this->uri->segment(3);
    $data['id_kelompok'] = $this->uri->segment(4);
    $data['nama_kelompok'] = $this->db->get_where('kelompok', ['id' => $data['id_kelompok']])->row_array();
    $data['nama_modul'] = $this->db->get_where('modul', ['modul' =>  $data['id_modul']])->row_array();
    $this->load->model('Asisten_model');
    $data['modul'] = $this->db->get('modul')->result_array();
    $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
    $id_kelompok = $this->db->get_where('anggota_kelompok', ['nrp ' => $this->session->userdata('nrp')])->row_array();
    $data['kelompok'] = $this->db->get_where('kelompok', ['id' => $id_kelompok['no_kelompok']])->row_array();
    $data['status'] = $this->db->get('jadwal')->result_array();
    if (!$data['id_modul']) {
      $data['title'] = 'List Absen';
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('asisten/absen', $data);
      $this->load->view('template/footer');
    } else {
      if (!$data['id_kelompok']) {
        $data['kelompok'] = $this->Asisten_model->JumlahKelompok();
        $data['id_modul'] = $data['id_modul'];
        $data['title'] = $data['id_modul'];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('asisten/absenkelompok', $data);
        $this->load->view('template/footer');
      } else {
        $this->load->model('Asisten_model');
        $data['user'] = $this->db->get_where('user', ['nrp' => $this->session->userdata('nrp')])->row_array();
        $data['kelompok'] = $this->Asisten_model->Tampildetailkelompok($data['id_kelompok']);
        $data['absensi'] = $this->db->get_where('absensi', ['modul' => $data['id_modul']])->result_array();
        $data['title'] = $data['id_modul'] . " - " . $data['nama_kelompok']['no_kelompok'];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('asisten/detailabsen', $data);
        $this->load->view('template/footer');
      }
    }
  }

  public function getabsen()
  {
    $nrp = $this->input->post('nrp');
    $modul = $this->input->post('modul');

    echo json_encode($this->db->get_where('absensi', ['nrp' => $nrp, 'modul' => $modul])->row_array());
  }

  public function editabsen()
  {
    $modul = $this->input->post('modul', true);
    $nrp = $this->input->post('nrp', true);
    $keterangan = $this->input->post('keterangan', true);
    $kelompok = $this->input->post('kelompok', true);

    $ada = $this->db->get_where('absensi', ['modul' => $modul, 'nrp' => $nrp])->row_array();

    if ($ada) {
      if ($this->input->post('absen') == "hadir") {
        $data['keterangan'] = $keterangan;
        $data['time'] = time();
        $data['status'] = 0;

        $this->db->where('modul', $modul);
        $this->db->where('nrp', $nrp);
        $this->db->update('absensi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Absensi berhasil diubah!
          </div>');
        redirect(base_url('asisten/absen/') . $modul . "/" . $kelompok);
      } else {
        $data['keterangan'] = $keterangan;
        $data['time'] = time();
        $data['status'] = 1;

        $this->db->where('modul', $modul);
        $this->db->where('nrp', $nrp);
        $this->db->update('absensi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Absensi berhasil diubah!
          </div>');
        redirect(base_url('asisten/absen/') . $modul . "/" . $kelompok);
      }
    } else {
      if ($this->input->post('absen') == "hadir") {
        $data = [
          "nrp" => $nrp,
          "modul" => $modul,
          "time" => time(),
          "keterangan" => $keterangan,
          "status" => 0
        ];
        $data_nilai = [
          "nrp" => $nrp,
          "modul" => $modul,
          "is_acc" => 0
        ];
        $this->db->insert('absensi', $data);
        $this->db->insert('nilai', $data_nilai);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Absensi berhasil ditambahkan!
          </div>');
        redirect(base_url('asisten/absen/') . $modul . "/" . $kelompok);
      } else {
        $data = [
          "nrp" => $nrp,
          "modul" => $modul,
          "time" => time(),
          "keterangan" => $keterangan,
          "status" => 1
        ];
        $data_nilai = [
          "nrp" => $nrp,
          "modul" => $modul,
          "is_acc" => 0
        ];
        $this->db->insert('absensi', $data);
        $this->db->insert('nilai', $data_nilai);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Absensi berhasil ditambahkan!
          </div>');
        redirect(base_url('asisten/absen/') . $modul . "/" . $kelompok);
      }
    }
  }
}
