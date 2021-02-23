<?php
	error_reporting(0);
	$conn = @mysql_connect("localhost","root","");
	@mysql_select_db("spp", $conn);
	
	if ($_POST["simpan"]<>"")
	{
		$qry_insert = "insert into data_pembayaran (id_bayar,tgl_bayar,tahun_bayar,jumlah_bayar,no_induk) values('".$_POST["id_bayar"]."','".$_POST["tgl_bayar"]."','".$_POST["tahun_bayar"]."','".$_POST["jumlah_bayar"]."','".$_POST["no_induk"]."')";
		$insert = @mysql_query($qry_insert, $conn) or die (mysql_error());

		header("Location: view_pembayaran.php"); 
	}
?>
<html lang="en">
 <head>
 </head>
  <title>Document</title>
  <style>
		table
		{
			background-color: #004891;
			border: 1px solid #959595;
		}

		td 
		{
			padding: 10px;
		}

		body
		{
			color: #555555;
			font-size: 15px; 
			font-weight: normal;
			font-family:  Segoe UI;
		}

		.td_judul
		{
			padding: 8px;
			font-weight: bold;
			border-bottom: 1px dotted #9e9e9e;
			text-align: center;
			background-color: #CCCCCC;

		}
		
		.td_utama 
		{
			padding: 15px;
			font-weight: bold;
			font-size: 40px; 
			color: #FFFFFF;
			padding-left: 20px;
		}

		.td_isi
		{
			background-color: #FFFFFF;
		}
		
		.tombol
		{
			background-color: #669900;
			border: 1px solid #CCCCCC;
			padding: 5px;
			font-weight: bold;
			color: #FFFFFF;
			font-size: 15px; 
		}
		
		.input
		{
			border: 1px solid #CCCCCC;
			padding: 5px;
		}
  </style>
 <body>
	<br><br>
  <table cellpadding='0' cellspacing='0' width='100%' align='center'>
	<tr>
		<td width='100%' class='td_utama'>
			FORM PEMBAYARAN<br>
		</td>
	</tr>
	<tr>
		<td width='100%' class='td_isi'>
			<strong>PEMBAYARAN</strong>
			<br><br>
			<table border="1" width='100%' class='td_isi'>
			<form method="POST" action="add_pembayaran.php" >
			<tr>
				<td width='50%' class='td_isi'>
					<strong>ID BAYAR : </strong><input type="text" name="id_bayar" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>TANGGAL BAYAR : </strong><input type="date" name="tgl_bayar" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>TAHUN BAYAR: </strong>
					<input type="radio" name="tahun_bayar" value='2020'>2020
					<input type="radio" name="tahun_bayar" value='2030'>2030	
					<input type="radio" name="tahun_bayar" value='2040'>2040
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>JUMLAH BAYAR: </strong><input type="text" name="jumlah_bayar" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>NO INDUK : </strong>
					<select name="no_induk">
					<?php
					$tampil=mysql_query("select * from data_siswa");
					while($w=mysql_fetch_array($tampil))
					{
					echo"<option value=$w[no_induk] selected> $w[data_siswa]</option>";
					}
					?></select></td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<input type="submit" value="simpan" name="simpan" class='tombol'>
					<form>
					<input type="button" class='td_judul' value="Index Pembayaran" onclick="window.location.href='view_pembayaran.php'" />
					</form>
				</td>
			</tr>
			</form>
			</table>
		</td>
	</tr>
  </table>
 </body>
</html>