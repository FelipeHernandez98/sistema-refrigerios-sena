<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row ml-auto">
    
            <div class="col"><h1>CURSOS</h1></div>          
            <a href="vistas/modulos/reportes.php?reporte=cursos">
                <button type="button" class="btn btn-success btn-sm btn-informe-cursos"><i class="fas fa-download"></i> Descargar informe</button>
              </a>
            <br>    
            <br>    
        </div>                                
        <div class="row">
            
            <table id="tablaCursos" class="table table-striped table-light">
                <thead class="">
                    <tr>
                    
                    <th scope="col">Curso</th>
                    <th scope="col">Sede</th>
                    <th scope="col">N° Alumnos</th>
                    <th scope="col">Director</th>
                    <th scope="col">Refrigerio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>  
</main>

<div class="modal fade" id="modal-actualizar-curso">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar curso</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-curso-actualizar">
      <div class="modal-body cuerpo-modal">
          <div class="row">
          <input type="number" class="form-control" name="idCurso-actualizar" id="idCurso-actualizar" placeholder="Sede curso" hidden>
            <h5> Sede </h5>
            <div class="form-group">
                <input type="text" class="form-control" name="sedeCurso-actualizar" id="sedeCurso-actualizar" placeholder="Sede curso">
            </div>
            <h5> Cantidad alumnos </h5>
            <div class="form-group">
                <input type="number" class="form-control" name="cantidadAlumnosCurso-actualizar" id="cantidadAlumnosCurso-actualizar" placeholder="Cantidad alumnos" >
            </div>
            <h5> Director </h5>
            <div class="form-group">
                <input type="text" class="form-control" name="directorCurso-actualizar" id="directorCurso-actualizar" placeholder="Director curso">
            </div>
            <h5>Seleccione refrigerio</h5>
            <div class="form-group">
                <div class="form-group mb-2">
                    <select id="listaRefrigerios" class="form-control select2" required style="width: 100%">
                </select>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-actualizar-datos-curso">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>  <!-- /.modal-dialog -->