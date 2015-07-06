<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearPost();
		}else if ($accion == 'ver'){
			verPost();
		}else if ($accion == 'update'){
			updatePost();
		}else if ($accion == 'delete'){
			deletePost();
		}

	}

	function crearPost(){
		/* Proteccion de Datos */
		$params = array(
			':utc' => $_POST['Utc'],
			':anio' => $_POST['Anio'],
			':mes' => $_POST['Mes'],
			':dia' => $_POST['Dia'],
			':hora' => $_POST['Hora'],
			':segundo' => $_POST['Segundo'],
			':titulo' => $_POST['Titulo'],
			':subtitulo' => $_POST['SubTitulo'],
			':icono' => $_POST['Icono'],
			':texto' => $_POST['Texto'],
			':imagen' => $_POST['Imagen'],
			':video' => $_POST['Video'],
			':sonido' => $_POST['Sonido'],
		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Post
					(Utc, Anio, Mes, Dia, Hora,Segundo,Titulo,SubTitulo,Icono,Texto,Imagen,Video,Sonido) 
				VALUES 
					(:utc,:anio,:mes,:dia,:hora,:segundo,:titulo,:subtitulo,:icono,:texto,:imagen,:video,:sonido)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Blog","", $query, $params);
		if ($result > 0){
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: addPosts.php?result=false');
		}
	}

	function verPost (){
		$query = "SELECT * FROM Post";
		$result = newQuery("Blog", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idPost']."</td>";
				echo "    <td>".$value['Utc']."</td>";
				echo "    <td>".$value['Anio']."</td>";
				echo "    <td>".$value['Mes']."</td>";
				echo "    <td>".$value['Dia']."</td>";
				echo "    <td>".$value['Hora']."</td>";
				echo "    <td>".$value['Segundo']."</td>";
				echo "    <td>".$value['Titulo']."</td>";
				echo "    <td>".$value['SubTitulo']."</td>";
				echo "    <td>".$value['Icono']."</td>";
				echo "    <td>".$value['Texto']."</td>";
				echo "    <td>".$value['Imagen']."</td>";
				echo "    <td>".$value['Video']."</td>";
				echo "    <td>".$value['Sonido']."</td>";
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getUser($id){
		$query = "SELECT * FROM Post WHERE idPost = '".$id."'";
		$result = newQuery("Blog", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updatePost(){

		/* Proteccion de Datos */
		$params = array(
			
			':utc' => $_POST['Utc'],
			':anio' => $_POST['Anio'],
			':mes' => $_POST['Mes'],
			':dia' => $_POST['Dia'],
			':hora' => $_POST['Hora'],
			':segundo' => $_POST['Segundo'],
			':titulo' => $_POST['Titulo'],
			':subtitulo' => $_POST['SubTitulo'],
			':icono' => $_POST['Icono'],
			':texto' => $_POST['Texto'],
			':imagen' => $_POST['Imagen'],
			':video' => $_POST['Video'],
			':sonido' => $_POST['Sonido'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Post SET
					Utc = :utc,
					Anio = :anio,
					Mes = :mes,
					Dia = :dia,
					Hora = :hora , 
					Segundo = :segundo,
					Titulo= :titulo,
					SubTitulo = :subtitulo,
					Icono= :icono,
					Texto = :texto,
					Imagen= :imagen,
					Video = :video,
					Sonido= :sonido
					
				 WHERE idPost = :idPosts;
				';

		$result = excuteQuery("Blog", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idPosts']);
			$_SESSION['idPosts'] = NULL;
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: editPosts.php?result=false');
		}
	}

	function deletePost (){

		$idUser = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Post
				 WHERE idPost = :id;';

		$result = excuteQuery("Blog", "", $query, $params);
		if ($result > 0){
			header('Location: viewPosts.php?result=true');
		}else{
			header('Location: viewPosts.php?result=false');
		}
	}

?>