<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//session_status(); //== PHP_SESSION_NONE
if (!isset($_SESSION)) {
    session_start();

}
$retVal = (isset($_GET["modulo"])) ? strtoupper($_GET["modulo"]) : "INICIO";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>SISTEMA CONTROL DE REFRIGERIOS</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="vistas/dist/css/carousel.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-select/css/select.bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="vistas/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- TIMERPICKER -->
  <link rel="stylesheet" href="vistas/plugins/timepicker/css/timepicker.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="vistas/plugins/dropzone/min/dropzone.min.css">
  <!-- Scroll Up -->
  <link rel="stylesheet" href="vistas/plugins/scrollUp/css/scrollUp.css">
</head>

<body class="bg-dark">
<?php

if (isset($_SESSION["validarSession"]) && $_SESSION["validarSession"] === true) {

    if (isset($_SESSION['ULTIMA_ACTIVIDAD']) &&
        (time() - $_SESSION['ULTIMA_ACTIVIDAD'] > MAX_SESSION_TIEMPO)) {
        include 'modulos/salir.php';
    }

    $_SESSION['ULTIMA_ACTIVIDAD'] = time();
    echo '<input type="hidden" id="user" correoUsuario="' . $_SESSION["usuario_correo"] . '" value="' . $_SESSION["usuario_id"] . '" >';
    echo '<div class="wrapper">';
    include 'modulos/encabezado.php';
    echo '<div class="content-wrapper">';
    if (isset($_GET["modulo"])) {
        if ($_GET["modulo"] == "inicio" || $_GET["modulo"] == "registrarUsuario" || $_GET["modulo"] == "registrarRefrigerio" || $_GET["modulo"] == "salir" || $_GET["modulo"] == "registrarCurso" || $_GET["modulo"] == "listarUsuarios" || $_GET["modulo"] == "listarRefrigerios" || $_GET["modulo"] == "listarCursos") {

            include 'modulos/' . $_GET["modulo"] . '.php';

        } else {
            include 'modulos/404.html';
        }
    } elseif (!isset($_GET["modulo"])) {
        include "modulos/inicio.php";
    } else {
        include 'modulos/salir.php';
    }
    echo '</div>';
    include 'modulos/footer.php';
    echo '</div>';
} else {
  if(isset($_GET["modulo"])){
    if ($_GET["modulo"] == "ingresoAuxiliar" || $_GET["modulo"] == "ingreso" || $_GET["modulo"] == "index") {
      include 'modulos/' . $_GET["modulo"] . '.php';
    }
  } else {
    include 'modulos/index.php';
  }
}

?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="vistas/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- InputMask -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/moment/locales.min.js"></script>
<script src="vistas/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-select/js/dataTables.select.min.js"></script>
<!-- SweetAlert2 -->
<script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="vistas/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="vistas/plugins/select2/js/select2.full.min.js"></script>
<!-- TIMERPICKER -->
<script src="vistas/plugins/timepicker/js/timepicker.min.js"></script>
<!-- CANVAS-->

<script src="vistas/plugins/canvas/js/html2canvas.js"></script>
<!-- Scroll Up -->
<script src="vistas/plugins/scrollUP/js/scrollUP.js"></script>
<!-- Bootstrap Switch -->
<script src="vistas/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- dropzonejs -->
<script src="vistas/plugins/dropzone/min/dropzone.min.js"></script>
 

<!---------------------------------------------------
      JS PERSONALIZADOS
  --------------------------------------------------->

<script src="vistas/js/plantilla.js?v=<?php echo filemtime("vistas/js/plantilla.js"); ?>"></script>
<script src="vistas/js/usuarios.js?v=<?php echo filemtime("vistas/js/usuarios.js"); ?>"></script>
<script src="vistas/js/refrigerios.js?v=<?php echo filemtime("vistas/js/refrigerios.js"); ?>"></script>
<script src="vistas/js/cursos.js?v=<?php echo filemtime("vistas/js/cursos.js"); ?>"></script>

<script>
  $(function () {
    $.scrollUp({
      scrollText: ''
  });
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

});
</script>


   <br>
  <br>
  <br>

  

  

</body>

</html>