<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                <button type="button" onclick="NewWin=window.open('<?= base_url('Laporan/PrintDataBarangMasuk')?>','NewWin','toolbar=no,width=1100,height=500,scrollbars=yes')" class="btn btn-tool" ><i  class="fas fa-print"></i>Print
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i  class="fas fa-plus"></i>Tambah Data
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
                <table id='example1' class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Tgl Diterima</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Harga Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Kondisi</th>
                        <th width="100px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($barangmasuk as $key => $value) { ?>
                        <tr class="<?= $value['jumlah'] == 0 ? 'bg-danger' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['tgl_diterima']?></td>
                            <td><?= $value['kode_barang']?></td>
                            <td><?= $value['nama_barang']?></td>
                            <td><?= $value['merk']?></td>
                            <td class="text-center"><?= $value['harga_barang']?></td>
                            <td class="text-center"><?= $value['jumlah']?></td>
                            <td class="text-center"><?= $value['keterangan']?></td>
                            <td class="text-center"><?= $value['kondisi']?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value ['id_barang_masuk']?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value ['id_barang_masuk']?>"><i class="fas fa-trash"></i></button>
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

          <!-- add -->
          <div class="modal fade" id="add-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Barangmasuk/InsertData')?>
            <div class="modal-body">
            <div class="form-group">
                <label for="">Tgl Diterima</label>
                <input type="date" name="tgl_diterima" class="form-control" class="form-control" required>
                    </div>

                    <div class="form-group">
                <label for="">Kode Barang</label>
                <select name="id_barang" class="form-control">
                  <option value="">--Pilih Kode Barang--</option>
                  <?php foreach ($barang as $key => $value) { ?>
                    <option value="<?= $value['id_barang'] ?>"><?= $value['kode_barang'] ?>
                  <?php 
                  } ?>
                    </select>
                    </div>
                    
                    <div class="form-group">
                <label for="">Jumlah</label>
                <input name="jumlah" type="number" value="<?= old('jumlah')?>" class="form-control" placeholder="jumlah" required>
                    </div>

                    <div class="form-group">
                <label for="">Keterangan</label>
                <input name="keterangan" class="form-control" value="<?= old('keterangan')?>" placeholder="keterangan" required>
                    </div>

                    <div class="form-group">
                <label for="">Kondisi</label>
                <input name="kondisi" class="form-control" value="<?= old('kondisi')?>" placeholder="kondisi" required>
                </div>
                    
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php foreach ($barangmasuk as $key => $value) { ?>
         <!-- add -->
         <div class="modal fade" id="edit-data<?= $value['id_barang_masuk'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Barangmasuk/UpdateData/'. $value['id_barang_masuk'])?>
            <div class="modal-body">
            <div class="form-group">
                <label for="">Ubah Tanggal</label>
                <input type="date" name="tgl_diterima" value="<?= $value['tgl_diterima'] ?>" class="form-control" class="form-control" required>
                    </div>

                    <div class="form-group">
                <label for="">Kode Barang</label>
                <input name="kode_barang" type="number" value="<?= $value['kode_barang'] ?>" class="form-control" readonly>
                    </div>
                    
                    <div class="form-group">
                <label for="">Jumlah</label>
                <input name="jumlah" type="number" value="<?= $value['jumlah'] ?>" class="form-control" placeholder="jumlah" required>
                    </div>

                    <div class="form-group">
                <label for="">Keterangan</label>
                <input name="keterangan" class="form-control" value="<?= $value['keterangan'] ?>" placeholder="keterangan" required>
                    </div>

                    <div class="form-group">
                <label for="">Kondisi</label>
                <input name="kondisi" class="form-control" value="<?= $value['kondisi'] ?>" placeholder="kondisi" required>
                    </div>
                
                
                    
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Save</button>
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
      <?php foreach ($barangmasuk as $key => $value){?>
        <div class="modal fade" id="delete-data<?= $value['id_barang_masuk']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              apakah anda ingin menghapus data barang <b>?</b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('Barangmasuk/DeleteData/'.$value['id_barang_masuk']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
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