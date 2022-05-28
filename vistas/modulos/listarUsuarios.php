<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row ml-auto">
    
            <div class="col"><h1>USUARIOS</h1></div>      
          
            <a href="vistas/modulos/reportes.php?reporte=usuarios">
                <button type="button" class="btn btn-success btn-sm btn-informe-usuarios"><i class="fas fa-download"></i> Descargar informe</button>
              </a>
            <br>    
            <br>    
        </div>                      
        <div class="row">
            
            <table id="tablaUsuarios" class="table table-striped table-light">
                <thead>
                    <tr>
                    <th >Nombre</th>
                    <th >Apellido</th>
                    <th >Correo</th>
                    <th >Celular</th>
                    <th >Dirección</th>
                    <th >Rol</th>
                    <th> Estado</th>
                    <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="modal-actualizar-usuario">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo vehiculo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-usuarios-actualizar">
      <div class="modal-body cuerpo-modal">
          <div class="row">
          
           
                <input type="text" class="form-control" name="idUsuari-actualizar" id="idUsuari-actualizar"placeholder="Digite el nombre" autofocus hidden>
            
            
           
          <h5>Nombre: </h5>
            <div class="form-group">
                <input type="text" class="form-control" name="nombreUsuario-actualizar" id="nombreUsuario-actualizar"placeholder="Digite el nombre" autofocus>
            </div>
            
            <br>
           <br>
           <h5>Apellido: </h5>
            <div class="form-group">
                <input type="text" class="form-control" name="apellidoUsuario-actualizar" id="apellidoUsuario-actualizar" placeholder="Digite el apellido">
            </div>
            
            <br>
           <br>
           <h5>Correo: </h5>
            <div class="form-group">
                <input type="email" class="form-control" name="correoUsuario-actualizar" id="correoUsuario-actualizar" placeholder="Digite el correo" >
            </div>
           <br>
           <br>
           <h5>Telefono: </h5>
            <div class="form-group">
                <input type="number" class="form-control" name="telefonoUsuario-actualizar" id="telefonoUsuario-actualizar" placeholder="Digite el celular">
            </div>
            
           <br>
           <br>
           <h5>Direccion</h5>
            <div class="form-group">
                <input type="text" class="form-control" name="direccionUsuario-actualizar" id="direccionUsuario-actualizar" placeholder="Digite la direccicón">
            </div>
            
           <br>
           <br>
           <h5>Contraseña</h5>
            <div class="form-group">
                <input type="password" class="form-control" name="passwordUsuario-actualizar" id="passwordUsuario-actualizar" placeholder="Digite la nueva contraseña">
            </div>
            
           <br>
           <br>
            <h5>Seleccione rol</h5>
                <div class="form-group">
                    <select class="form-select" name="rolUsuario-actualizar" id="rolUsuario-actualizar" required>
                        <option value="Auxiliar">Auxiliar</option>
                        <option value="Coordinador">Coordinador</option>
                    </select>
                </div>
           <br>
           <br>

            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-actualizar-datos-usuario">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>  <!-- /.modal-dialog -->