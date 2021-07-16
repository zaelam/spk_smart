<?php
    include 'onek.php';
    require_once 'nav.php';
    // if (isset($_GET['id']=='hapus' && $_GET['name'])) {
    //  echo "dihapus.";
    // }
    $aksi='';
    if (isset($_GET['aksi'])) {
        # code...
        $aksi=$_GET['aksi'];
        $id=$_GET['id'];
    }
    if ($aksi == 'edit') {
        $sql1 = "SELECT * FROM alternatif WHERE id_alternatif=$id";
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
                            <h1 class="page-header">Data Kecamatan Desa</h1>
                            <a href="nilai.php">Masukkan Data Kecamatan/Desa</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" required name="kode" class="form-control" placeholder="Kode Desa" value="<?php if($aksi == 'edit'){ echo $nilai['kode_desa']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="nama_kec" class="form-control" placeholder="Nama Kecamatan" value="<?php if($aksi == 'edit'){ echo $nilai['nama_kecamatan']; } ?>">
                                </div>
                                 <div class="form-group">
                                    <input type="text" required name="nama_desa" class="form-control" placeholder="Nama Desa" value="<?php if($aksi == 'edit'){ echo $nilai['nama_desa']; } ?>">
                                </div>
                                
                                 <div class="form-group">
                                    <input type="text" required name="jns" class="form-control" placeholder="Jenis Kegiatan" value="<?php if($aksi == 'edit'){ echo $nilai['jenis_kegiatan']; } ?>">
                                </div>
                                 <div class="form-group">
                                    <input type="text" required name="lokasi" class="form-control" placeholder="Lokasi" value="<?php if($aksi == 'edit'){ echo $nilai['lokasi']; } ?>">
                                </div>
                                 <div class="form-group">
                                    <input type="text" required name="volume" class="form-control" placeholder="Volume" value="<?php if($aksi == 'edit'){ echo $nilai['volume']; } ?>">
                                </div>
                                    <div class="form-group">
                                    <input type="text" required name="besar_bantuan" class="form-control" placeholder="Besar Bantuan" value="<?php if($aksi == 'edit'){ echo $nilai['besar_bantuan']; } ?>">
                                </div>
                               
                                <?php
                                if ($aksi == 'edit') {
                                ?>  
                                <div class="form-group"> 
                                    <input type="submit" name="edit" class=" btn btn-primary form-control" value="edit" placeholder="edit">
                                </div>
                                <?php }else{ ?>
                                <div class="form-group"> 
                                    <input type="submit" name="simpan" class=" btn btn-primary form-control" value="simpan" placeholder="submit">
                                </div>
                                <?php } ?>
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $kode  = $_POST['kode'];
                                    $nama_kec   = $_POST['nama_kec'];
                                    $nama_desa= $_POST['nama_desa'];
                                    $jns  = $_POST['jns'];
                                    $lokasi= $_POST['lokasi'];
                                    $volume= $_POST['volume'];
                                    $besar_bantuan= $_POST['besar_bantuan'];
                                    // var_dump($nama,$nisn,$kelamin,$kelas,$sekolah);
                                    // die;

                                    //sql insert to siswa
                                    $sql = "INSERT INTO alternatif VALUES ('','$kode','$nama_kec','$nama_desa','$lokasi','$volume','$jns','$besar_bantuan')";
                                    $query = mysqli_query($dbcon,$sql);
                                    if ($query) {
                                        echo "<script>alert('berhasil memasukkan data Kecamatan Desa')</script>";
                                    }else{
                                        echo "<script>alert('Gagal Memasukkan data')</script>";

                                    }
                                    
                                }else{
                                   
                                }
                            ?>

                            <?php
                                if (isset($_POST['edit'])) {
                                    $kode  = $_POST['kode'];
                                    $nama_kec   = $_POST['nama_kec'];
                                    $nama_desa= $_POST['nama_desa'];
                                    $jns  = $_POST['jns'];
                                    $lokasi= $_POST['lokasi'];
                                    $volume= $_POST['volume'];
                                    $besar_bantuan= $_POST['besar_bantuan'];
                                    // var_dump($kode_pengajuan);
                                    // die;
                                  
                                             $sql ="UPDATE alternatif SET kode_desa='$kode',nama_kecamatan='$nama_kec', nama_desa='$nama_desa', lokasi='$lokasi', volume='$volume', jenis_kegiatan='$jns', besar_bantuan='$besar_bantuan' WHERE id_alternatif='$id'";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query == true) {
                                                echo "<script>alert('berhasil ubah data!!')</script>";
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
                                    Data Kecamatan Desa
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Desa</th>
                                                    <th>Nama Kecamatan</th>
                                                    <th>Nama Desa</th>
                                                    <th>Jenis Kegiatan</th>
                                                    <th>Lokasi</th>
                                                    <th>Volume</th>
                                                    <th>Besar Bantuan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM alternatif";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   while ($nilai=mysqli_fetch_array($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$nilai['kode_desa']?></td>
                                                    <td><?=$nilai['nama_kecamatan']?></td>
                                                    <td><?=$nilai['nama_desa']?></td>
                                                    <td><?=$nilai['jenis_kegiatan']?></td>
                                                    <td><?=$nilai['lokasi']?></td>
                                                    <td><?=$nilai['volume']?></td>
                                                    <td><?=$nilai['besar_bantuan']?></td>
                                                    <td>
                                                        <a onclick="return confirm('Apakah yakin menghapus ?')" href="aksi/hapusa.php?alternatif=<?=$nilai['id_alternatif'];?>" class="btn btn-sm btn-danger">hapus</a><br><a href="alternatif.php?page=dataKecamatan&id=<?=$nilai['id_alternatif']?>&aksi=edit" class="btn btn-sm btn-primary">edit</a>
                                                    </td>
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

 