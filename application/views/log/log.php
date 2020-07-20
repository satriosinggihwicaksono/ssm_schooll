<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Log Akun</b></label>
                        <select id="tipe" name="tipe" class="form-control startdate">
                            <option value="pengajar">Pengajar</option>
                            <option value="murid">Murid</option>
                        </select>
                    </div>    
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                    <?php if($this->uri->segment(2) == 'pengajar'){ ?>
                        <table class="table" id="datalogteacher">
                    <?php } else { ?>
                        <table class="table" id="datalogstudent">
                    <?php } ?>
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Login Terakhir</th>
                                    <th>Semua / Hari ini</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered"></tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<script>
$('#tipe').val('<?= $this->uri->segment(2) ?>');
$('#tipe').change(function() {
    var tipe = $(this).val();
    window.location="<?=base_url()?>Log/"+tipe;  
});
</script>