<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Online</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css'>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css_custom/buku_tamu.css">
</head>

<body translate="no">
    <h2>PERPUSTAKAAN ONLINE BALAI BAHASA SULAWESI TENGAH</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        </div>
        <div class="form-container sign-in-container">
            <?php if (isset($_SESSION['success'])) { ?>
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-header">
                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                    </div>
                    <div class="modal-content">
                        <br>
                        <h3>Terima Kasih</h3>
                        <p>Selamat Membaca</p>
                    </div>
                </div>
            <?php } ?>
            <?= form_open('Buku_tamu/cekTamu', 'id="cek"'); ?>
            <img src="<?= base_url('assets/img/LOGO3.JPEG') ?>" height="80px" weight="80px">
            <h1>PERL</h1>
            <span>Perpustakaan Online</span>
            <br>
            <input type="text" name="nama" id="nama" placeholder="Nama" autocomplete="off" />
            <?php echo form_error('nama', '<code>', '</code>'); ?>
            <input type="number" name="hp" id="hp" placeholder="Nomor Hp." autocomplete="off" />
            <?php echo form_error('hp', '<code>', '</code>'); ?>
            <input type="text" name="keperluan" id="keperluan" placeholder="Keperluan" autocomplete="off" />
            <?php echo form_error('keperluan', '<code>', '</code>'); ?>
            <br>
            <button type="submit">Masuk</button>
            <?= form_close(); ?>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Selamat Datang!</h1>
                    <p>Di Buku Tamu Perpustakaan Online Balai Bahasa Sulawesi Tengah</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>

    <!-- <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script> -->
</body>

</html>