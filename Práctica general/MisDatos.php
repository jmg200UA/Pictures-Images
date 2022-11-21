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
        <form name="formulario" id="formid" action="ConfirmarDatos.php" method="POST" enctype="multipart/form-data">
            <fieldset><legend>Registro</legend>

            <?php
            $contra="";
            $repetir="";
            $email="";
            $sexo="";
            $fecha="";
            $pais="";
            $ciudad="";

            include("links.php");
                $sentenciaU = 'SELECT * FROM usuarios';
                    if(!($resultado = @mysqli_query($link, $sentenciaU))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }

                    while($fila = mysqli_fetch_assoc($resultado)) {
                         if($_SESSION["nombre"]==$fila['NomUsuario']){
                            $contra=$fila['Clave'];
                            $repetir=$fila['Clave'];
                            $email=$fila['Email'];
                            if($fila['Sexo']==1) $sexo="Hombre";
                            else $sexo="Mujer";
                            $fecha=$fila['FNacimiento'];
                            switch ($fila['Pais']) {
                                case 1:
                                    $pais="España";
                                    break;
                                case 2:
                                    $pais="Argentina";
                                    break;
                                case 3:
                                    $pais="Inglaterra";
                                    break;
                                case 4:
                                    $pais="Francia";
                                    break;
                                case 5:
                                    $pais="Alemania";
                                    break;
                            }
                            $ciudad=$fila['Ciudad'];
                            break;
                         }
                    } 

                echo'<p><label for="nombre">Nombre de usuario:</label><br>
                <input type="text" id="nombre" name="nombre" value="'.$_SESSION["nombre"].'"></p>
                <p><label for="contraseña">Contraseña:</label><br>
                <input type="password" id="contraseña" name="contraseña" value="'.$contra.'"></p>
                <p><label for="repetir">Repetir contraseña:</label><br>
                <input type="password" id="repetir" name="repetir" value="'.$repetir.'"></p>
                <p><label for="email">Dirección de email:</label><br>
                <input type="email" id="email" name="email" value="'.$email.'"></p>
                <p><label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option selected value="0"></option>
                    <option value="1">
                        Hombre
                    </option>
                    <option value="2">
                        Mujer
                    </option>
                </select>Valor actual: '.$sexo.'</p>
                <p><label for="fecha">Fecha de nacimiento:</label><br>
                <input type="text" id="fecha" name="fecha" placeholder="dd-mm-yyyy" value="'.$fecha.'"></p>
                 <p><label for="pais">País:</label><br>
                <select name="pais" id="pais">';
                
                    $sentencia = 'SELECT * FROM paises';
                    if(!($resultado = @mysqli_query($link, $sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }

                    while($fila = mysqli_fetch_assoc($resultado)) {
                         echo "<option value='".$fila['NomPais']."'>".$fila['NomPais']."</option>";
                    }    

                    
                
                echo '</select>Valor actual: '.$pais.'</p>   
                <p><label for="ciudad">Ciudad:</label><br>
                <input type="text" id="ciudad" name="ciudad" value="'.$ciudad.'"></p>
                <p><label for="foto">Foto de usuario:</label><br>
                <input type="file" id="foto" name="foto"></p>';
                echo "<div>";
                echo "<p><strong>Introduce tu contraseña para confirmar la baja</strong></p>";
                echo '<input type="password" id="contra" name="contra">';
                echo "</div>";
            ?>
                <input type="submit" value="Actualizar">
                <input type="reset" value="Borrar">
            </fieldset>
        </form>
    </div>
    <?php
    include("pie.php");
    ?>
</body>
</html>