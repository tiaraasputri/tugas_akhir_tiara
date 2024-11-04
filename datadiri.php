<?php
require 'connection.php';
session_start();

$data_diri = myquery("SELECT * FROM tb_mahasiswa");
// var_dump($data_diri);

if(isset($_POST['submit_insert_data_diri'])){ 
    // var_dump($_POST);
    $NIM = $_POST['txt_nim'];
    $nama = $_POST['txt_nama_mahasiswa'];
    $jenis_kelamin = $_POST['txt_jenkel'];
    $no_telpon = $_POST['txt_no_telpon'];
    $tempat_lahir = $_POST['txt_tempat_lahir'];
    $tanggal = $_POST['txt_tanggal_lahir'];
    $alamat = $_POST['txt_alamat'];
    $golongan_darah = $_POST['txt_goldar'];
    $agama = $_POST['txt_agama'];
    $semester = $_POST['txt_semester'];
    $no_kontak_referensi = $_POST['txt_kontak_refrensi'];
    $hubungan_dengan_kontak = $_POST['txt_hubungan_dengan_kontak'];
    $nama_kontak = $_POST['txt_nama_refrensi'];

    $tanggal_lahir = new DateTime($tanggal);
    $formatted_tanggal = $tanggal_lahir->format('Y-m-d');

    //insert
    $query_insert = "INSERT INTO tb_mahasiswa (NIM, nama, jenis_kelamin, no_telpon, tempat_lahir, tanggal_lahir, alamat, golongan_darah, agama, semester, no_kontak_referensi, hubungan_dengan_kontak, nama_kontak) 
    VALUES ('$NIM', '$nama', '$jenis_kelamin', '$no_telpon', '$tempat_lahir', '$formatted_tanggal', '$alamat', '$golongan_darah', '$agama', '$semester', '$no_kontak_referensi', '$hubungan_dengan_kontak', '$nama_kontak')";
    
    //kalo tb_personnya tanpa definsii nanti si valuenya kosoongin aja. Kecuali kalo misalnya tb_person(nama) brau si valuenya diisi nama

    $res = mysqli_query($connection, $query_insert);

    if($res){
        header("Location: db.php");
        exit();
    }else{
        $err = "Data gagal di input";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri</title>
    <link rel="stylesheet" href="./asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./db.css">
    <link rel="stylesheet" href="./asset/fontawesome/css/all.min.css" />
</head>

<body>
    
    <div class="container-all">
    <!-- Start Sidebar-->
    <div class="sidebar">
            <div class="sidebar-main">
            <div class="sidebar">
                    <header>Akademik</header>
                    <ul class="sidebar-list">
                        <li class="sidebar-item">
                            <a href="./db.php"><i class="fa-solid fa-house"></i>Home</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./datadiri.php"><i class="fa-solid fa-user"></i> Data Diri</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./data_mahasiswa.php"><i class="fa-solid fa-user"></i> Data Mahasiswa</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./isi_krs.php"><i class="fa-solid fa-bars-progress"></i>Pengisian KRS</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./logout.php"><i class="fa-solid fa-house"></i> Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
         </div>
    <!--  End Sidebar-->

    <!-- Start Content - From Data Diri-->
        <div class="main-content">
        <h3 align="center" style="margin-top:20px">Silahkan Isi Data Diri!</h3>

            <div class="card" style="margin-top:20px">
                <div class="card-body">

                    <form method="POST"> 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label>Nama</label>
                                    <input type="text" name="txt_nama_mahasiswa" class="form-control"
                                        placeholder="Masukan Nama anda" required>
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Jenis Kelamin</label>
                                    <select name="txt_jenkel" id="jenis_kelamin">
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Pria">Pria</option>
                                    </select>
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="txt_tempat_lahir" class="form-control"
                                        placeholder="Masukan tempat lahir anda" required>
                                </div> <br />


                                <div class="col-sm-12">
                                    <label>Golongan Darah</label>
                                    <input type="text" name="txt_goldar" class="form-control"
                                        placeholder="Tulis dengan huruf kapital" required>
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Semester</label> 
                                    <input type="number" name="txt_semester" class="form-control"
                                        placeholder="Masukan semester anda" required>
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>No Kontak Referensi</label>
                                    <input type="text" name="txt_kontak_refrensi" class="form-control"
                                        placeholder="Masukan nomor kontak referensi" required>
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Nama Kontak Referensi</label>
                                    <input type="text" name="txt_nama_refrensi" class="form-control"
                                        placeholder="Masukan nama kontak referensi" required>
                                </div> <br/>

                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label>NIM</label>
                                    <input type="number" name="txt_nim" class="form-control"
                                        placeholder="Masukan NIM anda" required>
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>No Telepon (terhubung ke Whatsapp) </label>
                                    <input type="text" name="txt_no_telpon" class="form-control"
                                        placeholder="Masukan nomor telepon anda" required>
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="txt_tanggal_lahir" class="form-control" required>
                                </div><br />

                                <div class="col-sm-12">
                                    <label>Alamat</label>
                                    <input type="text" name="txt_alamat" class="form-control"
                                        placeholder="Masukan alamat anda" required>
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Agama</label>
                                    <input type="text" name="txt_agama" class="form-control"
                                    placeholder="Masukan Agama" required>
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Hubungan dengan Kontak</label>
                                    <input type="text" name="txt_hubungan_dengan_kontak" class="form-control"
                                        placeholder="Example : Ibu" required>
                                </div> <br/>

                            </div>
                        </div>
                
                        <br />
                        <button type="submit" class="btn btn-primary data-diri-submit" 
                        name="submit_insert_data_diri">Submit</button>
                    </form>

            </div>
        </div>
    </div>
    <!-- End Main Content Side Bar-->

    <!-- ini buat nutup container -->
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./asset/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>