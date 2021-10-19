<?php
class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MMaps');
        $this->load->library('Googlemaps');
    }
    function index()
    {

        $config = array();
        $config['center'] = "-8.0292124,112.6274501";
        $config['zoom'] = 14;
        $config['map_height'] = "700px";
        $this->googlemaps->initialize($config);

        $marker = array();

        $real = $this->MMaps->getData();

        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_marker();
        foreach ($real->result() as $row) {
            $lat =  $row->lat_peta;
            $long =  $row->long_peta;
            $marker['position'] = "$lat,$long";
            $marker['icon_scaledSize'] = "30,30";
            if ($row->status == '0') {
                $marker['icon'] = '';
            } else {
                $marker['icon'] = $row->marker_url;
            }
            $marker['infowindow_content'] = '<strong>' . $row->nama_lokasi . '</strong> <li>' . $row->alamat_lokasi . ' </li><li>' . $row->no_hp . ' </li>' . '<li>' . $row->lat_peta . " - " . $row->long_peta . ' </li>';
            $marker['title'] = $row->status;
            $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('Map/Index', $data);
    }

    function get_asu()
    {
        $data = $this->MMaps->getData()->result();

        echo json_encode($data);
    }
}
