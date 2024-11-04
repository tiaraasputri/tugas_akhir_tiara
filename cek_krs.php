<?php
// Koneksi ke database
session_start();
require 'connection.php';

$data_dosen = myquery("SELECT * FROM tb_dosen");

// Menyimpan mata kuliah yang dipilih
// if (isset($_POST['submit-simpan'])) {
//     $selected_courses = $_POST['selected_courses'];

//     foreach ($selected_courses as $course_id) {
//         // Lakukan penyimpanan ke tabel atau log
//         // Misalnya: simpan ke tabel tb_krs (buat tabel ini untuk menyimpan KRS)
//         $sql = "INSERT INTO tb_krs (id_mahasiswa_isi_data_krs, unik_id_mata_kuliah_krs, nama_matkul_krs, SKS_krs) VALUES ($course_id)";
//         // $connection->query($sql);
//     }

//     // Redirect ke halaman konfirmasi
//     header("Location: db.php");
//     exit;
// }



// Mendapatkan mata kuliah sesuai dosen
$dosen = isset($_POST['select_dosen']) ? $_POST['select_dosen'] : null;
$mataKuliah = [];
// var_dump($_POST);
// var_dump($dosen);


if (isset($_POST['submit-simpan-cek'])){
    global $connection; 
    $matkul_pilihan = json_encode($_POST['selected_courses']);
    

    $sql = "UPDATE tb_mahasiswa SET krs_diambil='$matkul_pilihan' 
    WHERE = '$_SESSION[id]'";
    //$_SESSION['id']
    mysqli_query($connection, $sql);
    $cek = mysqli_affected_rows($connection);
    
    //var_dump( $cek);
    //die();

    if($cek < 0 ){
        echo "<script> alert('Mata Kuliah Telah Dipilih');
        document.location.href = 'cek_krs.php';
        </script>";     
    } else {
        echo "<script>
        alert('Mata Kuliah Gagal Dipilih');
        </script>"; 
    }

    // $row = $result->mysqli_fetch_assoc();
    // $row = json_decode($row['selected_courses'], true);
}



// $datakrs_json = json_encode($matkul_pilihan['selected_courses[]']);

// $sql = "INSERT INTO "

if ($dosen) {
    $stmt = $connection->prepare("SELECT * FROM tb_mata_kuliah WHERE id_dosen_matkul = ?");
    $stmt->bind_param("i", $dosen);
    $stmt->execute();
    $result = $stmt->get_result();
    $mataKuliah = $result->fetch_all(MYSQLI_ASSOC);
}

// var_dump($mataKuliah); ['selected_courses[]']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengisian KRS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PENGISIAN KRS</h1>

        <form method="POST">

            <label for="dosen">Dosen:</label>
            <select class="from-select" name="select_dosen" required >
                <option value="">-- Pilih Dosen --</option>
                    <?php foreach($data_dosen as $option): ?>
                        <option value="<?= $option['id_dosen'] ?>">
                        <?= $option ['nama_dosen'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>

            <button type="submit" name="submit">Lihat Mata Kuliah</button>
        </form>

        <?php if ($mataKuliah): ?>
            <form method="POST">
                <table class="table table-borderes table-striped">
                    <tr>
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
                            <td><input type="checkbox" name="selected_courses[]" value="<?= $row['id_mata_kuliah'] ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <button type="submit" name="submit-simpan-cek">Simpan</button>
                <button type="submit" name="submit-kirim">Kirim</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $connection->close(); ?>
