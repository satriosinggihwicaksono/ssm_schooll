<!-- modal add murid -->
<div class="modal fade" id="modal-murid" tabindex="-1" role="dialog" aria-labelledby="modalmurid" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headmodalmurid">Form Tambah Murid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="form_tambah_murid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Kode murid">KODE MURID</label>
                                    <input type="text" class="form-control" id="kodemurid" name="kodemurid" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Lahir">TANGGAL LAHIR</label>
                                    <input type="text" class="form-control" id="tgllahir_tambahmurid" name="tgllahir" value="<?=date('d-m-Y')?>" >
                                </div>
                                <div class="form-group">
                                    <label for="Email">EMAIL</label>
                                    <input type="email" class="form-control" id="email" name="email"  >
                                </div>
                                <div class="form-group">
                                    <label>TEMPAT LAHIR</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nama Lengkap">NAMA LENGKAP</label>
                                    <input type="text" class="form-control" id="namamurid" name="namamurid"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="Handphone Orang Tua">HP ORANG TUA</label>
                                    <input type="number" class="form-control" id="hportu" onKeyDown="if(this.value.length==13) return false;" name="hportu">
                                </div>
                                <div class="form-group">
                                    <label for="Facebook">FACEBOOK</label>
                                    <input type="text" class="form-control" id="facebook" name="faceboook" >
                                </div>
                                <div class="form-group">
                                    <label for="Password">AWAL DAFTAR</label>
                                    <input type="text" class="form-control format_tanggal_4" id="awal" name="awal" value="<?=date('d-m-Y')?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nama Panggilan">NAMA PANGGILAN</label>
                                    <input type="text" class="form-control" id="namapanggilan" name="namapanggilan"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="Handphone Murid">HP MURID</label>
                                    <input type="number" class="form-control" id="hpmurid" name="hpmurid" onKeyDown="if(this.value.length==13) return false;" >
                                </div>
                                <div class="form-group">
                                    <label for="Catatan">CATATAN</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan"  >
                                </div>
                                <div class="form-group">
                                    <label for="Password">PASSWORD</label>
                                    <input type="text" class="form-control" id="pwd" name="pwd" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Alamat">ALAMAT</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" >
                                </div>
                                <div class="form-group">
                                    <label for="Instagram">INSTAGRAM</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram"  >
                                </div>
                                <div class="form-group">
                                    <label for="Keaktifan">KEAKTIFAN</label>
                                    <input type="text" class="form-control" id="keaktifan" name="keaktifan" placeholder="Keaktifan" value="Aktif" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="text-align:center">
                                <h5>BIAYA PENDAFTARAN</h5>
                            </div>
                            
                            <div class="col-md-4">
                               <label for="Alamat">PENDAFTARAN</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="status_cost" name="status_cost" value="1" checked> <label for="Alamat">Dengan Biaya</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="status_cost" name="status_cost" value="0"> <label for="Alamat">Tanpa Biaya</label>
                            </div>

                            <div class="col-md-12">
                                <label><b>Masukan Pendaftaran</b></label> <br>
                            </div>

                            <div class="col-md-4">
                               <label for="Alamat">Jenis</label>
                            </div>
                            <div class="col-md-8">
                                <select name="jenis_cost" id="jenis_cost" class="form-control" style="font-weight: bold;background-color: white; color: black; font-size:12px; width:100%;">
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

                            <div class="col-md-4">
                               <label for="Alamat">Atas Nama</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="atasnama_cost" name="atasnama_cost" class="form-control">
                            </div>

                            <div class="col-md-4">
                               <label for="Alamat">Biaya Pendaftaran (Rp)</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="bayar_cost" name="bayar_cost"  class="form-control" value="<?=number_format($konfigurasi['data']['cost'], 0, ".", ".");?>" readonly>
                            </div>

                            <div class="col-md-4">
                               <label for="">Potongan (Rp)</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="potongan_cost" name="potongan_cost" value="0" class="form-control"  onkeyup="total_registrasi()";>
                            </div>

                            <div class="col-md-4">
                               <label for="Alamat">Total (Rp)</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="total_cost" name="total_cost"  class="form-control" value="<?=number_format($konfigurasi['data']['cost'], 0, ".", ".");?>" readonly>
                            </div>

                            <div class="col-md-4">
                               <label for="Alamat">Catatan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="catatan_cost" name="catatan_cost" value="" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer" style="margin-top: 50px;">
                        <button type="button" onclick="tambah_murid()" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal Edit murid -->
<div class="modal fade modal-edit-murid" tabindex="-1" role="dialog" aria-labelledby="modaleditmurid" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headmodaleditmurid"><b>Form Edit Murid</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="form_edit_murid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Kode murid">KODE MURID</label>
                                    <input type="text" class="form-control" id="kodemurid" name="kodemurid" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Lahir">TANGGAL LAHIR</label>
                                    <input type='text' id="tgllahiredit_murid" name="tgllahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Email">EMAIL</label>
                                    <input type="email" class="form-control" id="email" name="email" >
                                </div>
                                <div class="form-group">
                                    <label for="Password">TEMPAT LAHIR</label>
                                    <input type="text" class="form-control" id="tmplahir" name="tmplahir" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nama Lengkap">NAMA LENGKAP</label>
                                    <input type="text" class="form-control" id="namamurid" name="namamurid"> <!-- required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete='off'> -->
                                </div>
                                <div class="form-group">
                                    <label for="Handphone Orang Tua">HP ORANG TUA</label>
                                    <input type="number" class="form-control" id="hportu" name="hportu"   pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;">
                                </div>
                                <div class="form-group">
                                    <label for="Facebook">FACEBOOOK</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook"  >
                                </div>
                                <div class="form-group">
                                    <label for="Password">AWAL DAFTAR</label>
                                    <input type="text" class="form-control format_tanggal_5" id="awal2" name="awal">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nama Panggilan">NAMA PANGGILAN</label>
                                    <input type="text" class="form-control" id="namapanggilan" name="namapanggilan" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"> <!-- required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete='off'> -->
                                </div>
                                <div class="form-group">
                                    <label for="Handphone Murid">HP MURID</label>
                                    <input type="number" class="form-control" id="hpmurid" name="hpmurid"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;">
                                </div>
                                <div class="form-group">
                                    <label for="Catatan">CATATAN</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan"  >
                                </div>
                                <div class="form-group">
                                    <label for="Password">PASSWORD</label>
                                    <input type="text" class="form-control" id="pwd" name="pwd" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Alamat Lengkap">ALAMAT</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" > <!-- required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" autocomplete='off'> -->
                                </div>
                                <div class="form-group">
                                    <label for="Instagram">INSTAGRAM</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" >
                                </div>
                                <div class="form-group">
                                    <label for="Aktif">KEAKTIF</label>
                                    <select name="keaktifan"  id="active2" class='form-control'>
                                        <option value='Aktif'>Aktif</option>
                                        <option value='Cuti'>Cuti</option>
                                        <option value='Keluar'>Keluar</option>
                                    <select>
                                </div>
                                
                                <div class="modal-footer" style="margin-top: 50px;">
                                    <button type="button" onclick="edit_murid()" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm Delete -->
<div class="modal fade modal-hapus-murid" id="hapusmurid" tabindex="-1" role="dialog" aria-labelledby="hapusmurid" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmurid"><b>Hapus Murid</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="form_hapus_murid">
      <div class="modal-body">
        <h4 class="text-center" id="namahapusmur"></h4>
        <input type="hidden" name="hdatamurid">
        <input type="hidden" name="kodestaf">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hapus_murid()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade modal-modal-check" id="modal-check" tabindex="-1" role="dialog" aria-labelledby="hapusmurid" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmurid"><b>Check Kode Murid</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>KODE HURUF MURID</label>
                <input type="text" class="form-control" id="kodehuruf" name="kodehuruf">
            </div>
            <div class="form-group">
                <label>NOMER TERSEDIA</label>
                <input type="text" class="form-control" id="hasilnomer" name="hasilnomer" readonly>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="checking()" class="btn btn-success">Checking</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var potongan = document.getElementById('potongan_cost');
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

    function total_registrasi(){
      var bayar = document.getElementById('bayar_cost').value;
      var potongan = document.getElementById('potongan_cost').value;
      var result = parseInt(bayar.replace(".","")) - parseInt(potongan.replace(".",""));
      
      var	number_string = result.toString(),
      sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }


      if (!isNaN(result)){
        document.getElementById('total_cost').value = rupiah;
      } else {
        document.getElementById('total_cost').value = bayar; 
      }
    }
</script>