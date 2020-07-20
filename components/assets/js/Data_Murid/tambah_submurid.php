<script>
    function tambah_submurid(){
        var url = "<?=base_url('data_Murid/hapusmurid')?>"
        $.ajax({
            url : url,
            type : "POST",
            data : $("#form_hapus_murid").serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if(data['status'] == true){
                    var code = data.kode;
                    $('.modal-hapus-murid').modal('hide');
                    $('#muriddata').DataTable().ajax.reload();
                    swal(
                        'Sukses',
                        'Data telah berhasil dihapus',
                        'success',
                    );

                    var datamurid = tbmurid.row( this ).data();
                    
                    $('#sub_murid').DataTable().clear().destroy();
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
                        select: true,
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": true,
                        "searching" : false,
                        "scrollY": 230,
                        responsive: true,
                        "autoWidth": true,
                        "ajax": { 
                            "url" : 'Data_Murid/get_datamurid/'+code,
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
                            "url" : 'Data_Murid/list_class_murid/'+code,
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
                            $('input[name=kodemurid]').val(code);
                            $('input[name=namamurid]').val(datamurid.NAMAMURID);
                            $('input[name=tahapan]').val(dtlistkelas.TAHAPAN);
                            $('input[name=subclasscode_add]').val(dtlistkelas.KODESUBKELAS);
                            $('input[name=namakelas]').val(dtlistkelas.NAMASUBKELAS);
                            });
                        });
                        });
                    
                    
                        $('#sub_murid tbody').on('click', 'tr', function () {
                        
                        if(code != null){
                    
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
                                "url" : 'Data_Murid/get_datamurid/'+code,
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
                                $("#bayar_spp").hide("fast");
                                $("#bayar_ujian").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 1") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 2") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 3") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 4") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 5") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 6") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 7") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 8") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 9") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 10") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 11") {
                                $("#bayar_ujian").hide("fast");
                                $("#bayar_spp").show("fast");
                                $("#hapusklasmurid").show("fast");
                                $("#statuseditmurid").show("fast");
                                $("#listsub").show("fast");
                                $("#ubahharga").show("fast");
                            }
                            else if (x === "Wajib 12") {
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
                        $('input[name=kodemurid]').val(code);
                        
                        });
                    
                        var dtedit_statusmurid = tbkelasmurid.row(this).data();
                        
                        $('.editstatus').unbind('click').click(function(){
                            
                            $('input[name=kodesubkelas]').val(dtedit_statusmurid.KODESUBKELAS);
                            $('input[name=kodemurid]').val(code);
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
                            $('#headteks').append(code);
                    
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
                    
                                $('input[name=kodemurid]').val(code);
                                $('input[name=namamurid]').val(datamurid.NAMAMURID);
                                $('#subclasscode_old').val($('#kodesubkelas_old').val());
                                $('input[name=subclasscode_new]').val(dtsublist.KODESUBKELAS);
                                $('#subclassname_old').val($('#subkelas').val());
                                $('input[name=subclassname_new]').val(dtsublist.NAMASUBKELAS);
                            });
                            });
                        });
                    
                        var dtpriceedit = tbkelasmurid.row(this).data();
                        $('.m-changeprice').unbind('click').click(function(){
                            $('#pricechange_class1').html(' ');
                            $('#pricechange_class1').append(dtpriceedit.HARGA1);
                            $('#pricechange_class2').html(' ');
                            $('#pricechange_class2').append(dtpriceedit.HARGA2);
                            $('input[name=hargakelas]').val(dtpriceedit.HARGAKELAS);
                            $('input[name=namasubkelas1]').val(dtpriceedit.KODEKELAS);
                            $('input[name=kodesubkelas1]').val(dtpriceedit.KODESUBKELAS);
                            $('input[name=kodemurid_pricecheck]').val(code);
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
                            $('input[name=kodemurid]').val(code);
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
                            $('input[name=kodemurid]').val(code);
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
                                "url" : 'Data_Murid/listbayar_ujian/'+code+"/"+dtbayarujian.KODEKELAS+"/"+dtbayarujian.KODESUBKELAS,
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
                    
                            $('input[name=student_code]').val(code);
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
                    
                        $('.examlist').click(function(){
                        $('#headexamlist').html('  ');
                        $('#headexamlist').append(datamurid.NAMAMURID);
                        $('#headteks').html('--');
                        $('#headteks').append(code);
                        
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
                            "url" : 'Data_Murid/exam_list/'+code,
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
                            $('input[name=kodemurid_ujian]').val(code);
                            $('input[name=namamurid_ujian]').val(datamurid.NAMAMURID);
                            $('input[name=subclasscode_add_exam]').val(dtexamlist.KODESUBKELAS);
                            $('input[name=namakelas_ujian]').val(dtexamlist.NAMASUBKELAS);
                            });
                        });
                        });
                        
                        $('.m-addmurid').click(function(){
                            $("#tgllahir").val();
                        });
                    
                        $('.m-editmurid').click(function(){
                        $('input[name=kodemurid]').val(code);
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
                        $('input[name=keaktifan]').val(datamurid.AKTIF);
                        $("#keaktifan option:selected").val();
                        $('input[name=pwd]').val(datamurid.PWD);
                        });
                    
                        $('.m-hapusmurid').click(function(){
                        $('input[name=hdatamurid]').val(code);
                        });
                        $.fn.dataTable.ext.errMode = 'none';
                } else {
                    alert(data['alert']);
                } 
            },
        });
    }
</script>