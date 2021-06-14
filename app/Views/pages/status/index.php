<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg col-md">
        <div class="card col-md-7 mx-auto">
            <div class="card-body">
                <div class="form-group row pull-right">
                    <div class="col-md-12 text-center">
                        <select class="form-control custom-select" name="categori" id="categori">
                            <option value="">Categori (ALL)</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="showdata" id="">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function dataconnection() {
        var id = $('#categori').val();
        $.ajax({
            url: "<?= site_url('status/getdata'); ?>",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.showdata').html(response.data);
                setTimeout(dataconnection, 10000);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }
    $(document).ready(function() {
        $('#categori').change(function() {
            dataconnection();
        });
        dataconnection();
        $('#flash').fadeOut(8000);
    });
</script>

<?= $this->endSection(); ?>