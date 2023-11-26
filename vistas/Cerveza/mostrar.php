<?php require "diseños/cabecera.php" ?>
<h1 class="pt-4 text-start">Informacion de la cerveza</h1>
<br>
<div class="col-10 p-4 text-center">
    <table class="table">
        <thead class="bg-info">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Graduaccion Alcoholica</th>
                <th scope="col">Pais</th>
                <th scope="col">Precio </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
                <tr>

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
                        <img src="<?php echo $cerveza->Ruta_imagen ?>" style="width:50px; height:auto;">
                    </td>
                </tr>
        </tbody>
    </table>
</div>
</div>







<?php require "diseños/piePagina.php" ?>