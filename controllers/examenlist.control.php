<?php

require_once "models/examendata.model.php";
function run()
{
    $viewData = array();
    $viewData["xcfrt"] = md5(microtime());
    $_SESSION["xcfrt"] = $viewData["xcfrt"];
    $viewData["productos"] = obtenerproductos();
    renderizar("examenlist", $viewData);
}

run();
?>
