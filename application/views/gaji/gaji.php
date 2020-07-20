<style>
.presensi {
  width: 100%;
  height: 800px;
  overflow: scroll;
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
                                <div class="col-md-3">
                                    <input type="text" class="form-control format_tanggal" id="tanggal_awal" name="tanggal_awal"  value="<?=date('d-m-Y')?>">
                                </div>
                                <div class="col-md-1">
                                    <label>s.d.</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control format_tanggal_2" id="tanggal_akhir" name="tanggal_akhir" value="<?=date('d-m-Y')?>">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success m-editkas" onclick="search()"><i class="fas fa-search"></i> Cari</button>
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
                                            <b><?=$hasil['jumlah']?></b>         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            Total Penarikan
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=number_format($hasil['total'], 0, ".", ".");?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                    <hr>
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <div class="presensi">
                        <div class="row">
                            <div class="col-md-12">    
                                <table class="table" id="tandaitabelnya" style="text-align:center; width:1400px;">
                                    <thead>
                                        <tr style="background-color:#FFA07A">
                                            <th style="width:1%">NO.</th>
                                            <th>TGL. PENARIKAN</th>
                                            <th>PERIODE GAJI</th>
                                            <th>STAFF</th>
                                            <th>FEE PRESENSI</th>
                                            <th>(+) GAJI</th>
                                            <th>(-) GAJI</th>
                                            <th>GAJI DITERIMA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember',);
                                        $no = 1; 
                                        if(!empty($hasil['data'])){
                                        foreach($hasil['data'] as $h){ 
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=date('d/m/Y',strtotime($h['datetime']))?></td>
                                            <td><?=$bulan[(int)date('m',strtotime($h['datetime_salary']))].' '.(int)date('Y',strtotime($h['datetime_salary']))?></td>
											<td><b>(<?=$h['teacher_code']?>)</b> <?=$h['name']?></td>
                                            <td><?=number_format($h['salary'], 0, ".", ".");?></td>
                                            <td><?=number_format($h['salary_extra'], 0, ".", ".");?></td>
                                            <td><?=number_format($h['salary_deductions'], 0, ".", ".");?></td>
                                            <td><b><?=number_format($h['salary_total'], 0, ".", ".");?></b></td>
                                        </tr>
                                    <?php
                                        } 
                                    } ?>    
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

function search(){
	var awal = $('#tanggal_awal').val();
    var akhir = $('#tanggal_akhir').val();
    window.location="<?=base_url()?>Gaji/index/"+awal+"/"+akhir;    
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
