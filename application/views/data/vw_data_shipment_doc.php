<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style type="text/css">
    th { font-size: 12px; }
    td { font-size: 8px !important; }

    .dataTable > thead > tr > th[class*="sort"]:after{
        content: "" !important;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Dokumen Kapal
                        </h2><br><br>
                        <button class="btn btn-primary" onclick="add()"><i class="material-icons">add</i> <span>Tambah Data</span></button>
                    </div>
                    <div class="body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" >Custom Filter : </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-filter">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agent_name" class="form-label">Agen</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="agent" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agent_name" class="form-label">Pengirim</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="shipper" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agent_name" class="form-label">Penerima</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="receiver" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agent_name" class="form-label">Produk</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="product" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agent_name" class="form-label">Perusahaan</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <div class="form-line">
                                                    <input id="company" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-4">
                                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                                <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>No.Seal</th>
                                    <th><center>No.Cont</th>
                                    <th><center>Tgl.BA</th>
                                    <th><center>Tgl.Doc</th>
                                    <th><center>Cmpy</th>
                                    <th><center>Agent</th>
                                    <th><center>Origin</th>
                                    <th><center>Sender</th>
                                    <th><center>Recv</th>
                                    <th><center>No.BA</th>
                                    <th><center>Srt Jln</th>
                                    <th><center>Produk</th>
                                    <th><center>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>No.Seal</th>
                                    <th><center>No.Cont</th>
                                    <th><center>Tgl.BA</th>
                                    <th><center>Tgl.Doc</th>
                                    <th><center>Cmpy</th>
                                    <th><center>Agent</th>
                                    <th><center>Origin</th>
                                    <th><center>Sender</th>
                                    <th><center>Recv</th>
                                    <th><center>No.BA</th>
                                    <th><center>Srt Jln</th>
                                    <th><center>Produk</th>
                                    <th><center>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Horizontal Layout -->
    </div>
</section>

<script type="text/javascript">
    var table;

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function add() {
        window.location.replace('<?php echo site_url('shipment')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('shipment/edit/')?>'+id);
    }

    $(document).ready(function(){
        table = $('#tabel').DataTable({
            processing  : true, //Feature control the processing indicator.
            serverSide  : true, //Feature control DataTables' server-side processing mode.
            order       : [], //Initial no order.
            autowidth   : true,
            ordering    : false,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipment/ajax_list')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.company = $('#company').val();
                    data.shipper = $('#shipper').val();
                    data.receiver = $('#receiver').val();
                    data.product = $('#product').val();
                    data.agent = $('#agent').val();
                }
            },
        });

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
            title: "Apakah Anda Yakin ?",
            text: "Anda Tidak Akan Bisa Merecover Kembali Data Yang Sudah Anda Hapus !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url : "<?php echo site_url('shipment/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        swal("Terhapus !", "Data Anda Sudah Dihapus", "success");
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Dibatalkan", "Data Anda Tidak Jadi Dihapus", "error");
                    }
                });
            } else {
                swal("Dibatalkan", "Data Anda Tidak Jadi Dihapus", "error");
            }
        });
    }
</script>