<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Hasil Akhir</h1>
                            <!-- <form class="mb-3 float-right" action="" method="post">
                                <input type="text" name="search">
                                <button class="btn btn-sm btn-primary" type="submit" name="submit">Search</button>
                            </form> -->
                        </div>


                        <div class="col-lg-8">

                            

                            <!-- insert kriteria -->
                               
                            <!-- end kriteria -->


                        </div>
                        
                        <!-- Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Hasil Akhir Perangkingan Penentuan Penerima Bantuan Desa
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php  if ($_SESSION['level'] == 'user') { ?>
                                            <table  class="table table-striped table-bordered table-hover">
                                        <?php }else{ ?>
                                            <table id="tabel-data-x" class="table table-striped table-bordered table-hover">
                                        <?php } ?>
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Desa</th>
                                                    <th>Nama Peserta Desa</th>
                                                    <th>Peruntukan</th>
                                                    <th>Volume</th>
                                                    <th>Besar Bantuan</th>
                                                    <th>Nilai Total</th>
                                                    <th>Keterangan</th>
                                            
                                                   <!--  <th>Bobot Relatif</th> -->
                                                   
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
                                        
                                        $kode_desa=$barisnilai['kode_desa'];
                                        $nama_peserta=$barisnilai['nama_peserta'];
                                        $peruntukan=$barisnilai['peruntukan'];
                                        $volume=$barisnilai['volume'];
                                        $besar_bantuan=$barisnilai['besar_bantuan'];
                                        
                                        $sqlcek = "SELECT kode_desa FROM nilai_akhir WHERE kode_desa = '$kode_desa'";
                                        $querycek = mysqli_query($dbcon,$sqlcek);
                                        if ($querycek == true) {
                                            $sql = "INSERT INTO nilai_akhir (id_nilai_akhir,kode_desa,nama_peserta_desa,peruntukan,volume,besar_bantuan,nilai_total,keterangan)VALUES ('','$kode_desa','$nama_peserta','$peruntukan','$volume','$besar_bantuan','$nilaievaluasi','$Keterangan')";
                                            $query = mysqli_query($dbcon,$sql);
                                        }
                                        
                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$barisnilai['kode_desa']?></td>
                                                    <td><?=$barisnilai['nama_peserta']?></td>
                                                    <td><?=$barisnilai['peruntukan']?></td>
                                                    <td><?=$barisnilai['volume']?></td>
                                                    <td><?=$barisnilai['besar_bantuan']?></td>
                                                    <td><?=$nilaievaluasi ?></td>
                                                    <td><?=$Keterangan ?></td>
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
                        </div>
                        <!-- end Tabel Data -->

                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

<?php 
    require_once 'foot.php';
 ?>