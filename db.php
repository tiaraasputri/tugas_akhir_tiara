<?php
session_start();

if(!isset($_SESSION['Username'])){
    header("Location: login.php");
    exit();
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
            
            <h2 align="center" style="margin-top:20px"> <strong>Pengumuman Penting </strong></h2>
            <div class="card" style="margin-top:20px">
                <div class="card-body">
                        <h5>Jadwal Pengisian KRS</h5>
                        <p>Kepada seluruh mahasiswa,</p>
                        <p>Kami informasikan bahwa periode pengisian Kartu Rencana Studi 
                            (KRS) untuk semester ini akan dibuka mulai tanggal 1 November 
                            2024 hingga tanggal 15 November 2024. Harap diperhatikan bahwa 
                            proses ini tidak dapat diulang setelah pengesahan.</p>
                        <p><strong>Tata Cara Pengisian KRS:</strong></p>
                        <ol class="number">
                            <li > <strong>Pembayaran UKT</strong></li>
                            <ul class="disc">
                                <li>Pastikan Anda telah melakukan pembayaran Uang Kuliah Tunggal (UKT) 
                                    sesuai dengan ketentuan yang berlaku.</li>
                            </ul>
                            <li ><strong>Isi Data Diri</strong></li>
                            <ul>
                                <li>Login ke dashboard akademik Anda dan lengkapi data diri yang diperlukan. 
                                    Pastikan semua informasi akurat dan terbaru.</li>
                            </ul>
                            <li ><strong>Pilih Dosen dan Mata Kuliah</strong></li>
                            <ul>
                                <li>Setelah data diri lengkap, silahkan buka laman pengisian KRS. Langkah awal pilihlah dosen sesuai keinginan. 
                                    Lalu klik "Pilih Mata Kuliah".</li>
                            </ul>
                            <li > <strong>Cara Menyimpan KRS dan memilih lebih dari 1 Dosen</strong></li>
                            <ul>
                                <li>
                                Silahkan memilih mata kuliah dengan klik check box di sebelah kanan (dapat dipilih multiple), 
                                kemudian klik simpan. Anda dapat memilih kembali dosen yang baru serta mata kuliah yang baru setelah klik simpan 
                                pada dosen yang pertama.
                                </li>
                            </ul>
                            <li > <strong>Kirim KRS</strong></li>
                            <ul>
                                <li>
                                Ketika anda sudah selesai memilih mata kuliah, silahkan klik "KIRIM".
                                </li>
                            </ul>
                        </ol> 

                        <p><strong>Penting:</strong> <br/>
                        Pastikan Anda menyelesaikan semua langkah dengan benar, karena proses 
                        <strong>pengisahan KRS tidak dapat diedit ataupun dihapus. Pengisian KRS hanya dapat dilakukan satu kali.</strong> Jika ada pertanyaan, silakan hubungi 
                        pihak akademik.</p>
                        <p>Terima kasih atas perhatian anda.</p>
                        <p>Salam,</p>
                        <p>[Departemen Akademik]</p>
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