<!--CABEZA-->
<!DOCTYPE html>
<html>
    <head>
        <title>Mi bici</title>
        <meta charset="UTF-8">

        <!--Estilos-->
        <link rel="stylesheet" href="assets/style/style.css"/> 
        
        <!--MAPA-->
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin=""/>

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

        <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />

                
        <!--jQuery-->
        <script
            src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
            crossorigin="anonymous">
        </script>
       
        <!--JS-->
        <script type="text/javascript" src="leerApi.js"></script>

    </head>
    
<!--BODY-->
    <body>
        <!--GLOBAL-->
        <section id="global">

            <!--CABECERA-->
            <header id="cabecera">
                <div id="encabezado">
                    <a href="index.php">Mi Bici</a>
                    <h2>Proyecto de titulacion</h2>
                </div>
                <div id="logotipo">
                    <a href="index.php" tittle='inicio'></a>
                </div>

                <div id="clear"></div>
                <nav id="menu">
                    <ul>
                        <li><a href="index.php">Inicio</a><br/></li>
                        <li><a href="ubicarBici.php">Ubicar Bici</a></li>
                        <li><a href="#">Funcionamiento</a></li>
                    </ul>
                </nav>
            
            </header>  
