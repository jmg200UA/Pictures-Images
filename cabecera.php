    
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css" title="Estilo principal">
    <link rel="stylesheet" href="css/fontello.css">
    <?php
    $valida = 0;
    $EstUsuario = "";
    $sesUsu = "";

    if(isset($_SESSION["nombre"])){
        $sesUsu = $_SESSION["nombre"];
    }

    $link = @mysqli_connect(
    'localhost', // El servidor
    'root', // El usuario
    '', // La contraseña
    'pibd'); // La base de datos
    if(!$link) {
        echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
        echo '</p>';
        exit;
    }
    $sentencia = 'SELECT * FROM usuarios';
    if(!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    while($fila = mysqli_fetch_assoc($resultado)) {
        if($fila['NomUsuario'] == $sesUsu){
            $valida = 1;
            $EstUsuario = $fila['Estilo'];
        }
        if($valida == 1){
        break;
        }
    }
    if(isset($_SESSION["nombre"])){
        if($EstUsuario == 1){
            echo '<link rel="stylesheet" type="text/css" href="dia.css">';
        }

        if($EstUsuario == 2){
            echo '<link rel="stylesheet" type="text/css" href="contraste.css">';
        }

        if($EstUsuario == 3){
            echo '<link rel="stylesheet" type="text/css" href="letragrande.css">';
        }

        if($EstUsuario == 4){
            echo '<link rel="stylesheet" type="text/css" href="contrasteyletra.css">';
        }     
    }
    ?>
