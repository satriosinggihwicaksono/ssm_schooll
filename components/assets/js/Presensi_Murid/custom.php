
<script type="text/javascript">
$('.m-cekabsen').unbind('click').click(function(){
	$('#tabel_absen').DataTable().clear().destroy();
	setTimeout($('#tabel_absen').DataTable({
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
			url: 'Presensi_Murid/get_cekabsen/',
			type: 'POST',
			data: function(data){
				data.tanggal = $('#tanggal_absen').val();
				data.subkelas = $('#subkelas').val();
			},
		},
		"columns": [
			{ data: 'student_code' },
			{ data: 'name' },
			{ data: 'teacher_name' },
		],
	}),500);
});

$('#tanggal_absen').change(function() {
	$('#tabel_absen').DataTable().ajax.reload();
});

$('#subkelas').change(function() {
	$('#tabel_absen').DataTable().ajax.reload();
});


$('#tabel_absen tbody').on('click', 'tr', function () {
    $(this).addClass('selected');
    $(this).siblings().removeClass("selected");
    var datamurid = tbmurid.row( this ).data(); 
   
  });
</script>