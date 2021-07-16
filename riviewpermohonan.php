<?php
    include 'onek.php';
    require_once 'nav.php';
    // if (isset($_GET['aksi'])) {
    //     # code...
    //     $aksi=$_GET['aksi'];
    //     $id=$_GET['id'];
    // }
    // if ($aksi == 'edit') {
    //     $sql1 = "SELECT * FROM penilaian WHERE id_penilaian=$id";
    //     $query1 = mysqli_query($dbcon,$sql1);
    //     $nilai=mysqli_fetch_array($query1);
    //     // var_dump($query1);
    //     // var_dump($id);
    //     // var_dump($aksi);
    //     // echo $id;
    //     // die();
    // }
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Riview permohonan user</h1>
                        </div>

                       <!-- Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Riview Pemohon
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Desa</th>
                                                    <th>Pemohon</th>
                                                    <th>Aksi</th>
                                                  
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                               
                                                   $sql ="SELECT kode_desa, username,file_datakegiatan FROM user INNER JOIN permohonan ON id_user=id";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                //    var_dump($query);
                                                   while ($permohonan=mysqli_fetch_assoc($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$permohonan['kode_desa']?></td>
                                                    <td class="text-left"><?=$permohonan['username']?></td>
                                                    <td class="text-left"><a href="review.php?file=<?=$permohonan['file_datakegiatan']?>">download</a></td>
                                                  
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