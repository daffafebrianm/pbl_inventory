<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Pinjam Barang</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            

            <div class="card-body">

            <!-- <div class="col-sm-12"> -->
            
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
                                                <label class="form-label">Kode_Barang</label>
                                                <select id="select_2"  name="kode_barang" class="custom-select form-control" style="width: 100%">
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
                                                <!-- <input id="addName" type="text" name="kode_barang" class="form-control"
                                                    placeholder="fill name"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Tanggal Peminjaman</label>
                                            <div class="form-group form-group-default">
                                               
                                                <input id="addName" type="date" name="tanggal_pinjam"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Tanggal Pengembalian</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="date" name="tanggal_kembali"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Jumlah Pinjam</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="number" name="jumlah_pinjam"
                                                    class="form-control" placeholder="fill name">
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

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Barang</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Jumlah Pinjam</th>
                                <th>status</th>
                                
                                
                                <?php if($_SESSION['level']=='admin'){?>
                                <th style="width: 10%">Action</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             if($_SESSION['level'] == 'admin'){
                                 $result = $db->query(" Select nama,status,nama_barang,DATE_FORMAT(tanggal_pinjam,'%d-%m-%Y') as tp,DATE_FORMAT(tanggal_kembali,'%d-%m-%Y') as tk,jumlah_pinjam,pinjam_barang.id as id_pinjam,user.id as id_user from pinjam_barang 
                                 LEFT JOIN barang on pinjam_barang.kode_barang = barang.kode_barang 
                                 LEFT JOIN user on pinjam_barang.id_user = user.id 
                                 ");
                                 
                                }else{
                                    $result = $db->query(" Select nama,status,nama_barang,DATE_FORMAT(tanggal_pinjam,'%d-%m-%Y') as tp,DATE_FORMAT(tanggal_kembali,'%d-%m-%Y') as tk,jumlah_pinjam,pinjam_barang.id as id_pinjam,user.id as id_user from pinjam_barang 
                                    LEFT JOIN barang on pinjam_barang.kode_barang = barang.kode_barang 
                                    LEFT JOIN user on pinjam_barang.id_user = user.id 
                                    WHERE pinjam_barang.id_user ='$_SESSION[id]'
                                    ");
                             }
                                    $no=1;
                              while($data=mysqli_fetch_array($result)){
                                
                              
                            ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['tp']?></td>
                                <td><?=$data['tk']?></td>
                                <td style="text-align: center;"><?=$data['jumlah_pinjam']?></td>
                                <td><?=$data['status']?></td>
                                <?php if($_SESSION['level']=='admin'){?>
                                <?php 
                                    if($data['status']=='Dikembalikan'){
                                     echo '<td>SELESAI';   
                                    }else{ 
                                ?>
                                <td>
                                    <div class="form-button-action">
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                            data-target="#edit-<?= $data['id_pinjam'] ?>">
                                            <i class="fa fa-edit"></i>
                                            <!-- Tambah Data -->
                                        </button>
                                        <a href="index.php?p=barang_hapus&id=<?= $data['id_pinjam'] ?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                                <?php }?>
                                <?php }?>
                            </tr>

                            <div class="modal fade" id="edit-<?= $data['id_pinjam'] ?>" tabindex="-1" role="dialog"
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
                                            <form action='index.php?p=pinjam_proses' method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Kode Barang</label>
                                                            <select class="form-control" name="kode_barang">
                                                                <option value="">--BARANG--</option>
                                                                <?php 
                                                        $datas =  $db->query('SELECT * FROM  barang');
                                                        foreach($datas as $item) :
                                                    ?>
                                                                <option value="<?= $item['kode_barang'] ?>">
                                                                    <?=$item['nama_barang']?></option>
                                                                <?php 
                                                        endforeach;
                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Tanggal_Peminjaman</label>
                                                            <input id="addName" type="date" name="tanggal_pinjam"
                                                                class="form-control"
                                                                value="<?= $data['tanggal_pinjam'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Tanggal_Pengembalian</label>
                                                            <input id="addName" type="date" name="tanggal_kembali"
                                                                class="form-control"
                                                                value="<?= $data['tanggal_kembali'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Jumlah Pinjam</label>
                                                            <input id="addName" type="number" name="jumlah_pinjam"
                                                                class="form-control"
                                                                value="<?= $data['jumlah_pinjam'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" name="edit"
                                                        class="btn btn-primary">Add</button>
                                                   
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