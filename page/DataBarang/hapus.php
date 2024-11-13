<?php
include 'koneksi/koneksi.php';

$get_id = $_GET['id'];

// Use prepared statement to avoid SQL injection
$sql = "DELETE FROM barang WHERE kode_barang = ?";

$stmt = $db->prepare($sql);
$stmt->bind_param("s", $get_id);

if ($stmt->execute()) {
    echo "<script>window.location.href='index.php?p=jbarang'</script>";
} else {
    echo "Gagal menghapus data" . $db->error;
}

$stmt->close();
$db->close();
?>
