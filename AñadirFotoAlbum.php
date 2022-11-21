<?php
session_start();

if(isset($_SESSION["nombre"])==null){
    echo'<script type="text/javascript">
        alert("Error. No estás logueado");
        window.location.href="index.php";
        </script>';
}
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
        <div style="text-align: center;"><form id="formid" action="RespAñadir.php" method="POST" enctype="multipart/form-data">
            <?php
            @$titul = $_GET['Titulo'];
            ?>
            <p><label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" maxlength="200"/></p>

            <p><label for="desc">Descripcion</label>
            <input type="text" id="desc" name="desc" maxlength="300"/></p>

            <p><label for="fecha">Fecha:</label><br>
            <input type="text" id="fecha" name="fecha" placeholder="aaaa-mm-dd"></p>

            <p><label for="fecha">País:</label><br>
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

            <p><label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*"></p>

            <p><label for="textoalt">Texto alternativo</label>
            <input type="text" id="textoalt" name="textoalt" maxlength="4000"/></p>

            <label for="albumes">Álbum</label>
                <select name="albumes" id="albumes">
                <?php
                    $sentencia = 'SELECT * FROM albumes';
                    if(!($resultado = @mysqli_query($link, $sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }

                    while($fila = mysqli_fetch_assoc($resultado)) {
                        if($fila['Titulo'] == $titul){
                            echo "<option selected value='".$titul."'>".$fila['Titulo']."</option>";
                        }else{
                            echo "<option value='".$fila['Titulo']."'>".$fila['Titulo']."</option>";
                        }
                    }                
                ?>
                </select><br><br>

            <input type="submit" value="Guardar">
            </form></div><br>
    </fieldset>
    <?php
    include("pie.php");
    ?>
</body>
</html>