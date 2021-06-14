<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/assets/images/favicon.png'); ?>">
    <title>Login Page | Report Bulanan</title>
    <!-- page css -->
    <link href="<?= base_url('/assets/dist/css/pages/login-register-lock.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('/assets/dist/css/style.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet">
</head>
<style type="text/css">
    body {
        background: linear-gradient(to bottom, rgba(22, 22, 22, 0.3) 0%, rgba(22, 22, 22, 0.7) 75%, #161616 100%), url("<?= base_url(); ?>/assets/images/login.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }
</style>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">NMS ...</p>
        </div>
    </div>
    <section id="wrapper" class="login-register login-sidebar">
        <div class="container">
            <div class="login-box card">
                <div class="card-body m-t-40">
                    <form method="POST" action="<?= base_url('auth/cek_login'); ?>" class="text-center">
                        <h3 class=" box-title m-b-20 m-t-40">Network Monitoring System</h3>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" type="text" id="username" name="username" placeholder="Username">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control <?= ($validation->hasError('passwd')) ? 'is-invalid' : ''; ?>" value="<?= old('passwd'); ?>" type="password" id="passwd" name="passwd" placeholder="Password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('passwd'); ?>
                                </div>
                            </div>
                        </div>
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-danger alert-rounded text-center">
                                <p class="m-b-0 text-black"><?= session()->getFlashdata('message'); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url('/assets/node_modules/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('/assets/node_modules/popper/popper.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {
            var conn = new WebSocket('ws://localhost:8081');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };
            conn.onmessage = function(e) {
                console.log(e.data);
            };
        });
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>