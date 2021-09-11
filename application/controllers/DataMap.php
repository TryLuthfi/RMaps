<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MDataMap');
    }

    public function index()
    {
        $data['title'] = 'Data Maps';
        $data['datamaps'] = $this->MDataMap->getData();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Menu');
        $this->load->view('DataMap/Index', $data);
        $this->load->view('Templates/03_Footer');
        $this->load->view('Templates/99_JS');
    }

    private function filter(array $data, $key)
    {
        return array_filter($data, function ($value) use ($key) {
            return $value['kode_rincian'] === $key;
        });
    }

    public function add()
    {

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $hasil_data = array(
            'nama_lokasi' => $_POST['nama_lokasi'],
            'alamat_lokasi' => $_POST['alamat_lokasi'],
            'no_hp' => $_POST['no_hp'],
            'lat_peta' => $_POST['latitude'],
            'long_peta' => $_POST['longitude']
        );

        $res = $this->MDataMap->addData($hasil_data);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("DataMap");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("DataMap");
        }
    }

    public function edit()
    {

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $data_array = array(
            'nama_lokasi' => $_POST['nama_lokasi'],
            'alamat_lokasi' => $_POST['alamat_lokasi'],
            'no_hp' => $_POST['no_hp'],
            'lat_peta' => $_POST['latitude'],
            'long_peta' => $_POST['longitude']
        );

        $where = array('id_peta' => $_POST['id_peta']);

        $res = $this->MDataMap->updateData($data_array, $where);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("DataMap");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("DataMap");
        }
    }

    public function delete($id)
    {
        $id_barang = array('id_peta' => $id);
        $res = $this->MDataMap->deleteData($id_barang);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("DataMap");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("DataMap");
        }
    }
}
