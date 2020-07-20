<style>
    #listkelasmurid td:nth-child(1),
    #listkelasmurid th:nth-child(1),
    #examlist td:nth-child(1),
    #examlist th:nth-child(1)
    {
        font-weight: bold;
    }

    #examlist td:nth-child(1),
    #examlist th:nth-child(1),
    #examlist td:nth-child(2),
    #examlist th:nth-child(2)
    {
        text-align: right;
    }

    #listkelasmurid td:nth-child(2),
    #listkelasmurid th:nth-child(2),
    #listkelasmurid td:nth-child(3),
    #listkelasmurid th:nth-child(3)
    {
        text-align: right;
    }

</style>

<!-- sub murid -->
<div class="modal fade bd-example-modal-lg modal-examlist" tabindex="-1" role="dialog" aria-labelledby="modalexamlist" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Tambah Kelas Ujian : <span id="headexamlist"></span> </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_tambah_kelas2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Tanggal Masuk">Tanggal Masuk</label>
                            <input type="text" class="form-control" id="tglmasuk" name="tglmasuk" value="<?php echo date('d-m-Y') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="Harga Kelas"> Pilih Harga Kelas </label>
                            <select id="priceclass3" name="priceclass" class="form-control startdate priceclass3">
                                <option id="hargasatu" value="1"></option>
                                <option id="hargadua" value="2"></option>
                            </select>
                            <input type="hidden" class="form-control" id="kodemurid10" name="kodemurid10">
                            <input type="hidden" class="form-control" id="subclasscode_add10" name="subclasscode_add10">
                            <input type="hidden" class="form-control" id="tahapan10" name="tahapan10">
                            <input type="hidden" class="form-control" id="price_class_type10" name="price_class10">
                            <input type="hidden" class="form-control" id="namamurid10" name="namamurid10">
                            <input type="hidden" class="form-control" id="type10" name="type10" value="1">
                        </div>
                    </div>    
                </div>
            </form>

            <div class="row">
                <table class="table responsive-table" id="examlist">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Harga1</th>
                            <th>Harga2</th>
                            <th>SubKelas</th>
                            <th>Pengajar</th>
                            <th>Asisten</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>    
                    <tbody class="table-bordered"></tbody>
                </table>
            </div>      

            <div class="modal-footer">
                <button type="button" href="javascript:void(0)" class="btn btn-info" onclick="checkinput2()">Tambah</button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- modal list kelas murid must be-->
<div class="modal fade bd-example-modal-lg modal-listkelasmurid" tabindex="-1" role="dialog" aria-labelledby="modallistkelasmurid" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="headmodallistkelasmurid"> </h6>
            <h6 class="modal-title" id="kodeklas"> </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_tambah_kelas">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Tanggal Masuk">Tanggal Masuk</label>
                            <input type="text" class="form-control format_tanggal_3" id="tglmasuk4" name="tglmasuk" value="<?php echo date('d-m-Y') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="Harga Kelas"> Pilih Harga Kelas </label>
                            <select id="priceclass" name="priceclass" class="form-control startdate priceclass2">
                                <option id="harga1" value="1"></option>
                                <option id="harga2" value="2"></option>
                            </select>
                            <input type="hidden" class="form-control" id="kodemurid2" name="kodemurid">
                            <input type="hidden" class="form-control" id="subclasscode_add" name="subclasscode_add">
                            <input type="hidden" class="form-control" id="tahapan" name="tahapan">
                            <input type="hidden" class="form-control" id="price_class_type2" name="price_class_type2">
                            <input type="hidden" class="form-control" id="namamurid2" name="namamurid2">
                            <input type="hidden" class="form-control" id="type2" name="type2" value="1">
                        </div>
                    </div>    
                </div>
            </form>

            <div class="row">
                <table class="table responsive-table" id="listkelasmurid">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Harga1</th>
                            <th>Harga2</th>
                            <th>SubKelas</th>
                            <th>Pengajar</th>
                            <th>Asisten</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>    
                    <tbody class="table-bordered"></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" href="javascript:void(0)" class="btn btn-info" onclick="checkinput()">Tambah</button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal sub change -->
<div class="modal fade modal-sublist" tabindex="-1" role="dialog" aria-labelledby="sublist" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><b>Ubah SubKelas (<span id="headmodalsublist"></span>)</b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>   
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label for="SUBKELAS">SUBKELAS YANG DIPILIH</label>
                            <input type="text" style="text-align: center;" class="form-control" id="subkelas" name="subkelas" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="KODE KELAS">KODE SUBKELAS</label>
                            <input type="text" style="text-align: center;" class="form-control" id="kodesubkelas_old" name="kodesubkelas_old" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="NAMA KELAS">NAMA KELAS</label>
                            <input type="text" style="text-align: center;" class="form-control" id="kelasnama" name="kelasnama" readonly>
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <table class="table responsive-table" id="sublist">
                        <thead>
                            <tr>
                                <th>KODE SUBKELAS</th>
                                <th>NAMA SUBKELAS</th>
                                <th>HARI</th>
                                <th>JAM</th>
                                <th>STUDIO</th>
                            </tr>
                            <tbody class="table-bordered"></tbody>
                        </thead>
                    </table>
                </div>        
                
                <div class="modal-footer">
                    <span id="b_subchange" style="display:none">
                    <a href="#change_subclass" role="button" class="btn btn-primary m-changesub" data-toggle="modal">Ubah SubKelas</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal Edit Status -->
<div class="modal fade" id="modal-editstatus" tabindex="-1" role="dialog" aria-labelledby="modaleditstatus" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="headmodalmurid"><b>Edit Status Murid</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_editstatusmurid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Kode Murid">Kode Murid</label>
                            <input type="text" class="form-control" id="kodemurid" name="kodemurid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nama Kelas">Kode SubKelas</label>
                            <input type="text" class="form-control" id="kodesubkelas" name="kodesubkelas" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select id="statusp2" name='statusprogram' class='form-control'>
                                <option value='Diikuti'>DIIKUTI</option>
                                <option value='Cuti'>CUTI</option>
                                <option value='Keluar'>KELUAR</option>
                                <option value='Selesai'>SELESAI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama Murid">Nama Murid</label>
                            <input type="text" class="form-control" id="namamurid" name="namamurid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nama SubKelas">Nama SubKelas</label>
                            <input type="text" class="form-control" id="namasubkelas" name="namasubkelas" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Status Bayar">Status Bayar</label>
                            <select id="statusbayar" name='statuspayment' class='form-control'>
                                <option value='Status : BL'>Status : BL</option>
                                <option value='Status : LNS'>Status : LNS</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="submit" onclick="editstatusmurid()" class="btn btn-primary">Ubah Status</button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal Bayar SPP -->
<div class="modal fade" id="modal-bayarspp" tabindex="-1" role="dialog" aria-labelledby="modalbayarspp" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" style="color: #989ca2;"><b>Pembayaran SPP (<span id="nama"></span>)</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div class="modal-body" style="background-color:#DCDCDC">            
            <form action="javascript:void(0)" id="form_pembayaran_spp" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kode Kelas</b></label>
                                </div>  
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodekelas" name="kodekelas" readonly>
                                <input type="hidden" class="form-control" id="kodemurid3" name="kodemurid3" readonly>
                                <input type="hidden" class="form-control" id="namamurid12" name="namamurid12" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="namakelas" name="namakelas" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kode SubKelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodeskelas" name="kodeskelas" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Sub Kelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="namasubkelas" name="namasubkelas" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Mengikuti Sejak</b></label>  
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="status" name="status" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kategori</b></label>  
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kategori" name="kategori" style="font-weight:bold; font-size:14px;" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        Masukan Pembayaran
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Harga Kelas"> <b>Jenis</b> </label>
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <select name="jenis" id="jenis" class="form-control-sm" style="font-weight: bold;background-color: white; color: black; font-size:12px; width:100%;">
                                    <option value="TUNAI">TUNAI</option>
                                    <option value="OVO">OVO</option>
                                    <option value="DANA">DANA</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="MUAMALAT">MUAMALAT</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="PANIN">PANIN</option>
                                    <option value="MEGA">MEGA</option>
                                    <option value="BII MAYBANK">BII MAYBANK</option>
                                    <option value="BSM">BSM</option>
                                    <option value="BRI SYARIAH">BRI SYARIAH</option>
                                    <option value="LAINNYA">LAINNYA</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Harga Kelas"><b>Nama</b></label>
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="an" name="an" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Harga Kelas"><b>Denda Sebelumnya</b></label>
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="denda_belum" name="denda_belum" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Harga Kelas"> <b>Biaya Kelas</b> </label>
                                </div>
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="biaya" name="biaya" readonly>
                                <input type="hidden" class="biaya2" id="biaya2" name="biaya2" value="0">
                                <input type="hidden" class="biayadenda" id="biayadenda" name="biayadenda" value="<?php echo $konfigurasi['data']['due'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">  
                                <div class="form-group">                      
                                    <label for="Harga Kelas"> <b>Catatan</b> </label>
                                </div>
                            </div>  
                            <div class="col-md-9">                            
                                <input class="form-control" id="catatan" name="catatan">
                            </div>
                        </div>
                        <!-- Total Pembayaran -->
                        <div class="row">
                            <div class="col-md-12">
                              Total Pembayaran & Denda
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">  
                                        <div class="form-group">                      
                                            <label for="Harga Kelas"> <b>Keterlambatan</b> </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-9">                            
                                        <input class="form-control terlambat" id="terlambat" name="terlambat" value="" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">  
                                        <div class="form-group">                      
                                            <label for="Harga Kelas"> <b>Besar Denda</b> </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-9">                            
                                        <input class="form-control bd" id="bd" name="bd" value="" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <div class="form-group">                       
                                            <label for="Harga Kelas"> <b>Potongan Denda</b> </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-9">                            
                                        <input class="form-control" onkeyup="sum()" id="pd" name="pd" value="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Harga Kelas"> <b>Tipe Pembayaran</b> </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-9">
                                        <select name="pwf" id="pwf" class="form-control-sm" style="font-weight: bold;background-color: white; color: black; font-size:12px; width:100%;">
                                            <option value="TANPA DENDA"><b>TANPA DENDA</b></option>
                                            <option value="DENGAN DENDA"><b>DENGAN DENDA</b></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">                        
                                            <label for="Harga Kelas"> <b>Total Bayar</b> </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-9">                            
                                        <input class="form-control tb" style="font-weight: bold; border: 0; background:none; font-size:50px; height:100px;" id="tb" name="tb" value="" readonly>
                                    </div>
                                </div>
                                 <input type="hidden" id="kodemurid_ujian" name="kodemurid_ujian">
                                <input type="hidden" class="form-control" id="findout" name="findout" readonly>
                            </div>               
                        </div>
                    </div>
                    <!-- Checklist Pemayaran -->
                    <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><b>Tanggal Pembayaran</b></label>  
                                    <input type="date" class="form-control" style="font-weight: bold;background-color: white; color: black; font-size: 20px; height:50px;" id="tgl_pembayaran2" name="tgl_pembayaran" value="<?php echo date('Y-m-d') ?>" required>
                                    <input type="hidden" id="tempo" name="tempo" value="<?php echo $konfigurasi['data']['duedate']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="overflow-y">
                                    <div style="height:300px; overflow: auto;">
                                       <div id="ceklist" class="ceklist">
                                       </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="javascript:void(0)" class="btn btn-primary" onclick="mbayarspp()">Lanjutkan</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Price Edit -->
<div class="modal fade" id="modal-priceedit" tabindex="-1" role="dialog" aria-labelledby="priceedit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h6 class="subtitle"><b>Ubah Harga Kelas </b> </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="row">             
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="HARGA YANG DIPILIH">Harga Kelas Saat ini</label>
                        <input type="text" class="form-control" id="hargakelas" name="hargakelas" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="NAMA KELAS">Nama Kelas</label>
                        <input type="text" class="form-control" id="namasubkelas1" name="namasubkelas1" readonly>
                    </div>
                </div>
                <div class="col-md-12" >
                    <div class="form-group">
                        <label for="SUBKELAS">SubKelas</label>
                        <input type="text" class="form-control" id="kodesubkelas1" name="kodesubkelas1" readonly>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-12" >
                    <div class="form-group">
                        <label for="Ubah Harga Kelas"> Pilih Harga Kelas </label>
                        <select id="ubahhargakelas_murid_yangdipilih" name="ubahhargakelas_murid_yangdipilih" class="form-control startdate">
                            <option value="1" id="pricechange_class2"></option>
                            <option value="2" id="pricechange_class1"></option>
                        </select>
                    </div>
                </div>    
            </div>    

            <div class="modal-footer">
                <a href="#change_priceclass" role="button" class="btn btn-primary m-changeprice" data-toggle="modal">Ubah Harga Kelas</a>
            </div>
        </div>
    </div>
  </div>
  </div>
</div>

<!-- Modal Bayar Kelas Ujian -->
<div class="modal fade bd-example-modal-lg" id="modal-bayarujian" tabindex="-1" role="dialog" aria-labelledby="modalbayarujian" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Pembayaran Ujian (<span id="nama_murid"></span>) </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" id="form_bayar_ujian" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Kode Murid">Kode Kelas</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodekelas" name="kodekelas" style="background-color: white;color: black;" readonly>
                                <input type="hidden" class="form-control" id="kodemurid99" name="kodemurid99">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Nama Murid">Nama Kelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="namakelas" name="namakelas" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Kelas">Kode SubKelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="kodesubkelas" name="kodesubkelas" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="SubKelas">Nama SubKelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="namasubkelas" name="namasubkelas" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="SubKelas">Mengikuti Sejak</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="tgl_masuk" name="tgl_masuk" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Status">Status</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="status" name="status" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                    </div>    
                </div>
                <b>Masuk Pembayaran</b>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jenis</label>
                            </div>
                            <div class="col-md-9">    
                                <select name="jenis_pem_ujian" id="jenis_pem_ujian" class="form-control">
                                    <option value="TUNAI">TUNAI</option>
                                    <option value="OVO">OVO</option>
                                    <option value="DANA">DANA</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="MUAMALAT">MUAMALAT</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="PANIN">PANIN</option>
                                    <option value="MEGA">MEGA</option>
                                    <option value="BII MAYBANK">BII MAYBANK</option>
                                    <option value="BSM">BSM</option>
                                    <option value="BRI SYARIAH">BRI SYARIAH</option>
                                    <option value="LAINNYA">LAINNYA</option>
                                </select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="a_nama" name="a_nama" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Biaya</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control biaya10" id="biaya" name="biaya" readonly>
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Catatan</label>
                            </div>
                            <div class="col-md-9">    
                                <input class="form-control" id="keterangan_pembayaran" name="keterangan_pembayaran" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label><b>Bayar</b></label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="pembayaran_ujian" name="pembayaran_ujian" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="Tanggal Masuk">Tanggal Pembayaran</label>
                            </div>
                            <div class="col-md-8">    
                              <input type="text" class="form-control datepayment" id="tpu" name="tpu" value="<?php echo date('d-m-Y') ?>">
                            </div>
                        </div>
                    </div>
                </div>    
            </form>
            <hr>
            <div class="row">
                <table class="table responsive-table" id="bayarujian">
                    <thead>
                        <tr>
                            <th>TANGGAL PEMBAYARAN</th>
                            <th>PEMBAYARAN</th>
                            <th>KEKURANGAN</th>
                        </tr>
                        <tbody class="table-bordered"></tbody>
                    </thead>
                </table>
            </div>
            <hr>
            <div style="text-align: center;">
                <button href="javascript:void(0)" type="button" class="btn btn-primary m-bayarujian" onclick="mbayarujian()">Proses Pembayaran Ujian</buton>
            </div>    
        </div>
    </div>
  </div>
</div>

<!-- Modal Confirm Delete kelas murid-->
<div class="modal fade modal-hapus-kelasmurid" id="hkelasmurid2" tabindex="-1" role="dialog" aria-labelledby="hapuskelasmurid" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hkelasmurid"><b>Hapus Program Kelas Murid</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" id="form_hapus_kelas" method="post">
      <div class="modal-body">
        <h4 class="text-center" id="namahapussub"></h4>
        <input type="hidden" name="kodesubkelas">
        <input type="hidden" name="kodemurid">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hapuskelasmurid()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Bayar CUTI -->
<div class="modal fade" id="modal-bayarcuti" tabindex="-1" role="dialog" aria-labelledby="modalbayarcuti" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" style="color: #989ca2;"><b>Pembayaran CUTI (<span id="nama5"></span>)</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div class="modal-body" style="background-color:#DCDCDC">            
            <form action="javascript:void(0)" id="form_bayar_cuti" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kode Kelas</b></label>
                                </div>  
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodekelas5" name="kodekelas5" readonly>
                                <input type="hidden" class="form-control" id="nama15" name="nama15">
                                <input type="hidden" class="form-control" id="kodenama15" name="kodenama15">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="namakelas5" name="namakelas5" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Kode SubKelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodeskelas5" name="kodeskelas5" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Sub Kelas</b></label>  
                                </div>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="namasubkelas5" name="namasubkelas5" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- Checklist Pemayaran -->
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><b>Tanggal Input</b></label>  
                                    <input type="date" class="form-control" style="font-weight: bold;background-color: white; color: black; font-size: 20px; height:50px;" id="tgl_pembayaran5" name="tgl_pembayaran5" value="<?php echo date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="overflow-y">
                                    <div style="height:300px; overflow: auto;">
                                       <div id="ceklist2" class="ceklist2">
                                       </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="javascript:void(0)" class="btn btn-primary" onclick="mbayarcuti()">Lanjutkan</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Bayar Kelas Ujian -->
<div class="modal fade bd-example-modal-lg" id="modal-bayarprivate" tabindex="-1" role="dialog" aria-labelledby="modalbayarujian" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Pembayaran Private (<span id="nama_murid_private"></span>) </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" id="form_bayar_private" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Kode Murid">Kode Kelas</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="kodekelas_private" name="kodekelas_private" style="background-color: white;color: black;" readonly>
                                <input type="hidden" class="form-control" id="kodemurid99_private" name="kodemurid99_private">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Nama Murid">Nama Kelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="namakelas_private" name="namakelas_private" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Kelas">Kode SubKelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="kodesubkelas_private" name="kodesubkelas_private" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="SubKelas">Nama SubKelas</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="namasubkelas_private" name="namasubkelas_private" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="SubKelas">Mengikuti Sejak</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="tgl_masuk_private" name="tgl_masuk_private" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Status">Status</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="status_private" name="status_private" style="background-color: white;color: black;" readonly>
                            </div>
                        </div>
                    </div>    
                </div>
                <b>Masuk Pembayaran</b>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jenis</label>
                            </div>
                            <div class="col-md-9">    
                                <select name="jenis_pem_ujian_private" id="jenis_pem_ujian_private" class="form-control">
                                    <option value="TUNAI">TUNAI</option>
                                    <option value="OVO">OVO</option>
                                    <option value="DANA">DANA</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="MUAMALAT">MUAMALAT</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="PANIN">PANIN</option>
                                    <option value="MEGA">MEGA</option>
                                    <option value="BII MAYBANK">BII MAYBANK</option>
                                    <option value="BSM">BSM</option>
                                    <option value="BRI SYARIAH">BRI SYARIAH</option>
                                    <option value="LAINNYA">LAINNYA</option>
                                </select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="a_nama_private" name="a_nama_private" autocomplete="off" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Biaya</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control biaya10" id="biaya_private" name="biaya_private" readonly>
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Catatan</label>
                            </div>
                            <div class="col-md-9">    
                                <input class="form-control" id="keterangan_pembayaran_private" name="keterangan_pembayaran_private" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label><b>Bayar</b></label>
                            </div>
                            <div class="col-md-9">    
                                <input type="text" class="form-control" id="pembayaran_ujian_private" name="pembayaran_ujian_private" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="Tanggal Masuk">Tanggal Pembayaran</label>
                            </div>
                            <div class="col-md-8">    
                              <input type="text" class="form-control datepayment2" id="tpu_private" name="tpu_private" value="<?php echo date('d-m-Y') ?>">
                            </div>
                        </div>
                    </div>
                </div>    
            </form>
            <hr>
            <div class="row">
                <table class="table responsive-table" id="bayarprivate">
                    <thead>
                        <tr>
                            <th>TANGGAL PEMBAYARAN</th>
                            <th>NOMINAL</th>
                        </tr>
                        <tbody class="table-bordered"></tbody>
                    </thead>
                </table>
            </div>
            <hr>
            <div style="text-align: center;">
                <button href="javascript:void(0)" type="button" class="btn btn-primary m-bayarujian" onclick="mbayarprivate()">Proses Pembayaran Private</buton>
            </div>    
        </div>
    </div>
  </div>
</div>