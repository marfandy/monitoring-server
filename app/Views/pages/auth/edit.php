<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="ribbon-wrapper card">
            <div class="ribbon ribbon-bookmark  ribbon-default">
                Form Edit Username - <?= $user['username']; ?>
            </div>
            <div class="ribbon-content card-body">
                <form action="<?= base_url('user/update/' . $user['id_user']); ?>" class="form-horizontal" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    <input type="hidden" name="username" value="<?= $user['username']; ?>">

                    <div class="form-body">
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : ''; ?>" name="firstname" onkeyup="this.value = this.value[0].toUpperCase() + this.value.slice(1);" value="<?= (old('firstname')) ? old('firstname') : $user['firstname']; ?>" placeholder="First Name" autofocus>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('firstname'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" onkeyup="this.value = this.value[0].toUpperCase() + this.value.slice(1);" value="<?= (old('lastname')) ? old('lastname') : $user['lastname']; ?>" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control <?= ($validation->hasError('passwd')) ? 'is-invalid' : ''; ?>" name="passwd" id="passwd" value="" placeholder="Password">
                                        <div class="invalid-feedback" id="feedPass">
                                            <?= $validation->getError('passwd'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control <?= ($validation->hasError('confirmPasswd')) ? 'is-invalid' : ''; ?>" name="confirmPasswd" id="confirmPasswd" value="" placeholder="Confirm Password">
                                        <div class="invalid-feedback" id="feedConPass">
                                            <?= $validation->getError('confirmPasswd'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Level</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" name="level" id="level">
                                            <option value="">--SELECT LEVEL--</option>
                                            <option <?= ($user['level'] == 'Admin') ? 'selected' : ''; ?> value="Admin">Admin</option>
                                            <option <?= ($user['level'] == 'User') ? 'selected' : ''; ?> value="User">User</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('level'); ?>
                                        </div>
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
                                        <button type="submit" class="btn btn-success">Submit</button>
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
        $('#passwd, #confirmPasswd').on('keyup', function() {
            if ($('#passwd').val() == $('#confirmPasswd').val()) {
                $("#passwd").attr('class', 'form-control is-valid');
                $("#feedPass").attr('class', 'valid-feedback');
                $('#feedPass').html('Matching');
                $("#confirmPasswd").attr('class', 'form-control is-valid');
                $("#feedConPass").attr('class', 'valid-feedback');
                $('#feedConPass').html('Matching');
            } else {
                $("#passwd").attr('class', 'form-control is-invalid');
                $("#confirmPasswd").attr('class', 'form-control is-invalid');
                $("#feedPass").attr('class', 'invalid-feedback');
                $("#feedConPass").attr('class', 'invalid-feedback');
                $('#feedConPass').html('Not Matching');
                $('#feedPass').html('Not Matching');
            }
        });
    });
    $('#back').click(function() {
        location.href = "<?= base_url('user'); ?>";
    })
</script>

<?= $this->endSection(); ?>