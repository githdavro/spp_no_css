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

		$q_simpan="update data_pembayaran set id_bayar='".$id_bayar."',tgl_bayar='".$tgl_bayar."',tahun_bayar='".$tahun_bayar."',jumlah_bayar='".$jumlah_bayar."',no_induk='".$no_induk."' where id_bayar='".$_GET["id_bayar"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_pembayaran.php");
	}

	$show="select * from data_pembayaran where id_bayar='".$_GET["id_bayar"]."'";
	$query=mysql_query($show,$conn);
	$data=mysql_fetch_array($query);
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
 <form method="post" action="edit_pembayaran.php?id_bayar=<?php echo $data["id_bayar"];?>">
  <table>
<tr>
				<td width='100%' class='td_isi'>
					id bayar : <input name="id_bayar" value='<? echo $data["id_bayar"];?>' class='input'>
				</td>
			</tr>	
			<tr>
				<td width='100%' class='td_isi'>
					tanggal bayar : <input type="date" name="tgl_bayar"  value='<? echo $data["tgl_bayar"];?>' class='input'>
				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					tahun_bayar : 
					<input type="radio" name="tahun_bayar" value="2020" <?php if($data['tahun_bayar']=='2020') echo 'checked'?>>2020
					<input type="radio" name="tahun_bayar" value="2030" <?php if($data['tahun_bayar']=='2030') echo 'checked'?>>2030
					<input type="radio" name="tahun_bayar" value="2040" <?php if($data['tahun_bayar']=='2040') echo 'checked'?>>2040				

				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					jumlah bayar : <input type="text" name="jumlah_bayar" value='<? echo $data["jumlah_bayar"];?>' class='input'>
				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					no induk : <input type="text" name="no_induk" value='<? echo $data["no_induk"];?>' class='input'>
				</td>
			</tr> 
<tr>
	<td colspan='3'><input type="submit" name='simpan' value='simpan'></td>
  </tr>
  </table>	
 </form>
 </body>
</html>
