<!DOCTYPE html>
<html>
<head>
	<title>Tahsilat Makbuzu</title>
	<style type="text/css">

	@page 
	{
		size: A5 landscape;
	}

	#cerceve
	{
		position: fixed;
		border: solid 2px black;
		margin: 0;
	}

	#baslik
	{
		position: relative;
		height: 100px;
	}

	#icerik
	{
		overflow: hidden;
		border: solid 1px black;
		margin: 2px;
		margin-top: 5px;
		height: 245px;
		text-align: center;
	}

	#altbilgi
	{
		overflow: hidden;
		border: solid 1px black;
		margin: 2px;
		margin-top: 5px;
		margin-bottom: 5px;
		height: 100px;
	}

	#firma
	{
		position: absolute;
		font-size: 10px;
		border: solid 1px black;
		margin: 2px;
		width: 400px;
		height: 100px;
		overflow: hidden;
	}
	#resim
	{
		float: left;
	}

	#adres
	{
		float: left;
		margin-left: 15px;
		margin-top: 15px;
	}

	#tarih
	{
		float: right;
		font-size: 12px;
		margin-right: 6px;
		font-weight: bold;
	}

	#no
	{
		font-family: "Times New Roman";
		margin-left: 20px;
		float: left;
		font-size: 16px;
		font-weight: bold;
	}

	#bilgi
	{
		position: absolute;
	}

	#cari
	{

	}

	#tablo
	{
		border: 2px solid black;
	}
</style>
</head>
<body>
	<div id="cerceve">
		<div id="baslik">
			<div id="firma">
				<div id="resim">
					<img src="<?php echo base_url('assets/images/Logo.png'); ?>">
				</div>
				<div id="adres">
					Demirciler Ardı Mah. Şehitler Cad.<br> Akyol Apt. Altı No: 49/A - SİVAS<br>
					Telefon 	: 0(346) 224 26 46<br>
					Faks		: 0(346) 224 26 46<br>
					E-posta : nurasasansor@gmail.com
				</div>
			</div>
			<div id="bilgi">
				<h4 style="text-align: center;">TAHSİLAT MAKBUZU</h4><br>
				<span id="no">No : <?php echo $makbuz_no; ?></span>
				<span id="tarih"><?php echo date("d/m/Y"); ?> </span>
			</div>
		</div>

		<div id="icerik">

			<span id="cari"> Sayın : <?php echo $cari; ?></span>
			<br>
			<table>
				<thead>
					<tr>
						<th> Banka Adı </th>
						<th> Şube </th>
						<th> Çek No </th>
						<th> Hesap No </th>
						<th> Vadesi </th>
						<th> Borçlusu </th>
						<th> Tutarı </th>
					</tr>
				</thead>
				<tr>
					<td> Test </td>
					<td> Test </td> 
				</tr>

			</table>

		</div>

		<div id="altbilgi">
			
			<div style="float: left;"> Açıklama <br> Toplam <?php echo $tutar; ?>
			<?php 
			if($tahsilat_turu != "Nakit")
			{ 
				if($tahsilat_turu == "Çek" || $tahsilat_turu == "Senet")
				{
					echo $adet."adet .".$tahsilat_turu." olarak";
				}

			} 
			else
			{ 
				echo " ₺ nakit olarak";
			} 
			?> 
			alındı.
		</div>
		<div style="float: right; margin-right: 50px; font-size: 12px;"><span>Teslim Alan</span><br><span> <?php echo $kullanici;?></span></div>
	</div>
</div>

<script type="text/javascript">
	/*window.onload = function () {
		window.print();
		setTimeout(function(){window.history.back(-1)}, 3);
	}*/

	try{
		this.print();
		window.history.back();
	}
</script>
</body>
</html>