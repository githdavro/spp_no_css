<?php
	error_reporting(0);
  $conn = @mysql_connect("localhost","root","");
  @mysql_select_db("spp", $conn);

  $str_hapus = "delete from data_pembayaran where id_bayar='".$_GET["id_bayar"]."'";
  $qry_hapus = @mysql_query ($str_hapus, $conn);

  header("Location: view_pembayaran.php"); 
?>