<section class="section">
    <div class="section-header" style="display: none;">
        <h1>Laporan</h1>
    </div>
    <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control format_tanggal" id="tanggal_awal" name="tanggal_awal"  value="">
                                    </div>
                                    <div class="col-md-1">
                                        <label>s.d.</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control format_tanggal_2" id="tanggal_akhir" name="tanggal_akhir" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success m-editkas" onclick="search()"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-md-9">
                                        <?php 
                                            $total_pendapatan = array();
                                            $total_pendapatan[] = (int)$hasil['pendapatan']['total_spp'];
                                            $total_pendapatan[] = (int)$hasil['pendapatan']['total_denda'];
                                            $total_pendapatan[] = (int)$hasil['pendapatan']['total_kas'];
                                            $total_pendapatan[] = (int)$hasil['pendapatan']['total_lain'];
                                            $total_pendapatan[] = (int)$hasil['pendapatan']['total_registrasi'];
                                            $total_pendapatan = array_sum($total_pendapatan);
                                        ?>
                                        <table class="table display nowrap" id="datalaporan">
                                            <thead>
                                            <tr style="background-color:#80d4ff;">
                                                <th style="text-align:left;">JENIS </th>
                                                <th style="text-align:left;">KETERANGAN</th>
                                                <th style="text-align:right;">BESAR (Rp)</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-bordered">
                                                <tr>
                                                    <td>Pengeluaran</td>
                                                    <td>Total Pembayaran Dari Seluruh Kelas</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['pendapatan']['total_spp'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Denda Keterlambatan Pembayaran</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['pendapatan']['total_denda'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Penambahan / Pendapatan Dari Kas</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['pendapatan']['total_kas'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Pendapatan Lain-lain</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['pendapatan']['total_lain'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Pendapatan Registrasi Murid</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['pendapatan']['total_registrasi'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr style="font-weight:bold;">
                                                    <td></td>
                                                    <td style="background-color:#baf1a1;">TOTAL PEMASUKAN</td>
                                                    <td style="background-color:#baf1a1; text-align:right" ><?=number_format($total_pendapatan, 0, ".", ".")?></td>
                                                </tr>

                                        <?php 
                                            $total_pengeluaran = array();
                                            $total_pengeluaran[] = (int)$hasil['penngeluaran']['total_p_kas'];
                                            $total_pengeluaran[] = (int)$hasil['penngeluaran']['total_p_diskon'];
                                            $total_pengeluaran[] = (int)$hasil['penngeluaran']['total_p_lain'];
                                            $total_pengeluaran[] = (int)$hasil['penngeluaran']['total_p_fee'];
                                            $total_pengeluaran = array_sum($total_pengeluaran);
                                        ?>
                                                <tr>
                                                    <td>Pengeluaran</td>
                                                    <td>Total Pengurangan Biaya dari Kas</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['penngeluaran']['total_p_kas'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Diskon dari Denda yang harus dibayar</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['penngeluaran']['total_p_diskon'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Biaya Lain-lain</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['penngeluaran']['total_p_lain'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Total Gaji / Fee Pengajar</td>
                                                    <td style="text-align:right;"><?=number_format((int)$hasil['penngeluaran']['total_p_fee'], 0, ".", ".")?></td>
                                                </tr>
                                                <tr style="font-weight:bold;">
                                                    <td></td>
                                                    <td style="background-color:#baf1a1;">TOTAL PENGELUARAN</td>
                                                    <td style="background-color:#baf1a1; text-align:right;"><?=number_format($total_pengeluaran, 0, ".", ".")?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                            </div> 

                            <div class="col-md-2" style="background-color:#baf1a1;">
                                <div class="card" style="margin-top: 50%; margin-left: auto;">
                                    <div class="card-body" style="text-align:center;">
                                            <?php $total_keseluruhan = $total_pendapatan - $total_pengeluaran;
                                                if($total_keseluruhan > 0){
                                                    $icon = '<span style="color:green" class="fas fa-check"></span>';
                                                } else {
                                                    $icon = '<span style="color:red" class="fas fa-times"></span>';
                                                }
                                            ?>
                                            <div>
                                                <?=$icon?>
                                            </div>
                                            <div style="font-weight:bold;">
                                            Rp. <?=number_format($total_keseluruhan, 0, ".", ".")?>
                                            </div>
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

<script type="text/javascript">
$('#tanggal_awal').val('<?= $tanggal_awal ?>');
$('#tanggal_akhir').val('<?= $tanggal_akhir ?>');

function search(){
	var awal = $('#tanggal_awal').val();
    var akhir = $('#tanggal_akhir').val();
    window.location="<?=base_url()?>Laporan/index/"+awal+"/"+akhir;    
}
</script>