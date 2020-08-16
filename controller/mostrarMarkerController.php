<?php
include_once 'queryDBcontroller.php';
class MostrarMarkerController{
    function mostrarMarkerEnMap($fecha){
        $queryUltimosDatos = new QueryDBcontroller();
        $posiciones = $queryUltimosDatos->posicionPorFecha($fecha);
        $posicionJSON=array();
        $aMapa = array();
        $cont=0;

        while ($posicion = $posiciones->fetch_object()) {
            $aMapa['longitud']=$posicion->longitud;
            $aMapa['latitud']=$posicion->latitud;
            $posicionJSON[$cont]=$aMapa;
            $cont++;           
        }
        //echo json_encode($posicionJSON);
        if(!is_dir('text')){
            mkdir('text',0777);        
            if(!file_exists('valores.json')){
                $myfile = fopen("text/valores.json", "w");
                fwrite($myfile, json_encode($posicionJSON));
                fclose($myfile);                    
            }
        }else{
           $myfile = fopen("text/valores.json", "w");
           fwrite($myfile, json_encode($posicionJSON));
           fclose($myfile); 
        }
    }
}

