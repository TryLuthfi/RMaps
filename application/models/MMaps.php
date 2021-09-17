<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMaps extends CI_Model
{
    public function getData()
    {
        $this->db->join('tb_status', 'tb_peta.status = tb_status.id_status', 'left');
        $data = $this->db->get('tb_peta');
        return $data;
    }
}
