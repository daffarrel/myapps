<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style type="text/css">
    th { font-size: 12px; }

    .dataTable > thead > tr > th[class*="sort"]:after{
        content: "" !important;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Data Dokumen Kapal Masuk</h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Dokumen Kapal</a></li>
          <li class="active"><a href="#"> Data Dokumen Kapal Masuk</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button><br><br>   
                </div>
                <div class="box-body table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" >Custom Filter : </h3>
                    </div>
                    <div class="panel-body">
                    <form id="form-filter">
                            <div class="row">
                                <div class="col-md-2">
                                    <input id="kapal" class="form-control" placeholder="Nama Kapal" type="text">
                                </div>
                                <div class="col-md-2">
                                    <input id="tgl_tiba_awal" placeholder="Tgl Tiba (Awal)" class="form-control" type="text">    
                                </div>
                                <div class="col-md-2">
                                    <input id="tgl_tiba_akhir" placeholder="Tgl Tiba (Akhir)" class="form-control" type="text">
                                </div>
                                <div class="col-md-2">
                                    <input id="tgl_bm_awal" placeholder="Tgl BM (Awal)" class="form-control" type="text">  
                                </div>
                                <div class="col-md-2">
                                    <input id="tgl_bm_akhir" placeholder="Tgl BM (Akhir)" class="form-control" type="text">          
                                </div>
                                <br><br><br>
                                <div class="col-md-3">
                                    <input id="tgl_bl_awal" placeholder="Tgl BL (Awal)" class="form-control tanggal" type="text">
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_bl_akhir" placeholder="Tgl BL (Akhir)" class="form-control tanggal" type="text">    
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_doc_awal" placeholder="Tgl Doc (Awal)" class="form-control tanggal" type="text">     
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_doc_akhir" placeholder="Tgl Doc (Akhir)" class="form-control tanggal" type="text">      
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
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>No.Seal</th>
                            <th><center>No.BL</th>
                            <th><center>Tgl.BL</th>
                            <th><center>Nama Kapal</th>
                            <th><center>TD</th>
                            <th><center>Berat</th>
                            <th><center>Tgl Tiba</th>
                            <th><center>Tgl B/M</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>No.Seal</th>
                            <th><center>No.BL</th>
                            <th><center>Tgl.BL</th>
                            <th><center>Nama Kapal</th>
                            <th><center>TD</th>
                            <th><center>Berat</th>
                            <th><center>Tgl Tiba</th>
                            <th><center>Tgl B/M</th>
                            <th><center>Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>

<script type="text/javascript">
    var table;

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function add() {
        window.location.replace('<?php echo site_url('shipment/arr_index')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('shipment/arr_edit')?>'+id);
    }

    $(document).ready(function(){
        table= $('#tabel').DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            order: [], //Initial no order.
            autowidth : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipment/ajax_list_arr')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.kapal          = $('#kapal').val();
                    data.tgl_bm_awal    = $('#tgl_bm_awal').val();
                    data.tgl_bm_akhir   = $('#tgl_bm_akhir').val();
                    data.tgl_tiba_awal  = $('#tgl_tiba_awal').val();
                    data.tgl_tiba_akhir = $('#tgl_tiba_akhir').val();
                    data.tgl_bl_awal    = $('#tgl_bl_awal').val();
                    data.tgl_bl_akhir   = $('#tgl_bl_akhir').val();
                }
            },
        });

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

    function del(id) {
        swal({
            title: 'Apakah Anda Yakin ?',
            text: 'Anda Tidak Akan Bisa Merecover Kembali Data Yang Sudah Anda Hapus !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "<?php echo site_url('shipment/deleteArr')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        swal('Data Anda Sudah Dihapus', {
                            icon: 'success',
                        });
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Data Anda Tidak Jadi Dihapus",{
                            icon:'error',
                        });
                    }
                });
            } else {
                swal('Data Anda Tidak Jadi Dihapus',{
                    icon:'error'
                });
            }
        });
    }
</script>