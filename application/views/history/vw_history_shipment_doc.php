<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>History Data Dokumen Kapal</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> History Data</a></li>
            <li class="active"><a href="#"> History Dokumen Kapal</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-3">
                            <input id="tgl_awal" class="form-control tanggal" placeholder="Tanggal Awal" type="text">
                        </div>
                        <div class="col-md-3">
                            <input id="tgl_akhir" placeholder="Tanggal Akhir" class="form-control tanggal" type="text">    
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" onclick="tampil()"> <span>Tampilkan Data</span></button>
                </div>
                <div hidden id="div-tabel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" >Custom Filter : </h3>
                        </div>
                        <div class="panel-body">
                            <form id="form-filter">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input id="agent" class="form-control" placeholder="Agen" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <input id="shipper" placeholder="Pengirim" class="form-control" type="text">    
                                    </div>
                                    <div class="col-md-2">
                                        <input id="receiver" placeholder="Penerima" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <input id="product" placeholder="Produk" class="form-control" type="text">  
                                    </div>
                                    <div class="col-md-2">
                                        <input id="company" placeholder="Perusahaan" class="form-control" type="text">          
                                    </div>
                                    <br><br><br>
                                    <div class="col-md-4">
                                        <input id="nama_kapal" placeholder="Nama Kapal" class="form-control" type="text">          
                                    </div>
                                    <div class="col-md-4">
                                        <input id="tgl_kapal_awal" placeholder="Tgl Kapal Tiba (Awal)" class="form-control tanggal" type="text">
                                    </div>
                                    <div class="col-md-4">
                                        <input id="tgl_kapal_akhir" placeholder="Tgl Kapal Tiba (Akhir)" class="form-control tanggal" type="text">    
                                    </div>
                                    <br><br><br>
                                    <div class="col-md-3">
                                        <input id="tgl_tiba_awal" placeholder="Tgl Tiba (Awal)" class="form-control" type="text">    
                                    </div>
                                    <div class="col-md-3">
                                        <input id="tgl_tiba_akhir" placeholder="Tgl Tiba (Akhir)" class="form-control" type="text">
                                    </div>
                                    <div class="col-md-3">
                                        <input id="tgl_bm_awal" placeholder="Tgl BM (Awal)" class="form-control" type="text">  
                                    </div>
                                    <div class="col-md-3">
                                        <input id="tgl_bm_akhir" placeholder="Tgl BM (Akhir)" class="form-control" type="text">          
                                    </div>
                                </div>
                                <br>
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
                        <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable nowrap cell-border" cellspacing="0" width="100%" role="grid" >
                            <thead>
                            <tr>
                                <th><center>No</th>
                                <th><center>No Petikemas</th>
                                <th><center>Nama Kapal</th>
                                <th><center>Tanggal Dokumen</th>
                                <th><center>Tanggal Kapal Tiba</th>
                                <th><center>Tanggal Berangkat</th>
                                <th><center>Tanggal Bongkar Muat</th>
                                <th><center>Berat</th>
                                <th><center>Perusahaan</th>
                                <th><center>Agen</th>
                                <th><center>Origin</th>
                                <th><center>Pengirim</th>
                                <th><center>Penerima</th>
                                <th><center>Produk</th>
                                <th><center>Dokumen</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th><center>No</th>
                                <th><center>No Petikemas</th>
                                <th><center>Nama Kapal</th>
                                <th><center>Tanggal Dokumen</th>
                                <th><center>Tanggal Kapal Tiba</th>
                                <th><center>Tanggal Berangkat</th>
                                <th><center>Tanggal Bongkar Muat</th>
                                <th><center>Berat</th>
                                <th><center>Perusahaan</th>
                                <th><center>Agen</th>
                                <th><center>Origin</th>
                                <th><center>Pengirim</th>
                                <th><center>Penerima</th>
                                <th><center>Produk</th>
                                <th><center>Dokumen</th>
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
                        <th style="width:20% !important;"><center>Jenis Dokumen</th>
                        <th style="width:35% !important;"><center>No Dokumen</th>
                        <th style="width:20% !important;"><center>Tanggal Dokumen</th>
                        <th style="width:20% !important;"><center>Aksi</th>
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
    var table;
    var table_doc;

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function reload_table_doc(){
        table_doc.ajax.reload(null,false); 
    }

    function open_doc(id){
        window.open('<?php echo base_url()?>'+id,'_blank');
        window.focus();
    }

    function tampil(){
        var tgl_awal    = $('#tgl_awal').val();
        var tgl_akhir   = $('#tgl_akhir').val();
        var months      = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        
        var date_awal   = new Date(tgl_awal);
        var day_awal    = date_awal.getDate();
        var month_awal  = months[date_awal.getMonth()];
        var year_awal   = date_awal.getFullYear();
        var new_tgl_awal = day_awal + ' ' + month_awal + ' ' + year_awal;

        var date_akhir  = new Date(tgl_akhir);
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
            scrollY     : 300,
            scrollX     : true,
            scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 2,
                heightMatch: 'auto'
            },

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipment/ajax_list_history')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.company            = $('#company').val();
                    data.shipper            = $('#shipper').val();
                    data.receiver           = $('#receiver').val();
                    data.product            = $('#product').val();
                    data.agent              = $('#agent').val();
                    data.nama_kapal         = $('#nama_kapal').val();
                    data.tgl_kapal_awal     = $('#tgl_kapal_awal').val();
                    data.tgl_kapal_akhir    = $('#tgl_kapal_akhir').val();
                    data.tgl_bm_awal        = $('#tgl_bm_awal').val();
                    data.tgl_bm_akhir       = $('#tgl_bm_akhir').val();
                    data.tgl_tiba_awal      = $('#tgl_tiba_awal').val();
                    data.tgl_tiba_akhir     = $('#tgl_tiba_akhir').val();
                    data.tgl_awal           = tgl_awal;
                    data.tgl_akhir          = tgl_akhir;
                }
            },
        });

        $('#div-tabel').prop('hidden',false);
    }

    $(document).ready(function(){
        $('#agent').keyup( function() {
            table.ajax.reload();
        } );
        $('#shipper').keyup( function() {
            table.ajax.reload();
        } );
        $('#receiver').keyup( function() {
            table.ajax.reload();
        } );
        $('#product').keyup( function() {
            table.ajax.reload();
        } );
        $('#company').keyup( function() {
            table.ajax.reload();
        } );
        $('#nama_kapal').keyup( function() {
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
            url : "<?php echo site_url('shipment/ajax_edit_doc_table/')?>" + id,
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
                        url : "<?php echo base_url('document/ajax_list_doc_table_history/');?>",
                        type : 'POST',
                        data : function ( data ) {
                            data.id = id;
                        },
                    },
                });
                // show bootstrap modal
                $('#md-table').modal('show'); 
                title = data.seal_number + ' - ' + data.process_date;
                $('.modal-title').text('Dokumen Kapal : ' + ' [ ' + title + " ]"); // Set Title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }

    $('.tanggal').datepicker({
            autoclose: true,
            format:"yyyy-mm-dd",
    });

    $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });

</script>