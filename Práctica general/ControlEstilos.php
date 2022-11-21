<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Control Estilos</title>
    </head>
    <body>
        <h2>
        <?php
            $estilo = $_POST['estilo'];

            if($estilo = "Predeterminado"){
                $estilo0 = "estilo";
                setcookie("estilo0", $estilo0, time() + 60*60*24*90);
            }
            if($estilo = "Dia"){
                $estilo1 = "dia";
                setcookie("estilo1", $estilo1, time() + 60*60*24*90);
                echo '<link rel="stylesheet" type="text/css" href="dia.css">';
            }
            if($estilo = "Contraste"){
                $estilo2 = "contraste";
                setcookie("estilo2", $estilo2, time() + 60*60*24*90);
            }
            if($estilo = "Letras"){
                $estilo3 = "letragrande";
                setcookie("estilo3", $estilo3, time() + 60*60*24*90);
            }
            if($estilo = "Contraste y letras"){
                $estilo4 = "contrasteyletra";
                setcookie("estilo4", $estilo4, time() + 60*60*24*90);
            }
            header("Location: configurar.php");

        ?>

    </body>
</html>

            


