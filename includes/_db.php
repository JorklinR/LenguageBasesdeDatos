<?php

$conexion = oci_connect("owen", "owen1234", "//localhost:1521/orcl");  /*Apartado cambiable segun la maquina de ejecucion*/
    if (!$conexion) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

?>