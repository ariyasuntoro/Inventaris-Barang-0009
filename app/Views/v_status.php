
<div class="col-md-12">
<canvas id="myChart" width="100%" height="35px"></canvas>
</div>

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
                <table id='example1' class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
        <th>NO</th>
        <th>No Peminjam</th>
        <th>Nama Peminjam</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Tgl Pinjam</th>
        <th>Jumlah</th>
        <th>Tgl Kembali</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th width="100px">Aksi</th>
</tr>

<?php $no = 1;
 foreach ($status as $key => $value) {
  
     ?>
<tr>
    <td class="text-center"><?= $no++ ?></td>
    <td class="text-center"><?= $value['no_peminjam'] ?></td>
    <td class="text-center"><?= $value['nama_user'] ?></td>
    <td class="text-center"><?= $value['kode_barang'] ?></td>
    <td class="text-center"><?= $value['nama'] ?></td>
    <td class="text-center"><?= $value['merk'] ?></td>
    <td class="text-center"><?= $value['tgl_pinjam'] ?></td>
    <td class="text-center"><?= $value['qty'] ?></td>
    <td class="text-center"><?= $value['tgl_kembali'] ?></td>
    <td class="text-center"><?= $value['status'] ?></td>

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
      

      


