<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peminjaman Buku
            <small>Peminjaman Buku Perpustakaan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Peminjaman Buku Perpustakaan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-success" style="display: none;"></div>
                <button id="btnAdd" class="btn bg-maroon margin">Tambah Peminjaman Buku</button>

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
                                                <th>id Anggota</th>
                                                <th>Id Buku</th>
                                                <th>Judul</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
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
                                                    <td><?= $all['no_identitas']; ?></td>
                                                    <td><?= $all['id_buku']; ?></td>
                                                    <td><?= $all['judul']; ?></td>
                                                    <td><?= $all['tgl_pinjam']; ?></td>
                                                    <td> <?= $all['tgl_pengembalian']; ?></td>
                                                    <td><?= $all['status']; ?></td>
                                                    <td>
                                                        <button data="<?= $all['id_peminjaman']; ?>" data-toggle="tooltip" data-placement="bottom" title="ubah" class="btn bg-navy btn-xs"><i class="fa fa-edit"></i></button>
                                                        <button data="<?= $all['id_peminjaman']; ?>" data-toggle="tooltip" data-placement="bottom" title="hapus" class="btn btn-danger btn-xs item-delete"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
                    <?= form_open_multipart('peminjaman/addPeminjaman', 'id="form-tambah"'); ?>
                    <div class="form-group">
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <label for="exampleInputEmail1">Anggota</label>
                        <br>
                        <select class="form-control select2 nm" name="anggota" id="anggota" style="width: 100%">
                            <option value="">---------------Pilih---------------</option>
                            <?php foreach ($anggota as $agt) { ?>
                                <option value="<?php echo $agt['id_anggota']; ?>" <?php echo set_select('anggota', $agt['id_anggota'], False); ?>>
                                    <?php echo $agt['no_identitas'] . ' | ' . $agt['nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('anggota', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <label for="exampleInputEmail1">Buku</label>
                        <br>
                        <select class="form-control select2 nm" name="buku" id="buku" style="width: 100%">
                            <option value="">---------------Pilih---------------</option>
                            <?php foreach ($buku as $b) { ?>
                                <option value="<?php echo $b['id']; ?>" <?php echo set_select('anggota', $agt['id_anggota'], False); ?>>
                                    <?php echo $b['pengarang'] . ' | ' . $b['judul']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('buku', '<code>', '</code>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                        <?php $data = array(
                            'name' => 'tgl',
                            'set_value' => 'tgl',
                            'class' => 'form-control',
                            'type' => 'date'
                        );
                        echo form_input($data) ?>
                        <?php echo form_error('tgl', '<code>', '</code>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save changes</button>
                </div>
                <?php form_close(); ?>
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
                    <h4 class="modal-title">Konfirmasi Menghapus Peminjaman Buku</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus Peminjaman buku ini ?</p>
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
                $(function() {
                    $('.select2').select2();

                })
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
                    $('#form-tambah').attr('action', "<?= base_url('Pustakawan/updatePustakawan'); ?>");
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: "<?= base_url('Pustakawan/getPustakawan'); ?>",
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
                    let id_peminjaman = $(this).attr('data');
                    $('#modal-danger').modal('show');
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: "<?= base_url('Peminjaman/deletePeminjaman') ?>",
                            data: {
                                id_peminjaman: id_peminjaman
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#modal-danger').modal('hide');
                                    // location.reload();
                                    $('.alert-success').html('Data Peminjaman buku telah berhasil dihapus').fadeIn().delay(4000).fadeOut('slow');
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