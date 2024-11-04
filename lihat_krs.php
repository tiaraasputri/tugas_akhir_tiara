<?php
include 'connection.php';
session_start();

// Ambil data KRS dari tabel tb_mahasiswa untuk mahasiswa yang sedang login
if($_SESSION['rules'] == 'admin'){
    $res_krs = mysqli_query($connection, "SELECT krs FROM tb_mahasiswa WHERE NIM = '$_GET[nim]'");
}
else{
    $res_krs = mysqli_query($connection, "SELECT krs FROM tb_mahasiswa WHERE NIM = '$_SESSION[Username]'");
}

$data_krs = mysqli_fetch_assoc($res_krs);

// Pastikan kolom krs ada dan bukan null
$krs_array = $data_krs && $data_krs['krs'] ? json_decode($data_krs['krs'], true) : [];

// Jika krs_array tidak kosong, ambil detail mata kuliah
if (!empty($krs_array)) {
    // Format ID mata kuliah menjadi string untuk query SQL
    $matkul_ids = implode(",", $krs_array);

    // Query untuk mengambil detail mata kuliah yang sesuai dengan ID yang ada di krs_array
    $query_matkul = "
        SELECT tb_mata_kuliah.unik_id_mata_kuliah, tb_mata_kuliah.mata_kuliah, tb_mata_kuliah.SKS, tb_dosen.nama_dosen 
        FROM tb_mata_kuliah
        INNER JOIN tb_dosen ON tb_mata_kuliah.id_dosen_matkul = tb_dosen.id_dosen
        WHERE tb_mata_kuliah.id_mata_kuliah IN ($matkul_ids)
    ";
   
    $result_matkul = mysqli_query($connection, $query_matkul);

    // Tambahkan pengecekan error
    if (!$result_matkul) {
        die("Query Error: " . mysqli_error($connection));
    }

    $matkul_terpilih = mysqli_fetch_all($result_matkul, MYSQLI_ASSOC);
} else {
    $matkul_terpilih = []; // Jika tidak ada KRS, array kosong
}
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

    <!-- Start Content-->
         <div class="main-content">
            
            <h2 align="center" style="margin-top:20px"> <strong>KRS </strong></h2>
            <div class="card" style="margin-top:20px">
                <div class="card-body">
                <?php if (!empty($matkul_terpilih)): ?>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matkul_terpilih as $matkul): ?>
                        <tr>
                            <td><?= htmlspecialchars($matkul['unik_id_mata_kuliah']) ?></td>
                            <td><?= htmlspecialchars($matkul['mata_kuliah']) ?></td>
                            <td><?= htmlspecialchars($matkul['SKS']) ?></td>
                            <td><?= htmlspecialchars($matkul['nama_dosen']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Belum ada mata kuliah yang dipilih.</p>
        <?php endif; ?>
                </div>
            </div>

         </div>
    <!-- End Content-->

    <!-- End Container All-->
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>