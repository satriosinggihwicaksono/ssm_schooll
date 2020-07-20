<?php if($this->uri->segment(2) == 'pengajar'){ ?>
<script>
$(document).ready(function() {
  var tbkas = $('#datalogteacher').DataTable({
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
    "bLengthChange": false,
    "pageLength": 100,
    "bAutoWidth": false,
    "scrollY": 400,
    "scrollX": true,
    responsive: true,
    "autoWidth": false,
    "ajax": {
      url: '<?=base_url()?>Log/get_teacher/',
      type: 'POST',
      data: function(data){
      
      },
    },
    "columns": [
      { data: 'username' },
      { data: 'last_login' },
      { data: 'count' },
    ],
  });

  $('#datalogteacher tbody').on('click', 'tr', function(e){
    e.preventDefault();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );
 
    $.fn.dataTable.ext.errMode = 'none';
  });

});
</script>
<?php } else { ?>
  <script>
$(document).ready(function() {
  var tbkas = $('#datalogstudent').DataTable({
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
    "bLengthChange": false,
    "pageLength": 100,
    "bAutoWidth": false,
    "scrollY": 400,
    "scrollX": true,
    responsive: true,
    "autoWidth": false,
    "ajax": {
      url: '<?=base_url()?>Log/get_student/',
      type: 'POST',
      data: function(data){
      
      },
    },
    "columns": [
      { data: 'username' },
      { data: 'last_login' },
      { data: 'count' },
    ],
  });

  $('#datalogteacher tbody').on('click', 'tr', function(e){
    e.preventDefault();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );
 
    $.fn.dataTable.ext.errMode = 'none';
  });

});
</script>
<?php } ?>
