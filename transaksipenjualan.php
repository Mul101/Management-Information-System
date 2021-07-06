<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
if (isset($_POST["submit"])) {
    
    if(tambah($_POST)>0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'pencatatanpenjualan.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan!');
            </script>
        ";
    }
}

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
            <div id="layoutSidenav_content" style="margin-top:5px">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Input Data Penjualan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
        <form action="" method="post">
        <table>
                <div class="form-group" style="margin-top: 15px;">
                        <label for="tgl_jual">Tanggal Transaksi :</label>
                        <input type="date" name="tgl_jual" id="tgl_jual" required>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group" style="margin-top: 15px;">
                        <label for="nama_jenis">Nama Jenis :</label>
                        <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" required>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group" style="margin-top: 15px;">
                        <label for="jml_penjumlahan">Jumlah Penjualan :</label>
                        <input type="text" class="form-control" id="jml_penjumlahan" name="jml_penjualan" required>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                        <label for="hrg_jual">Harga Jual :</label>
                        <input type="text" class="form-control" id="hrg_jual" name="hrg_jual" required>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>                                         
            <tr>
                <td></td>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 20px">Save</button>
            </tr>
        </table>
    </form>
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
</body>
</html>

