<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Vehiculos S.A</title>
</head>
<body>

<form  name="form" action="" method="POST">
    <center> Vehiculos S.A</center>
    <label for="">Id</label>
    <input type="text" name="id" ><br><br>
    <label for="">Marca</label>
    <input type="text" name="marca" ><br><br>
    <label for="">Modelo</label>
    <input type="text" name="modelo" ><br><br>
    <label for="">chasis</label>
    <input type="text" name="chasis" ><br><br>
    <label for="">Fecha</label>
    <input type="date" name="fecha" class="fa fa-calendar" ><br><br>
<input type="submit" class="btn btn-success" value="guardar" name="guardar"></input>
<input type="submit" class="btn btn-info" value="buscar" name="buscar"></input>
<input type="submit" class="btn btn-warning" value="editar" name="editar"></input>
<input type="submit" class="btn btn-danger" value="eliminar" name="eliminar"></input>
</form>

    
</body>
</html>

<?php


if(isset($_POST['guardar'])){
    include_once('Conexion.php');
$id=$_POST["id"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$chasis=$_POST["chasis"];
$fecha=$_POST["fecha"];
$sql="INSERT INTO vehiculo(Id,Marca,Modelo,Chasis,Fecha) VALUES ('$id','$marca','$modelo','$chasis','$fecha')";
$resul=mysqli_query($conexion,$sql);
if($resul<>null){
    echo"Se guardo correctamente en la Bd";
    include("Close.php");
}

}
//se cierra el guardar datos


if(isset($_POST['buscar'])){
    include_once('Conexion.php');
$id=$_POST['id'];
$busqueda=0;

if($id==""){

    echo"Ingrese algun valor ya que se encuentra vacio";
}
else{
    $sql=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE Id=$id ");
    while ($consulta =mysqli_fetch_array($sql)) {
        echo "<b> "."MARCA :"."</b>".$consulta["Marca"]."<br>";
        echo "<b> "."MODELO :"."</b>".$consulta["Modelo"]."<br>";
        echo "<b> "."CHASIS :"."</b>".$consulta["Chasis"]."<br>";
        echo "<b> "."FECHA :"."</b>".$consulta["Fecha"]."<br>";
        $busqueda++;



    }
    if($busqueda==0){
        echo "El Id no se encuentra registrado en la BD";
    }

}
   include("Close.php");

} 
//se cierra el buscar informacion




if(isset($_POST["editar"])){
    include_once('Conexion.php');
    $id=$_POST["id"];
    $marca=$_POST["marca"];
    $modelo=$_POST["modelo"];
    $chasis=$_POST["chasis"];
    $fecha=$_POST["fecha"];
    $encontrado=0;
    if($id==""){
        echo"Porfavor ingrese un dato, Intente de nuevo";
    }
    else{


        $sql=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE Id=$id ");
        while ($consulta =mysqli_fetch_array($sql)) {

            $encontrado++;

            $UPDATE_SQL="UPDATE vehiculo Set 
            Marca='$marca',
            Modelo='$modelo',
            Chasis='$chasis',
            Fecha='$fecha'
            WHERE Id='$id'"; 
            mysqli_query($conexion,$UPDATE_SQL); 
            echo "el documento se Actualizo con exito";


        }
        if($encontrado==0){
            echo"EL ID NO EXISTE EN LA BD";

        }
       
    }  
}
include("Close.php"); //se termina editar y cierra conexion de bd

if(isset($_POST['eliminar'])){

    include_once("Conexion.php");
    

}







include("Close.php"); //se termina eliminar y cierra conexion de bd

?>