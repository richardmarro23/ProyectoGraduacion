<?php

    include 'bd.php';

    $con = mysqli_connect($host,$user,$password,$db_name)or die("no se pudo conectar a la base de datos");
 
    $json = file_get_contents('php://input');
    $obj = json_decode($json,true);
 
    $email = $obj['correo']; 
    $password = $obj['contra'];
 
    $sql = "select concat(primer_nombre,' ',primer_apellido) as nombre from usuario u where correo = '$email' and contra = '$password' ";
 
    $fila = mysqli_fetch_array(mysqli_query($con,$sql));
	
    if(isset($fila)){ 
	    $xd=$fila['nombre'];
        echo json_encode($xd); 
    }else{ 
        echo json_encode('Error'); 
    } 
    mysqli_close($con);
?>