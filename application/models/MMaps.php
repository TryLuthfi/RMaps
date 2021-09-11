<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMaps extends CI_Model
{
    public function getData()
    {
        $data = $this->db->query('SELECT * FROM tb_peta');
        return $data;
    }
}
