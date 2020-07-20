<script>
$(document).ready(function() {
    var table = $('#tandaitabelnya').dataTable({
        "language": {
        "info": "Jumlah Data : _TOTAL_ ",
        "emptyTable": "Tidak ada data",
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
        "scrollY": 1000,
        responsive: true,
        "autoWidth": true,
    });
});
</script>