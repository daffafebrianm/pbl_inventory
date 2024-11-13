<?php
if(isset($_POST['tambah'])){
     
    $kode_barang = $_POST['kode_barang'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $jumlah = $_POST['jumlah'];
    $penerima= $_POST['penerima'];
    
  // Assuming $db is your database connection object
// Assuming $kode_barang, $tanggal_transaksi, $jumlah, $penerima are defined earlier

// Use prepared statements to avoid SQL injection
$query = "INSERT INTO barang_masuk (kode_barang, tanngal_transaksi, jumlah, penerima) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ssis", $kode_barang, $tanggal_transaksi, $jumlah, $penerima);

try {
    // Execute the INSERT query
    $stmt->execute();

    // Check if the INSERT was successful
    if ($stmt->affected_rows > 0) {
        // If successful, update the stok in the barang table
        $result = $db->query("SELECT * FROM barang WHERE kode_barang='$kode_barang'");

        if ($result && $result->num_rows > 0) {
            $item = $result->fetch_assoc();
            $hasil = $jumlah + $item['stok'];
            $db->query("UPDATE barang SET stok='$hasil' WHERE kode_barang='$kode_barang'");
        } else {
            // Handle the case where no matching row is found in the barang table
            echo "Error: No matching row found in the barang table for kode_barang '$kode_barang'";
        }
    } else {
        // Handle the case where the INSERT into barang_masuk fails
        echo "Error: Failed to insert into barang_masuk";
    }
} catch (Exception $e) {
    // Handle any exceptions that may occur during the transaction
    echo "Error: " . $e->getMessage();
}
echo "<script>window.location.href='index.php?p=barangMasuk' </script>"; //redir?p=jbarangect
$stmt->close();


}
if(isset($_POST['edit'])){

    
    $kode_barang = $_POST['kode_barang'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $jumlah = $_POST['jumlah'];
    $penerima= $_POST['penerima'];
    
   

    $query = "UPDATE  barang set 
                nama_barang ='$nama_barang',
                kode_barang ='$kode_barang', 
                stok ='$stok', 
                jenis ='$jenis'
                WHERE kode_barang='$kode_barang'";
    // var_dump($query);
    if ($db->query($query) === TRUE) {
        echo "<script>window.location.href='index.php?p=barangMasuk' </script>"; //redir?p=jbarangect
        // header("Location: index.php?p=jbarang");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

}
?>