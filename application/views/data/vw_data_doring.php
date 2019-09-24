<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Doring</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Dokumen Kapal</a></li>
            <li class="active"><a href="#"> Data Doring</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button><br><br>   
                </div>
                <div class="box-body table-responsive">
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Seal</th>
                            <th><center>Tanggal</th>
                            <th><center>No Surat Jalan</th>
                            <th><center>Rute</th>
                            <th><center>DK/LK</th>
                            <th><center>Tgl Muat</th>
                            <th><center>Tgl Bongkar</th>
                            <th><center>No. Polisi</th>
                            <th><center>Driver</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Seal</th>
                            <th><center>Tanggal</th>
                            <th><center>No Surat Jalan</th>
                            <th><center>Rute</th>
                            <th><center>DK/LK</th>
                            <th><center>Tgl Muat</th>
                            <th><center>Tgl Bongkar</th>
                            <th><center>No. Polisi</th>
                            <th><center>Driver</th>
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
        window.location.replace('<?php echo site_url('doring/')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('doring/edit/')?>'+id);
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
                    url : "<?php echo site_url('shipment/deleteArr')?>/"+id,
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

    $('.tanggal').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
</script>