<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="ribbon-wrapper card">
            <div class="ribbon ribbon-bookmark  ribbon-default">
                Form Edit Host
            </div>
            <div class="ribbon-content card-body">
                <form action="<?= base_url('/host/update/' . $address['id_address']); ?>" class="form-horizontal" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $address['slug']; ?>">
                    <div class="form-body">
                        <h3 class="box-title">New Address</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Host Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="device_name" onkeyup="this.value = this.value[0].toUpperCase() + this.value.slice(1);" value="<?= (old('device_name')) ? old('device_name') : $address['device_name']; ?>" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Domain/IP</label>
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="kat" id="kat" onchange="myFunction(event)">
                                            <option value="Domain">Domain</option>
                                            <option value="IP">IP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="domain" name="address" placeholder="domain.com" />
                                        <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="ip" name="inputip" placeholder="xxx.xxx.xxx.xxx" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('address'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="location" onkeyup="this.value = this.value[0].toUpperCase() + this.value.slice(1);" value="<?= (old('location')) ? old('location') : $address['location']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="categori">
                                            <option value="">--SELECT CATEGORY--</option>
                                            <?php foreach ($kategori as $k) : ?>
                                                <option <?= ($address['categori'] == $k['name']) ? 'selected' : ''; ?> value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" id="back" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($address['categori']) : ?>
        <?php endif; ?>
        $('#ip').hide();
        var ipv4_address = $('#address');
        ipv4_address.inputmask({
            alias: "ip",
            greedy: false
        });
    });

    function myFunction(e) {
        if ($('#kat').val() == 'IP') {
            $('#ip').attr('name', 'address');
            $('#ip').show();
            $('#domain').attr('name', '');
            $('#domain').hide();
            $('#domain').val('');
        } else if ($('#kat').val() == 'Domain') {
            $('#domain').attr('name', 'address');
            $('#domain').show();
            $('#ip').attr('name', '');
            $('#ip').hide();
            $('#ip').val('');
        }
    }
    $('#back').click(function() {
        location.href = "<?= base_url('host'); ?>";
    });
</script>



<?= $this->endSection(); ?>