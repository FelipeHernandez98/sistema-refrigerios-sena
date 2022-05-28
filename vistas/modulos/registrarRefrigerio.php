<main style="background-color: #AAA9AA ;">

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <h2>Agregar Refrigerio</h2>
                        <br>
                        <form method="POST" id="form-refrigerios" enctype="multipart/form-data">
                            <h5>Fecha de registro</h5>
                            <div class="form-group">
                                <input type="date" class="form-control" name="fechaRefrigerio" id="fechaRefrigerio" placeholder="">
                            </div>
                            <h5>Hora de registro</h5>
                            <div class="form-group">
                                <input type="time" class="form-control" name="horaRefrigerio" id="horaRefrigerio" placeholder="">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tipoRefrigerio" id="tipoRefrigerio" placeholder="Tipo de refrigerio">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="number" class="form-control" name="cantidadRefrigerio"  id="cantidadRefrigerio" placeholder="Cantidad refrigerio">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="descripcionRefrigerio" id="descripcionRefrigerio" placeholder="Descripcion del refrigerio" >
                            </div>
                            <br>
                            <h5>Coordinador a cargo</h5>
                            <div class="form-group">
                                <div class="form-group mb-2">
                                    <select id="listaCoordinadores" class="form-control select2" required style="width: 100%">
                                    </select>
                                    </div>
                            </div>
                            <h5>Auxiliar que registra</h5>
                            <div class="form-group">
                                <div class="form-group mb-2">
                                    <select id="listaAuxiliares" class="form-control select2" required style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-block btn-dark boton-guardar-refrigerio">
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