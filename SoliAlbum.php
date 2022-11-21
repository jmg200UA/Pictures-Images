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
    <meta charset="utf-8">
    <title>Pictures & images - Solicitar album</title>
    <style>
        table.center {
           margin-left: auto;
           margin-right: auto;
       }
       
       html, body {
           width: 100%;
       }
    </style>  
    <?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Solicitar album</title>
    <script src="tabla.js"></script>
</head>
<body>
    <header>
        <!--LOGOTIPO -->
        <?php
        include("enlaceprincipal.php");
        ?>    
    </header>
        <div style="text-align: center;"><form id="formid" action="RespSoliAlbum.php" method="GET">
            <p>Con esta opción, podrás crear el álbum que quieras, basándote en varias tarifas y criterios que tendrás que seleccionar y rellenar.</p>
            <div style="text-align: center;">
                <p><strong>Tarifas:</strong></p>
                <table class="center">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Tarifas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Menos de 5 páginas</td><td>0.10 € por página</td></tr>
                        <tr><td>Entre 5 y 11 páginas</td><td>0.08 € por página</td></tr>
                        <tr><td>Más de 11 páginas</td><td>0.07 € por página</td></tr>
                        <tr><td>Blanco y negro</td><td>0 €</td></tr>
                        <tr><td>Color</td><td>0.05 € por foto</td></tr>
                        <tr><td>Resolución mayor a 300 dpi</td><td>0.02 € por foto</td></tr>
                    </tbody>
                </table><br>
            </div>
            <div>
                <label for="usuario">Nombre</label>
                <input type="text" id="usuario" name="nombre" placeholder="nombre, apellidos" maxlength="200" required autofocus pattern="[A-Za-z]{1,1}.[A-Za-z0-9]{2,19}"/><span class="icon-user"></span>
            </div><br>
            <div>
                <label for="tituloalbum">Título del álbum</label>
                <input type="text" id="tituloalbum" name="tituloalbum" maxlength="200" required /><span class="icon-pencil"></span>
            </div><br>
            <div>
                <label for="textoadicional">Texto adicional</label>
                <input type="text" id="textoadicional" name="textoadicional" maxlength="4000"/><span class="icon-doc-text-inv"></span>
            </div><br>
            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" maxlength="200" required /><span class="icon-mail"></span>
            </div><br>
            <div>
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="(calle, número, piso, puerta, código postal, localidad, provincia, país" size="55" required /><span class="icon-home"></span>
            </div><br>
            <div>
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono"/><span class="icon-phone"></span>
            </div><br>
            <div>
                <label for="color">Color</label>
                <input type="color" id="color" name="color" value="#ff0000"/>
            </div><br>
            <div>
                <label for="numcopias">Número de copias</label>
                <input type="number" id="numcopias" name="numcopias" value="1" min="1"/><span class="icon-sort-number-up"></span>
            </div><br>
            <div>
                <label for="resolucion">Resolución de las fotos</label>
                <input type="number" id="resolucion" name="resolucion" value="150" min="150" max="900" step="150" placeholder="(DPI)" /><span class="icon-camera"></span>
            </div><br>
            <div>
                <label for="albumes">Álbum de fotos</label>
                <select name="albumes" id="albumes">
                <?php
                    include("links.php");
                    $sentencia = 'SELECT * FROM albumes';
                    if(!($resultado = @mysqli_query($link, $sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }

                    while($fila = mysqli_fetch_assoc($resultado)) {
                         echo "<option value='".$fila['Titulo']."'>".$fila['Titulo']."</option>";
                    }                
                ?>
                </select>
                <span class="icon-picture"></span>
            </div><br>
            <div>
                <label for="fecha">Fecha de recepción</label>
                <input type="date" id="fecha" name="fecha"/>
            </div><br>
            <div>
                <label for="impcolor">Impresión a color</label>
                <select name="impcolor" id="impcolor">
                    <option>Blanco y negro</option>
                    <option>A todo color</option>
                </select>
                <span class="icon-color-adjust"></span>
            </div><br>
            <div>
                <?php
                if(isset($_SESSION["nombre"])){
                    if($_SESSION["nombre"] == "Javi"){
                        $sentencia1 = 'SELECT Titulo from albumes WHERE Usuario=1';
                    
                        if(!($resultado1 = @mysqli_query($link, $sentencia1))) {
                            echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                            echo '</p>';
                            exit;
                        }
                        while($fila1 = mysqli_fetch_assoc($resultado1)) {
                            echo "<p><strong>Albumes del usuario:</strong>".$fila1['Titulo']."</p>";
                        }
                    }
               
                    if($_SESSION["nombre"] == "Daniel"){
                        $sentencia2 = 'SELECT Titulo from albumes WHERE Usuario=2';
                    
                        if(!($resultado2 = @mysqli_query($link, $sentencia2))) {
                            echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . mysqli_error($link);
                            echo '</p>';
                            exit;
                        }
                        while($fila2 = mysqli_fetch_assoc($resultado2)) {
                            echo "<p><strong>Albumes del usuario:</strong>".$fila2['Titulo']."</p>";
                        }
                    }
                }
                ?>
            </div><br>
            <input type="submit" value="Solicitar">
            <div id="tablita">
                <?php
                echo "<p><strong>Tarifas:</strong></p>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Blanco y negro</th>
                            <th>Blanco y negro</th>
                            <th>Color</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><strong>Número de páginas</strong></td><td><strong>Número de fotos</strong></td><td><strong>150-300dpi</strong></td><td><strong>450-900dpi</strong></td><td><strong>150-300dpi</strong></td><td><strong>450-900dpi</strong></td></tr>
                        <tr><td>1</td><td>3</td><td>0,10</td><td>0,16</td><td>0,25</td><td>0,31</td></tr>
                        <tr><td>2</td><td>6</td><td>0,20</td><td>0,32</td><td>0,50</td><td>0,62</td></tr>
                        <tr><td>3</td><td>9</td><td>0,30</td><td>0,48</td><td>0,75</td><td>0,93</td></tr>
                        <tr><td>4</td><td>12</td><td>0,40</td><td>0,64</td><td>1,00</td><td>1,24</td></tr>
                        <tr><td>5</td><td>15</td><td>0,48</td><td>0,78</td><td>1,23</td><td>1,53</td></tr>
                        <tr><td>6</td><td>18</td><td>0,56</td><td>0,92</td><td>1,46</td><td>1,82</td></tr>
                        <tr><td>7</td><td>21</td><td>0,64</td><td>1,06</td><td>1,69</td><td>2,11</td></tr>
                        <tr><td>8</td><td>24</td><td>0,72</td><td>1,20</td><td>1,92</td><td>2,40</td></tr>
                        <tr><td>9</td><td>27</td><td>0,80</td><td>1,34</td><td>2,15</td><td>2,69</td></tr>
                        <tr><td>10</td><td>30</td><td>0,88</td><td>1,48</td><td>2,38</td><td>2,98</td></tr>
                        <tr><td>11</td><td>33</td><td>0,96</td><td>1,62</td><td>2,61</td><td>3,27</td></tr>
                        <tr><td>12</td><td>36</td><td>1,03</td><td>1,75</td><td>2,83</td><td>3,55</td></tr>
                        <tr><td>13</td><td>39</td><td>1,10</td><td>1,88</td><td>3,05</td><td>3,83</td></tr>
                        <tr><td>14</td><td>42</td><td>1,17</td><td>2,01</td><td>3,27</td><td>4,11</td></tr>
                        <tr><td>15</td><td>45</td><td>1,24</td><td>2,14</td><td>3,49</td><td>4,39</td></tr>
                    </tbody>
                </table><br>";
                ?> 
            </div>
        </form></div>
        <?php
        include("pie.php");
        ?>       
</body>
</html>