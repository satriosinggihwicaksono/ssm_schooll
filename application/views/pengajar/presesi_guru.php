<link rel="stylesheet" href="<?=base_url().'components/assets/';?>css/fullcalendar.css">
<style>
    .fc-title{
        color:#fff;
        font-size:11px;
    }
</style>

<section class="section">
    <div class="section-header" style="display: none;">
        <h1>Presensi Pengajar</h1>
    </div>

    <div class="section-body">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group" style="margin-right:20px">
                                    <label> <b>TAHUN</b> </label>
                                    <select name="tahun" id="tahun" class="form-control startdate">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option selected value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                                
                                <div class="form-group" style="margin-right:20px">
                                    <label> <b>BULAN</b> </label>
                                    <select name="bulan" id="bulan" class="form-control enddate">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option selected value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>

                                <div class="form-group" style="margin-right:20px">
                                    <label> <b>Guru</b> </label>
                                    <select name="teacher" id="teacher" class="form-control">
                                        <?php foreach($teacher as $t){ ?>
                                        <option value="<?=$t['code']?>"><?=$t['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button style="margin-top:30px" type="button" onclick="search_absensi()" class="btn btn-success btn-block"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div style="width:100%; max-width:100%; display:inline-block;">
                                <div id='calendar'></div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </div>        
    </div>
    </div>
</section>

<script>
$('#tahun').val('<?= $tahun ?>');
$('#bulan').val('<?= $bulan ?>');
$('#teacher').val('<?= $kode ?>');
function search_absensi(){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var teacher = $('#teacher').val();

    window.location="<?=base_url()?>Presensi_Pengajar/detail_presesi/"+bulan+"/"+tahun+"/"+teacher;    
}
</script>