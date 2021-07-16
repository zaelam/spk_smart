<?php  
    session_start();
    include 'onek.php'; 

    if (isset($_GET['id'])) {
        if ($_GET['id']=='false') {
            echo "<script>alert('username / password salah. Gagal masuk.')</script>";
            header("location:login.php");
        }else if ($_GET['id']=='out') {
            echo "<script>alert('Anda belum masuk, silahkan maasuk.')</script>";
            header("location:login.php");
        }else{
            echo "<script>alert('Logout berhasil.')</script>";
            header("location:login.php");
        }
    }


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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading justify-content-center" style="background-color: #fdfdfd;">
                            <h2 class="panel-title text-center">Silahkan Anda Login Terlebih Dahulu</h2>
                            <img class="" style="margin: 20px 75px;" width="180px" height="200px" src="css/dpmd.png"><br>
                        </div>
                        <div class="panel-body">

                            <form role="form" action="" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Masuk" >
                                     
                                </fieldset>
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];

                                    $sqllogin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                                    $querylogin = mysqli_query($dbcon,$sqllogin);
                                    $selectdata = mysqli_fetch_assoc($querylogin);

                                    if (mysqli_num_rows($querylogin) > 0 ) {
                                        $_SESSION['username'] = $username;
                                        $_SESSION['id'] = $selectdata['id_admin'];
                                         $_SESSION['level'] = 'admin';
                                        $_SESSION['stat'] = 'masuk';
                                        echo "<script>alert('berhasil masuk selamat datang $username ')</script>";
                                        echo ($_SESSION['stat']);
                                        header("location:index.php?page=dashboard");
                                    }else{
                                        echo "<script>alert('Silahkan Masukan Username dan Password Anda')</script>";
                                        
                                    }
                                }
                                
                            ?>
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
