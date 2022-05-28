function idleLogout() {
	var t;
	window.onload = resetTimer;
	window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeypress = resetTimer;
    window.addEventListener('scroll', resetTimer, true); // improved; see comments

    function yourFunction() {
    	window.location = "salir";
    }

    function resetTimer() {
    	clearTimeout(t);
        t = setTimeout(yourFunction, 60000);  // time is in milliseconds
    }
}

$("input").on('focus', function(event) {
	event.preventDefault();
	$(".alert").remove();
});

let lenguajeTabla = {

	"sProcessing": "Procesando...",
	"sLengthMenu": "Mostrar _MENU_ registros",
	"sZeroRecords": "No se encontraron resultados",
	"sEmptyTable": "Ningún dato disponible en esta tabla",
	"sInfo": "Filas del _START_ al _END_ de un total de _TOTAL_",
	"sInfoEmpty": "0 Filas",
	"sInfoFiltered": "(filtrado de un total de _MAX_ filas)",
	"sInfoPostFix": "",
	"sSearch": "Buscar:",
	"sUrl": "",
	"sInfoThousands": ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst": "Primero",
		"sLast": "Último",
		"sNext": "Sig",
		"sPrevious": "Ant"
	},
	"oAria": {
		"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}

}

