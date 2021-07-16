<?php
    include 'onek.php';
    require_once 'nav.php';
    $aksi='';
    if (isset($_GET['aksi'])) {
        # code...
        $aksi=$_GET['aksi'];
        $id=$_GET['id'];
    }
    if ($aksi == 'edit') {
        $sql1 = "SELECT * FROM penilaian WHERE id_penilaian=$id";
        $query1 = mysqli_query($dbcon,$sql1);
        $nilai=mysqli_fetch_array($query1);
        // var_dump($query1);
        // var_dump($id);
        // var_dump($aksi);
        // echo $id;
        // die();
    }
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Alternatif penilaian</h1>
                            <a href="kriteria.php">Isi Data Penilaian</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="">
                                <div class="form-group">

                                    <input required type="text" name="kode_desa" class="form-control" placeholder="kode desa" value="<?php if($aksi == 'edit'){ echo $nilai['kode_desa']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nama_peserta" class="form-control" placeholder="nama peserta" value="<?php if($aksi == 'edit'){ echo $nilai['nama_peserta']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="besar_bantuan" class="form-control" placeholder="besar bantuan" value="<?php if($aksi == 'edit'){ echo $nilai['besar_bantuan']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="peruntukan" class="form-control" placeholder="peruntukan" value="<?php if($aksi == 'edit'){ echo $nilai['peruntukan']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="volume" class="form-control" placeholder="volume" value="<?php if($aksi == 'edit'){ echo $nilai['volume']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="proposal" class="form-control" placeholder="nilai proposal" value="<?php if($aksi == 'edit'){ echo $nilai['proposal']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="presentasi" class="form-control" placeholder="nilai presentasi" value="<?php if($aksi == 'edit'){ echo $nilai['presentasi']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="phm_kerangka" class="form-control" placeholder="pemahaman kerangka dan acuan kerja" value="<?php if($aksi == 'edit'){ echo $nilai['phm_kerangka']; } ?>">
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="tenaga_kerja" class="form-control" placeholder="tenaga kerja" value="<?php if($aksi == 'edit'){ echo $nilai['tenaga_kerja']; } ?>">
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="harga" class="form-control" placeholder="harga" value="<?php if($aksi == 'edit'){ echo $nilai['harga']; } ?>">    
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="tanggung_jawab" class="form-control" placeholder="tanggung jawab" value="<?php if($aksi == 'edit'){ echo $nilai['tanggung_jawab']; } ?>">
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="bank_desa" class="form-control" placeholder="bank desa" value="<?php if($aksi == 'edit'){ echo $nilai['bank_desa']; } ?>">
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="pengalaman" class="form-control" placeholder="pengalaman" value="<?php if($aksi == 'edit'){ echo $nilai['pengalaman']; } ?>">
                                </div>  
                                <div class="form-group">
                                    <input required type="text" name="apresiasi_inovasi" class="form-control" placeholder="apresiasi inovasi" value="<?php if($aksi == 'edit'){ echo $nilai['apresiasi_inovasi']; } ?>">
                                </div>
                                <?php
                                if ($aksi == 'edit') {
                                ?>  
                                <div class="form-group"> 
                                    <input type="submit" name="edit" class=" btn btn-primary form-control" value="edit" placeholder="edit">
                                </div>
                                <?php }else{ ?>
                                <div class="form-group"> 
                                    <input type="submit" name="submit" class=" btn btn-primary form-control" value="simpan" placeholder="simpan">
                                </div>
                                <?php } ?>
                            </form>

                            <?php
                                if (isset($_POST['submit'])) {
                                    $kode_desa = $_POST['kode_desa'];
                                    $nama_peserta = $_POST['nama_peserta'];
                                    $besar_bantuan = $_POST['besar_bantuan'];
                                    $peruntukan = $_POST['peruntukan'];
                                    $volume = $_POST['volume'];
                                    $proposal= $_POST['proposal'];
                                    $presentasi= $_POST['presentasi'];
                                    $phm_kerangka = $_POST['phm_kerangka'];
                                    $tenaga_kerja = $_POST['tenaga_kerja'];
                                    $harga = $_POST['harga'];
                                    $tanggung_jawab = $_POST['tanggung_jawab'];
                                    $bank_desa = $_POST['bank_desa'];
                                    $pengalaman = $_POST['pengalaman'];
                                    $apresiasi_inovasi = $_POST['apresiasi_inovasi'];
                                    // var_dump($kode_pengajuan);
                                    // die;
                                  
                                             $sql = "INSERT INTO penilaian (id_penilaian,kode_desa,nama_peserta,besar_bantuan,peruntukan,volume,proposal,presentasi,phm_kerangka,tenaga_kerja,harga,tanggung_jawab,bank_desa,pengalaman,apresiasi_inovasi)VALUES ('','$kode_desa','$nama_peserta','$besar_bantuan','$peruntukan','$volume','$proposal','$presentasi','$phm_kerangka','$tenaga_kerja','$harga','$tanggung_jawab','$bank_desa','$pengalaman','$apresiasi_inovasi')";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query) {
                                                echo "<script>alert('berhasil memasukkan data penilaian')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }
                            ?>

                            <?php
                                if (isset($_POST['edit'])) {
                                    $kode_desa = $_POST['kode_desa'];
                                    $nama_peserta = $_POST['nama_peserta'];
                                    $besar_bantuan = $_POST['besar_bantuan'];
                                    $peruntukan = $_POST['peruntukan'];
                                    $volume = $_POST['volume'];
                                    $proposal= $_POST['proposal'];
                                    $presentasi= $_POST['presentasi'];
                                    $phm_kerangka = $_POST['phm_kerangka'];
                                    $tenaga_kerja = $_POST['tenaga_kerja'];
                                    $harga = $_POST['harga'];
                                    $tanggung_jawab = $_POST['tanggung_jawab'];
                                    $bank_desa = $_POST['bank_desa'];
                                    $pengalaman = $_POST['pengalaman'];
                                    $apresiasi_inovasi = $_POST['apresiasi_inovasi'];
                                    // var_dump($kode_pengajuan);
                                    // die;
                                  
                                             $sql ="UPDATE penilaian SET kode_desa='$kode_desa',nama_peserta='$nama_peserta', besar_bantuan='$besar_bantuan', peruntukan='$peruntukan', volume='$volume', proposal='$proposal', presentasi='$presentasi', phm_kerangka='$phm_kerangka', tenaga_kerja='$tenaga_kerja', harga='$harga', tanggung_jawab='$tanggung_jawab', bank_desa='$bank_desa', pengalaman='$pengalaman',apresiasi_inovasi='$apresiasi_inovasi' WHERE id_penilaian='$id'";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query == true) {
                                                echo "<script>alert('berhasil memasukkan data penilaian')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }
                                        // var_dump($query);
                            ?>
                        </div>


                         <!-- Menampilkan Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Alternatif
                                </div>
                                <div class="panel-body">
                                    <div class="">
                                        <table id="tabel-data-x" class="table table-striped table-bordered table-hover" width="60%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>kode desa</th>
                                                    <th>Nama Peserta</th>
                                                    <th>Besar Bantuan</th>
                                                    <th>peruntukan</th>
                                                    <th>volume</th>
                                                    <th>Proposal</th>
                                                    <th>Presentasi</th>
                                                    <th>Pemahaman Kerangka</th>
                                                    <th>Tenaga Kerja</th>
                                                    <th>Harga</th>
                                                    <th>Tanggung Jawab</th>
                                                    <th>Bank Desa</th>
                                                    <th>Pengalaman</th>
                                                    <th>Apresiasi Inovasi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM penilaian";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;



                                                   while ($nilai1=mysqli_fetch_array($query)) {
                                                        
                                                ?>
                                                        <tr>
                                                        <td><?=$n?></td>
                                                        <td><?=$nilai1['kode_desa']?></td>
                                                        <td><?=$nilai1['nama_peserta']?></td>
                                                        <td><?=$nilai1['besar_bantuan']?></td>
                                                        <td><?=$nilai1['peruntukan']?></td>
                                                        <td><?=$nilai1['volume']?></td>
                                                        <td class="text-right"><?=$nilai1['proposal']?></td>
                                                        <td class="text-right"><?=$nilai1['presentasi']?></td>
                                                        <td class="text-right"><?=$nilai1['phm_kerangka']?>
                                                                
                                                            </td>
                                                        <td class="text-right"><?=$nilai1['tenaga_kerja']?></td>
                                                         <td class="text-right"><?=$nilai1['harga']?></td>
                                                           
                                                        <td class="text-right"><?=$nilai1['tanggung_jawab']?></td>
                                                        <td class="text-right"><?=$nilai1['bank_desa']?></td>
                                                        <td class="text-right"><?=$nilai1['pengalaman']?></td>
                                                         <td class="text-right"><?=$nilai1['apresiasi_inovasi']?></td>
                                                        <td>
                                                                <a href="aksi/hapusna.php?name=<?=$nilai1['id_penilaian'];?>" class="btn btn-sm btn-danger">hapus</a> | <a href="nilai.php?id=<?=$nilai1['id_penilaian'];?>&aksi=edit" class="btn btn-sm btn-primary">edit</a></td>
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