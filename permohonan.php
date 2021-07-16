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
                            <h1 class="page-header">Permohonan</h1>
                            <h2">Upload Persyaratan</h2>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">

                                    <input required type="file" name="data_kegiatan" class="form-control" placeholder="kode desa" value="<?php  ?>">
                                </div>
                                
                                <?php
                                $aksi='';
                                if ($aksi == 'edit') {
                                ?>  
                                <div class="form-group"> 
                                    <input type="submit" name="edit" class=" btn btn-primary form-control" value="edit" placeholder="edit">
                                </div>
                                <?php }else{ ?>
                                <div class="form-group"> 
                                    <input type="submit" name="submit" class=" btn btn-primary form-control" value="submit" placeholder="submit">
                                </div>
                                <?php } ?>
                            </form>

                            <?php
                                if (isset($_POST['submit'])) {

                                    //pengecekan tipe harus pdf
                                    $tipe_file = $_FILES['data_kegiatan']['type']; //mendapatkan mime type

                                     $nama_file = trim($_FILES['data_kegiatan']['name']);

                                     

                                     //dapatkan id terkahir
                                     
                                     $file_temp = $_FILES['data_kegiatan']['tmp_name']; //data temp yang di upload
                                     $folder    = "upload"; //folder tujuan
                                     // Check if file already exists
                                    //  $target_file = $folder . basename(trim($_FILES['data_kegiatan']['name']));
                                    // if (file_exists($target_file)) {
                                    //   echo "Sorry, file already exists.";
                                    // }
                                     $sql = "SELECT * FROM permohonan WHERE file_datakegiatan='$nama_file'";
                                     $jumlah=mysqli_query($dbcon,$sql);
                                     $hitung=mysqli_fetch_array($jumlah);
                                     $hasil=count($hitung);
                                     echo $hasil;
                                     
                                     if ($hasil < 1) {
                                        if (move_uploaded_file($file_temp, "$folder/$nama_file")) {
                                            # code...
                                          //fungsi upload
                                         //update nama file di database
                                         $id_user=$_SESSION['id_user'];
                                         $sql = "INSERT INTO permohonan (id_permohonan, id_user, file_datakegiatan) VALUES ('','$id_user','$nama_file')";
                                         mysqli_query($dbcon,$sql); //simpan data judul dahulu untuk mendapatkan id
                                            echo "berhasil Upload File ! <a href='permohonan.php'> Kembali </a>";
                                        }else{
                                            echo "Gagal Upload File ! <a href='permohonan.php'> Kembali </a>";
                                        }

                                     }else{
                                        echo "file sudah ada";
                                     }
                                }
                            ?>

                            <?php
                                if (isset($_POST['edit'])) {
                                    $kode_desa = $_POST['kode_desa'];
                                    $nama_peserta = $_POST['nama_peserta'];
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
                                  
                                             $sql ="UPDATE penilaian SET kode_desa='$kode_desa',nama_peserta='$nama_peserta', proposal='$proposal', presentasi='$presentasi', phm_kerangka='$phm_kerangka', tenaga_kerja='$tenaga_kerja', harga='$harga', tanggung_jawab='$tanggung_jawab', bank_desa='$bank_desa', pengalaman='$pengalaman',apresiasi_inovasi='$apresiasi_inovasi' WHERE id_penilaian='$id'";
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