let tablaRefrigerios = $('#tablaRefrigerios').DataTable({
    "order": [[ 0, "desc" ]],
    "ajax": "ajax/refrigerio.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": lenguajeTabla
});


$.ajax({
    url: "ajax/usuario.ajax.php?acc=combo",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
        $("#listaCoordinadores").html("");
        $("#listaCoordinadores").append('<option value="0">Seleccione coordinador: </option>');
        for (var i = 0; i < respuesta.length; i++) {
			if(respuesta[i].rolUsuario === "Coordinador"){
            	var indice =respuesta[i].idUsuari;
            	$("#listaCoordinadores").append('<option value=' + indice + '>' + respuesta[i].nombreUsuario  + ' '+ respuesta[i].apellidoUsuario +  '</option>');
			}
        }
    }
})

$('#listaCoordinadores').select2({
    theme: 'bootstrap4',
    placeholder: "Buscar coordinador",
    allowClear: true
});

$('#listaAuxiliares').val(0).trigger('change.select2');

$.ajax({
    url: "ajax/usuario.ajax.php?acc=combo",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
        $("#listaAuxiliares").html("");
        $("#listaAuxiliares").append('<option value="0">Seleccione auxiliar: </option>');
        for (var i = 0; i < respuesta.length; i++) {
			if(respuesta[i].rolUsuario === "Auxiliar"){
            	$("#listaAuxiliares").append('<option value=' + respuesta[i].idUsuari + '>' + respuesta[i].nombreUsuario  + ' '+ respuesta[i].apellidoUsuario +  '</option>');
			}
        }
    }
})

$('#listaAuxiliares').select2({
    theme: 'bootstrap4',
    placeholder: "Buscar auxiliar",
    allowClear: true
});

$('#listaAuxiliares').val(0).trigger('change.select2');

$("#form-refrigerios").on('submit', function(event) {
	event.preventDefault();
	/* Act on the event */

	$(".boton-guardar-refrigerio").prop('disabled', true);
	$(".boton-guardar-refrigerio").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const fechaRefrigerio = $("#fechaRefrigerio").val();
	const horaRefrigerio = $("#horaRefrigerio").val();
	const tipoRefrigerio = $("#tipoRefrigerio").val();
	const cantidadRefrigerio = $("#cantidadRefrigerio").val();
	const descripcionRefrigerio = $("#descripcionRefrigerio").val();
    const estadoRefrigerio = true;
	const idCoordinadorfk = $("#listaCoordinadores").val();
    const idAuxiliar = $("#listaAuxiliares").val();
	

	let datos = new FormData();
	datos.append("fechaRefrigerio", fechaRefrigerio);
	datos.append("horaRefrigerio", horaRefrigerio);
	datos.append("tipoRefrigerio", tipoRefrigerio);
	datos.append("cantidadRefrigerio", cantidadRefrigerio);
	datos.append("descripcionRefrigerio", descripcionRefrigerio);
    datos.append("estadoRefrigerio", estadoRefrigerio);
    datos.append("idCoordinadorfk", idCoordinadorfk);
    datos.append("idAuxiliar", idAuxiliar);
	datos.append("acc", "add");


	$.ajax({
		url: "ajax/refrigerio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json"
	})
		.done(function(response) {
			if (response.mensaje === "ok") {
				Swal.fire({
					title: '! Exitos !',
					text: " Registro Guardado Correctamente ",
					icon: 'success',
					confirmButtonColor: '#3085d6',
				}).then((result) => {
					if (result.value) {
						$(".boton-guardar-refrigerio").prop('disabled', false);
						$(".boton-guardar-refrigerio").html(' Guardar ');
					}
				})
			} else if (response.codigo == 'Su session ha caducado') {
				Swal.fire({
					title: '! Error !',
					text: 'Error: ' + response.codigo,
					icon: 'warning',
					confirmButtonColor: '#3085d6',
				}).then((result) => {
					if (result.value) {
						window.location = "salir";
					}
				})
			}else if(response.codigo){
                 Swal.fire(
                     'Advertencia',
                     'Error: '+response.codigo,
                     'warning'
                     )
				$(".boton-guardar-refrigerio").prop('disabled', false);
				$(".boton-guardar-refrigerio").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".boton-guardar-refrigerio").prop('disabled', false);
				$(".boton-guardar-refrigerio").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".boton-guardar-refrigerio").prop('disabled', false);
			$(".boton-guardar-refrigerio").html('<i class="fas fa-save"></i> Guardar');
		});
});


$("#tablaRefrigerios").on('click', '.btn-desactivar', function(event) {
	event.preventDefault();

	const idRefrigerio = $(this).attr('idRefrigerio');
	const estadoRefrigerio = 0;

    console.log(idRefrigerio);

	let datos = new FormData();
	datos.append("idRefrigerio", idRefrigerio);
	datos.append("estadoRefrigerio", estadoRefrigerio);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/refrigerio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	}).done(function(response) {
		if (response.mensaje === 'ok') {
			Swal.fire({
				icon: 'success',
				title: ' Desactivado correctamente'
			})
			tablaRefrigerios.ajax.reload();
		} else if(response.codigo == 'Su session ha caducado') {
			Swal.fire({
				title: '! Advertencia !',
				text: 'Error: ' + response.codigo,
				icon: 'warning',
				confirmButtonColor: '#3085d6',
			}).then((result) => {
				if (result.value) {
					window.location = "salir";
				}
			})
		}else {
			Swal.fire('Advertencia', 'Error: ' + response.codigo, 'warning')
		}
	}).fail(function(response) {
		console.log("error ", response.responseText);
	});
});

$("#tablaRefrigerios").on('click', '.btn-activar', function(event) {
	event.preventDefault();

	const idRefrigerio = $(this).attr('idRefrigerio');
	const estadoRefrigerio = 1;

	let datos = new FormData();
	datos.append("idRefrigerio", idRefrigerio);
	datos.append("estadoRefrigerio", estadoRefrigerio);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/refrigerio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	}).done(function(response) {
		if (response.mensaje === 'ok') {
			Swal.fire({
				icon: 'success',
				title: ' Activado correctamente'
			})
			tablaRefrigerios.ajax.reload();
		} else if(response.codigo == 'Su session ha caducado') {
			Swal.fire({
				title: '! Advertencia !',
				text: 'Error: ' + response.codigo,
				icon: 'warning',
				confirmButtonColor: '#3085d6',
			}).then((result) => {
				if (result.value) {
					window.location = "salir";
				}
			})
		}else {
			Swal.fire('Advertencia', 'Error: ' + response.codigo, 'warning')
		}
	}).fail(function(response) {
		console.log("error ", response.responseText);
	});
});

$('#tablaRefrigerios').on('click', '.btn-traer-datos-refrigerio', function(event) {
	event.preventDefault();
	
	const idRefrigerio = $(this).attr('idRefrigerio');
	const fechaRefrigerio = $(this).attr('fechaRefrigerio');
	const horaRefrigerio = $(this).attr('horaRefrigerio');
	const tipoRefrigerio = $(this).attr('tipoRefrigerio');
	const cantidadRefrigerio = $(this).attr('cantidadRefrigerio');
	const descripcionRefrigerio = $(this).attr('descripcionRefrigerio');
	

	$("#idRefrigerio-actualizar").val(idRefrigerio)
	$("#fechaRefrigerio-actualizar").val(fechaRefrigerio)
	$("#horaRefrigerio-actualizar").val(horaRefrigerio)
	$("#tipoRefrigerio-actualizar").val(tipoRefrigerio)
	$("#cantidadRefrigerio-actualizar").val(cantidadRefrigerio)	
	$("#descripcionRefrigerio-actualizar").val(descripcionRefrigerio)


	$("#modal-actualizar-refrigerio .modal-title").text('Actualizar refrigerio: ' + idRefrigerio).addClass('text-light')
	$("#modal-actualizar-refrigerio .modal-header").removeClass('bg-primary').addClass('bg-success');
	$("#modal-actualizar-refrigerio").modal("show");
});

$("#form-refrigerios-actualizar").on('submit', function(event) {
	event.preventDefault();

	$(".btn-actualizar-datos-refrigerio").prop('disabled', true);
	$(".btn-actualizar-datos-refrigerio").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const idRefrigerio = $("#idRefrigerio-actualizar").val();
	const fechaRefrigerio = $("#fechaRefrigerio-actualizar").val();
	const horaRefrigerio = $("#horaRefrigerio-actualizar").val();
	const tipoRefrigerio = $("#tipoRefrigerio-actualizar").val();
	const cantidadRefrigerio = $("#cantidadRefrigerio-actualizar").val();
	const descripcionRefrigerio = $("#descripcionRefrigerio-actualizar").val();
	
	console.log(horaRefrigerio)
	
	let datos = new FormData();
	datos.append("idRefrigerio", idRefrigerio);
	datos.append("fechaRefrigerio", fechaRefrigerio);
	datos.append("horaRefrigerio", horaRefrigerio);
	datos.append("tipoRefrigerio", tipoRefrigerio);
	datos.append("cantidadRefrigerio", cantidadRefrigerio);
	datos.append("descripcionRefrigerio", descripcionRefrigerio);
	datos.append("acc", "updt");

	$.ajax({
		url: "ajax/refrigerio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json"
	})
		.done(function(response) {
			if (response.mensaje === "ok") {
				Swal.fire({
					title: '! Exitos !',
					text: " Registro Actualizado Correctamente ",
					icon: 'success',
					confirmButtonColor: '#3085d6',
				}).then((result) => {
					if (result.value) {
						tablaRefrigerios.ajax.reload();
						$(".btn-actualizar-datos-refrigerio").prop('disabled', false);
						$(".btn-actualizar-datos-refrigerio").html(' Guardar');
						$("#modal-actualizar-refrigerio").modal("hide");
						
					}
				})
			} else if (response.codigo == 'Su session ha caducado') {
				Swal.fire({
					title: '! Error !',
					text: 'Error: ' + response.codigo,
					icon: 'warning',
					confirmButtonColor: '#3085d6',
				}).then((result) => {
					if (result.value) {
						window.location = "salir";
					}
				})
			}else if(response.codigo){
                 Swal.fire(
                     'Advertencia',
                     'Error: '+response.codigo,
                     'warning'
                     )
				$(".btn-actualizar-datos-refrigerio").prop('disabled', false);
				$(".btn-actualizar-datos-refrigerio").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".btn-actualizar-datos-refrigerio").prop('disabled', false);
				$(".btn-actualizar-datos-refrigerio").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".btn-actualizar-datos-refrigerio").prop('disabled', false);
			$(".btn-actualizar-datos-refrigerio").html('<i class="fas fa-save"></i> Guardar');
		});
});