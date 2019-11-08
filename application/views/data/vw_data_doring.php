<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
table.dataTable thead {
  border-bottom: 5px solid black !important;
}

.select2-container {
    width: 100% !important;
    padding: 0;
}
</style>
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
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button>
                    <button class="btn btn-info" onclick="refresh()"> <span>Refresh Halaman</span></button>
                    <br><br>   
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
                                    <input hidden id="no_seal_temp" name="no_seal_temp">
                                    <select id="no_seal" name="no_seal" class="form-control select2"></select>    
                                    <span class="help-block"></span>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Surat Jalan</label>
                                    <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Rute</label>
                                    <select id="rute" name="rute" class="form-control select2" style="width: 100%;">
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">DK/LK</label>
                                    <select id="dk_lk" name="dk_lk" class="form-control">
                                        <option value="DK">Dalam Kota</option>
                                        <option value="LK">Luar Kota</option>
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Muat</label>
                                    <input type="text" class="form-control tanggal" name="on_chassis" id="on_chassis"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Bongkar</label>
                                    <input type="text" class="form-control tanggal" name="door" id="door"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Truk</label>
                                    <select id="truck" name="truck" class="form-control select2">
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Supir</label>
                                    <select id="supir" name="supir" class="form-control select2" style="width: 100%;">
                                    </select>
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

<!-- Bootstrap modal For Datatable-->
<div class="modal fade" id="md-form-doc" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Dokumen Kapal</h3>
            </div>
            <div class="modal-body form">
                <div class="form-group">
                    <form id="frm-modal-doc" action="#" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_seal" class="form-label">No. Kontainer</label>
                                    <input hidden id="idm" name="idm">
                                    <input hidden id="no_seal_temp" name="no_seal_temp">
                                    <select id="no_seal" name="no_seal" class="form-control select2"></select>    
                                    <span class="help-block"></span>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Surat Jalan</label>
                                    <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Rute</label>
                                    <select id="rute" name="rute" class="form-control select2" style="width: 100%;">
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">DK/LK</label>
                                    <select id="dk_lk" name="dk_lk" class="form-control">
                                        <option value="DK">Dalam Kota</option>
                                        <option value="LK">Luar Kota</option>
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Muat</label>
                                    <input type="text" class="form-control tanggal" name="on_chassis" id="on_chassis"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Bongkar</label>
                                    <input type="text" class="form-control tanggal" name="door" id="door"/>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Truk</label>
                                    <select id="truck" name="truck" class="form-control select2">
                                    </select>
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Supir</label>
                                    <select id="supir" name="supir" class="form-control select2" style="width: 100%;">
                                    </select>
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
        let dropdown_seal = $('#no_seal');
        dropdown_seal.empty();
        dropdown_seal.append('<option value="">Pilih Kontainer</option>');
        dropdown_seal.prop('selectedIndex', 0);
        const url_seal = '<?php echo base_url('shipment/getSeal/');?>';

        // Populate dropdown with list
        $.getJSON(url_seal, function (data) {
            $.each(data, function (key, entry) {
                dropdown_seal.append($('<option></option>').attr('value', entry.id_doc).text(entry.seal_number + ' => ' + entry.size));
            })
        });

        //Unit Select Box
        let dropdown_route = $('#rute');
        dropdown_route.empty();
        dropdown_route.append('<option value="">Pilih Rute</option>');
        dropdown_route.prop('selectedIndex', 0);
        const url_route = '<?php echo base_url('route/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_route, function (data) {
            $.each(data, function (key, entry) {
                dropdown_route.append($('<option></option>').attr('value', entry.idm_route).text(entry.route_name + ' : ' + entry.origin + ' => ' + entry.destination));
            })
        });

        //Unit Select Box
        let dropdown_truck = $('#truck');
        dropdown_truck.empty();
        dropdown_truck.append('<option value="">Pilih Truk</option>');
        dropdown_truck.prop('selectedIndex', 0);
        const url_truck = '<?php echo base_url('truck/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_truck, function (data) {
            $.each(data, function (key, entry) {
                dropdown_truck.append($('<option></option>').attr('value', entry.idm_truck).text(entry.truck_code + ' => ' + entry.plate_number));
            })
        });

        //Unit Select Box
        let dropdown_driver = $('#supir');
        dropdown_driver.empty();
        dropdown_driver.append('<option value="">Pilih Supir</option>');
        dropdown_driver.prop('selectedIndex', 0);
        const url_driver = '<?php echo base_url('driver/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_driver, function (data) {
            $.each(data, function (key, entry) {
                dropdown_driver.append($('<option></option>').attr('value', entry.idm_driver).text(entry.driver_name));
            })
        });
    }

    function add(){
        save_method = 'add';
        $('#no_seal').prop( "disabled", false );
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Save');
        $('.select2').select2();
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Data Doring'); // Set title to Bootstrap modal title
    }

    function edit(id){
        save_method = 'update';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');
        $('.select2').select2();

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('doring/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#idm').val(data.id_doring);
                $('#no_seal').prop( "disabled", true );
                $('#no_seal_temp').val(data.id_doc);
                $('#no_surat_jalan').val(data.safeconduct_num);
                $('#rute').val(data.id_route).change();
                $('#dk_lk').val(data.dk_lk).change();
                $('#on_chassis').val(data.on_chassis);
                $('#door').val(data.unload_date);
                $('#truck').val(data.id_truck).change();
                $('#supir').val(data.id_driver).change();

                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Doring'); // Set title to Bootstrap modal title
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
        
        url = "<?php echo site_url('doring/ajax_save');?>";
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
        init_select();
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