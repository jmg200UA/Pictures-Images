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

        <div id="detalle">

            <h2>Etiquetado semántico de la página</h2>

                <p>En general, hemos usado una gran variedad de etiquetas para el código html de nuestra
                página, principalmente div y p para la división de los contenidos, y luego otras etiquetas
                como section o article, a la hora de agrupar varias lineas en una misma etiqueta. En cuanto
                a la accesibilidad, también hemos usado algunas etiquetas como strong, para darle importancia
                a alguna palabra en concreto, y una tabla para que se viera mejor la información de un campo
                de un formulario. En conclusión, hemos adaptado la página con gram variedad de etiquetas con
                el fin de que esta fuera accesible para un mayor número de personas.
                </p>
            
            <h2>Texto alternativo de las imágenes</h2>

                <p>Para facilitar la información que queremos transmitir con nuestras imágenes, le
                hemos puesto a cada una un texto alternativo con una breve descripción de lo que
                se muestra en la misma, para que así un mayor número de personas pueda entender
                su contenido.</p>       
            
            <h2>Uso de los colores</h2>

                <p>En Pictures & Images, una página dedicada al mundo de la fotografía, creemos que
                algo de lo más importante es el correcto uso de los colores, y que todo el mundo
                pueda ver las imágenes sin ningún tipo de problema. Por ello, tenemos implementado un
                modo de alto contraste, con el fin de que las personas con baja visión puedan ver 
                correctamente el contenido de la página. La forma de activar este estilo se explica en
                la siguiente sección.</p>

                
            <h2>¿ Cómo se activan las hojas de estilo accesibles ?</h2>

                <p>Por el momento, solo vamos a poder seleccionar un estilo alternativo en 3 navegadores,
                Mozilla Firefox, Microsoft Internet Explorer y Google Chrome. Para los dos primeros,
                simplemente tendremos que ir a la barra superior y seleccionar <strong>Ver -> Estilo</strong>,
                y ahí podremos elegir que hoja queremos utilizar. Para Google Chrome es un poco más complejo,
                ya que tendremos que instalar la extensión <strong>Alt CSS</strong>. Una vez hecho esto, ya 
                podremos sellecionar la hoja de estilo que queremos.
                </p>

            <h2>Como se visualiza una imagen con los diferentes estilos</h2>

                <p>A continuación hemos puesto una imagen, para que puedan ver como se visualiza al cambiar
                la hoja de estilo.
                </p>            
                 
            <img src="imagenes/playa.jpg" alt="imagen playa">
        
        </div>
        <?php
        include("pie.php");
        ?>
    </body>
</html>