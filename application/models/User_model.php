<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
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
