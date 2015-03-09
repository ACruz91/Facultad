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
              <li><a href="/Facultad/Persona/insertar.html"><i class="fa fa-files-o"></i> Insertar</a></li>
              <li><a href="/Facultad/Persona/"><i class="fa fa-list-alt"></i> Consulta</a></li>
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
              <h1>Listado de Personas</h1>
            <?php
            //Conexion
            $link = mysql_connect("localhost", "root", "root") or die("La Conexión Mysql ha fallado.");
            mysql_select_db("facultad", $link) or die("No existe la Base de Datos.");

            //Busqueda
            $sql= mysql_query("SELECT * FROM persona ORDER BY nombre", $link); 
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
                        echo "<td>".$row["dni"]."</td> \n";
                        echo "<td>".$row["nombre"]."</td> \n"; 
                        echo "<td>".$row["apellidos"]."</td> \n";

                        echo "<td><href=/Facultad/Persona/Foto>Enlace</td> \n";
                        echo "<td>".$row["email"]."</td> \n"; 
                        echo "<td>".$row["tipo_persona"]."</td> \n";

                        //Formulario Oculto para poder pasarle DNI a la funcion para poder borrar
                        echo "<form action=/Facultad/Persona/PHP/borrar.php method = post>";
                        echo "<input type=hidden name=dni value = $row[dni]>";                         
                        echo "<td><center><button type=submit name= envia class=pure-button pure-button-primary>Borrar</button></td>";
                        echo "</form>";

                        //Formulario Oculto para poder pasarle datos a la funcion para poder modificar
                        echo "<form action=/Facultad/Persona/PHP/modificar.php method = post>";
                        echo "<input type=hidden name=nombre value = $row[nombre]>";
                        echo "<input type=hidden name=apellidos value = $row[apellidos]>";
                        echo "<input type=hidden name=email value = $row[email]>";                        
                        echo "<input type=hidden name=dni value = $row[dni]>";
                        echo "<td><center><button type=submit name= envia class=pure-button pure-button-primary>Modificar</button></td>";
                        echo "</form>";;                                                       
                        echo "</tr> \n";
                  } while ($row = mysql_fetch_array($sql));
                        echo "</tbody>"; 
                        echo "</table> \n"; 
            } else { 
            echo " <h1>No se ha encontrado ningun registro</h1>"; 
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
