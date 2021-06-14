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
                                <a href="<?= base_url('user/create'); ?>" class="btn btn-primary btn-sm">Add new</a>
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
                        <th>Full Name</th>
                        <th>Username</th>
                        <!-- <th>Password</th> -->
                        <th>level</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <tr class="my-2">
                                <td><?= $no++; ?></td>
                                <td><?= $u['firstname'] . ' ' . $u['lastname']; ?></td>
                                <td><?= $u['username']; ?></td>
                                <!-- <td><?= $u['passwd']; ?></td> -->
                                <td><?= $u['level']; ?></td>
                                <td data-toggle="tooltip" data-placement="top" data-original-title="<?= ($u['last_online'] != null) ? date('d | M Y h:i', strtotime($u['last_online'])) : 'Never'; ?>">
                                    <?php if ($u['last_online'] == NULL) : ?>
                                        Never
                                    <?php else : ?>
                                        <?= timeAgo(strtotime($u['last_online'])); ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('user/edit/' . $u['id_user']); ?>" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit User" class="btn btn-secondary btn-circle">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="<?= base_url('user/' . $u['id_user']); ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" class="btn btn-danger btn-circle">
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