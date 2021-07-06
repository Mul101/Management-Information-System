<?php
include 'koneksi.php';
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
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
            <div id="layoutSidenav_content" style="margin-top:50px">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                            Best Seller
                                    </div>
                                    <div class="card-body"><canvas id="pieChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <h5>Total Penjualan</h5>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php 
                                        $total_jual = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan");
                                            foreach($total_jual as $row):
                                            echo "Rp {$row["SUM(jml_penjualan*hrg_jual)"]} ";
                                            endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <h5>Total Pembelian</h5>
                                    </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                    $total_beli = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian");
                                        foreach($total_beli as $row):
                                        echo "Rp {$row["SUM(hrg_tot)"]} ";
                                        endforeach;
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                            Laporan Penjualan
                                    </div>
                                    <div class="card-body"><canvas id="jualChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                            Laporan Pembelian
                                    </div>
                                <div class="card-body"><canvas id="beliChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
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
</body>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script>
        var ctx = document.getElementById("jualChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [
                        <?php
                            $jumlah_januari = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-01-01' AND tgl_jual<='2021-01-31'");
                            foreach($jumlah_januari as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_Feb = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-02-01' AND tgl_jual<='2021-02-29'");
                            foreach($jumlah_Feb as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_mar = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-03-01' AND tgl_jual<='2021-03-31'");
                            foreach($jumlah_Feb as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_apr = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-04-01' AND tgl_jual<='2021-04-30'");
                            foreach($jumlah_apr as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_mei = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-05-01' AND tgl_jual<='2021-05-31'");
                            foreach($jumlah_mei as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_jun = mysqli_query($conn, "SELECT SUM(jml_penjualan*hrg_jual) FROM penjualan WHERE tgl_jual >='2021-06-01' AND tgl_jual<='2021-06-30'");
                            foreach($jumlah_jun as $row):
                                echo "{$row["SUM(jml_penjualan*hrg_jual)"]} ";
                            endforeach;
                            ?>
                    ],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 9
                        }
                    }],
                    yAxes: [{
                        title: {
                            text: "jt"
                        },
                        ticks: {
                            min: 0,
                            max: 4500000,
                            maxTicksLimit: 9
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        },

                    }],
                },
                legend: {
                    display: false
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("beliChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [
                        <?php
                            $jumlah_januari = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-01-01' AND tgl_beli<='2021-01-31'");
                            foreach($jumlah_januari as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_Feb = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-02-01' AND tgl_beli<='2021-02-29'");
                            foreach($jumlah_Feb as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_mar = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-03-01' AND tgl_beli<='2021-03-31'");
                            foreach($jumlah_Feb as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_apr = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-04-01' AND tgl_beli<='2021-04-30'");
                            foreach($jumlah_apr as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_mei = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-05-01' AND tgl_beli<='2021-05-31'");
                            foreach($jumlah_mei as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $jumlah_jun = mysqli_query($conn, "SELECT SUM(hrg_tot) FROM pembelian WHERE tgl_beli >='2021-06-01' AND tgl_beli<='2021-06-30'");
                            foreach($jumlah_jun as $row):
                                echo "{$row["SUM(hrg_tot)"]} ";
                            endforeach;
                            ?>
                    ],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 9
                        }
                    }],
                    yAxes: [{
                        title: {
                            text: "jt"
                        },
                        ticks: {
                            min: 0,
                            max: 3000000,
                            maxTicksLimit: 9
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        },

                    }],
                },
                legend: {
                    display: false
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("pieChart").getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Oreo Latte", "Matcha Latte", "Vanilla Latte", "Red Velvet", "Espresso", "Americano"],
                datasets: [{
                    label: "Sessions",
                    backgroundColor: [
                        'rgb(3, 136, 252)',
                        'rgb(9, 95, 171)',
                        'rgb(8, 53, 92)',
                        'rgb(83, 106, 148)',
                        'rgb(113, 155, 191)',
                        'rgb(182, 207, 252)'
                    ],
                    data: [
                        <?php
                            $oreo_lat = mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Oreo Latte'");
                            foreach($oreo_lat as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $mat_lat = mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Matcha Latte'");
                            foreach($mat_lat as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $val_lat = mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Vanilla Latte'");
                            foreach($val_lat as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $red_vel = mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Red Velvet'");
                            foreach($red_vel as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $espre = mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Espresso'");
                            foreach($espre as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>,
                            <?php
                            $ame= mysqli_query($conn, "SELECT SUM(jml_penjualan) FROM penjualan WHERE nama_jenis='Americano'");
                            foreach($ame as $row):
                                echo "{$row["SUM(jml_penjualan)"]} ";
                            endforeach;
                            ?>
                    ],
                }],
            },
           
        });
        </script>
</html>
