<?php
    if(strlen($nombre)<3 || strlen($nombre)>15){
        echo'<script type="text/javascript">
        alert("Error. La longitud del nombre debe ser entre 3 y 15 carácteres");
        window.location.href="MisDatos.php";
            </script>';

    }

    if (!preg_match('/^(?![0-9]{1})[A-Za-z0-9]+$/', $nombre)){
        echo'<script type="text/javascript">
        alert("Error. El nombre no puede empezar por un número y no puede contener carácteres especiales");
        window.location.href="MisDatos.php";
            </script>';
    }

    if(strlen($contraseña)<6 || strlen($contraseña)>15){
        echo'<script type="text/javascript">
        alert("Error. La longitud de la contraseña debe ser entre 6 y 15 carácteres");
        window.location.href="MisDatos.php";
            </script>';

    }

    if (!preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9-_]+$/', $contraseña)){
        echo'<script type="text/javascript">
        alert("Error. La contraseña debe contener un número, una letra minúscula y una letra mayúscula");
        window.location.href="MisDatos.php";
            </script>';
    }
    
    if($contraseña!=$repetir){
        echo'<script type="text/javascript">
        alert("Error. Las contraseñas no son iguales");
        window.location.href="MisDatos.php";
        </script>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo'<script type="text/javascript">
        alert("Error. Formato de correo electrónico incorrecto");
        window.location.href="MisDatos.php";
        </script>';
    }

    if($sexo == '0'){
        echo'<script type="text/javascript">
        alert("Error. Debes seleccionar un valor en el campo sexo");
        window.location.href="MisDatos.php";
        </script>';
    }

    $valores = explode('-', $fecha);
    if(count($valores) != 3 || checkdate($valores[2], $valores[1], $valores[0]) == false){
        echo'<script type="text/javascript">
        alert("Error. Fecha no válida");
        window.location.href="MisDatos.php";
        </script>';
    }
?>