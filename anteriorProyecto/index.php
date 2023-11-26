<?php
require "core/Model.php";
$conexion = Model::db();
?>
<?php
require "includes/header.php";
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="save.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Nombre de la cerveza:</label>
                        <input type="text" class="form-control" name="inombre" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Tipo:</label>
                        <input type="text" class="form-control" name="itipo" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Graduaccion alcoholica:</label>
                        <input type="text" class="form-control" name="igraduaccion" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Pais:</label>
                        <input type="text" class="form-control" name="ipais" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Precio:</label>
                        <input type="text" class="form-control" name="iprecio" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Ruta de imagen:</label>
                        <textarea class="form-control" rows="2" name="iruta"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" value="Enviar" name="ienviar">
                </form>
            </div>
            <br>
            <?php if (isset($_SESSION['message'])) { ?>
                    <!-- Bootstrap facilita el codigo css -->
                    <div class="alert alert-<?= $_SESSION['message_type'] //Asi saldra el color que definimos en el fichero save?> alert-dismissible fade show"
                        role="alert">
                        <?= $_SESSION['message'] //Aqui nos saldra por pantalla el mensaje de exito ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php session_unset();
                //Para que aparezca una sola vez el mensaje de exito de inserccion
            } ?>
        </div>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Graduaccion Alcoholica</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Precio </th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php

                    $sql = "SELECT * FROM cerveza";
                    $statement = $conexion->prepare($sql);
                    $statement->execute();
                    $cervezas = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($cervezas as $cerveza){?>
                        <tr>
                            <td>
                                <?php echo $cerveza->ID ?>
                            </td>
                            <td>
                                <?php echo $cerveza->Nombre ?>
                            </td>
                            <td>
                                <?php echo $cerveza->Tipo ?>
                            </td>
                            <td>
                                <?php echo $cerveza->Graduacion_alcoholica ?>
                            </td>
                            <td>
                                <?php echo $cerveza->Pais ?>
                            </td>
                            <td>
                                <?php echo $cerveza->Precio ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $cerveza -> ID ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-file-pen"
                                        style="color: #35332c;"></i></a>
                                <a href="delete.php?id=<?php echo $cerveza -> ID ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"
                                        style="color: #2b0b4c;"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require "includes/footer.php";
?>