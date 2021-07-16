<?php  
    session_start();
    include 'onek.php'; 


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sistem Penunjang Keputusan SMART</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <?php
                $id = $_GET['id'];
                

                $select_admin = "SELECT * FROM admin WHERE id_admin='$id'";
                $queryselect = mysqli_query($dbcon,$select_admin);
                $selectdata = mysqli_fetch_assoc($queryselect);

                $username = $selectdata['username'];
                $id = $selectdata['id_admin'];
                $password = $selectdata['password'];
        ?>

        <?php
            if (isset($_POST['submit'])) {
                $passwordlama = $_POST['passwordlama'];
                $passwordbaru = $_POST['passwordbaru'];
                $konfirmasipassword = $_POST['konfirmasipassword'];

                if ($password == $passwordlama ) {
                    if ($passwordbaru == $konfirmasipassword) {
                        $sql ="UPDATE admin SET password='$passwordbaru' WHERE id_admin='$id'";
                        $query = mysqli_query($dbcon,$sql);
                        if ($query) {
                            echo "<script>alert('berhasil mengubah password')</script>";
                            header("location:login.php");
                        }else{
                            echo "<script>alert('Gagal mengubah password')</script>";

                        }
                    }else{
                         echo "<script>alert('konfirmasi password salah')</script>";
                    }
                }else{
                     echo "<script>alert('password lama salah')</script>";
                }

            }
            
        ?>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading justify-content-center" style="background-color: #fdfdfd;">
                            <h2 class="panel-title text-center">Silahkan Anda Ganti Password</h2>
                            <img class="" style="margin: 20px 75px;" width="180px" height="200px" src="css/dpmd.png"><br>
                        </div>
                        <div class="panel-body">

                            <form role="form" action="" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus value="<?=$username?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password Lama" name="passwordlama" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password Baru" name="passwordbaru" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Konfirmasi Password Baru" name="konfirmasipassword" type="password" value="">
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="ubah password" >
                                     
                                </fieldset>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
