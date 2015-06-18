<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearcofig();
		}else if ($accion == 'ver'){
			verconfig();
		}else if ($accion == 'update'){
			updateconfig();
		}else if ($accion == 'delete'){
			deleteconfig();
		}

	}

	function crearconfig(){
		/* Proteccion de Datos */
		$params = array(
			':usuario' => $_POST['usuario'],
			':piel' => $_POST['piel'],
			':respuestas' => $_POST['respuestas'],
			);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO 
					Automovil (usuario,piel,respuestas,Placa,Estado)
				VALUES
					(:marca,:modelo,:color,:placa,:estado)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewAutomoviles.php?result=true');
		}else{
			header('Location: addAutomovil.php?result=false');
		}
	}

	function verconfig (){
		$query = "SELECT * FROM Automovil";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idAutomovil']."</td>";
				echo "    <td>".$value['Marca']."</td>";
				echo "    <td>".$value['Modelo']."</td>";
				echo "    <td>".$value['Color']."</td>";
				echo "    <td>".$value['Placa']."</td>";
				echo "    <td>".$value['Estado']."</td>";
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getconfig($id){
		$query = "SELECT * FROM Automovil WHERE idAutomovil = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateconfig (){

		/* Proteccion de Datos */
		$params = array(
			':idAutomovil' => $_SESSION['idAutomovil'],
			':marca' => $_POST['marca'],
			':modelo' => $_POST['modelo'],
			':color' => $_POST['color'],
			':placa' => $_POST['placa'],
			':estado' => $_POST['estado'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Automovil SET
					Marca = :marca,
					Modelo = :modelo,
					Color = :color,
					Placa = :placa,
					Estado = :estado  
				 WHERE idAutomovil= :idAutomovil;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idAutomovil']);
			$_SESSION['idAutomovil'] = NULL;
			header('Location: viewAutomoviles.php?result=true');
		}else{
			header('Location: editAutomovil.php?result=false');
		}
	}

	function deleteconfig (){

		$idAutomovil = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Automovil
				 WHERE idAutomovil = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewAutomoviles.php?result=true');
		}else{
			header('Location: viewAutomoviles.php?result=false');
		}
	}

?>