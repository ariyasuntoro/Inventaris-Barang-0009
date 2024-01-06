<div class="col-12">
<table id='example1' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Peminjam</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Tgl Kembali</th>
                        <th>Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($rinci as $key => $value) { ?>
                        <tr class="<?= $value['qty'] == 0 ? 'text-danger' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nama_user']?></td>
                            <td><?= $value['nama_barang']?></td>
                            <td class="text-center"><?= $value['merk']?></td>
                            <td class="text-center"><?= $value['tgl_kembali']?></td>
                            <td class="text-center"><?= $value['qty']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <b>Print Date :</b><?= date('d M Y H:i:s')?>
                </table>
</div>