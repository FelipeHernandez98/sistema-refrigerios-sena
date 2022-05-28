<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <h2>Agregar Curso</h2>
                        <br>
                        <form method="POST" id="formularioCurso" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" class="form-control" name="idCurso" id="idCurso" placeholder="Id Curso" autofocus>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="sedeCurso" id="sedeCurso" placeholder="Sede curso">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="number" class="form-control" name="cantidadAlumnosCurso" id="cantidadAlumnosCurso" placeholder="Cantidad alumnos" >
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="directorCurso" id="directorCurso" placeholder="Director curso">
                            </div>
                            <br>
                            <h5>Seleccione refrigerio</h5>
                            <div class="form-group">
                                <div class="form-group mb-2">
                                    <select id="listaRefrigerios" class="form-control select2" required style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-block btn-dark boton-guardar-curso">
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