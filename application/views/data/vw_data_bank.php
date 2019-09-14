<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Bank</h1>
        </div>
        <div class="section-body">
            <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button><br><br>
            <div class="table-responsive">
                <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                    <thead>
                    <tr>
                        <th><center>No</th>
                        <th><center>Kode Bank</th>
                        <th><center>Nama Bank</th>
                        <th><center>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th><center>No</th>
                        <th><center>Kode Bank</th>
                        <th><center>Nama Bank</th>
                        <th><center>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    var table;

    $(document).ready(function(){
        table= $('#tabel').DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            order: [], //Initial no order.
            autowidth : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('bank/ajax_list')?>" ,
                "type": "POST",
            },
        });
    });

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function add() {
        window.location.replace('<?php echo site_url('bank')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('bank/edit/')?>'+id);
    }

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
                    url : "<?php echo site_url('bank/delete')?>/"+id,
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