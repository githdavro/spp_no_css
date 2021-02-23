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
		$id_bayar=$_POST["id_bayar"];
		$tgl_bayar=$_POST["tgl_bayar"];
		$tahun_bayar=$_POST["tahun_bayar"];
		$jumlah_bayar=$_POST["jumlah_bayar"];
		$no_induk=$_POST["no_induk"];

		$q_simpan="insert into data_pembayaran (id_bayar,tgl_bayar,tahun_bayar,jumlah_bayar,no_induk) values ('".$id_bayar."','".$tgl_bayar."','".$tahun_bayar."','".$jumlah_bayar."','".$no_induk."')";
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
			<form method='post' action='view_pembayaran.php'>
			<tr>
				<td>Cari Pembayaran </td>
				<td><input type="text" name="keyword" size="50" placeholder=" Cari data.." style="font-family: aller, sans-sherif" title="cari data..">
				<input type="submit" name="cari" value="search" title="cari" style="font-family: aller, sans-sherif"></td>
				<td >
				<?php

				$sql = " select * from data_pembayaran ";
				$qry = mysql_query($sql);
		
				?>
				</td>
				<td width='50%' align='right'>
					<a href='index.html'> Home  </a><br>
					<a href='add_pembayaran.php'> Add Pembayaran  </a>
				</td>
			</tr>
			</form>
			</table>
			<br>
			<TABLE width='100%' cellspacing='0' cellpadding='5' border='0' class='table_utama'>
				<TR>
					<TD class='td_judul' width='15%'>ID BAYAR</TD>
					<TD class='td_judul' width='10%'>TANGGAL BAYAR</TD>
					<TD class='td_judul' width='15%'>TAHUN BAYAR</TD>
					<TD class='td_judul' width='15%'>JUMLAH BAYAR</TD>
					<TD class='td_judul' width='15%'>NO INDUK</TD>
					<TD class='td_judul' width='10%'>action</TD>
				</TR>
				<?php
			if($_POST["cari"])
			{
				$sql_cari = " where (id_bayar like '%".$_POST["keyword"]."%' or tgl_bayar like '%".$_POST["keyword"]."%') ";
			}
			$result = mysql_query("SELECT * FROM data_pembayaran");

			$show = " select * from data_pembayaran ".$sql_cari." ORDER BY id_bayar ";
			$query = mysql_query($show, $conn);
			while ($data = mysql_fetch_assoc($query))
					{
				?>
				<TR>
					<TD class='td_isi' align='center'><?php echo $data["id_bayar"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["tgl_bayar"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["tahun_bayar"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["jumlah_bayar"];?></TD>
					<TD class='td_isi' align='center'><?php echo $data["no_induk"];?></TD>
					<TD class='td_isi' align='center'>
						<a href='edit_pembayaran.php?id_bayar=<?php echo $data["id_bayar"]; ?>'>Edit</a> | <a href='delete_pembayaran.php?id_bayar=<?php echo $data["id_bayar"]; ?>'>Delete</a>
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
