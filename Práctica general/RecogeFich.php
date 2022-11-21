<?php
print_r($_POST);

echo "<hr>\n";

print_r($_FILES);

if(move_uploaded_file($_FILES["perfil"]["tmp_name"], "D:/Martin/Desktop/xampp/htdocs/pagweb/pagweb/imagenes/FotosUsu/" . $_FILES["perfil"]["name"]))
    echo "Bien";
else
    echo "Mal";
?>
