<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
table.dataTable thead {
  border-bottom: 5px solid black !important;
}
</style>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Dokumen Kapal</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Dokumen Kapal</a></li>
            <li class="active"><a href="#"> Dokumen Kapal</a></li>
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
                                <div class="col-md-3">
                                    <input id="nama_kapal" placeholder="Nama Kapal" class="form-control" type="text">          
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_kapal_awal" placeholder="Tgl Kapal Tiba (Awal)" class="form-control tanggal" type="text">
                                </div>
                                <div class="col-md-3">
                                    <input id="tgl_kapal_akhir" placeholder="Tgl Kapal Tiba (Akhir)" class="form-control tanggal" type="text">    
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
                            <th><center>Perusahaan</th>
                            <th><center>Agen</th>
                            <th><center>Origin</th>
                            <th><center>Pengirim</th>
                            <th><center>Penerima</th>
                            <th><center>Produk</th>
                            <th style="width:7%;"><center>Aksi</th>
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
                            <th><center>Perusahaan</th>
                            <th><center>Agen</th>
                            <th><center>Origin</th>
                            <th><center>Pengirim</th>
                            <th><center>Penerima</th>
                            <th><center>Produk</th>
                            <th><center>Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
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
                        <th>#</th>
                        <th>Jenis Dokumen</th>
                        <th>No Dokumen</th>
                        <th>Tanggal Dokumen</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>	
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-warning" >
                <div class="form-group">
                    <form id="form-modal">
                        <div class='row'>
                            <div class="col-md-12">
                                <input type="hidden" name="id_doc" id="id_doc">
                                <input type="hidden" name="id_ship_doc" id="id_ship_doc">
                                <input name="no_doc" type="text" class="form-control" id="no_doc" placeholder="No Dokumen">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-4">
                                <select name="jenis_doc" id="jenis_doc" class="form-control">
                                    <option value="">---Please Select An Option---</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input name="doc_date" type="text" class="form-control tanggal" id="doc_date" placeholder="Tanggal Dokumen">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-4">
                                <input name="doc_file" type="text" class="form-control" id="doc_file" placeholder="File">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button onclick='save_doc()' id='btnSaveDoc' type='button' class='btn btn-primary' >Save</button>
                                <button onclick='cancel()' type='button' class='btn btn-danger' >Cancel</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>				
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
    var table;
    var table_doc;
    var iddoc = 0;
    var save_method; //for save method string
    var save_method_doc = 'add';

    function cancel(){
        save_method_doc = 'add';
        $('input[name=activity]').val('');
        $('#btnSave2').text('Save'); //change button text
        $('#btnSave2').attr('class','btn btn-primary'); //set button disable 
        $('#md-table').modal('hide');
    }

    function edit_doc(id){
        save_method_doc = 'update';
        $('#form-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('document/ajax_edit_doc/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('[name="id_ship_doc"]').val(data.id_ship_doc);
                $('[name="jenis_doc"]').val(data.jenis_doc).change();
                $('[name="no_doc"]').val(data.no_doc);
                $('[name="doc_date"]').val(data.date_doc);
                $('[name="file"]').val(data.file);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save_doc(){    
        var url;

        if(save_method_doc == 'add') {
            $('#btnSaveDoc').text('Saving...'); //change button text
            $('#btnSaveDoc').attr('disabled',true); //set button disable 
            url = "<?php echo site_url('document/ajax_add_doc/');?>";
        } else {
            $('#btnSaveDoc').text('Updating...'); //change button text
            $('#btnSaveDoc').attr('disabled',true); //set button disable 
            url = "<?php echo site_url('document/ajax_update_doc');?>";
        }

        formData = new FormData();
        
        if(save_method_doc != 'add')
            formData.append( 'id_ship_doc', $('input[name=id_ship_doc]').val());        
        
        formData.append( 'id_doc', $('input[name=id_doc]').val());
        formData.append( 'no_doc', $('input[name=no_doc]').val());
        formData.append( 'jenis_doc', $('input[name=jenis_doc]').val());
        formData.append( 'doc_date', $('input[name=doc_date]').val());
        formData.append( 'file', $('input[name=doc_file]').val());
        
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
                    reload_table();
                    $('input[name=doc_date]').val('');
                    $('input[name=no_doc]').val('');
                    $('input[name=jenis_doc]').val('').change();
                    $('input[name=doc_file]').val('');
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }

                $('#btnSaveDoc').text('Save'); //change button text
                $('#btnSaveDoc').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding data');
                $('#btnSaveDoc').text('Save'); //change button text
                $('#btnSaveDoc').attr('disabled',false); //set button enable 
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null,false);
        table_doc.ajax.reload(null,false); //reload datatable ajax 
    }

    function add() {
        window.location.replace('<?php echo site_url('shipment/')?>');
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
            scrollY     : 300,
            scrollX     : true,
            scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 2,
                heightMatch: 'auto'
            },

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipment/ajax_list')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.company        = $('#company').val();
                    data.shipper        = $('#shipper').val();
                    data.receiver       = $('#receiver').val();
                    data.product        = $('#product').val();
                    data.agent          = $('#agent').val();
                    data.nama_kapal        = $('#nama_kapal').val();
                    data.tgl_kapal_awal    = $('#tgl_kapal_awal').val();
                    data.tgl_kapal_akhir   = $('#tgl_kapal_akhir').val();
                }
            },
        });
        $('#container').css( 'display', 'block' );
        table.columns.adjust().draw();

        $('#agent').keyup( function() {
            //table.draw();
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
                    url : "<?php echo site_url('shipment/delete')?>/"+id,
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

    function del_doc(id) {
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
                    url : "<?php echo site_url('document/ajax_delete_doc')?>/"+id,
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

    function doc(id){
        $.ajax({
            url : "<?php echo site_url('shipment/ajax_edit_doc_table/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                console.log(data);
                //tabel untuk dokumen kapal
                table_doc = $('#tb_doc').DataTable({
                    processing  : true, //Feature control the processing indicator.
                    serverSide  : true, //Feature control DataTables' server-side processing mode.
                    order       : [], //Initial no order.
                    autowidth   : true,
                    ordering    : false,
                    ajax : {
                        url : "<?php echo base_url('document/ajax_list_doc_table/');?>",
                        type : 'POST',
                        data : function ( data ) {
                            data.id = id;
                        },
                    },
                });		
                //Unit Select Box
                let dropdown = $('#jenis_doc');
                dropdown.empty();
                dropdown.append('<option value="">Pilih Jenis Dokumen</option>');
                dropdown.prop('selectedIndex', 0);

                const url = '<?php echo base_url('document/getJenisDoc/');?>';

                // Populate dropdown with list
                $.getJSON(url, function (data) {
                    $.each(data, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.idm_document).text(entry.jenis_doc));
                    })
                });
                // Set id doc
                $('#id_doc').val(id);
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
</script>