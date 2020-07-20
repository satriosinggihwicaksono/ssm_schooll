<style>
.presensi {
  width: 100%;
  height: 800px;
  overflow: scroll;
}

tr.border_bottom td {
  border-bottom:1pt solid black;
}
</style>
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="tipe" id="tipe" class="form-control tipe">
                                                <option value="0">BULAN SPP</option>
                                                <option value="1">TANGGAL INPUT</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control format_tanggal" id="tanggal_awal" name="tanggal_awal"  value="<?=date('d-m-Y')?>">
                                        </div>
                                        <div class="col-md-1">
                                            <label>s.d.</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control format_tanggal_3" id="tanggal_akhir" name="tanggal_akhir" value="<?=date('d-m-Y')?>">
                                        </div>
                                    </div>   
                                </div>  
                                 
                                <div class="col-md-12">  
                                    <div class="row">
                                        <div class="form-group" style="margin-right:20px">
                                            <label> <b>Kelas</b> </label>
                                            <br>
                                            <select name="kelas" class="form-control kelas">
                                                <option value="-">SEMUA</option>
                                                <?php foreach($class as $k){ ?>
                                                <option  <?php if($k['code'] == $kelas){echo 'selected="selected"';} ?> value="<?=$k['code']?>"><?=$k['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> <b>Murid</b> </label>
                                            <br>
                                            <select name="murid" class="form-control murid">
                                                <option value="-">SEMUA</option>
                                                <?php foreach($student as $m){ ?>
                                                <option <?php if($m['code'] == $murid){echo 'selected="selected"';} ?> value="<?=$m['code']?>"><?=$m['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>    
                                </div>    
                                    <button class="btn btn-success" onclick="searchspp()" ><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-secondary" style="margin-top:0px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            Jumlah Data
                                        </div>
                                        <div class="col-md-5">
                                           <b><?php if(!empty($data['data'])) echo count($data['data'])?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            Total SPP
                                        </div>
                                        <div class="col-md-5">
                                            <?php $total = array(); 
                                                if(!empty($data['data'])){
                                                    foreach($data['data'] as $d){
                                                        $total[] = $d['amount_payment'];
                                                    }
                                                }
                                            ?>
                                              <b><?=number_format(array_sum($total), 0, ".", ".")?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="presensi">
                        <div class="row">
                            <div class="col-md-12">    
                                <table class="table" id="tandaitabelnya" style="text-align:center; width:100%;">
                                    <thead>
                                    <tr style="background-color:#5fdde5">
                                        <th>NO.</th>
                                        <th>BULAN SPP</th>
                                        <th>TANGGAL INPUT</th>
                                        <th>KETERANGAN</th>
                                        <th>NOMINAL (Rp)</th>
                                        <th>MURID</th>
                                        <th>KELAS</th>
                                        <th>SUB KELAS</th>
                                        <th>CATATAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(!empty($data)){
                                            $x = 1;
                                            foreach($data['data'] as $d){
                                        ?>
                                        <tr class="border_bottom">
                                            <td><?=$x++?></td>
                                            <td><?=date('M Y',strtotime($d['dtm_payment']))?></td>
                                            <td><?=date('d M Y H:i',strtotime($d['dtm_input_payment']))?></td>
                                            <td><?=$d['ref_id']. '/ '.$d['payment_type'].' / '.$d['payment_name']?></td>
                                            <td><?=number_format($d['class_price'], 0, ".", ".")?></td>
                                            <td>( <?=$d['KODEMURID']?> ) <?=$d['NAMAMURID']?></td>
                                            <td><?=$d['NAMAKELAS']?></td>
                                            <td><?=$d['NAMASUBCLASS']?></td>
                                            <td><?=$d['description']?></td>
                                        </tr>
                                    <?php
                                            }
                                        } 
                                    ?>
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

<script type="text/javascript">
$('#tanggal_awal').val('<?= $tanggal_awal ?>');
$('#tanggal_akhir').val('<?= $tanggal_akhir ?>');
$('#tipe').val('<?= $tipe ?>');
function searchspp(){
    var tipe = $('#tipe').val();
	var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var kelas = $('.kelas').val();
    var murid = $('.murid').val();
    window.location="<?=base_url()?>SPP/index/"+tanggal_awal+"/"+tanggal_akhir+"/"+kelas+"/"+murid+"/"+tipe;    
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
