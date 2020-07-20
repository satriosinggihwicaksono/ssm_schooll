<script>
$(document).ready(function() {
  var tbkas = $('#datakas').DataTable({
    "language": {
      "info": "Jumlah Data : _TOTAL_ ",
      "sInfoEmpty": "Jumlah Data : _TOTAL_ ",
    oPaginate: {
      sNext: '<i class="fas fa-forward"></i>',
      sPrevious: '<i class="fas fa-backward"></i>',
      sFirst: '<i class="fas fa-step-backward"></i>',
      sLast: '<i class="fas fa-step-forward"></i>'
      },
      "infoFiltered": ""
    },
    "rowId" : 'extn',
    "paging":   false,
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true,
    "pageLength": 100,
    "bAutoWidth": false,
    "scrollY": 400, // Pengaturan banyak kolom pada datatable
    "scrollX": true,
    responsive: true,
    "autoWidth": false,
    "ajax": {
      url: 'Kas/get_kas/',
      type: 'POST',
      data: function(data){
        data.tanggal_awal = $('#tanggal_awal').val();
        data.tanggal_akhir = $('#tanggal_akhir').val();
      },
    },
    "columns": [
      { data: 'waktu' },
      { data: 'trx_id' },
      { data: 'name' },
      { data: 'description' },
      { data: 'amount' },
      { data: 'type' }
    ],
  });

  $('#datakas tbody').on('click', 'tr', function(e){
    $('#show_sub_kas').show();
    e.preventDefault();
    var datakas = tbkas.row( this ).data();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );
    if(datakas != null){
      $('#proses_kas').show();
    }
    
    $('.m-addkas').prop("required", true).click(function(){
        $('#form_tambah_kas')[0].reset();
    });
    
    $('.m-editkas').unbind().click(function(){
        var t = datakas.datetime.split(/[- :]/);
        var date = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
        var day = date.getDate(),
        month = date.getMonth() + 1,
        year = date.getFullYear(),
        hour = date.getHours(),
        min  = date.getMinutes();

        month = (month < 10 ? "0" : "") + month;
        day = (day < 10 ? "0" : "") + day;
        hour = (hour < 10 ? "0" : "") + hour;
        min = (min < 10 ? "0" : "") + min;

        var today = year + "-" + month + "-" + day;
        $('input[name=tanggal2]').val(today);
        $('input[name=tipe2]').val(datakas.type).change();
        $('input[name=refid2]').val(datakas.trx_id);
        $('input[name=keperluan2]').val(datakas.name);
        $('input[name=keterangan2]').val(datakas.description);
        $('input[name=besar2]').val(datakas.amount);
    });
  

    $('.m-hapuskas').click(function(){
     $('input[name=refid3]').val(datakas.trx_id);
     $('#norefhapus').text("Hapus Data "+datakas.trx_id+"?");
     
    });
    $.fn.dataTable.ext.errMode = 'none';
  });
});

$('#tipe').change(function() { 
    var tipe = $('#tipe').val(); 
    $.ajax({
        type: 'GET',
        url: '<?= base_url() ?>Kas/get_refid',
        data: {tipe : tipe},
        success: function(response) {
            $('#refid').val(response);
        }
    }); 
});

function search_kas(){
  $('#datakas').DataTable().ajax.reload(); 
}
</script>
