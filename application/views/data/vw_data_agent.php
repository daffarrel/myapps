<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Master Data Agen</h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Master Data</a></li>
          <li class="active"><a href="#"> Data Agen</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button><br><br>   
                </div>
                <div class="box-body table-responsive">
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th><center>Nama Agent</th>
                            <th><center>Alamat</th>
                            <th><center>Telepon</th>
                            <th><center>HP</th>
                            <th><center>Fax</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th><center>Nama Agent</th>
                            <th><center>Alamat</th>
                            <th><center>Telepon</th>
                            <th><center>HP</th>
                            <th><center>Fax</th>
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
        window.location.replace('<?php echo site_url('agent')?>');
    }

    function edit(id) {
        window.location.replace('<?php echo site_url('agent/edit/')?>'+id);
    }

    $(document).ready(function(){
        table= $('#tabel').DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            order: [], //Initial no order.
            autowidth : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('agent/ajax_list')?>" ,
                "type": "POST",
            },
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
                    url : "<?php echo site_url('agent/delete')?>/"+id,
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