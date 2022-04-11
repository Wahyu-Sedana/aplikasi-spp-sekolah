<?php

if (!isset($_SESSION['login'])) {
    header('location: ../../../index.php');
}

if (isset($_GET['logout'])) {
    Login::logOut();
    header('location: ../../../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | <?php echo $_SESSION['username']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../vendor/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../vendor/datatables/dataTables.bootstrap4.min.css">

</head>

<body id="page-top" class="d-flex flex-column min-vh-100">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-money-bill"></i>
                </div>
                <div class="sidebar-brand-text mx-2">APLIKASI SPP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Aksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($_SESSION['level'] == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Data Pengguna</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Akun Petugas</h6>
                        <a class="collapse-item" href="../petugas/data-petugas.php">Petugas</a>
                        <h6 class="collapse-header">Akun Siswa</h6>
                        <a class="collapse-item" href="../siswa/data-siswa.php">Siswa</a>
                        <h6 class="collapse-header">Data Kelas</h6>
                        <a class="collapse-item" href="../kelas/data-kelas.php">Kelas</a>
                        <h6 class="collapse-header">Data SPP</h6>
                        <a class="collapse-item" href="../spp/data-spp.php">SPP</a>
                    </div>
                </div>
            </li>
            <?php endif;?>

            <!-- Nav Item - Charts -->
            <?php if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') : ?>
            <li class="nav-item">
                <a class="nav-link" href="../transaksi/transaksi.php">
                    <i class="fas fa-fw fa-money-bill-alt"></i>
                    <span>Transaksi</span></a>
            </li>
            <?php endif; ?>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../transaksi/history-transaksi.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>History Transaksi</span></a>
                </li>

            <?php if($_SESSION['level'] == 'admin') : ?>
                <li class="nav-item">
                <a class="nav-link" href="../transaksi/generate-laporan.php">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Generate Laporan</span></a>
                </li>
            <?php endif;?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->