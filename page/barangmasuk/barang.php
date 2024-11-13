<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Barang Masuk</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Tambah</span>
                                    <span class="fw-light">
                                        Data
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
                                <form action='index.php?p=barangMasuk_proses' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <select class="form-control" name="kode_barang">
                                                 
                                                    <option value="">--Barang--</option>
                                                    <?php 
                                                        $data =  $db->query('SELECT * FROM  barang');
                                                        foreach($data as $item) :
                                                    ?>
                                                    <option value="<?= $item['kode_barang'] ?>">
                                                        <?=$item['nama_barang']?>--<?=$item['jenis']?></option>
                                                    <?php 
                                                        endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Tanggal Transaksi</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="date" name="tanggal_transaksi"
                                                    class="form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                        <label>Jumlah</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="number" name="jumlah" class="form-control"
                                                    placeholder=>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                        <label>Penerima</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="text" name="penerima" class="form-control"
                                                    placeholder=>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div><a href="./cetak/cetakbarangmasuk.php" class="btn btn-danger mb-2">Cetak</a></div> -->
                <button class="btn btn-danger btn-sm ml-auto mb-2" data-toggle="modal" data-target="#cetak">
                        <i class="fa fa-plus"></i>
                        Cetak
                    </button>

               <!-- Modal -->
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">CETAK</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='./cetak/cetakbarangmasuk.php' method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Bulan</label>
                            <div class="form-group form-group-default">
                                <input id="addName" type="month" name="bulan" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <label>Tahun</label>
                            <div class="form-group form-group-default">
                                <input id="addYear" type="text" name="tahun" placeholder="Tahun" class="form-control">
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>id transaksi</th>
                                <th>kode Barang</th>
                                <th>tanggal transaksi</th>
                                <th>Jumlah</th>
                                <th>Penerima</th>
                                <th style="width: 5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             
                              $result = $db->query("Select *,DATE_FORMAT(barang_masuk.tanngal_transaksi,'%d-%m-%Y') as tt from barang_masuk LEFT JOIN barang as b ON barang_masuk.kode_barang=b.kode_barang");
                            $no=1;
                              while($data=mysqli_fetch_array($result)){
                                // var_dump($data)
                              
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td style="text-align: center;"><?=$data['id_transaksi']?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['tt']?></td>
                                <td style="text-align: center;"><?=$data['jumlah']?></td>
                                <td><?=$data['penerima']?></td>


                                <td>
                                    <div class="form-button-action">
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                            data-target="#edit-<?= $data['id_transaksi'] ?>">
                                            <i class="fa fa-edit"></i>
                                            <!-- Tambah Data -->
                                        </button>
                                        <a href="index.php?p=barangg_hapus&id=<?= $data['id_transaksi'] ?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-<?= $data['id_transaksi'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Edit</span>
                                                <span class="fw-light">
                                                    Data
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action='index.php?p=barangMasuk_proses' method="post">
                                            <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                            <select class="form-control" name="kode_barang">
                                                    <option value="">--Barang--</option>
                                                    <?php 
                                                        $datas =  $db->query('SELECT * FROM  barang');
                                                        foreach($datas as $item) :
                                                    ?>
                                                    <option value="<?= $item['kode_barang'] ?>">
                                                        <?= $item['nama_barang']?> </option>
                                                    <?php 
                                                        endforeach;

                                                        $tgl= $item['tanggal_transaksi'];
                                                        echo $item['tanggal_transaksi'];
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Transaksi</label>
                                                <input id="addName" type="date" name="tanggal_transaksi" class="form-control"
                                                    placeholder="fill name" value="<?= $data['tanngal_transaksi']?>" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah</label>
                                                <input id="addName" type="number" name="jumlah" class="form-control" value="<?= $data['jumlah']?>"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Penerima</label>
                                                <input id="addName" type="text" name="penerima" class="form-control"
                                                    placeholder="fill name"value="<?= $data['penerima']?>">
                                            </div>
                                        </div>
                                    </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" name="edit"
                                                        class="btn btn-primary">Add</button>
                                                   <!-- <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button> -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <?php 
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>