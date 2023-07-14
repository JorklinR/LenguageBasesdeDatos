<?php 
function Conecta()
{
    $conexion = oci_connect("localhost", "root", "", "ferreteria_db");

    if(!$conexion){
        echo "Ocurrió un error al establecer la conexión: ". oci_error();
    }

    return $conexion;

}

function Desconecta($conexion)
{
    //3. Cerrar la conexión
    oci_close($conexion);
}
?>