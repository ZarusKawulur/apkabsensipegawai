<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | AbsensiKaryawan</title>

    <!-- Custom fonts for this template-->"
    <link href="<?=base_url('sb/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('sb/css/sb-admin-2.min.css')?>" rel="stylesheet">
    
</head>

<body class="bg-gradient-primary">

    <div class="container mt-5 vol-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body mb-3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="<?= base_url('login/login')?>" method="POST">
                                        <?php if (session()->getFlashdata('eror')){ ?>
                                            <div class="alert alert-danger">   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> </button>
                                                <?php echo session()->getFlashdata('eror') ?>
                                            </div>
                                        <?php } ?>

                                        <div class="md-3">
                                            <label for="Inputusername" class="form-label"> Username</label>
                                            <input type="text" name="username" class="form-control"
                                                id="Inputusername" value="<?php echo session()->getFlashdata('username') ?>"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="md-3">
                                            <label for="Inputpassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="InputPassword" placeholder="Password">
                                        </div>
                                       
                                        <hr>
                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="LOGIN">
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        
                                    </div>
                                    <div class="text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('sb/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('sb/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('sb/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('sb/js/sb-admin-2.min.js')?>"></script>

</body>

</html>