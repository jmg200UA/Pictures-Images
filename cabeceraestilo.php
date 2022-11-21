<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" title="Estilo principal">
    <link rel="stylesheet" href="css/fontello.css">
    <?php
    if(isset($_SESSION["nombre"])){
        if($_SESSION["nombre"] == "Javi"){
            echo '<link rel="stylesheet" type="text/css" href="dia.css">';
        }

        if($_SESSION["nombre"] == "Daniel"){
            echo '<link rel="stylesheet" type="text/css" href="contraste.css">';
        }

        if($_SESSION["nombre"] == "Sergio"){
            echo '<link rel="stylesheet" type="text/css" href="letragrande.css">';
        }

        if($_SESSION["nombre"] == "David"){
            echo '<link rel="stylesheet" type="text/css" href="contrasteyletra.css">';
        }     
    }
    ?>