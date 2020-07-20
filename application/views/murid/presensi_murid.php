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
                                <div class="form-group" style="margin-right:20px">
                                    <label for="Bulan" class="end"> <b>BULAN</b> </label>
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
                                    <label> <b>Kelas</b> </label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="">SEMUA</option>
                                        <?php foreach($class as $k){ ?>
                                        <option value="<?=$k['code']?>"><?=$k['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button style="margin-top:28px" onclick="search_date()" type="button" class="btn btn-success btn-block"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button href="javascript:void(0)" style="margin-top:20px" data-toggle="modal" data-target=".modal-cekabsen" type="button" class="btn btn-info btn-block m-cekabsen">Pencarian Murid Belum Absen</button>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="presensi">
                        <div class="row">
                            <div class="col-md-12">    
                                <table class="table" style="text-align:left; width:1400px;">
                                    <thead>
                                    <tr style="background-color:#FFA07A">
                                        <th style="width:1%">KODE</th>
                                        <th>NAMA</th>
                                        <th>KELAS</th>
                                        <th>SUBKELAS</th>
                                        <th>STUDIO</th>
                                        <th style="width:1%">KEDATANGAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(!empty($data)){
                                        foreach($data['data'] as $d){
                                        $x = 0; 
                                        $total_fee = array();
                                        $total_hadir = array();
                                        ?>
                                        <tr>
                                            <td><?=$d['KODE']?></td>
                                            <td><?=$d['NAMAGURU']?></td>
                                            <td>
                                                <?php
                                                    if(!empty($d['subkelas'])){
                                                        foreach($d['subkelas'] as $subkelas){
                                                            foreach($subkelas as $sb){
                                                                echo '<b>('.$sb['class_code'].')</b> '.$sb['KELASNAME'].'<br>';
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                            echo $sb['name'].'<br>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            </td>
                                            <td style="text-align:center">
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                        echo $sb['studio_name'].'<br>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                            $total_hadir[] = $sb['total'];
                                                            echo $sb['total'].'<br>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr style="background-color:#f2f2f2;">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:center"><b><?=array_sum($total_hadir)?></b></td>
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


<!-- Modal Confirm Delete -->
<div class="modal fade modal-cekabsen" id="cekabsen" tabindex="-1" role="dialog" aria-labelledby="cekabsen" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmurid"><b>Data Murid Yang Belum Absensi</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <div class="modal-body">
        
        <div class="row">
            <div class="col-md-6">
                <label for="Tanggal Masuk">Tanggal Absen</label>
                <input type="text" class="form-control format_tanggal_2" id="tanggal_absen" name="tanggal_absen" value="<?php echo date('d-m-Y') ?>">
            </div>
            <div class="col-md-6">
                <label for="Harga Kelas"> Pilih Sub Kelas </label>
                <select id="subkelas" name="subkelas" class="form-control">
                    <?php foreach($subclass as $k){ ?>
                    <option value="<?=$k['code']?>"><?=$k['name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>    

        <div class="row">
            <table class="table responsive-table" id="tabel_absen">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Pengajar</th>
                    </tr>
                </thead>    
                <tbody class="table-bordered">
                </tbody>
            </table>
        </div>    
    </div>

    </div>
  </div>
</div>


<script>
$('#tahun').val('<?= $tahun ?>');
$('#bulan').val('<?= $bulan ?>');
$('#kelas').val('<?= $kelas ?>');

function detail_presesi_pengajar(kode){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    window.location="<?=base_url()?>Presensi_Pengajar/detail_presesi/"+bulan+"/"+tahun+"/"+kode; 
}

function search_date(){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var kelas = $('#kelas').val();
    window.location="<?=base_url()?>Presensi_Murid/index/"+bulan+"/"+tahun+"/"+kelas;    
}
</script>