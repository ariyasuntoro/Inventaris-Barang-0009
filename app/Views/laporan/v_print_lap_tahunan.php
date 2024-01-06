<div class="col-12"> 
       <b>Tahun :</b> <?= $tahun ?> 
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
 foreach ($datatahunan as $key => $value) {
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