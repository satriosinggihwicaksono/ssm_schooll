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
                                <div class="form-group">
                                    <button style="margin-top:30px" onclick="search_date()" type="button" class="btn btn-success btn-block"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary" style="margin-top:0px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            Jumlah Pengajar
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=$data['total']['guru']?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            Total Kedatangan
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=$data['total']['total_kehadiran']?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            Total Fee
                                        </div>
                                        <div class="col-md-5">
                                            <b><?=number_format($data['total']['total_fee'], 0, ".", ".")?></b>
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
                                <table class="table" style="text-align:left; width:1400px;">
                                    <thead>
                                    <tr style="background-color:#FFA07A">
                                        <th style="width:1%">KODE</th>
                                        <th style="width:1%">NAMA</th>
                                        <th>KELAS</th>
                                        <th>SUBKELAS</th>
                                        <th style="width:1%">FEE</th>
                                        <th style="width:1%">HADIR</th>
                                        <th>TOTAL FEE</th>
                                        <th>Action</th>
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
                                            <td style="text-align: left">
                                                <?php
                                                    if(!empty($d['subkelas'])){
                                                        foreach($d['subkelas'] as $subkelas){
                                                            foreach($subkelas as $sb){
                                                                echo '<b>('.$sb['class_code'].')</b> '.$sb['KELASNAME'].'<br>';
                                                            }
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center">
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    if($d['subkelas'] != ''){
                                                    foreach($d['subkelas'] as $subkelas){
                                                            foreach($subkelas as $sb){
                                                                $cek_hari = array(
                                                                    'Sun' => "Minggu",
                                                                    'Mon' => "Senin",
                                                                    'Tue' => "Selasa",
                                                                    'Wed' => "Rabu",
                                                                    'Thu'=> "Kamis",
                                                                    'Fri' => "Jumat",
                                                                    'Sat' => "Sabtu",
                                                                );
                                                                $hari = date('D',strtotime($sb['dtm_presence']));
                                                                $hari = $cek_hari[$hari];
                                                                echo $sb['name'].'<b> ('.$hari.')</b><br>';
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                            </td>

                                            <td>
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                            echo number_format($sb['fee_teacher'], 0, ".", ".").'<br>';
                                                        }
                                                    }
                                                } else {
                                                    echo 0;
                                                }
                                            ?>
                                            </td>
                                            <td style="text-align:center">
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                            $total_hadir[] = $sb['total'];
                                                            echo number_format($sb['total'], 0, ".", ".").'<br>';
                                                        }
                                                    }
                                                } else {
                                                    echo 0;
                                                }
                                            ?>
                                            </td>
                                            <td style="text-align:right">
                                            <?php
                                                if(!empty($d['subkelas'])){
                                                    foreach($d['subkelas'] as $subkelas){
                                                        foreach($subkelas as $sb){
                                                            $total = $sb['total'] * $sb['fee_teacher'];
                                                            $total_fee[] = $total;
                                                            echo number_format($total, 0, ".", ".").'<br>';
                                                        }
                                                    }
                                                } else {
                                                    echo 0;
                                                }
                                            ?>
                                            </td>
                                            <td style="text-align:center">
                                            <?php 
                                                if((int)$d['status'] > 0 ){
                                                    $status = 'success';
                                                } else {
                                                    $status = 'danger';
                                                }
                                            ?>
                                                <button onclick="gaji('<?=$d['KODE']?>','<?=$d['NAMAGURU']?>','<?=number_format(array_sum($total_fee), 0, '.', '.')?>')" class="btn btn-<?=$status?>">Gaji</button>
                                            <?php if(!empty($d['subkelas'])){ ?>
                                                <button onclick="detail_presesi_pengajar('<?=$d['KODE']?>')" class="btn btn-info">Detail</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr style="background-color:#f2f2f2;">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:center"><b><?=number_format(array_sum($total_hadir), 0, ".", ".")?></b></td>
                                                <td style="text-align:right"><b><?=number_format(array_sum($total_fee), 0, ".", ".")?></b></td>
                                                <td></td>
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
<div class="modal fade modal-gajiguru" id="gajiguru" tabindex="-1" role="dialog" aria-labelledby="hapuskelas" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="hapuskelas">
            <?php   
                $bulan2 = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember',);
                echo '<b>Penarikan Gaji '.$bulan2[(int)$this->uri->segment(3)].' '.(int)$this->uri->segment(4).'</b>';
            ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('Presensi_Pengajar/tambah_gaji');?>" method="post" id="form-gaji">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>KODE GURU</label>
                    <input type="text" class="form-control" id="kode" name="kode_salary" readonly>
                    <input type="hidden" class="form-control" id="bulan_salary" name="bulan_salary" value="<?=(int)$this->uri->segment(3)?>" readonly>
                    <input type="hidden" class="form-control" id="tahun_salary" name="tahun_salary" value="<?=(int)$this->uri->segment(4)?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NAMA GURU</label>
                    <input type="text" class="form-control" id="namaguru" name="namaguru_salary" readonly>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>GAJI</label>
                    <input type="text" class="form-control" id="total" name="total_salary" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>TANGGAL PENARIKAN GAJI</label>
                    <input type="text" class="form-control format_tanggal" id="tgl_penarikan_salary" name="tgl_penarikan_salary" value="<?=date('d-m-Y')?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><b style="color:green">PENAMBAHAN GAJI</b></label>
                    <input type="text" class="form-control" id="penambahan" name="penambahan_salary" onkeyup="total_penambahan()" value="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b style="color:red">POTONGAN GAJI</b></label>
                    <input type="text" class="form-control" id="pengurangan" name="pengurangan_salary" onkeyup="total_potongan()" value="0">
                </div>
            </div>    
        </div>    
        <div class="form-group">
            <label>CATATAN</label>
            <textarea class="form-control" id="catatan" name="catatan_salary"></textarea>
        </div>
        <div class="form-group">
            <label>TOTAL GAJI</label>
            <input style="font-size:20px; font-weight:bold; background-color:white; border:0px;" type="text" class="form-control" id="total_gaji" name="total_gaji_salary" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Proses</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$('#tahun').val('<?= $tahun ?>');
$('#bulan').val('<?= $bulan ?>');

function detail_presesi_pengajar(kode){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    window.location="<?=base_url()?>Presensi_Pengajar/detail_presesi/"+bulan+"/"+tahun+"/"+kode; 
}

function search_date(){
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    window.location="<?=base_url()?>Presensi_Pengajar/index/"+bulan+"/"+tahun;    
}

$(".penambahan").keyup(function(){
    var denda = parseInt($("#bd").val())
    var biaya = parseInt($("#biaya").val())
    var potongan = parseInt($("#pd").val())
    
    var jumlah = denda + biaya;
    $("#findout").attr("value",jumlah)
    
    var total = jumlah - potongan;
    $("#findout").attr("value",total)
});

$(".pengurangan").keyup(function(){
    var denda = parseInt($("#bd").val())
    var biaya = parseInt($("#biaya").val())
    var potongan = parseInt($("#pd").val())
    
    var jumlah = denda + biaya;
    $("#findout").attr("value",jumlah)
    
    var total = jumlah - potongan;
    $("#findout").attr("value",total)
});

</script>

<script type="text/javascript">
    var potongan = document.getElementById('pengurangan');
    potongan.addEventListener('keyup', function(e){
        potongan.value = formatPotongan(this.value);
    });

    function formatPotongan(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        potongan     	= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            potongan += separator + ribuan.join('.');
        }

        potongan = split[1] != undefined ? potongan + ',' + split[1] : potongan;
        return prefix == undefined ? potongan : (potongan ? 'Rp. ' + potongan : '');
    }

    var penambahan = document.getElementById('penambahan');
    penambahan.addEventListener('keyup', function(e){
        penambahan.value = formatPenambahan(this.value);
    });

    function formatPenambahan(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        penambahan     	= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            penambahan += separator + ribuan.join('.');
        }

        penambahan = split[1] != undefined ? penambahan + ',' + split[1] : penambahan;
        return prefix == undefined ? penambahan : (penambahan ? 'Rp. ' + penambahan : '');
    }

    function total_potongan(){
      var bayar = document.getElementById('total').value;
      var potongan = document.getElementById('pengurangan').value;
      var penambahan = document.getElementById('penambahan').value;
      var result = (parseInt(bayar.replace(".","")) - parseInt(potongan.replace(".",""))) + parseInt(penambahan.replace(".",""));
      
      var	number_string = result.toString(),
      sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }


      if (!isNaN(result)){
        document.getElementById('total_gaji').value = rupiah;
      } else {
        document.getElementById('total_gaji').value = bayar; 
      }
    }

    function total_penambahan(){
      var bayar = document.getElementById('total').value;
      var potongan = document.getElementById('pengurangan').value;
      var penambahan = document.getElementById('penambahan').value;
      var result = (parseInt(bayar.replace(".","")) - parseInt(potongan.replace(".",""))) + parseInt(penambahan.replace(".",""));
      
      var	number_string = result.toString(),
      sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }


      if (!isNaN(result)){
        document.getElementById('total_gaji').value = rupiah;
      } else {
        document.getElementById('total_gaji').value = bayar; 
      }
    }

    function gaji(kode,nama,total){
        $('#form-gaji')[0].reset();
        $('#namaguru').val(nama);
        $('#kode').val(kode);
        $('#total').val(total);
        $('#total_gaji').val(total);
        var url = "<?=base_url().'Presensi_Pengajar/check_gaji'?>"
        $.ajax({
            url : url,
            type : "POST",
            dataType: "json",
            data: { kode : kode, bulan : <?=$this->uri->segment(3)?>, tahun : <?=$this->uri->segment(4)?>},
            success: function(data)
            {
                if(data['status'] == "TRUE"){
                    $('#penambahan').val(data['data']['salary_extra']);
                    $('#pengurangan').val(data['data']['salary_deductions']);
                    $('#catatan').val(data['data']['note']);
                    $('#total_gaji').val(data['data']['salary_total']);
                    $('#tgl_penarikan_salary').val(data['data']['datetime']);
                } else {
                    $('#total_gaji').val(total);
                }   
            },
        });
        
        $('#gajiguru').modal('show');
    }
</script>