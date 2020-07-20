<style>
.presensi {
  width: 100%;
  height: 800px;
  overflow: scroll;
}
</style>
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group" style="margin-right:20px">
                                    <label for="Bulan" class="end"> <b>BULAN</b> </label>
                                    <select name="bulan" id="bulan" class="form-control enddate">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
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
                                    <label for="TAHUN" class="start"> <b>TAHUN</b> </label>
                                    <select name="tahun" id="tahun" class="form-control startdate">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option selected value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-right:20px">
                                    <label> <b>KELAS</b> </label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="-">SEMUA</option>
                                        <?php foreach($class as $k){ ?>
                                        <option <?php if($k['code'] == $kelas){echo 'selected';} ?> value="<?=$k['code']?>"><?=$k['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-right:20px">
                                    <label> <b>BINTANG</b> </label>
                                    <select name="star" id="star" class="form-control">
                                        <option value="-">SEMUA</option>
                                        <?php
                                            $star = array(1,2,3,4,5); 
                                            foreach($star as $s){ 
                                        ?>
                                        <option <?php if($s == $star){echo 'selected';} ?> value="<?=$s?>"><?=$s?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button style="margin-top:28px" onclick="search()" type="button" class="btn btn-success btn-block"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="presensi">
                        <div class="row">
                            <div class="col-md-12">    
                                <table class="table"  id="tandaitabelnya" style="text-align:left; width:1600px;">
                                    <thead>
                                    <tr style="background-color:#FFA07A">
                                        <th style="width:1%;"><i class="fas fa-star"></i> REWARD</th>
                                        <th style="width:1%;">PENGAJAR</th>
                                        <th style="width:7%;">NAMA</th>
                                        <th style="width:1%;">KELAS</th>
                                        <th style="width:1%;">SUBKELAS</th>
                                        <th style="width:2%;">HARI / JAM / DATANG</th>
                                        <th style="width:1%;">STUDIO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $x = 1; 
                                            foreach($data as $d){ 
                                        ?>
                                        <tr>
                                            <td style="text-align:center;">
                                                <i style="color:yellow;" class="fas fa-star"></i> <?=$d['star']?> 
                                                <?php if($d['star_teacher'] != 0){ ?>
                                                / <i style="color:#12c53a;" class="fas fa-star"></i> <?=$d['star_teacher']?>
                                                <?php } ?>
                                            </td>
                                            <td><?=$d['NAMAGURU']?></td>
                                            <td><b>(<?=$d['KODEMURID']?>)</b> <?=$d['NAMAMURID']?></td>
                                            <td><?=$d['KELASNAME']?></td>
                                            <td><?=$d['NAMASUBCLASS']?></td>
                                            <td style="text-align:center;">
                                            <?php 
                                            $cek_hari = array(
                                                'Sun' => "Minggu",
                                                'Mon' => "Senin",
                                                'Tue' => "Selasa",
                                                'Wed' => "Rabu",
                                                'Thu'=> "Kamis",
                                                'Fri' => "Jumat",
                                                'Sat' => "Sabtu",
                                            );
                                            $hari = date('D',strtotime($d['dtm_presence']));
                                            $hari = $cek_hari[$hari];
                                            echo $hari .' '. date('H:i',strtotime($d['subclass_theTime'])).' / '.date('H:i',strtotime($d['dtm_presence']));
                                            ?>
                                            </td>
                                            <td style="text-align:center;"><?=$d['studio_name']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
$('#star').val('<?= $star2 ?>');

function search(){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var kelas = $('#kelas').val();
    var star = $('#star').val();
    window.location="<?=base_url()?>Verifikasi_Murid/index/"+bulan+"/"+tahun+"/"+kelas+"/"+star;    
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tandaitabelnya').on('click','tr',function(){
            $(this).addClass('terpilih');
            $(this).siblings().removeClass("terpilih");
        });
    });
</script>
