<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StokSelepan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MStokSelepan');
    }

    public function index()
    {
        $data['title'] = 'Data Maps';
        $data['stokselepan'] = $this->MStokSelepan->getData();
        $data['kode_stok'] = $this->db->get('tb_kode_stok')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Menu');
        $this->load->view('StokSelepan/Index', $data);
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
            'id_kode' => $_POST['jenis_stok'],
            'jenis' => $_POST['keterangan'],
            'keterangan' => $_POST['jenis_produksi'],
            'total' => $_POST['jumlah'],
            'tanggal' => $_POST['tanggal']
        );

        $res = $this->MStokSelepan->addData($hasil_data);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("StokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("StokSelepan");
        }
    }

    public function edit()
    {
        $data_array = array(
            'id_kode' => $_POST['jenis_stok'],
            'jenis' => $_POST['keterangan'],
            'keterangan' => $_POST['jenis_produksi'],
            'total' => $_POST['jumlah'],
            'tanggal' => $_POST['tanggal']
        );

        $where = array('id_stok' => $_POST['id_stok']);

        $res = $this->MStokSelepan->updateData($data_array, $where);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("StokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("StokSelepan");
        }
    }

    public function delete($id)
    {
        $id_barang = array('id_stok' => $id);
        $res = $this->MStokSelepan->deleteData($id_barang);

        if ($res >= 1) {
            $this->session->set_flashdata('status', 'sukses');
            redirect("StokSelepan");
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect("StokSelepan");
        }
    }

    public function search()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $tgl = $_POST['date'];
        $keterangan = $_POST['keterangan'];

        $tglpecah = explode(" - ", $tgl);
        $start = $tglpecah[0];
        $end = $tglpecah[1];
        $kalStart = implode("", array($start));
        $kalEnd = implode("", array($end));
        $awal = date('Y-m-d', strtotime($kalStart));
        $akhir = date('Y-m-d', strtotime($kalEnd));

        echo "<script>console.log('$tgl');</script>";
        echo "<script>console.log('$awal');</script>";
        echo "<script>console.log('$akhir');</script>";
        echo "<script>console.log('$keterangan');</script>";


        if ($keterangan == 'pilih') {
            $data['title'] = 'Data Maps';
            $data['stokselepan'] = $this->db->query("select * from tb_stok join tb_kode_stok on tb_kode_stok.id_kode = tb_stok.id_kode where tb_stok.tanggal >= '$awal' AND tb_stok.tanggal <= '$akhir' order by id_stok asc")->result_array();
            $data['kode_stok'] = $this->db->get('tb_kode_stok')->result_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/02_Menu');
            $this->load->view('StokSelepan/Index', $data);
            $this->load->view('Templates/03_Footer');
            $this->load->view('Templates/99_JS');
        } else {
            $data['title'] = 'Data Maps';
            $data['stokselepan'] = $this->db->query("select * from tb_stok join tb_kode_stok on tb_kode_stok.id_kode = tb_stok.id_kode where tb_stok.tanggal >= '$awal' AND tb_stok.tanggal <= '$akhir' AND jenis = '$keterangan' order by id_stok asc")->result_array();
            $data['kode_stok'] = $this->db->get('tb_kode_stok')->result_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/02_Menu');
            $this->load->view('StokSelepan/Index', $data);
            $this->load->view('Templates/03_Footer');
            $this->load->view('Templates/99_JS');
        }
    }
}
