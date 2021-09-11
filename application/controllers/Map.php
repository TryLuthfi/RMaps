<?php
class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MMaps');
        $this->load->library('googlemaps');
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
        foreach ($real->result() as $row) {
            $lat =  $row->lat_peta;
            $long =  $row->long_peta;
            $marker['position'] = "$lat,$long";
            $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('Map/Index', $data);
    }
}
