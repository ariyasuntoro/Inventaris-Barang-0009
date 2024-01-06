<div class="col-12">
<table id='example1' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Tanggal Diterima</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Kondisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($barangmasuk as $key => $value) { ?>
                        <tr class="<?= $value['jumlah'] == 0 ? 'text-danger' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['tgl_diterima']?></td>
                            <td class="text-center"><?= $value['kode_barang']?></td>
                            <td><?= $value['nama_barang']?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_barang'], 0)?></td>
                            <td class="text-center"><?= $value['jumlah']?></td>
                            <td class="text-center"><?= $value['keterangan']?></td>
                            <td class="text-center"><?= $value['kondisi']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <b>Print Date :</b><?= date('d M Y H:i:s')?>
                </table>
</div>