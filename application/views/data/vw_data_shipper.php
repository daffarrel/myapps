<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Pengirim
                        </h2><br><br>
                        <button class="btn btn-primary" onclick="add()"><i class="material-icons">add</i> <span>Tambah Data</span></button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                                <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Penerima</th>
                                    <th><center>Alamat</th>
                                    <th><center>Kota</th>
                                    <th><center>PIC</th>
                                    <th><center>Finance</th>
                                    <th><center>No Telepon</th>
                                    <th><center>No HP</th>
                                    <th><center>No Fax</th>
                                    <th><center>Nama Perusahaan</th>
                                    <th><center>No. Rekening</th>
                                    <th><center>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Penerima</th>
                                    <th><center>Alamat</th>
                                    <th><center>Kota</th>
                                    <th><center>PIC</th>
                                    <th><center>Finance</th>
                                    <th><center>No Telepon</th>
                                    <th><center>No HP</th>
                                    <th><center>No Fax</th>
                                    <th><center>Nama Perusahaan</th>
                                    <th><center>No. Rekening</th>
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
        window.location.replace('<?php echo site_url('shipper')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('shipper/edit/')?>'+id);
    }

    $(document).ready(function(){
        table= $('#tabel').DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            order: [], //Initial no order.
            autowidth : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipper/ajax_list')?>" ,
                "type": "POST",
            },
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
                    url : "<?php echo site_url('shipper/delete')?>/"+id,
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