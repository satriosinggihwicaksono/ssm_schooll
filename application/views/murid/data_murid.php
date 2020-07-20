<style>
    #muriddata td:nth-child(2),
    #muriddata th:nth-child(2),
    #sub_murid td:nth-child(2),
    #sub_murid th:nth-child(2),
    #sub_murid td:nth-child(3),
    #sub_murid th:nth-child(3),
    #sub_murid td:nth-child(8),
    #sub_murid th:nth-child(8)
    {
        font-weight: bold;
    }

    #sub_murid td:nth-child(7)
    {
        text-align:right;
    }
</style>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label><b>KEAKTIFAN</b></label>
                                    <select id="startdate" name="startdate" class="form-control startdate">
                                        <option value="">-</option>
                                        <option selected value="Aktif">Aktif</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Keluar">Keluar</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><b>STATUS BAYAR</b></label>
                                    <select id="status_bayar" name="status_bayar" class="form-control enddate">
                                        <option value="">-</option>
                                        <option value="Status : LNS">Status : LNS</option>
                                        <option selected value="Status : BL">Status : BL</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label><b>KATEGORI</b></label>
                                    <select class="form-control" id="st_kategori2">
                                        <option value="">-</option>
                                        <option selected value="nonujian">NON UJIAN</option>
                                        <option value="ujian">UJIAN</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>NAMA KELAS</b></label>
                                    <select id="classesname" name="classesname" class="form-control">
                                        <option value="">-</option>
                                        <?php foreach($class as $k){ ?>
                                            <option value="<?=$k['name']?>"><?=$k['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><b>STATUS KELAS</b></label>
                                    <select class="form-control" id="st_program">
                                        <option value="">-</option>
                                        <option selected value="Diikuti">DIIKUTI</option>
                                        <option value="Selesai">SELESAI</option>
                                        <option value="Keluar">KELUAR</option>
                                        <option value="Cuti">CUTI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="text-align:right;">
                                    <a href="javascript:void(0)" class="btn btn-info m-addmurid" data-toggle="modal" data-target="#modal-murid"><i class="fas fa-folder-plus"></i> Tambah</a>
                                    <a href="javascript:void(0)" class="btn btn-success m-check" data-toggle="modal" data-target="#modal-check"><i class="fa fa-search"></i> Check</a>
                                    <span id="proses_murid" style="display:none">
                                    <a href="javascript:void(0)" class="btn btn-warning m-editmurid" data-toggle="modal" data-target=".modal-edit-murid"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger m-hapusmurid" data-toggle="modal" data-target=".modal-hapus-murid"><i class="fas fa-trash-alt"></i> Hapus</a >
                                    </span>
                                </div>
                            </div>
                        </div> 
                      <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table responsive-table" id="muriddata">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>PANGGILAN</th>
                                            <th>TGL.LAHIR</th>
                                            <th>ALAMAT</th>
                                            <th>HP ORTU</th>
                                            <th>HP MURID</th>
                                            <th>CATATAN</th>
                                            <th>KATEGORI</th>
                                            <th>KEAKTIFAN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-bordered"></tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12" id="hide_sub_murid" style="display:none;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><b>STATUS KELAS</b></label>
                                    <select class="form-control" id="sb_program">
                                        <option value="">-</option>
                                        <option selected value="Diikuti">DIIKUTI</option>
                                        <option value="Selesai">SELESAI</option>
                                        <option value="Keluar">KELUAR</option>
                                        <option value="Cuti">CUTI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-5">
                                <div style="text-align:right">
                                    <button class="btn btn-success examlist" data-placement="bottom" data-target=".modal-examlist" title="Tambah Kelas Ujian" data-toggle="tooltip"><i class="fa fa-tasks"></i></button>
                                    <button class="btn btn-info listkelasmurid" data-toggle="tooltip" data-target=".modal-listkelasmurid" data-placement="bottom" title="Tambah Kelas"><i class="fas fa-plus-circle"></i></button>
                                    <span id="proses_kelasmurid" style="display:none">
                                    <button class="btn btn-danger m-hapuskelasmurid" id="hapusklasmurid" data-toggle="modal" data-target=".modal-hapus-kelasmurid" data-placement="bottom" title="Hapus Kelas"><i class="fas fa-minus-circle"></i></button>
                                    <span data-toggle="modal" data-target="#modal-editstatus">
                                        <button type="button" class="btn btn-warning editstatus" id="statuseditmurid" data-placement="bottom" title="Edit Status" data-toggle="tooltip"><i class="fas fa-id-card"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-sublist">
                                        <button type="button" class="btn btn-secondary sublist" id="listsub" data-placement="bottom" title="Ubah SubKelas" data-toggle="tooltip"><i class="fas fa-sync-alt"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-priceedit">
                                        <button type="button" class="btn btn-primary m-changeprice" id="ubahharga" data-placement="bottom" title="Ubah Harga" data-toggle="tooltip"><i class="fas fa-comments-dollar"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-bayarspp">
                                        <button type="button" class="btn btn-dark bayarspp" id="bayar_spp" data-placement="bottom" title="Bayar SPP" data-toggle="tooltip"><i class="fas fa-dollar-sign"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-bayarcuti">
                                        <button type="button" class="btn bayarcuti" style="background-color:brown;" id="bayar_cuti" data-placement="bottom" title="Bayar Cuti" data-toggle="tooltip"><i style="color:white;" class="fas fa-dollar-sign"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-bayarujian">
                                        <button type="button" class="btn btn-light bayarujian" id="bayar_ujian" data-placement="bottom" title="Bayar ujian" data-toggle="tooltip"><i class="fas fa-file-invoice-dollar"></i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#modal-bayarprivate">
                                        <button type="button" class="btn bayarprivate" style="background-color:green;" id="bayar_private" data-placement="bottom" title="Bayar private" data-toggle="tooltip"><i style="color:white;" class="fas fa-user-circle"></i></button>
                                    </span>
                                </div>
                            </div>    
                        </div>    
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="sub_murid">
                                    <thead>
                                        <tr>
                                        <th>STATUS</th>
                                        <th>KELAS</th>
                                        <th>SUBKELAS</th>
                                        <th>HARI</th>
                                        <th>JAM</th>
                                        <th>STUDIO</th>
                                        <th>HARGA</th>
                                        <th>PEMBAYARAN</th>
                                        <th>MASUK</th>
                                        <th>KATEGORI</th>
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
        </div>
    </div>
</section>

<?php 
     include 'application/views/murid/js/submurid.php'; 
     include 'application/views/murid/js/murid.php'; 
     include 'application/views/murid/modal/submurid.php'; 
     include 'application/views/murid/modal/murid.php'; 
     include 'application/views/murid/modal/acc.php'; 
?>

<script type ="text/javascript">

    // -------------------- HITUNG TOTAL BIAYA ----------------

    $(".hitung").keyup(function(){
        var denda = parseInt($("#bd").val())
        var biaya = parseInt($("#biaya").val())
        var potongan = parseInt($("#pd").val())
        
        var jumlah = denda + biaya;
        $("#findout").attr("value",jumlah)
        
        var total = jumlah - potongan;
        $("#findout").attr("value",total)
    });
</script>

<script>
    var tanpa_rupiah = document.getElementById('pembayaran_ujian');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>