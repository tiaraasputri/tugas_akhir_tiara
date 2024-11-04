<?php
require 'connection.php';
session_start();

$id_mahasiswa = $_GET['id'];
$data_mahasiswa = myquery("SELECT * FROM tb_mahasiswa WHERE id_mahasiswa_isi_data = $id_mahasiswa");

//update
if (isset($_POST['submit_update'])){
    global $connection; 

    $id_mahasiswa = $_POST['id_mahasiswa'];
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

    // Memformat tanggal
    $tanggal_baru = new DateTime($tanggal);
    $formatted_tanggal = $tanggal_baru->format('Y-m-d');

    $query = "UPDATE tb_mahasiswa SET
        NIM = '$NIM',
        nama = '$nama',
        jenis_kelamin = '$jenis_kelamin',
        no_telpon = '$no_telpon',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$formatted_tanggal',
        alamat = '$alamat',
        golongan_darah = '$golongan_darah',
        agama = '$agama',
        semester = '$semester',
        no_kontak_referensi = '$no_kontak_referensi',
        hubungan_dengan_kontak = '$hubungan_dengan_kontak',
        nama_kontak = '$nama_kontak'
        WHERE id_mahasiswa_isi_data = '$id_mahasiswa'
    ";

    mysqli_query($connection, $query);
    $cek = mysqli_affected_rows($connection);

    if($cek > 0 ){
        echo "<script> alert('Data Berhasil diubah');
        document.location.href = 'data_mahasiswa.php';
        </script>";     
    } else {
        echo "<script>
        alert('Data Gagal Diubah');
        </script>"; 
    }
}

?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri Update</title>
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
        <h3 align="center" style="margin-top:20px">Silahkan Lakukan Perubahan Data Diri!</h3>

            <div class="card" style="margin-top:20px">
                <div class="card-body">

                    <form method="POST">
                        <input type="hidden" value="<?= $id_mahasiswa ?>" 
                        name ='id_mahasiswa'/>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label>Nama</label>
                                    <input type="text" name="txt_nama_mahasiswa" class="form-control"
                                        placeholder="Masukan Nama anda" autocomplete="off" value="<?= $data_mahasiswa[0]['nama'] ?>" required>
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
                                        placeholder="Masukan tempat lahir anda" autocomplete="off" value="<?= $data_mahasiswa[0]['tempat_lahir'] ?>">
                                </div> <br />


                                <div class="col-sm-12">
                                    <label>Golongan Darah</label>
                                    <input type="text" name="txt_goldar" class="form-control"
                                        placeholder="Tulis dengan huruf kapital" autocomplete="off" value="<?= $data_mahasiswa[0]['golongan_darah'] ?>">
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Semester</label>
                                    <input type="number" name="txt_semester" class="form-control"
                                        placeholder="Masukan semester anda" autocomplete="off" value="<?= $data_mahasiswa[0]['semester'] ?>">
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>No Kontak Referensi</label>
                                    <input type="text" name="txt_kontak_refrensi" class="form-control"
                                        placeholder="Masukan nomor kontak referensi" autocomplete="off" value="<?= $data_mahasiswa[0]['no_kontak_referensi'] ?>">
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Nama Kontak Referensi</label>
                                    <input type="text" name="txt_nama_refrensi" class="form-control"
                                        placeholder="Masukan nama kontak referensi" autocomplete="off" value="<?= $data_mahasiswa[0]['nama_kontak'] ?>">
                                </div> <br/>

                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <label>NIM</label>
                                    <input type="number" name="txt_nim" class="form-control"
                                        placeholder="Masukan NIM anda" autocomplete="off" value="<?= $data_mahasiswa[0]['NIM'] ?>">
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>No Telepon (terhubung ke Whatsapp) </label>
                                    <input type="text" name="txt_no_telpon" class="form-control"
                                        placeholder="Masukan nomor telepon anda" autocomplete="off" value="<?= $data_mahasiswa[0]['no_telpon'] ?>">
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="txt_tanggal_lahir" class="form-control"
                                    autocomplete="off" value="<?= $data_mahasiswa[0]['tanggal_lahir'] ?>">
                                </div><br />

                                <div class="col-sm-12">
                                    <label>Alamat</label>
                                    <input type="text" name="txt_alamat" class="form-control"
                                        placeholder="Masukan alamat anda" rows="3" autocomplete="off" value="<?= $data_mahasiswa[0]['alamat'] ?>">
                                </div> <br />

                                <div class="col-sm-12">
                                    <label>Agama</label>
                                    <input type="text" name="txt_agama" class="form-control"
                                    autocomplete="off" value="<?= $data_mahasiswa[0]['agama'] ?>">
                                </div> <br/>

                                <div class="col-sm-12">
                                    <label>Hubungan Dengan Kontak</label>
                                    <input type="text" name="txt_hubungan_dengan_kontak" class="form-control"
                                        placeholder="Example : Ibu" autocomplete="off" value="<?= $data_mahasiswa[0]['hubungan_dengan_kontak'] ?>">
                                </div> <br />

                            </div>
                        </div>
                
                        <div>
                        <button class="btn btn-primary data-diri-submit"
                        name="submit_update" type="submit">Simpan</button>
                        </div>
                        
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