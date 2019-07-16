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

                <!-- /.box-header -->
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" style="width: 217.8px;">No</th>
                                                <th class="sorting" style="width: 266.6px;">No. Identitas</th>
                                                <th class="sorting" style="width: 237px;">Nama</th>
                                                <th class="sorting" style="width: 187.4px;">Tanggal Lahir</th>
                                                <th class="sorting" style="width: 134.8px;">Jenis Kelamin</th>
                                                <th class="sorting" style="width: 134.8px;">Alamat</th>
                                                <th class="sorting" style="width: 134.8px;">No. Hp</th>
                                                <th class="sorting" style="width: 134.8px;">Tanggal Bergabung</th>
                                                <th class="sorting" style="width: 134.8px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="sorting_asc" style="width: 217.8px;">No</th>
                                                <th class="sorting" style="width: 266.6px;">No. Identitas</th>
                                                <th class="sorting" style="width: 237px;">Nama</th>
                                                <th class="sorting" style="width: 187.4px;">Tanggal Lahir</th>
                                                <th class="sorting" style="width: 134.8px;">Jenis Kelamin</th>
                                                <th class="sorting" style="width: 134.8px;">Alamat</th>
                                                <th class="sorting" style="width: 134.8px;">No. Hp</th>
                                                <th class="sorting" style="width: 134.8px;">Tanggal Bergabung</th>
                                                <th class="sorting" style="width: 134.8px;">Aksi</th>
                                            </tr>
                                        </tfoot>
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
                    <h4 class="modal-title">Tambah Anggota</h4>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="txtId" id="txtId" value="0">
                            <label for="exampleInputEmail1">No. Identitas</label>
                            <input type="text" class="form-control" id="no-inden" name="no_inden" placeholder="Masukkan No. Identitas" autocomplete="off">
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
                showData();

                function showData() {
                    var t = $('#example1').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'info': true,
                        'autoWidth': false,
                        "ajax": "<?= base_url('Anggota/data'); ?>",
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
                                "data": 'no_identitas',
                                "width": '120px',
                                "sClass": 'text-center'
                            },
                            {
                                "data": 'nama',
                                "width": '100px'
                            },
                            {
                                "data": 'tgl_lahir',
                                "sClass": 'text-center',
                                "width": '130px'
                            },
                            {
                                "data": 'jenis_kelamin',
                                "width": '130px'
                            },
                            {
                                "data": 'alamat',
                                "width": '50px'
                            },
                            {
                                "data": 'hp',
                                "width": '75px'
                            },
                            {
                                "data": 'tanggal_pembuatan',
                                "width": '75px'
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
                    let no_identitas = $('input[name=no_inden]');
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
                                    $('.alert-success').html('Data Anggota telah berhasil ' + type).fadeIn().delay(4000).fadeOut('slow');
                                    // showData();
                                    location.reload();
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
                    let id_anggota = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Ubah Lokasi');
                    $('#form-tambah').attr('action', "<?= base_url('Anggota/updateAnggota'); ?>");
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: "<?= base_url('Anggota/getAnggota'); ?>",
                        data: {
                            id_anggota: id_anggota
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name=txtId]').val(data.id_anggota);
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
                    let id_anggota = $(this).attr('data');
                    $('#modal-danger').modal('show');
                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: "<?= base_url('Anggota/deleteAnggota') ?>",
                            data: {
                                id_anggota: id_anggota
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