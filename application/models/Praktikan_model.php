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
    FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp`";

    return $this->db->query($query)->result_array();
  }

  public function PenilaianPraktikan($id)
  {
    $query = "SELECT `nilai`.`id`, `user`.`name` as 'name_praktikan', `user`.`nrp`, `modul`.`modul` as 'modul_id', 
              `modul`.`name` as 'modul', `nilai`.`laporan`, `nilai`.`laporan_time`, `nilai`.`is_acc`, `nilai`.`asisten`, `nilai`.`nilai`
              FROM `user`   INNER JOIN `nilai` ON `user`.`nrp` = `nilai`.`nrp`
              INNER JOIN `modul` ON `modul`.`modul` = `nilai`.`modul` WHERE `nilai`.`nrp`=$id";

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
    $query = "SELECT `modul`.`modul`, `modul`.`name`, `jadwal`.`status`, `jadwal`.`nrp` FROM `modul` 
              LEFT JOIN `jadwal` ON `modul`.`modul` = `jadwal`.`modul_id`
              WHERE `jadwal`.`nrp`=$id AND `jadwal`.`status`=1
              ORDER BY `modul`.`modul` ASC";

    return $this->db->query($query)->result_array();
  }
}
