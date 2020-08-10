<!--CABEZA-->
<?php require_once 'includes/cabeza.php';?>

<!--OBTENER DATOS-->
<div id="obtener_datos">
    <h4>Obtener datos</h4>
    <span><label from="fecha">Fecha:</label></span>
    <input class="barra" type="date" name="fecha">
    <input class="boton" type="submit" title="Buscar">
</div>

<!--MOSTRAR DATOS-->
<div id="mostrar_datos">
    <?php if(isset($POST["lat"]) && isset($POST["lng"])):?>
    <p>Valores de posicion</p>
    <p>Valor de latitud <?=$lat;?></p>
    <p>Valor de latitud <?=$lng;?></p>
    
    <?php elseif(!isset($POST["lat"]) && !isset($POST["lng"])):?>
    <p>No hay valores de posicion</p>        
    <?php endif;?>
</div>

<!--MAPA-->
<div id="mapa">
    <p>Aqui va mapa</p>
</div>

<!--PIE-->   
<?php require_once 'includes/pie.php';?>
