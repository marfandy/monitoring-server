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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/assets/images/favicon.png') ?>">
    <title>Network Monitoring System | <?= $title; ?></title>
    <!-- This page CSS -->
    <!-- This page CSS -->
    <link href="<?= base_url('/assets/node_modules/morrisjs/morris.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('/assets/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url('/assets/dist/css/pages/dashboard1.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/dist/css/pages/ribbon-page.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/node_modules/footable/css/footable.core.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/dist/css/pages/footable-page.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="<?= base_url('/assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src='<?= base_url('/assets/dist/js/jquery.inputmask.bundle.js'); ?>'></script>

</head>

<body class="skin-blue fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">NMS ...</p>
        </div>
    </div>
    <div id="main-wrapper">
        <?= $this->include('layout/navbar'); ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?= $title; ?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <?php $uri = service('uri', base_url(uri_string())); ?>
                                <?php if ($uri->getSegment(2) == false) : ?>
                                    <li class="breadcrumb-item active" style="text-transform: capitalize;"><?= $uri->getSegment(1); ?></a></li>
                                <?php else : ?>
                                    <li class="breadcrumb-item"><a href="<?= base_url($uri->getSegment(1)); ?>" style="text-transform: capitalize;"><?= $uri->getSegment(1); ?></a></li>
                                    <li class="breadcrumb-item active" style="text-transform: capitalize;"><?= $uri->getSegment(2); ?></li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <footer class="footer">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> | Network Monitoring System by
            Dhimas Novergus
        </footer>
    </div>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url('/assets/node_modules/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('/assets/dist/js/perfect-scrollbar.jquery.min.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('/assets/dist/js/waves.js') ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('/assets/dist/js/sidebarmenu.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('/assets/dist/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('/assets/node_modules/footable/js/footable.all.min.js'); ?>"></script>
    <!--FooTable init-->
    <script src="<?= base_url('/assets/dist/js/pages/footable-init.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>

</html>