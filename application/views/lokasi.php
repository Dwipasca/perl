<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lokasi
            <small>Lokasi Buku</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lokasi Buku</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-success" style="display: none;"></div>
                <button id="btnAdd" class="btn bg-maroon margin">Tambah Lokasi</button>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Lokasi Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th style="text-align: center">Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
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
                    <h4 class="modal-title">Tambah Lokasi</h4>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input type="email" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
                </div>
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
                    <h4 class="modal-title">Konfirmasi Menghapus Lokasi</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus Lokasi ini ?</p>
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
                showAllData();

                function showAllData() {
                    $.ajax({
                        type: 'ajax',
                        url: '<?= base_url('Lokasi/showAllDataLokasi') ?>',
                        dataType: 'json',
                        success: function(data) {
                            let query = '';
                            let i;
                            for (i = 0; i < data.length; i++) {
                                query += '<tr>' +
                                    '<td>' + (i + 1) + '</td>' +
                                    '<td style="text-align: center">' + data[i].lokasi + '</td>' +
                                    '<td>' +
                                    '<a href="javascript:;" class="btn bg-purple margin item-edit" data="' + data[i].id_lokasi + '">Update </a>' + '' +
                                    '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].id_lokasi + '">Delete </a>' +
                                    '</td>' +
                                    '</tr>';
                            }
                            $('tbody').html(query);
                        },
                        error: function() {
                            alert('tidak bisa mengambil data dari database');
                        }
                    });
                } // end of showdataall
                //tambah data dengan ajax
                $('#btnAdd').click(function() {
                    $('#form-tambah')[0].reset();
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Tambah Lokasi');
                    $('#form-tambah').attr('action', '<?= base_url('Lokasi/tambahLokasi'); ?>');
                });
                $('#btnSave').click(function() {
                    let url = $('#form-tambah').attr('action');
                    let data = $('#form-tambah').serialize();
                    //validate form'
                    let lokasi = $('input[name=lokasi]');
                    let cek = '';
                    if (lokasi.val() === '') {
                        lokasi.parent().addClass('has-error');
                    } else {
                        lokasi.parent().removeClass('has-error');
                        cek += '1';
                    }
                    let type = '';
                    //mengecek apakah semua sudah terisi atau belum
                    if (cek === '1') {
                        $.ajax({
                            type: 'ajax',
                            method: 'post',
                            url: url,
                            data: data,
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#modal-default').modal('hide');
                                    $('#form-tambah')[0].reset();
                                    if (response.type == 'add') {
                                        type = 'ditambahkan';
                                    } else if (response.type == 'update') {
                                        type = 'diubah';
                                    }
                                    $('.alert-success').html('Lokasi telah berhasil ' + type).fadeIn().delay(4000).fadeOut('slow');
                                    showAllData();
                                } else {
                                    alert('gagal memasukkan data');
                                }
                            },
                            error: function() {
                                alert('tidak bisa menambahkan data');
                            }
                        });
                    }
                }); // end of add lokasi

                //ubah
                $('tbody').on('click', '.item-edit', function() {
                    let id_lokasi = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Ubah Lokasi');
                    $('#form-tambah').attr('action', '<?= base_url('Lokasi/updateLokasi'); ?>');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?= base_url('Lokasi/getLokasi'); ?>',
                        data: {
                            id_lokasi: id_lokasi
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=lokasi]').val(data.lokasi);
                            $('input[name=txtId]').val(data.id_lokasi);
                        },
                        error: function() {
                            alert('tidak bisa melakukan ubah lokasi');
                        }
                    });
                }); //akhir dari ubah
                //Delete
                $('tbody').on('click', '.item-delete', function() {
                    let id_lokasi = $(this).attr('data');
                    $('#modal-danger').modal('show');
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: '<?= base_url('Lokasi/hapusLokasi') ?>',
                            data: {
                                id_lokasi: id_lokasi
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#modal-danger').modal('hide');
                                    $('.alert-success').html('Lokasi telah berhasil dihapus').fadeIn().delay(4000).fadeOut('slow');
                                    showAllData();
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