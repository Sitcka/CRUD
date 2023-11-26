<?php require "diseños/cabecera.php"; ?>

<div class="col-md-4 p-4">
    <div class="card card-body">
        <form action="http://localhost/CRUD/cerveza/actualizar/<?php echo $cerveza->ID ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-group ">
                <label for="exampleInputEmail1" class="form-label">Nombre de la cerveza:</label>
                <input type="text" class="form-control" value="<?php echo $cerveza->Nombre ?>" name="inombre" autofocus
                    required>
            </div>
            <div class="form-group pt-1">
                <label for="exampleFormControlSelect1" class="pb-2">Tipo:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="itipo">
                    <option value="<?php echo $cerveza->Tipo ?>">
                        <?php echo $cerveza->Tipo ?>
                    </option>
                    <option value="Tostada">Tostada</option>
                    <option value="Rubia">Rubia</option>
                    <option value="De trigo">De trigo</option>
                    <option value="Negra">Negra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="text" class="form-control" name="igraduaccion"
                    value="<?php echo $cerveza->Graduacion_alcoholica ?>" autofocus required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Pais:</label>
                <input type="text" class="form-control" name="ipais" value="<?php echo $cerveza->Pais ?>" autofocus
                    required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Precio:</label>
                <input type="text" class="form-control" name="iprecio" value="<?php echo $cerveza->Precio ?>" autofocus
                    required>
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="exampleInputEmail1">Imagen de la cerveza:</label>
                <input type="file" name="file" required>
            </div>
            <br>
            <input type="submit" class="btn btn-success btn-block" value="Actualizar" name="ienviar">
        </form>
    </div>
    <br>
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




<?php require "diseños/piePagina.php"; ?>