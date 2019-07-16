<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Akun
            <small>Akun Perpustakaan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Akun Perpustakaan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="alert alert-success" style="display: none;"></div>
            <div class="box-body">
                <!-- /.box-header -->

                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 217.8px;">No</th>
                                        <th class="sorting" style="width: 266.6px;">Id. Pengguna</th>
                                        <th class="sorting" style="width: 237px;">Jabatan</th>
                                        <th class="sorting" style="width: 187.4px;">Nama Pengguna</th>
                                        <th class="sorting" style="width: 187.4px;">Kata Sandi</th>
                                        <th class="sorting" style="width: 134.8px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="sorting_asc" style="width: 217.8px;">No</th>
                                        <th class="sorting" style="width: 266.6px;">Id. Pengguna</th>
                                        <th class="sorting" style="width: 237px;">Jabatan</th>
                                        <th class="sorting" style="width: 187.4px;">Nama Pengguna</th>
                                        <th class="sorting" style="width: 187.4px;">Kata Sandi</th>
                                        <th class="sorting" style="width: 134.8px;">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
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
                    <h4 class="modal-title">Tambah Akun</h4>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">Id Pengguna</label>
                            <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="Anggota">Anggota</option>
                                <option value="Pustakawan">Pustakawan</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="jabatan" name="jabatan" autocomplete="off"> -->
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
    <!-- modal edit password-->
    <div class="modal fade" id="modal-password" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tambah Akun</h4>
                </div>
                <div class="modal-body">
                    <form id="form-password" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="kata_sandi" name="kata_sandi" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">Ulang Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="re_kata_sandi" name="re_kata_sandi" autocomplete="off">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSavePassword">Save changes</button>
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
                    <h4 class="modal-title">Konfirmasi Menghapus Anggota</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus Anggota ini ?</p>
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
                showData();

                function showData() {
                    var t = $('#example1').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'info': true,
                        'autoWidth': false,
                        "ajax": "<?= base_url('Akun/data'); ?>",
                        "order": [
                            [2, 'asc']
                        ],
                        "scrollX": true,
                        "columns": [{
                                "data": null,
                                "width": '30px',
                                "sClass": 'text-center',
                                "orderable": false,
                            },
                            {
                                "data": 'id_pengguna',
                                "width": '120px',
                                "sClass": 'text-center'
                            },
                            {
                                "data": 'jabatan',
                                "sClass": 'text-center',
                                "width": '100px'
                            },
                            {
                                "data": 'nama_pengguna',
                                "sClass": 'text-center',
                                "width": '130px'
                            },
                            {
                                "data": 'kata_sandi',
                                "sClass": 'text-center',
                                "width": '130px'
                            },
                            {
                                "data": 'aksi',
                                "width": '50px'
                            },
                        ]
                    });
                    t.on('order.dt search.dt', function() {
                        t.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();
                    $.fn.dataTable.ext.errMode = 'throw';
                }
                //tambah data dengan ajax
                let cek = '';

                function validation($field) {
                    if ($field.val() === '') {
                        return $field.parent().addClass('has-error');
                    } else {
                        $field.parent().removeClass('has-error');
                        return cek += '1';
                    }
                }

                $('#btnAdd').click(function() {
                    $('#form-tambah')[0].reset();
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Tambah Anggota');
                    $('#form-tambah').attr('action', "<?= base_url('Anggota/tambahAnggota'); ?>");
                });
                $('#btnSave').click(function() {
                    let url = $('#form-tambah').attr('action');
                    let data = $('#form-tambah').serialize();
                    //validate form'
                    let id_pengguna = $('input[name=id_pengguna]');
                    let jabatan = $('select[name=jabatan]');
                    validation(id_pengguna);
                    validation(jabatan);

                    let type = '';
                    //mengecek apakah semua sudah terisi atau belum
                    if (cek === '11') {
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
                                    $('.alert-success').html('Data Akun telah berhasil ' + type).fadeIn().delay(4000).fadeOut('slow');
                                    location.reload();
                                    // showData();
                                } else {
                                    alert('gagal memasukkan data');
                                }
                            },
                            error: function() {
                                alert('tidak bisa menambahkan data');
                            }
                        });
                    } else {
                        alert('Ada field yang kosong');
                    }
                }); // end of add lokasi
                //ubah
                $('tbody').on('click', '.item-edit', function() {
                    let id_akun = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Ubah Lokasi');
                    $('#form-tambah').attr('action', "<?= base_url('Akun/updateAkun'); ?>");
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: "<?= base_url('Akun/getAkun'); ?>",
                        data: {
                            id_akun: id_akun
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtId]').val(data.id_akun);
                            $('input[name=id_pengguna]').val(data.id_pengguna);
                            $('select[name=jabatan]').val(data.jabatan);
                        },
                        error: function() {
                            alert('tidak bisa melakukan ubah lokasi');
                        }
                    });
                }); //akhir dari ubah
                //ubah password
                $('tbody').on('click', '.item-edit-password', function() {
                    $('#form-password')[0].reset();
                    let id_akun = $(this).attr('data');
                    $('input[name=txtId]').val(id_akun);
                    $('#modal-password').modal('show');
                    $('#modal-password').find('.modal-title').text('Ubah Password');
                    $('#form-password').attr('action', "<?= base_url('Akun/updateAkunPassword'); ?>");
                }); //akhir dari ubah password
                $('#btnSavePassword').click(function() {
                    let cek2 = '';
                    let url = $('#form-password').attr('action');
                    let data = $('#form-password').serialize();
                    //validate form'
                    let kata_sandi = $('#kata_sandi').val();
                    let re_kata_sandi = $('#re_kata_sandi').val();
                    if (kata_sandi == '') {
                        $('#kata_sandi').parent().addClass('has-error');
                    } else {
                        $('#kata_sandi').parent().removeClass('has-error');
                        cek2 += '1';
                    }
                    if (re_kata_sandi == '') {
                        $('#re_kata_sandi').parent().addClass('has-error');
                    } else {
                        $('#re_kata_sandi').parent().removeClass('has-error');
                        cek2 += '1';
                    }
                    //mengecek apakah semua sudah terisi atau belum
                    if (cek2 == '11') {
                        if (kata_sandi != re_kata_sandi) {
                            alert('Kolom ulang kata sandi tidak sesuai dengan kata sandi diatas');
                        } else {
                            $.ajax({
                                type: 'ajax',
                                method: 'post',
                                url: "<?= base_url('Akun/updateAkunPassword'); ?>",
                                data: data,
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        $('#modal-password').modal('hide');
                                        $('#form-password')[0].reset();
                                        $('.alert-success').html('Data Anggota telah berhasil diubah').fadeIn().delay(4000).fadeOut('slow');
                                        location.reload();
                                        // showData();
                                    } else {
                                        alert('gagal memasukkan data');
                                    }
                                },
                                error: function() {
                                    alert('tidak bisa menambahkan data');
                                }
                            });
                        }
                    } else {
                        alert('Ada field yang kosong');
                    }
                }); // end of tombol simpan ubah password
                //Delete
                $('tbody').on('click', '.item-delete', function() {
                    let id_akun = $(this).attr('data');
                    $('#modal-danger').modal('show');
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: "<?= base_url('Akun/deleteAkun') ?>",
                            data: {
                                id_akun: id_akun
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#modal-danger').modal('hide');
                                    $('.alert-success').html('Lokasi telah berhasil dihapus').fadeIn().delay(4000).fadeOut('slow');
                                    location.reload();
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