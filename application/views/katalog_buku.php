<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Katalog Buku
            <small>Katalog Buku Perpustakaan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Katalog Buku Perpustakaan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-success" style="display: none;"></div>
                <button id="btnAdd" class="btn bg-maroon margin">Tambah Katalog Buku</button>

                <!-- /.box-header -->
                <div class="box">
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i>
                            <?php echo $_SESSION['success']; ?>
                        </div>
                    <?php } ?>
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-condensed table-hover" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Cover</th>
                                                <th>Kategori</th>
                                                <th>ISBN</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Tempat Terbit</th>
                                                <th>Bahasa</th>
                                                <th>Halaman</th>
                                                <th>Lokasi</th>
                                                <th>Link Buku</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($alldata as $all) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td> <img src="<?= base_url('assets/images/') . $all['file_cover']; ?>" alt="Smiley face" height="42" width="42"></td>
                                                    <td><?= $all['kategori']; ?></td>
                                                    <td><?= $all['isbn']; ?></td>
                                                    <td><?= $all['judul']; ?></td>
                                                    <td><?= $all['pengarang']; ?></td>
                                                    <td><?= $all['penerbit']; ?></td>
                                                    <td><?= $all['tahun_terbit']; ?></td>
                                                    <td><?= $all['tempat_terbit']; ?></td>
                                                    <td><?= $all['bahasa']; ?></td>
                                                    <td><?= $all['halaman']; ?></td>
                                                    <td><?= $all['lokasi']; ?></td>
                                                    <td> <a href="<?= $all['link_buku']; ?>" target="_blank" class="btn btn-primary btn-xs">Link</a></td>
                                                    <td><?= $all['status']; ?></td>
                                                    <td>
                                                        <button data="<?= $all['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="ubah" class="btn bg-navy btn-xs"><i class="fa fa-edit"></i></button>
                                                        <button data="<?= $all['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="hapus" class="btn btn-danger btn-xs item-delete"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="sorting_asc">No</th>
                                                <th>Cover</th>
                                                <th>Kategori</th>
                                                <th>ISBN</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Tempat Terbit</th>
                                                <th>Bahasa</th>
                                                <th>Halaman</th>
                                                <th>Lokasi</th>
                                                <th>Link Buku</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- <?php var_dump($alldata); ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>

    <!-- modal tambah Lokasi -->
    <div class="modal fade" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tambah Katalog Buku</h4>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('katalog_buku/addKatalogBuku', 'id="form-tambah"'); ?>
                    <div class="form-group">
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat['id_kategori']; ?>"><?= $kat['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN</label>
                        <?php echo form_input('isbn', set_value('isbn'), 'class="form-control" placeholder="Masukkan ISBN" autocomplete="off"') ?>
                        <?php echo form_error('isbn', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <?php echo form_input('judul', set_value('judul'), 'class="form-control" placeholder="Masukkan Judul" autocomplete="off"') ?>
                        <?php echo form_error('judul', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pengarang</label>
                        <?php echo form_input('pengarang', set_value('pengarang'), 'class="form-control" placeholder="Masukkan Pengarang" autocomplete="off"') ?>
                        <?php echo form_error('pengarang', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penerbit</label>
                        <?php echo form_input('penerbit', set_value('penerbit'), 'class="form-control" placeholder="Masukkan Penerbit" autocomplete="off"') ?>
                        <?php echo form_error('penerbit', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Terbit</label>
                        <?php echo form_input('tahun', set_value('tahun'), 'class="form-control" placeholder="Masukkan Tahun" autocomplete="off"') ?>
                        <?php echo form_error('tahun', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Penerbit</label>
                        <?php echo form_input('tempat', set_value('tempat'), 'class="form-control" placeholder="Masukkan Tempat" autocomplete="off"') ?>
                        <?php echo form_error('tempat', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bahasa</label>
                        <select name="bahasa" id="bahasa" class="form-control">
                            <option value="Indonesia">Indonesia</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Halaman</label>
                        <?php echo form_input('halaman', set_value('halaman'), 'class="form-control" placeholder="Masukkan Halaman" autocomplete="off"') ?>
                        <?php echo form_error('halaman', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lokasi</label>
                        <select name="lokasi" id="lokasi" class="form-control">
                            <?php foreach ($lokasi as $lok) : ?>
                                <option value="<?= $lok['id_lokasi']; ?>"><?= $lok['lokasi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cover Buku</label>
                        <?php
                        $data = array(
                            'name' => 'cover',
                            'set_value' => 'cover',
                            'class' => 'form-control',
                            'type' => 'file'
                        );
                        echo form_input($data) ?>
                        <?php echo form_error('cover', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Link Buku</label>
                        <?php echo form_input('link', set_value('link'), 'class="form-control" placeholder="Masukkan link" autocomplete="off"') ?>
                        <?php echo form_error('link', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save changes</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- tutup modal tambah Lokasi -->

    <!-- modal delete -->
    <div class="modal modal-danger fade in" id="modal-danger" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Konfirmasi Menghapus Katalog Buku</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus katalog buku ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-outline" id="btnDelete">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- tutup modal delete -->
</div>

<script>
    var i = setInterval(function() {
        if ($) {
            clearInterval(i);
            $(function() {
                //tombol tambah di klik
                $('#btnAdd').click(function() {
                    $('#form-tambah')[0].reset();
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Tambah Katalog Buku');
                });

                //ubah
                $('tbody').on('click', '.item-edit', function() {
                    let id_pustakawan = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Ubah Pustakawan');
                    $('#form-tambah').attr('action', "<?= base_url('pustakawan/updatePustakawan'); ?>");
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: "<?= base_url('pustakawan/getPustakawan'); ?>",
                        data: {
                            id_pustakawan: id_pustakawan
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtId]').val(data.id_pustakawan);
                            $('input[name=no_inden]').val(data.no_identitas);
                            $('input[name=nama]').val(data.nama);
                            $('input[name=tgl]').val(data.tgl_lahir);
                            $('input[name=no]').val(data.hp);
                            $('input[name=alamat]').val(data.alamat);
                            $('input[name=jk]').val(data.jenis_kelamin);
                        },
                        error: function() {
                            alert('tidak bisa melakukan ubah lokasi');
                        }
                    });
                }); //akhir dari ubah
                //Delete
                $('tbody').on('click', '.item-delete', function() {
                    let id = $(this).attr('data');
                    $('#modal-danger').modal('show');
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: "<?= base_url('katalog_buku/deleteKatalog') ?>",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#modal-danger').modal('hide');
                                    // location.reload();
                                    $('.alert-success').html('Data katalog buku telah berhasil dihapus').fadeIn().delay(4000).fadeOut('slow');
                                } else {
                                    alert('gagal menghapus Lokasi')
                                }
                            },
                            error: function() {
                                alert('Tidak bisa menghapus');
                            }
                        });
                    });
                });

            });
        }
    }, 100);
</script>