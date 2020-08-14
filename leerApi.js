$(document).ready(function(){    
    
    $('.bt_datoActual').click(function(){
        localStorage.setItem('ajax',true);
        location.reload();
    });
    $('.bt_detener').click(function(){
        localStorage.setItem('ajax',false);
        location.reload();
    });
    
    
    var estado = localStorage.getItem('ajax');
    console.log(estado=="true", estado!=null);
    
    if(estado=="true" && estado!=null ){
        var id_pos_old=0;    
        var intervalo = setInterval(ajax,5000);
    }
      
    
    function ajax(){
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

                if(id_pos !== id_pos_old){
                    console.log('idOldAjx: ',id_pos_old);
                    var result = ingresar_datos(id_pos, latitud, longitud)
                    console.log(result);

                    console.log('Completado!!!!!');
                    document.location.href='http://localhost/master-php/proyectMap/db.php';
                    //setInterval(function(){},2000);

                }
                else{
                    console.log('Ningun dato nuevo');                    
                }
            },
            error:function(){
                    console.log('error');
            }            
        });

    }

    function ingresar_datos(id_pos, latitud, longitud){
        id_pos_old = id_pos;

        console.log('idOldFun:',id_pos_old);
        document.cookie = 'id_pos='+id_pos;
        document.cookie = 'lat='+latitud;
        document.cookie = 'log='+longitud;
        document.cookie = 'api_key='+'12345';

        var result = 'Nuevos valores\n';
        result+='id:'+id_pos+'\n';
        result+='log:'+latitud+'\n';
        result+='lat:'+longitud+'\n';

        return result;
    }

    
    
    
});

