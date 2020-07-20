<script>
$(document).ready(function() {
  
  var tbmurid = $('#muriddata').DataTable({
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
    "paging":   false,
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true,
    "searching" : true,
    "scrollY": 230,
    responsive: true,
    "autoWidth": true,
    "ajax": {
      url: 'Data_Murid/get_data_murid/',
      type: 'POST',
      data: function(data){
        data.startdate = $('#startdate').val();
        data.status_bayar = $('#status_bayar').val();
        data.classesname = $('#classesname').val();
        data.st_kategori = $('#st_kategori2').val();
        data.st_program = $('#st_program').val();
      },
    },
    
    "columns": [
      { data: 'KODEMURID' },
      { data: 'NAMAMURID' },
      { data: 'PANGGILAN' },
      { data: 'LAHIR' },
      { data: 'ALAMAT' },
      { data: 'HPORTU' },
      { data: 'HPMURID' },
      { data: 'CATATAN' },
      { data: 'KATEGORI'},
      { data: 'AKTIF' },
    ]
  });

  
  $('#startdate').change(function() { 
    $('#muriddata').DataTable().ajax.reload();
    if($('#startdate').val() == "Cuti"){
      $('#kondisi').val($('#startdate').val());
    }
  });

  $('#st_program').change(function() {
    $('#sb_program').val($('#st_program').val()); 
    $('#muriddata').DataTable().ajax.reload();
  });

  $('#sb_program').change(function() {
    $('#sub_murid').DataTable().ajax.reload();
  });

  $('#status_bayar').change(function() { 
    $('#muriddata').DataTable().ajax.reload();
  });
  
  $('#classesname').change(function() {
    $('#muriddata').DataTable().ajax.reload();
  });

  $('#st_kategori2').change(function() { 
    $('#st_kategori').val($('#st_kategori2').val());
    $('#muriddata').DataTable().ajax.reload();
  });

  $('#muriddata tbody').on('click', 'tr', function () {
    $(this).addClass('selected');
    $(this).siblings().removeClass("selected");
    var datamurid = tbmurid.row( this ).data(); 
    $('#hide_sub_murid').show();
    $('#choose_murid').html('Kelas Yang Dipilih ');
    if(datamurid != null){
      $('#proses_murid').show();
    }
    var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
    $tds = $row.find("td:nth-child(2)");
    $.each($tds, function() {
        var x = $(this).text();
        if (x) {
          $("#bayar_ujian").hide("fast");
          $("#bayar_private").hide("fast");
          $("#bayar_spp").hide("fast");
          $("#hapusklasmurid").hide("fast");
          $("#statuseditmurid").hide("fast");
          $("#listsub").hide("fast");
          $("#ubahharga").hide("fast");
          $("#bayar_cuti").hide("fast");
        }
    });
  
    
    $('#choose_murid').append(datamurid.NAMAMURID);
    $('#sub_murid').DataTable().clear().destroy();
    setTimeout($('#sub_murid').DataTable({
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
      "paging":   false,
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": true,
      "searching" : true,
      "scrollY": 230,
      responsive: true,
      "autoWidth": true,
      "ajax": {
      url: 'Data_Murid/get_datamurid/'+datamurid.KODEMURID,
      type: 'POST',
        data: function(data){
          data.sb_program = $('#sb_program').val();
        },
      },
      "columns": [
          { data: 'STATUS' },
          { data: 'NAMAKELAS' },
          { data: 'NAMASUBKELAS' },
          { data: 'HARI' },
          { data: 'JAM' },
          { data: 'STUDIO' },
          { data: 'HARGAKELAS' },
          { data: 'STATUSPEMBAYARAN' },
          { data: 'TANGGALMASUK' },
          { data: 'TAHAPAN' }
      ],
    }),1);
  
    $.fn.dataTable.ext.errMode = 'none';
     $('.listkelasmurid').click(function(){
      $('#headmodallistkelasmurid').html('Tambah Kelas Reguler : ');
      $('#headmodallistkelasmurid').append(datamurid.NAMAMURID);
      var tblistkelasmurid = $('#listkelasmurid').DataTable({
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
        "paging":   false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "searching" : true,
        "scrollY": 230,
        responsive: true,
        "autoWidth": true,
        "ajax": { 
          "url" : 'Data_Murid/list_class_murid/'+datamurid.KODEMURID,
        },
        
        "columns": [
          { data: 'NAMAKELAS' },
          { data: 'HARGAKELAS1' },
          { data: 'HARGAKELAS2' },
          { data: 'NAMASUBKELAS' },
          { data: 'NAMAPENGAJAR' },
          { data: 'NAMAASISTEN1' },
          { data: 'HARI' },
          { data: 'JAM' },
          { data: 'TAHAPAN' }
        ],
      });
  
      $('.modal-listkelasmurid').modal("show");
        
      $('#listkelasmurid tbody').on('click', 'tr', function () {
        $(this).addClass('selected');
        $(this).siblings().removeClass( "selected");
          var $row = $(this).closest("tr"), 
          $tds = $row.find("td:nth-child(1)");
           $.each($tds, function() {
              var x = $(this).text();
              if (x) {
                $("#b_kelas").show("fast");
              }
          });
  
          if(tbkelasmurid == null){
          var tbkelasmurid = setTimeout($('#sub_murid').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "scrollY": 230,
            responsive: true,
            "autoWidth": true,
            "ajax": { 
              "url" : 'Data_Murid/get_datamurid/'+datamurid.KODEMURID,
            },
            "columns": [
              { data: 'STATUS' },
              { data: 'NAMAKELAS' },
              { data: 'NAMASUBKELAS' },
              { data: 'HARI' },
              { data: 'JAM' },
              { data: 'STUDIO' },
              { data: 'HARGAKELAS' },
              { data: 'STATUSPEMBAYARAN' },
              { data: 'TANGGALMASUK' },
              { data: 'TAHAPAN' }
            ],
          }),1);
        }
        
        var dtlistkelas = tblistkelasmurid.row(this).data();
        $('#namamurid2').val(datamurid.NAMAMURID);
        $('#kodemurid2').val(datamurid.KODEMURID);
        $('#subclasscode_add').val(dtlistkelas.KODESUBKELAS);
        $('#tahapan').val(dtlistkelas.TAHAPAN);
        $('#type').val($('#price_class_type').val());
        $('#price_class_type2').val(dtlistkelas.HARGAKELAS1);
        
        $('#harga1').html(' ');
        $('#harga1').append(dtlistkelas.HARGAKELAS1);
        $('#harga2').html(' ');
        $('#harga2').append(dtlistkelas.HARGAKELAS2);
  
        $('.m-addprogram').unbind('click').click(function(){
  
          $('#type').val($('#price_class_type').val());
          $('#price_class').val($('#priceclass option:selected').text());
          $('#tglmasuk1').val($('#tglmasuk').val());
          $('input[name=kodemurid]').val(datamurid.KODEMURID);
          $('input[name=namamurid]').val(datamurid.NAMAMURID);
          $('input[name=tahapan]').val(dtlistkelas.TAHAPAN);
          $('input[name=subclasscode_add]').val(dtlistkelas.KODESUBKELAS);
          $('input[name=namakelas]').val(dtlistkelas.NAMASUBKELAS);
        });
      });
    });
   
    $('.priceclass2').change(function() {
      var value2 = $( ".priceclass2 option:selected" ).text();
      $('#price_class_type2').val(value2);
      $('#type2').val($('.priceclass2').val());
    });


    $('.priceclass3').change(function() {
      var value2 = $( ".priceclass3 option:selected" ).text();
      $('#price_class_type10').val(value2);
      $('#type10').val($('.priceclass3').val());
    });


    $('#sub_murid tbody').on('click', 'tr', function () {
      $(this).addClass('selected');
        $(this).siblings().removeClass( "selected");
      if(datamurid.KODEMURID != null){
          var tbkelasmurid = $('#sub_murid').DataTable({
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
            "paging":   true,
            "ordering": true,
            "info":     true,
            "select": true,
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "pageLength": 100,
            "responsive": true,
            "autoWidth": false,
            "ajax": { 
              "url" : 'Data_Murid/get_datamurid/'+datamurid.KODEMURID,
            },
            "columns": [
              { data: 'STATUS' },
              { data: 'NAMAKELAS' },
              { data: 'NAMASUBKELAS' },
              { data: 'HARI' },
              { data: 'JAM' },
              { data: 'STUDIO' },
              { data: 'HARGAKELAS' },
              { data: 'STATUSPEMBAYARAN' },
              { data: 'TANGGALMASUK' },
              { data: 'TAHAPAN' }
            ],
          });
        }
  
      if(tbkelasmurid != null){
        $('#proses_kelasmurid').show();
      }
      var $row = $(this).closest("tr");
      var col =  $row.find("td:nth-child(8)").text();
      var status =  $row.find("td:nth-child(1)").text().toUpperCase();
      var x =  $row.find("td:nth-child(10)").text().toUpperCase();
          if(x != ""){
            if (x === "UJIAN") {
                $("#bayar_spp").hide("fast");
                $("#bayar_cuti").hide("fast");
                $("#bayar_private").hide("fast");
              if(col == "Status : BL"){
                $("#bayar_ujian").show("fast");
              } else {
                $("#bayar_ujian").hide("fast");
              }
              $("#hapusklasmurid").show("fast");
              $("#statuseditmurid").show("fast");
              $("#listsub").show("fast");
              $("#ubahharga").show("fast");
            } else if (x === "PRIVATE") {
                $("#bayar_spp").hide("fast");
                $("#bayar_cuti").hide("fast");
                $("#bayar_ujian").hide("fast");
              if(col == "Status : BL"){
                $("#bayar_private").show("fast");
              } else {
                $("#bayar_private").hide("fast");
              }
              $("#hapusklasmurid").show("fast");
              $("#statuseditmurid").show("fast");
              $("#listsub").show("fast");
              $("#ubahharga").show("fast");
            } else {
              $("#bayar_ujian").hide("fast");
              $("#bayar_private").hide("fast");
              if(col == "Status : BL"){
                if(status == "CUTI"){
                  $("#bayar_cuti").show("fast");
                  $("#bayar_spp").hide("fast");
                } else {
                  $("#bayar_spp").show("fast");
                  $("#bayar_cuti").hide("fast");
                }
              } else {
                  $("#bayar_cuti").hide("fast");
                  $("#bayar_spp").hide("fast");
              }
              $("#hapusklasmurid").show("fast");
              $("#statuseditmurid").show("fast");
              $("#listsub").show("fast");
              $("#ubahharga").show("fast");
            }
          } else {
              $("#bayar_private").hide("fast");
              $("#bayar_cuti").hide("fast");
              $("#bayar_ujian").hide("fast");
              $("#bayar_spp").hide("fast");
              $("#hapusklasmurid").hide("fast");
              $("#statuseditmurid").hide("fast");
              $("#listsub").hide("fast");
              $("#ubahharga").hide("fast");
          }  
      
      var tbl_murid = tbkelasmurid.row(this).data();
  
      $('.m-hapuskelasmurid').click(function(){
        $('input[name=kodesubkelas]').val(tbl_murid.KODESUBKELAS);
        $('input[name=kodemurid]').val(datamurid.KODEMURID);
        $('#namahapussub').text("Hapus Data "+tbl_murid.NAMAKELAS+"?");
     });
  
        $('.editstatus').unbind('click').click(function(){
        
        $('input[name=kodesubkelas]').val(tbl_murid.KODESUBKELAS);
        $('input[name=kodemurid]').val(datamurid.KODEMURID);
        $('input[name=namamurid]').val(datamurid.NAMAMURID);
        $('input[name=namasubkelas]').val(tbl_murid.NAMASUBKELAS);
        $('#statusbayar').val(tbl_murid.STATUSPEMBAYARAN).change();
        $('#statusp2').val(tbl_murid.STATUS).change();
      });
      
      $('.sublist').unbind('click').prop("onclick", null).attr("onclick", null).click(function(){
        $('#headmodalsublist').html('  ');
        $('#headmodalsublist').append(datamurid.NAMAMURID);
        $('#headteks').html('--');
        $('#headteks').append(datamurid.KODEMURID);
  
        $('input[name=kodekelas]').val(tbl_murid.KODESUBKELAS);
        $('input[name=kelasnama]').val(tbl_murid.NAMAKELAS);
        $('input[name=kodesubkelas_old]').val(tbl_murid.KODESUBKELAS);
        $('input[name=subkelas]').val(tbl_murid.NAMASUBKELAS);
  
        $('#sublist').DataTable().clear().destroy();
        var tbsublist = $('#sublist').DataTable({
          "language": {
            "info": "Jumlah Data : _TOTAL_ ",
            "sInfoEmpty": "Jumlah Data : _TOTAL_ ",
          oPaginate: {
            sNext: '<i class="fas fa-forward"></i>',
            sPrevious: '<i class="fas fa-backward"></i>',
            sFirst: '<i class="fas fa-step-backward"></i>',
            sLast: '<i class="fas fa-step-forward"></i>'
            }
          },
          "info": false,
          "paging": false,
          "searching": false,
          "select" : true,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": true,
          "pageLength": false,
          "bAutoWidth": false,
          "scrollY": 250,
          "scrollX": false,
          "responsive": true,
          "autoWidth": true,
          "ajax": { 
            "url" : 'Data_Murid/sub_list/'+tbl_murid.KODEKELAS+'/'+datamurid.KODEMURID+'/'+tbl_murid.KODESUBKELAS,
          },
          
          "columns": [
            { data: 'KODESUBKELAS' },
            { data: 'NAMASUBKELAS' },
            { data: 'HARI' },
            { data: 'JAM' },
            { data: 'STUDIO' }
          ],
        });

        $('.modal-sublist').modal("show");
        $('#sublist tbody').on('click', 'tr', function () {
            
          var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
          $tds = $row.find("td:nth-child(1)");
           $.each($tds, function() {
              var x = $(this).text();
              if (x) {
                $("#b_subchange").show("fast");
              }
          });
          
          $(this).addClass('gantiwarna');
          $(this).siblings().removeClass( "gantiwarna" );
          var dtsublist = tbsublist.row(this).data();

          $('.m-changesub').unbind().click(function(){
  
            $('input[name=kodemurid]').val(datamurid.KODEMURID);
            $('input[name=namamurid]').val(datamurid.NAMAMURID);
            $('#subclasscode_old').val($('#kodesubkelas_old').val());
            $('input[name=subclasscode_new]').val(dtsublist.KODESUBKELAS);
            $('#subclassname_old').val($('#subkelas').val());
            $('input[name=subclassname_new]').val(dtsublist.NAMASUBKELAS);
          });
        });
      });
  
      $('.m-changeprice').unbind('click').click(function(){
        $('#pricechange_class1').html(' ');
        $('#pricechange_class1').append(tbl_murid.HARGA1);
        $('#pricechange_class2').html(' ');
        $('#pricechange_class2').append(tbl_murid.HARGA2);
  
        $('input[name=hargakelas]').val(tbl_murid.HARGAKELAS);
        $('input[name=namasubkelas1]').val(tbl_murid.KODEKELAS);
        $('input[name=kodesubkelas1]').val(tbl_murid.KODESUBKELAS);
        $('#type_price').val($('#ubahhargakelas_murid_yangdipilih').val());
        $('input[name=kodemurid_pricecheck]').val(datamurid.KODEMURID);
        $('input[name=namamurid_pricecheck]').val(datamurid.NAMAMURID);
        $('#namakelaspembayaran').val(tbl_murid.NAMAKELAS);
        $('#namasubkelaspembayaran').val(tbl_murid.NAMASUBKELAS);
        $('#subclasscode_pricecheck').val($('#kodesubkelas1').val());
        $('#subclassname_pricecheck').val($('#namasubkelas1').val());
        $('#hargasaatini_pricecheck').val($('#hargakelas').val());
        $('#hargabaru_pricecheck').val($('#ubahhargakelas_murid_yangdipilih option:selected').text());//.val($('#ubahhargakelas_murid_yangdipilih option:selected').text());
      });
  
      /* PEMBAYARAN SPP MURID */
      var dtbayarspp = tbkelasmurid.row(this).data();
      $('.bayarspp').unbind('click').click(function(){
        var biaya_denda = $('input[name=biayadenda]').val();
        var tb = parseInt(dtbayarspp.HARGAKELAS);
        
        $.ajax({
          type: 'GET',
          url: '<?= base_url() ?>Data_Murid/tanggal',
          data: { tanggal : dtbayarspp.TANGGALMASUK, classcode : dtbayarspp.KODEKELAS, subclasscode : dtbayarspp.KODESUBKELAS, codestudent : datamurid.KODEMURID},
          success: function(response) {
              $('#ceklist').html('');
              $('#ceklist').html(response);
          }
        }); 

        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>Data_Murid/getDenda/'+datamurid.KODEMURID,
          success: function(denda) {
            if(datamurid.KATEGORI != 'BARRE'){
              $('input[name=denda_belum]').val(denda);
            } else {
              $('input[name=denda_belum]').val(0);
            }
          }
        }); 

        $('#nama').html('');
        $('#nama').append(datamurid.NAMAMURID);
        $('input[name=namamurid12]').val(datamurid.NAMAMURID);
        $('input[name=kelas]').val(dtbayarspp.NAMAKELAS);
        $('input[name=status]').val(dtbayarspp.TANGGALMASUK);
        if(datamurid.KATEGORI != 'BARRE'){
          $('input[name=biaya]').val((dtbayarspp.HARGAKELAS).replace('.', ''));
        } else {
          $('input[name=biaya]').val(0);
        }
        $('input[name=ttd]').val(dtbayarspp.HARGAKELAS);
        $('input[name=kodekelas]').val(dtbayarspp.KODEKELAS);
        $('input[name=kodeskelas]').val(dtbayarspp.KODESUBKELAS);
        $('input[name=namakelas]').val(dtbayarspp.NAMAKELAS);
        $('input[name=namasubkelas]').val(dtbayarspp.NAMASUBKELAS);
        if(datamurid.KATEGORI != null && datamurid.KATEGORI != "-"){
          $('input[name=kategori]').val(datamurid.KATEGORI);
        } else if(datamurid.KATEGORI == "-"){
          $('input[name=kategori]').val('REGULER');
        } else {
          $('input[name=kategori]').val('REGULER');
        }
        $("#jenis option:selected").val();
        $('input[name=terlambat]').val(0);
        $('input[name=bd]').val(0);
        $('input[name=an]').val('');
        $('input[name=catatan]').val('');
        $('input[name=pwf]').val('TANPA DENDA').change();
        $('input[name=kodemurid3]').val(datamurid.KODEMURID);
        $('input[name=tb]').val(0);
        $('input[name=pd]').val(0);
        $('input[name=biaya2]').val(0);
        $("#ub option:selected").val();
        $("#tp option:selected").val();
      });

      $('.bayarcuti').unbind('click').click(function(){
        $.ajax({
          type: 'GET',
          url: '<?= base_url() ?>Data_Murid/tanggal_cuti',
          data: { tanggal : dtbayarspp.TANGGALMASUK, classcode : dtbayarspp.KODEKELAS, subclasscode : dtbayarspp.KODESUBKELAS, codestudent : datamurid.KODEMURID},
          success: function(response) {
              $('#ceklist2').html('');
              $('#ceklist2').html(response);
          }
        }); 
        
        $('#nama5').html('');
        $('#nama5').append(datamurid.NAMAMURID);
        $('#nama15').val(datamurid.NAMAMURID);
        $('#kodenama15').val(datamurid.KODEMURID);
        $('input[name=kelas5]').val(dtbayarspp.NAMAKELAS);
        $('input[name=kodekelas5]').val(dtbayarspp.KODEKELAS);
        $('input[name=kodeskelas5]').val(dtbayarspp.KODESUBKELAS);
        $('input[name=namakelas5]').val(dtbayarspp.NAMAKELAS);
        $('input[name=namasubkelas5]').val(dtbayarspp.NAMASUBKELAS);
      });
      
      $('.bayarujian').unbind('click').click(function(){
        $('#bayarujian').DataTable().clear().destroy();
          var total_bayar = (dtbayarspp.HARGAKELAS).replace('.', '');
          setTimeout($('#bayarujian').DataTable({
            "select": true,
            "info": false,
            "paging": false,
            "searching": false,
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "pageLength": 30,
            "bAutoWidth": false,
            "scrollY": 100,
            responsive: true,
            "autoWidth": false,
            "ajax": {
              url: 'Data_Murid/listbayar_ujian/'+datamurid.KODEMURID+'/'+tbl_murid.KODEKELAS+'/'+tbl_murid.KODESUBKELAS,
              type: 'POST',
              data: function(data){
                data.biaya10 = total_bayar;
              },
            },
            "columns": [
              { data: 'TANGGALBAYAR' },
              { data: 'BESAR' },
              { data: 'TOTAL' }
            ],
          }),1000);
      });
  
      $('.bayarujian').click(function(){
        $('#nama_murid').html('  ');
        $('#nama_murid').append(datamurid.NAMAMURID);
        $('input[name=kodekelas]').val(tbl_murid.KODEKELAS);
        $('input[name=namakelas]').val(tbl_murid.NAMAKELAS);
        $('input[name=kodesubkelas]').val(tbl_murid.KODESUBKELAS);
        $('input[name=namasubkelas]').val(tbl_murid.NAMASUBKELAS);
        $('input[name=tgl_masuk]').val(tbl_murid.TANGGALMASUK);
        $('input[name=status]').val(tbl_murid.STATUS);
        $('input[name=biaya]').val(tbl_murid.HARGAKELAS);
        var jenis =$("#jenis option:selected").val();
        var ub =$("#ub option:selected").val();
      });

      $('.bayarprivate').click(function(){
        $('#nama_murid_private').html('  ');
        $('#nama_murid_private').append(datamurid.NAMAMURID);
        $('input[name=kodekelas_private]').val(tbl_murid.KODEKELAS);
        $('input[name=namakelas_private]').val(tbl_murid.NAMAKELAS);
        $('input[name=kodesubkelas_private]').val(tbl_murid.KODESUBKELAS);
        $('input[name=namasubkelas_private]').val(tbl_murid.NAMASUBKELAS);
        $('input[name=tgl_masuk_private]').val(tbl_murid.TANGGALMASUK);
        $('input[name=status_private]').val(tbl_murid.STATUS);
        $('input[name=biaya_private]').val(tbl_murid.HARGAKELAS);
        $('#kodemurid99_private').val(datamurid.KODEMURID);

        $('#bayarprivate').DataTable().clear().destroy();
          setTimeout($('#bayarprivate').DataTable({
            "select": true,
            "info": false,
            "paging": false,
            "searching": false,
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "pageLength": 30,
            "bAutoWidth": false,
            "scrollY": 100,
            responsive: true,
            "autoWidth": false,
            "ajax": {
              url: 'Data_Murid/listbayar_private/'+datamurid.KODEMURID+'/'+tbl_murid.KODEKELAS+'/'+tbl_murid.KODESUBKELAS,
              type: 'POST',
            },
            "columns": [
              { data: 'TANGGALBAYAR' },
              { data: 'BESAR' },
            ],
          }),1000);
      });

      $('.m-bayarujian').unbind().click(function(){
  
        $('input[name=student_code]').val(datamurid.KODEMURID);
        $('input[name=student_name]').val(datamurid.NAMAMURID);
        $('#classcode_exam').val($('#kodekelas').val());
        $('#nama_klas').val($('#namakelas').val());
        $('#subclasscode_exam').val($('#kodesubkelas').val());
        $('#nama_subklas').val($('#namasubkelas').val());
        $('#datepayment').val($('#tpu').val());
        $('#kodemurid99').val(datamurid.KODEMURID);
        $('#monthpayment').val($('#ub option:selected').val());
        $('#atas_nama').val($('#a_nama').val());
        $('#jenispembayaran').val($('#jenis_pem_ujian option:selected').val());
        $('#classprice').val($('#biaya').val());
        $('#pemb_ujian').val($('#pembayaran_ujian').val());
        $('#catbayar').val($('#keterangan_pembayaran').val());
      });
    });
    
    /**
     * Show Exam List
     * ketika tombol + di klik
     */
     $('.examlist').click(function(){
      $('#headexamlist').html('  ');
      $('#headexamlist').append(datamurid.NAMAMURID);
      $('#headteks').html('--');
      $('#headteks').append(datamurid.KODEMURID);

      var tbexamlist = $('#examlist').DataTable({
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
        "paging":   false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "searching" : true,
        "scrollY": 170,
        responsive: true,
        "autoWidth": true,
        "ajax": { 
          "url" : 'Data_Murid/exam_list/'+datamurid.KODEMURID,
        },
        
        "columns": [
          { data: 'NAMAKELAS' },
          { data: 'HARGAKELAS1' },
          { data: 'HARGAKELAS2' },
          { data: 'NAMASUBKELAS' },
          { data: 'NAMAPENGAJAR' },
          { data: 'NAMAASISTEN1' },
          { data: 'HARI' },
          { data: 'JAM' },
          { data: 'TAHAPAN' }
        ],
      });
  
      $('.modal-examlist').modal("show");
      $('#examlist tbody').on('click', 'tr', function () {
        $(this).addClass('selected');
        $(this).siblings().removeClass("selected");
          var $row = $(this).closest("tr"),
          $tds = $row.find("td:nth-child(1)");
          $.each($tds, function() {
              var x = $(this).text();
              if (x) {
                $("#b_kelas").show("fast");
              }
          });

          if(tbkelasmurid == null){
            
          var tbkelasmurid = setTimeout($('#sub_murid').DataTable({
            "select": true,
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "scrollY": 230,
            responsive: true,
            "autoWidth": true,
            "ajax": { 
              "url" : 'Data_Murid/get_datamurid/'+datamurid.KODEMURID,
            },
            "columns": [
              { data: 'STATUS' },
              { data: 'NAMAKELAS' },
              { data: 'NAMASUBKELAS' },
              { data: 'HARI' },
              { data: 'JAM' },
              { data: 'STUDIO' },
              { data: 'HARGAKELAS' },
              { data: 'STATUSPEMBAYARAN' },
              { data: 'TANGGALMASUK' },
              { data: 'TAHAPAN' }
            ],
          }),1);
        }
        
        $(this).addClass('gantiwarna');
        $(this).siblings().removeClass( "gantiwarna" );
        var dtlistkelas = tbexamlist.row(this).data();
        $('#namamurid10').val(datamurid.NAMAMURID);
        $('#kodemurid10').val(datamurid.KODEMURID);
        $('#subclasscode_add10').val(dtlistkelas.KODESUBKELAS);
        $('#tahapan10').val(dtlistkelas.TAHAPAN);
        $('#price_class_type10').val(dtlistkelas.HARGAKELAS1);
        
        $('#hargasatu').html(' ');
        $('#hargasatu').append(dtlistkelas.HARGAKELAS1);
        $('#hargadua').html(' ');
        $('#hargadua').append(dtlistkelas.HARGAKELAS2);

        $('.m-addprogram').unbind('click').click(function(){

          $('#type3').val($('#price_class_type').val());
          $('#price_class3').val($('#priceclass3 option:selected').text());
          $('#tglmasuk1').val($('#tglmasuk').val());
          $('input[name=kodemurid]').val(datamurid.KODEMURID);
          $('input[name=namamurid]').val(datamurid.NAMAMURID);
          $('input[name=tahapan]').val(dtlistkelas.TAHAPAN);
          $('input[name=subclasscode_add]').val(dtlistkelas.KODESUBKELAS);
          $('input[name=namakelas]').val(dtlistkelas.NAMASUBKELAS);
        });
      });
    });
    
     $('.m-addmurid').click(function(){
        $("#tgllahir").val();
      });
  
    $('.m-editmurid').click(function(){
      $('input[name=kodemurid]').val(datamurid.KODEMURID);
      $('input[name=namamurid]').val(datamurid.NAMAMURID);
      $('input[name=namapanggilan]').val(datamurid.PANGGILAN);
      $('input[name=alamat]').val(datamurid.ALAMAT);
      $('input[name=tmplahir]').val(datamurid.CITY);
      $('input[name=tgllahir]').val(datamurid.LAHIR);
      $('input[name=hportu]').val(datamurid.HPORTU);
      $('#awal2').val(datamurid.AWAL);
      $('input[name=hpmurid]').val(datamurid.HPMURID);
      $('input[name=hpwalimurid]').val(datamurid.HPWALIMURID);
      $('input[name=instagram]').val(datamurid.INSTAGRAM);
      $('input[name=email]').val(datamurid.EMAIL);
      $('input[name=facebook]').val(datamurid.PWD);
      $('input[name=catatan]').val(datamurid.CATATAN);
      $('#active2').val(datamurid.AKTIF).change();
      $('input[name=pwd]').val(datamurid.PWD);
    });
  
    $('.m-hapusmurid').click(function(){
      $('input[name=hdatamurid]').val(datamurid.KODEMURID);
    });
    $.fn.dataTable.ext.errMode = 'none';
  } );
});

function sum(){

  var potongan = parseInt($('input[name=pd]').val());
  var total = parseInt($('input[name=biaya2]').val());
  var harga = parseInt($('input[name=biaya]').val());
  var keterlambatan = parseInt($('input[name=terlambat]').val());
  var denda_belum = parseInt($('#denda_belum').val());
  var biaya_denda = $('input[name=biayadenda]').val();
  var pwf = $('#pwf').val();
 
  if(pwf == "TANPA DENDA"){
    var total = (harga * total);
    var keseluruhan = total;
    var result = total;
  } else {
    var total = (harga * total) + (keterlambatan * biaya_denda) + denda_belum;
    var keseluruhan = total - potongan;
    var result = total;
  }
  
  if($('#kategori').val() == 'BARRE'){
    total = 0;
  }

  if (isNaN(keseluruhan)){
    $('#tb').val(total);
  } else {
    $('#tb').val(keseluruhan);
  }
}

$('#pwf').change(function() { 
  var pwf = $(this).val();
  var potongan = parseInt($('input[name=pd]').val());
  var total = parseInt($('input[name=biaya2]').val());
  var harga = parseInt($('input[name=biaya]').val());
  var keterlambatan = parseInt($('input[name=terlambat]').val());
  var denda_belum = parseInt($('#denda_belum').val());
  var biaya_denda = $('input[name=biayadenda]').val();

  if(pwf == "TANPA DENDA"){
    var total = (harga * total);
  } else {
    var total = (harga * total) + (keterlambatan * biaya_denda) + denda_belum - potongan;
  }

  if (isNaN(total)){
    var total = (harga * total) + (keterlambatan * biaya_denda) + denda_belum;
  }
  
  if($('#kategori').val() == 'BARRE'){
    var total = 0;
  }

  $('#tb').val(total)
});


$('#tgl_pembayaran2').change(function() { 
  
  var tanggal = $('input[name=status]').val();
  var KODEKELAS = $('#kodekelas').val();
  var KODESUBKELAS = $('#kodeskelas').val();
  var KODEMURID = $('#kodemurid3').val();
  $.ajax({
    type: 'GET',
    url: '<?= base_url() ?>Data_Murid/tanggal',
    data: { tanggal : tanggal, classcode : KODEKELAS, subclasscode : KODESUBKELAS, codestudent : KODEMURID},
    success: function(response) {
        $('#ceklist').html('');
        $('#ceklist').html(response);
    }
  }); 

  $('input[name=terlambat]').val(0);
  $('input[name=bd]').val(0);
  $('#tb').val(0);
  $('.biaya2').val(0);

});

function checkbox2(id){
  $check = $('#'+id).prop("checked");
  
  var oneDay = 24*60*60*1000;
  var tanggal = $('#'+id).data("id");
  var firstDate = new Date(tanggal);
  var secondDate = new Date($("#tgl_pembayaran2").val());
  if(firstDate < secondDate){
    var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
  } else {
    var diffDays = 0;
  }
  var biaya_denda = $('input[name=biayadenda]').val();
  var potongan = parseInt($('input[name=pd]').val());
  var total = parseInt($('input[name=biaya2]').val());
  var keterlambatan = parseInt($('input[name=terlambat]').val());
  var besar_denda = parseInt($('.bd').val());
  var pwf = $('#pwf').val();
  var denda_belum = parseInt($('#denda_belum').val());
  var harga = parseInt($('input[name=biaya]').val());
  var tempo2 = parseInt($('input[name=tempo]').val());
  var cek = secondDate.getDate() - tempo2;
  if($check == true){
    var tambah = total + 1;
    if(firstDate.getMonth() == secondDate.getMonth()){
      if(cek > 0){
        var diffDays = parseInt(cek);
      } else {
        var diffDays = 0;
      }
    }
    var total_keterlambatan = keterlambatan + parseInt(diffDays); 
    var denda = total_keterlambatan * biaya_denda;
    var denda_total = parseInt(diffDays) * biaya_denda;

    var	number_string = denda_total.toString(),
    sisa 	= number_string.length % 3,
    rupiah 	= number_string.substr(0, sisa),
    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
        
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    $('#c'+id).text('('+rupiah+')');
  } else {
    var tambah = total - 1;
    if(firstDate.getMonth() == secondDate.getMonth()){
      if(cek > 0){
        var diffDays = parseInt(cek);
      } else {
        var diffDays = 0;
      }
    }
    var total_keterlambatan = keterlambatan - parseInt(diffDays); 
    var tempo = parseInt(diffDays) * biaya_denda;
    var denda = besar_denda - tempo;
    $('#c'+id).text('');
  }

  $('.biaya2').val(tambah);
  $('#bd').val(denda);
  $('.terlambat').val(total_keterlambatan);
  if(pwf == "DENGAN DENDA") {
    var total = (tambah * harga) + (total_keterlambatan * biaya_denda) + denda_belum - potongan;
  } else {
    var total = (tambah * harga);
  }
  if($('#kategori').val() == 'BARRE'){
    var total = 0;
  }
  $('#tb').val(total)
}
</script>
