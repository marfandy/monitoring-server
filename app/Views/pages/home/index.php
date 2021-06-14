<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<?php if (session()->getFlashdata('message')) : ?>
    <div class="col-lg-12">
        <div class="card" id="flash">
            <div class="row">
                <div class="col-lg col-md">
                    <div class="card-header bg-cyan">
                        <h4 class="m-b-0 text-white"><?= session()->getFlashdata('message'); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fa fa-sitemap"></i></h3>
                            <p class="text-muted">TOTAL HOST</p>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="total">
                                <h2 class="counter text-primary"><?= $totalhost; ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fa fa-link"></i></h3>
                            <p class="text-muted">CONNECTED</p>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="connect">
                                <h2 class="counter text-cyan"><?= $connect; ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: <?= ($connect / $totalhost) * 100; ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fa fa-unlink"></i></h3>
                            <p class="text-muted">DISCONNECTED</p>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="disconnect">
                                <h2 class="counter text-purple"><?= $disconnect; ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: <?= ($disconnect / $totalhost) * 100; ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fa fa-globe"></i></h3>
                            <p class="text-muted">HTTP RESPONSE OK</p>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="http">
                                <h2 class="counter text-success"><?= $http; ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($http / $totalhost) * 100; ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg col-md">
        <div class="card col-md-7 mx-auto">
            <div class="card-body">
                <div class="showdata" id="">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function dataconnection(status) {
        $.ajax({
            url: "<?= site_url('home/getdata'); ?>",
            method: "POST",
            data: {
                status: status
            },
            dataType: "json",
            success: function(response) {
                $('.showdata').html(response.data);
                // setTimeout(dataconnection, 10000);
                console.log(status);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }

    $('#total').click(function() {
        // var status = false;
        dataconnection()
    });
    $('#connect').click(function() {
        var status = 'Connect';
        dataconnection(status)
    });
    $('#disconnect').click(function() {
        var status = 'Disconnect';
        dataconnection(status)
    });
    $('#http').click(function() {
        var status = 'http';
        dataconnection(status)
    });

    $(document).ready(function() {
        $('#flash').fadeOut(10000);
    });
</script>
<?= $this->endSection(); ?>