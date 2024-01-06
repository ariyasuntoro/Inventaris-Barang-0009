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

      <div class="col-12">
       <b>Tanggal :</b> <?= $tgl ?> 
      <table class="table table-bordered table-striped">
    <tr class="text-center">
    <th>NO</th>
        <th>Nama Peminjam</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Tgl Kembali</th>
        <th>QTY</th>
</tr>
<?php $no = 1;
 foreach ($dataharian as $key => $value) {
     ?>
    
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['nama_user'] ?></td>
    <td class="text-center"><?= $value['nama'] ?></td>
    <td class="text-center"><?= $value['merk'] ?></td>
    <td class="text-center"><?= $value['tgl_kembali'] ?></td>
    <td class="text-center"><?= $value['qty'] ?></td>
</tr>

<?php } ?>
</table>
</div>
</div>
