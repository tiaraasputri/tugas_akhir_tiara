<?php
session_start(); //untuk memulai sesi
require 'connection.php';

if (isset($_POST['login'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    var_dump($username);

$result = mysqli_query($connection, "SELECT * FROM tb_login_mahasiswa WHERE Username='$username'");

$cek = mysqli_num_rows($result);

if ($cek == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($password === $row['Password']) {
        $_SESSION['id'] = $row['id_mahasiswa_login'];
        $_SESSION['Username'] = $username;
        header("Location: db.php");
        exit();
    } else {
        $err = "Password Salah";
        echo $err;
    }
    } else {
    $err = "Username tidak ditemukan";
    echo $err;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./asset/fontawesome/css/all.min.css" />
</head>

<body>
    <!--Start Navbar -->
    <nav class="navbar navbar-akademik">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AKADEMIK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Log out</a>
                </ul>
            </div>
        </div>
    </nav>


    <!-- End Navbar -->

    <!-- Start Content Section -->
    <div class="content-section">
        <div class="container py-3">
            <div class="card">
                <div class="card-body">

                <form method="POST">
                <div class="mb-3 row">
                        <label for="txt_username">NIM</label>
                        <div class="col-sm-10">
                            <input type="username" class="form-control" name="Username" placeholder="201424027">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="txt_password">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="Password" placeholder="Password">
                        </div>
                    </div>

                    <div class="login" align="center">
                    <button type="submit" name="login" class="btn btn-info">Log in</button>
                    </div>
                </div>
                </form>

                </div>
            </div>
        </div>
    </div>


<!-- End Content Section -->

<!-- Footer -->
<footer class="my-footer">
      <address>&copy;2024 Akademik - Copy Right</address>
  </footer>
<!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./asset/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>