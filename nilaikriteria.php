<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Nilai Kriteria</h1>
                        </div>

                        <div class="col-lg-8">
                            

                            <!-- insert kriteria -->
                                <?php
                                if (isset($_POST['submit'])) {
                                    $kriteria   = $_POST['kriteria'];
                                    $bobot   = $_POST['nilai'];
                                    // var_dump($nama,$nisn,$kelamin,$kelas,$sekolah);
                                    // die;

                                    //sql insert to siswa
                                    $sql = "INSERT INTO kriteria (nama_kriteria,teks nilai kriteria_nilai )VALUES ('$kriteria','$teks nilai kriteria','$nilai kriteria')";
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


                        </div>
                        
                        <!-- Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Nilai Kriteria
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Teks Nilai Kriteria</th>
                                                    <th>Nilai Utility</th>
                                                   <!--  <th>Bobot Relatif</th> -->
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                   
                                                   $sqljumlah ="SELECT SUM(bobot) FROM kriteria";
                                                   $queryjumlah= mysqli_query($dbcon,$sqljumlah);
                                                   $jumlah0=mysqli_fetch_array($queryjumlah);
                                                   $jumlah = $jumlah0[0];
                                                   


                                                   $sql ="SELECT * FROM nilai_kriteria";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   while ($barisbobot=mysqli_fetch_assoc($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$barisbobot['nama_kriteria']?></td>
                                                    <td class="text-left"><?=$barisbobot['teks_nilai_kriteria']?></td>
                                                   <td class="text-left"><?=$barisbobot['nilai_utility'] ?></td> 
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