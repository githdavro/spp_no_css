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
		$no_hp_siswa=$_POST["no_hp_siswa"];
		$kelas=$_POST["kelas"];

		$q_simpan="update data_siswa set no_induk='".$no_induk."',nama_siswa='".$nama_siswa."',alamat_siswa='".$alamat_siswa."',no_hp_siswa='".$no_hp_siswa."',kelas='".$kelas."' where no_induk='".$_GET["no_induk"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_member.php");
	}

	$show="select * from data_siswa where no_induk='".$_GET["no_induk"]."'";
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
 <form method="post" action="edit_member.php?no_induk=<?php echo $data["no_induk"];?>">
  <table>
<tr>
				<td width='100%' class='td_isi'>
					no induk : <input name="no_induk" value='<? echo $data["no_induk"];?>' class='input'>
				</td>
			</tr>	
			<tr>
				<td width='100%' class='td_isi'>
					nama siswa : <input name="nama_siswa"  value='<? echo $data["nama_siswa"];?>' class='input'>
				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					alamat_siswa : <input type="text" name="alamat_siswa" value='<? echo $data["alamat_siswa"];?>' class='input'>
				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					no_hp_siswa : <input type="text" name="no_hp_siswa" value='<? echo $data["no_hp_siswa"];?>' class='input'>
				</td>
			</tr>
			<tr>
				<td width='100%' class='td_isi'>
					kelas : 
					<input type="radio" name="kelas" value="10" <?php if($data['kelas']=='10') echo 'checked'?>>10
					<input type="radio" name="kelas" value="11" <?php if($data['kelas']=='11') echo 'checked'?>>11
					<input type="radio" name="kelas" value="12" <?php if($data['kelas']=='12') echo 'checked'?>>12				

				</td>
			</tr> 
<tr>
	<td colspan='3'><input type="submit" name='simpan' value='simpan'></td>
  </tr>
  </table>	
 </form>
 </body>
</html>
