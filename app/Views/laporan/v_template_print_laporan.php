
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Inventaris | <?= $judul ?></title>

  <link rel="shortcut icon" href="<?= base_url('AdminLTE') ?>/dist/img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <style>
  </style>
</head>
<body>
<div class="wrapper">
  
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
    <img class="left" src="<?= base_url('AdminLTE') ?>/dist/img/logo.png" style="position: absolute; width:140px; height:140px; padding:20px;">
      <div class="col-12 text-center">
        <p class="page-header">
          <b>
          <font size=6 class=""><?= $web['nama_sekolah']?></font><br>
          </b> 
          <?= $web['slogan']?><br>
          <?= $web['alamat']?><br>
          <?= $web['no_hp']?><br>       
      </p>
      </div>
      <div class="col-12 text-center">
        <hr>
        <b>
            <h4><?= $judul ?></h4>
        </b>
        </hr>
      </div>
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
    
    <?php if ($page) {
        echo view($page);
    } ?>
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
 window.addEventListener("load", window.print());
</script>
</body>
</html>
