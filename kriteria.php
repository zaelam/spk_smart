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
        $sql1 = "SELECT * FROM kriteria WHERE id_kriteria=$id";
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
                            <h1 class="page-header">Kriteria</h1>
                            <a href="alternatif.php">masukkan data kriteria/nilai bobot</a> atau <a href="spk.php">proses perhitungan</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" required name="kriteria" class="form-control" placeholder="KRITERIA"  value="<?php if($aksi == 'edit'){ echo $nilai['kriteria']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="bobot" class="form-control" placeholder="Nilai Bobot"  value="<?php if($aksi == 'edit'){ echo $nilai['bobot']; } ?>">
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

                            <!-- insert kriteria -->
                                <?php
                                if (isset($_POST['submit'])) {
                                    $kriteria   = $_POST['kriteria'];
                                    $bobot   = $_POST['bobot'];
                                    // var_dump($nama,$nisn,$kelamin,$kelas,$sekolah);
                                    // die;

                                    //sql insert to siswa
                                    $sql = "INSERT INTO kriteria (id_kriteria,kriteria,bobot)VALUES ('','$kriteria','$bobot')";
                                    $query = mysqli_query($dbcon,$sql);
                                    if ($query) {
                                        echo "<script>alert('berhasil memasukkan data Alternatif')</script>";
                                    }else{
                                        echo "<script>alert('Gagal Memasukkan data')</script>";

                                    }
                                    
                                }else{
                                   
                                }
                                ?>
                            <!-- end kriteria -->
                                <?php
                                if (isset($_POST['edit'])) {
                                    $kriteria   = $_POST['kriteria'];
                                    $bobot   = $_POST['bobot'];
                                    // var_dump($kode_pengajuan);
                                    // die;
                                  
                                             $sql ="UPDATE kriteria SET kriteria='$kriteria',bobot='$bobot' WHERE id_kriteria='$id'";
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
                        
                        <!-- Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Kriteria
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Nilai Bobot</th>
                                                    <th>Bobot Relatif</th>

                                                   <!--  <th>Bobot Relatif</th> -->
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
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

                                                   $sql ="SELECT * FROM kriteria";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   $i=0;
                                                   while ($barisbobot=mysqli_fetch_assoc($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$barisbobot['kriteria']?></td>
                                                    <td class="text-left"><?=$barisbobot['bobot']?></td>
                                                   <td class="text-left"><?php echo $bobot[$i]/$jumlah; ?></td> 
                                                    <td>
                                                        <a onclick="return confirm('Apakah yakin menghapus ?')" href="aksi/hapusa.php?kriteria=<?=$barisbobot['id_kriteria'];?>">hapus</a> | <a href="kriteria.php?page=dataKriteria&id=<?=$barisbobot['id_kriteria']?>&aksi=edit">edit</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $n++;
                                                    $i++;
                                                    }
                                                ?>
                                                 <tr class="inverse">
                                                    <td colspan="2">Total</td>
                                                    <td class="text-left"><?=$jumlah?></td>
                                                    <td class="text-left">1</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        <!-- <th>Normalisasi kriteria</th>
 -->
                                    </tr>
                                </thead>
                                <tbody>
                                

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