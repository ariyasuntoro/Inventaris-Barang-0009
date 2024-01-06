<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peminjam</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
<script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- DataTables -->
 <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- DataTables  & Plugins -->
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
<!-- Auto Numeric -->
<script src="<?= base_url('autoNumeric') ?>/src/AutoNumeric.js"></script>
<!-- Terbilang -->
<script src="<?= base_url('terbilang') ?>/terbilang.js"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
    <div class="container">
      <a href="<?= base_url('Peminjam')?>" class="nav-link <?= $submenu == 'peminjam'? 'active' : '' ?>" class="navbar-brand">
        <span class="brand-text font-weight-light"><i class=""></i><b>Transaksi Peminjaman</b></span>
      </a>
      <div class="container">
      <a href="<?= base_url('Status')?>" class="nav-link <?= $submenu == 'status'? 'active' : '' ?>" class="navbar-brand">
        <span class="brand-text font-weight-light"><i class=""></i><b>Lihat Status</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
       
        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item">
          <?php if (session()->get('level') == '1') { ?>
            <a class="nav-link" href="<?= base_url('Admin') ?>" >
            <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          <?php } else { ?>
            <a class="nav-link" href="<?= base_url('Home/Logout') ?>" >
            <i class="fas fa-sign-in-alt"></i> Logout
            </a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>