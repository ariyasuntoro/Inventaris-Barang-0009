<div class="col-12">
<table id='example1' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr class="<?= $value['stok'] == 0 ? 'text-danger' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_barang']?></td>
                            <td><?= $value['nama_barang']?></td>
                            <td><?= $value['merk']?></td>
                            <td class="text-center"><?= $value['nama_kategori']?></td>
                            <td class="text-center"><?= $value['nama_satuan']?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_barang'], 0)?></td>
                            <td class="text-center"><?= $value['stok']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <b>Print Date :</b><?= date('d M Y H:i:s')?>
                </table>
</div>