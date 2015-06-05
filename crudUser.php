<?php
	require_once("install.php");

	$accion = $_REQUEST['action'];

	if($accion == 'crear'){
		crearUsuario();
	}else if ($accion == 'ver'){
		verUsuarios();
	}

	function crearUsuario(){
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$estado = $_POST['estado'];

		$query = "INSERT INTO Usuarios (Nombres, Apellidos, Direccion, Telefono, Estado) VALUES ('".$nombres."', '".$apellidos."','".$direccion."','".$telefono."','".$estado."')";

		$result = excuteQuery("Usuarios", "", $query);
		if ($result > 0){
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: addUser.php?result=false');
		}
	}

	function verUsuarios (){
		$query = "SELECT * FROM Usuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idUsuario']."</td>";
				echo "    <td>".$value['Nombres']."</td>";
				echo "    <td>".$value['Apellidos']."</td>";
				echo "    <td>".$value['Direccion']."</td>";
				echo "    <td>".$value['Telefono']."</td>";
				echo "    <td>".$value['Estado']."</td>";
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

?>