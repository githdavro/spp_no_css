<?
	error_reporting(0);

	//KONEKSI PHP MYSQL
	$database="spp";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);

	if ($_POST["simpan"])
	{
		//SIMPAN DATA
		$no_induk=$_POST["no_induk"];
		$nama_siswa=$_POST["nama_siswa"];
		$alamat_siswa=$_POST["alamat_siswa"];
		$no_hp_siswa=$_POST["nama"];
		$kelas=$_POST["kelas"];

		$q_simpan="insert into data_siswa (no_induk,nama_siswa,alamat_siswa,no_hp_siswa,kelas) values ('".$no_induk."','".$nama_siswa."','".$alamat_siswa."','".$no_hp_siswa."','".$kelas."')";
		$sql_simpan = mysql_query($q_simpan, $conn);
	}
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 <style>
		table
		{
			background-color: #460000;
			border: 1px solid #CCCCCC;
			border-radius: 5px;
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
			font-size: 30px; 
			color: #FFFFFF;
			padding-left: 20px;
		}

		.td_isi
		{
			background-color: #FFFFFF;
			border-bottom: 1px solid #CCCCCC;
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

		.tombol:hover
		{
			background-color: #3e5b00;
		}

		.input
		{
			border: 1px solid #CCCCCC;
			padding: 5px;
		}
  </style>
 </head>
 <body>
  <table cellpadding='0' cellspacing='0' width='100%' align='center'>
	<tr>
		<td width='100%' class='td_utama'>
			VIEW<br>
		</td>
	</tr>
	<tr>
		<td width='100%' class='td_isi'>
			<strong>Dashboard</strong>
			<br><br>
			<table width='100%' class='td_isi'>
			<form method='post' action='view_siswa.php'>
			<tr>
				<td>Cari Siswa </td>
				<td><input type="text" name="keyword" size="50" placeholder=" Cari data.." style="font-family: aller, sans-sherif" title="cari data..">
				<input type="submit" name="cari" value="search" title="cari" style="font-family: aller, sans-sherif"></td>
				<td >
				<?php

				$sql = " select * from data_siswa ";
				$qry = mysql_query($sql);
		
				?>
				</td>
				<td width='50%' align='right'>
					<a href='index.html'> Home  </a><br>
					<a href='add_siswa.php'> Add Member  </a>
				</td>
			</tr>
			</form>
			</table>
			<br>
			<TABLE width='100%' cellspacing='0' cellpadding='5' border='0' class='table_utama'>
				<TR>
					<TD class='td_judul' width='15%'>NO INDUK</TD>
					<TD class='td_judul' width='10%'>NAMA SISWA</TD>
					<TD class='td_judul' width='15%'>ALAMAT</TD>
					<TD class='td_judul' width='15%'>NO HP SISWA</TD>
					<TD class='td_judul' width='15%'>KELAS</TD>
					<TD class='td_judul' width='10%'>action</TD>
				</TR>
				<?php
			if($_POST["cari"])
			{
				$sql_cari = " where (no_induk like '%".$_POST["keyword"]."%' or nama_siswa like '%".$_POST["keyword"]."%') ";
			}
			$result = mysql_query("SELECT * FROM data_siswa");

			$show = " select * from data_siswa ".$sql_cari." ORDER BY no_induk ";
			$query = mysql_query($show, $conn);
			while ($data = mysql_fetch_assoc($query))
					{
				?>
				<TR>
					<TD class='td_isi' align='center'><?php echo $data["no_induk"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["nama_siswa"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["alamat_siswa"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["no_hp_siswa"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["kelas"];?></TD>
					<TD class='td_isi' align='center'>
						<a href='edit_siswa.php?no_induk=<?php echo $data["no_induk"]; ?>'>Edit</a> | <a href='delete_siswa.php?no_induk=<?php echo $data["no_induk"]; ?>'>Delete</a>
					</TD>
				</TR>				
				<?php
					}
				?>
		</td>
	</tr>
  </table>
 </body>
</html>
