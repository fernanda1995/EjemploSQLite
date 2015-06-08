<?php
	session_start();
	require_once("install.php");
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearUsuario();
		}else if ($accion == 'ver'){
			verUsuarios();
		}else if ($accion == 'update'){
			updateUser();
		}else if ($accion == 'delete'){
			deleteUser();
		}

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

	function getUser($id){
		$query = "SELECT * FROM Usuarios WHERE idUsuario = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateUser (){

		$idUser = $_SESSION['idUser'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$estado = $_POST['estado'];

		$query = "UPDATE Usuarios SET Nombres = '".$nombres."', Apellidos = '".$apellidos."', Direccion = '".$direccion."', Telefono = '".$telefono."', Estado = '".$estado."'  WHERE idUsuario = '".$idUser."';";

		$result = excuteQuery("Usuarios", "", $query);
		if ($result > 0){
			unset($_SESSION['idUser']);
			$_SESSION['idUser'] = NULL;
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: addUser.php?result=false');
		}
	}

	function deleteUser (){

		$idUser = $_GET['id'];
		$query = "DELETE FROM Usuarios WHERE idUsuario ='".$idUser."';";
		$result = excuteQuery("Usuarios", "", $query);
		if ($result > 0){
			header('Location: viewUsers.php?result=true');
		}else{
			header('Location: addUser.php?result=false');
		}
	}

?>