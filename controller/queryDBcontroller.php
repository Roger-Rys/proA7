<?php
   
   include_once 'model/queryBD.php'; 
   //Controlador de consultas
   class QueryDBcontroller{
       public $fecha;
       
       function posicionPorFecha($fecha) {
           $queryDB = new QueryBD();
           $datosPosicion = $queryDB->datosPosicionFecha($fecha);
           if($datosPosicion ){
               return $datosPosicion;
           }else{
               return $queryDB->db->error;
           }           
       }
       function ultimosDatosPosicion(){
           $queryDB = new QueryBD();
           $ultimosDatos = $queryDB->ultimosDatosPosicion();
           $ultimo = $ultimosDatos->fetch_Object();
           return $ultimo;            
       }


       


   }