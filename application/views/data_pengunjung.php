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
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Id Pengunjung</th>
                                                <th>Nama</th>
                                                <th>No Hp</th>
                                                <th>Keperluan</th>
                                                <th>Tanggal Akses</th>
                                                <th>Jam Akses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                        "ajax": "<?= base_url('pengunjung/data'); ?>",
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
                                "data": 'id_pengunjung',
                                "width": '120px',
                                "sClass": 'text-center'
                            },
                            {
                                "data": 'nama',
                                "width": '100px'
                            },
                            {
                                "data": 'hp',
                                "sClass": 'text-center',
                                "width": '130px'
                            },
                            {
                                "data": 'keperluan',
                                "width": '130px'
                            },
                            {
                                "data": 'tgl_kunjungan',
                                "width": '50px'
                            },
                            {
                                "data": 'jam_kunjungan',
                                "width": '75px'
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

            });
        }
    }, 100);
</script>