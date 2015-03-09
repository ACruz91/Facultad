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
              <h1>Modificar</h1>
              <form class="pure-form pure-form-stacked" method = "POST" action="/Facultad/Asignatura/PHP/modificar_final.php">                
                <fieldset>
                  <?php
                    $nombre_asignatura = mysql_escape_string($_POST['nombre_asignatura']);                  
                    $id_asignatura = mysql_escape_string($_POST['id_asignatura']);
                    $curso_asignatura = mysql_escape_string($_POST['curso_asignatura']);
                    $titulacion = mysql_escape_string($_POST['titulacion']);  
                    $numero_creditos = mysql_escape_string($_POST['numero_creditos']);
                    echo "<input type=text name=nombre_asignatura value=$nombre_asignatura placeholder =Nombre...>";                    
                    echo "<input type=hidden name=id_asignatura value=$id_asignatura>";
                    echo "<select name=curso_asignatura>";
                    echo "<option>Primero</option>";        
                    echo "<option>Segundo</option>";        
                    echo "<option>Tercero</option>";       
                    echo "<option>Cuarto</option>";                                    
                    echo"</select> ";                   
                    echo "<input type=text name=titulacion value=$titulacion placeholder =Titulación...>";                                                                              
                    echo "<input type=number name=numero_creditos value =$numero_creditos placeholder =Créditos...>";
                  ?>
                  <legend>Introduzca los nuevos datos para poder modificarlo</legend>

                  <button type="submit" name "enviar" class="pure-button pure-button-primary">Guardar</button>
                </fieldset>
              </form>
          </div>
      </div>
    </div>
  </body>
</html>
