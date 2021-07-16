<?php
    include 'onek.php';
    require_once 'nav.php';
    if (isset($_GET['file'])) {
        $file=$_GET['file'];
        
    }
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
                            <h1 class="page-header">Download permohonan user</h1>
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        <!-- <embed type="application/pdf" src="upload/Cibinongcibinong.pdf" width="600" height="400"></embed> -->
                        <embed type="application/pdf" src="upload/<?=$file?>" width="600" height="400"></embed>
                        













                        </div>
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