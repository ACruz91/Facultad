<?php 
	//Conexion
	$link = mysql_connect("localhost", "root", "root") or die("La Conexión Mysql ha fallado.");
	mysql_select_db("facultad", $link) or die("No existe la Base de Datos.");


	$sql = "CREATE TABLE Auditoria_Persona
	(id INT NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(100) NOT NULL,
	fecha DATETIME NOT NULL,	
	nombre_old VARCHAR(30) NOT NULL,
	apellidos_old VARCHAR(50) NOT NULL,
	fotografia_old LONGBLOB,
	email_old VARCHAR(30),
	tipo_persona_old ENUM('Alumno','Profesor'),
	nombre_new VARCHAR(30) NOT NULL,
	apellidos_new VARCHAR(50) NOT NULL,
	fotografia_new LONGBLOB,
	email_new VARCHAR(30),
	tipo_persona_new ENUM('Alumno','Profesor'),
		CONSTRAINT pk_ap
			PRIMARY KEY (id));"; 

	echo $sql;
	?>


