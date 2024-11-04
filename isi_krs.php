<?php
include'connection.php';
session_start();

// Query untuk mengambil status_kirim
if ($_SESSION['rules'] == 'admin') {
    $res_status = mysqli_query($connection, "SELECT krs FROM tb_mahasiswa WHERE NIM = '$_GET[nim]'");
} else {
    $res_status = mysqli_query($connection, "SELECT krs FROM tb_mahasiswa WHERE NIM = '$_SESSION[Username]'");
}

$status_data = mysqli_fetch_assoc($res_status);
$data_dosen = [];
$status_kirim = isset($status_data['status_kirim']) ? $status_data['status_kirim'] : 0;


// Mengambil data dosen dengan `mysqli_query`
$data_dosen = [];
$query_dosen = mysqli_query($connection, "SELECT * FROM tb_dosen");
while ($row = mysqli_fetch_assoc($query_dosen)) {
    $data_dosen[] = $row;
}

// Mendapatkan mata kuliah sesuai dosen
$dosen = isset($_POST['select_dosen']) ? $_POST['select_dosen'] : null;
$mataKuliah = [];

// Mengecek apakah dosen dipilih dan mata kuliah ada
if (isset($_POST['submit']) && $dosen) {
    $stmt = $connection->prepare("SELECT * FROM tb_mata_kuliah WHERE id_dosen_matkul = ?");
    $stmt->bind_param("i", $dosen);
    $stmt->execute();
    $result = $stmt->get_result();
    $mataKuliah = $result->fetch_all(MYSQLI_ASSOC);
}


if (isset($_POST['submit-simpan'])){
    global $connection; 
    $matkul_pilihan = isset($_POST['selected_courses']) ? $_POST['selected_courses'] : [];

    $res = mysqli_query($connection, "SELECT krs FROM tb_mahasiswa WHERE NIM = $_SESSION[Username]");
    $result = mysqli_fetch_assoc($res);
    $res_decoded = isset($result['krs']) ? json_decode($result['krs'], true) : [];
    $merged_array = array_merge($res_decoded, $matkul_pilihan);

    $new_input_krs = json_encode($merged_array);
    $sql = "UPDATE tb_mahasiswa SET krs='$new_input_krs' WHERE NIM = '$_SESSION[Username]'";
    mysqli_query($connection, $sql);
    $cek = mysqli_affected_rows($connection);

    if ($cek > 0) {
        echo "<script> alert('Mata Kuliah Telah Dipilih'); document.location.href = 'isi_krs.php'; </script>";
    } else {
        echo "<script>alert('Mata Kuliah Gagal Dipilih');</script>";
    }
}

//Mengirim KRS
// Mengirim KRS
if (isset($_POST['submit-kirim'])) {
    $sql_kirim = "UPDATE tb_mahasiswa SET status_kirim = 1 WHERE NIM = '$_SESSION[Username]'";
    mysqli_query($connection, $sql_kirim);
    $cek_kirim = mysqli_affected_rows($connection);

    if ($cek_kirim > 0) {
        echo "<script> alert('Apakah Anda Yakin Akan Kirim KRS?'); document.location.href = 'isi_krs.php'; </script>";
    } else {
        echo "<script>alert('Mata Kuliah Gagal Dikirim');</script>";
    }
}



// var_dump($mataKuliah);
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

        <div class="main-content">
        <h2 align="center" style="margin-top:20px">Pemilihan Mata Kuliah</h2>
            <div class="card">
                <div class="card-body">
                <h4>Silahkan untuk memilih dosen dan mata kuliah</h4>
                <p>Tentukan dosen terlebih dahulu</p>

                <form method="POST">
                <div class="row">
                        <div class="col-sm-12">
                        <label for="dosen">Dosen:</label>
                            <select class="from-select" name="select_dosen" required <?= ($status_kirim == 1) ? 'disabled' : '' ?>>
                                <option value="">-- Pilih Dosen --</option>
                                    <?php foreach($data_dosen as $option): ?>
                                        <option value="<?= $option['id_dosen'] ?>">
                                        <?= $option ['nama_dosen'] ?>
                                        </option>
                                    <?php endforeach; ?>
                            </select>
                            <button type="submit" name="submit" <?= ($status_kirim == 1) ? 'disabled' : '' ?>>Lihat Mata Kuliah</button>
                        </div>
                    </div>
                </form>

                <?php if ($mataKuliah): ?>
                    <form method="POST">
                        <table class="table table-borderes table-striped">
                            <tr align="center">
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Action</th>
                            </tr>
                        <?php foreach ($mataKuliah as $row): ?>
                            <tr align="center">
                                <td><?= htmlspecialchars($row['unik_id_mata_kuliah']) ?></td>
                                <td><?= htmlspecialchars($row['mata_kuliah']) ?></td>
                                <td><?= htmlspecialchars($row['SKS']) ?></td>
                                <td><input type="checkbox" name="selected_courses[]" value="<?= $row['id_mata_kuliah'] ?>" <?= ($status_kirim == 1) ? 'disabled' : '' ?>></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                        <button type="submit" name="submit-simpan" <?= ($status_kirim == 1) ? 'disabled' : '' ?>>Simpan</button>
                        <button  type="submit" name="submit-kirim" <?= ($status_kirim == 1) ? 'disabled' : '' ?>>Kirim</button>
                    </form>
                <?php endif; ?>
                </div>
            </div>
        </div>
    <!-- End Container-All -->
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>