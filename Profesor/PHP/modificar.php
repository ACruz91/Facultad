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
              <li><a href="/Facultad/Profesor/consulta.html"><i class="fa fa-list-alt"></i> Consulta</a></li>
              <li><a href="/Facultad/menu.html"><i class="fa fa-align-justify"></i> Menú</a></li>              
              <li><a href="/Facultad/Persona/PHP/consulta.php"><i class="fa fa-user"></i> Persona</a></li>
              <li><a href="/Facultad/Alumno/PHP/consulta.php"><i class="fa fa-graduation-cap"></i> Alumno</a></li>
              <li><a href="/Facultad/Grupo/PHP/consulta.php"><i class="fa fa-group"></i> Grupo</a></li>
              <li><a href="/Facultad/Profesor/PHP/consulta.php"><i class="fa fa-university"></i> Profesor</a></li>
              <li><a href="/Facultad/Asignatura/PHP/consulta.php"><i class="fa fa-pencil-square-o"></i> Asignatura</a></li>
              <li><a href="/Facultad/Evaluacion/PHP/consulta.php"><i class="fa fa-bar-chart"></i> Evaluacion</a></li> 
              <li><a href="/Facultad/Item/PHP/consulta.php"><i class="fa fa-paperclip "></i> Item</a></li>   
              <li><a href="/Facultad/Evaluacion-Item/PHP/consulta.php"><i class="fa fa-table"></i> Evaluacion - Item</a></li>                                   
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
              <form class="pure-form pure-form-stacked" method = "POST" action="/Facultad/Profesor/PHP/modificar_final.php">                
                <fieldset>
                  <?php
                    $nombre = mysql_escape_string($_POST['nombre']);
                    $apellidos = mysql_escape_string($_POST['apellidos']);
                    $email = mysql_escape_string($_POST['email']);  
                    $dni = mysql_escape_string($_POST['dni']);
                    $id_profesor = mysql_escape_string($_POST['id_profesor']);                    
                    $departamento = mysql_escape_string($_POST['departamento']);                    
                    echo "<input type=text name=nombre value=$nombre>";
                    echo "<input type=text name=apellidos value=$apellidos>";                 
                    echo "<input type=email name=email value=$email>";                                                                              
                    echo "<input type=hidden name=dni value =$dni>";
                    echo "<input type=hidden name=id_profesor value =$id_profesor>";                    
                    echo "<input type=text name=departamento value =$departamento>";
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
