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
                            <h1 class="page-header">Kelola User</h1>
                            <a href="kriteria.php">Daftar untuk user</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="">
                                <div class="form-group">

                                    <input required type="text" name="nama_kec" class="form-control" placeholder="nama kecamatan" value="<?php if($aksi == 'edit'){ echo $nilai['nama_kecamatan']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="kode_desa" class="form-control" placeholder="kode desa" value="<?php if($aksi == 'edit'){ echo $nilai['kode_desa']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="username" class="form-control" placeholder="username" value="<?php if($aksi == 'edit'){ echo $nilai['username']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="email" class="form-control" placeholder="email" value="<?php if($aksi == 'edit'){ echo $nilai['email']; } ?>">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="password" class="form-control" placeholder="password" value="<?php if($aksi == 'edit'){ echo $nilai['password']; } ?>">
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
                                    $nama_kec = $_POST['nama_kec'];
                                    $kode_desa = $_POST['kode_desa'];
                                    $username = $_POST['username'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                  
                                             $sqluser = "INSERT INTO user(id,nama_kec,kode_desa,username,email,password)
                                             VALUES ('','$nama_kec','$kode_desa','$username','$email','$password')";
                                            $query = mysqli_query($dbcon,$sqluser);
                                            // echo $sqluser;
                                            // var_dump($query);
                                            // die();
                                            if ($query) {
                                                echo "<script>alert('berhasil memasukkan data user')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }
                            ?>

                            <?php
                                if (isset($_POST['edit'])) {
                                    $nama_kec = $_POST['nama_kec'];
                                    $kode_desa = $_POST['kode_desa'];
                                    $username = $_POST['username'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                  
                                             $sql ="UPDATE user SET nama_kec='$nama_kec',kode_desa='$kode_desa', username='$username', email='$email', password='$password' WHERE id='$id'";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query == true) {
                                                echo "<script>alert('berhasil memasukkan data user')</script>";
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
                                        <table id="tabel-data-x" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kecamatan</th>
                                                    <th>Kode Desa</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                   $sql ="SELECT * FROM user";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;



                                                   while ($Datauser=mysqli_fetch_array($query)) {
                                                        
                                                ?>
                                                        <tr>
                                                        <td><?=$n?></td>
                                                        <td><?=$Datauser['nama_kec']?></td>
                                                        <td><?=$Datauser['kode_desa']?></td>
                                                        <td><?=$Datauser['username']?></td>
                                                        <td><?=$Datauser['email']?></td>
                                                        <td><?=$Datauser['password']?></td>
                                                        <td>
                                                                <a href="aksi/hapusna.php?hapus_user=<?=$Datauser['id'];?>" class="btn btn-sm btn-danger">hapus</a> | <a href="nilai.php?id=<?=$Datauser['id'];?>&aksi=edit" class="btn btn-sm btn-primary">edit</a></td>
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