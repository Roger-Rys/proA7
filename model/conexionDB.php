<?php

class DB{
    public static function conexionDB(){
        $servername = "localhost";//"127.0.0.1"; //"localhost"; //"sql306.byethost.com";
        // REPLACE with your Database name
        $dbname = "posbici"; // "b6_26028707_bd_pbici";
        // REPLACE with Database user
        $username = "root"; //"b6_26028707";
        // REPLACE with Database user password
        $password = ""; //"roysreyes90";
        //PORT
        $port = 3308;//3306;
        
        $db = new mysqli($servername, $username, $password, $dbname, $port);
        $db->query('SET NAMES "utf8"');
        
        return $db;//self::$db
    }

}
