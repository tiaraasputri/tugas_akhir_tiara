<?php
require 'connection.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    switch ($action) {
        case 'delete':
            delete_data($id);
            break;
        case 'edit':
            echo "";
            break;
        default:
            echo "Aksi tidak didefinisikan";
    }
} else {
    echo "Aksi dan ID tidak didefinisikan!";
}

function delete_data($id_mahasiswa){
    global $connection;
    $res = mysqli_query($connection, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa_isi_data = " . $id_mahasiswa);
echo "Data ini akan menghapus ID : " . $id_mahasiswa;

if($res){
   
    header("Location: data_mahasiswa.php?messages=Berhasil dihapus"); //lewat addres bar
    exit();
    }else{
    //jiksa salah
    header("Location: data_mahasiswa.php?messages=Gagal dihapus");
    exit();
    }
    
}   



function update($data_diri) {  }
?>
