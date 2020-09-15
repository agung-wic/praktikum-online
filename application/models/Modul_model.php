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
}
