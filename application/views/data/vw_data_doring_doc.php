<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Dokumen Doring</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Dokumen Kapal</a></li>
            <li class="active"><a href="#"> Data Dokumen Doring</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button><br><br>   
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" >Custom Filter : </h3>
                    </div>
                    <div class="panel-body">
                        <form id="form-filter">
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="tgl_bongkar_awal" placeholder="Tgl Bongkar Tiba (Awal)" class="form-control tanggal" type="text">
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_bongkar_akhir" placeholder="Tgl Bongkar (Akhir)" class="form-control tanggal" type="text">    
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_muat_awal" placeholder="Tgl Muat (Awal)" class="form-control tanggal" type="text">
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_muat_akhir" placeholder="Tgl Muat (Akhir)" class="form-control tanggal" type="text">    
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
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>ID Doring</th>
                            <th><center>No Kontainer</th>
                            <th><center>Berita Acara</th>
                            <th><center>Surat Jalan</th>
                            <th><center>Kasir</th>
                            <th><center>Inspeksi Kendaraan</th>
                            <th><center>Shipment Pengirim</th>
                            <th><center>PO</th>
                            <th><center>DO</th>
                            <th><center>Delivery</th>
                            <th><center>PP</th>
                            <th><center>Receiving</th>
                            <th><center>Stripping</th>
                            <th><center>Cancel Loading</th>
                            <th><center>Lain Lain</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>ID Doring</th>
                            <th><center>No Kontainer</th>
                            <th><center>Berita Acara</th>
                            <th><center>Surat Jalan</th>
                            <th><center>Kasir</th>
                            <th><center>Inspeksi Kendaraan</th>
                            <th><center>Shipment Pengirim</th>
                            <th><center>PO</th>
                            <th><center>DO</th>
                            <th><center>Delivery</th>
                            <th><center>PP</th>
                            <th><center>Receiving</th>
                            <th><center>Stripping</th>
                            <th><center>Cancel Loading</th>
                            <th><center>Lain Lain</th>
                            <th><center>Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
      </section>
    </div>
</section>

<script type="text/javascript">
    var table;

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function add() {
        window.location.replace('<?php echo site_url('doring/index_doc')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('doring/edit_doc/')?>'+id);
    }

    $(document).ready(function(){
        table = $('#tabel').DataTable({
            processing  : true, //Feature control the processing indicator.
            serverSide  : true, //Feature control DataTables' server-side processing mode.
            order       : [], //Initial no order.
            autowidth   : true,
            ordering    : false,
            scrollY     : 300,
            scrollX     : true,
            scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 3,
                heightMatch: 'auto'
            },

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('doring/ajax_list_doc')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.tgl_bongkar_awal    = $('#tgl_bongkar_awal').val();
                    data.tgl_bongkar_akhir   = $('#tgl_bongkar_akhir').val();
                    data.tgl_muat_awal       = $('#tgl_muat_awal').val();
                    data.tgl_muat_akhir      = $('#tgl_muat_akhir').val();
                }
            },
        });
        $('#container').css( 'display', 'block' );
        table.columns.adjust().draw();

        $('#btn-filter').click(function(){ //button filter event click
            table.ajax.reload();  //just reload table
        });

        $('#btn-reset').click(function(){ //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload();  //just reload table
        });
    });

    function del(id) {
        swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: 'Anda Tidak Akan Bisa Merecover Kembali Data Yang Sudah Anda Hapus !',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url : "<?php echo site_url('doring/delete_doc')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        swal.fire('Terhapus','Data Anda Sudah Dihapus','success');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal.fire("Gagal","Data Anda Tidak Jadi Dihapus","error");
                    }
                });
            } else {
                swal.fire("Batal","Data Anda Tidak Jadi Dihapus","warning");
            }
        });
    }

    $('.tanggal').datepicker({
            autoclose: true,
            format:"yyyy-mm-dd",
    });
</script>