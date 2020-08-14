<!--CABEZA-->
<?php
require_once 'includes/cabeza.php';
require_once 'controller/queryDBcontroller.php';
?>

<!--MAPA-->
<div id="mapaContenido">
    <div id="map"></div>

    <!--<p>Aqui va mapa</p>-->
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

<aside id="barra_lateral">
    <!--OBTENER DATOS-->
    <div id="obtener_datos">
        <form method="GET" action="">
            <h4>Obtener datos</h4>
            <span><label from="fecha">Fecha:</label></span>
            <input class="barra" type="date" name="fecha">
            <input class="boton" type="submit" value="Buscar">
        </form>

    </div>

    <!--MOSTRAR DATOS-->
    <div id="mostrar_datos">
        <h3>Ultimos valores</h3>
        <?php
        $queryDB = new QueryDBcontroller();
        $ultimosValores = $queryDB->ultimosDatosPosicion();

        if (isset($ultimosValores)):
            ?>
            <p>Latitud:<?= $ultimosValores->latitud ?></p>
            <p>Longitud:<?= $ultimosValores->longitud ?></p>
        <?php else: ?>
            <p>No hay valores</p>
        <?php endif; ?>
    </div>

    <!--BARRA DE NOTIFICACION-->
    <div id="notificaciones">
        <div class="notificacion">
            <p>Notificaciones</p>
            <?php
            if (empty($_SESSION)) { // Si hay algo en sesion
                session_start();
            }
            ?>                    
            <?php if (!empty($_SESSION['error_cookie'])): ?>
                <p>Error1: <?= $_SESSION['error_cookie']; ?></p>

            <?php elseif (!empty($_SESSION['error_bd'])): ?>
                <p>Error2: <?= $_SESSION['error_bd']; ?></p>

            <?php elseif (!empty($_SESSION['error_guardar'])): ?>
                <p>Error3: <?= $_SESSION['error_guardar']; ?></p>

            <?php elseif (!empty($_SESSION['error_id_posicion'])): ?>
                <p>Error4: <?= $_SESSION['error_id_posicion']; ?></p>

            <?php elseif (!empty($_SESSION['error_consultaId'])): ?>
                <p>Error5: <?= $_SESSION['error_consultaId']; ?></p>

            <?php elseif (!empty($_SESSION['error_api'])): ?>
                <p>Error6: <?= $_SESSION['error_api']; ?></p> 

            <?php elseif (!empty($_SESSION['exito'])): ?>
                <p>Resultado: <?= $_SESSION['exito']; ?></p>

            <?php elseif (!empty($_SESSION['latitud'])): ?>
                <p>Latitud: <?= $_SESSION['latitud']; ?></p>

            <?php elseif (!empty($_SESSION['longitud'])): ?>
                <p>Longitud: <?= $_SESSION['longitud']; ?></p>

            <?php else: ?>            
            <?php endif;
            unset($_SESSION); ?><!--BORRAR SESSION-->

        </div>
    </div>

    <!--DATOS ACTUALES-->
    <div id="datos_actuales">
        <button class="bt_datoActual">Datos Actuales</button>
        <button class="bt_detener">Detener</button>
    </div>

</aside>

<div id="clear"></div>

<!--PIE-->   
<?php require_once 'includes/pie.php'; ?>