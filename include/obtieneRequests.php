<?php
function recogePost($var, $m="")
{
    //isset devolverá False cuando se verique que el valor es null
    if(!isset($_POST[$var])){
        //is_array
        $tmp = (is_array($m)) ?  [] : "";
    }elseif(!is_array($_POST[$var])){
        //trim eliminar espacios en blanco al inicio y al final
        //htmlspecialchars Convierte caracteres especiales en entidades html
        // ENT_COMPAT : predeterminado solo codifican comillas dobles
        // ENT_QUOTES: Códifica comillas dobles y simples
        // ENT_NOQUOTES: no codifica ninguna cita
        $tmp = trim(htmlspecialchars($_POST[$var], ENT_QUOTES, "UTF-8"));
    }else {
        $tmp = $_POST[$var];
        //la funcion array_walk_recursive() recorrer un arreglo
        array_walk_recursive($tmp, function (&$valor)
        {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

function recogeGet($var, $m="")
{
    //isset devolverá False cuando se verique que el valor es null
    if(!isset($_GET[$var])){
        //is_array
        $tmp = (is_array($m)) ?  [] : "";
    }elseif(!is_array($_GET[$var])){
        //trim eliminar espacios en blanco al inicio y al final
        //htmlspecialchars Convierte caracteres especiales en entidades html
        // ENT_COMPAT : predeterminado solo codifican comillas dobles
        // ENT_QUOTES: Códifica comillas dobles y simples
        // ENT_NOQUOTES: no codifica ninguna cita
        $tmp = trim(htmlspecialchars($_GET[$var], ENT_QUOTES, "UTF-8"));
    }else {
        $tmp = $_GET[$var];
        //la funcion array_walk_recursive() recorrer un arreglo
        array_walk_recursive($tmp, function (&$valor)
        {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

function recoge($var, $m="")
{
    //isset devolverá False cuando se verique que el valor es null
    if(!isset($_REQUEST[$var])){
        //is_array
        $tmp = (is_array($m)) ?  [] : "";
    }elseif(!is_array($_REQUEST[$var])){
        //trim eliminar espacios en blanco al inicio y al final
        //htmlspecialchars Convierte caracteres especiales en entidades html
        // ENT_COMPAT : predeterminado solo codifican comillas dobles
        // ENT_QUOTES: Códifica comillas dobles y simples
        // ENT_NOQUOTES: no codifica ninguna cita
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    }else {
        $tmp = $_REQUEST[$var];
        //la funcion array_walk_recursive() recorrer un arreglo
        array_walk_recursive($tmp, function (&$valor)
        {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}
?>