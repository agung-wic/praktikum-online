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

    public function TampilUser($limit, $start, $keyword = null, $no_kelompok)
    {
        if ($keyword) {
            $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role` , `anggota_kelompok` . `no_kelompok` as 'no_kelompok'
            FROM `user` 
            INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` 
            INNER JOIN `anggota_kelompok` ON `user`.`nrp` = `anggota_kelompok`.`nrp`
            WHERE `user`.`role_id` = 8 AND `user`.`role_id`= 2 
            AND `user`.`name` LIKE '%$keyword%'
            OR `user`.`email` LIKE '%$keyword%'
            OR `user`.`nrp` LIKE '%$keyword%' 
            OR `user_role`.`role` LIKE '%$keyword%' LIMIT $limit OFFSET $start";
        } else {
            $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role`  , `anggota_kelompok` . `no_kelompok` as 'no_kelompok'
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` INNER JOIN `anggota_kelompok` ON `user`.`nrp` = `anggota_kelompok`.`nrp` WHERE `user`.`role_id` = 8 OR `user`.`role_id`= 2 AND `anggota_kelompok` . `no_kelompok` = $no_kelompok LIMIT $limit OFFSET $start";
        }
        return $this->db->query($query)->result_array();
    }

    public function JumlahKelompok()
    {
        $query = "SELECT COUNT(`anggota_kelompok`.`nrp`) AS jumlah , `kelompok`.`no_kelompok`, `kelompok`.`id`  
                FROM `kelompok` LEFT JOIN `anggota_kelompok` 
                ON `kelompok`.`id` = `anggota_kelompok`.`no_kelompok` GROUP BY `no_kelompok`";

        return $this->db->query($query)->result_array();
    }
}
