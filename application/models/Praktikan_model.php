<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_model extends CI_Model
{
  public function JadwalPraktikan($id)
  {
    $query = "SELECT `jadwal`.`id`, `req_jadwal`.`is_approved`, `user`.`name` as 'name', `user`.`nrp`, 
              `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
              FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
              INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`
              LEFT JOIN `req_jadwal` ON `jadwal`.`nrp`=`req_jadwal`.`nrp` AND `jadwal`.`modul_id` = `req_jadwal`.`modul_id` 
              WHERE `user`.`nrp`=$id";

    return $this->db->query($query)->result_array();
  }
}
