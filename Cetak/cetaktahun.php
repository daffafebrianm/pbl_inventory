<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/atlantis.min.css">
    <title>Data Barang Masuk</title>
</head>

<body>
    <header style="text-align:center;">
        DATA BARANG MASUK
    </header>
    <hr>
    <section>
        <form method="POST" action="">
            <label for="tahun">Select Year:</label>
            <input type="text" name="tahun" placeholder="Enter Year">
            <input type="submit" value="Generate Report">
        </form>

        <div class="table-responsive">
            <table class="" border="2" style="width:100%;">
                <thead>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah</th>
                    <th>Penerima</th>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi/koneksi.php';

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tahun'])) {
                        $tahun = $_POST['tahun'];

                        $result = $db->query("SELECT b.kode_barang, DATE_FORMAT(barang_masuk.tanngal_transaksi,'%d %M %Y') as tanggal, barang_masuk.jumlah, barang_masuk.penerima FROM barang_masuk
                            LEFT JOIN barang as b ON barang_masuk.kode_barang = b.kode_barang
                            WHERE DATE_FORMAT(barang_masuk.tanngal_transaksi, '%Y') = '$tahun'
                            ");

                        if (!$result) {
                            die("Query failed: " . mysqli_error($db));
                        }

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
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        // Remove this if you don't want the report to be printed automatically.
        window.print();
    </script>
</body>

</html> -->
