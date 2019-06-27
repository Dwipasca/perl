<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Anggota
            <small>Anggota Perpustakaan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Anggota Perpustakaan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-success" style="display: none;"></div>
                <button id="btnAdd" class="btn bg-maroon margin">Tambah Anggota</button>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Anggota Perpustakaan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>No. Identitas</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No. Hp</th>
                                    <th>Tanggal Keanggotaan</th>
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
                    <h4 class="modal-title">Tambah Anggota</h4>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">No. Identitas</label>
                            <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Masukkan No. Identitas" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl" name="tgl" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Hp</label>
                            <input type="text" class="form-control" id="no" name="no" placeholder="Masukkan No. Hp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
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
                // showAllData();

                // function showAllData() {
                //     $.ajax({
                //         type: 'ajax',
                //         url: '<?= base_url('lokasi/showAllDataLokasi') ?>',
                //         dataType: 'json',
                //         success: function(data) {
                //             let query = '';
                //             let i;
                //             for (i = 0; i < data.length; i++) {
                //                 query += '<tr>' +
                //                     '<td>' + (i + 1) + '</td>' +
                //                     '<td style="text-align: center">' + data[i].lokasi + '</td>' +
                //                     '<td>' +
                //                     '<a href="javascript:;" class="btn bg-purple margin item-edit" data="' + data[i].id_lokasi + '">Update </a>' + '' +
                //                     '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].id_lokasi + '">Delete </a>' +
                //                     '</td>' +
                //                     '</tr>';
                //             }
                //             $('tbody').html(query);
                //         },
                //         error: function() {
                //             alert('tidak bisa mengambil data dari database');
                //         }
                //     });
                // } // end of showdataall
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
                    $('#form-tambah').attr('action', '<?= base_url('anggota/tambahAnggota'); ?>');
                });
                $('#btnSave').click(function() {
                    let url = $('#form-tambah').attr('action');
                    let data = $('#form-tambah').serialize();
                    //validate form'
                    let no_identitas = $('input[name=no_identitas]');
                    let nama = $('input[name=nama]');
                    let tgl = $('input[name=tgl]');
                    let no = $('input[name=no]');
                    let alamat = $('input[name=alamat]');
                    let jk = $('input[name=jk]');
                    validation(no_identitas);
                    validation(nama);
                    validation(tgl);
                    validation(no);
                    validation(alamat);

                    let type = '';
                    //mengecek apakah semua sudah terisi atau belum
                    if (cek === '11111') {
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
                                    $('.alert-success').html('Anggota telah berhasil ' + type).fadeIn().delay(4000).fadeOut('slow');
                                    //showAllData();
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

                // //ubah
                // $('tbody').on('click', '.item-edit', function() {
                //     let id_lokasi = $(this).attr('data');
                //     $('#modal-default').modal('show');
                //     $('#modal-default').find('.modal-title').text('Ubah Lokasi');
                //     $('#form-tambah').attr('action', '<?= base_url('lokasi/updateLokasi'); ?>');
                //     $.ajax({
                //         type: 'ajax',
                //         method: 'get',
                //         url: '<?= base_url('lokasi/getLokasi'); ?>',
                //         data: {
                //             id_lokasi: id_lokasi
                //         },
                //         dataType: 'json',
                //         success: function(data) {
                //             $('input[name=lokasi]').val(data.lokasi);
                //             $('input[name=txtId]').val(data.id_lokasi);
                //         },
                //         error: function() {
                //             alert('tidak bisa melakukan ubah lokasi');
                //         }
                //     });
                // }); //akhir dari ubah
                // //Delete
                // $('tbody').on('click', '.item-delete', function() {
                //     let id_lokasi = $(this).attr('data');
                //     $('#modal-danger').modal('show');
                //     $('#btnDelete').unbind().click(function() {
                //         $.ajax({
                //             type: 'ajax',
                //             method: 'get',
                //             url: '<?= base_url('lokasi/hapusLokasi') ?>',
                //             data: {
                //                 id_lokasi: id_lokasi
                //             },
                //             dataType: 'json',
                //             success: function(response) {
                //                 if (response.success) {
                //                     $('#modal-danger').modal('hide');
                //                     $('.alert-success').html('Lokasi telah berhasil dihapus').fadeIn().delay(4000).fadeOut('slow');
                //                     showAllData();
                //                 } else {
                //                     alert('gagal menghapus Lokasi')
                //                 }
                //             },
                //             error: function() {
                //                 alert('Tidak bisa menghapus');
                //             }
                //         });
                //     });
                // });

            });
        }
    }, 100);
</script>