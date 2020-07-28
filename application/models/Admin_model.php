<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function CariUser()
  {
    $keyword = $this->input->post('keyword', true);

    $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` 
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` 
              WHERE `user`.`name` LIKE '%$keyword%'
              OR `user`.`email` LIKE '%$keyword%'
              OR `user`.`nrp` LIKE '%$keyword%' 
              OR `user_role`.`role` LIKE '%$keyword%' ";

    return $this->db->query($query)->result_array();
  }

  public function TampilUser()
  {
    $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` 
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`";

    return $this->db->query($query)->result_array();
  }

  public function TampilJadwal()
  {
    $query = "SELECT `jadwal`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
              FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`";

    return $this->db->query($query)->result_array();
  }

  public function TampilPengumuman()
  {
    $query = "SELECT `pengumuman`.`judul`, `user`.`name` as 'name', `user`.`nrp`, `pengumuman`.`isi`, `pengumuman`.`tanggal`
              FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp`";

    return $this->db->query($query)->result_array();
  }

  public function CariJadwal()
  {
    $keyword = $this->input->post('keyword', true);

    $query = "SELECT `jadwal`.`id`, `user`.`name` as `name`, `modul`.`name` as `modul`, `jadwal`.`jadwal`
              FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`
              WHERE `user`.`name` LIKE '%$keyword%'
              OR `modul`.`name` LIKE '%$keyword%'
              OR `jadwal`.`jadwal` LIKE '%$keyword%'";

    return $this->db->query($query)->result_array();
  }

  public function TampilReqJadwal()
  {
    $query = "SELECT `req_jadwal`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `req_jadwal`.`jadwal_old`
              FROM `user` INNER JOIN `req_jadwal` ON `user`.`nrp` = `req_jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `req_jadwal`.`modul_id` WHERE `req_jadwal`.`is_approved`=0";

    return $this->db->query($query)->result_array();
  }

  public function DetailJadwal($id)
  {
    $query = "SELECT `req_jadwal`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', 
              `modul`.`name` as 'modul', `req_jadwal`.`jadwal_old`, `req_jadwal`.`jadwal_new`, `req_jadwal`.`ket` 
              FROM `user` INNER JOIN `req_jadwal` ON `user`.`nrp` = `req_jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `req_jadwal`.`modul_id` WHERE `req_jadwal`.`id` = '$id'
              ";

    return $this->db->query($query)->row_array();
  }

  public function CariReqJadwal()
  {
    $keyword = $this->input->post('keyword2', true);

    $query = "SELECT `req_jadwal`.`id`, `user`.`nrp`, `user`.`name` as `name`, `modul`.`name` as `modul`, `req_jadwal`.`jadwal_old`
              FROM `user` INNER JOIN `req_jadwal` ON `user`.`nrp` = `req_jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `req_jadwal`.`modul_id`
              WHERE `req_jadwal`.`is_approved`=0 AND (`user`.`name` LIKE '%$keyword%'
              OR `modul`.`name` LIKE '%$keyword%'
              OR `req_jadwal`.`nrp` LIKE '%$keyword%'
              OR `req_jadwal`.`jadwal_old` LIKE '%$keyword%')";

    return $this->db->query($query)->result_array();
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
}
