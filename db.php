<?php
include_once 'model/conexionDB.php';

$api_key= $latitud = $longitud = "";


if(isset($_COOKIE['id_pos']) && isset($_COOKIE['lat']) && isset($_COOKIE['log']) && isset($_COOKIE['api_key'])){
    $id_posicion = $_COOKIE['id_pos'];
        echo 'id_pos: '.$id_posicion.'<br>';
        
    $latitud = $_COOKIE['lat'];
        echo 'lat: '.$latitud.'<br>';
    
    $longitud = $_COOKIE['log'];
        echo 'log: '.$longitud.'<br>';
        
    $api_key = $_COOKIE['api_key'];
        echo 'api: '.$api_key.'<br>';
        
    guardar($id_posicion,$latitud, $longitud, $api_key);    
    
}
else{
   $_SESSION['error_cookie'] = 'No existe valores en Cookie';
    goto dirigir;    
}
dirigir: header('location: ubicarBici.php');


function guardar($id_posicion,$latitud, $longitud, $api_key){
    //Borramos cookies
        //setcookie($sql, $value, $expire);
        setcookie('id_pos','',time()-100);
        setcookie('lat','',time()-100);
        setcookie('log','',time()-100);
        setcookie('api_key','',time()-100);
        
    // mysqli_connect($host, $user, $password, $database, $port, $socket);
    // $coneccion = mysqli_connect("sql306.byethost.com", "b6_26028707", "roysreyes90", "b6_26028707_bd_pbici");

        
    // Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
    // If you change this value, the ESP32 sketch needs to match
        $api_key_value = "12345";
    
    if($api_key === $api_key_value) {
        if(empty($_SESSION)){ // Si hay algo en sesion
            session_start();            
        }
       
        //CREO CONEXION
        $conexion = new DB();
        $conn= $conexion->conexionDB();
        
        // Check connection
        if ($conn->connect_error) {
            $_SESSION['error_bd'] = "Connection failed: " . $conn->connect_error;
        }
        $sql = 'SELECT id_posicion FROM poslatlog ORDER BY id_posicion DESC LIMIT 1';
        
        if($conn->query($sql)== TRUE ){
            $result = $conn->query($sql);//Obtengo consulta
            $resultSql = $result->fetch_object(); //Separo objeto
            $resultSql = $resultSql->id_posicion; //Selecciono Objeto
                        
            //COMPROBAR SI EXISTEN DATOS
            if( $resultSql != $id_posicion){
                $sql = "INSERT INTO poslatlog VALUES ( NULL,$id_posicion, $latitud, $longitud, CURDATE(), SYSDATE())";
                
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['exito'] = "Nuevos datos guardados!!";
                                                            
                    //GUARDO LAT Y LOG EN SESION
                    $_SESSION['latitud']=$latitud; 
                    $_SESSION['longitud']=$longitud;
                    header('location: ubicarBici.php');
                } 
                else {
                    $_SESSION['error']['guardar']="Error: " . $sql . "<br>" . $conn->error;
                    
                }
                $conn->close();
            }
            else{
                $_SESSION['error_id_posicion'] = "id_posicion ya existe";
            }
        }
        else{
           $_SESSION['error_consultaId'] = 'Error de comparacion: '.$conn->error;
            $conn->close();
            goto dirigir;
        }            
    }
    else {
        $_SESSION['error_api'] = "Wrong API Key provided.";
         goto dirigir;
    }
    dirigir: header('location: ubicarBici.php');

  }
  
?>