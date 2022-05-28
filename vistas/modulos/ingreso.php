<div class="bg-light">
  <h1 class="noPadding text-center">COLEGIO FRANCISCO JAVIER MATIZ</h1>
</div>

  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href=""><img style="width: 120px; height:70px;" src="vistas/dist/img/logo.jpeg"></a>
        <ul class="navbar-nav mr-auto">
          <div class="collapse navbar-collapse" id="navbarNav">

            <li class="nav-item">
              <a class="nav-link" href="index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Mision y vision</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingreso">Coordinador</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingresoAuxiliar">Auxiliar</a>
            </li>


        </ul>

      </div>
    </nav>
<main  style="background-color: #AAA9AA ;">

    <div class="container p-4" >
        <div class="row" >
      
          <div class="col-md-4 mx-auto">
            <div class="card text-center">
              <div class="card-header">
                <h3>Bienvenido Coordinador</h3>
              </div>
              <img src="vistas/dist/img/logo.jpeg" class="card-img-top mx-auto m-2 rounded-circle w-50">
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <input type="text" name="ingresoCorreo" id="ingresoCorreo" placeholder="Correo" class="form-control" autofocus required>
                  </div>
                  <br>
                  <div class="form-group">
                    <input type="password" name="ingresoPassword" id="ingresoPassword" placeholder="Contraseña" class="form-control" required>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary btn-block">
                   Ingresar
                  </button>
                </form>
      
              </div>
            </div>
          </div>

    <?php
$ingreso = new ingresoControlador();
$ingreso->ctrIngresarUsuario();
         
?>

        </div>
    </div>
    <div class="row bg-light">
    <div class="col-md-12 ">
    <p class="lead p-4 ">El colegio le entrega a cada estudiante un refrigerio diario en cada jornada de formacion a
        traves de la planilla fisica donde se registra manualmente el tipo de refrigerio, curso, estudiante y jornada asi
        como el estudiante que entrega la canasta del refrigerio en cada curso para el ejercicio diario en el colegio es
        necesario que los refrigerios lleguen en horas de la mañana y sean entregados por parte del distribuidora los
        auxiliar estudiantes de contra jornada</p>
    </div>

</main>
<br>
  <br>
  <br>
<footer class="container">
    <div class="row">
      <h1>Contacto</h1>
      <br>
      <p><i class="fa fa-building"></i> Colegio Francisco Javier Matiz IED, Cra2A 29A-29 sur, Bogotá. </p>
     
      <p><i class="fa fa-envelope"></i> cedfranciscojavie4@educacionbogota.edu.co </p>

      <p><i class="fa fa-phone"></i> 2082082- 2082080 </p>

      <p><i class="fa fa-location-dot"></i> Cra2A 29A-29 sur, Bogotá Colombia. </p>
    </div>
    <p class="float-end"><a href="#">Subir al inicio</a></p>
    <p>&copy;
      <script type="text/javascript">
        copyright = new Date();
        update = copyright.getFullYear();
        document.write(update);
      </script> Francisco Javier Martuz. &middot; <a href="#">Terminos</a> &middot; <a href="#">Condiciones</a>
    </p>
  </footer>
