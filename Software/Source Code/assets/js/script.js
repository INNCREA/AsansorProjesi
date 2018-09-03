$(function () {

	$('.duzenleKullanici').on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: {id:id},
			success: function(data){
				$.each( data, function( key, value ) {
					$('#kullanici_id').val(value.kullanici_id);
					$('#kullanici_tckn').val(value.kullanici_tckn);
					$('#kullanici_adSoyad').val(value.kullanici_adSoyad);
					$('#kullanici_adres').val(value.kullanici_adres);
					$('#kullanici_tel').val(value.kullanici_tel);
					$('#kullanici_rol').val((value.kullanici_rol == 1) ? '1' : '2').change();
					$('#kullanici_durum').val((value.kullanici_durum == 1) ? '1' : '0').change();
					$('#kullanici_mail').val(value.kullanici_mail);
					$('#kullanici_adi').val(value.kullanici_adi);
					$('#kullanici_sifre').val(value.kullanici_sifre);
				});
				$('#duzenle').modal();
			}
		});
	});


	$('.duzenleStok').on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: {id:id},
			success: function(data){
				$.each( data, function( key, value ) {
					$('#stok_id').val(value.stok_id);
					$('#stok_kodu').val(value.stok_kodu);
					$('#stok_adi').val(value.stok_adi);
					$('#alis_fiyat').val(value.alis_fiyat);
					$('#satis_fiyat').val(value.satis_fiyat);
					$('#stok_kdv').val((value.stok_kdv == 18) ? '18' : '8').change();
					$('#stok_birim').val(value.stok_birim);
					$('#stok_miktar').val(value.stok_miktar);
				});
				$('#duzenle').modal();
			}
		});
	});


	$('.duzenleMusteri').on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: {id:id},
			success: function(data){
				$.each( data, function( key, value ) {
					$('#musteri_id').val(value.musteri_id);
					$('#musteri_adSoyad').val(value.musteri_adSoyad);
					$('#musteri_mail').val(value.musteri_mail);
					$('#musteri_tel').val(value.musteri_tel);
					$('#musteri_adres').val(value.musteri_adres);
					$('#musteri_kAdi').val(value.musteri_kAdi);
				});
				$('#duzenle').modal();
			}
		});
	});


	$('.duzenleHata').on("click", function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			data: {id:id},
			success: function(data){
				$.each( data, function( key, value ) {
					$('#hata_id').val(value.hata_id);
					$('#hata_kodu').val(value.hata_kodu);
					$('#hata_aciklama').val(value.hata_aciklama);
				});
				$('#duzenle').modal();
			}
		});
	});


	$('.tarih').inputmask('dd.mm.yyyy', { placeholder: '__.__.____',showMaskOnHover: false });
	$('.fiyat').inputmask({ mask: ["[999.999,99] ₺"], greedy: true ,  numericInput: true , showMaskOnHover: false, jitMasking: true});
	$('.email').inputmask({ alias: "email",showMaskOnHover: false });
	$('.telefon').inputmask();



});