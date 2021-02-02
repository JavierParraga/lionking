<?php
defined('BASEPATH') or exit('No direct script allowed');

class Meses extends CI_Controller
{

    public function mes($mes)
    {

        $this->load->helper('utilidades');

        echo json_encode(obtener_mes($mes));

    }

}
