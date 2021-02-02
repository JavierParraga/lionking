<?php
require APPPATH . '/libraries/REST_Controller.php';
class Clientes extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Clientes_models');
        $this->load->helper('utilidades');
        $this->load->helper('paginacion');

    }

    public function cliente_get()
    {
        $cliente_id = $this->uri->segment(3);

        if (!isset($cliente_id)) {
            $respuesta = array(
                'err' => true, 'mensaje' => 'Debe indicar un parametro',
            );
            $this->response($respuesta, Rest_Controller::HTTP_BAD_REQUEST);
            return;
        }
        $cliente = $this->Clientes_models->get_cliente($cliente_id);
        $this->response($cliente);
        return;
    }

    // $cliente=$this->clientes_models->get_cliente
    
    
    public function usersInt_get()
    {

        $this->db->order_by('intentos ASC');
        $this->db->limit(10);
        $query = $this->db->get('users');

        if (!isset($query)) {

            $data = array(
                'error' => TRUE,
                'message' => 'No es posible conectarse con la base de datos',
                'data' => NULL,
            );

            $this->response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        } else {

            if ($query->result() == [] || $query->result() == null) {

                $data = array(
                    'error' => TRUE,
                    'message' => 'No hay registros',
                    'data' => [],
                );

                $this->response($data, REST_Controller::HTTP_NOT_FOUND);
            } else {

                $data = array(
                    'error' => FALSE,
                    'message' => 'Registros leidos correctamente',
                    'data' => $query->result(),
                );

                $this->response($data, REST_Controller::HTTP_OK);
            }
        }
    }
    public function usersTime_get()
    {

        $this->db->order_by(' tiempo ASC');
        $this->db->limit(10);
        $query = $this->db->get('users');

        if (!isset($query)) {

            $data = array(
                'error' => TRUE,
                'message' => 'No es posible conectarse con la base de datos',
                'data' => NULL,
            );

            $this->response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        } else {

            if ($query->result() == [] || $query->result() == null) {

                $data = array(
                    'error' => TRUE,
                    'message' => 'No hay registros',
                    'data' => [],
                );

                $this->response($data, REST_Controller::HTTP_NOT_FOUND);
            } else {

                $data = array(
                    'error' => FALSE,
                    'message' => 'Registros leidos correctamente',
                    'data' => $query->result(),
                );

                $this->response($data, REST_Controller::HTTP_OK);
            }
        }
    }
    public function user_put()
    { //cojo los datos que me pasan por el put
        $data = $this->put();
        //Cargo la libreria
        $this->load->library("form_validation");
        //Le digo al form validationque datos debe validar
        $this->form_validation->set_data($data);
        //aplico la validacion a un campo, etiqueta y regla
        $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[3]');
        $this->form_validation->set_rules('intentos', 'intentos', 'required');
        $this->form_validation->set_rules('tiempo', 'tiempo', 'required');
        //True:todo ok, false:Errores validacion
        if ($this->form_validation->run()) {

            if ($this->db->insert("users", $data)) {
                $respuesta = array(
                    "err" => false,
                    "mensaje" => "Registro insertado correctamente",
                    "cliente_id" => $this->db->insert_id(),

                );
                $this->response($respuesta, REST_Controller::HTTP_ACCEPTED);
            } else {
                $respuesta = array(
                    "err" => false,
                    "mensaje" => "Registro insertado correctamente",
                    "cliente_id" => $this->db->insert_id(),

                );
                $this->response($respuesta, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }

        } else {
        $this->response($respuesta, REST_Controller::HTTP_BAD_REQUEST);
    }

}
}
