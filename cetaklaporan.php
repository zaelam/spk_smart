<?php
include 'onek.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>cetak laporan</title>
    
    <!-- Bootstrap Core CSS -->
    
    <script src="jquery-3.1.0.js"></script>
    <script src="jquery.dataTables.min.js"></script>

    <style type="text/css">
    	.container{
    		margin-left: 50px;
    		margin-right: auto;

    	}

    	.border{
    		border: 1px solid;
    	}
    </style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<center><h1>HASIL LAPORAN PENILAIAN SMART</h1></center>
			</div>

			<div class="col-lg-12 mt-2">	
				<h3>Nilai Dasar</h3>
			</div>
			
			<!-- Menampilkan Tabel Data -->
	        <div class="col-lg-12">
	           
	            <table id="tabel-data-x" class="border" width="60%" cellspacing="0">
	            
	                <thead >
	                    <tr class="border">
	                        <th class="border">No</th>
	                        <th class="border">kode desa</th>
	                        <th class="border">Nama Peserta</th>
	                        <th class="border">Besar Bantuan</th>
	                        <th class="border">peruntukan</th>
	                        <th class="border">volume</th>
	                        <th class="border">Proposal</th>
	                        <th class="border">Presentasi</th>
	                        <th class="border">Pemahaman Kerangka</th>
	                        <th class="border">Tenaga Kerja</th>
	                        <th class="border">Harga</th>
	                        <th class="border">Tanggung Jawab</th>
	                        <th class="border">Bank Desa</th>
	                        <th class="border">Pengalaman</th>
	                        <th class="border">Apresiasi Inovasi</th>
	                        
	                    </tr>
	                </thead>
	                <tbody>
	                    <!-- mengeluarkan data siswa dari database -->
	                    <?php

                            if ($_SESSION['level'] == 'user') {
                                # code...
                                $kodedesa=$_SESSION['kode_desa'];
                               
                                $sql = "SELECT * FROM penilaian WHERE kode_desa='$kodedesa'";
                            }else{
                                $sql = "SELECT * FROM penilaian";

                            }
	                       
	                       $query = mysqli_query($dbcon, $sql);
	                       $n = 1 ;



	                       while ($nilai1=mysqli_fetch_array($query)) {
	                            
	                    ?>
	                            <tr class="border">
	                            <td class="border"><?=$n?></td>
	                            <td class="border"><?=$nilai1['kode_desa']?></td>
	                            <td class="border"><?=$nilai1['nama_peserta']?></td>
	                            <td class="border"><?=$nilai1['besar_bantuan']?></td>
	                            <td class="border"><?=$nilai1['peruntukan']?></td>
	                            <td class="border"><?=$nilai1['volume']?></td>
	                            <td class="text-right border"><?=$nilai1['proposal']?></td>
	                            <td class="text-right border"><?=$nilai1['presentasi']?></td>
	                            <td class="text-right border"><?=$nilai1['phm_kerangka']?>
	                                    
	                                </td>
	                            <td class="text-right border"><?=$nilai1['tenaga_kerja']?></td>
	                             <td class="text-right border"><?=$nilai1['harga']?></td>
	                               
	                            <td class="text-right border"><?=$nilai1['tanggung_jawab']?></td>
	                            <td class="text-right border"><?=$nilai1['bank_desa']?></td>
	                            <td class="text-right border"><?=$nilai1['pengalaman']?></td>
	                             <td class="text-right border"><?=$nilai1['apresiasi_inovasi']?></td>
	                            
	                    <?php
	                        $n++;
	                        }
	                    ?>
	                </tbody>
	            </table>
	                   
	        </div>
	        <!-- end Tabel Data -->
	        <div class="col-lg-12">
				<h3>Nilai Hasil</h3>
			</div>
			<div class="col-lg-12">
				<table id="tabel-data-x" class="table table-striped table-bordered table-hover" width="60%" cellspacing="0" width="100px">
                    <thead>
                        <tr>
                            <th class="border" width="5px">No</th>
                            <th class="border" width="5px">Kode desa</th>
                            <th class="border" width="10px">Nama Peserta</th>
                            <th class="border" width="10px">Proposal</th>
                            <th class="border" width="10px">Presentasi</th>
                            <th class="border" width="10px">Pemahaman Kerangka</th>
                            <th class="border" width="5px">Tenaga Kerja</th>
                            <th class="border" width="10px">Harga</th> 
                            <th class="border" width="10px">Tanggung Jawab</th>
                            <th class="border" width="10px">Bank Desa</th> 
                            <th class="border" width="10px">Pengalaman</th>
                            <th class="border" width="10px">Apresiasi Inovasi</th>
                            <th class="border" width="5px">Nilai Akhir</th>
                            <!-- <th>Normalisasi kriteria</th>
                             <th>Nilai Utility</th>
-->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $n = 1 ;

                        $sqljumlah ="SELECT SUM(bobot) FROM kriteria";
                        $queryjumlah= mysqli_query($dbcon,$sqljumlah);
                        $jumlah0=mysqli_fetch_array($queryjumlah);
                        $jumlah = $jumlah0[0];
                        
                        // bobot
                        $sqlkriteria ="SELECT bobot FROM kriteria";
                        $querykriteria = mysqli_query($dbcon, $sqlkriteria);
                        $bobot=[];
                        while ($bariskriteria= mysqli_fetch_array($querykriteria)) {
                            $bobot[]=$bariskriteria['bobot'];
                        }
                        // var_dump($bobot);die();
                        //end bobot
                        
                        //nilai 

                        if ($_SESSION['level'] == 'user') {
                            # code...
                            $kodedesa=$_SESSION['kode_desa'];
                           
                            $sqlnilai = "SELECT * FROM penilaian WHERE kode_desa='$kodedesa'";
                        }else{
                            $sqlnilai = "SELECT * FROM penilaian";

                        }
                    
                        $querynilai = mysqli_query($dbcon,$sqlnilai);

                        

                        while ($barisnilai=mysqli_fetch_array($querynilai)) {  
                            //nama
                            $kode_desa= $barisnilai['kode_desa'];
                            $sqlnama = "SELECT nama_desa FROM alternatif WHERE kode_desa = '$kode_desa'";
                            $nama_desa = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama));
                            //nilai
                            // echo $jumlah.'jumlah</br>';
                            // echo $bobot[0].'bobot1</br> ';
                            // echo $bobot[1].'bobot2</br> ';
                            // echo $bobot[2].'bobot3</br> ';
                            $proposal = @(100*(($barisnilai['proposal'] - 50)/(100 - 50)))*($bobot[0]/$jumlah);   
                            $presentasi = @(100*(($barisnilai['presentasi'] - 50)/(100 - 50)))*($bobot[1]/$jumlah);
                            $phm_kerangka = @(100*(($barisnilai['phm_kerangka'] - 50)/(100 - 50)))*($bobot[2]/$jumlah);
                            $tenaga_kerja = @(100*(($barisnilai['tenaga_kerja'] - 50)/(100 - 50)))*($bobot[3]/$jumlah);
                            $harga = @(100*(($barisnilai['harga'] - 50)/(100 - 50)))*($bobot[4]/$jumlah);
                            $tanggung_jawab = @(100*(($barisnilai['tanggung_jawab'] - 50)/(100 - 50)))*($bobot[5]/$jumlah);
                            $bank_desa = @(100*(($barisnilai['bank_desa'] - 50)/(100 - 50)))*($bobot[6]/$jumlah);
                            $pengalaman = @(100*(($barisnilai['pengalaman'] - 50)/(100 - 50)))*($bobot[7]/$jumlah);
                            $apresiasi_inovasi = @(100*(($barisnilai['apresiasi_inovasi'] - 50)/(100 - 50)))*($bobot[8]/$jumlah);
                            // echo '<br>nilai p  ='.$proposal;
                            // echo '<br>nilai k  ='.$presentasi;
                            // echo '<br>nilai a  ='.$phm_kerangka;
                            $nilaievaluasi = $proposal + $presentasi + $phm_kerangka + $tenaga_kerja + $harga + $tanggung_jawab + $bank_desa + $pengalaman + $apresiasi_inovasi;
                            if ($nilaievaluasi <= 60) {
                                $Keterangan = "Tidak Berhak Menjadi Penerima Bantuan Program Kegiatan Pembangunan Desa";
                            
                            }elseif ($nilaievaluasi >= 61 && $nilaievaluasi <= 100) {
                                $Keterangan = "Berhak Menjadi Penerima Bantuan Program Kegiatan Pembangunan Desa";
                            }
                         
                    ?>
                            <tr>

                            <td class="border"><?=$n?></td>
                            <td class="border"><?=$barisnilai['kode_desa']?></td>
                            <td class="text-right border"><?=$barisnilai['nama_peserta']?></td>
                            <td class="text-right border"><?=$proposal?></td>
                            <td class="text-right border"><?=$presentasi?></td>
                            <td class="text-right border"><?=$phm_kerangka?></td>
                            <td class="text-right border"><?=$tenaga_kerja?></td>
                            <td class="text-right border"><?=$harga?></td>
                            <td class="text-right border"><?=$tanggung_jawab?></td>
                            <td class="text-right border"><?=$bank_desa?></td>
                            <td class="text-right border"><?=$pengalaman?></td>
                            <td class="text-right border"><?=$apresiasi_inovasi?></td>
                            <td class="text-right border"><?=$nilaievaluasi?></td>
                       
                            </tr>
                        <?php    
                        $n++;
                        }
                            
                        ?>

                    </tbody>
                </table>    
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		window.print();
		// window.location = "http://localhost/pandu/laporanpenilaian.php?page=laporanpenilaian";
	</script>

</body>
</html>