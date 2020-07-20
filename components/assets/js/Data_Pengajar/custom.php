<script>
"use strict";
$(document).ready(function() {
    var tbpengajar = $('#pengajar').DataTable({
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
      "pageLength": 100,
      "scrollY": 230,
      "scrollX": true,
      responsive: true,
      "autoWidth": false,
      "ajax": 'Data_Pengajar/get_pengajar_by_kelas',
        "columns": [
          { data: 'KODEGURU' },
          { data: 'NAMAGURU' },
          { data: 'HP' },
          { data: 'FEEGURU' },
          { data: 'FEEASISTEN1' },
          { data: 'FEEASISTEN2' },
        ]
    });

    $('#pengajar tbody').on('click', 'tr', function () {
      var data = tbpengajar.row(this).data();
      $(this).addClass('selected');
      $(this).siblings().removeClass( "selected" );
      if(data){  
        $('#proses_guru').show();
      }
      $('#datakelaspengajar').DataTable().clear().destroy();
    
        var tbkelaspengajar = setTimeout($('#datakelaspengajar').DataTable({
        "language": {
        "info": "Jumlah Data : _TOTAL_ ",
        "infoFiltered": "",
        "sInfoEmpty": "Jumlah Data : _TOTAL_ ",
        },
        "paging":   false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "pageLength": 100,
        "bAutoWidth": false,
        "scrollY": 230,
        "scrollX": true,
        responsive: true,
        "autoWidth": false,
        "ajax": {
          url: 'Data_Pengajar/get_data_kelas_yang_diajar/'+data.KODEGURU,
    
        },
        "columns": [
          { data: 'NAMAKELAS' },
          { data: 'NAMASUBKELAS' },
          { data: 'HARI' },
          { data: 'JAM' },
          { data: 'STUDIO' }
        ]
      }),1);
    
      $('.m-addguru').click(function(){
        $('#form_tambah_pengajar')[0].reset()
        $("#tgllahir").val();
      });
      
      $('.m-editguru').click(function(){

          $('input[name=kodeguru]').val(data.KODEGURU);
          $('input[name=namaguru]').val(data.NAMAGURU);
          $('input[name=alamat]').val(data.ALAMAT);
          $('input[name=tmptlahir]').val(data.PLACE);
          $('input[name=tgllahir]').val(data.LAHIR);
          $('input[name=hpguru]').val(data.HP);
          $('input[name=feeguru]').val(data.FEEGURU);
          $('input[name=feeasistance1]').val(data.FEEASISTEN1);
          $('#awal').val(data.AWAL);
          $('#fullname').val(data.FULLNAME);
          $('input[name=feeasistance2]').val(data.FEEASISTEN2);
          $('input[name=keterangan]').val(data.KETERANGAN);
          $('input[name=skill]').val(data.SKILL);
          $('input[name=aktif]').val(data.AKTIF).change();
          $('input[name=password]').val(data.PASSWORD2);
          $("#aktif option:selected").val();
          
      });
    
      $('.m-hapusguru').click(function(){
        $('input[name=hdatapengajar]').val(data.KODEGURU);
        $('#namapengajar').text("HAPUS DATA "+data.NAMAGURU+"?");
      });
      $.fn.dataTable.ext.errMode = 'none';
    } );
    
    $('#datakelaspengajar tbody').on('click', 'tr', function(e){
        e.preventDefault();
        $(this).addClass('selected');
        $(this).siblings().removeClass( "selected" );
    
      });
    });

</script>
