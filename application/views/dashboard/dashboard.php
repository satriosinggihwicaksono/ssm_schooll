
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.css">

<section class="section">
    <div style="margin-bottom:20px;"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-hero" style="background-color:#F8B195">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Murid Aktif
                    <h4><?=$card['murid']?></h4>
                    <div class="card-description">Dengan <?=$card['guru']?> Pengajar</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hero" style="background-color:#F67280">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    Sesi Sub Kelas Aktif
                    <h4><?=$card['subclass']?></h4>
                    <div class="card-description">Dengan <?=$card['class']?> Kategori Kelas</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hero"  style="background-color:#C06C84">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="far fas fa-money-check"></i>
                    </div>
                    SPP & Private Bulan Ini
                    <h4>Rp. <?=number_format($card['spp'] + $private['bulan1']['TOTAL'], 0, ".", ".");?></h4>
                    <div class="card-description">Pendapatan Lain Rp. <?=number_format($card['income'], 0, ".", ".");?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Laba/Rugi 3 Bulan</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart4"></canvas>
                </div>

                <div class="card gradient-bottom">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body" id="top-4-scroll">
                        <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <div class="media-body">
                            <?php $bulan2 = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',);?>
                            <div class="media-title">Pembayaran SPP - <?=$bulan2[(int)date('m')]?></div>
                                <div class="mt-1">
                                    <?php 
                                        $total3 = $card['total']
                                    ?>
                                    <div class="budget-price">
                                    <div class="budget-price-square bg-success" data-width="85%">100%</div>
                                    <div class="budget-price-label"><?=number_format($card['total'], 0, ".", ".");?></div>
                                    </div>
                                    <?php $p2 =  ((int)$card['spp'] / (int)$card['total']) * 100;?>
                                    <div class="budget-price">
                                    <div class="budget-price-square bg-warning" data-width="<?=(int)$p2-15?>%"><?=(int)$p2?>%</div>
                                    <div class="budget-price-label"><?=number_format($card['spp'], 0, ".", ".");?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                            <div class="media-title">Pembayaran Ujian - <?=(int)date('Y')?></div>
                                <div class="mt-1">
                                    <?php 
                                        $total3 = $card['total']
                                    ?>
                                    <div class="budget-price">
                                    <div class="budget-price-square bg-info" data-width="85%">100%</div>
                                    <div class="budget-price-label"><?=number_format($card['total_ujian'], 0, ".", ".");?></div>
                                    </div>
                                    <?php $p2 =  $card['bayar_ujian'] / $card['total_ujian'] * 100;?>
                                    <div class="budget-price">
                                    <div class="budget-price-square bg-warning" data-width="<?=(int)$p2-15?>%"><?=(int)$p2?>%</div>
                                    <div class="budget-price-label"><?=number_format($card['bayar_ujian'], 0, ".", ".");?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-success" data-width="20"></div>
                            <div class="budget-price-label">Tagihan SPP</div>
                            </div>
                            <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-info" data-width="20"></div>
                            <div class="budget-price-label">Tagihan Ujian</div>
                            </div>
                            <div class="budget-price justify-content-center">
                            <div class="budget-price-square bg-warning" data-width="20"></div>
                            <div class="budget-price-label">Terbayar</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        <!-- subclass -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4><?php
                  $hari = date('D'); 
                  switch($hari){
                      case 'Sun':
                        $hari = "Minggu";
                      break;
                   
                      case 'Mon':     
                        $hari = "Senin";
                      break;
                   
                      case 'Tue':
                        $hari = "Selasa";
                      break;
                   
                      case 'Wed':
                        $hari = "Rabu";
                      break;
                   
                      case 'Thu':
                        $hari = "Kamis";
                      break;
                   
                      case 'Fri':
                        $hari = "Jumat";
                      break;
                   
                      case 'Sat':
                        $hari = "Sabtu";
                      break;
                    } 
                  echo $hari;echo ", ".date('d').' '.$bulan2[(int)date('m')].' '.date('Y');
                  ?></h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <?php foreach($jadwal as $j){ ?>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-5.png" alt="avatar">
                      <div class="media-body">
                        <div class="media-title"><?=$j['name']?></div>
                        <span class="text-small text-muted">
                            <?php foreach($j['subclass'] as $sb){ ?>
                                <b><?php echo "- ".$sb['murid']?> (<?=date('H:i',strtotime($sb['theTime']))?> / <?=$sb['guru']?></b>)<br>
                            <?php } ?>
                        </span>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                  <hr>
                    <div class="card-header">
                        <h4>Pembayaran Kelas Private</h4>
                    </div>
                    <canvas id="myChart5"></canvas>
                </div>
            </div>
        </div>
        <!-- END Subclass -->
        </div>
    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
var ctx = document.getElementById("myChart5").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        <?=$private['bulan1']['TOTAL'];?>,
        <?=$private['bulan2']['TOTAL'];?>,
        <?=$private['bulan3']['TOTAL'];?>,
      ],
      backgroundColor: [
        '#F8CD4F',
        '#07BB9C',
        '#A06AB4',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      '<?=$bulan2[(int)$private['bulan1']['bulan']];?>',
      '<?=$bulan2[(int)$private['bulan2']['bulan']];?>',
      '<?=$bulan2[(int)$private['bulan3']['bulan']];?>',
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});
</script>


<script>
var ctx = document.getElementById("myChart4").getContext('2d');
var speedData = {
  labels: ["", "<?=$laporan3['bulan']?>", "<?=$laporan2['bulan']?>", "<?=$laporan1['bulan']?>"],
  datasets: [{
    data: [0, <?=$laporan3['total']?>, <?=$laporan2['total']?>, <?=$laporan1['total']?>],
  }]
};
 
var chartOptions = {
  legend: {
    display: false,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(ctx, {
    type: 'line',
    data: speedData,
    options: chartOptions
});

</script>