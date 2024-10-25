<?php

function validarNombre($nombre){
    if(strlen($nombre)>=3){
    return true;
    }else{
        return false;
    }
}

function validarEmail($correo){
    if(filter_var($correo,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function validarTelefono($numero){
if(preg_match('/^[0-9]{9}/',$numero)){
    return true;
}   else{
    return false;
}

}
?>