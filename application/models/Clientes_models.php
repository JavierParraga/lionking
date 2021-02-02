<?php

class Clientes_models extends CI_Model
{
    public $id;
    public $nombre;
    public $activo;
    public $correo;
    public $zip;
    public $telefono1;
    public $telefono2;
    public $pais;
    public $direccion;

    public function get_cliente($id)
    {
        $this->db->where(array('id' => $id, 'activo' => 1));
        $query = $this->db->get('clientes');
        $fila = $query->custom_row_object(0, 'Clientes_models');
        if (isset($fila)) {$fila->id = intval($fila->id);
            $fila->activo = intval($fila->activo);
            $fila->zip = intval($fila->zip);}
        return $fila;

    }

}
