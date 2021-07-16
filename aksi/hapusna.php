<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$id = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM penilaian WHERE id_penilaian = '$id'");
		echo "<script>alert ('berhasil menghapus')</script>";
		header("location:../nilai.php");
	}elseif (isset($_GET['hapus_user'])) {
		$id = $_GET['hapus_user'];
		mysqli_query($dbcon,"DELETE FROM user WHERE id = '$id'");
		echo "<script>alert ('berhasil menghapus')</script>";
		header("location:../kelolauser.php?page=kelolauser");
	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>