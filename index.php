<?php include('database/conexion.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['color_mensaje']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="crud/guardar.php" method="post">
                    <div class="form-group">
                        <label for="my-input">Nombres Completos</label>
                        <input class="form-control" type="text" required name="nombres" placeholder="Ingrese Nombres commpletos" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Ingresa Texto</label>
                        <textarea name="texto" required class="form-control" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="enviar" value="Enviar">Enviar Datos</button>

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th>NOMBRES</th>
                        <th>TEXTO</th>
                        <th>FECHA CREACION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta  = "SELECT * FROM personas";
                    $resultado = mysqli_query($conexion, $consulta);
                    $count = 0;
                    while ($fila = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td> <?php echo $fila['id'];        ?> </td>
                            <td> <?php echo $fila['nombres'];   ?> </td>
                            <td> <?php echo $fila['texto'];     ?> </td>
                            <td> <?php echo $fila['created_at']; ?> </td>
                            <td>
                                <a href="crud/editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="crud/eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php  } ?>

                </tbody>
            </table>


        </div>
    </div>
</div>



















<?php include('includes/footer.php'); ?>