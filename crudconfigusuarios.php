<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearconfigusuarios();
		}else if ($accion == 'ver'){
			verconfigusuarios();
		}else if ($accion == 'update'){
			updateconfigusuarios();
		}else if ($accion == 'delete'){
			deleteconfigusuarios();
		}

	}

	function crearconfigusuarios(){
		/* Proteccion de Datos */
		$params = array(
			':usuario' => $_POST['usuario'],
			':piel' => $_POST['piel'],
			':respuestas' => $_POST['respuestas'],
			);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO configusuarios 
		             (usuario,piel,respuestas)
				VALUES
					 (:usuario,:piel,:respuestas)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);

		if ($result > 0){
			header('Location: viewconfigusuarios.php?result=true');
		}else{
			header('Location: addconfigusuarios.php?result=false');
		}
	}

	function verconfigusuarios(){
		$query = "SELECT * FROM configusuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idconfigusuarios']."</td>";
				echo "    <td>".$value['usuario']."</td>";
				echo "    <td>".$value['piel']."</td>";
				echo "    <td>".$value['respuestas']."</td>";
				
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getconfigusuarios($id){
		$query = "SELECT * FROM configusuarios WHERE idconfigusuarios = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateconfigusuarios(){

		/* Proteccion de Datos */
		$params = array(
			':idconfigusuarios' => $_SESSION['idconfigusuarios'],
			':usuario' => $_POST['usuario'],
			':piel' => $_POST['piel'],
			':respuestas' => $_POST['respuestas'],
			
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE configusuarios SET
					usuario = :usuario,
					piel = :piel,
					respuestas = :respuestas
					
				 WHERE idconfigusuarios= :idconfigusuarios;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idconfigusuarios']);
			$_SESSION['idconfigusuarios'] = NULL;
			header('Location: viewconfigusuarios.php?result=true');
		}else{
			header('Location: editconfigusuarios.php?result=false');
		}
	}

	function deleteconfigusuarios (){

		$idconfigusuarios = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM configusuarios
				 WHERE idconfigusuarios = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewconfigusuarios.php?result=true');
		}else{
			header('Location: viewconfigusuarios.php?result=false');
		}
	}

?>