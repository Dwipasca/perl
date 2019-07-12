<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>PERL</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php if ($error = $this->session->flashdata('danger')); ?>
            <div class="form-group has-feedback">
                <p class="text-danger"><?php echo $error; ?></p>
            </div>
            <?= form_open('auth/cekLogin', 'id="cek"'); ?>
            <div class="form-group has-feedback">
                <!-- <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna"> -->
                <?php $data = array(
                    'name' => 'username',
                    'set_value' => 'username',
                    'class' => 'form-control',
                    'type' => 'text',
                    'autoComplete' => 'off',
                    'placeholder' => 'Nama Pengguna'
                );
                echo form_input($data) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php echo form_error('username', '<code>', '</code>'); ?>
            </div>
            <div class="form-group has-feedback">
                <!-- <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi"> -->
                <?php $data = array(
                    'name' => 'password',
                    'set_value' => 'password',
                    'class' => 'form-control',
                    'type' => 'password',
                    'autoComplete' => 'off',
                    'placeholder' => 'Kata Sandi'
                );
                echo form_input($data) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_error('password', '<code>', '</code>'); ?>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <a href="<?= base_url('auth'); ?>" class="btn bg bg-maroon btn-block btn-flat"> Kembali</a>
                </div>
                <div class="col-xs-4"></div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>