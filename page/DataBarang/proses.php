<?php
if(isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    $jenis= $_POST['jenis'];
    
   

    $query = "INSERT INTO barang(nama_barang,kode_barang,jenis,stok) VALUES ('$nama_barang', '$kode_barang', '$jenis', '$stok')";
    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=jbarang' </script>"; //redir?p=jbarangect
        // header("Location: index.php?p=jbarang");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

}
if(isset($_POST['edit'])){

    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    $jenis= $_POST['jenis'];
    
   

    $query = "UPDATE  barang set 
                nama_barang ='$nama_barang',
                kode_barang ='$kode_barang', 
                stok ='$stok', 
                jenis ='$jenis'
                WHERE kode_barang='$kode_barang'";
    // var_dump($query);
    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=jbarang' </script>"; //redir?p=jbarangect
        // header("Location: index.php?p=jbarang");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

}
?>