<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NeracaStok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MNeracaStok');
    }

    public function index()
    {
        $data['title'] = 'Data Maps';
        $data['kode_stok'] = $this->MNeracaStok->getData();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Menu');
        $this->load->view('NeracaStok/Index', $data);
        $this->load->view('Templates/03_Footer');
        $this->load->view('Templates/99_JS');
    }
}
