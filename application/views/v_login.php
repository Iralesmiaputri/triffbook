<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>Login | TriffBook</title>
    <link href="<?php echo base_url().'/assets/dist/img/jamkrida2.png' ?>" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/dist/img/jamkrida2.png'); ?>");
            background-repeat: no-repeat;
            background-size: 50%;
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
<div class="row justify-content-center mt-5 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">TriffBook</h1>
                                <span class="text-muted">Login</span>
                                <?php
                                if(isset($_GET['alert'])){
                                    if($_GET['alert']=="gagal"){
                                        echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Username & Password
                                        Salah / Belum divalidasi.</div>";
                                    }else if($_GET['alert']=="belum_login"){
                                        echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Login Terlebih
                                        Dulu!</div>";
                                    }else if($_GET['alert']=="logout"){
                                        echo "<div class='alert alert-success font-weight-bold text-center'>Anda Telah Logout!</div>";
                                    }else if($_GET['alert']=="berhasil_regist"){
                                        echo "<div class='alert alert-success font-weight-bold text-center'>Registrasi Berhasil <br> cek email anda untuk melihat username & password
                                        </div>";
                                    }else if($_GET['alert']=="gagal_regist"){
                                        echo "<div class='alert alert-danger font-weight-bold text-center'>Nik sudah terdaftar</div>";
                                    }
                                }
                                ?>
                            </div>
                            <form action="<?php echo base_url().'login/aksi' ?>" method="post">
                            <div class="form-group">
                                <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password"required>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                            <div class="text-center mt-4">
                                <a class="small" href="<?php echo base_url().'login/regist'; ?>">Buat Akun!</a>
                            </div>
                            <hr>
                            <?= form_close(); ?>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
