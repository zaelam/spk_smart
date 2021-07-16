<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$nisn = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM siswa WHERE nisn = '$nisn'");
		mysqli_query($dbcon,"DELETE FROM penilaian WHERE nisn='$nisn'");
		echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
		header("location:../alternatif.php");

	}elseif (isset($_GET['alternatif'])) {
		$id = $_GET['alternatif'];
		mysqli_query($dbcon,"DELETE FROM alternatif WHERE id_alternatif = '$id'");
		echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
		header("location:../alternatif.php?page=dataKecamatan");

	}elseif (isset($_GET['kriteria'])) {
		$id = $_GET['kriteria'];
		mysqli_query($dbcon,"DELETE FROM kriteria WHERE id_kriteria = '$id'");
		echo "<script>confirm('berhasil menghapus kriteria')</script>";
		header("location:../kriteria.php?page=dataKriteria");

	}else{
		echo "<h1>gagal</h1>";
	}

?>