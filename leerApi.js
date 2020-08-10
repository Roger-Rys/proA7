$(document).ready(function(){
    
    $.ajax({
        type: 'GET',
        url: 'https://api.thingspeak.com/channels/1073852/feeds.json?results=2',

        beforeSend:function(){
                console.log('Cargando');
        },
        success:function(response){
                console.log('alimentacion: ',response.feeds);

                var index = (response.feeds.length)-1;
                console.log('id: ',response.feeds[index]);

                var datos = response.feeds[index];

                var id_pos = datos['entry_id'];
                var latitud = datos['field1'];
                var longitud = datos['field2'];
                
                document.cookie = 'id_pos='+id_pos;
                document.cookie = 'lat='+latitud;
                document.cookie = 'log='+longitud;
                document.cookie = 'api_key='+'12345';

                console.log('id:',id_pos);
                console.log('log:',latitud);
                console.log('lat:',longitud);
        },
        error:function(){
                console.log('error');
        }
    });
   
});

