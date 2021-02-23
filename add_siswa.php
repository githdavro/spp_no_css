<?php
	error_reporting(0);
	$conn = @mysql_connect("localhost","root","");
	@mysql_select_db("spp", $conn);
	
	if ($_POST["simpan"]<>"")
	{
		$qry_insert = "insert into data_siswa (no_induk,nama_siswa,alamat_siswa,no_hp_siswa,kelas) values('".$_POST["no_induk"]."','".$_POST["nama_siswa"]."','".$_POST["alamat_siswa"]."','".$_POST["no_hp_siswa"]."','".$_POST["kelas"]."')";
		$insert = @mysql_query($qry_insert, $conn) or die (mysql_error());

		header("Location: view_siswa.php"); 
	}
?>
<html lang="en">
 <head>
 </head>
  <title>Document</title>
  <style>
		table
		{
			background-color: ##FFA07A;
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
			FORM SISWA<br>
		</td>
	</tr>
	<tr>
		<td width='100%' class='td_isi'>
			<strong>SISWA</strong>
			<br><br>
			<table border="1" width='100%' class='td_isi'>
			<form method="POST" action="add_member.php" >
			<tr>
				<td width='50%' class='td_isi'>
					<strong>NO INDUK : </strong><input type="text" name="no_induk" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>NAMA SISWA : </strong><input type="text" name="nama_siswa" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>ALAMAT : </strong><input type="text" name="alamat_siswa" class='input'>
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<strong>NO HP SISWA: </strong><input type="text" name="no_hp_siswa" class='input'>
				</td>
			</tr>
						<tr>
				<td width='50%' class='td_isi'>
					<strong>KELAS : </strong>
					<input type="radio" name="kelas" value='10'>10
					<input type="radio" name="kelas" value='11'>11	
					<input type="radio" name="kelas" value='12'>12
				</td>
			</tr>
			<tr>
				<td width='50%' class='td_isi'>
					<input type="submit" value="simpan" name="simpan" class='tombol'>
					<form>
					<input type="button" class='td_judul' value="Index Siswa" onclick="window.location.href='view_siswa.php'" />
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