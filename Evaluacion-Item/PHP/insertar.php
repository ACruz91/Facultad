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
              <li><a href="/Facultad/Evaluacion-Item/insertar.html"><i class="fa fa-files-o"></i> Insertar</a></li>
              <li><a href="/Facultad/Evaluacion-Item/"><i class="fa fa-list-alt"></i> Consulta</a></li>
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
			$nota_item=mysql_escape_string($_POST['nota_item']); 
			$comentario_item=mysql_escape_string($_POST['comentario_item']); 
			$id_asignatura=mysql_escape_string($_POST['id_asignatura']);
      $matricula=mysql_escape_string($_POST['matricula']); 
      $id_item=mysql_escape_string($_POST['id_item']);  
      echo $nota_item;
      echo "---";
      echo $comentario_item;
      echo "---";
      echo $id_asignatura;
      echo "---";
      echo $matricula;
      echo "---";
      echo $id_item;

			$sql = "INSERT INTO evaluacion_item (nota_item, comentario_item, id_asignatura, matricula, id_item) VALUES ('$nota_item', '$comentario_item','$id_asignatura', '$matricula', '$id_item')";
   
			$result = mysql_query($sql);
			if($result === false) {
			    echo "No se pudieron insertar los datos de la item. " . mysql_error() . ". " . mysql_errno();
			}
			else {
              echo "<center><h1>El Item se ha creado correctamente</h1></center>";
              echo "<center><a class=pure-button pure-button-primary href=/Facultad/Evaluacion-Item/PHP/consulta.php>Volver</a></center>"; 
        }        

			?>
      </div>
    </div>
  </body>
</html>

