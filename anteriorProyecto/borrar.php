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
                                <a href="http://localhost/CRUD/cerveza/borrar/<?php echo $cerveza -> ID ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"
                                        style="color: #2b0b4c;"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>