<?php
defined('BASEPATH') or exit('No direct script allowed');
class Blog extends CI_Controller
{
    public function index()
    {
        echo "HELLO WORLD ESTO FUFA";
    }

    public function comentarios($id)
    {
        $comentarios = array(
            array('id' => 0, 'mensaje' => 'Primer mensaje'),
            array('id' => 1, 'mensaje' => 'Segundo mensaje'),
            array('id' => 2, 'mensaje' => 'Tercer mensaje'),
            array('id' => 3, 'mensaje' => 'Cuarto mensaje'),
        );

        echo json_encode($comentarios[$id]);
    }
}
