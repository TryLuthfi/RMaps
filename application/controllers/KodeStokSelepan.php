<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KodeStokSelepan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MKodeStokSelepan');
    }

    public function index()
    {
        $data['title'] = 'Data Maps';
        $data['kodestokselepan'] = $this->MKodeStokSelepan->getData();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Menu');
        $this->load->view('KodeStokSelepan/Index', $data);
        $this->load->view('Templates/03_Footer');
        $this->load->view('Templates/99_JS');
    }

    public function add()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $hasil = array(
            'keterangan_kode' => $_POST['jenis']
        );

        $res = $this->MKodeStokSelepan->addData($hasil);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("KodeStokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("KodeStokSelepan");
        }
    }

    public function delete($id)
    {
        $id_barang = array('id_kode' => $id);
        $res = $this->MKodeStokSelepan->deleteData($id_barang);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("KodeStokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("KodeStokSelepan");
        }
    }

    public function edit()
    {
        $hasil = array(
            'keterangan_kode' => $_POST['jenis']
        );

        $where = array('id_kode' => $_POST['id_kode']);

        $res = $this->MKodeStokSelepan->updateData($hasil, $where);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("KodeStokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("KodeStokSelepan");
        }
    }
}
