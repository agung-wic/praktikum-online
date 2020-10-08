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
            WHERE  (((`user`.`role_id` = 8 OR `user`.`role_id`= 2) AND `anggota_kelompok` . `no_kelompok` = $no_kelompok)
            AND `user`.`name` LIKE '%$keyword%'
            OR `user`.`email` LIKE '%$keyword%'
            OR `user`.`nrp` LIKE '%$keyword%' 
            OR `user_role`.`role` LIKE '%$keyword%') LIMIT $limit OFFSET $start";
        } else {
            $query = "SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`nrp`, `user_role`.`role`  , `anggota_kelompok` . `no_kelompok` as 'no_kelompok'
              FROM `user` INNER JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` INNER JOIN `anggota_kelompok` ON `user`.`nrp` = `anggota_kelompok`.`nrp` WHERE (`user`.`role_id` = 8 OR `user`.`role_id`= 2 ) AND `anggota_kelompok` . `no_kelompok` = $no_kelompok LIMIT $limit OFFSET $start";
        }
        return $this->db->query($query)->result_array();
    }

    public function JumlahKelompok()
    {
        $query = "SELECT `kelompok`.`no_kelompok`, `kelompok`.`id`  
                FROM `kelompok` LEFT JOIN `anggota_kelompok` 
                ON `kelompok`.`id` = `anggota_kelompok`.`no_kelompok` GROUP BY `no_kelompok`";

        return $this->db->query($query)->result_array();
    }

    


      
      
        public function TampilJadwal($limit, $start, $keyword = null)
        {
          $keyword = $this->input->post('keyword1', true);
          if ($keyword) {
            $query = "SELECT `jadwal`.`id`,  `user`.`nrp`, `user`.`name` as `name`, `modul`.`name` as `modul`, `jadwal`.`jadwal`
                    FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
                    INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`
                    WHERE `user`.`name` LIKE '%$keyword%'
                    OR `modul`.`name` LIKE '%$keyword%'
                    OR `jadwal`.`jadwal` LIKE '%$keyword%' ";
          } else {
            $query = "SELECT `jadwal`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
                    FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
                    INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id` LIMIT $limit OFFSET $start";
          }
          return $this->db->query($query)->result_array();
        }
      
        public function JumlahJadwal()
        {
          $query = "SELECT `jadwal`.`id`, `user`.`name` as 'name', `user`.`nrp`, `modul`.`modul` as 'modul_id', `modul`.`name` as 'modul', `jadwal`.`jadwal`
                    FROM `user` INNER JOIN `jadwal` ON `user`.`nrp` = `jadwal`.`nrp` 
                    INNER JOIN `modul` ON `modul`.`modul` = `jadwal`.`modul_id`";
      
          return $this->db->query($query)->num_rows();
        }
      
        public function TampilPengumuman($limit, $start)
        {
          $query = "SELECT `pengumuman`.`id`,`pengumuman`.`judul`, `user`.`name` as 'name', `user`.`nrp`, `pengumuman`.`isi`, `pengumuman`.`tanggal`
                    FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp`LIMIT $limit OFFSET $start";
      
          return $this->db->query($query)->result_array();
        }
      
        public function JumlahPengumuman()
        {
          $query = "SELECT `pengumuman`.`id`,`pengumuman`.`judul`, `user`.`name` as 'name', `user`.`nrp`, `pengumuman`.`isi`, `pengumuman`.`tanggal`
                    FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp`";
      
          return $this->db->query($query)->num_rows();
        }
      
        public function EditPengumuman()
        {
          $id = $this->input->post('id', true);
          $query = "SELECT `pengumuman`.`id`,`pengumuman`.`judul`, `user`.`name` as 'name', `user`.`nrp`, `pengumuman`.`isi`, `pengumuman`.`tanggal`
                    FROM `user` INNER JOIN `pengumuman` ON `user`.`nrp` = `pengumuman`.`nrp` WHERE `pengumuman`.`id`='$id'";
      
          return $this->db->query($query)->row_array();
        }
      
        public function CariJadwal()
        {
          $keyword = $this->input->post('keyword1', true);
      
          $query = "SELECT `jadwal`.`id`,  `user`.`nrp`, `user`.`name` as `name`, `modul`.`name` as `modul`, `jadwal`.`jadwal`
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
      
        public function TampilUserOnline($limit, $start)
        {
          $query = "SELECT * FROM `user` 
                    WHERE `is_online`= 1 AND `role_id`= 2 LIMIT $limit OFFSET $start ";
      
          return $this->db->query($query)->result_array();
        }
      
        public function JumlahUserOnline()
        {
          $query = "SELECT * FROM `user` 
                    WHERE `is_online`= 1 AND `role_id`= 2";
      
          return $this->db->query($query)->num_rows();
        }
      }
      
}
