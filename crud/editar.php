<?php

include('../database/conexion.php');

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $consulta   = "SELECT * FROM personas WHERE id = $id";
        $resultado  = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $fila   = mysqli_fetch_array($resultado);
            $nombres = $fila['nombres'];
            $texto = $fila['texto'];
        }
    }
    if(isset($_POST['editar'])){
        
        $id = $_GET['id'];
        $nombres = $_POST['nombres'];
        $texto = $_POST['texto'];
        $consulta   = "UPDATE personas SET nombres = '$nombres', texto = '$texto' WHERE id = $id";
        $resultado  = mysqli_query($conexion, $consulta);

        header('Location: ../index.php');
    }

?>

<?php include('../includes/header.php') ?>

    <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="my-input">Edita Nombres Completos</label>
                        <input id="my-input" class="form-control" type="text" name="nombres" value="<?php echo $nombres ; ?>">
                    </div>
                    <div class="form-group">
                    <label for="my-input">Editar Texto</label>
                        <textarea name="texto" rows="2" class="form-control"><?= $texto; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="editar">Actualizar Datos</button>

                </form>
            </div>
        </div>
    </div>
    
    </div>





<?php include('../includes/footer.php') ?>