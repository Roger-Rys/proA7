<?php

class DB{
    public static function conexionDB(){
        $servername = "localhost";//"127.0.0.1"; //"localhost";
        // REPLACE with your Database name
        $dbname = "posbici";
        // REPLACE with Database user
        $username = "root";
        // REPLACE with Database user password
        $password = "";
        //PORT
        $port = 3308;
        
        $db = new mysqli($servername, $username, $password, $dbname, $port);
        $db->query('SET NAMES "utf8"');
        
        return $db;//self::$db
    }

}
