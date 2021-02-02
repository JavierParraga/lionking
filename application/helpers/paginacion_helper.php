<?php
function paginar_todo($tabla, $pagina = 1, $por_Pagina)
{$ci = &get_instance();
    $ci->load->database();
    if (!isset($por_pagina)) {
        $por_pagina = 20;
    }
    if (!isset($pagina)) {$pagina = 1;
        $total_cli = $this->db->count_all("clientes");
        $total_pag = ceil($total_cli / $por_pagina);
    }

    if ($pagina > $total_pag) {$pagina = $total_pag;}

    $pagina -= 1;

    $desde = $pagina * $por_pagina;

    if ($pagina >= $total_pag - 1) {
        $pag_siguiente = 1;
    } else {
        $pag_siguiente = $pagina + 2;
    }

    if ($pagina < 1) {$pag_anterior = $total_pag;} else { $pag_anterior = $pagina;}

    $query = $this->db->get("clientes", $por_pagina, $desde);

    $respuesta = array(
        "err" => false,
        "total_cli" => $total_cli,
        "total pag" => $total_pag,
        "pag_actual" => $pagina + 1,
        "pag_siguiente" => $pag_siguiente,
        "pag_anterior" => $pag_anterior,
        "clientes" => $query->result(),
    );
    $this->$respuesta;

}
