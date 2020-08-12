<!--CABEZA-->
<?php
require_once 'includes/cabeza.php';
require_once 'controller/queryDBcontroller.php';
?>

    <!--OBTENER DATOS-->
    <div id="obtener_datos">
        <form method="GET" action="">
            <h4>Obtener datos</h4>
            <span><label from="fecha">Fecha:</label></span>
            <input class="barra" type="date" name="fecha">
            <input class="boton" type="submit" title="Buscar">
        </form>

    </div>

    <!--MAPA-->
    <div id="mapa">
        <p>Aqui va mapa</p>
        <?php
        if (isset($_GET["fecha"])) {
            $queryDB = new QueryDBcontroller();
            $posiciones = $queryDB->posicionPorFecha($_GET["fecha"]);
            while ($posicion = $posiciones->fetch_object()) {
                echo '<p>Lat: ' . $posicion->latitud . ' | Lon: ' . $posicion->longitud .
                '| fecha: ' . $posicion->fecha . ' | hora: ' . $posicion->hora . '</p>';
            }
            $_GET["fecha"] = NULL;
        }
        ?>
    </div>
    
    <!--MOSTRAR DATOS-->
    <div id="mostrar_datos">
        <h3>Ultimos valores</h3>
        <?php 
            $queryDB = new QueryDBcontroller();
            $ultimosValores = $queryDB->ultimosDatosPosicion();
            
            if(isset($ultimosValores)):?>
            <p>Latitud:<?=$ultimosValores->latitud?></p>
            <p>Longitud:<?=$ultimosValores->longitud?></p>
            <?php else:?>
            <p>No hay valores</p>
            <?php endif;?>
            
    </div>
    
    <div id="clear"></div>
    


<!--PIE-->   
<?php require_once 'includes/pie.php'; ?>
