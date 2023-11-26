<?php require "diseños/cabecera.php"; ?>
<div class="col-14 p-4">
    <table class="table">
        <thead class="bg-info">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Graduaccion Alcoholica</th>
                <th scope="col">Pais</th>
                <th scope="col">Precio </th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($cervezas as $key => $cerveza) { ?>
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
                        <a href="http://localhost/CRUD/cerveza/mostrar/<?php echo $cerveza->ID ?>"
                            class="btn btn-small btn-warning"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
                    </td>
                    <td>
                        <a href="http://localhost/CRUD/cerveza/editar/<?php echo $cerveza->ID ?>"
                            class="btn btn-small btn-warning"><i class="fa-solid fa-file-pen"
                                style="color: #35332c;"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
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
    </table>
</div>
</div>






<?php require "diseños/piePagina.php"; ?>