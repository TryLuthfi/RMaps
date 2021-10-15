<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKodeStokSelepan extends CI_Model
{
    public function getData()
    {
        $data = $this->db->query('select * from tb_kode_stok')->result_array();
        return $data;
    }

    public function addData($data_array)
    {
        $res = $this->db->insert("tb_kode_stok", $data_array);
        return $res;
    }

    public function deleteData($id)
    {
        $res = $this->db->delete("tb_kode_stok", $id);
        return $res;
    }

    public function updateData($data_array, $id)
    {
        $res = $this->db->update("tb_kode_stok", $data_array, $id);
        return $res;
    }
}
