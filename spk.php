<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
             <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row mt-3" style="margin-top: 50px;">
                        
                        <div class="col-lg-12 mt-3">
                            <div class="panel mt-3 panel-default">
                                <div class="panel-heading">
                                    perhitungan smart
                                </div>
                                <div class="panel-body">
                                    <div class="">
                                        <table id="tabel-data-x" class="table table-striped table-bordered table-hover" width="60%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode desa</th>
                                                    <th>Nama Peserta</th>
                                                    <th>Proposal</th>
                                                    <th>Presentasi</th>
                                                    <th>Pemahaman Kerangka</th>
                                                    <th>Tenaga Kerja</th>
                                                    <th>Harga</th> 
                                                    <th>Tanggung Jawab</th>
                                                    <th>Bank Desa</th> 
                                                    <th>Pengalaman</th>
                                                    <th>Apresiasi Inovasi</th>
                                                    <th>Nilai Akhir</th>
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
                                    $sqlnilai = "SELECT * FROM penilaian";
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

                                        <td><?=$n?></td>
                                        <td><?=$barisnilai['kode_desa']?></td>
                                        <td class="text-right"><?=$barisnilai['nama_peserta']?></td>
                                        <td class="text-right"><?=$proposal?></td>
                                        <td class="text-right"><?=$presentasi?></td>
                                        <td class="text-right"><?=$phm_kerangka?></td>
                                        <td class="text-right"><?=$tenaga_kerja?></td>
                                        <td class="text-right"><?=$harga?></td>
                                        <td class="text-right"><?=$tanggung_jawab?></td>
                                        <td class="text-right"><?=$bank_desa?></td>
                                        <td class="text-right"><?=$pengalaman?></td>
                                        <td class="text-right"><?=$apresiasi_inovasi?></td>
                                        <td class="text-right"><?=$nilaievaluasi?></td>
                                   
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
        </div>
    </div>
    </div>        

                        
<?php 
    require_once 'foot.php';
 ?>