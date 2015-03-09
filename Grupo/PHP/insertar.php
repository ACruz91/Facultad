<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Colegio</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="jquery.touchSwipe.min.js"></script>
    <link rel="stylesheet" href="/Facultad/css/style.css">
    </style>
    <script type="text/javascript">
      $(window).load(function(){
        $("[data-toggle]").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");
        });
         $(".swipe-area").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="right") {
                           $(".container").addClass("open-sidebar");
                           return false;
                      }
                      if (phase=="move" && direction =="left") {
                           $(".container").removeClass("open-sidebar");
                           return false;
                      }
                  }
          }); 
      });
      
    </script>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" >
  </head>
  <body>
    <div class="container">
      <div id="sidebar">
          <ul>
              <li><a href="/Facultad/Grupo/insertar.html"><i class="fa fa-files-o"></i> Insertar</a></li>
              <li><a href="/Facultad/Grupo/"><i class="fa fa-list-alt"></i> Consulta</a></li>
              <li><a href="/Facultad/menu.html"><i class="fa fa-align-justify"></i> Menú</a></li>              
              <li><a href="/Facultad/Persona/PHP/consulta.php"><i class="fa fa-user"></i> Persona</a></li>
              <li><a href="/Facultad/Alumno/PHP/consulta.php"><i class="fa fa-graduation-cap"></i> Alumno</a></li>
              <li><a href="/Facultad/Grupo/PHP/consulta.php"><i class="fa fa-group"></i> Grupo</a></li>
              <li><a href="/Facultad/Profesor/PHP/consulta.php"><i class="fa fa-university"></i> Profesor</a></li>
              <li><a href="/Facultad/Asignatura/PHP/consulta.php"><i class="fa fa-pencil-square-o"></i> Asignatura</a></li>
              <li><a href="/Facultad/Evaluacion/PHP/consulta.php"><i class="fa fa-bar-chart"></i> Evaluacion</a></li> 
              <li><a href="/Facultad/Item/PHP/consulta.php"><i class="fa fa-paperclip "></i> Item</a></li>   
              <li><a href="/Facultad/PHP/Evaluacion-Item/consulta.php"><i class="fa fa-table"></i> Evaluacion - Item</a></li>                                  
              <li><a href="/Facultad/PHP/logout.php"><i class="fa fa-lock"></i> Cerrar Sesión</a></li> 
          </ul>
      </div>
      <div class="main-content">
          <div class="swipe-area"></div>
          <a href="#" data-toggle=".container" id="sidebar-toggle">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
          </a>
          <div class="content">
			<?php

			//Conexion
			$link = mysql_connect("localhost", "root", "root") or die("La Conexión Mysql ha fallado.");
			mysql_select_db("facultad", $link) or die("No existe la Base de Datos.");

			//Recogida de datos por el metodo post
			$curso_grupo=mysql_escape_string($_POST['curso_grupo']); 
			$numero_grupo=mysql_escape_string($_POST['numero_grupo']); 
			$titulacion=mysql_escape_string($_POST['titulacion']); 
			$max_capacidad=mysql_escape_string($_POST['max_capacidad']);      
			$sql = "INSERT INTO grupo (max_capacidad, curso_grupo, numero_grupo, titulacion) VALUES ('$max_capacidad', '$curso_grupo', '$numero_grupo', '$titulacion')";
 
			$result = mysql_query($sql);
			if($result === false) {
			    echo "No se pudieron insertar los datos del grupo. " . mysql_error() . ". " . mysql_errno();
			}
			else {
			}
      $result = mysql_query($sql2);
      if($result === false) {
            echo "No se pudo insertar el grupo. " . mysql_error() . ". " . mysql_errno();
            echo "<center><a class=pure-button pure-button-primary href=/Facultad/Grupo/PHP/consulta.php>Volver</a></center>";            
      }
      else {
              echo "<center><h1>El Grupo se ha creado correctamente</h1></center>";
              echo "<center><a class=pure-button pure-button-primary href=/Facultad/Grupo/PHP/consulta.php>Volver</a></center>"; 
      }        

			?>
      </div>
    </div>
  </body>
</html>

