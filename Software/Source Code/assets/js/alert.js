$(function () {
	
	$('.sil').on("click", function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		swal({
			title: "Silme İşlemi",
			text: "Belirtilen kaydı silmek istiyor musunuz ? Bu işlem geri alınamamaktadır!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#F44336',
			confirmButtonText: 'TAMAM',
			cancelButtonText: "VAZGEÇ",
			confirmButtonClass: "btn-danger",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm) {
			if (isConfirm) {
				window.location.replace(url);
				setTimeout(function(){ window.location.replace = url; }, 2000);
			} else {
				swal("Vazgeç", "Kayıt silme işlemi iptal edildi", "error");
			}
		});
	});

});