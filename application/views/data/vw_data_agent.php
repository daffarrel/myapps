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

<!-- Bootstrap modal For Datatable-->
<div class="modal fade" id="md-form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Dokumen Kapal</h3>
            </div>
            <div class="modal-body form">
                <div class="form-group">
                    <form id="frm-modal" action="#" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">Nama Agen</label>
                                <input hidden id="idm" name="idm">
                                <input id="agent_name" name="agent_name" required="required" placeholder="Nama Agen" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="kj" class="form-label">Alamat</label>
                                <input required id="address" name="address" placeholder="Alamat" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input id="no_telp" name="no_telp" class="form-control" placeholder="No Telepon" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input id="no_hp" name="no_hp" class="form-control" placeholder="No Handphone" type="text">
                            </div>
                            <div class="col-md-4">
                                <label for="no_fax" class="form-label">No Fax</label>
                                <input id="no_fax" name="no_fax" placeholder="No Fax" class="form-control">
                            </div>   
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-warning" >
                <div class="row">
                    <div class="col-md-12">
                        <button onclick='save()' id='btnSave' type='button' class='btn btn-primary' >Save</button>
                        <button onclick='batal()' type='button' class='btn btn-danger' >Cancel</button>
                    </div>
                </div>
			</div>				
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
    var table;
    var save_method; //for save method string

    function batal(){
        $('#frm-modal')[0].reset();
        $('#btnSave').text('Save'); //change button text
        $('#btnSave').attr('class','btn btn-primary'); //set button disable 
        $('#md-form').modal('hide');
    }

    function add(){
        save_method = 'add';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Save');
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Data Agen'); // Set title to Bootstrap modal title
    }

    function edit(id){
        save_method = 'update';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('agent/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#idm').val(data.idm_agent);
                $('#agent_name').val(data.agent_name);
                $('#address').val(data.address);
                $('#no_telp').val(data.telp);
                $('#no_hp').val(data.hp);
                $('#no_fax').val(data.fax);

                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Agen'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save(){    
        var url;

        if(save_method == 'add') {
            $('#btnSave').text('Saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
        } else {
            $('#btnSave').text('Updating...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
        }
        
        url = "<?php echo site_url('agent/ajax_save');?>";
        formData = new FormData($('#frm-modal')[0]);
        formData.append( 'save_method', save_method );

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            async: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data){
                //if success close modal and reload ajax table
                if(data.status){
                    reload_table();
                    $('#frm-modal')[0].reset();
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
                $('#md-form').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null,false);
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
                    url : "<?php echo site_url('agent/delete')?>/"+id,
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

    $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });
</script>