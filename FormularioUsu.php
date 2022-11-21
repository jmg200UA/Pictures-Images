<!DOCTYPE html>
<html lang="es">
<head>
<?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Registro</title>
</head>
<body>
    <header>
        <!--LOGOTIPO -->
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
    
    <div style="text-align: center;">
        <form name="formulario" id="formid" action="ResNuevoUsu.php" method="POST" enctype="multipart/form-data">
            <fieldset><legend>Registro</legend>
                <p><label for="nombre">Nombre de usuario:</label><br>
                <input type="text" id="nombre" name="nombre"></p>
                <p><label for="contraseña">Contraseña:</label><br>
                <input type="password" id="contraseña" name="contraseña"></p>
                <p><label for="repetir">Repetir contraseña:</label><br>
                <input type="password" id="repetir" name="repetir"></p>
                <p><label for="email">Dirección de email:</label><br>
                <input type="email" id="email" name="email"></p>
                <p><label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option selected value="0">Selecciona un valor</option>
                    <option value="1">
                        Hombre
                    </option>
                    <option value="2">
                        Mujer
                    </option>
                </select></p>
                <p><label for="fecha">Fecha de nacimiento:</label><br>
                <input type="text" id="fecha" name="fecha" placeholder="dd/mm/aaaa"></p>
                 <p><label for="pais">País:</label><br>
                <select name="pais" id="pais">
                <?php
                    include("links.php");
                    $sentencia = 'SELECT * FROM paises';
                    if(!($resultado = @mysqli_query($link, $sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }

                    while($fila = mysqli_fetch_assoc($resultado)) {
                         echo "<option value='".$fila['NomPais']."'>".$fila['NomPais']."</option>";
                    }    

                    
                ?>
                </select></p>   
                <p><label for="ciudad">Ciudad:</label><br>
                <input type="text" id="ciudad" name="ciudad"></p>
                <p><label for="foto">Foto de usuario:</label><br>
                <input type="file" id="foto" name="foto" accept="image/*"></p>
                <input type="submit" value="Registro">
                <input type="reset" value="Borrar">
            </fieldset>
        </form>
    </div>
    <?php
    include("pie.php");
    ?>
</body>
</html>