<?php

include_once 'conexionDB.php';

class QueryBD extends DB{
    public $db;
    public function __construct() {
        $this->db = DB::conexionDB();
    }

    public function ultimosDatosPosicion(){
        $query = 'SELECT latitud, longitud FROM poslatlog ORDER BY id DESC LIMIT 1';
        $result = $this->db->query($query);
        return $result;
    }
    
    public function todosLosDatosPosicion(){
        $query = 'SELECT latitud, longitud, fecha, hora FROM poslatlog';
        $result = $this->db->query($query);
        return $result;
    }
    
    public function datosPosicionFecha($fecha){//"2020-08-10"
        $query = "SELECT latitud, longitud, fecha, hora FROM poslatlog WHERE fecha LIKE '$fecha'";
        $result = $this->db->query($query);
        return $result;
    }
    public function posicionActual(){
        
    }
}