<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg col-md">
        <div class="card">
            <div class="card-body">

                <table id="example" class="table table-hover">
                    <thead class="text-warning">
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                        ?>
                        <?php $no = 1; ?>
                        <?php foreach ($log as $logs) : ?>
                            <tr class="my-2">
                                <td><?= $no++; ?></td>
                                <td><?= date('d | M Y h:i', strtotime($logs['created_at'])); ?></td>
                                <td><?= $logs['device_name']; ?></td>
                                <td><?= $logs['address']; ?></td>
                                <td><?= $logs['location']; ?></td>
                                <td style="color:<?= ($logs['status'] == 'Connect') ? "green" : "red"; ?>"><?= $logs['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
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