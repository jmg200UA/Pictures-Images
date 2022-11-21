<?php
session_start();         
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Añadir foto</title>
</head>
<body>
    <header>
    <?php
    include("enlaceprincipal.php");
    ?>
    </header>
        <div style="text-align: center;"><form id="formid" action="UsuRegistrado.php" method="POST">

            <p><label for="tituloalbum">Título</label>
            <input type="text" id="titulo" name="titulo" maxlength="200"/></p>

            <p><label for="desc">Descripcion</label>
            <input type="text" id="desc" name="desc" maxlength="300"/></p>

            <p><label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha"/></p> 

            <p><label for="pais">Pais</label>
            <input type="text" id="pais" name="pais"></p>

            <p><label for="foto">Foto</label><br>
            <input type="file" id="foto" name="foto" accept="image/*"></p>

            <p><label for="textoalt">Texto alternativo</label>
            <input type="text" id="textoalt" name="textoalt" maxlength="4000"/></p>

            <p><label for="album">Album</label>
            <input type="text" id="album" name="album" maxlength="200"/></p>

            <input type="submit" value="Guardar">
            </form></div>
    </fieldset>
    <?php
    include("pie.php");
    ?>
</body>
</html>