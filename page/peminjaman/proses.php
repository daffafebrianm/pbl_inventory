<?php
if (isset($_POST['tambah'])) {
    // $id = $_POST['id'];
    // $id_user = $_POST['id_user'];
    $kode_barang = $_POST['kode_barang'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];

    $query = "INSERT INTO pinjam_barang ( id_user, kode_barang, tanggal_pinjam, tanggal_kembali, jumlah_pinjam,status) 
              VALUES ( '$_SESSION[id]', '$kode_barang', '$tanggal_pinjam', '$tanggal_kembali', '$jumlah_pinjam','Dipinjam')";
    
    
    if ($db->query($query) ) {
        
        $data = $db->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        foreach($data as $item){
            $stok = $item['stok'] - $jumlah_pinjam;
            $db->query("UPDATE barang SET
                    stok = '$stok'
                    WHERE kode_barang = '$kode_barang'
            ");
        }
        
        echo "<script>window.location.href='index.php?p=jpinjam'</script>";
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $kode_barang = $_POST['kode_barang'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];

    $query = "UPDATE pinjam_barang SET 
                -- id = '$id',
                -- id_user = '$id_user', 
                tanggal_pinjam = '$tanggal_pinjam',
                tanggal_kembali = '$tanggal_kembali',
                jumlah_pinjam = '$jumlah_pinjam'
              WHERE kode_barang = '$kode_barang'";

    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=jpinjam'</script>";
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}
?>
