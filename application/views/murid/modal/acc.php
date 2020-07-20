<!-- Modal ACC FOR ADD STUDENT CLASS -->
<div class="modal fade" id="add_program_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>CEK KEMBALI DATA!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" id="form_lanjut_tambah" method="post">
        <div class="modal-body">
            <h6>Program Kelas Siswa Siap Untuk Ditambahkan, Silahkan Lanjutkan Konfirmasi</h6> 
            <br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div style="text-align: center; background-color:#778899;">
                            <div class="form-group" style="text-align: center;">
                               <input type="text" class="form-control form-all" style="font-size: 15px; font-weight:bold; text-align: center; border-color: #bfb6e4;" id="namamurid3" name="namamurid3" readonly>
                            </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="Tanggal Masuk"><b>TANGGAL MASUK</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="tglmasuk1" name="tglmasuk3" readonly>
                                </div>
                            </div>
                            <input type="hidden" name="subclasscode_add">
                            <div class="col-md-5" >
                                <div class="form-group" style="text-align: center;">
                                    <label for="Nama Kelas"><b>SUBKELAS</b></label>
                                    <input type="text" class="form-control"  style="font-size: 14px; text-align: center; font-weight:bold;"  id="namakelas2" name="namakelas" readonly>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>   
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Nama Kelas"><b>HARGA</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="price_class_type3" name="price_class_type2" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="type" name="type">
                                <input type="hidden" id="kodemurid33" name="kodemurid2">
                                <input type="hidden" class="namasubkelas3" id="namasubkelas3" name="namasubkelas3">
                            </div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Harga Kelas"><b>KATEGORI</b></label>
                                    <input type="text" class="form-control"  style="font-size: 14px; text-align: center; font-weight:bold;" id="tahapan2" name="tahapan" readonly>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="kodemurid" name="kodemurid">
            </div>
        </div>
        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="lanjuttambah()" class="btn btn-success" >Lanjutkan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ACC FOR CHANGE SUBCLASS -->
<div class="modal fade" id="change_subclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>CEK KEMBALI DATA!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" id="form_editsubclass" method="post">
        <div class="modal-body">
            <h6>SubKelas Siap Untuk Dipindahkan</h6> 
            <div class="row">
                <div class="col-md-12" >
                    <div class="form-group" style="text-align: center; background-color:#778899">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Kode Murid" ><b>NAMA MURID</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="namamurid" name="namamurid" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Tanggal Masuk"><b>KODE SUBKELAS SAAT INI</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="subclasscode_old" name="subclasscode_old" readonly>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="subclasscode_add">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Nama Kelas"><b>NAMA SUBKELAS SAAT INI</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="subclassname_old" name="subclassname_old" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group" style="text-align: center;">
                                    <label for="Harga Kelas"><b>KODE SUBKELAS BARU</b></label>
                                    <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="subclasscode_new" name="subclasscode_new" value="Ujian" readonly>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                              <div class="form-group" style="text-align: center;">
                                  <label for="Nama Kelas"><b>NAMA SUBKELAS BARU</b> </label>
                                  <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="subclassname_new" name="subclassname_new" readonly>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>    
                    </div>
                </div>
                <input type="hidden" id="kodemurid" name="kodemurid">
            </div>
          </form>  
        </div>
        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="editsubclass()" class="btn btn-success" >Lanjutkan</button>
        </div>
      
    </div>
  </div>
</div>

<!-- Modal ACC FOR CHANGE PRICE CLASS -->
<div class="modal fade" id="change_priceclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>CEK KEMBALI DATA!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" id="form_ubahhargakelas" method="post">  
        <div class="modal-body">
            <h6>Ubah Harga Kelas, Silahkan Lanjutkan Konfirmasi</h6>
            <div style="background-color:#778899;"> 
            <br>
                <div class="row" style="text-algin:center;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" style="font-size: 15px; font-weight:bold; text-align:center; border-color: #bfb6e4;" id="namamurid_pricecheck" name="namamurid_pricecheck" readonly>
                        <input type="hidden" id="kodemurid_pricecheck" name="kodemurid_pricecheck">
                        <input type="hidden" id="type_price" name="type_price">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="form-group" style="text-align: center;">
                            <label> <b>NAMA KELAS</b> </label>
                            <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="namakelaspembayaran" name="namakelaspembayaran" readonly>
                            <input type="hidden" id="subclasscode_pricecheck" name="subclasscode_pricecheck" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="subclasscode_add">
                    <div class="col-md-5">
                        <div class="form-group" style="text-align: center;">
                            <label for="Nama Kelas" > <b>HARGA KELAS SAAT INI</b> </label>
                            <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="hargasaatini_pricecheck" name="hargasaatini_pricecheck" readonly>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div> 
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="form-group" style="text-align: center;">
                            <label for="Harga Kelas" > <b>NAMA SUBKELAS</b> </label>
                            <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="namasubkelaspembayaran" name="namasubkelaspembayaran" readonly>
                            <input type="hidden" id="subclassname_pricecheck" name="subclassname_pricecheck" value="Ujian" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group" style="text-align: center;">
                            <label for="Nama Kelas" > <b>HARGA KELAS BARU</b> </label>
                            <input type="text" class="form-control" style="font-size: 14px; text-align: center; font-weight:bold;" id="hargabaru_pricecheck" name="hargabaru_pricecheck" readonly>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>    
        </div>
        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="ubahhargakelas()" class="btn btn-success" >Lanjutkan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ACC FOR SPP PAYMENT -->
<div class="modal fade" id="spp_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="color: red;"> <b>Mohon Cek Kembali Data Anda</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="form_bayar_spp">  
        <div class="modal-body">
            <h5 style="color: green;">Konfirmasi Pembayaran SPP</h5> 
            <hr>
            <h5><b>Murid</b></h5>
            <div class="row">
                <div class="col-md-12" style="background-color:#778899; padding:10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>KODE</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kode4" name="kode4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>NAMA</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama4" name="nama4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>KELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kelas4" name="kelas4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>SUBKELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="subkelas4" name="subkelas4" readonly>
                        </div>
                    </div>
                </div>    
            </div>
            <hr>
            <h5><b>Tanggihan</b></h5>
            <div class="row" style="background-color:#778899; padding:10px;">    
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>SUBTOTAL</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="subtotal4" name="subtotal4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>DENDA</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="denda4" name="denda4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>POTONGAN DENDA</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="potongan4" name="potongan4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>TOTAL</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="total4" name="total4" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TANGGAL PEMBAYARAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tanggal_pembayaran4" name="tanggal_pembayaran4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>ATAS NAMA</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="atas_nama4" name="atas_nama4" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>CATATAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="catatan4" name="catatan4" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="bayar_spp()" class="btn btn-success">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ACC FOR EXAM PAYMENT -->
<div class="modal fade" id="exam_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>CEK KEMBALI DATA!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post">  
        <div class="modal-body">
            <h5 style="color: green;">Konfirmasi Pembayaran Ujian</h5> 
            <hr>
            <h5><b>Murid</b></h5>
            <div class="row">
                <div class="col-md-12" style="background-color:#778899; padding:10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>KODE</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kode5" name="kode5" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>NAMA</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama5" name="nama5" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>KELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kelas5" name="kelas5" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>SUBKELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="subkelas5" name="subkelas5" readonly>
                        </div>
                    </div>
                </div>    
            </div>
            <hr>
            <h5><b>Tanggihan</b></h5>
            <div class="row" style="background-color:#778899; padding:10px;">    
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TOTAL</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="total5" name="total5" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TANGGAL PEMBAYARAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tanggal_pembayaran5" name="tanggal_pembayaran5" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>ATAS NAMA</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="atas_nama5" name="atas_nama5" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>CATATAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="catatan5" name="catatan5" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="bayarujian()" class="btn btn-success">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ACC FOR EXAM PAYMENT -->
<div class="modal fade" id="exam_payment_private" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>CEK KEMBALI DATA!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post">  
        <div class="modal-body">
            <h5 style="color: green;">Konfirmasi Pembayaran Private</h5> 
            <hr>
            <h5><b>Murid</b></h5>
            <div class="row">
                <div class="col-md-12" style="background-color:#778899; padding:10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>KODE</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kode5_private" name="kode5_private" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>NAMA</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama5_private" name="nama5_private" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>KELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kelas5_private" name="kelas5_private" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>SUBKELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="subkelas5_private" name="subkelas5_private" readonly>
                        </div>
                    </div>
                </div>    
            </div>
            <hr>
            <h5><b>Tanggihan</b></h5>
            <div class="row" style="background-color:#778899; padding:10px;">    
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TOTAL</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="total5_private" name="total5_private" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TANGGAL PEMBAYARAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tanggal_pembayaran5_private" name="tanggal_pembayaran5_private" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>ATAS NAMA</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="atas_nama5_private" name="atas_nama5_private" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>CATATAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="catatan5_private" name="catatan5_private" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="bayar_private()" class="btn btn-success">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ACC FOR CUTI PAYMENT -->
<div class="modal fade" id="cuti_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="color: red;"> <b>Mohon Cek Kembali Data Anda</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="form_bayar_cuti2">  
        <div class="modal-body">
            <h5 style="color: green;">Konfirmasi Pembayaran Cuti</h5> 
            <hr>
            <h5><b>Murid</b></h5>
            <div class="row">
                <div class="col-md-12" style="background-color:#778899; padding:10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>KODE</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kode6" name="kode6" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>NAMA</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama6" name="nama6" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>KELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kelas6" name="kelas6" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>SUBKELAS</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="subkelas6" name="subkelas6" readonly>
                        </div>
                    </div>
                </div>    
            </div>
            <hr>
            <h5><b>Pembayaran Cuti</b></h5>
            <div class="row" style="background-color:#778899; padding:10px;">    
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label>TANGGAL PEMBAYARAN</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tanggal_pembayaran6" name="tanggal_pembayaran6" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Daftar Pembayaran Cuti</label>
                        </div>
                        <div class="col-md-12" style="background-color:white;">
                            <div id="cutilist" class="cutilist">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div style="text-align:center; margin-bottom:10px;">
            <button type="button" onclick="bayar_cuti()" class="btn btn-success">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>
