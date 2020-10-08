<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul_model extends CI_Model
{
    public function TampilModul()
    {
        return $this->db->get('modul')->result_array();
    }

    public function EditModul($id)
    {
        return $this->db->get_where('modul', ['id' => $id])->row_array();
    }

    public function JumlahUser()
    {
        $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` 
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`";

        return $this->db->query($query)->num_rows();
    }

    public function TampilUser($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` 
            FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` 
            WHERE `user`.`name` LIKE '%$keyword%'
            OR `user`.`email` LIKE '%$keyword%'
            OR `user`.`nrp` LIKE '%$keyword%' 
            OR `user_role`.`role` LIKE '%$keyword%' LIMIT $limit OFFSET $start ";
        } else {
            $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` 
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` LIMIT $limit OFFSET $start";
        }
        return $this->db->query($query)->result_array();
    }
}
