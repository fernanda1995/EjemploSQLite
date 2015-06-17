<?php

//################  crear la tabla de usuarios   #################
//conexion new PDO('sqlite:database/blogs.sqlite');

$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ='
CREATE TABLE usuarios(
usuario Char(40) Not Null,
contrasena Char(40) Not Null,
nombre Char(40),
apellidouno Char(40),
apellidodos Char(40),
titulo Char(120),
descripcion Char(1500),
foto Char(40),
webpersonal Char(80),
email Char(80),
permisos Int
);';


//ejecutar
$resultado =  $conexion -> exec($consulta);
//cerrar

//################  insertaremos contenido de prueba en la tabla de usaurios   #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion

$consulta ="INSERT INTO usuarios('usuario','contrasena','nombre','apellidouno','apellidodos','titulo','descripcion','foto','webpersonal','email','permisos') VALUES('jocarsa','jocarsa','Jose Vicente','Carratala','Sanchis','Creativo Multimedia','Descripcion','josevicentecarratala','http://www.jocarsa.com','info@jocarsa.com',1)";


//ejecutar
$resultado = $conexion-> exec($consulta);
//cerrar

//################  crear la tabla config usuarios   #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="

CREATE TABLE configusuarios(
usuario Char(40) Not Null,
piel Char(40),
respuestas Char(40)

);";


//ejecutar
$resultado = $conexion-> exec($consulta);
//cerrar

//################   insertaremos contenido de prueba en la configuracion de usuarios  #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="INSERT INTO configusuarios('usuario','piel','respuestas') VALUES('jocarsa','default','si')";

//ejecutar
$resultado = $conexion -> exec($consulta);
//cerrar

//################  crear la tabla posts   #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="

CREATE TABLE posts(
utc Int Not Null,
anio Int,
mes Int,
dia Int,
hora Int,
minuto Int,
segundo Int,
usuario Char(80),
titulo Char(120),
subtitulo Char(200),
icono Char(80),
texto Char(4000),
imagen Char(200),
video Char(200),
sonido Char(200)
);";


//ejecutar
$resultado = $conexion -> exec($consulta);
//cerrar


//################   insertaremos contenido de prueba en la tabla posts  #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="INSERT INTO posts ('utc','anio','mes','dia','hora','minuto','segundo','usuario','titulo','subtitulo','icono','texto','imagen','video','sonido') VALUES(00000000,2011,02,10,11,55,00,'jocarsa','Este es un primer post','Bienvenido a tu blog','josevicente','Este es el primer post','imagen','video','sonido')";
//ejecutar
$resultado = $conexion-> exec($consulta);
//cerrar

//################   crear la tabla logs  #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="
CREATE TABLE logs(
utc Int Not Null,
anio Int,
mes Int,
dia Int,
hora Int,
minuto Int,
segundo Int,
ip Char(80),
navegador Char(300),
usuario Char(80),
operacion Char(80)

);";


//ejecutar
$resultado = $conexion-> exec($consulta);
//cerrar



//################   insertaremos contenido de prueba en la tabla logs  #################
//conexion
$conexion = new PDO('sqlite:database/blogs.sqlite');
//peticion
$consulta ="INSERT INTO logs('utc','anio','mes','dia','hora','minuto','segundo','ip','navegador','usuario','operacion') VALUES(00000000,2011,02,10,11,55,00,'127.0.0.1','Chrome','jocarsa','crear')";

//ejecutar
$resultado = $conexion-> exec($consulta);
//cerrar

?>
