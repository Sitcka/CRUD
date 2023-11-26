<?php require "diseños/cabecera.php"; ?>
<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($cervezas as $key => $cerveza) { ?>
        <?php
        $ruta = $cerveza->Ruta_imagen;
        $imagenes = scandir($ruta);
        foreach ($imagenes as $imagen) { ?>
            <?php if ($imagen != "." && $imagen != "..") { ?>
                <div style="width: 40%; margin: 5px; box-sizing: border-box;">
                    <img src="<?php echo $ruta . $imagen ?>" style="width: 100%; height: auto;">
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
<?php require "diseños/piePagina.php"; ?>
