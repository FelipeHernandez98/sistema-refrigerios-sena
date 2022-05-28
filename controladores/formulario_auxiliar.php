<?php
$usuario = $_POST["username"];
$contraseña = $_POST["contraseña"];
if($usuario =="auxiliar" AND $contraseña=="124"){
    header('Location: ../vistas/inicio.html');
}
else{
    echo "usuario o contraseña incorrecta"
}
?>