<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDataMap extends CI_Model
{
    public function getData()
    {
        $data = $this->db->query('SELECT * FROM tb_peta')->result_array();
        return $data;
    }

    public function addData($data_array)
    {
        $res = $this->db->insert("tb_peta", $data_array);
        return $res;
    }

    public function deleteData($id)
    {
        $res = $this->db->delete("tb_peta", $id);
        return $res;
    }

    public function updateData($data_array, $id)
    {
        $res = $this->db->update("tb_peta", $data_array, $id);
        return $res;
    }
}
