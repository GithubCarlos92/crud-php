<?php 

include('../database/conexion.php');

if (isset($_GET['id'])){
    
    $id = $_GET['id'];
    $consulta   = "DELETE FROM personas WHERE id = $id";
    $resultado  = mysqli_query($conexion,$consulta);
    if(!$resultado){
        die("consulta fallida");
    }

    $_SESSION['mensaje']        = 'Datos Eliminados';
    $_SESSION['color_mensaje']  = 'danger';

    header('Location: ../index.php');
}