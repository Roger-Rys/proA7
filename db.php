<?php
include_once 'model/conexionDB.php';
include_once 'controller/queryDBcontroller.php';
include_once 'controller/mostrarMarkerController.php';

$api_key= $latitud = $longitud = "";

//COOKIES
if(isset($_COOKIE['id_pos']) && isset($_COOKIE['lat']) && isset($_COOKIE['log']) && isset($_COOKIE['api_key'])){
    $id_posicion = $_COOKIE['id_pos'];
        //echo 'id_pos: '.$id_posicion.'<br>';        
    $latitud = $_COOKIE['lat'];
        //echo 'lat: '.$latitud.'<br>';    
    $longitud = $_COOKIE['log'];
        //echo 'log: '.$longitud.'<br>';
    $api_key = $_COOKIE['api_key'];
        //echo 'api: '.$api_key.'<br>';
    guardar($id_posicion,$latitud, $longitud, $api_key);    
    
}
else{
   $_SESSION['error_cookie'] = 'No existe valores en Cookie';
    goto dirigir;    
}
dirigir: header('location: ubicarBici.php');


//GUARDAR DATOS EN BASE DE DATOS
function guardar($id_posicion,$latitud, $longitud, $api_key){
    //Borramos cookies
        //setcookie($sql, $value, $expire);
        setcookie('id_pos','',time()-100);
        setcookie('lat','',time()-100);
        setcookie('log','',time()-100);
        setcookie('api_key','',time()-100);
              
        $api_key_value = "12345";
    
    if($api_key === $api_key_value) {
        if(empty($_SESSION)){ // Si hay algo en sesion
            session_start();            
        }
       
        //CREO CONEXION CON BASE DE DATOS
        $conexion = new DB();
        $conn= $conexion->conexionDB();
        
        // Check connection
        if ($conn->connect_error) {
            $_SESSION['error_bd'] = "Sin conexion con base de datos: </br>" . $conn->connect_error;
        }
        
        //SELECCION id_posicion
        $query_id_posicion = new QueryDBcontroller();
        $result_id_posicion = $query_id_posicion->seleccionar_id_posicion();
        
        if($result_id_posicion == TRUE ){
            $resultQuery_id_posicion = $result_id_posicion->fetch_Object();//Separo objeto
            $resultQuery_id_posicion = $resultQuery_id_posicion->id_posicion;
            
            //COMPROBAR SI EXISTEN DATOS
            if( $resultQuery_id_posicion != $id_posicion){
                $sql = "INSERT INTO poslatlog VALUES ( NULL,$id_posicion, $latitud, $longitud, CURDATE(), SYSDATE())";
                
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['exito'] = "Nuevos datos guardados!!";
                                                            
                    //GUARDO LAT Y LOG EN SESION
                    $_SESSION['latitud']=$latitud; 
                    $_SESSION['longitud']=$longitud;
                    //Mostrar todos los datos por dia
                    showInMap();
                } 
                else {
                    $_SESSION['error']['guardar']="Error en guardar datos: <br>" . $conn->error;
                    
                }
                $conn->close();
            }
            else{
                $_SESSION['error_id_posicion'] = "Sin nuevos valores";
            }
        }
        else{
           $_SESSION['error_consultaId'] = 'Error de comparacion: '.$conn->error;
            $conn->close();
            goto dirigir;
        }            
    }
    else {
        $_SESSION['error_api'] = "Error de llave API";
         goto dirigir;
    }
    dirigir: header('location: ubicarBici.php');

  }


function showInMap(){
    $mostrarEnMap = new MostrarMarkerController();
    //Llamo a objeto mostrarMarkerEnMap
    $mostrarEnMap->mostrarMarkerEnMap("CURDATE()");
    
    header('location: ubicarBici.php');    
}   
?>
<script type="text/javascript">

</script>
