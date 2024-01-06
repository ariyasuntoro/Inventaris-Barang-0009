<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="col-md-12">
<canvas id="myChart" width="100%" height="35px"></canvas>
</div>

<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                <button type="button" onclick="NewWin=window.open('<?= base_url('Laporan/PrintDataBarangKeluar')?>','NewWin','toolbar=no,width=1100,height=500,scrollbars=yes')" class="btn btn-tool" ><i  class="fas fa-print"></i>Print
                  </button>
                  
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
                <table id='example1' class="table table-bordered table-striped" >
                    <thead>
                    <tr class="text-center">
        <th>NO</th>
        <th>Nama</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk</th>
        <th>Tgl Pengajuan</th>
        <th>Tgl Kembali</th>
        <th>Jam Kembali</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Status admin</th>
        <th>ket</th>
        <th width="100px">Aksi</th>
</tr>

<?php $no = 1;
 foreach ($rinci as $key => $value) {
  
     ?>
<tr class="<?= $value['keterangan'] == "3" ? 'bg-danger' : '' ?>">
    <td class="text-center"><?= $no++ ?></td>
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
          <span class="badge bg-success">Acc</span>
              <?php } else if($value['status'] == "2") {?>
               <span class="badge bg-danger">Tolak</span>
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
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value ['id_barang_keluar']?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value ['id_barang_keluar']?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
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
      <!-- edit -->
      <?php foreach ($rinci as $key => $value){?>
        <div class="modal fade" id="edit-data<?= $value['id_barang_keluar']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Status <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Rinci/UpdateData/'.$value['id_barang_keluar'])?>
            <div class="modal-body">
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="1"selected>Acc</option>
                    <option value="2">Tolak</option>
                            </select>
                    </div>
                    <div class="form-group">
                <label for="">Status Admin</label>
                <select name="keterangan" class="form-control">
                    <option value="1" selected>Dipinjam</option>
                    <option value="2">Selesai</option>
                    <option value="3">Terlambat</option>
                            </select>
                    </div>
                    <div class="form-group">
                <label for="">Komentar</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"></span>
                </div>
                <input name="komentar" id="komentar" class="form-control form-control-lg text-left text-success" autocomplete="off">
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning btn-flat">Save</button>
            </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>

<!-- delete -->
      <?php foreach ($rinci as $key => $value){?>
        <div class="modal fade" id="delete-data<?= $value['id_barang_keluar']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              apakah anda ingin menghapus data <b><?= $value['nama_barang']?></b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('Rinci/DeleteData/'.$value['id_barang_keluar']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>

      <script>
        $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false, "paging": true, "info": true, "ordering": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
      </script>

      

      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>
</html>


