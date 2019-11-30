<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
    table.dataTable thead {
    border-bottom: 5px solid black !important;
    }

    .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>History Data Doring</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> History Data</a></li>
            <li class="active"><a href="#"> History Data Doring</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-4">
                            <input id="tgl_history" class="form-control tanggal-picker" placeholder="Pilih Tanggal" type="text">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" onclick="tampil()"> <span>Tampilkan Data</span></button>   
                </div>
                <div id="div-tabel" hidden>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" >Custom Filter : </h3>
                        </div>
                        <div class="panel-body">
                            <form id="form-filter">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Bongkar</label>
                                            <input id="tgl_bongkar" placeholder="Tgl Bongkar Tiba" class="form-control tanggal-picker" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Muat</label>
                                            <input id="tgl_muat" placeholder="Tgl Muat" class="form-control tanggal-picker" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="LastName" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-4">
                                        <button type="button" id="btn-filter" class="btn btn-warning">Filter</button>
                                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable nowrap" cellspacing="0" width="100%" role="grid" >
                            <thead>
                            <tr>
                                <th><center>No</th>
                                <th><center>No Petikemas</th>
                                <th><center>No Surat Jalan</th>
                                <th><center>Rute</th>
                                <th><center>Tanggal Muat</th>
                                <th><center>Tanggal Bongkar</th>
                                <th><center>No Polisi</th>
                                <th><center>Driver</th>
                                <th><center>Fare</th>
                                <th><center>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th><center>No</th>
                                <th><center>No Petikemas</th>
                                <th><center>No Surat Jalan</th>
                                <th><center>Rute</th>
                                <th><center>Tanggal Muat</th>
                                <th><center>Tanggal Bongkar</th>
                                <th><center>No Polisi</th>
                                <th><center>Driver</th>
                                <th><center>Fare</th>
                                <th><center>Aksi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
      </section>
    </div>
</section>

<!-- Bootstrap modal For Datatable-->
<div class="modal fade" id="md-table" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Dokumen Kapal</h3>
            </div>
            <div class="modal-body form">
				<table id="tb_doc" class="table table-bordered table-hover" width='100%'>
                    <thead>
                        <tr>
                        <th style="width:5% !important;"><center>#</th>
                        <th style="width:35% !important;"><center>No Dokumen</th>
                        <th style="width:20% !important;"><center>Jenis Dokumen</th>
                        <th style="width:20% !important;"><center>Tanggal Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>	
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-warning" >
			</div>				
        </div>
    </div>
</div>
<!-- End Bootstrap modal -->

<script type="text/javascript">
     $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });

    var startDate;
    var endDate;
    var table;
    var table_doc;
    //for save method string
    var save_method; 

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function reload_table_doc() {
        table_doc.ajax.reload(null,false);
    }

    function tampil(){
        startDate = $('#tgl_history').data('daterangepicker').startDate.format('YYYY-MM-DD');
        endDate   = $('#tgl_history').data('daterangepicker').endDate.format('YYYY-MM-DD');
        //var tgl_awal    = $('#tgl_awal').val();
        //var tgl_akhir   = $('#tgl_akhir').val();
        var months      = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        
        var date_awal   = new Date(startDate);
        var day_awal    = date_awal.getDate();
        var month_awal  = months[date_awal.getMonth()];
        var year_awal   = date_awal.getFullYear();
        var new_tgl_awal = day_awal + ' ' + month_awal + ' ' + year_awal;

        var date_akhir  = new Date(endDate);
        var day_akhir   = date_akhir.getDate();
        var month_akhir = months[date_akhir.getMonth()];
        var year_akhir  = date_akhir.getFullYear();
        var new_tgl_akhir = day_akhir + ' ' + month_akhir + ' ' + year_akhir;

        $('#div-tabel').prop('hidden',true);
        $('#tabel').DataTable().clear().destroy();

        table = $('#tabel').DataTable({
            processing  : true, //Feature control the processing indicator.
            serverSide  : true, //Feature control DataTables' server-side processing mode.
            order       : [], //Initial no order.
            autowidth   : true,
            ordering    : true,
            "scrollX"   : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('doring/ajax_list_history')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    if($('#tgl_bongkar').val() != ''){
                        data.tgl_bongkar_awal    = $('#tgl_bongkar').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        data.tgl_bongkar_akhir   = $('#tgl_bongkar').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    }
                    if($('#tgl_muat').val() != ''){
                        data.tgl_muat_awal       = $('#tgl_muat').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        data.tgl_muat_akhir      = $('#tgl_muat').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    }
                    data.tgl_awal = startDate;
                    data.tgl_akhir = endDate;
                }
            },
        });

        $('#div-tabel').prop('hidden',false);
    }

    $(document).ready(function(){
        $('#kapal').keyup( function() {
            table.ajax.reload();
        } );

        $('#btn-filter').click(function(){ //button filter event click
            table.ajax.reload();  //just reload table
        });

        $('#btn-reset').click(function(){ //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload();  //just reload table
        });
    });

    function doc(id){
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $.ajax({
            url : "<?php echo site_url('doring/ajax_edit_doc_table/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                //console.log(data);
                //tabel untuk dokumen kapal
                table_doc = $('#tb_doc').DataTable({
                    processing  : true, //Feature control the processing indicator.
                    serverSide  : true, //Feature control DataTables' server-side processing mode.
                    order       : [], //Initial no order.
                    autowidth   : true,
                    ordering    : false,
                    destroy     : true,
                    pageLength  : 5,
                    lengthMenu: [5, 10, 20, 50, 100],
                    ajax : {
                        url : "<?php echo base_url('doring/ajax_list_doc_history/');?>",
                        type : 'POST',
                        data : function ( data ) {
                            data.id = id;
                        },
                    },
                });
                
                // show bootstrap modal
                $('#md-table').modal('show'); 
                title = data.seal_number + ' - ' + data.process_date;
                $('.modal-title').text('History Dokumen Doring : ' + ' [ ' + title + " ]"); // Set Title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }

    $('.tanggal-picker').daterangepicker({
        dateLimit: { days: 360 },
        format: 'yyyy-mm-dd',
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Clear'
        }
    });

    $('.tanggal-picker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('.tanggal-picker').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
</script>