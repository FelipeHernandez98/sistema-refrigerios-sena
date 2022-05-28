let tablaCursos = $('#tablaCursos').DataTable({
    "order": [[ 0, "desc" ]],
    "ajax": "ajax/curso.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": lenguajeTabla
});

$.ajax({
    url: "ajax/refrigerio.ajax.php?acc=combo",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
        $("#listaRefrigerios").html("");
        $("#listaRefrigerios").append('<option value="0">Seleccione refrigerio: </option>');
        for (var i = 0; i < respuesta.length; i++) {
            $("#listaRefrigerios").append('<option value=' + respuesta[i].idRefrigerio + '>' + respuesta[i].tipoRefrigerio  + '</option>');
	
        }
    }
})

$('#listaRefrigerios').select2({
    theme: 'bootstrap4',
    placeholder: "Buscar refrigerio",
    allowClear: true
});

$('#listaRefrigerios').val(0).trigger('change.select2');

$("#formularioCurso").on('submit', function(event) {
	event.preventDefault();
	/* Act on the event */

	$(".boton-guardar-curso").prop('disabled', true);
	$(".boton-guardar-curso").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const idCurso = $("#idCurso").val();
	const sedeCurso = $("#sedeCurso").val();
	const cantidadAlumnosCurso = $("#cantidadAlumnosCurso").val();
	const directorCurso = $("#directorCurso").val();
    const estadoCurso = 1;
	const idRefrigeriofk = $("#listaRefrigerios").val();
	
	console.log(idCurso)

	let datos = new FormData();
	datos.append("idCurso", idCurso);
	datos.append("sedeCurso", sedeCurso);
	datos.append("cantidadAlumnosCurso", cantidadAlumnosCurso);
	datos.append("directorCurso", directorCurso);
    datos.append("estadoCurso", estadoCurso);
    datos.append("idRefrigeriofk", idRefrigeriofk);
	datos.append("acc", "add");


	$.ajax({
		url: "ajax/curso.ajax.php",
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
						$(".boton-guardar-curso").prop('disabled', false);
						$(".boton-guardar-curso").html('<i class="fas fa-save"></i> Guardar');
                        $("#idCurso").val(null);
                        $("#sedeCurso").val(null);
                        $("#cantidadAlumnosCurso").val(null);
                        $("#directorCurso").val(null);


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
				$(".boton-guardar-curso").prop('disabled', false);
				$(".boton-guardar-curso").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".boton-guardar-curso").prop('disabled', false);
				$(".boton-guardar-curso").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".boton-guardar-curso").prop('disabled', false);
			$(".boton-guardar-curso").html('<i class="fas fa-save"></i> Guardar');
		});
});

$("#tablaCursos").on('click', '.btn-desactivar', function(event) {
	event.preventDefault();

	const idCurso = $(this).attr('idCurso');
	const estadoCurso = 0;

    console.log(idCurso);

	let datos = new FormData();
	datos.append("idCurso", idCurso);
	datos.append("estadoCurso", estadoCurso);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/curso.ajax.php",
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
			tablaCursos.ajax.reload();
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

$("#tablaCursos").on('click', '.btn-activar', function(event) {
	event.preventDefault();

	const idCurso = $(this).attr('idCurso');
	const estadoCurso = 1;

	let datos = new FormData();
	datos.append("idCurso", idCurso);
	datos.append("estadoCurso", estadoCurso);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/curso.ajax.php",
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
			tablaCursos.ajax.reload();
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

$('#tablaCursos').on('click', '.btn-traer-datos-curso', function(event) {
	event.preventDefault();
	
	const idCurso = $(this).attr('idCurso');
	const sedeCurso = $(this).attr('sedeCurso');
	const cantidadAlumnosCurso = $(this).attr('cantidadAlumnosCurso');
	const directorCurso = $(this).attr('directorCurso');
	const estadoCurso = $(this).attr('estadoCurso');
	const idRefrigeriofk = $(this).attr('idRefrigeriofk');
	
	$("#idCurso-actualizar").val(idCurso)
	$("#sedeCurso-actualizar").val(sedeCurso)
	$("#cantidadAlumnosCurso-actualizar").val(cantidadAlumnosCurso)
	$("#directorCurso-actualizar").val(directorCurso)
	$("#estadoCurso-actualizar").val(estadoCurso)	
	$("#idRefrigeriofk-actualizar").val(idRefrigeriofk)	


	$("#modal-actualizar-curso .modal-title").text('Actualizar curso: ' + idCurso).addClass('text-light')
	$("#modal-actualizar-curso .modal-header").removeClass('bg-primary').addClass('bg-success');
	$("#modal-actualizar-curso").modal("show");

	$('#listaRefrigerios').select2({
		dropdownParent: $('#modal-actualizar-curso')
	});

	
});

$("#form-curso-actualizar").on('submit', function(event) {
	event.preventDefault();

	$(".btn-actualizar-datos-curso").prop('disabled', true);
	$(".btn-actualizar-datos-curso").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const idCurso = $("#idCurso-actualizar").val();
	const sedeCurso = $("#sedeCurso-actualizar").val();
	const cantidadAlumnosCurso = $("#cantidadAlumnosCurso-actualizar").val();
	const directorCurso = $("#directorCurso-actualizar").val();
	const idRefrigeriofk = $("#listaRefrigerios").val();

	console.log(idCurso)
	console.log(sedeCurso)


	let datos = new FormData();
	datos.append("idCurso", idCurso);
	datos.append("sedeCurso", sedeCurso);
	datos.append("cantidadAlumnosCurso", cantidadAlumnosCurso);
	datos.append("directorCurso", directorCurso);
	datos.append("idRefrigeriofk", idRefrigeriofk);
	datos.append("acc", "updt");

	$.ajax({
		url: "ajax/curso.ajax.php",
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
						tablaCursos.ajax.reload();
						$(".btn-actualizar-datos-curso").prop('disabled', false);
						$(".btn-actualizar-datos-curso").html(' Guardar');
						$("#modal-actualizar-curso").modal("hide");
						
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
				$(".btn-actualizar-datos-curso").prop('disabled', false);
				$(".btn-actualizar-datos-curso").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".btn-actualizar-datos-curso").prop('disabled', false);
				$(".btn-actualizar-datos-curso").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".btn-actualizar-datos-curso").prop('disabled', false);
			$(".btn-actualizar-datos-curso").html('<i class="fas fa-save"></i> Guardar');
		});
});