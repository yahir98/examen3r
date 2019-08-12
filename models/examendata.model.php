<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.
// Elaborar el algoritmo de los solicitado aquí.


/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerproductos()
{

    $sqlstr = "select `solicitud`.`yiul_codigo`,
    `solicitud`.`yiul_plugin`,
    `solicitud`.`yiul_estado`,
    `solicitud`.`yiul_urlhomepage`,
    `solicitud`.`yiul_urlcdn`
FROM `examen3r`.`productos`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}


?>
