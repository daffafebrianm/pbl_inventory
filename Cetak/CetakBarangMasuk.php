<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/atlantis.min.css">
    <title>Document</title>
</head>

<body>
    <header style="text-align:center;">
        DATA BARANG MASUK
        <div>
            Bulan: <?= isset($_POST['bulan']) ? date('F Y', strtotime($_POST['bulan'])) : ''; ?>
        </div>
    </header>

    <hr>
    <section>
        <div class="table-responsive">
            <table class="" border="2" style="width:100%;">
                <thead>
                    <th>No</th>
                    <th>kode Barang</th>
                    <th>tanggal transaksi</th>
                    <th>Jumlah</th>
                    <th>Penerima</th>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi/koneksi.php';

                    $bulan = $_POST['bulan'];
                    $result = $db->query("SELECT b.kode_barang, DATE_FORMAT(barang_masuk.tanngal_transaksi,'%d %M %Y') as tanggal, barang_masuk.jumlah, barang_masuk.penerima FROM barang_masuk LEFT JOIN barang as b ON barang_masuk.kode_barang=b.kode_barang WHERE DATE_FORMAT(barang_masuk.tanngal_transaksi,'%Y-%m') = '$bulan'");
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['kode_barang'] ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td><?= $data['penerima'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
        window.print()
    </script>
</body>

</html>
