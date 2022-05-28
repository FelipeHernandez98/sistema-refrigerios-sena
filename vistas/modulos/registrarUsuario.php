<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <h2>Agregar Usuario</h2>
                        <br>
                        <form method="POST" enctype="multipart/form-data" id="form-usuarios">
                            <div class="form-group">
                                <input type="number" class="form-control" name="idUsuari" id="idUsuari" placeholder="Id usuario" autofocus>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario"placeholder="Digite el nombre" autofocus>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="apellidoUsuario" id="apellidoUsuario" placeholder="Digite el apellido">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="email" class="form-control" name="correoUsuario" id="correoUsuario" placeholder="Digite el correo" >
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="number" class="form-control" name="telefonoUsuario" id="telefonoUsuario" placeholder="Digite el celular">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="direccionUsuario" id="direccionUsuario" placeholder="Digite la direccicón">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="oficinaCoordinador" id="oficinaCoordinador" placeholder="Digite la oficina si es coordinador">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cursoAuxiliar" id="cursoAuxiliar" placeholder="Digite el curso si es aux">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="jornadaAuxiliar" id="jornadaAuxiliar" placeholder="Digite la jornada si es aux">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario" placeholder="Digite la contraseña">
                            </div>
                            <br>
                            <h5>Seleccione rol</h5>
                            <div class="form-group">
                                <select class="form-select" name="rolUsuario" id="rolUsuario" required>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Coordinador">Coordinador</option>
                                </select>
                            </div>
                            <h5>Seleccione estado</h5>
                            <div class="form-group">
                                <select class="form-select" name="estadoUsuario" id="estadoUsuario" required>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-block btn-dark boton-guardar-usuario">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>