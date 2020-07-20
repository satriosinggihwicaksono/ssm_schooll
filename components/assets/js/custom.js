/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * BLock first runing after load page.
 */

"use strict";
$(document).ready(function() {
    var myjson;
    var tahun = new Date().getFullYear();
    var num_bulan = new Date().getMonth();
    var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var no = 1;

 /**
  * Start Script Show Data pengajar
  * Dibawah ini Script untuk menampilkan data JSON dari API Pengajar/Guru
  * Ke view HTML berdasarkan kodekelas
  */
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
      "scrollY": 230, //Pengaturan banyak kolom pada datatable
      "scrollX": true,
      responsive: true,
      "autoWidth": false,
      "ajax": 'Data_Pengajar/get_pengajar_by_kelas',
        "columns": [
          { data: 'KODEGURU' },
          { data: 'NAMAGURU' },
          { data: 'LAHIR' },
          { data: 'ALAMAT' },
          { data: 'HP' },
          { data: 'FEEGURU' },
          { data: 'FEEASISTEN1' },
          { data: 'FEEASISTEN2' },
          { data: 'KETERANGAN' },
          { data: 'SKILL' },
          // { data: 'PASSWORDLOGIN' }
        ]
    });
    var table = $('#pengajar').DataTable();
      table.select.info( false);
/**
 * End Sscript Show Data Pengajar.
 */

 /**
  * Start Script Show Data Kelas
  * Dibawah ini Script untuk menampilkan data JSON dari API Kelas
  * Ke view HTML 
  */

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
      "select": true,
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
        { data: 'uniform_leotard' },
        { data: 'uniform_stocking' },
        { data: 'uniform_skirt' },
        { data: 'uniform_shoes' },
        { data: 'uniform_character_skirt' },
        { data: 'uniform_character_shoes' },
        { data: 'step_number' }
      ],
    });

    setInterval( function () {
      table.ajax.reload();
    }, 100 );
    var table = $('#datakelas').DataTable();
      table.select.info( false);

    
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
  select: true,
  "bPaginate": true,
  "bLengthChange": false,
  "bFilter": true,
  "bInfo": true,
  "scrollY": 230,
  responsive: true,
  "autoWidth": true,
  "ajax": {
    url: 'Data_Murid/get_data_murid/',
    type: 'POST',
      
    // data: {bulan:  $("#bulan option:selected").val()},
    data: {
      startdate:  $("#startdate").val(), 
      enddate:  $("#enddate").val(), 
      classesname: $("#classesname").val()
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
    { data: 'AKTIF' },
  ]
});


/**
 * End Script Show Data Murid
*/

/**
  * Start Script Show Data Presensi Pengajar
  * Dibawah ini Script untuk menampilkan data JSON dari API Presensi Pengajar
  * Ke view HTML
*/
$('#presensi-pengajar').DataTable({
  "language": {
    "info": "Jumlah Data : _TOTAL_",
    "sInfoEmpty": "Jumlah Data : _TOTAL_ ",
  oPaginate: {
    sNext: '<i class="fas fa-forward"></i>',
    sPrevious: '<i class="fas fa-backward"></i>',
    sFirst: '<i class="fas fa-step-backward"></i>',
    sLast: '<i class="fas fa-step-forward"></i>'
    }
  },
  "paging":   false,
  select: true,
  "bPaginate": true,
  "bLengthChange": false,
  "bFilter": true,
  "bInfo": true,
  "pageLength": 1000,
  "scrollY": 395,
  "scrollX": true,
  responsive: true,
  "autoWidth": false,
  "ajax": {
    url: 'Presensi_Pengajar/getAll',//+$("#thn option:selected").val()+'/'+$("#bln option:selected").val(), 
    type: 'POST',
    data: {
      tahun:  $("#tahun option:selected").val(), 
      bulan:  $("#bulan option:selected").val()
    },

  },
  "columns": [
    // { data: 'NOMOR' },
    { data: 'KODEPENGAJAR' },
    { data: 'NAMAPENGAJAR' },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return "<span>"+d.NAMAKELAS+"</span>";
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.NAMASUBKELAS;
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.HARI;
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.JAM;
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.FEE;
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.KEDATANGAN;
        } ).join( '<br />' );
        }
    },
    { data: 'DATA KEHADIRAN',
      defaultContent: null,
      "render": ( data, type, full ) => {
        return $.map( data, function ( d, i ) {
        return d.TOTALFEE;
        } ).join( '<br />' );
        }
    },
     { data: 'GRANDTOTAL' },
  ]
});
var table = $('#presensi-pengajar').DataTable();
$.fn.dataTable.ext.errMode = 'none';

  table.select.info( false);

  var tbpresensimurid = $('#presensi-murid').DataTable({
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
    select: true,
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true,
    "pageLength": 1000,
    "scrollY": 395,
    "scrollX": true,
    responsive: true,
    "autoWidth": false,
    "ajax": {
      url: 'Presensi_Murid/getall/',//+tahun+'/'+bulan[num_bulan],
      type: 'POST',

      data: {
        tahun:  $("#tahun option:selected").val(), 
        bulan:  $("#bulan option:selected").val()
      },

    },
    "columns": [
      { data: 'KODEMUDID' },
      { data: 'NAMAMURID' },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return "<span>"+d.NAMAKELAS+"</span>";
          } ).join( '<br />' );
          }
      },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return d.NAMASUBKELAS;
          } ).join( '<br />' );
          }
      },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return d.HARI;
          } ).join( '<br />' );
          }
      },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return d.JAM;
          } ).join( '<br />' );
          }
      },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return d.STUDIO;
          } ).join( '<br />' );
          }
      },
      { data: 'DATA KEHADIRAN',
        defaultContent: null,
        "render": ( data, type, full ) => {
          return $.map( data, function ( d, i ) {
          return d.KEDATANGAN;
          } ).join( '<br />' );
          }
      },
    ]
  });
  var table = $('#presensi-murid').DataTable();
      table.select.info( false);
 /**
 * End Script Show Data Presensi Murid
 */   

/**
* Start Script Show Laporan
* Dibawah ini Script untuk menampilkan data JSON dari API Laporan
* Ke view HTML
*/
$('#laporan').DataTable({
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
// "decimal": ",",
// "thousands": "."
},
"ordering": false,
"info": false,
"paging": false,
"searching": false,
"bPaginate": true,
"bLengthChange": false,
"bFilter": true,
"bInfo": true,
"pageLength": 20,
"scrollY": 250,
"scrollX": false,
responsive: true,
"autoWidth": false,
"ajax": {
  url: 'Laporan/laporan/',//+tahun+'/'+bulan[num_bulan],
  type: 'POST',

  data: {startdate:  $("#startdate").val(), enddate:  $("#enddate").val()},
},
"columns": [
  { data: 'JENIS' },
  { data: 'DATA',
    defaultContent: null,
    "render": ( data, type, full ) => {
      return $.map( data, function ( d, i ) {
      return "<span>"+d.KETERANGAN+"</span>";
      } ).join( '<br />' );
      }
  },
  { data: 'DATA',
    defaultContent: null,
    "render": ( data, type, full ) => {
      return $.map( data, function ( d, i ) {
      return d.BESAR;
      } ).join( '<br />' );
      }
  },
  { data: 'DATA',
    defaultContent: null,
    "render": ( data, type, full ) => {
      return $.map( data, function ( d, i ) {
        var arrTot = Number(d.BESAR.replace(".", "").replace(".", ""));
        return arrTot;
      } ).reduce( function ( a, b ) {
            return a + b;
        } );
      }
  },
]
});
var table = $('#laporan').DataTable();
      table.select.info( false);
$('#laporan tbody').on('click', 'tr', function(e){
    e.preventDefault();
    // var datasubkelas = tbsubkelas.row( this ).data();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );

  });
/**
* End Script Show Data Laporan
*/ 

/**
  * Start Script Show Data Denda
  * Dibawah ini Script untuk menampilkan data JSON dari API Denda
  * Ke view HTML
*/
$('#denda').DataTable({
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
    //   "ordering": false,
//   "info":     false,
//   select: true,
  "bPaginate": true,
  "bLengthChange": false,
  "bFilter": true,
  "bInfo": true,
  "pageLength": 6,
  "scrollY": 370,
  "scrollX": true,
  responsive: true,
  "autoWidth": false,
  "ajax": {
    url: 'Denda/getDenda',//+$("#thn option:selected").val()+'/'+$("#bln option:selected").val(), 
    type: 'POST',
    data: {
      thn:  $("#thn option:selected").val(), 
      bln:  $("#bln option:selected").val()
    },

  },
  "columns": [
    { data: 'TANGGAL' },
    { data: 'REFID' },
    { data: 'NAMAMURID' },
    { data: 'KELAS' },
    { data: 'SUBKELAS' },
    { data: 'LAMATERLAMBAT' },
    { data: 'BESARDENDA' },
    { data: 'BULAN' },
    { data: 'TAHUN' },
  ]
});
var table = $('#denda').DataTable();
      table.select.info( false);
$('#denda tbody').on('click', 'tr', function(e){
    e.preventDefault();
    // var datasubkelas = tbsubkelas.row( this ).data();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );

  });
/**
  * End Script Show Denda
*/

/**
* Start Script Show SPP
* Dibawah ini Script untuk menampilkan data JSON dari API SPP
* Ke view HTML
*/
$('#spp').DataTable({
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
  //   "ordering": false,
  //   "info":     false,
//   select: true,
  "bPaginate": true,
  "bLengthChange": false,
  "bFilter": true,
  "bInfo": true,
  "pageLength": 30,
  "scrollY": 345,
  "scrollX": true,
  responsive: true,
  "autoWidth": false,
  "ajax": {
    url: 'SPP/getspp/',
    type: 'POST',
      
    // data: {bulan:  $("#bulan option:selected").val()},
    data: {
      startdate:  $("#startdate").val(), 
      enddate:  $("#enddate").val(), 
      studentsname: $("#studentsname").text()
    },
  },
  
  "columns": [
    { data: 'BULAN' },
    { data: 'TANGGALINPUT' },
    { data: 'REFID' },
    { data: 'JENISPEMBAYARAN' },
    { data: 'NAMAPEMBAYARAN' },
    { data: 'NOMINAL' },
    { data: 'KETERANGAN' },
    { data: 'KODEMURID' },
    { data: 'NAMAMURID' },
    { data: 'NAMAKELAS' },
    { data: 'NAMASUBKELAS' },
  ]
});
var table = $('#spp').DataTable();
table.select.info( false);
$('#spp tbody').on('click', 'tr', function(e){
  e.preventDefault();
  // var datasubkelas = tbsubkelas.row( this ).data();
  $(this).addClass('selected');
  $(this).siblings().removeClass( "selected" );
});

$('#kas').DataTable({
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
  //   "ordering": false,
  //   "info":     false,
//   select: true,
  "bPaginate": true,
  "bLengthChange": false,
  "bFilter": true,
  "bInfo": true,
  "pageLength": 1000,
  "scrollY": 230,
  "scrollX": true,
  responsive: true,
  "autoWidth": false,
  "ajax": {
    url: 'Kas/getdatamurid/',
    type: 'POST',
      
    // data: {bulan:  $("#bulan option:selected").val()},
    data: {
      activated:  $("#activated").val(), 
      paymentstatus:  $("#paymentstatus").val(), 
      classesname: $("#classesname").val()
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
    { data: 'AKTIF' },
  ]
});
/**
* End Script Show Data SPP
*/

/**
 * Start Script modification data Add, Edit, Delete
 * Pengajar
 */
$('#pengajar tbody').on('click', 'tr', function () {
  $('#proses_guru').show();
  var data = tbpengajar.row( this ).data();
  $(this).addClass('selected');
  $(this).siblings().removeClass( "selected" );

  $('#datakelaspengajar').DataTable().clear().destroy();

    var tbkelaspengajar = setTimeout($('#datakelaspengajar').DataTable({
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
    select: true,
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true,
    "pageLength": 100,
    "scrollY": 345,
    "scrollX": 200,
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
    // $("form").find("input[type=text]").val("");
    // console.log(datakelas.KODEKELAS);
    var aktif =$("#aktif option:selected").val();
    $("#tgllahir").val();
  });
  
  $('.m-editguru').click(function(){
      //console.log(kodeguru);
      $('input[name=kodeguru]').val(data.KODEGURU);
      $('input[name=namaguru]').val(data.NAMAGURU);
      $('input[name=alamat]').val(data.ALAMAT);
      $('input[name=tgllahir]').val(data.LAHIR);
      $('input[name=hpguru]').val(data.HP);
      $('input[name=feeguru]').val(data.FEEGURU);
      $('input[name=feeasistance1]').val(data.FEEASISTEN1);
      $('input[name=feeasistance2]').val(data.FEEASISTEN2);
      $('input[name=keterangan]').val(data.KETERANGAN);
      $('input[name=skill]').val(data.SKILL);
      $('input[name=aktif]').val(data.AKTIF);
      $("#aktif option:selected").val();
  });

  $('.m-hapusguru').click(function(){
    $('input[name=hdatapengajar]').val(data.KODEGURU);
  });
  $.fn.dataTable.ext.errMode = 'none';
} );

$('#datakelaspengajar tbody').on('click', 'tr', function(e){
    e.preventDefault();
    // var datasubkelas = tbsubkelas.row( this ).data();
    $(this).addClass('selected');
    $(this).siblings().removeClass( "selected" );

  });
/**
* End Modification Data pengajar
*/

/**
 * Start Script modification data Add, Edit, Delete
 * Murid
 * {"KODEMURID":"BS.115","NAMAMURID":"ABIGAIL AMELIA","PANGGILAN":"ABBY","LAHIR":"22 Januari 2019","ALAMAT":"","HPORTU":"","HPMURID":"","HPWALIMURID":"","INSTAGRAM":"","EMAIL":"","FACEBOOK":"","CATATAN":"gymnastic","STATUS":"Keluar"}
 */
$('#muriddata tbody').on('click', 'tr', function () {
  $('#hide_sub_murid').show();
  $('#choose_murid').html('Kelas Yang Dipilih ');
  $('#proses_murid').show();
  var datamurid = tbmurid.row( this ).data();
  $(this).addClass('gantiwarna');
  $(this).siblings().removeClass( "gantiwarna" );
  
  var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
  $tds = $row.find("td:nth-child(2)");
  $.each($tds, function() {
      var x = $(this).text();
      if (x) {
        $("#bayar_ujian").hide("fast");
        $("#bayar_spp").hide("fast");
        $("#hapusklasmurid").hide("fast");
        $("#statuseditmurid").hide("fast");
        $("#listsub").hide("fast");
        $("#ubahharga").hide("fast");
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
    select: true,
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

  $.fn.dataTable.ext.errMode = 'none';
  
   $('.listkelasmurid').click(function(){
    $('#headmodallistkelasmurid').html('Nama Murid : ');
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
        }
      },
      "info": false,
      "paging": false,
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": true,
      "pageLength": 100,
      "bAutoWidth": false,
      "scrollY": 200,
      "scrollX": 400,
      responsive: true,
      "autoWidth": false,
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
        
        var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
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
      var dtlistkelas = tblistkelasmurid.row(this).data();

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
 

  $('#sub_murid tbody').on('click', 'tr', function () {
    
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
          select: true,
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": true,
          "pageLength": 100,
          responsive: true,
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

    $('#proses_kelasmurid').show();
    $(this).addClass('gantiwarna');
    $(this).siblings().removeClass( "gantiwarna" );
    
    var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
    $tds = $row.find("td:nth-child(10)");
     $.each($tds, function() {
        var x = $(this).text();
        if (x === "Reguler") {
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Ujian") {
          // alert("alohaa"); 
          $("#bayar_spp").hide("fast");
          $("#bayar_ujian").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 1") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 2") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 3") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 4") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 5") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 6") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 7") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 8") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 9") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 10") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 11") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 12") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
        else if (x === "Wajib 13") {
          // alert("alohaa"); 
          $("#bayar_ujian").hide("fast");
          $("#bayar_spp").show("fast");
          $("#hapusklasmurid").show("fast");
          $("#statuseditmurid").show("fast");
          $("#listsub").show("fast");
          $("#ubahharga").show("fast");
        }
    });
    
    var hapuskelasmurid = tbkelasmurid.row(this).data();

    $('.m-hapuskelasmurid').click(function(){
    $('input[name=kodesubkelas]').val(hapuskelasmurid.KODESUBKELAS);
    $('input[name=kodemurid]').val(datamurid.KODEMURID);
    
  });

    var dtedit_statusmurid = tbkelasmurid.row(this).data();
    console.log(dtedit_statusmurid);
    
    $('.editstatus').unbind('click').click(function(){
      
      $('input[name=kodesubkelas]').val(dtedit_statusmurid.KODESUBKELAS);
      $('input[name=kodemurid]').val(datamurid.KODEMURID);
      $('input[name=statusprogram]').val(dtedit_statusmurid.STATUS);
      $('input[name=namamurid]').val(datamurid.NAMAMURID);
      $('input[name=namasubkelas]').val(dtedit_statusmurid.NAMASUBKELAS);
      $('input[name=statuspayment]').val(dtedit_statusmurid.STATUSPEMBAYARAN);
      $("#statusprogram option:selected").val();
      $("#statuspayment option:selected").val();
    });
    

    var dtsublist = tbkelasmurid.row(this).data();
    $('.sublist').unbind('click').prop("onclick", null).attr("onclick", null).click(function(){
      $('#headmodalsublist').html('  ');
      $('#headmodalsublist').append(datamurid.NAMAMURID);
      $('#headteks').html('--');
      $('#headteks').append(datamurid.KODEMURID);

      $('input[name=kodekelas]').val(dtsublist.KODESUBKELAS);
      $('input[name=kelasnama]').val(dtsublist.NAMAKELAS);
      $('input[name=kodesubkelas_old]').val(dtsublist.KODESUBKELAS);
      $('input[name=subkelas]').val(dtsublist.NAMASUBKELAS);

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
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "pageLength": 1000,
        "bAutoWidth": false,
        "scrollY": 250,
        "scrollX": 500,
        responsive: true,
        "autoWidth": false,
        "ajax": { 
          "url" : 'Data_Murid/sub_list/'+dtsublist.KODEKELAS,
        },
        
        "columns": [
          { data: 'KODESUBKELAS' },
          { data: 'NAMASUBKELAS' },
          { data: 'HARI' },
          { data: 'JAM' },
          { data: 'STUDIO' }
        ],
      });
    //   tbsublist.ajax.reload();

      $('.modal-sublist').modal("show");
      $('#sublist tbody').on('click', 'tr', function () {
          
        var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
        $tds = $row.find("td:nth-child(1)");
         $.each($tds, function() {
            console.log($(this).text());
            var x = $(this).text();
            if (x) {
              $("#b_subchange").show("fast");
            }
        });
        
        $(this).addClass('gantiwarna');
        $(this).siblings().removeClass( "gantiwarna" );
        var dtsublist = tbsublist.row(this).data();
        console.log(dtsublist);
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

    var dtpriceedit = tbkelasmurid.row(this).data();
    // console.log(dtpriceedit);
    $('.m-changeprice').unbind('click').click(function(){
      $('#pricechange_class1').html(' ');
      $('#pricechange_class1').append(dtpriceedit.HARGA1);
      $('#pricechange_class2').html(' ');
      $('#pricechange_class2').append(dtpriceedit.HARGA2);
    //   console.log("cek disini");

      $('input[name=hargakelas]').val(dtpriceedit.HARGAKELAS);
      $('input[name=namasubkelas1]').val(dtpriceedit.KODEKELAS);
      $('input[name=kodesubkelas1]').val(dtpriceedit.KODESUBKELAS);

      $('input[name=kodemurid_pricecheck]').val(datamurid.KODEMURID);
      $('input[name=namamurid_pricecheck]').val(datamurid.NAMAMURID);
      $('#subclasscode_pricecheck').val($('#kodesubkelas1').val());
      $('#subclassname_pricecheck').val($('#namasubkelas1').val());
      $('#hargasaatini_pricecheck').val($('#hargakelas').val());
      $('#hargabaru_pricecheck').val($('#ubahhargakelas_murid_yangdipilih option:selected').text());//.val($('#ubahhargakelas_murid_yangdipilih option:selected').text());
    });

    /* PEMBAYARAN SPP MURID */
    var dtbayarspp = tbkelasmurid.row(this).data();
    $('.bayarspp').unbind('click').click(function(){
      
      $('#nama').html('  ');
      $('#nama').append(datamurid.NAMAMURID);
      $('input[name=kelas]').val(dtbayarspp.NAMAKELAS);
      $('input[name=status]').val(dtbayarspp.TANGGALMASUK);
      $('input[name=biaya]').val((dtbayarspp.HARGAKELAS).replace('.', ''));
      $('input[name=ttd]').val(dtbayarspp.HARGAKELAS);
      $('input[name=kodekelas]').val(dtbayarspp.KODEKELAS);
      $('input[name=kodeskelas]').val(dtbayarspp.KODESUBKELAS);
      $('input[name=namakelas]').val(dtbayarspp.NAMAKELAS);
      $('input[name=namasubkelas]').val(dtbayarspp.NAMASUBKELAS);
      $("#jenis option:selected").val();
      $("#ub option:selected").val();
      $("#tp option:selected").val();
    });
    
    $('.m-bayarspp').unbind().click(function(){

      if  ($('#pwf option:selected').val() === 'DENGAN DENDA')
      {
        $('input[name=kodemurid]').val(datamurid.KODEMURID);
        $('input[name=namamurid]').val(datamurid.NAMAMURID);
        $('#classcode').val($('#kodekelas').val());
        $('#classname').val($('#namakelas').val());
        $('#s_classcode').val($('#kodeskelas').val());
        $('#subclass_name').val($('#namasubkelas').val());
        $('#date_payment').val($('#tgl_pembayaran').val());
        $('#month_payment').val($('#ub option:selected').val());
        $('#atasnama').val($('#an').val());
        $('#j_pembayaran').val($('#jenis option:selected').val());
        $('#class_price').val($('#biaya').val());
        $('#cat_bayar').val($('#notes1').val());
        $('#payment').val($('#pwf option:selected').val());
        $('#disc').val($('#pd').val());
        $('#punishment').val($('#bd').val());
        $('#days').val($('#terlambat').val());
        $('#grand_total').val($('#findout').val());
      }

      else if  ($('#pwf option:selected').val() === 'TANPA DENDA')
      {
        $('input[name=kodemurid]').val(datamurid.KODEMURID);
        $('input[name=namamurid]').val(datamurid.NAMAMURID);
        $('#classcode').val($('#kodekelas').val());
        $('#classname').val($('#namakelas').val());
        $('#s_classcode').val($('#kodeskelas').val());
        $('#subclass_name').val($('#namasubkelas').val());
        $('#date_payment').val($('#tgl_pembayaran').val());
        $('#month_payment').val($('#ub option:selected').val());
        $('#atasnama').val($('#an').val());
        $('#j_pembayaran').val($('#jenis option:selected').val());
        $('#class_price').val($('#biaya').val());
        $('#cat_bayar').val($('#notes1').val());
        $('#payment').val($('#pwf option:selected').val());
        $('#disc').val($('#pd').val());
        $('#punishment').val("0");
        $('#days').val("0");
        $('#grand_total').val($('#biaya').val());
      }
    });


    /* PEMBAYARAN UJIAN MURID */
    var dtbayarujian = tbkelasmurid.row(this).data();
    
    $('.bayarujian').unbind('click').click(function(){
      $('#bayarujian').DataTable().clear().destroy();
      $('#bayarujian').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": true,
        "pageLength": 30,
        "bAutoWidth": false,
        "scrollY": 50,
        "scrollX": 100,
        responsive: true,
        "autoWidth": false,
        "ajax": { 
          "url" : 'Data_Murid/listbayar_ujian/'+datamurid.KODEMURID+"/"+dtbayarujian.KODEKELAS+"/"+dtbayarujian.KODESUBKELAS,
        },
        
        "columns": [
          { data: 'TANGGALBAYAR' },
          { data: 'BESAR' }
        ],
      });
    });

    $('.bayarujian').click(function(){
      $('#nama_murid').html('  ');
      $('#nama_murid').append(datamurid.NAMAMURID);
      $('input[name=kodekelas]').val(dtbayarujian.KODEKELAS);
      $('input[name=namakelas]').val(dtbayarujian.NAMAKELAS);
      $('input[name=kodesubkelas]').val(dtbayarujian.KODESUBKELAS);
      $('input[name=namasubkelas]').val(dtbayarujian.NAMASUBKELAS);
      $('input[name=status]').val(dtbayarujian.STATUS);
      $('input[name=biaya]').val((dtbayarujian.HARGAKELAS).replace('.', '').replace('.', ''));
      var jenis =$("#jenis option:selected").val();
      var ub =$("#ub option:selected").val();
    });
    
    $('.m-bayarujian').unbind().click(function(){

      $('input[name=student_code]').val(datamurid.KODEMURID);
      $('input[name=student_name]').val(datamurid.NAMAMURID);
      $('#classcode_exam').val($('#kodekelas').val());
      $('#nama_klas').val($('#namakelas').val());
      $('#subclasscode_exam').val($('#kodesubkelas').val());
      $('#nama_subklas').val($('#namasubkelas').val());
      $('#datepayment').val($('#tpu').val());
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
        }
      },
      "info": false,
      "paging": false,
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": true,
      "pageLength": 30,
      "bAutoWidth": false,
      "scrollY": false,
      "scrollX": 200,
      responsive: true,
      "autoWidth": false,
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
        
        var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
        $tds = $row.find("td:nth-child(1)");
         $.each($tds, function() {
            console.log($(this).text());
            var x = $(this).text();
            if (x) {
              $("#b_exam").show("fast");
            }
        });
      
      $(this).addClass('gantiwarna');
      $(this).siblings().removeClass( "gantiwarna" );
      var dtexamlist = tbexamlist.row(this).data();
      $('#hargaujian1').html(' ');
      $('#hargaujian1').append(dtexamlist.HARGAKELAS1);
      $('#hargaujian2').html(' ');
      $('#hargaujian2').append(dtexamlist.HARGAKELAS2);

      console.log(dtexamlist);
      $('.m-addexam').click(function(){
        $('#type_examclass').val($('#tipe_hargaklasujian').val());
        $('#tglmasuk_ujian').val($('#tglmasukujian').val());
        $('#kelas').val(dtexamlist.KODEKELAS);
        $('#priceclass_exam').val($('#harga_ujianklas option:selected').text());
        $('input[name=kodemurid_ujian]').val(datamurid.KODEMURID);
        $('input[name=namamurid_ujian]').val(datamurid.NAMAMURID);
        $('input[name=subclasscode_add_exam]').val(dtexamlist.KODESUBKELAS);
        $('input[name=namakelas_ujian]').val(dtexamlist.NAMASUBKELAS);
        // $('input[name=kategori_ujian]').val(dtlistkelas.TAHAPAN);
      });
    });
  });
  
   $('.m-addmurid').click(function(){
      $("#tgllahir").val();
    });

  $('.m-editmurid').click(function(){
    //console.log(kodeguru);
    $('input[name=kodemurid]').val(datamurid.KODEMURID);
    $('input[name=namamurid]').val(datamurid.NAMAMURID);
    $('input[name=namapanggilan]').val(datamurid.PANGGILAN);
    $('input[name=alamat]').val(datamurid.ALAMAT);
    $('input[name=tgllahir]').val(datamurid.LAHIR);
    $('input[name=hportu]').val(datamurid.HPORTU);
    $('input[name=hpmurid]').val(datamurid.HPMURID);
    $('input[name=hpwalimurid]').val(datamurid.HPWALIMURID);
    $('input[name=instagram]').val(datamurid.INSTAGRAM);
    $('input[name=email]').val(datamurid.EMAIL);
    $('input[name=facebook]').val(datamurid.PWD);
    $('input[name=catatan]').val(datamurid.CATATAN);
    // $('input[name=keaktifan]').val(datamurid.AKTIF);
    // $("#keaktifan option:selected").val();
    $('input[name=keaktifan]').val(datamurid.AKTIF);
    $("#keaktifan option:selected").val();
    $('input[name=pwd]').val(datamurid.PWD);
  });

  $('.m-hapusmurid').click(function(){
    $('input[name=hdatamurid]').val(datamurid.KODEMURID);
  });
  $.fn.dataTable.ext.errMode = 'none';
} );
/**
* End Modification Data Murid
*/

/**
 * Start Script modification data Add, Edit, Delete
 * kelas
 */

$('#datakelas tbody').on('click', 'tr', function(e){
  $('#show_sub_kelas').show();
  e.preventDefault();
  var datakelas = tbkelas.row( this ).data();
   $(this).addClass('gantiwarna');
    $(this).siblings().removeClass( "gantiwarna" );
  $('#proses_kelas').show();
  $('#proses_subkelas').show();
  
  var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
  $tds = $row.find("td:nth-child(1)");
  $.each($tds, function() {
      console.log($(this).text());
      var x = $(this).text();
      if (x) {
        $("#editsubklas").hide("fast");
        $("#hapussubklas").hide("fast");
      }
  });

  $('#sub_kelas').DataTable().clear().destroy();

  setTimeout($('#sub_kelas').DataTable({
    "select": true,
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
      { data: 'ASISTEN2' }
    ],
  }),1);

  $.fn.dataTable.ext.errMode = 'none';

    
  $('#sub_kelas tbody').on('click', 'tr', function(e){
  
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
          { data: 'ASISTEN2' }
        ],
      });
    }
    $.fn.dataTable.ext.errMode = 'none';

    var data_sub_kelas = tbsubkelas.row(this).data();
   
    $('#edithapus').show();
    $(this).addClass('gantiwarna');
    $(this).siblings().removeClass( "gantiwarna" );
    
    var $row = $(this).closest("tr"),        // Finds the closest row <tr> 
    $tds = $row.find("td:nth-child(1)");
     $.each($tds, function() {
        console.log($(this).text());
        var x = $(this).text();
        if (x === "-") {
          $("#hapussubklas").hide("fast");
          $("#editsubklas").hide("fast");
        }
        else if (x) {
        //   alert("alohaa"); 
          $("#hapussubklas").show("fast");
          $("#editsubklas").show("fast");
        }
    });


    $('.m-hapus').unbind('click').click(function(){
      $('input[name=hsub]').val(data_sub_kelas.KODESUBKELAS);
      $('input[name=kodekelas]').val(datakelas.KODEKELAS);
    });

    $('.m-editsubkelas').unbind('click').click(function(){
      $('input[name=kodekelas]').val(datakelas.KODEKELAS);
      $('input[name=kodesubkelas]').val(data_sub_kelas.KODESUBKELAS);
      $('input[name=jam]').val(data_sub_kelas.JAM);
      $('input[name=namasubkelas]').val(data_sub_kelas.NAMASUBKELAS);
      $('.guru').val(data_sub_kelas.GURU).change();
      $('.asisten1').val(data_sub_kelas.ASISTEN1).change();
      $('.asisten2').val(data_sub_kelas.ASISTEN2).change();
      $('input[name=hari]').val(data_sub_kelas.HARI);
    });
  });
  
  $('.m-addsubkelas').prop("required", true).click(function(){
    $("#form_subkelas")[0].reset();
    $("form").find("input[type=text]").val("");
    $('input[name=kodekelas]').val(datakelas.KODEKELAS);
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
  });

  $('.m-addkelas').click(function(){
    // $("form").find("input[type=text]").val("");
    // console.log(datakelas.KODEKELAS);
    var kategori =$("#kategori option:selected").val();
  });

  $('.m-hapuskelas').click(function(){
   $('input[name=hkodekelas]').val(datakelas.KODEKELAS);
    //console.log(kohapus);
  });
  tbsubkelas.destroy();
  $.fn.dataTable.ext.errMode = 'none';
});
/**
* End modification kelas
*/

/**
 * Start Show modah guru/pengajar with value empty
 * Show Modal guru/pengajar with script (Javascript)
 */
  $('.showmodalguru').click(function(){
    $("form").find("input[type=text]").val("");
  });
/**
 * End Show modal guru
 */

 /**
 * Start Show modal Kelas with value empty
 * Show Modal kelas with script (Javascript)
 */
$('.m-addkelas').click(function(){
  $("form").find("input[type=text]").val("");
});
/**
* End Show modal kelas
*/

} );

/**
 * Fungsi untuk merubah angka menjadi format number rupiah
 * @param {*} angka 
 */
function dalam_rp(angka) {
  var	number_string = angka.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
  if (ribuan) {
    var separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
  return rupiah;
  //console.log(rupiah);
}
/**
 * End Convert angka ke format number
 */

function tutupmodal(){
  $('.modal-list-kelas-murid').modal("hide");
}

function tutupmodal(){
  $('.modal-exam-list').modal("hide");
}

