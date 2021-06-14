<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg col-md">
        <div class="card">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="card-header bg-success" id="flash">
                    <h4 class="m-b-0 text-white"><?= session()->getFlashdata('message'); ?></h4>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="m-t-10">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <div class="form-group">
                                <a href="<?= base_url('host/create'); ?>" class="btn btn-primary btn-sm">Add new</a>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="form-group">
                                <input id="demo-input-search2" type="text" placeholder="Search" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>#</th>
                        <th>Host Name</th>
                        <th>IP</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($address as $a) : ?>
                            <tr class="my-2">
                                <td><?= $no++; ?></td>
                                <td><?= $a['device_name']; ?></td>
                                <td><?= $a['address']; ?></td>
                                <td><?= $a['location']; ?></td>
                                <td><?= $a['categori']; ?></td>
                                <td>
                                    <a href="<?= base_url('host/edit/' . $a['slug']); ?>" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Host" class="btn btn-secondary btn-circle">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="<?= base_url('host/' . $a['id_address']); ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Host" class="btn btn-danger btn-circle">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#flash').fadeOut(8000);
    });
</script>

<?= $this->endSection(); ?>