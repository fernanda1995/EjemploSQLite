<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearLogs();
		}else if ($accion == 'ver'){
			verLogs();
		}else if ($accion == 'update'){
			updateLogs();
		}else if ($accion == 'delete'){
			deleteLogs();
		}

	}

	function crearLogs(){
		/* Proteccion de Datos */
		$params = array(
			':utc' => $_POST['Utc'],
			':anio' => $_POST['Anio'],
			':mes' => $_POST['Mes'],
			':dia' => $_POST['Dia'],
			':hora' => $_POST['Hora'],
			':segundo' => $_POST['Segundo'],
			':ip' => $_POST['Ip'],
			':navegador' => $_POST['Navegador'],
			':usuario' => $_POST['Usuario'],
			':operador' => $_POST['Operador'],
			
		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Logs
					(Utc, Anio, Mes, Dia, Hora,Segundo,Ip,Navegador,Usuario,Operador) 
				VALUES 
					(:utc,:anio,:mes,:dia,:hora,:segundo,:ip,:navegador,:usuario,:operador)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Blog","", $query, $params);
		if ($result > 0){
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: addLogs.php?result=false');
		}
	}

	function verLogs (){
		$query = "SELECT * FROM Logs";
		$result = newQuery("Blog", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idLogs']."</td>";
				echo "    <td>".$value['Utc']."</td>";
				echo "    <td>".$value['Anio']."</td>";
				echo "    <td>".$value['Mes']."</td>";
				echo "    <td>".$value['Dia']."</td>";
				echo "    <td>".$value['Hora']."</td>";
				echo "    <td>".$value['Segundo']."</td>";
				echo "    <td>".$value['Ip']."</td>";
				echo "    <td>".$value['Navegador']."</td>";
				echo "    <td>".$value['Usuario']."</td>";
				echo "    <td>".$value['Operador']."</td>";
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getUser($id){
		$query = "SELECT * FROM Logs WHERE idLogs = '".$id."'";
		$result = newQuery("Blog", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateLogs(){

		/* Proteccion de Datos */
		$params = array(
			
			':utc' => $_POST['Utc'],
			':anio' => $_POST['Anio'],
			':mes' => $_POST['Mes'],
			':dia' => $_POST['Dia'],
			':hora' => $_POST['Hora'],
			':segundo' => $_POST['Segundo'],
			':ip' => $_POST['Ip'],
			':navegador' => $_POST['Navegador'],
			':usuario' => $_POST['Usuario'],
			':operador' => $_POST['Operador'],
			
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Post SET
					Utc = :utc,
					Anio = :anio,
					Mes = :mes,
					Dia = :dia,
					Hora = :hora , 
					Segundo = :segundo,
					Ip= :ip,
					Navegador = :navegador,
					Usuario = :usuario,
				Operador= :operador,
					
				
					
				 WHERE idLogs = :idLog;
				';

		$result = excuteQuery("Blog", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idLog']);
			$_SESSION['idPosts'] = NULL;
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: editLogs.php?result=false');
		}
	}

	function deleteLogs (){

		$idUser = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Logs
				 WHERE idLogs = :id;';

		$result = excuteQuery("Blog", "", $query, $params);
		if ($result > 0){
			header('Location: viewLogs.php?result=true');
		}else{
			header('Location: viewLogs.php?result=false');
		}
	}

?>