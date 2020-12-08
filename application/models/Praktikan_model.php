<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_model extends CI_Model
{
  public function JadwalPraktikan($id, $limit, $start)
  {
    $query = "SELECT `jadwal`.`id`, `req_jadwal`.`is_approved`, `user`.`name` as 'name', `user`.`nrp`, 
              `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
              FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`
              LEFT JOIN `req_jadwal` ON `jadwal`.`nrp`=`req_jadwal`.`nrp` AND `jadwal`.`modul_id` = `req_jadwal`.`modul_id` 
              WHERE `user`.`nrp`=$id LIMIT $limit OFFSET $start";

    return $this->db->query($query)->result_array();
  }

  public function JumlahJadwal($id)
  {
    $query = "SELECT `jadwal`.`id`, `req_jadwal`.`is_approved`, `user`.`name` as 'name', `user`.`nrp`, 
              `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
              FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`
              LEFT JOIN `req_jadwal` ON `jadwal`.`nrp`=`req_jadwal`.`nrp` AND `jadwal`.`modul_id` = `req_jadwal`.`modul_id` 
              WHERE `user`.`nrp`=$id";

    return $this->db->query($query)->num_rows();
  }

  public function TampilJadwalPraktikan()
  {
    $id = $this->input->post('id', true);
    $query = "SELECT `jadwal`.`id`, `user`.`name` as 'name',`user`.`nrp`, `modul`.`modul` as 'modul_id', 
              `modul`.`name` as 'modul', `jadwal`.`jadwal` FROM `user` 
              INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id` 
              WHERE `jadwal`.`id`='$id'";

    return $this->db->query($query)->row_array();
  }

  public function TampilPengumuman()
  {
    $query = "SELECT `pengumuman`.`id`,`pengumuman`.`judul`, `user`.`name` as 'name', `user`.`nrp`, `pengumuman`.`isi`, `pengumuman`.`tanggal`
              FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp` ORDER BY `pengumuman`.`tanggal` DESC";

    return $this->db->query($query)->result_array();
  }

  public function Tampildetailkelompok($id)
  {
    $query = "SELECT `anggota_kelompok`.`id`, `kelompok`.`no_kelompok` as `nama_kelompok` , `anggota_kelompok`.`nrp` as `nrp` , `user`.`name` as 'name' , `anggota_kelompok`.`no_kelompok` FROM `anggota_kelompok` 
              INNER JOIN `user` ON `anggota_kelompok`.`nrp` = `user`.`nrp`
              INNER JOIN `kelompok` ON `anggota_kelompok`.`no_kelompok` = `kelompok`.`id`
              WHERE `anggota_kelompok`.`no_kelompok`= $id
              ORDER BY `user`.`nrp` ASC";

    return $this->db->query($query)->result_array();
  }

  public function TampilNilaiPraktikan($id)
  {
    $query = "SELECT `nilai`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', 
              `nilai` . `resume` as 'resume' , `nilai` . `pretest` as 'pretest' , `nilai` . `uji_lisan` as 'uji_lisan' , `nilai` . `praktikum` as 'praktikum' , 
              `nilai` . `postest` as 'postest' , `nilai` . `format` as 'format' , `nilai` . `bab` as 'bab' , `nilai` . `kesimpulan` as 'kesimpulan' , `nilai` . `nilai_akhir` as `nilai_akhir`, `nilai` . `nilai_akhir_abjad` as `nilai_akhir_abjad`
              FROM `user` INNER JOIN `nilai` ON `user`.`nrp` = `nilai`.`nrp`
              INNER JOIN `modul` ON `modul`.`modul` = `nilai`.`modul` WHERE `nilai`.`id`=$id";

    return $this->db->query($query)->row_array();
  }

  public function PenilaianPraktikan($id)
  {
    $query = "SELECT `nilai`.`id`, `user`.`name` as 'name_praktikan', `user`.`nrp`, `modul`.`modul` as 'modul_id', 
              `modul`.`name` as 'modul', `nilai`.`laporan`, `nilai`.`laporan_time`, `nilai`.`is_acc`, `nilai`.`asisten`,
              `nilai` . `resume` as 'resume' , `nilai` . `pretest` as 'pretest' , `nilai` . `uji_lisan` as 'uji_lisan' , `nilai` . `praktikum` as 'praktikum' , 
              `nilai` . `postest` as 'postest' , `nilai` . `format` as 'format' , `nilai` . `bab` as 'bab' , `nilai` . `kesimpulan` as 'kesimpulan' , `nilai` . `nilai_akhir` as `nilai_akhir`, `nilai` . `nilai_akhir_abjad` as `nilai_akhir_abjad`
              FROM `user`   INNER JOIN `nilai` ON `user`.`nrp` = `nilai`.`nrp`
              INNER JOIN `modul` ON `modul`.`modul` = `nilai`.`modul` WHERE `nilai`.`nrp`=$id ORDER BY `modul`.`modul` ASC;

    return $this->db->query($query)->result_array();
  }

  public function TampilModul($id)
  {
    $query = "SELECT `modul`.`modul`, `modul`.`name`, `modul`.`tujuan`,`modul`.`time`, `jadwal`.`status`, `jadwal`.`nrp` FROM `modul` 
              LEFT JOIN `jadwal` ON `modul`.`modul` = `jadwal`.`modul_id`
              WHERE (`jadwal`.`nrp`=$id OR `jadwal`.`nrp` IS NULL) 
              ORDER BY `modul`.`modul` ASC";

    return $this->db->query($query)->result_array();
  }

  public function TampilModulLaporan($id)
  {
    $query = "SELECT `modul`.`modul`, `modul`.`name`, `jadwal`.`status`, `jadwal`.`nrp`,`nilai`.`is_acc` FROM modul 
              LEFT JOIN jadwal ON `modul`.`modul` = `jadwal`.`modul_id`
              LEFT JOIN nilai ON `jadwal`.`nrp` = `nilai`.`nrp` AND `modul`.`modul` = `nilai`.`modul`
              WHERE `jadwal`.`nrp`= $id AND (`nilai`.`is_acc`= 0 OR `nilai`.`is_acc`IS NULL) AND  `jadwal`.`status` = 1
              ORDER BY `modul`.`modul` ASC";

    return $this->db->query($query)->result_array();
  }

  public function TampilKelompok($id)
  {
    $query = "SELECT `user`.`name`, `anggota_kelompok`.`nrp` 
              FROM `anggota_kelompok` INNER JOIN `user` ON `anggota_kelompok`.`nrp` = `user`.`nrp`
              WHERE `anggota_kelompok`.`no_kelompok` = $id";

    return $this->db->query($query)->result_array();
  }

  public function TampilKelompokModul($id)
  {
    $query = "SELECT `modul`.`modul`, `modul`.`name`, `jadwal`.`status`, `jadwal`.`nrp`,`nilai`.`is_acc` FROM modul 
              LEFT JOIN jadwal ON `modul`.`modul` = `jadwal`.`modul_id`
              LEFT JOIN nilai ON `jadwal`.`nrp` = `nilai`.`nrp` AND `modul`.`modul` = `nilai`.`modul`
              WHERE `jadwal`.`nrp`= $id AND `nilai`.`is_acc`= 0
              ORDER BY `modul`.`modul` ASC";

    return $this->db->query($query)->result_array();
  }

  public function KelompokAsisten($id)
  {
    $query = "SELECT `kelompok_asisten`.`id` , `kelompok_asisten`.`no_kelompok` as `no_kelompok`, `kelompok_asisten`.`nrp` as `nrp` , `kelompok_asisten`.`id_modul` as `id_modul` , `user`.`name`,`kelompok`.`no_kelompok` 
              FROM `kelompok_asisten` 
              INNER JOIN `user` ON `user`.`nrp` = `kelompok_asisten`.`nrp` 
              INNER JOIN `kelompok` ON `kelompok`.`id` = `kelompok_asisten`.`no_kelompok` 
              INNER JOIN `modul` ON `modul`.`modul` = `kelompok_asisten`.`id_modul` 
              WHERE `kelompok`.`id` = $id ORDER BY `kelompok_asisten`.`id_modul`";

    return $this->db->query($query)->result_array();
  }
}
