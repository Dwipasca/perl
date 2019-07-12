<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="callout callout-danger">
                <h4>Semua Buku</h4>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row" id="kerangka">
            </div>
        </section>
        <!-- /.content -->
        <!-- modal detail buku -->
        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tambah Peminjaman Buku</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-danger">
                            <div class="box-body box-profile">
                                <form id="form-tambah" action="" method="post">
                                    <img class="tampil img-thumbnail" src="<?= base_url('assets/images/default.jpg'); ?>" id="img">
                                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                                    <p class="text-muted text-center" name="pengarang">Software Engineer</p>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Penerbit</b> <a class="pull-right" name="penerbit">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tahun Terbit</b> <a class="pull-right" name="tahun">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tempat Terbit</b> <a class="pull-right" name="tempat">13,287</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Bahasa</b> <a class="pull-right" name="bahasa">13,287</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Halamam</b> <a class="pull-right" name="halaman">13,287</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-danger btn-block" id="link" target="_blank"><b>Baca Buku Online</b></a>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- tutup modal -->
    </div>
    <!-- /.container -->
</div>
<script>
    var i = setInterval(function() {
        if ($) {
            clearInterval(i);
            $(function() {
                showAllData();
                $('.nav-link').on('click', function() {
                    $('.nav-link').removeClass('active');
                    let pencarian = $(this).attr('data');
                    $(this).addClass('active');
                    let kategori = $(this).text();
                    $('h4').text(kategori);
                    $.ajax({
                        type: 'ajax',
                        data: {
                            'jenis': pencarian
                        },
                        url: '<?= base_url('pengunjung/AXfilterPencarian/') ?>' + pencarian,
                        dataType: 'json',
                        success: function(data) {
                            let query = '';
                            let i;
                            for (i = 0; i < data.length; i++) {
                                query += "<div class='col-md-3'>" +
                                    "<div class='hovereffect'>" +
                                    '<img src=" <?= base_url(); ?>assets/images/' + data[i].file_cover + '" class="img-thumbnail img-responsive">' +
                                    "<div class='overlay'>" +
                                    "<h2>" + data[i].judul + "</h2>" +
                                    "<a class='info' id='btnDetail' data='" + data[i].id + "' href='#'>Detail</a>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                            }
                            $('#kerangka').html(query);
                        },
                        error: function() {
                            alert('tidak bisa mengambil data dari database');
                        }
                    });

                });


                function showAllData() {
                    $.ajax({
                        type: 'ajax',
                        url: '<?= base_url('pengunjung/AXshowAllData/') ?>',
                        dataType: 'json',
                        success: function(data) {
                            let query = '';
                            let i;
                            for (i = 0; i < data.length; i++) {
                                query += "<div class='col-md-3'>" +
                                    "<div class='hovereffect'>" +
                                    '<img src=" <?= base_url(); ?>assets/images/' + data[i].file_cover + '" class="img-thumbnail img-responsive">' +
                                    "<div class='overlay'>" +
                                    "<h2>" + data[i].judul + "</h2>" +
                                    "<a class='info' id='btnDetail' data='" + data[i].id + "' href='#'>Detail</a>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                            }
                            $('#kerangka').html(query);
                        },
                        error: function() {
                            alert('tidak bisa mengambil data dari database');
                        }
                    });
                } // end of showdataall

                $('#btn-cari').on('click', function() {
                    let pencarian = $('#txt-cari').val();
                    $.ajax({
                        type: 'ajax',
                        data: {
                            'jenis': pencarian
                        },
                        url: '<?= base_url('pengunjung/AXfilterPencarian/') ?>' + pencarian,
                        dataType: 'json',
                        success: function(data) {
                            let query = '';
                            let i;
                            for (i = 0; i < data.length; i++) {
                                query += "<div class='col-md-3'>" +
                                    "<div class='hovereffect'>" +
                                    '<img src=" <?= base_url(); ?>assets/images/' + data[i].file_cover + '" class="img-thumbnail img-responsive">' +
                                    "<div class='overlay'>" +
                                    "<h2>" + data[i].judul + "</h2>" +
                                    "<a class='info' id='btnDetail' data='" + data[i].id + "' href='#'>Detail</a>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                            }
                            $('#kerangka').html(query);
                        },
                        error: function() {
                            alert('tidak bisa mengambil data dari database');
                        }
                    });
                    $('#txt-cari').val('');
                });

                //tampil data perpanjangan buku
                $('#kerangka').on('click', '#btnDetail', function() {
                    let id = $(this).attr('data');
                    $('#modal-default').modal('show');
                    $('#modal-default').find('.modal-title').text('Detail Buku');
                    let link = document.getElementById('link');
                    // let img = document.getElementById('img');
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: "<?= base_url('pengunjung/getDataDetail'); ?>",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('h3').html(data.judul);
                            $('p').html(data.pengarang);
                            $('a[name=penerbit]').html(data.penerbit);
                            $('a[name=tahun]').html(data.tahun_terbit);
                            $('a[name=tempat]').html(data.tempat_terbit);
                            $('a[name=bahasa]').html(data.bahasa);
                            $('a[name=halaman]').html(data.halaman);
                            link.href = data.link_buku;
                            $("#img").attr("src", "<?= base_url('assets/images/') ?>" + data.file_cover);
                            // img.src = <?= base_url('assets/images/') ?> data.file_cover;
                            // $('a[name=link]').setAttribute("href", data.link_buku);
                        },
                        error: function() {
                            alert('tidak bisa melakukan ubah lokasi');
                        }
                    });
                }); //akhir dari ubah
            });

        }
    }, 100);
</script>