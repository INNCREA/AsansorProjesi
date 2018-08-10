$(function () {
	$('#selam').on("click", function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		swal({
			title: "Está seguro?",
			text: "No podrá recuperar el cliente una vez sea eliminado!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Si, Eliminarlo!',
			cancelButtonText: "No, Cancelar!",
			confirmButtonClass: "btn-danger",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm) {
			if (isConfirm) {
				swal("Eliminado!", "Su cliente ha sido eliminado!", "success");
				window.location.replace(url);
			} else {
				swal("Cancelado", "Su cliente está a salvo! :)", "error");
			}
		});
	});
	setTimeout(function(){ window.location.replace = url; }, 2000);
});