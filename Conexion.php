<?php
$nombreServer="localhost";
$usuario="root";
$psw="";
$bdNombre="vehiculosa";

$conexion=mysqli_connect($nombreServer,$usuario,$psw,$bdNombre);

if(mysqli_connect_errno()){
    echo "error en conexion";
    exit();
}


