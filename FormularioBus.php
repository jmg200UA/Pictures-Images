<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Busqueda</title>
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
    <fieldset>
        <legend>Búsqueda de fotos</legend>
        <div style="text-align: center;"><form id="formid" action="ResultadoBus.php" method="GET">

            <p><label for="foto">Foto:</label><br>
            <input type="text" id="foto" name="foto"><br><br>
            


            <p><label for="fecha">Fecha entre:</label><br>
            <input type="date" id="fecha" name="fecha">
            <label for="fecha2">y:</label>
            <input type="date" id="fecha2" name="fecha2"><br><br>
            <input type="submit" value="Buscar">


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


            <p><label><strong>Búsqueda completa</strong></label></p>
            </form>
            <form id="formid" action="ResultadoBusTodo.php" method="GET">
                <input type="submit" value="Busca todo">
            </form>
            </div>
    </fieldset>
    <?php
    include("pie.php");
    ?>
</body>

</html>