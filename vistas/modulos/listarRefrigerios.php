<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row ml-auto">
    
            <div class="col"><h1>REFRIGERIOS</h1></div>  
            <a href="vistas/modulos/reportes.php?reporte=refrigerios">
                <button type="button" class="btn btn-success btn-sm btn-informe-refrigerios"><i class="fas fa-download"></i> Descargar informe</button>
              </a>
            <br>    
            <br>    
        </div>                                        
        <div class="row">
            
            <table id="tablaRefrigerios" class="table table-striped table-light">
                <thead class="">
                    <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Coordinador</th>
                    <th scope="col">Auxiliar</th>
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

<div class="modal fade" id="modal-actualizar-refrigerio">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo vehiculo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-refrigerios-actualizar">
      <div class="modal-body cuerpo-modal">
          <div class="row">
          <input type="text" class="form-control" name="idRefrigerio-actualizar" id="idRefrigerio-actualizar" placeholder="Tipo de refrigerio" hidden>
          <h5>Fecha de registro</h5>
            <div class="form-group">
                <input type="date" class="form-control" name="fechaRefrigerio-actualizar" id="fechaRefrigerio-actualizar" placeholder="">
            </div>
            <h5>Hora de registro</h5>
            <div class="form-group">
                <input type="time" class="form-control" name="horaRefrigerio-actualizar" id="horaRefrigerio-actualizar" placeholder="">
            </div>
            <h5>Tipo</h5>
            <div class="form-group">
                <input type="text" class="form-control" name="tipoRefrigerio-actualizar" id="tipoRefrigerio-actualizar" placeholder="Tipo de refrigerio">
            </div>
            <h5>Cantidad</h5>
            <div class="form-group">
                <input type="number" class="form-control" name="cantidadRefrigerio-actualizar"  id="cantidadRefrigerio-actualizar" placeholder="Cantidad refrigerio">
            </div>
            <h5>Descripcion</h5>
            <div class="form-group">
                <input type="text" class="form-control" name="descripcionRefrigerio-actualizar" id="descripcionRefrigerio-actualizar" placeholder="Descripcion del refrigerio" >
            </div>           
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-actualizar-datos-refrigerio">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>  <!-- /.modal-dialog -->