<html>
	<head>
		<title>Insertar a una Base de Datos MySQL</title>
	</head>
	<body style="background-color:56B3D9;">
		<h1 style="text-align: center;">Base de Datos de la Universidad</h1>
		<?php
		    $info=mysqli_connect("localhost","root","","prueba")or die("no se pudo conectar a la base de datos");
			$nombre = $_POST['nombre'];
			$correo = $_POST['correo'];
			$contra = $_POST['password'];
			$sql = "insert into usuario values('$nombre','$correo','$contra')";
			$ejecutar = mysqli_query($info,$sql);
			
		?>				
	</body>
</html>