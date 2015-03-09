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
              <li><a href="/Facultad/Asignatura/insertar.html"><i class="fa fa-files-o"></i> Insertar</a></li>
              <li><a href="/Facultad/Asignatura/consulta.html"><i class="fa fa-list-alt"></i> Consulta</a></li>
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
              <h1>Listado de Asignaturas</h1>
            <?php
            //Conexion

            $link = mysql_connect("localhost", "root", "root") or die("La Conexión Mysql ha fallado.");
            mysql_select_db("facultad", $link) or die("No existe la Base de Datos.");

            //Busqueda

            //Recogida de datos por el metodo post
            $nombre_asignatura=mysql_escape_string($_POST['nombre_asignatura']);
            $sql= mysql_query("SELECT * FROM asignatura WHERE (nombre_asignatura = '$nombre_asignatura')", $link);
            if ($row = mysql_fetch_array($sql)){ 
                  echo "<table class=pure-table pure-table-horizontal>";
                  echo "<thead>";
                  echo "<tr>";

            while($field = mysql_fetch_field($sql)){

                        echo "<th>$field->name</th> \n";                

            }
                  echo "<th>Borrar</th>";
                  echo "<th>Modificar</th>";
                  echo "</thead>";

                  echo "</tr> \n";

            do { 
                        echo "<tr> \n"; 
                        echo "<td>".$row["id_asignatura"]."</td> \n";
                        echo "<td>".$row["nombre_asignatura"]."</td> \n";
                        echo "<td>".$row["curso_asignatura"]."</td> \n"; 
                        echo "<td>".$row["titulacion"]."</td> \n"; 
                        echo "<td>".$row["numero_creditos"]."</td> \n";

                        //Formulario Oculto para poder pasarle DNI a la funcion para poder borrar
                        echo "<form action=/Facultad/Asignatura/PHP/borrar.php method = post>";
                        echo "<input type=hidden name=id_asignatura value = $row[id_asignatura]>";                         
                        echo "<td><center><button type=submit name= envia class=pure-button pure-button-primary>Borrar</button></td>";
                        echo "</form>";

                        //Formulario Oculto para poder pasarle datos a la funcion para poder modificar
                        echo "<form action=/Facultad/Asignatura/PHP/modificar.php method = post>";
                        echo "<input type=hidden name=id_asignatura value = $row[id_asignatura]>";
                        echo "<input type=hidden name=nombre_asignatura value = $row[nombre_asignatura]>";
                        echo "<input type=hidden name=curso_asignatura value = $row[curso_asignatura]>";                        
                        echo "<input type=hidden name=titulacion value = $row[titulacion]>";
                        echo "<input type=hidden name=numero_creditos value = $row[numero_creditos]>";                        
                        echo "<td><center><button type=submit name= envia class=pure-button pure-button-primary>Modificar</button></td>";
                        echo "</form>";;                                                       
                        echo "</tr> \n";
                  } while ($row = mysql_fetch_array($sql));
                        echo "</tbody>"; 
                        echo "</table> \n"; 
            } else { 
            echo " <center><h2>No se ha encontrado ningun registro</h2></center>"; 
            echo " <center><a class=pure-button pure-button-primary href=/Facultad/Asignatura/PHP/consulta.php>Volver</a></center>";
            } 
            ?>
                <style scoped>

        .button-success,
        .button-error,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

    </style>
      </div>
    </div>
  </body>
</html>