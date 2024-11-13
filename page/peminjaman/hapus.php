<?php

    $get_id = $_GET['id'];

    $sql = "DELETE FROM pinjam_barang WHERE id=$get_id";

    if ($db->query($sql) == TRUE) {
        echo "<script>window.location.href='index.php?p=jpinjam'</script>";
    }else {
        echo "Gagal menghapus data".$db->error;
    }


?>