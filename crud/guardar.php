<?php 

include('../database/conexion.php');

if (isset($_POST['enviar'])){

    $nombres = $_POST['nombres'];
    $texto   = $_POST['texto'];
    //echo $nombre . ' '. $texto;
    $consulta  = "INSERT INTO personas(nombres,texto) VALUES('$nombres','$texto') ";
    $respuesta = mysqli_query($conexion,$consulta);
    
    if(!$respuesta){
        die("consulta fallida");
    }

    $_SESSION['mensaje']        = 'Datos guardados';
    $_SESSION['color_mensaje']  = 'success';

    header("Location: ../index.php ");
    

}

