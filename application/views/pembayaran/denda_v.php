<style>
table, th, td {
  border-bottom: 1px solid black;
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>TANGGAL AWAL</b></label>
                                        <input type="text" class="form-control format_tanggal" id="tanggal_awal" name="tanggal_awal"  value="<?=date('d-m-Y')?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                       <br><label>s.d.</label>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b>TANGGAL AWAL</b></label>
                                       <input type="text" class="form-control format_tanggal_2" id="tanggal_akhir" name="tanggal_akhir" value="<?=date('d-m-Y')?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><b>STATUS DENDA</b></label>
                                        <select class="form-control" name="status_denda" id="status_denda">
                                            <option value="">SEMUA</option>
                                            <option value="1">TELAH DIBAYAR</option>
                                            <option value="2">BELUM DIBAYAR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br><button class="btn btn-success m-editkas" onclick="search_date()"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-secondary" style="margin-top:0px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            Jumlah Data
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=COUNT($data['data'])?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            Total Denda 
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=number_format($data['total'], 0, ".", ".")?></b>
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
                                <table class="table" id="tandaitabelnya" style="text-align:left; width:100%">
                                    <thead>
                                    <tr style="background-color:#5fdde5">
                                        <th>NO.</th>
                                        <th>TANGGAL PEMBAYARAN</th>
                                        <th>MURID</th>
                                        <th>KELAS</th>
                                        <th>SUBKELAS</th>
                                        <th>REF. ID</th>
                                        <th>LAMA HARI</th>
                                        <th>DENDA (Rp)</th>
                                        <th>STATUS DENDA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    foreach($data['data'] as $d){
                                    ?>
                                    <tr style="text-align:center">
                                        <td><?=$x++?></td>
                                        <td><?=date('d-m-Y H:i',strtotime($d['dtm_input_payment']))?></td>
                                        <td><?=$d['NAMAMURID']?></td>
                                        <td><?php if(!empty($d['kelasname'])) echo $d['kelasname']?></td>
                                        <td><?php if(!empty($d['subkelasname'])) echo $d['subkelasname']?></td>
                                        <td><?=$d['ref_id_payment']?></td>
                                        <td><?=$d['fine_days']?></td>
                                        <td style="text-align:right;"><?=number_format($d['fine_amount'], 0, ".", ".")?></td>
                                        <td><?=$d['fine_status']?></td>
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
$('#tanggal_awal').val('<?= $tanggal_awal ?>');
$('#tanggal_akhir').val('<?= $tanggal_akhir ?>');
$('#status_denda').val('<?= $status ?>');

function search_date(){
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var status = $('#status_denda').val();
    window.location="<?=base_url()?>Denda/index/"+tanggal_awal+"/"+tanggal_akhir+"/"+status;    
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
