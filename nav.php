<?php
   include 'cek.php';
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
        
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
 
       

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="jquery-3.1.0.js"></script>
        <script src="jquery.dataTables.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <script type="text/javascript" src="js/datatables.min.js"></script> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #7ca0a0; color: white;">
                <div class="navbar-header">
                    <a class="navbar-brand" href="" style="color: white;">DPMD SMART</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!--<ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>-->

                <ul class="nav navbar-right navbar-top-links">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="ubahpassword.php?id=<?=$_SESSION['id']?>"><i class="fa fa-gear fa-fw"></i> Ubah Password</sa>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                <?php
                if (isset($_GET['page'])) {
                    # code...
                    $menu=$_GET['page'];
                }
                ?>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <?php if ($_SESSION['level'] == 'admin') { ?>
                            <li>
                                <a href="index.php?page=dashboard" class=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="kelolauser.php?page=kelolauser" class="<?php if($menu == 'kelolauser'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i>  Kelola User</a>
                            </li>
                            <li>
                                <a href="riviewpermohonan.php?page=riviewpermohonan" class=""><i class="fa fa-file-o fa-fw"></i> Riview permohonan</a>
                            </li>
                            <li>
                                <a href="alternatif.php?page=dataKecamatan" class="<?php if($menu == 'dataKecamatan'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i> Data Kecamatan Desa</a>
                            </li>
                            <li>
                                <a href="kriteria.php?page=dataKriteria" class="<?php if($menu == 'dataKriteria'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i> Kriteria</a>
                            </li>
                            <li>
                                <a href="nilaikriteria.php?page=nilaikriteria" class="<?php if($menu == 'nilaikriteria'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i> Nilai Kriteria</a>
                            </li>
                            <li>
                                <a href="nilai.php?page=isinilaialternatif" class="<?php if($menu == 'isinilaialternatif'){ echo 'active'; } ?>"><i class="fa fa-edit fa-fw"></i> Nilai Alternatif</a>
                            </li>
                            <li>
                                <a href="spk.php?page=prosesspk" class="<?php if($menu == 'prosesspk'){ echo 'active'; } ?>"><i class="fa fa-cogs fa-fw"></i> Perhitungan</a>
                            </li>
                            <li>
                                <a href="tabelkeputusan.php?page=tabelkeputusan" class="<?php if($menu == 'tabelkeputusan'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i> Tabel Keputusan</a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'user') { ?>
                            <li>
                                <a href="permohonan.php?page=permohonan" class=""><i class="fa fa-file-o fa-fw"></i> permohonan</a>
                            </li>
                        <?php } ?>
                            <li>
                                <a href="hasilakhir.php?page=hasilakhir" class="<?php if($menu == 'hasilakhir'){ echo 'active'; } ?>"><i class="fa fa-cogs fa-fw"></i> Hasil Akhir</a>
                            </li>
                            <li>
                                <a href="laporanpenilaian.php?page=laporanpenilaian" class="<?php if($menu == 'laporanpenilaian'){ echo 'active'; } ?>"><i class="fa fa-file-o fa-fw"></i> Laporan Penilaian</a>
                            </li>
                            
                            <!-- <li>
                                <a href="pages/tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                            </li>   -->                                                     
                        </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
