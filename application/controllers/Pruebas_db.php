<?php
defined('BASEPATH') or exit("NO DIRECT SCIPT ACCESS ALLOWED");

class Pruebas_db extends CI_Controller
{

    public function clientes_beta($sid)
    {

        $this->load->database();

        $query = $this->db->query('SELECT id,nombre,correo FROM clientes WHERE id=' . $sid);

        foreach ($query->result() as $row) {
            echo $row->id;
            echo " ";
            echo $row->nombre;
            echo " ";
            echo $row->correo;
            echo " \n";

        }

        echo 'Total registros: ' . $query->num_rows();
    }

}
