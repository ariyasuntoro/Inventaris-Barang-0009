<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                <button type="button" onclick="NewWin=window.open('<?= base_url('Laporan/PrintDataBarang')?>','NewWin','toolbar=no,width=1100,height=500,scrollbars=yes')" class="btn btn-tool" ><i  class="fas fa-print"></i>Print
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Barang</th>
                        <th>Stok</th>
                        <th width="100px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr class="<?= $value['stok'] == 0 ? 'bg-info' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_barang']?></td>
                            <td><?= $value['nama_barang']?></td>
                            <td><?= $value['merk']?></td>
                            <td class="text-center"><?= $value['nama_kategori']?></td>
                            <td class="text-center"><?= $value['nama_satuan']?></td>
                            <td class="text-right"><?= $value['harga_barang']?></td>
                            <td class="text-center"><?= $value['stok']?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value ['id_barang']?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value ['id_barang']?>"><i class="fas fa-trash"></i></button>
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
            <?php echo form_open('Barang/InsertData')?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Kode Barang</label>
                <input name="kode_barang" class="form-control" value="<?= old('kode_barang') ?>" placeholder="Kode Barang" required>
                    </div>
                    <div class="form-group">
                <label for="">Nama Barang</label>
                <input name="nama_barang" class="form-control" value="<?= old('nama_barang')?>" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                <label for="">Merk</label>
                <input name="merk" class="form-control" value="<?= old('merk')?>" placeholder="Merk" required>
                    </div>
                    <div class="form-group">
                <label for="">Kategori</label>
                <select name="id_kategori" class="form-control">
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach ($kategori as $key => $value) { ?>
                    <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?>
                  <?php 
                  } ?>
                    </select>
                    </div>
                    <div class="form-group">
                <label for="">Satuan</label>
                <select name="id_satuan" class="form-control">
                  <option value="">--Pilih Satuan--</option>
                  <?php foreach ($satuan as $key => $value) { ?>
                    <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?>
                  <?php 
                  } ?>
                    </select>
                    </div>

                    <div class="form-group">
                <label for="">harga_barang</label>
                <input name="harga_barang" class="form-control" value="<?= old('harga_barang')?>" placeholder="harga_barang" required>
                    </div>
                
                    <div class="form-group">
                <label for="">Stok</label>
                <input name="stok" type="number" value="<?= old('stok')?>" class="form-control" placeholder="stok" required>
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

      <?php foreach ($barang as $key => $value) { ?>
         <!-- add -->
         <div class="modal fade" id="edit-data<?= $value['id_barang'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Barang/UpdateData/'. $value['id_barang'])?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Kode Barang</label>
                <input name="kode_barang" class="form-control" value="<?= $value['kode_barang'] ?>" placeholder="Kode Barang" readonly>
                    </div>
                    <div class="form-group">
                <label for="">Nama barang</label>
                <input name="nama_barang" class="form-control" value="<?= $value['nama_barang'] ?>" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                <label for="">Merk</label>
                <input name="merk" class="form-control" value="<?= $value['merk'] ?>" placeholder="Merk" required>
                    </div>
                    <div class="form-group">
                <label for="">Kategori</label>
                <select name="id_kategori" class="form-control">
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach ($kategori as $key => $k) { ?>
                    <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori']== $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?>
                  <?php 
                  } ?>
                    </select>
                    </div>
                    <div class="form-group">
                <label for="">Satuan</label>
                <select name="id_satuan" class="form-control">
                  <option value="">--Pilih Satuan--</option>
                  <?php foreach ($satuan as $key => $s) { ?>
                    <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan']== $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?>
                  <?php 
                  } ?>
                    </select>
                    </div>

                    <div class="form-group">
                <label for="">harga_barang</label>
                <input name="harga_barang" class="form-control" value="<?= $value['harga_barang'] ?>" placeholder="harga_barang" required>
                    </div>
                
                    <div class="form-group">
                <label for="">Stok</label>
                <input name="stok" type="number" value="<?= $value['stok'] ?>" class="form-control" placeholder="stok" required>
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
      <?php foreach ($barang as $key => $value){?>
        <div class="modal fade" id="delete-data<?= $value['id_barang']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              apakah anda ingin menghapus data barang <b><?= $value['nama_barang']?>?</b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('Barang/DeleteData/'.$value['id_barang']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
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