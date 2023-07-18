<?php

$conexion = oci_connect("Jorklin", "Jork1616", "//localhost:1521/orcl");
    if (!$conexion) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

?>