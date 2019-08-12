<?php

require_once "models/examendata.model.php";
function run()
  {
      $estadosolicitud= obtenerEstados();
      $selectedEst = 'PLN';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "solicitud ",
        "INS" => "Creando Nueva solicitud",
        "UPD" => "Actualizando solicitud ",
        "DEL" => "Eliminando solicitud "
      );
      $viewData = array();
      $viewData["showidsolicitud"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $moda = obtenerDatoPorId($_POST["yiul_codigo"]);
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $moda = obtenerDatoPorId($_POST["yiul_codigo"]);
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $moda = obtenerDatoPorId($_POST["yiul_codigo"]);
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnIns"])) {
          $mode = "INS";
          //Vamos A Cargar los datos
          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showidsolicitud"]  = false;
      }
      // if ($mode == "") {
      //     print_r($_POST);
      //     die();
      // }
      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["dscestado"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              $viewData["showidsolicitud"] = false;
              $viewData["modeDsc"] = $modeDesc[$mode];
              //validaciones
            /*  if (floatval($viewData["precjuguete"]) <= 0) {
                  $errores[] = "El precio de juguete no puede ser 0";
                  $hasError = true;
              }*/
              if (!$hasError && agregarNuevodato(
                  $viewData["dscplugin"],
                  $viewData["dscestado"],
                  $viewData["dschome"],
                  $viewData["dsccdn"]
              )
              ) {
                  redirectWithMessage(
                      "Registro Guardada Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
              if (modificardato(
                  $viewData["dscplugin"],
                  $viewData["dscestado"],
                  $viewData["dschome"],
                  $viewData["dsccdn"],
                  $viewData["dsccodigo"]
              )
              ) {
                  redirectWithMessage(
                      "Registro Actualizado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminardato(
                  $viewData["yiul_codigo"]
              )
              ) {
                  redirectWithMessage(
                      "Registro Eliminado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["estadosolicitud"] = addSelectedCmbArray($estadosolicitud, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
