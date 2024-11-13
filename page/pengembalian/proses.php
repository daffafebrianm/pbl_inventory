<?php 

$id=$_GET['id'];
$kd_barang=$_GET['kd'];

// var_dump($id);

 $now = date('y-m-d');
$query= "UPDATE pinjam_barang set 
        dikembalikan='$now', 
        status='Dikembalikan'
        WHERE id= '$id'
         ";

        //  var_dump($query);
if($db->query($query)){
    $dats = $db->query("Select * from pinjam_barang  where id='$id'");
    $jlmh_pinjam = 0 ; 
    foreach($dats as $item){
        $jlmh_pinjam =$item['jumlah_pinjam'];
    }
    // var_dump($jlmh_pinjam);
    // $db->query("UPDATE barang set status ='Hilang' where pinjam_barang = '$kd_barang' ");

    
    $stok =0;
    $data = $db->query("SELECT * FROM barang where kode_barang = '$kd_barang' ");
    foreach($data as $item){
        $stok =$item['stok'];
    }
    $hasil = $stok + $jlmh_pinjam;
    // var_dump($hasil);
    $db->query("UPDATE barang set stok ='$hasil' where kode_barang = '$kd_barang' ");
    
    echo "<script>window.location.href='index.php?p=jpengembalian'</script>";
        exit;
}




?>