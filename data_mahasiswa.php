<?php
require 'connection.php';
session_start();

$data_diri= myquery("SELECT * FROM tb_mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="./asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./db.css">
    <link rel="stylesheet" href="./asset/fontawesome/css/all.min.css" />
</head>

<body>
    <div class="container-all">
    <!-- Open Side Bar-->
    <div class="sidebar">
            <div class="sidebar-main">
                <div class="sidebar">
                    <header>Akademik</header>
                    <ul class="sidebar-list">
                        <li class="sidebar-item">
                            <a href="./db.php">
                                <i class="fa-solid fa-house"></i> Home</a>
                        </li>
                         <li class="sidebar-item">
                            <a href="./datadiri.php"><i class="fa-solid fa-user"></i> Data Diri</a>
                        </li>
                        <li class="sidebar-item"><a href="data_mahasiswa.php"><i class="fa-solid fa-user"></i> Data
                                Mahasiswa</a></li>
                        <li class="sidebar-item"><a href="isi_krs.php"><i class="fa-solid fa-bars-progress"></i>
                                Pengisian KRS</a></li>
                        <li class="sidebar-item"><a href="logout.php"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <!-- End Side Bar-->

    <!-- Open Content-->
        <div class="main-content">
        <h2 align="center" style="margin-top:20px">Data Mahasiswa</h2>
            <div class="card" style="margin-top:20px">
                <div class="card-body">
                    <div class="col-sm-12">
                    <a href="datadiri.php">Tambah Data Diri Mahasiswa</a>

                    <table class="table table-borderes table-striped">
                        <thead align="center">
                            <tr>
                                <th scope="col">Aksi</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Golongan Darah</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Semester</th>
                                <th scope="col">No Kontak Referensi</th>
                                <th scope="col">Hubungan dengan Kontak</th>
                                <th scope="col">Nama Kontak Referensi</th>
                        </thead>

                        <tbody>
                            <?php foreach($data_diri as $row): ?>
                                
                            <tr align="center">
                                <td scope="row">
                                    <a href="datadiri_update.php?id=<?= $row['id_mahasiswa_isi_data'] ?>&nim=<?= $row['NIM'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="lihat_krs.php?id=<?= $row['id_mahasiswa_isi_data'] ?>&nim=<?= $row['NIM'] ?>" class="btn btn-info">Lihat KRS</a>
                                    <?php
                                    if($_SESSION['rules']=='admin'){
                                        ?>
                                            <a href="function.php?action=delete&id=<?= $row['id_mahasiswa_isi_data'] ?>&nim=<?= $row['NIM'] ?>" class="btn btn-outline-danger" onClick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>    
                                        <?php
                                     }
                                    ?> 
                                </td>
                                <td><?= $row['NIM']?></td>
                                <td><?= $row['nama']?></td>
                                <td><?= $row['jenis_kelamin']?></td>
                                <td><?= $row['no_telpon']?></td>
                                <td><?= $row['tempat_lahir']?></td>
                                <td><?= $row['tanggal_lahir']?></td>
                                <td><?= $row['alamat']?></td>
                                <td><?= $row['golongan_darah']?></td>
                                <td><?= $row['agama']?></td>
                                <td><?= $row['semester']?></td>
                                <td><?= $row['no_kontak_referensi']?></td>
                                <td><?= $row['hubungan_dengan_kontak']?></td>
                                <td><?= $row['nama_kontak']?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>