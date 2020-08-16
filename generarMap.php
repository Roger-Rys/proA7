<!--OBTENER DATOS-->
<?php
include_once('model/queryBD.php');
$res = new QueryBD;
$val = $res->ultimosDatosPosicion();
//Combertir los datos
$row = $val->fetch_assoc();
$longitud = $row["longitud"];
$latitud = $row["latitud"];
?>

<!--FUNCION MAPA-->
<script>
     
   //Ubicacion ultimos datos
   var longitud = "<?php echo $longitud ?>";
   var latitud = "<?php echo $latitud ?>";

   console.log(longitud + ' - ' + latitud);
   var vistaCentral = {lat: parseFloat(latitud), lng: parseFloat(longitud)};

   //RECOJER JSON
   var contenedor = $.getJSON('text/valores.json',function(data){
       var geol=[];
        $.each(data, function( index, value ) {
             obj={
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [value.longitud, value.latitud]
                    },
                    properties: {
                        'marker-color': '#003333',
                        'marker-size': 'large',
                        'marker-symbol': 'bicycle'
                    }
                };                           
              geol[index]=obj;                
        });
        if(geol!=null){
            initMap(vistaCentral, geol);
        }else{
            //GEOJSON
            var geojson = '';  
             geojson = [{
                            type: 'Feature',
                            geometry: {
                                type: 'Point',
                                coordinates: [longitud, latitud]
                            },
                            properties: {
                                'marker-color': '#003333',
                                'marker-size': 'large',
                                'marker-symbol': 'bicycle'
                            }
                        }];       

                initMap(vistaCentral, geojson);
            }
   });
       
   //GENERAR MAPA 
    function initMap(vistaCentral, geojson) {
       L.mapbox.accessToken = 'pk.eyJ1Ijoicm9nZXJyeWVzIiwiYSI6ImNrZHZhYXNrNDBjeTIyeG84cjRweTU5YXcifQ.J9OVmAObzSp_--B6DA6lgg';
       
       var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
            attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            tileSize: 512,
            zoomOffset: -1
        });
        
        //VISTA CENTRAL CON ZOOM
        var map = L.map('map')
                .addLayer(mapboxTiles)
                .setView(vistaCentral, 16); //-0.194568, -78.493005 //[latitud, longitud]
        
        
        //AGREGA MARQUER
        var myLayer = L.mapbox.featureLayer().setGeoJSON(geojson).addTo(map);

    }
</script>
