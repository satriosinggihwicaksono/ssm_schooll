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
                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label> <b>TANGGAL AWAL</b></label>
                                                <input type="text" class="form-control format_tanggal" id="tanggal_awal" name="tanggal_awal"  value="<?=date('d-m-Y')?>">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <label>s.d.</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label> <b>TANGGAL AKHIR</b></label>
                                                <input type="text" class="form-control format_tanggal_3" id="tanggal_akhir" name="tanggal_akhir" value="<?=date('d-m-Y')?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">  
                                            <div class="form-group" >
                                                <label> <b>KELAS</b></label>
                                                <select name="kelas" class="form-control kelas">
                                                    <option value="-">SEMUA</option>
                                                    <?php foreach($class as $k){ ?>
                                                    <option  <?php if($k['code'] == $kelas){echo 'selected="selected"';} ?> value="<?=$k['code']?>"><?=$k['name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-md-2">
                                            <div class="form-group" >
                                                    <br>
                                                <button class="btn btn-success" onclick="searchspp()" ><i class="fas fa-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>   
                                </div>  
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
                                            Total Ujian
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
                    <div class="row">
                        <div class="col-md-12">    
                            <table class="table" id="tandaitabelnya" style="text-align:center; width:100%;">
                                <thead>
                                <tr style="background-color:#5fdde5">
                                    <th>NO.</th>
                                    <th>TANGGAL INPUT</th>
                                    <th>KETERANGAN</th>
                                    <th>MURID</th>
                                    <th>KELAS</th>
                                    <th>SUB KELAS</th>
                                    <th>PEMBAYARAN (Rp)</th>
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
                                        <td><?=date('d-m-Y H:i',strtotime($d['dtm_payment']))?></td>
                                        <td><?=$d['ref_id']. '/ '.$d['payment_type'].' / '.$d['payment_name']?></td>
                                        <td>( <?=$d['KODEMURID']?> ) <?=$d['NAMAMURID']?></td>
                                        <td><?=$d['NAMAKELAS']?></td>
                                        <td><?=$d['NAMASUBCLASS']?></td>
                                        <td><?=number_format($d['amount_payment'], 0, ".", ".")?></td>
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
    window.location="<?=base_url()?>Private_page/index/"+tanggal_awal+"/"+tanggal_akhir+"/"+kelas;    
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
