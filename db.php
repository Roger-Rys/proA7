<?php

$api_key= $latitud = $longitud = "";


if(isset($_COOKIE['lat']) && isset($_COOKIE['log']) && isset($_COOKIE['api_key'])){
    $latitud = $_COOKIE['lat'];
        echo 'lat: '.$latitud.'<br>';
    
    $longitud = $_COOKIE['log'];
        echo 'log: '.$longitud.'<br>';
        
    $api_key = $_COOKIE['api_key'];
        echo 'api: '.$api_key.'<br>';
   
    guardar($latitud, $longitud, $api_key);    
    
}else{
    echo 'No existe valores en Cookie';
    die();
}


function guardar($latitud, $longitud, $api_key){
    //Borramos cookies
        //setcookie($sql, $value, $expire);
        setcookie('lat','',time()-100);
        setcookie('log','',time()-100);
        setcookie('api_key','',time()-100);
    
    // mysqli_connect($host, $user, $password, $database, $port, $socket);
    // $coneccion = mysqli_connect("sql306.byethost.com", "b6_26028707", "roysreyes90", "b6_26028707_bd_pbici");

        $servername = "localhost";//"127.0.0.1"; //"localhost";
        // REPLACE with your Database name
        $dbname = "posbici";
        // REPLACE with Database user
        $username = "root";
        // REPLACE with Database user password
        $password = "";
        //PORT
        $port = 3308;


    // Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
    // If you change this value, the ESP32 sketch needs to match
        $api_key_value = "12345";
    
    if($api_key === $api_key_value) {
        
        //Mostrar
        echo 'latC:'.$latitud.'<br>';
        echo 'lotC:'.$longitud.'<br>';
        // Create connection
        //mysqli_connect($host, $user, $password, $database, $port, $socket)
        $conn = new mysqli($servername, $username, $password, $dbname, $port);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);            
        } 

        $sql = "INSERT INTO poslatlog VALUES ( NULL, $latitud, $longitud, CURDATE(), SYSDATE())";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully!!";
           
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }
    else {
        echo "Wrong API Key provided.";
    }


    function test_input($data) {
        $data = trim($data); //Quita espacios
        $data = stripslashes($data);//Quita slash
        $data = htmlspecialchars($data);//Convierte a elemento HTML
        return $data;
    }
  }
?>