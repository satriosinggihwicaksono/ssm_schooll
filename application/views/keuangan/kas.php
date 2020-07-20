<style>
    #datakas td:nth-child(6),
    #datakas th:nth-child(6)
    {
        font-weight: bold;
    }
    #datakas td:nth-child(5),
    #datakas th:nth-child(5)
    {
        text-align: right;
    }
</style>

<section class="section">
    <div class="section-header" style="display: none;">
    <h1>Data kas</h1>
    </div>

    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
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
                                <button class="btn btn-success m-editkas" onclick="search_kas()"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align:right">
                        <div>
                            <button class="btn btn-info m-addkas" data-toggle="modal" data-target=".modal-kas"><i class="fas fa-folder-plus"></i> Tambah</button>
                            <span id="proses_kas" style="display:none">
                                <button class="btn btn-warning m-editkas" data-toggle="modal" data-target=".modal-edit-kas"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger m-hapuskas" data-toggle="modal" data-target=".modal-hapus-kas"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </span>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table" id="datakas">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No. Ref</th>
                                    <th>Keperluan</th>
                                    <th>Keterangan</th>
                                    <th>Besar (Rp)</th>
                                    <th>Tipe</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered"></tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- modal add kas -->
<div class="modal fade modal-kas" tabindex="-1" role="dialog" aria-labelledby="modalkas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headmodalkas"><b>Form Tambah kas</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="form_tambah_kas">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>">
                            </div>
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="tipe" id="tipe" class="form-control tipe">
                                    <option value="">PILIH</option>
                                    <option value="Biaya">Biaya</option>
                                    <option value="Pendapatan">Pendapatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No. Ref</label>
                                <input type="text" class="form-control" id="refid" name="refid" readonly>
                            </div>
                            <div class="form-group">
                                <label>Keperluan</label>
                                <input type="text" class="form-control keperluan" id="keperluan" name="keperluan">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                            <div class="form-group">
                                <label>Besar (Rp)</label>
                                <input type="text" class="form-control" id="besar" name="besar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 26px;">
                <button type="button" onclick="tambah_kas()" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- modal Edit kas -->
<div class="modal fade modal-edit-kas" tabindex="-1" role="dialog" aria-labelledby="modaleditkas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headmodaleditkas"><b>Form Edit kas</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="form_data_kas">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal2" id="tanggal2" value="">
                            </div>
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="tipe2" id="tipe2" class="form-control" readonly>
                                    <option value="Biaya">Biaya</option>
                                    <option value="Pendapatan">Pendapatan</option>
                                    <option value="Pendapatan Registrasi">Pendapatan Registrasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No. Ref</label>
                                <input type="text" class="form-control" id="refid2" name="refid2" readonly>
                            </div>
                            <div class="form-group">
                                <label>Keperluan</label>
                                <input type="text" class="form-control" id="keperluan2" name="keperluan2" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" id="keterangan2" name="keterangan2">
                            </div>
                            <div class="form-group">
                                <label>Besar (Rp)</label>
                                <input type="text" class="form-control" id="besar2" name="besar2">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="save_data_kas()">Edit</button>
                </div>
            </div>
        </div>
  </div>
</div>
<!-- Modal Confirm Delete -->
<div class="modal fade modal-hapus-kas" id="hapuskas" tabindex="-1" role="dialog" aria-labelledby="hapuskas" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapuskas"><b>Hapus kas</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="delete_kas">
      <div class="modal-body">
        <h4 class="text-center" id="norefhapus"></h4>
        <input type="hidden" name="refid3" id="refid3">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hapus_kas()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    /* Format hargakelas1 ADD */
    var besar = document.getElementById('besar');
    besar.addEventListener('keyup', function(e)
    {
        besar.value = formatRupiah(this.value);
    });
    
    /* Format hargakelas2 ADD */
    var besar2 = document.getElementById('besar2');
    besar2.addEventListener('keyup', function(e)
    {
        besar2.value = formatRupiah(this.value);
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

<script>
function tambah_kas(){
    if($('.tipe').val() == '') {
        alert('Kolom Tipe Tidak boleh kosong');
    } else if($('.keperluan').val() == ''){
        alert('Kolom Keperluan Tidak boleh kosong');
    }  else {   
        var url = "<?=base_url('Kas/tambahkas')?>"
        $.ajax({
            url : url,
            type : "POST",
            data : $("#form_tambah_kas").serialize(),
            dataType : "JSON",
            success: function(data)
            {
            if(data['status'] == true){
            $('.modal-kas').modal('hide');
            $('#datakas').DataTable().ajax.reload();
            $('#form_tambah_kas')[0].reset();
            $('#proses_kas').hide();
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
}

function save_data_kas(){
    if($('.tipe2').val() == '') {
        alert('Kolom Tipe Tidak boleh kosong');
    } else if($('.keperluan2').val() == ''){
        alert('Kolom Keperluan Tidak boleh kosong');
    }  else {     
        var url = "<?=base_url('Kas/editkas')?>"
        $.ajax({
            url : url,
            type : "POST",
            data : $("#form_data_kas").serialize(),
            dataType : "JSON",
            success: function(data)
            {
            if(data['status'] == true){
            $('.modal-edit-kas').modal('hide');
            $('#datakas').DataTable().ajax.reload();
            $('#form_tambah_kas')[0].reset();
            $('#proses_kas').hide();
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
}

function hapus_kas(){
    var url = "<?=base_url('kas/hapuskas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#delete_kas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
         if(data['status'] == true){
            $('.modal-hapus-kas').modal('hide');
            $('#datakas').DataTable().ajax.reload();
            $('#sub_kas').DataTable().clear().destroy();
            $('#form_tambah_kas')[0].reset();
            $('#proses_kas').hide();
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
        alert('Data Kekas tidak dapat di hapus karena digunakan pada Data Sub-kas');
    }
  });
}

</script>
