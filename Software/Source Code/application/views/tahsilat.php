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
		width: 100%;
		height: 100%;
	}

	#baslik
	{
		position: relative;
		height: 100px;
		width:100%;
	}

	#icerik
	{
		overflow: hidden;
		border: solid 1px black;
		margin: 2px;
		margin-top: 5px;
		height: 245px;
		padding: 5px;
	}

	#altbilgi
	{
		overflow: hidden;
		border: solid 1px black;
		margin: 2px;
		margin-top: 5px;
		margin-bottom: 5px;
		height: 85px;
		padding: 5px;
	}

	#firma
	{
		overflow: hidden;
		position: absolute;
		font-size: 10px;
		border: solid 1px black;
		margin: 2px;
		padding: 1px;
		width: 400px;
		height: 100px;
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
	}

	#no
	{
		font-family: "Times New Roman";
		margin-left: 20px;
		float: left;
		font-size: 16px;
	}

	#bilgi
	{
		position: absolute;
	}

	#cari
	{
		width: 100%;
		margin-left: 250px;
	}

	#tablo,th,td
	{
		border-collapse: collapse;
		margin-top: 10px;
		border: 1px solid black;
		width:100%
	}

	th,td
	{
		font-size: 14px;
		text-align: center;
	}
</style>
</head>
<body onload="window.open(url, '_blank');">
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
				<h4 style="text-align: center;"><b>TAHSİLAT MAKBUZU</b></h4><br>
				<span id="no"><b>No : <?php echo $makbuz_no; ?></b></span>
				<span id="tarih"><b><?php echo date("d/m/Y"); ?> </b></span>
			</div>
		</div>

		<div id="icerik">

			<b><span id="cari"> Sayın : <?php echo $cari; ?></span></b>
			<br>
			<table id="tablo">
				<thead>
					<tr>
						<th> <b>Banka Adı</b> </th>
						<th> <b>Şube</b> </th>
						<th> <b>Çek No</b> </th>
						<th> <b>Hesap No</b> </th>
						<th> <b>Vadesi</b> </th>
						<th> <b>Borçlusu</b> </th>
						<th> <b>Tutarı</b> </th>
					</tr>
				</thead>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
					<td> - </td> 
				</tr>
				<tr>
					<td> - </td>
					<td> - </td> 
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
			</table>
		</div>

		<div id="altbilgi">
			
			<div style="float: left;"> <span><i>Açıklama</i></span> <br> Toplam <?php echo $tutar; ?>
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
		<div style="float: right; margin-right: 50px; font-size: 13px;"><span><b>Teslim Alan</b></span><br><span style="margin-left: -5px;"> <?php echo $kullanici;?></span></div>
	</div>
</div>

<script type="text/javascript">
	window.print();
	window.location.back(-1);
</script>
</body>
</html>