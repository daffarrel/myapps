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
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable nowrap" cellspacing="0" width="100%" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Petikemas</th>
                            <th><center>No Surat Jalan</th>
                            <th><center>Rute</th>
                            <th><center>DK/LK</th>
                            <th><center>Tanggal Muat</th>
                            <th><center>Tanggal Bongkar</th>
                            <th><center>No Polisi</th>
                            <th><center>Driver</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Petikemas</th>
                            <th><center>No Surat Jalan</th>
                            <th><center>Rute</th>
                            <th><center>DK/LK</th>
                            <th><center>Tanggal Muat</th>
                            <th><center>Tanggal Bongkar</th>
                            <th><center>No Polisi</th>
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
                                <div class="form-group">
                                    <label for="no_seal" class="form-label">No. Kontainer</label>
                                    <input hidden id="idm" name="idm">
                                    <select id="no_seal" name="no_seal" class="form-control select2"></select>    
                                    <span class="help-block"></span>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. BL</label>
                                    <input required id="no_bl" name="no_bl" class="form-control" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">TD</label>
                                    <input required id="td" name="td" class="form-control" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Berat</label>
                                    <input required id="berat" name="berat" class="form-control" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal BL</label>
                                    <input required id="tgl_bl" name="tgl_bl" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Kapal Tiba</label>
                                    <input required id="tgl_tiba" name="tgl_tiba" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Bongkar Muat</label>
                                    <input required id="tgl_bm" name="tgl_bm" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>    
                                </div>
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
     $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });

    var table;
    //for save method string
    var save_method; 

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function batal(){
        $('#frm-modal')[0].reset();
        $('#btnSave').text('Save'); //change button text
        $('#btnSave').attr('class','btn btn-primary'); //set button disable 
        $('#md-form').modal('hide');
    }

    function init_select(){
        //Unit Select Box
        let dropdown = $('#no_seal');
        dropdown.empty();
        dropdown.append('<option value="">Pilih Kontainer</option>');
        dropdown.prop('selectedIndex', 0);
        const url = '<?php echo base_url('shipment/getSeal/');?>';

        // Populate dropdown with list
        $.getJSON(url, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.id_doc).text(entry.seal_number + ' => ' + entry.size));
            })
        });
    }

    function add(){
        save_method = 'add';
        init_select();
        $('#no_seal').prop( "disabled", false );
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Save');
        $('.select2').select2();
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Dokumen Kapal Tiba'); // Set title to Bootstrap modal title
    }

    function edit(id){
        save_method = 'update';
        init_select();
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');
        $('.select2').select2();

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('shipment/ajax_edit_arr/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#idm').val(data.id_ship_arr);
                $('#no_seal').prop( "disabled", true );
                $('#no_bl').val(data.bl_number);
                $('#tgl_bl').val(data.bl_date);
                $('#td').val(data.td);
                $('#berat').val(data.weight);
                $('#tgl_tiba').val(data.arrival_date);
                $('#tgl_bm').val(data.unload_load_date);

                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Dokumen Kapal Tiba'); // Set title to Bootstrap modal title
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
        
        url = "<?php echo site_url('shipment/ajax_save_arr');?>";
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
                    $('#btnSave').text('Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 
                    $('#md-form').modal('hide');
                }
                else{
                    if(data.inputerror != null){
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                        $('#btnSave').text('Save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable 
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

    function refresh(){
        init_select();
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);
    }

    $(document).ready(function(){
        table = $('#tabel').DataTable({
            processing  : true, //Feature control the processing indicator.
            serverSide  : true, //Feature control DataTables' server-side processing mode.
            order       : [], //Initial no order.
            autowidth   : true,
            ordering    : false,
            "scrollX"   : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('doring/ajax_list')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.tgl_bongkar_awal    = $('#tgl_bongkar_awal').val();
                    data.tgl_bongkar_akhir   = $('#tgl_bongkar_akhir').val();
                    data.tgl_muat_awal  = $('#tgl_muat_awal').val();
                    data.tgl_muat_akhir = $('#tgl_muat_akhir').val();
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
                    url : "<?php echo site_url('doring/delete')?>/"+id,
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