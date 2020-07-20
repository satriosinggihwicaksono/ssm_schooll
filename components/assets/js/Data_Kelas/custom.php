<script>
$(document).ready(function() {
  var tbkelas = $('#datakelas').DataTable({
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
    "scrollY": 230, // Pengaturan banyak kolom pada datatable
    "scrollX": true,
    responsive: true,
    "autoWidth": false,
    "ajax": 'Data_Kelas/get_kelas/',
    "columns": [
      { data: 'code' },
      { data: 'name' },
      { data: 'price' },
      { data: 'price_B' },
      { data: 'step_number' }
    ],
  });


  $('#datakelas tbody').on('click', 'tr', function(e){
    $('#show_sub_kelas').show();
    e.preventDefault();
    var datakelas = tbkelas.row( this ).data();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );
    if(datakelas != null){
      $('#proses_kelas').show();
    }
    
    $('#proses_subkelas').show();
    var $row = $(this).closest("tr"), 
    $tds = $row.find("td:nth-child(1)");
  
    $('#sub_kelas').DataTable().clear().destroy();
  
    setTimeout($('#sub_kelas').DataTable({
      "paging":   false,
      "bPaginate": true,
      "info" : false,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": true,
      "pageLength": 100,
      "scrollY": 130, //Pengaturan banyak kolom pada datatable
      "scrollX": true,
      "bAutoWidth": false,
      "searching" : false,
      responsive: true,
      "autoWidth": false,
      "ajax": 'Data_Kelas/get_sub_kelas/'+datakelas.code,
      "columns": [
        { data: 'KODESUBKELAS' },
        { data: 'NAMASUBKELAS' },
        { data: 'STUDIO' },
        { data: 'HARI' },
        { data: 'JAM' },
        { data: 'GURU' },
        { data: 'ASISTEN1' },
        { data: 'ASISTEN2' },
        { data: 'ACTIVE' }
      ],
    }),1);
  
    $.fn.dataTable.ext.errMode = 'none';
  
      
    $('#sub_kelas tbody').on('click', 'tr', function(e){
      $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );
      if(tbsubkelas == null){
        var tbsubkelas = $('#sub_kelas').DataTable({
          "select": true,
          "paging":   false,
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": true,
          "info" : false,
          "pageLength": 100,
          "scrollY": 130, //Pengaturan banyak kolom pada datatable
          "scrollX": true,
          "bAutoWidth": false,
          "searching" : false,
          responsive: true,
          "autoWidth": false,
          "ajax": 'Data_Kelas/get_sub_kelas/'+datakelas.code,
          "columns": [
            { data: 'KODESUBKELAS' },
            { data: 'NAMASUBKELAS' },
            { data: 'STUDIO' },
            { data: 'HARI' },
            { data: 'JAM' },
            { data: 'GURU' },
            { data: 'ASISTEN1' },
            { data: 'ASISTEN2' },
            { data: 'ACTIVE' }
          ],
        });
      }
      $.fn.dataTable.ext.errMode = 'none';
  
      var data_sub_kelas = tbsubkelas.row(this).data();
     
      if(data_sub_kelas != null){
      $('#edithapus').show();
        var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
        $tds = $row.find("td:nth-child(1)");
        $.each($tds, function() {
            var x = $(this).text();
            if (x === "-") {
              $("#hapussubklas").hide("fast");
              $("#editsubklas").hide("fast");
            }
            else if (x) {
              $("#hapussubklas").show("fast");
              $("#editsubklas").show("fast");
            }
        });
      }
  
      $('.m-hapus').unbind('click').click(function(){
        $('input[name=hsub]').val(data_sub_kelas.KODESUBKELAS);
        $('input[name=kodekelas]').val(datakelas.code);
        $('#namahapussub').text("HAPUS "+data_sub_kelas.NAMASUBKELAS+"?");
      });
  
      $('.m-editsubkelas').unbind('click').click(function(){
        $('input[name=kodekelas]').val(datakelas.code);
        $('input[name=kodesubkelas]').val(data_sub_kelas.KODESUBKELAS);
        $('input[name=jam]').val(data_sub_kelas.JAM);
        $('.studio2').val(data_sub_kelas.STUDIO).change();
        $('input[name=namasubkelas]').val(data_sub_kelas.NAMASUBKELAS);
        $('.status2').val(data_sub_kelas.ACTIVE).change();
        if(data_sub_kelas.GURU){
          $('.guru option').filter(function () { return $(this).html() == data_sub_kelas.GURU; }).prop('selected',true);
        } else {
          $('.guru option').filter(function () { return $(this).html() == '-'; }).prop('selected',true);
        }

        if(data_sub_kelas.ASISTEN1){
        $('.asisten1 option').filter(function () { return $(this).html() == data_sub_kelas.ASISTEN1; }).prop('selected',true);
        } else {
          $('.asisten1 option').filter(function () { return $(this).html() == '-'; }).prop('selected',true);
        }

        if(data_sub_kelas.ASISTEN2){
        $('.asisten2 option').filter(function () { return $(this).html() == data_sub_kelas.ASISTEN2; }).prop('selected',true);
        } else {
          $('.asisten2 option').filter(function () { return $(this).html() == '-'; }).prop('selected',true);
        }
        $('input[name=hari]').val(data_sub_kelas.HARI);
      });
    });
    
    $('.m-addkelas').prop("required", true).click(function(){
        $('#form_tambah_kelas')[0].reset();
    });
    
    $('.m-addsubkelas').prop("required", true).click(function(){
      $("#form_subkelas")[0].reset();
      $("form").find("input[type=text]").val("");
      $('input[name=kodekelas]').val(datakelas.code);
      var guru = $("#guru option:selected").val();
      var asisten1 = $("#asisten1 option:selected").val();
      var asisten2 = $("#asisten2 option:selected").val();
      var hari = $("#hari option:selected").val();
      var studio = $("#studio option:selected").val();
    });
    
    $('.m-editkelas').unbind().click(function(){
        $('input[name=kodekelas]').val(datakelas.code);
        $('input[name=namakelas]').val(datakelas.name);
        $('input[name=hargakelas1]').val(datakelas.price);
        $('input[name=hargakelas2]').val(datakelas.price_B);
        $('input[name=leotard]').val(datakelas.uniform_leotard);
        $('input[name=stocking]').val(datakelas.uniform_stocking);
        $('input[name=skirt]').val(datakelas.uniform_skirt);
        $('input[name=shoes]').val(datakelas.uniform_shoes);
        $('input[name=cskirt').val(datakelas.uniform_character_skirt);
        $('input[name=cshoes]').val(datakelas.uniform_character_shoes);
        $('#kategori_kelas').val(datakelas.step_number).change();
        $('#status_reward').val(datakelas.status_reward).change();
    });

    $('.m-muridkelas').unbind().click(function(){
        $(this).addClass('selected');
      $(this).siblings().removeClass( "selected" );
        var title = '('+datakelas.code+')'+datakelas.name;
        $('#namakelasmurid').html(title);
        $('#tablemuridkelas').DataTable().clear().destroy();
        var tbsubkelas = $('#tablemuridkelas').DataTable({
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
          "scrollY": 230, // Pengaturan banyak kolom pada datatable
          "scrollX": true,
          responsive: true,
          "autoWidth": false,
          "ajax": 'Data_Kelas/get_murid_kelas/'+datakelas.code,
          "columns": [
            { data: 'KODE' },
            { data: 'NAMAMURID' },
            { data: 'SUBCLASS' },
          ],
        });
  
        $.fn.dataTable.ext.errMode = 'none';
    });
    
    $('#tablemuridkelas tbody').on('click', 'tr', function(e){
      e.preventDefault();
      $(this).addClass('selected');
      $(this).siblings().removeClass( "selected" );
    });

    $('.m-hapuskelas').click(function(){
     $('input[name=hkodekelas]').val(datakelas.code);
     $('#namahapus').text("HAPUS "+datakelas.name+"?");
    });
    $.fn.dataTable.ext.errMode = 'none';
  });
});
</script>
