<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Barang</h4>
                    <?php if($_SESSION['level']=='admin'){?>
                                
                                
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">

                        <i class="fa fa-plus"></i>
                        Tambah Data
                       
                    </button>
                    <?php }?>
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
                                <form action='index.php?p=barang_proses' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Nama Barang</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="text" name="nama_barang" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Kode Barang</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="text" name="kode_barang" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Merek/Type</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="text" name="jenis" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                        <label>Stok</label>
                                            <div class="form-group form-group-default">
                                                
                                                <input id="addName" type="number" name="stok" class="form-control"
                                                    placeholder="fill name">
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

                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Merek/Type</th>
                                <th>stok</th>

                                <?php if($_SESSION['level']=='admin'){?>
                                <th style="width: 10%">Action</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             
                              $result = $db->query('Select * from barang');
                            $no=1;
                              while($data=mysqli_fetch_array($result)){
                                
                              
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_barang']?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['jenis']?></td>
                                <td style="text-align: center;"><?=$data['stok']?></td>

                                <?php if($_SESSION['level']=='admin'){?>
                                <td>
                                    <div class="form-button-action">
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                            data-target="#edit-<?= $data['kode_barang'] ?>">
                                            <i class="fa fa-edit"></i>
                                            <!-- Tambah Data -->
                                        </button>
                                        <a href="index.php?p=barang_hapus&id=<?= $data['kode_barang'] ?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                                <?php }?>
                            </tr>

                            <div class="modal fade" id="edit-<?= $data['kode_barang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <form action='index.php?p=barang_proses' method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    <label>Nama Barang</label>
                                                        <div class="form-group form-group-default">
                                                            
                                                            <input id="addName" type="text" name="nama_barang"
                                                                class="form-control" value="<?= $data['nama_barang'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                    <label>Kode Barang</label>
                                                        <div class="form-group form-group-default">
                                                           
                                                            <input id="addName" type="text" name="kode_barang"
                                                                class="form-control" value="<?= $data['kode_barang'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                    <label>Merek/Type</label>
                                                        <div class="form-group form-group-default">
                                                            
                                                            <input id="addName" type="text" name="jenis"
                                                                class="form-control" value="<?= $data['jenis'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                    <label>Stok</label>
                                                        <div class="form-group form-group-default">
                                                           
                                                            <input id="addName" type="number" name="stok"
                                                                class="form-control" value="<?= $data['stok'] ?>">
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