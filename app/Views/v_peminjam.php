
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

  <link rel="shortcut icon" href="<?= base_url('AdminLTE') ?>/dist/img/logo.png">
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
      <a href="<?= base_url('Peminjam')?>" class="navbar-brand">
        <span class="brand-text font-weight-light"><i class=""></i><b>Transaksi Peminjaman</b></span>
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
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                <div class="col-3">
                <div class="form-group">
                    <label>No Peminjam</label>
                    <label class="form-control form-control-lg text-danger"><?= $no_peminjam ?></label>
                </div>
                </div>

                <div class="col-3">
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <label class="form-control form-control-lg"><?= date('d-M-Y') ?></label>
                </div>
                </div>

                <div class="col-3">
                <div class="form-group">
                    <label>Jam</label>
                    <label class="form-control form-control-lg" id="jam"></label>
                </div>
                </div>

                <div class="col-3">
                <div class="form-group">
                    <label>Peminjam</label>
                    <label class="form-control form-control-lg text-primary"><?= session()->get('nama_user')?></label>
                </div>
                </div>
            </div>
              </div>
            </div>
          </div>

         

          <div class="col-lg-12">
          <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                    <?php echo form_open('Peminjam/InsertCart') ?>
                    <div class="row">
                        <div class="col-2 input-group">
                            <input name="kode_barang" id="kode_barang" class="form-control" onchange="get_stok_b()" 
                             placeholder="Kode Barang" autocomplete="off">
                            <span class="input-group-append">
                                <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-barang">
                                    <i class="fas fa-search"></i>
                                </a>
                                <button class="btn btn-danger btn-flat">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </div>
                        <div class="col-2">
                        <input name="nama_barang" class="form-control"  placeholder="Nama Barang" readonly>
                        </div>
                        <div class="col-1">
                        <input name="merk" class="form-control" placeholder="Merk" readonly>
                        </div>
                        <div class="col-1">
                        <input name="nama_kategori" class="form-control" placeholder="Kategori" readonly>
                        </div>
                        <div class="col-1">
                        <input name="nama_satuan" class="form-control" placeholder="Satuan" readonly>
                        </div>
                        
                        <tr><td width='50' ></td> <td style="width:7px;">
                        <input type="text" style="width: 100px;" class="form-control" name="qty" id="qty" placeholder="qty"
                        min="1" readonly />
                        </td>
                        <td>
                        <div id="get_stok">
                          <input type="number" onchange="set_jumlah()" style="width: 40px;"
                          class="form-control" name="stock" id="stock" min="1" />
                        </div></td>
                        </td></tr>
                        
                        <div class="col-3">
                            <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-plus">Add</i></button>
                            <a href="<?= base_url('Peminjam/ResetCart') ?>" type="reset" class="btn btn-flat btn-warning"><i class="fas fa-sync"></i> Reset</a>
                            <a class="btn btn-flat btn-success" data-toggle="modal" data-target="#peminjaman" onclick="Peminjaman()"><i class="fas fa-cash-register"></i> Peminjaman</a>
                        </div>
                        
                    </div>
                    <?php echo form_close() ?>
                </div>
                
                
            </div>
            <hr>
            <div class="row">
            <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>Kategori</th>
                            
                            <th width="100px">Qty</th>
                            
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($cart as $key => $value){ ?>
                            <tr>
                                <td><?= $value ['id'] ?></td>
                                <td><?= $value ['name'] ?></td>
                                <td><?= $value ['brand'] ?></td>
                                <td><?= $value ['options']['nama_kategori'] ?></td>
                                <td class="text-center"><?= $value ['qty'] ?><?= $value ['options']['nama_satuan'] ?></td>
                                <td class="text-center">
                                <a href="<?= base_url('Peminjam/RemoveItemCart/'.$value['rowid'])?>" class="btn btn-flat btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                if (session()->getFlashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> ';
                  echo session()->getFlashdata('pesan');
                  echo '</h5>
                </div>';
                }
                ?>

                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty ($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                  <h4>Periksa Lagi Entry Form</h4>
                  <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                      <li><?= esc($error) ?></li>
                      <?php } ?>
                  </ul>
                </div>
                <?php }
                ?>
                <table id='' class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
        <th>NO</th>
        <th>No Peminjam</th>
        <th>Nama Peminjam</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Tgl Pengajuan</th>
        <th>Tgl Kembali</th>
        <th>Jam Kembali</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Status Barang</th>
        <th>Ket</th>
</tr>

<?php $no = 1;
 foreach ($status as $key => $value ) {
  
     ?>
<tr class="<?= $value['keterangan'] == "3" ? 'bg-danger' : '' ?>">
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['no_peminjam'] ?></td>
    <td class="text-center"><?= $value['nama_user'] ?></td>
    <td class="text-center"><?= $value['kode_barang'] ?></td>
    <td class="text-center"><?= $value['nama'] ?></td>
    <td class="text-center"><?= $value['merk'] ?></td>
    <td class="text-center"><?= $value['tgl_pinjam'] ?></td>
    <td class="text-center"><?= $value['tgl_kembali'] ?></td>
    <td class="text-center"><?= $value['jam_kembali'] ?></td>
    <td class="text-center"><?= $value['qty'] ?></td>
    <td  class="text-center"><?php 
          if ($value['status'] == "1") {?>
            <span class="1">Acc</span>
                <?php } else if($value['status'] == "2") {?>
                 <span class="2">Tolak</span>
                   <?php } ?>
             </td>
             <td  class="text-center"><?php 
         if ($value['keterangan'] == "1") {?>
          <span class="badge bg-primary">Dipinjam</span>
              <?php } else if($value['keterangan'] == "2") {?>
               <span class="badge bg-success">Selesai</span>
               <?php } else if($value['keterangan'] == "3") {?>
               <span class="badge bg-info">Terlambat</span>
                 <?php } ?>
              </td>
             <td class="text-center"><?= $value['komentar'] ?></td>

                    <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                </div>
            </div>
            </div>
            </div>
          </div>
          
          
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.modal pencarian Barang -->
  <div class="modal fade" id="cari-barang">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pencarian Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id='example1' class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Kode/Barcode</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($barang as $key => $value) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value['kode_barang']?></td>
                      <td><?= $value['nama_barang']?></td>
                      <td><?= $value['merk']?></td>
                      <td><?= $value['stok']?></td>
                      <td><button onclick="PilihBarang(<?= $value['kode_barang']?>)" class="btn btn-success btn-xs">Pilih</button></td>
                    </tr>
                    
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      

      <!-- /.modal peminjaman -->
  <div class="modal fade" id="peminjaman">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Transaksi Peminjaman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('Peminjam/SimpanTransaksi') ?>

              <div class="form-group">
                <label for="">Catatan</label>
                <input name="catatan" class="form-control" value="<?= old('catatan') ?>" placeholder="Catatan" required>
                    </div>

                    <div class="form-group">
                <label for="">Tgl Kembali</label>
                <input type="date" name="tgl_kembali" class="form-control" value="<?= old('tgl_kembali') ?>" required>
                    </div>

                    <div class="form-group">
                <label for="">Jam Kembali</label>
                <input type="time" name="jam_kembali" class="form-control" value="<?= old('jam_kembali') ?>" required>
                    </div>


              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i>Save Transaksi</button>
            </div>
            
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div> 
        <!-- /.modal-dialog -->
      </div>
      

      <div class="col-md-12">
<canvas id="myChart" width="100%" height="35px"></canvas>
</div>


      

      



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022-2023 <a href="">e-inventaris</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script>
  $(document).ready(function() {
    $('#kode_barang').focus();
    
    $('#kode_barang').keydown (function(e) {
      let kode_barang = $('#kode_barang').val();
      if(e.keyCode == 13) {
        e.preventDefault();
        if (kode_barang == '') {
          Swal.fire('Kode Barang Belum Di input!!');
        }else{
          CekBarang();
        }
      }
    });

    

  });

  function CekBarang() {
      $.ajax({
        type: "POST",
        url: "<?= base_url('Peminjam/CekBarang') ?>",
        data: {
          kode_barang: $('#kode_barang').val(),
        },
        dataType: "JSON",
        success: function(response) {
          if (response.nama_barang == '') {
            Swal.fire('Kode Barang Tidak Terdaftar Di Database !!!');
          } else {
            $('[name="nama_barang"]').val(response.nama_barang);
            $('[name="merk"]').val(response.merk);
            $('[name="nama_kategori"]').val(response.nama_kategori);
            $('[name="nama_satuan"]').val(response.nama_satuan);
            $('#stock').attr('max', response.stok).focus();
            $('#qty');
          }

        }
      });

    }
  
  function PilihBarang(kode_barang){
    $('#kode_barang').val(kode_barang);
    $('#cari_barang').modal('hide');
    $('#kode_barang').focus();
    $('#stok').val(stok);
  }

  function Peminjaman(){
    $('#peminjaman').modal('show');
  }
  
  
  
  new('#catatan', {
    digitGroupSeparator: ',',
    //decimalPlaces: 0
});



</script>
<script type="text/javascript">
  function get_stok_b(){
    var kode_barang = $("#kode_barang").val();
    $.ajax({
      url:"<?= base_url('Peminjam/get_stokB') ?>",
      data:"kode_barang="+kode_barang,
      succes:function(html)
      {
        $("#get_stok").html(html);
      }
    });
  }

  function set_jumlah(){
    var stock = $("#stock").val();
    var qty = $("#qty").val(stock);
  }


</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false, "paging": true, "info": true, "ordering": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
  

</script>



<script>
  window.onload = function(){
    startTime();
  }
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(function() {
      startTime();
    }, 1000);
  }

  function checkTime(i){
    if (i < 10) {
      i = "0" + i
    }
    return i;
  }
  </script>
</body>
</html>
