<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MNeracaStok extends CI_Model
{
    public function getData()
    {
        $now = date('Y-m-d');
        $kas = $this->db->query("SELECT tb_kode_stok.id_kode, tb_kode_stok.keterangan_kode, (SELECT COALESCE(SUM(total) ,0) as total from tb_stok WHERE jenis = 'Pemasukan' AND tb_stok.id_kode = tb_kode_stok.id_kode)-(SELECT COALESCE(SUM(total) , 0)as total from tb_stok WHERE jenis = 'Pengeluaran' AND tb_stok.id_kode = tb_kode_stok.id_kode) as total from tb_stok RIGHT JOIN tb_kode_stok on tb_kode_stok.id_kode = tb_stok.id_kode GROUP BY tb_kode_stok.id_kode ")->result_array();
        return $kas;
    }

    public function addData($data_array)
    {
        $res = $this->db->insert("tb_stok", $data_array);
        return $res;
    }

    public function deleteData($id)
    {
        $res = $this->db->delete("tb_stok", $id);
        return $res;
    }

    public function updateData($data_array, $id)
    {
        $res = $this->db->update("tb_stok", $data_array, $id);
        return $res;
    }
}
