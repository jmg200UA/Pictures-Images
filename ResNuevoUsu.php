
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Registrado</title>
    </head>
    <body>
        <header>
        <?php
        include("enlaceprincipal.php");
        ?>
        </header>
        <div>
        <?php
        $nombre=$_POST['nombre'];
        $contraseña=$_POST['contraseña'];
        $repetir=$_POST['repetir'];
        $email=$_POST['email'];
        $sexo=$_POST['sexo'];
        $fecha=$_POST['fecha'];
        $valorPais=$_POST['pais'];
        $ciudad=$_POST['ciudad'];
        $nomfoto="";
        //nombre foto


        

        switch ($valorPais) {
            case "España":
                $valorPais=1;
                break;
            case "Argentina":
                $valorPais=2;
                break;
            case "Inglaterra":
                $valorPais=3;
                break;
            case "Francia":
                $valorPais=4;
                break;
            case "Alemania":
                $valorPais=5;
                break;
        }


        include("filtrado.php");

        //$contraseña=password_hash("$contraseña", PASSWORD_DEFAULT);

        /*print_r($_POST);

        echo "<hr>\n";

        print_r($_FILES);*/

        if(move_uploaded_file($_FILES["foto"]["tmp_name"], "D:/Martin/Desktop/xampp/htdocs/pagweb/pagweb/imagenes/FotosUsu/" . $_FILES["foto"]["name"])){
            $nomfoto=$_FILES["foto"]["name"];
        }
        else
            echo "Foto no cargada";

        require 'links.php';

        $sentencia = "INSERT INTO usuarios (NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Estilo,Foto) VALUES ('$nombre', '$contraseña','$email','$sexo','$fecha','$ciudad','$valorPais','1','$nomfoto')";
            
            $query=mysqli_query($link,$sentencia);
            mysqli_insert_id($link);

            if($query) echo "Inserción realizada correctamente";
            else echo "NO";
            
            mysqli_close($link);
        
        switch ($sexo) {
            case 1:
                $sexo="Hombre";
                break;
            case 2:
                $sexo="Mujer";
                break;
        }
        echo "<h2>Inserción realizada, tus datos son:</h2>";
        echo "<p>Nombre: ".$nombre. "</p>";
        echo "<p>Contraseña: ".password_hash("$contraseña", PASSWORD_DEFAULT). "</p>";
        echo "<p>Sexo: ".$sexo. "</p>";
        echo "<p>Fecha: ".$fecha. "</p>";
        echo "<p>Correo electrónico: ".$email. "</p>";
        echo '<img src="imagenes/FotosUsu/'.$nomfoto.'" alt="'.$nomfoto.'" style="width: 100px;height: 100px; border-radius: 50px / 25px;">';
            
        
        ?> 
        </div>
        <?php
        include("pie.php");
        ?>
    </body>
</html>