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

    $sqlstr = "select `productos`.`yiul_codigo`,
    `productos`.`yiul_plugin`,
    `productos`.`yiul_estado`,
    `productos`.`yiul_urlhomepage`,
    `productos`.`yiul_urlcdn`
FROM `examen3r`.`productos`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}


function obtenerDatoPorId($id)
{
  $sqlstr="select `productos`.`yiul_codigo`,
  `productos`.`yiul_plugin`,
  `productos`.`yiul_estado`,
  `productos`.`yiul_urlhomepage`,
  `productos`.`yiul_urlcdn`
FROM `examen3r`.`productos` where yiul_codigo=%d";
  $examen3r= array();
  $examen3r=obtenerUnRegistro(sprintf($sqlstr, $id));
  return $examen3r;
}

function obtenerEstados()
{
    return array(
        array("cod"=>"ACT", "dsc"=>"Activo"),
        array("cod"=>"INA", "dsc"=>"Inactivo"),
        array("cod"=>"PLN", "dsc"=>"En Planificación"),
        array("cod"=>"RET", "dsc"=>"Retirado"),
        array("cod"=>"SUS", "dsc"=>"Suspendido"),
        array("cod"=>"DES", "dsc"=>"Descontinuado")
    );
}

function agregarNuevodato($dscplugin, $dscestado, $dschome,$dsccdn) {
    $insSql = "INSERT INTO productos(yiul_plugin, yiul_estado, yiul_urlhomepage,yiul_urlcdn)
      values ('%s','%s', '%s','%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscplugin,
              $dscestado,
              $dschome,
              $dsccdn

          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificardato($dscplugin, $dscestado, $dschome, $dsccdn,$desccodigo)
{
    $updSQL = "UPDATE productos set yiul_plugin='%s', yiul_estado='%s',yiul_urlhomepage='%s',
    yiul_urlcdn='%s' where yiul_codigo=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscplugin,
            $dscestado,
            $dschome,
            $dsccdn,
            $desccodigo

        )
    );
}
function eliminardato($desccodigo)
{
    $delSQL = "DELETE FROM productos where yiul_codigo=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $desccodigo
        )
    );
}

?>
