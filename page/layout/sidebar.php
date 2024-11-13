<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
        <div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/dn.jpeg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span class="text-capitalize">
									<?= $_SESSION['username']?>
									<span class="user-level text-uppercase" style=""><?= $_SESSION['level']?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
            
            <!-- <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/c1.jpeg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            TEKNOLOGI INFORMASI
                            <span class="user-level">Politeknik Negeri Padang</span>
                            
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a  href="index.php" >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>


                
                <li class="nav-item">
                    <a   href="index.php?p=jbarang">
                        <i class="fas fa-pen-square"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a   href="index.php?p=jpinjam">
                    <i class="bi bi-arrow-up-circle-fill"></i>
                        <p>Peminjaman</p>
                        
                    </a>
                </li>
                <?php if($_SESSION['level']=='admin'){
                    ?>
                <li class="nav-item">
                    <a   href="index.php?p=jpengembalian">
                    <i class="bi bi-arrow-down-circle-fill"></i>
                        <p>Pengembalian</p>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a   href="index.php?p=barangMasuk">
                    <i class="bi bi-building-fill-add"></i>
                        <p>Barang Masuk</p>
                        
                    </a>
                </li>
                <?php 
                }
                ?>
                <li class="nav-item ">
                    <a   class="btn btn-light"  href="logout.php">
                        <i  class="bi bi-box-arrow-right" style="color:grey"></i>
                        <p style="color:grey">Log Out</p>
                        
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>