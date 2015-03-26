<?php
  // pre-registro de un admin
  $nombre=$_REQUEST["Nombre"];
  $telefono=$_REQUEST["Telefono"];
  $usuario=$_REQUEST["Usuario"];
  $contraseña = $_REQUEST["Contraseña"];
  $correo = $_REQUEST["Correo"];
  $estado = $_REQUEST["Estado"];
  
  
   if ($nombre!="" || $telefono!="" || $usuario!="" || $contraseña!="" || $correo!="" || $estado!=""){
		$dbconn = pg_connect("host=localhost dbname=becas user=postgres password=12345")
					or die('No se ha podido conectar: ' . pg_last_error());

		$datos = array();
		$sql="Select add_user('$nombre', '$telefono', '$usuario', '$contraseña', '$correo', $estado);";
		$result =  pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

		while ($row = pg_fetch_object($result)) {
			$datos[] = $row;
		}
		echo json_encode($datos);
	}
	else{
		echo "-1";
	}
?>