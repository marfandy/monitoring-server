<table class="table browser m-t-30 no-border">
    <thead class="table table-hover">
        <tr>
            <td>#</td>
            <td>Host</td>
            <td>Address</td>
            <td>Conncetion</td>
            <td>Web Server</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($address as $a) : ?>
            <tr>
                <td style="width:40px"><img src="<?= base_url('/assets/images/kategori/' . $a['img_kat']) ?>" width="40" class="img-circle"></td>
                <td><?= $a['device_name']; ?></td>
                <td><?= $a['address']; ?></td>
                <td align="right"><span class="badge badge-pill badge-<?= ($a['status'] == 'Connect') ? 'success' : 'danger'; ?>"><?= $a['status']; ?></span></td>
                <td align="right"><span class="badge badge-pill badge-<?= ($a['http'] == 'Connect') ? 'success' : 'danger'; ?>"><?= $a['http']; ?></span></td>
            </tr>
        <?php endforeach; ?>
        <?php if (!$address) : ?>
            <tr>
                <td colspan="5">no records found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>