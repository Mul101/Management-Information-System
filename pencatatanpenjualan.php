<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$jual = query("SELECT * FROM penjualan ORDER BY tgl_jual DESC");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<!--https://icons.getbootstrap.com/?-->
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand" style="background-color: var(--bs-brown);">
        <!-- Navbar Brand-->
        <!--<a class="navbar-brand ps-3" href="#"></a>-->
        <img src= "img/CafeLogo.png"  style="width: 100px;">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-0 order-lg-0 me-4 me-lg-2" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: white"></i></button>
        <!--<h4 style="color: var(--bs-white);">SISTEM INFORMASI MANAJEMEN</h4>-->
        <!-- Navbar-->
        <ul class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle fa-2x" style="color: #EDDBC7;"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
            </li>
        </ul>
    </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion" style="background-color: var(--bs-brown)">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="home.php" style="color: white">
                                <div class="sb-nav-link-icon col-lg-2"><i class="fas fa-tachometer-alt fa-lg"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" style="color: white" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon col-lg-2"><i class="bi bi-cart3 fa-lg"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="transaksipembelian.php" style="color: white">Pembelian</a>
                                    <a class="nav-link" href="transaksipenjualan.php" style="color: white">Penjualan</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" style="color: white" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon col-lg-2"><i class="bi bi-journal-check fa-lg"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="pencatatanpembelian.php" style="color: white">Pembelian</a>
                                    <a class="nav-link" href="pencatatanpenjualan.php" style="color: white">Penjualan</a>
                                </nav>
                            </div>
                             <!-- Divider -->
                             <hr class="sidebar-divider">
                             <a class="nav-link" href="setting.php" style="color: white">
                                <div class="sb-nav-link-icon col-lg-2"><i class="bi bi-gear-fill fa-lg"></i></div>
                                Setting
                            </a>
                    </div> 
                </nav>
            </div>
            <div id="layoutSidenav_content" style="margin-top:10px">
                <main>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <h3 align = "center">Laporan Penjualan</h3>
                            <tr bgcolor= #c78d69>
                                <th style ="color: #ffffff">No.</th>
                                <th style ="color: #ffffff">Tanggal Transaksi</th>
                                <th style ="color: #ffffff">Nama Jenis</th>
                                <th style ="color: #ffffff">Jumlah Penjualan</th>
                                <th style ="color: #ffffff">Harga Jual</th>
                                <th style ="color: #ffffff">Total Harga</th>
                                <th style ="color: #ffffff" >Aksi</th>
                                <th style ="color: #ffffff" >Aksi</th>
                            </tr>

                            <?php $i = 1; ?>
                            <?php foreach($jual as $row) : ?>
                            <tr>
                                <td align = "center"><?= $i; ?></td>
                                <td align = "center"><?= $row["tgl_jual"]; ?></td>
                                <td align = "center"><?= $row["nama_jenis"]; ?></td>
                                <td align = "center"><?= $row["jml_penjualan"]; ?></td>
                                <td align = "center"><?= $row["hrg_jual"]; ?></td>
                                <?php
                                    $total = $row["jml_penjualan"]*$row["hrg_jual"];
                                    ?>
                                    <td align = "center"><?=$total; ?></td>
                                <?php 
                                ?>
                                <td >
                                    <a class="btn btn-sm btn-success"  href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> 
                                    
                                </td>
                                <td>
                                <a class="btn btn-sm btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                                    return confirm ('Apakah anda yakin untuk menghapus data ini?');"
                                    >Hapus</a>
                            </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </table>
                </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-muted">UII Informatika Copyright &copy; 2021 ASA</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>    
                        </div>
                    </div>
                </footer>
            </div> <!--akhir dari content-->
        </div><!--akhir dari semuanya-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/toggle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
