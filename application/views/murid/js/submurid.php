<script>
function checkinput(){
var url = "<?=base_url('Data_Murid/checktambahkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_tambah_kelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
        if(data['status'] == true){
            $('#kodemurid33').val(data['data']['student_code']);
            $('#namamurid3').val(data['data']['namamurid2']);
            $('#price_class_type3').val(data['data']['price_class_type2']);
            $('#tglmasuk1').val($('#tglmasuk4').val());
            $('#namakelas2').val(data['data']['name']);
            $('#type').val(data['data']['class_price_type']);
            $('#namasubkelas3').val(data['data']['subclass_code']);
            $('#tahapan2').val(data['data']['class_step_number']);
            $('#price_class').val();
            $('#add_program_class').modal('show');
        } else {
            alert(data['alert']);
        }
    },
  });
}

function checkinput2(){
var url = "<?=base_url('Data_Murid/checktambahkelas2')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_tambah_kelas2").serialize(),
    dataType : "JSON",
    success: function(data)
    {
        if(data['status'] == true){
            $('#kodemurid33').val(data['data']['student_code']);
            $('#namamurid3').val(data['data']['namamurid2']);
            $('#price_class_type3').val(data['data']['class_price']);
            $('#tglmasuk1').val($('#tglmasuk').val());
            $('#namakelas2').val(data['data']['name']);
            $('#type').val(data['data']['class_price_type']);
            $('#tahapan2').val(data['data']['class_step_number']);
            $('#namasubkelas3').val(data['data']['subclass_code']);
            $('#price_class').val();
            $('#add_program_class').modal('show');
        } else {
            alert(data['alert']);
        }
    },
  });
}

function lanjuttambah(){  
var url = "<?=base_url().'Data_Murid/tambahkelas'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_lanjut_tambah").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $("#bayar_ujian").hide("fast");
      $("#bayar_spp").hide("fast");
      $("#hapusklasmurid").hide("fast");
      $("#statuseditmurid").hide("fast");
      $("#listsub").hide("fast");
      $("#ubahharga").hide("fast");

      $('#add_program_class').modal('hide');
      $('.modal-examlist').modal('hide');
      $('.modal-listkelasmurid').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      $('#listkelasmurid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function hapuskelasmurid(){
var url = "<?=base_url().'Data_Murid/hapuskelasmurid'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_hapus_kelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $("#bayar_ujian").hide("fast");
      $("#bayar_spp").hide("fast");
      $("#hapusklasmurid").hide("fast");
      $("#statuseditmurid").hide("fast");
      $("#listsub").hide("fast");
      $("#ubahharga").hide("fast");
      
      $('#hkelasmurid2').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data Berhasil diHapus',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function editstatusmurid(){
var url = "<?=base_url().'Data_Murid/editstatusmurid'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_editstatusmurid").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $("#bayar_ujian").hide("fast");
      $("#bayar_spp").hide("fast");
      $("#hapusklasmurid").hide("fast");
      $("#statuseditmurid").hide("fast");
      $("#listsub").hide("fast");
      $("#ubahharga").hide("fast");
      
      $('#modal-editstatus').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function editsubclass(){
var url = "<?=base_url().'Data_Murid/ubahsubkelas'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_editsubclass").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $("#bayar_ujian").hide("fast");
      $("#bayar_spp").hide("fast");
      $("#hapusklasmurid").hide("fast");
      $("#statuseditmurid").hide("fast");
      $("#listsub").hide("fast");
      $("#ubahharga").hide("fast");
      
      $('#change_subclass').modal('hide');
      $('.modal-sublist').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function ubahhargakelas(){
var url = "<?=base_url().'Data_Murid/ubahhargakelas'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_ubahhargakelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $("#bayar_ujian").hide("fast");
      $("#bayar_spp").hide("fast");
      $("#hapusklasmurid").hide("fast");
      $("#statuseditmurid").hide("fast");
      $("#listsub").hide("fast");
      $("#ubahharga").hide("fast");
      
      $('#change_priceclass').modal('hide');
      $('#modal-priceedit').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil diubah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function mbayarspp(){
  if($('#kategori').val() == 'BARRE' && $('#tb').val() == 0){ 
    $('#spp_payment').modal('show');
  } else if($('#tb').val() != 0 && $('#kategori').val() != 'BARRE') {
    $('#spp_payment').modal('show');
  } else {
    alert('Anda belum menceklist bulan pembayaran');
  }

  var qty_total = $('#biaya2').val();
  var biaya = $('#biaya').val();
  var subtotal = qty_total * biaya;

  var kelas = '( '+$('#kodekelas').val()+' ) '+$('#namakelas').val();
  var subkelas = '('+$('#kodeskelas').val()+') '+$('#namasubkelas').val();
  $('#kode4').val($('#kodekelas').val());
  $('#nama4').val($('#namamurid12').val());
  $('#kelas4').val(kelas);
  $('#subkelas4').val(subkelas);
  $('#subtotal4').val(subtotal);
  $('#denda4').val($('#bd').val());
  $('#potongan4').val($('#pd').val());
  $('#total4').val($('#tb').val());
  $('#tanggal_pembayaran4').val($('#tgl_pembayaran2').val());
  $('#atas_nama4').val($('#an').val());
  $('#catatan4').val($('#catatan').val());

}

function bayar_spp(){
  var url = "<?=base_url().'Data_Murid/bayarspp'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_pembayaran_spp").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#spp_payment').modal('hide');
      $('#modal-bayarspp').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function mbayarujian(){
  $('#exam_payment').modal('show');
  var kelas = '( '+$('#kodekelas').val()+' ) '+$('#namakelas').val();
  var subkelas = '('+$('#kodeskelas').val()+') '+$('#namasubkelas').val();
  $('#kode5').val($('#kodekelas').val());
  $('#nama5').val($('#nama_murid').text());
  $('#kelas5').val(kelas);
  $('#subkelas5').val(subkelas);
  $('#total5').val($('#pembayaran_ujian').val());
  $('#tanggal_pembayaran5').val($('#tpu').val());
  $('#atas_nama5').val($('#a_nama').val());
  $('#catatan5').val($('#keterangan_pembayaran').val());
}


function mbayarprivate(){
  $('#exam_payment_private').modal('show');
  var kelas = '( '+$('#kodekelas_private').val()+' ) '+$('#namakelas_private').val();
  var subkelas = '('+$('#kodeskelas_private').val()+') '+$('#namasubkelas_private').val();
  $('#kode5_private').val($('#kodekelas_private').val());
  $('#nama5_private').val($('#nama_murid_private').text());
  $('#kelas5_private').val(kelas);
  $('#subkelas5_private').val(subkelas);
  $('#total5_private').val($('#pembayaran_ujian_private').val());
  $('#tanggal_pembayaran5_private').val($('#tpu_private').val());
  $('#atas_nama5_private').val($('#a_nama_private').val());
  $('#catatan5_private').val($('#keterangan_pembayaran_private').val());
}

function bayarujian(){
  var url = "<?=base_url().'Data_Murid/bayarujian'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_bayar_ujian").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#exam_payment').modal('hide');
      $('#modal-bayarujian').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function bayar_private(){
  var url = "<?=base_url().'Data_Murid/bayarprivate'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_bayar_private").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#exam_payment_private').modal('hide');
      $('#modal-bayarprivate').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}


function mbayarcuti(){
  var url = "<?=base_url().'Data_Murid/listcuti'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_bayar_cuti").serialize(),
    success: function(data)
    {
      $('#cutilist').html('');
      $('#cutilist').html(data);
      
    },
  });
  $('#cuti_payment').modal('show');
  var kelas = '( '+$('#kodekelas5').val()+' ) '+$('#namakelas5').val();
  var subkelas = '('+$('#kodeskelas5').val()+') '+$('#namasubkelas5').val();
  $('#kode6').val($('#kodekelas5').val());
  $('#nama6').val($('#nama15').val());
  $('#kelas6').val(kelas);
  $('#subkelas6').val(subkelas);
  $('#tanggal_pembayaran6').val($('#tgl_pembayaran5').val());

}


function bayar_cuti(){
  var url = "<?=base_url().'Data_Murid/bayarcuti'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_bayar_cuti").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#cuti_payment').modal('hide');
      $('#modal-bayarcuti').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

function bayarprivate(){
  var url = "<?=base_url().'Data_Murid/bayarujian'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_bayar_ujian").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#exam_payment').modal('hide');
      $('#modal-bayarprivate').modal('hide');
      $('#sub_murid').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data berhasil ditambah',
          'success',
      );
        } else {
            alert(data['alert']);
        }   
    },
  });
}

</script>