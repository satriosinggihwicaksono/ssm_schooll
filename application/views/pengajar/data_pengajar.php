<style>
    #pengajar td:nth-child(2),
    #pengajar th:nth-child(2),
    #datakelaspengajar td:nth-child(1),
    #datakelaspengajar th:nth-child(1),
    #datakelaspengajar td:nth-child(2),
    #datakelaspengajar th:nth-child(2)
    {
        font-weight: bold;
    }
</style>

<section class="section">
    <div class="section-header" style="display: none;">
    <h1>Data Pengajar</h1>
    </div>

    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="text-align:left">
                            <button class="btn btn-info showmodalguru m-addguru" data-toggle="modal" data-target=".modal-guru"><i class="fas fa-folder-plus"></i> Tambah</button>
                            <span id="proses_guru" style="display:none">
                                <button class="btn btn-warning m-editguru" data-toggle="modal" data-target=".modal-edit-guru"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger m-hapusguru" data-toggle="modal" data-target=".modal-hapus-guru"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </span>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">    
                        <table class="table" id="pengajar">
                            <thead>
                                <tr>
                                    <th>KODE</th>
                                    <th>NAMA</th>
                                    <th>HP</th>
                                    <th>FEE GURU</th>
                                    <th>FEE ASISTEN1</th>
                                    <th>FEE ASISTEN2</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered"> </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
           <div class="card-body">
            <table class="table" id="datakelaspengajar">
                <thead>
                    <tr>
                        <th>KELAS</th>
                        <th>SUBKELAS</th>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>STUDIO</th>
                    </tr>
                </thead>
                <tbody class="table-bordered"></tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- modal add Pengajar -->
<div class="modal fade modal-guru" tabindex="-1" role="dialog" aria-labelledby="modalguru" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="headmodalguru"><b>Form Tambah Pengajar</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_tambah_pengajar">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Kode guru">KODE GURU</label>
                            <input type="text" class="form-control" id="kodeguru" name="kodeguru"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Nama Lengkap">NAMA</label>
                            <input type="text" class="form-control" id="namaguru" name="namaguru"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Tanggal Lahir">TANGGAL LAHIR </label>
                            <input type="text" class="form-control format_tanggal_2" id="tgllahir" name="tgllahir" value="<?=date('d-m-Y')?>" >
                        </div>
                        <div class="form-group">
                            <label for="Tanggal Lahir">TEMPAT LAHIR</label>
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Alamat Lengkap">ALAMAT</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" > 
                        </div>
                        <div class="form-group">
                            <label for="Nama Lengkap">NAMA LENGKAP</label>
                            <input type="text" class="form-control" name="fullname">
                        </div>
                        <div class="form-group">
                            <label for="Skill">SKILL</label>
                            <input type="text" class="form-control" id="skill" name="skill" >
                        </div>
                        <div class="form-group">
                            <label for="Skill">TANGGAL TERDAFTAR</label>
                            <input type="text" class="form-control format_tanggal_3" name="awal" value="<?=date('d-m-Y')?>" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Fee Guru">FEE GURU</label>
                            <input type="text" class="form-control" id="feeguru" name="feeguru"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Fee Asistance 1">FEE ASISTEN1</label>
                            <input type="text" class="form-control" id="feeasistance1" name="feeasistance1" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Fee Asistance 2">FEE ASISTEN2</label>
                            <input type="text" class="form-control" id="feeasistance2" name="feeasistance2" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Handphone guru">HP GURU</label>
                            <input type="number" class="form-control" id="hpguru" name="hpguru" onKeyDown="if(this.value.length==13) return false;"  >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Keterangan">KETERANGAN</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"  >
                        </div>
                        <div class="form-group">
                            <label for="Aktif">AKTIF</label>
                            <select name="aktif" id="aktif" class="form-control">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"  >
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="save_pengajar()" class="btn btn-primary">Tambah</button>
        </div>
    </div>
  </div>
</div>
</div>

<!-- modal Edit Pengajar -->
<div class="modal fade modal-edit-guru" tabindex="-1" role="dialog" aria-labelledby="modaleditguru" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="headmodaleditguru"><b>Form Edit Pengajar</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_edit_pengajar">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Kode guru">KODE GURU</label>
                            <input type="text" class="form-control" id="kodeguru" name="kodeguru" readonly  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Nama Lengkap">NAMA</label>
                            <input type="text" class="form-control" id="namaguru" name="namaguru"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Tanggal Lahir">TANGGAL LAHIR</label>
                            <input type='text' id='tgllahiredit_pengajar' name="tgllahir" class="form-control tgllahir">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal Lahir">TEMPAT LAHIR</label>
                            <input type="text" class="form-control" id="tmptlahir" name="tmptlahir" value="" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Alamat Lengkap">ALAMAT</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"> 
                        </div>
                        <div class="form-group">
                            <label for="Nama Lengkap">NAMA LENGKAP</label>
                            <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                        <div class="form-group">
                            <label for="Skill">SKILL</label>
                            <input type="text" class="form-control" id="skill" name="skill" >
                        </div>
                        <div class="form-group">
                            <label for="Skill">TANGGAL TERDAFTAR</label>
                            <input type="text" class="form-control format_tanggal_4" id="awal" name="awal" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Fee Guru">FEE GURU</label>
                            <input type="text" class="form-control" id="feepengajar" name="feeguru"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Fee Asistance 1">FEE ASISTEN1</label>
                            <input type="text" class="form-control" id="feeasistan1" name="feeasistance1" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Fee Asistance 2">FEE ASISTEN2</label>
                            <input type="text" class="form-control" id="feeasistan2" name="feeasistance2" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                        </div>
                        <div class="form-group">
                            <label for="Handphone guru">HP GURU</label>
                            <input type="number" class="form-control" id="hpguru" name="hpguru" onKeyDown="if(this.value.length==13) return false;"  >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="Keterangan">KETERANGAN</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" >
                        </div>
                        <div class="form-group">
                            <label for="Aktif">AKTIF</label>
                            <select name="aktif" id="aktif" class="form-control">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="edit_pengajar()" class="btn btn-primary">Edit</button>
        </div>
    </div>
  </div>
</div> 
</div>


<!-- Modal Confirm Delete -->
<div class="modal fade modal-hapus-guru" id="hapuspengajar" tabindex="-1" role="dialog" aria-labelledby="hapuspengajar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Pengajar</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="form_hapus_pengajar">
      <div class="modal-body">
        <h4 class="text-center" id="namapengajar"></h4>
        <input type="hidden" name="hdatapengajar">
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="hapus_pengajar()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    /* Format Rupiah feeguru */
    var tanpa_rupiah = document.getElementById('feeguru');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    
    /* Format Rupiah feeasistance1 */
    var dengan_rupiah = document.getElementById('feeasistance1');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value);
    });

    /* Format Rupiah feeasistance2 */
    var dgnn_rupiah = document.getElementById('feeasistance2');
    dgnn_rupiah.addEventListener('keyup', function(e)
    {
        dgnn_rupiah.value = formatRupiah(this.value);
    });
    
    /* Format Rupiah feepengajar */
    var feepengajar = document.getElementById('feepengajar');
    feepengajar.addEventListener('keyup', function(e)
    {
        feepengajar.value = formatRupiah(this.value);
    });
    
    /* Format Rupiah feeasistan1 */
    var feeasistan1 = document.getElementById('feeasistan1');
    feeasistan1.addEventListener('keyup', function(e)
    {
        feeasistan1.value = formatRupiah(this.value);
    });

    /* Format Rupiah feeasistan2 */
    var feeasistan2 = document.getElementById('feeasistan2');
    feeasistan2.addEventListener('keyup', function(e)
    {
        feeasistan2.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
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
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }
</script>

<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script>
    $(function () {
      $(".tgllahir").datepicker({
          dateFormat: 'yy-mm-dd',
      });
    });
</script>


<script>

function save_pengajar(){
  var url = "<?=base_url('data_Pengajar/tambahpengajar')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_tambah_pengajar").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('.modal-guru').modal('hide');
      $('#proses_guru').hide();
      $('#pengajar').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data telah ditambah',
          'success',
      );
    } else {
            alert(data['alert']);
        }   
    },
  });
}

function edit_pengajar(){
  var url = "<?=base_url('data_Pengajar/editpengajar')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_edit_pengajar").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('.modal-edit-guru').modal('hide');
      $('#proses_guru').hide();
      $('#pengajar').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data telah di edit',
          'success',
      );
        } else {
            alert(data['alert']);
        } 
    },
  });
}


function hapus_pengajar(){
    var url = "<?=base_url('data_Pengajar/hapuspengajar')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_hapus_pengajar").serialize(),
    dataType : "JSON",
    success: function(data)
    {
         if(data['status'] == true){
            $('.modal-hapus-guru').modal('hide');
            $('#proses_guru').hide();
            $('#pengajar').DataTable().ajax.reload();
            swal(
                'Sukses',
                'Data telah berhasil dihapus',
                'success',
            );
        } else {
            alert(data['alert']);
        } 
    },
    error: function (jqXHR, textStatus, errorThrown){
        alert('Data tidak dapat dihapus');
    }
  });
}
</script>
