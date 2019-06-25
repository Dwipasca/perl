<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategori
            <small>Kategori Buku</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kategori Buku</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-success" style="display: none;"></div>
                <button id="btnAdd" class="btn bg-maroon margin">Tambah Kategori</button>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Kategori Buku</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-red">55%</span></td>
                                </tr>
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

    <!-- modal tambah kategori -->
    <div class="modal fade" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="email" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
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
    <!-- tutup modal tambah kategori -->
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
                        url: '<?= base_url('kategori/showAllDataKategori') ?>',
                        dataType: 'json',
                        success: function(data) {
                            let query = '';
                            let i;
                            for (i = 0; i < data.length; i++) {
                                query += '<tr>' +
                                    '<td>' + (i + 1) + '</td>' +
                                    '<td style="text-align: center">' + data[i].kategori + '</td>' +
                                    '<td>' +
                                    '<a href="javascript:;" class="btn bg-purple margin item-edit" data="' + data[i].id_kategori + '">Update </a>' + ' ' +
                                    '<a href="javascript:;" class="btn btn-danger">Delete </a>' +
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

                // tambah data dengan ajax
                $('#btnAdd').click(function() {
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Tambah Kategori');
                    $('#form-tambah').attr('action', '<?= base_url('kategori/tambahKategori'); ?>');
                });
                $('#btnSave').click(function() {
                    let url = $('#form-tambah').attr('action');
                    let data = $('#form-tambah').serialize();
                    //validate form
                    let kategori = $('input[name=kategori]');
                    let cek = '';
                    if (kategori.val() === '') {
                        kategori.parent().addClass('has-error');
                    } else {
                        kategori.parent().removeClass('has-error');
                        cek += '1';
                    }
                    //mengecek apakah semua sudah terisi atau belum
                    let type = '';
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
                                    $('.alert-success').html('Kategori telah berhasil ' + type).fadeIn().delay(4000).fadeOut('slow');
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
                }); //end btnSave

                //edit
                $('tbody').on('click', '.item-edit', function() {
                    let id_kategori = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Ubah Kategori');
                    $('#form-tambah').attr('action', '<?= base_url('kategori/updateKategori'); ?>');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?= base_url('kategori/ubahKategori'); ?>',
                        data: {
                            id_kategori: id_kategori
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=kategori]').val(data.kategori);
                            $('input[name=txtId]').val(data.id_kategori);
                        },
                        error: function() {
                            alert('tidak bisa melakukan ubah kategori');
                        }
                    });
                });
            });
        }
    }, 100);
</script>