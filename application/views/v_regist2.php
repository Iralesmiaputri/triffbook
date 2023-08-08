<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi</title>
      <link href="<?php echo base_url();?>assets/dist/img/jamkrida2.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/finance_0bdk.svg'); ?>");
            background-repeat: no-repeat;
            background-size: 80%;
        }
    </style>
</head>


<body class="bg-gradient-primary">

    <div class="container">



    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <div class="p-4">
                    <div class="text-center mb-4">                  
                <div class='alert alert-danger font-weight-bold text-center'>
                <?php foreach($nik as $p){ ?>
                    NIK sudah Terdaftar<br>
                    NIK : <?php echo $p->pengguna_ktp; ?><br>
                    Nama : <?php echo $p->pengguna_nama; ?><br>
                    E-Mail : <?php echo $p->pengguna_email; ?><br>
                <?php }?> 

                </div>
                        <h1 class="h4 text-gray-900"><img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" width='5%'> TriffBook</h1>
                        <span class="text-muted">Buat Akun</span>
                    </div>
                    <form method="post" action="<?php echo base_url('login/regist_aksi') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password (Min 8 Karakter)" required>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="konfirmasi_password" class="form-control form-control-user" placeholder="Konfirmasi Password" required="">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('nama'); ?>" type="text" name="nama" class="form-control form-control-user" placeholder="Nama" required>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                     <div class="form-group">
                        <input value="<?= set_value('email'); ?>" type="email" name="email" class="form-control form-control-user" placeholder="E-mail" required>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('ktp'); ?>" type="text" name="ktp" class="form-control form-control-user" placeholder="Nik KTP" required>
                        <?= form_error('ktp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                   <div class="form-group">
                        <label>Upload KTP</label>
                        <input type="file" name="sampul" required>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('rek'); ?>" type="text" name="rek" class="form-control form-control-user" placeholder="No Rekening (*Jika Ada)">
                        <?= form_error('rek', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Daftar
                    </button>
                    <div class="text-center mt-4">
                        <a class="small" href="<?= base_url('login') ?>">Sudah punya akun? Login</a>
                    </div>
                    <?= form_close(); ?>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>