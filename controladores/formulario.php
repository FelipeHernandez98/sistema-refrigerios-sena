<?php
$usuario = $_POST["username"];
$contraseña = $_POST["contraseña"];
if($usuario =="coordi" AND $contraseña=="123"){
    header('Location: ../vistas/inicio.php');
}
else{
    echo "usuario o contraseña incorrecta"
}
?>