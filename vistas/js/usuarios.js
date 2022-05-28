/*$ .ajax({

    url: "ajax/usuario.ajax.php",
    success: function(respuesta) {

        if(respuesta == 0)
        {
            console.log('No respuesta');
        }else
        {
            console.log("respuesta", respuesta);
        }
    }

}) */


let tablaUsuarios = $('#tablaUsuarios').DataTable({
    "order": [[ 0, "desc" ]],
    "ajax": "ajax/usuario.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": lenguajeTabla
});

$("#form-usuarios").on('submit', function(event) {
	event.preventDefault();

	$(".boton-guardar-usuario").prop('disabled', true);
	$(".boton-guardar-usuario").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const idUsuari = $("#idUsuari").val();
	const nombreUsuario = $("#nombreUsuario").val();
	const apellidoUsuario = $("#apellidoUsuario").val();
	const correoUsuario = $("#correoUsuario").val();
	const telefonoUsuario = $("#telefonoUsuario").val();
	const direccionUsuario = $("#direccionUsuario").val();
    const passwordUsuario = $("#passwordUsuario").val();
	const rolUsuario = $("#rolUsuario").val();
    const estadoUsuario = $("#estadoUsuario").val();

	console.log(idUsuari)
	console.log(nombreUsuario)
	console.log(apellidoUsuario)
	console.log(correoUsuario)
	console.log(telefonoUsuario)
	console.log(direccionUsuario)
	console.log(passwordUsuario)
	console.log(rolUsuario)
	console.log(estadoUsuario)
	

	let datos = new FormData();
	datos.append("idUsuari", idUsuari);
	datos.append("nombreUsuario", nombreUsuario);
	datos.append("apellidoUsuario", apellidoUsuario);
	datos.append("correoUsuario", correoUsuario);
	datos.append("telefonoUsuario", telefonoUsuario);
	datos.append("direccionUsuario", direccionUsuario);
    datos.append("passwordUsuario", passwordUsuario);
    datos.append("rolUsuario", rolUsuario);
    datos.append("estadoUsuario", estadoUsuario);
	datos.append("acc", "add");

	$.ajax({
		url: "ajax/usuario.ajax.php",
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
						$(".boton-guardar-usuario").prop('disabled', false);
						$(".boton-guardar-usuario").html(' Guardar');
						$("#idUsuari").val(null);
						$("#nombreUsuario").val(null);
						$("#apellidoUsuario").val(null);
						$("#correoUsuario").val(null);
						$("#telefonoUsuario").val(null);
						$("#direccionUsuario").val(null);
    					$("#passwordUsuario").val(null);
						$("#rolUsuario").val(1);
    					$("#estadoUsuario").val(1);
						$("#oficinaCoordinador").val(null);
						$("#cursoAuxiliar").val(null);
						$("#jornadaAuxiliar").val(null);
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
				$(".boton-guardar-usuario").prop('disabled', false);
				$(".boton-guardar-usuario").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".boton-guardar-usuario").prop('disabled', false);
				$(".boton-guardar-usuario").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".boton-guardar-usuario").prop('disabled', false);
			$(".boton-guardar-usuario").html('<i class="fas fa-save"></i> Guardar');
		});
	
	

	if(rolUsuario === 'Coordinador'){

		const idCoordinador = $("#idUsuari").val();
		const nombreCoordinador = $("#nombreUsuario").val();
		const apellidoCoordinador = $("#apellidoUsuario").val();
		const correoCoordinador = $("#correoUsuario").val();
		const telefonoCoordinador = $("#telefonoUsuario").val();
		const oficinaCoordinador = $("#oficinaCoordinador").val();
		const idUsuariofk = $("#idUsuari").val();
		const estadoCoordinador = $("#estadoUsuario").val();


		let datosCoordinador = new FormData();

		datosCoordinador.append("idCoordinador", idCoordinador);
		datosCoordinador.append("nombreCoordinador", nombreCoordinador);
		datosCoordinador.append("apellidoCoordinador", apellidoCoordinador);
		datosCoordinador.append("telefonoCoordinador", telefonoCoordinador);
		datosCoordinador.append("correoCoordinador", correoCoordinador);
		datosCoordinador.append("oficinaCoordinador", oficinaCoordinador);
    	datosCoordinador.append("estadoCoordinador", estadoCoordinador);
		datosCoordinador.append("idUsuariofk", idUsuariofk);
		datosCoordinador.append("acc", "addcor");

		$.ajax({
			url: "ajax/usuario.ajax.php",
			method: "POST",
			data: datosCoordinador,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json"
		})

	}
	if(rolUsuario === 'Auxiliar'){

		console.log('ENTRÉ')

		const idAuxiliar = $("#idUsuari").val();
		const nombreAuxiliar = $("#nombreUsuario").val();
		const apellidoAuxiliar = $("#apellidoUsuario").val();
		const direccionAuxiliar = $("#direccionUsuario").val();
		const correoAuxiliar = $("#correoUsuario").val();
		const telefonoAuxiliar = $("#telefonoUsuario").val();
		const cursoAuxiliar = $("#cursoAuxiliar").val();
		const jornadaAuxiliar = $("#jornadaAuxiliar").val();
		const idUsuariofk = $("#idUsuari").val();
		const estadoAuxiliar = $("#estadoUsuario").val();


		let datosAux = new FormData();

		datosAux.append("idAuxiliar", idAuxiliar);
		datosAux.append("nombreAuxiliar", nombreAuxiliar);
		datosAux.append("apellidoAuxiliar", apellidoAuxiliar);
		datosAux.append("direccionAuxiliar", direccionAuxiliar);
		datosAux.append("telefonoAuxiliar", telefonoAuxiliar);
		datosAux.append("correoAuxiliar", correoAuxiliar);
		datosAux.append("cursoAuxiliar", cursoAuxiliar);
		datosAux.append("jornadaAuxiliar", jornadaAuxiliar);
    	datosAux.append("estadoAuxiliar", estadoAuxiliar);
		datosAux.append("idUsuariofk", idUsuariofk);
		datosAux.append("acc", "addaux");

		$.ajax({
			url: "ajax/usuario.ajax.php",
			method: "POST",
			data: datosAux,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json"
		})
		
	}

});




$("#tablaUsuarios").on('click', '.btn-desactivar', function(event) {
	event.preventDefault();

	const idUsuari = $(this).attr('idUsuari');
	const estadoUsuario = 0;

    console.log(idUsuari);

	let datos = new FormData();
	datos.append("idUsuari", idUsuari);
	datos.append("estadoUsuario", estadoUsuario);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/usuario.ajax.php",
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
			tablaUsuarios.ajax.reload();
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

$("#tablaUsuarios").on('click', '.btn-activar', function(event) {
	event.preventDefault();

	const idUsuari = $(this).attr('idUsuari');
	const estadoUsuario = 1;

	let datos = new FormData();
	datos.append("idUsuari", idUsuari);
	datos.append("estadoUsuario", estadoUsuario);
	datos.append("acc", "estado");	
	$.ajax({
		url: "ajax/usuario.ajax.php",
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
			tablaUsuarios.ajax.reload();
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

$('#tablaUsuarios').on('click', '.btn-traer-datos-usuarios', function(event) {
	event.preventDefault();
	
	const idUsuari = $(this).attr('idUsuari');
	const nombreUsuario = $(this).attr('nombreUsuario');
	const apellidoUsuario = $(this).attr('apellidoUsuario');
	const correoUsuario = $(this).attr('correoUsuario');
	const telefonoUsuario = $(this).attr('telefonoUsuario');
	const direccionUsuario = $(this).attr('direccionUsuario');
    const passwordUsuario = $(this).attr('passwordUsuario');
	const rolUsuario = $(this).attr('rolUsuario');
    const estadoUsuario = $(this).attr('estadoUsuario');
	
	console.log(correoUsuario)

	$("#idUsuari-actualizar").val(idUsuari);
	$("#nombreUsuario-actualizar").val(nombreUsuario)
	$("#apellidoUsuario-actualizar").val(apellidoUsuario)
	$("#correoUsuario-actualizar").val(correoUsuario)
	$("#telefonoUsuario-actualizar").val(telefonoUsuario)	
	$("#direccionUsuario-actualizar").val(direccionUsuario)	
	$("#passwordUsuario-actualizar").val(passwordUsuario)	
	$("#rolUsuario-actualizar").val(rolUsuario)	
	$("#estadoUsuario-actualizar").val(estadoUsuario)	


	$("#modal-actualizar-usuario .modal-title").text('Actualizar usuario: ' + idUsuari).addClass('text-light')
	$("#modal-actualizar-usuario .modal-header").removeClass('bg-primary').addClass('bg-success');
	$("#modal-actualizar-usuario").modal("show");
});

$("#form-usuarios-actualizar").on('submit', function(event) {
	event.preventDefault();

	$(".btn-actualizar-datos-usuario").prop('disabled', true);
	$(".btn-actualizar-datos-usuario").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span>Enviando Solicitud...</span>');

	const idUsuari = $("#idUsuari-actualizar").val();
	const nombreUsuario = $("#nombreUsuario-actualizar").val();
	const apellidoUsuario = $("#apellidoUsuario-actualizar").val();
	const correoUsuario = $("#correoUsuario-actualizar").val();
	const telefonoUsuario = $("#telefonoUsuario-actualizar").val();
	const direccionUsuario = $("#direccionUsuario-actualizar").val();
    const passwordUsuario = $("#passwordUsuario-actualizar").val();
	const rolUsuario = $("#rolUsuario-actualizar").val();
	
	console.log('Entre')

	let datos = new FormData();
	datos.append("idUsuari", idUsuari);
	datos.append("nombreUsuario", nombreUsuario);
	datos.append("apellidoUsuario", apellidoUsuario);
	datos.append("correoUsuario", correoUsuario);
	datos.append("telefonoUsuario", telefonoUsuario);
	datos.append("direccionUsuario", direccionUsuario);
    datos.append("passwordUsuario", passwordUsuario);
    datos.append("rolUsuario", rolUsuario);
	datos.append("acc", "updt");


	$.ajax({
		url: "ajax/usuario.ajax.php",
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
						tablaUsuarios.ajax.reload();
						$(".btn-actualizar-datos-usuario").prop('disabled', false);
						$(".btn-actualizar-datos-usuario").html(' Guardar');
						$("#modal-actualizar-usuario").modal("hide");
						tablaUsuarios.ajax.reload();
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
				$(".btn-actualizar-datos-usuario").prop('disabled', false);
				$(".btn-actualizar-datos-usuario").html('<i class="fas fa-save"></i> Guardar');
             } else {
				let mensajeError = "";
				for (let i = 0; i < response.length; i++) {
					mensajeError += '<li>' + response[i] + '</li>';
				}
				Swal.fire('Advertencia', mensajeError, 'warning')
				$(".btn-actualizar-datos-usuario").prop('disabled', false);
				$(".btn-actualizar-datos-usuario").html('<i class="fas fa-save"></i> Guardar');
			}

		})
		.fail(function(response) {
			console.log("Error", response.responseText);
			$(".btn-actualizar-datos-usuario").prop('disabled', false);
			$(".btn-actualizar-datos-usuario").html('<i class="fas fa-save"></i> Guardar');
		});
});
