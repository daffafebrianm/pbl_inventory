<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Barang kembali</h4>
                    <!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button> -->
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
                                <form action='index.php?p=pinjam_proses' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Kode_Barang</label>
                                                <select class="form-control" name="kode_barang">
                                                    <option value="">--Barang--</option>
                                                    <?php 
                                                        $data =  $db->query('SELECT * FROM  barang');
                                                        foreach($data as $item) :
                                                    ?>
                                                        <option value="<?= $item['kode_barang'] ?>"><?=$item['nama_barang']?></option>
                                                    <?php 
                                                        endforeach;
                                                    ?>
                                                </select>
                                                <!-- <input id="addName" type="text" name="kode_barang" class="form-control"
                                                    placeholder="fill name"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Peminjaman</label>
                                                <input id="addName" type="date" name="tanggal_pinjam" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Pengembalian</label>
                                                <input id="addName" type="date" name="tanggal_kembali" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah Pinjam</label>
                                                <input id="addName" type="number" name="jumlah_pinjam"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                                <th>Nama</th>
                                <th>Barang</th>
                                <!-- <th>Tanggal Peminjaman</th> -->
                                <th>Tanggal Pengembalian</th>
                                <th>Dikembalikan</th>
                                <th>Jumlah </th>
                                <!-- <th>Status</th> -->

                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             
                            //   $result = $db->query(" Select * from pengembalian_barang as pgm_b 
                            //   LEFT JOIN pinjam_barang as pjm_b on pgm_b.id_pinjam_barang = pjm_b.id 
                            //   LEFT JOIN user on pjm_b.id_user = user.id 
                            //   LEFT JOIN barang on pjm_b.kode_barang = barang.kode_barang 
                            //   ");

                            $result = $db->query(" Select barang.kode_barang,nama,nama_barang,DATE_FORMAT(tanggal_pinjam,'%d-%m-%Y') as tp,DATE_FORMAT(dikembalikan,'%d-%m-%Y') as dk,jumlah_pinjam,status,pinjam_barang.id as id_pinjam from pinjam_barang 
                              LEFT JOIN barang on pinjam_barang.kode_barang = barang.kode_barang 
                              LEFT JOIN user on pinjam_barang.id_user = user.id 
                              ");
                                    $no=1;
                              while($data=mysqli_fetch_array($result)){
                                
                              
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['tp']?></td>
                                <td><?=$data['dk'] == null ? '-':$data['dk']; ?></td>
                                <td style="text-align: center;"><?=$data['jumlah_pinjam']?></td>
                                <!-- <td><div class="fw-bold p-1 rounded <?=$data['status'] =='Dikembalikan' ?'bg-success':'bg-warning'; ?> "> <?=$data['status']?></div></td> -->
                                <td>
                                    <?php if($data['status'] == 'Dipinjam'){ ?>
                                    <div class="form-button-action">
                                        <a href="index.php?p=kembalikan&id=<?= $data['id_pinjam'] ?>&kd=<?=$data['kode_barang']?>"
                                            data-toggle="tooltip" title="" class="btn btn-sm btn-success fw-bold">
                                            Kembalikan
                                        </a>
                                    </div>
                                    <?php }else{ ?>
                                        <div class="fw-bold"><?= 'SELESAI' ?></div>
                                        <?php }?>
                                </td>
                            </tr>

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