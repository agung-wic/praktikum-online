<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
  public function TampilNilai($id)
  {
    $query = "SELECT `nilai`.`id`, `user`.`name` as 'name_praktikan', `user`.`nrp`, `modul`.`modul` as 'modul_id',
              `modul`.`name` as 'modul', `nilai`.`laporan`, `nilai`.`laporan_time`, `nilai`.`is_acc`, `nilai`.`asisten`, `nilai`.`nilai`
              FROM `user`   INNER JOIN `nilai` ON `user`.`nrp` = `nilai`.`nrp`
              INNER JOIN `modul` ON `modul`.`modul` = `nilai`.`modul` HAVING `modul_id` = '$id'";

    return $this->db->query($query)->result_array();
  }

  public function TampilNilaiPraktikan($id)
  {
    $query = "SELECT `nilai`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', 
              `modul`.`name` as 'modul'
              FROM `user`   INNER JOIN `nilai` ON `user`.`nrp` = `nilai`.`nrp`
              INNER JOIN `modul` ON `modul`.`modul` = `nilai`.`modul` WHERE `nilai`.`id`=$id";

    return $this->db->query($query)->row_array();
  }

  public function TampilModul()
  {
    return $this->db->get('modul')->result_array();
  }

  public function EditModul($id)
  {
    return $this->db->get_where('modul', ['id' => $id])->row_array();
  }
}
