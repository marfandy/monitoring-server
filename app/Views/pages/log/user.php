<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg col-md">
        <div class="card">
            <div class="card-body">
                <!-- <div class="m-t-10">
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
                </div> -->
                <table id="example" class="table table-hover">
                    <thead class="text-warning">
                        <th>#</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Activity</th>
                    </thead>
                    <tbody>
                        <?php //$no = 1 + (10 * ($currentPage - 1)); 
                        ?>
                        <?php $no = 1; ?>
                        <?php foreach ($log as $logs) : ?>
                            <tr class="my-2">
                                <td><?= $no++; ?></td>
                                <td><?= date('d | M Y h:i', strtotime($logs['created_at'])); ?></td>
                                <td><?= $logs['user']; ?></td>
                                <?php
                                ?>
                                <td style="color : <?php if (strpos($logs['action'], 'Delete') !== false) {
                                                        echo 'red';
                                                    } elseif (strpos($logs['action'], 'Update') !== false) {
                                                        echo 'orange';
                                                    } else {
                                                        echo 'green';
                                                    } ?>"><?= $logs['action']; ?>
                                </td>
                                <td><?= $logs['activity']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php // echo $pager->links('logUser', 'pager') 
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection(); ?>