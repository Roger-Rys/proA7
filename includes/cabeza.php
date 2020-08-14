<!--CABEZA-->
<!DOCTYPE html>
<html>
    <head>
        <title>Mi bici</title>
        <meta charset="UTF-8">

        <!--GOOGLE MAP-->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs6ZU93hs3W6KkQe-JO1rqxBgHQIrGm_U&callback=initMap&libraries=&v=weekly"
          defer
        ></script>
        
        <!--Estilos-->
        <link rel="stylesheet" href="assets/style/style.css"/>  
               
        <!--FUNCION GOOGLE MAP-->
        <script>
            "use strict";
            let map;
            function initMap() {
              map = new google.maps.Map(document.getElementById("map"), {
                center: {
                  lat: -34.397,
                  lng: 150.644
                },
                zoom: 8
              });
            }
        </script>       
                
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
