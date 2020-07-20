<script>
function tambah_murid(){  
var url = "<?=base_url().'data_Murid/tambahmurid'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_tambah_murid").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('#modal-murid').modal('hide');
      $('#proses_murid').hide();
      $('#muriddata').DataTable().ajax.reload();
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

function edit_murid(){  
    var url = "<?=base_url().'data_Murid/editmurid'?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_edit_murid").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('.modal-edit-murid').modal('hide');
      $('#proses_murid').hide();
      $('#muriddata').DataTable().ajax.reload();
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

function hapus_murid(){
var url = "<?=base_url('data_Murid/hapusmurid')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_hapus_murid").serialize(),
    dataType : "JSON",
    success: function(data)
    {
         if(data['status'] == true){
            $('.modal-hapus-murid').modal('hide');
            $('#proses_murid').hide();
            $('#muriddata').DataTable().ajax.reload();
            swal(
                'Sukses',
                'Data telah berhasil dihapus',
                'success',
            );
        } else {
            alert(data['alert']);
        } 
    },
  });
}
	
	function checking(){
var kodemurid = $('#kodehuruf').val();
var url = "<?=base_url('data_Murid/checkingkode')?>"
  $.ajax({
    url : url,
    type : "POST",
    data: { kode : kodemurid},
    dataType : "JSON",
    success: function(data)
    {
      if(data != null){
        $('#hasilnomer').val(data);
      } else {
        $('#hasilnomer').val('Kode Huruf Belum terdaftar');
      }
    },
  });
}

</script>