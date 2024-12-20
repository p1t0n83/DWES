<?php
function flash(string $clave, string $mensaje = null): null|string
{

function iniciar_sesion()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function estaLogueado()
{
    return session_status() == PHP_SESSION_ACTIVE;
}

function redireccionar(string $url)
{
    header("Location: $url");
    exit();
}

function esPost(){
return $_SERVER['REQUEST_METHOD']==='POST';
}
?>