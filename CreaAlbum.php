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
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
        <div style="text-align: center;"><form id="formid" action="RespCreaAlbum.php"  method="POST">
            <div>
                <label for="titul">Título</label>
                <input type="text" id="titul" name="titul" maxlength="200"/><span class="icon-pencil"></span>
            </div><br>
            <div>
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" maxlength="4000"/><span class="icon-doc-text-inv"></span>
            </div><br>
            <div>
                <input type="submit" value="Crear">
            </div><br>
        </form></div>
        <?php
        include("pie.php");
        ?>
</body>
</html>