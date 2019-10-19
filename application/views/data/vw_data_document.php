<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
    table.dataTable {
        margin: 0 auto !important;
        width: 50% !important;
    }
    table.dataTable thead {
        border-bottom: 5px solid black !important;
    }
</style>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Dokumen</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Master Data</a></li>
            <li class="active"><a href="#"> Data Dokumen</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button>
                    <br><br>   
                </div>
                <div class="box-body table-responsive">
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable nowrap cell-border" cellspacing="0" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>Jenis Dokumen</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>Jenis Dokumen</th>
                            <th><center>Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
      </section>
    </div>
</section>

<!-- Bootstrap modal -->
<div class="modal fade" id="mdadd" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">New Jenis Document Data</h3>
            </div>
            <div class="modal-body form ">
                <form action="#" id="frmadd" class="form-horizontal">
					<input type="hidden" value="" name="id"/> 
                    <div class="form-body">			
						<div class="form-group ">
							<label class="control-label col-md-3">Jenis Dokumen</label>
							<div class="col-md-9">
								<input name="jenis_doc" type="text" class="form-control" placeholder="Jenis Dokumen">							
								<span class="help-block"></span>
							</div>
						</div>						
                    </div>
                </form>	
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
    var table;
    var save_method; //for save method string

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function add(){
        save_method = 'add';
        $('#frmadd')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#mdadd').modal('show'); // show bootstrap modal
        $('.modal-title').text('New Jenis Document Data'); // Set Title to Bootstrap modal title
	}

    function save(id){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        $('#btnUpdate').text('Updating...'); //change button text
        $('#btnUpdate').attr('disabled',true); //set button disable 
        
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('document/ajax_add/');?>" + id;
        } else {
            url = "<?php echo site_url('document/ajax_update');?>";
        }
        formData = new FormData();        
        formData.append( 'id', $('input[name=id]').val() );
        formData.append( 'jenis_doc', $('input[name=jenis_doc]').val() );
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(data){
                //if success close modal and reload ajax table
                if(data.status){
                    $('#mdadd').modal('hide');
                    $('#mdedit').modal('hide');
                    reload_table();
                    $('input[name=jenis_doc]').val('');
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
                $('#btnUpdate').text('Update'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
                $('#btnUpdate').text('Update'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable 
            }
        });
    }

    function edit(id){
        save_method = 'update';
        $('#frmadd')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('document/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('[name="id"]').val(data.idm_document);
                $('[name="jenis_doc"]').val(data.jenis_doc);
                $('#mdadd').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Jenis Document Data'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
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
                "url": "<?php echo site_url('document/ajax_list')?>" ,
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
                    url : "<?php echo site_url('document/delete')?>/"+id,
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