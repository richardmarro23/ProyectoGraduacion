<?php
header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //PARAMETROS DE LA BASE DE DATOS 
	include 'bd.php';
    $dns = "mysql:host=$host;dbname=$db_name";
    

    //RECUPERAR DATOS DEL FORMULARIO
    $data = file_get_contents("php://input");
    $objData = json_decode($data);
    
    // ASIGNAR LOS VALORES A LA VARIABLE
    $nombre1 = $objData->primer_nombre;
	$nombre2 = $objData->segundo_nombre;	
	$apellido1 = $objData->primer_apellido;
	$apellido2 = $objData->segundo_apellido;
	$correo = $objData->correo;	
	$contra = $objData->contra;
	    
   	
   
    $db = new PDO($dns, $user, $password);
   
    if($db){
        $sql = 'INSERT INTO usuario (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, contra) VALUES ("' . $nombre1. '","' . $nombre2 . '","' . $apellido1 . '","' . $apellido2 . '","' . $correo . '","' . $contra . '")';
        $query = $db->prepare($sql);
		if(!empty($nombre1)&&!empty($nombre2)&&!empty($apellido1)&&!empty($apellido2)&&!empty($correo)&&!empty($contra)){
            $query ->execute();
		}
        if(!$query){
            $datos = array('mensaje' => "No se ha registrado! ");
            echo json_encode($datos);
        }else{                  
            echo json_encode('OK');
        }
    }else{
        $datos = array('mensaje' => "Error, intente nuevamente");
        echo json_encode($datos);
    }

    ?>