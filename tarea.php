
		<?php
		    $host="bmddqndirbgg56hcvqbh-mysql.services.clever-cloud.com";
			$user="uzazf4lnpl1unusk";
			$password="EwysBgCdhyC6VieUegvL";
			$db_name="bmddqndirbgg56hcvqbh";
		    $info=mysqli_connect($host,$user,$password,$db_name)or die("no se pudo conectar a la base de datos");
	
					    $registros = '{"usuarios":[';
			            $cosulta="select nombre, correo, contra from usuario";
			            $result = mysqli_query ($info, $cosulta);
	                    while($fila=mysqli_fetch_array($result)){
			    if ($registros != '{"usuarios":[') {
				$registros .= ',';
			}
			$registros .= '{"nombre":"'.$fila["nombre"].'",';
			$registros .= '"correo":"'.$fila["correo"].'",';
			$registros .= '"contra":"'.$fila["contra"].'"}';
		}
		$registros .= ']}';
		echo $registros;
		            
			            
	                ?>
			
        </div>  			
	</body>
</html>


