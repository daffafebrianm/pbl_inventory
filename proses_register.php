<?php
include 'koneksi/koneksi.php';
if ($_GET['proses'] == 'insert') {
        // query insert
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $cek_user = "SELECT * FROM user WHERE username='$username'";
    $hasil_cek = $db->query($cek_user);

    if($hasil_cek->num_rows == 1){
        echo "Data gagal Disimpan! Duplicate ".$username;
    }else{

    $query = "INSERT INTO user (username, nama, password, level) VALUES ('$username', '$nama', '$password', '$level')";
    if ($db->query($query) === TRUE) {
        header("Location: login.php"); //redirect
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}  
}
}

