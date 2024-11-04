<?php 
$hostname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_akademik';

//koneksi
$connection = mysqli_connect($hostname, $user, $password, $db_name);
//if($connection){
   // echo 'koneksi berhasil';
//}

$res = mysqli_query($connection, "SELECT * FROM tb_mahasiswa");
//var_dump($connection);

function myquery($query){
    global $connection;
    $res = mysqli_query($connection, $query);
    $returns = [];
    
    while( $data = mysqli_fetch_assoc($res)){
        $returns[] = $data;
    }
 
    return $returns;
}
?>