<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
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
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button>
                    <button class="btn btn-info" onclick="refresh()"> <span>Refresh Halaman</span></button><br><br>   
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
                                <div class="col-md-2">
                                    <input id="nama_kapal" placeholder="Nama Kapal" class="form-control" type="text">          
                                </div>
                                <br><br>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Kapal Berangkat</label>
                                        <input id="tgl_kapal" placeholder="Tgl Kapal Berangkat" class="form-control tanggal-picker" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Kapal Tiba</label>
                                        <input id="tgl_tiba" placeholder="Tgl Kapal Tiba" class="form-control tanggal-picker" type="text">    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Bongkar Muat</label>
                                        <input id="tgl_bm" placeholder="Tgl Kapal Bongkar Muat" class="form-control tanggal-picker" type="text">  
                                    </div>
                                </div>
                            </div>
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
                            <th><center>No. BL</th>
                            <th><center>Tanggal Expire DO</th>
                            <th><center>Nama Kapal</th>
                            <th><center>Tanggal Dokumen</th>
                            <th><center>Tanggal Kapal Tiba</th>
                            <th><center>Tanggal Berangkat</th>
                            <th><center>Tanggal Bongkar Muat</th>
                            <th><center>Berat</th>
                            <th><center>Perusahaan</th>
                            <th><center>Agen</th>
                            <th><center>Origin</th>
                            <th><center>Pengirim</th>
                            <th><center>Penerima</th>
                            <th><center>Produk</th>
                            <th><center>Dokumen</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Petikemas</th>
                            <th><center>No. BL</th>
                            <th><center>Tanggal Expire DO</th>
                            <th><center>Nama Kapal</th>
                            <th><center>Tanggal Dokumen</th>
                            <th><center>Tanggal Kapal Tiba</th>
                            <th><center>Tanggal Berangkat</th>
                            <th><center>Tanggal Bongkar Muat</th>
                            <th><center>Berat</th>
                            <th><center>Perusahaan</th>
                            <th><center>Agen</th>
                            <th><center>Origin</th>
                            <th><center>Pengirim</th>
                            <th><center>Penerima</th>
                            <th><center>Produk</th>
                            <th><center>Dokumen</th>
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
                        <th style="width:5% !important;"><center>#</th>
                        <th style="width:20% !important;"><center>Jenis Dokumen</th>
                        <th style="width:35% !important;"><center>No Dokumen</th>
                        <th style="width:20% !important;"><center>Tanggal Dokumen</th>
                        <th style="width:20% !important;"><center>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>	
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-warning" >
                <div class="form-group">
                    <form id="form-modal" enctype="multipart/form-data">
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
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-4">
                                <input name="doc_date" type="text" class="form-control tanggal" id="doc_date" placeholder="Tanggal Dokumen">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-4">
                                <input name="doc_file" type="file" class="form-control" id="doc_file">
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
    </div>
</div>
<!-- End Bootstrap modal -->

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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. Kontainer</label>
                                    <input hidden id="idm" name="idm">
                                    <input required id="no_seal" name="no_seal" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. BL</label>
                                    <input hidden id="idm" name="idm">
                                    <input required id="no_bl" name="no_bl" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">DO Expire Date</label>
                                    <input hidden id="idm" name="idm">
                                    <input required id="do_expire_date" name="do_expire_date" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="size" class="form-label">Size</label>
                                    <select required id="size" name="size" class="form-control">
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="N">N</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Agent</label>
                                    <select required id="agen" name="agen" class="form-control select2">
                                        <option value="">----</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Proses Dokumen</label>
                                    <input required id="tgl_proses_dok" name="tgl_proses_dok" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kota Asal</label>
                                    <select required id="kota_asal" name="kota_asal" class="form-control select2">
                                        <option value="">----</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Pengirim</label>
                                    <select id="pengirim" name="pengirim" class="form-control select2">
                                        <option value="">----</option>
                                    </select>            
                                    <span class="help-block"></span>                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Penerima</label>
                                    <select id="penerima" name="penerima" class="form-control select2">
                                        <option value="">----</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Berangkat</label>
                                    <input required id="td" name="td" class="form-control tanggal" type="text">
                                    <span class="help-block"></span>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Berat</label>
                                    <input required id="berat" name="berat" class="form-control" type="text">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Perusahaan</label>
                                    <select required id="cmpy" name="cmpy" class="form-control">
                                        <option value="">----</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Kapal</label>
                                    <input id="ship_name" name="ship_name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">I/O</label>
                                    <select id="io" name="io" class="form-control select">
                                        <option value="I">IN</option>
                                        <option value="O">OUT</option>
                                    </select>                                        
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kondisi</label>
                                    <select required id="kondisi" name="kondisi" class="form-control">
                                        <option value="FULL">FULL</option>
                                        <option value="CURAH">CURAH</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Stuffing</label>
                                    <select id="stuffing" name="stuffing" class="form-control select">
                                        <option value="yes">YA</option>
                                        <option value="no">TIDAK</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Produk</label>
                                    <input required id="produk" name="produk" class="form-control" type="text">
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
    var table;
    var table_doc;
    var save_method; //for save method string
    var save_method_doc = 'add';

    function cancel(){
        save_method_doc = 'add';
        $('#form-modal')[0].reset();
        $('#btnSaveDoc').text('Save'); //change button text
        $('#btnSaveDoc').attr('class','btn btn-primary'); //set button disable 
        $('#md-table').modal('hide');
    }

    function batal(){
        $('#frm-modal')[0].reset();
        $('#btnSave').text('Save'); //change button text
        $('#btnSave').attr('class','btn btn-primary'); //set button disable 
        $('#md-form').modal('hide');
    }

    function init_select(){
        //Unit Select Box
        let dropdown_cmpy = $('#cmpy');
        dropdown_cmpy.empty();
        dropdown_cmpy.append('<option value="">Pilih Perusahaan</option>');
        dropdown_cmpy.prop('selectedIndex', 0);
        const url_cmpy = '<?php echo base_url('shipment/getCompany/');?>';

        // Populate dropdown with list
        $.getJSON(url_cmpy, function (data) {
            $.each(data, function (key, entry) {
                dropdown_cmpy.append($('<option></option>').attr('value', entry.subID).text(entry.value));
            })
        });

        //Unit Select Box
        let dropdown_agent = $('#agen');
        dropdown_agent.empty();
        dropdown_agent.append('<option value="">Pilih Agen</option>');
        dropdown_agent.prop('selectedIndex', 0);
        const url_agent = '<?php echo base_url('agent/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_agent, function (data) {
            $.each(data, function (key, entry) {
                dropdown_agent.append($('<option></option>').attr('value', entry.idm_agent).text(entry.agent_name));
            })
        });

        //Unit Select Box
        let dropdown_city = $('#kota_asal');
        dropdown_city.empty();
        dropdown_city.append('<option value="">Pilih Kota</option>');
        dropdown_city.prop('selectedIndex', 0);
        const url_city = '<?php echo base_url('city/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_city, function (data) {
            $.each(data, function (key, entry) {
                dropdown_city.append($('<option></option>').attr('value', entry.idm_city).text(entry.city_name));
            })
        });

        //Unit Select Box
        let dropdown_shipper = $('#pengirim');
        dropdown_shipper.empty();
        dropdown_shipper.append('<option value="">Pilih Pengirim</option>');
        dropdown_shipper.prop('selectedIndex', 0);
        const url_shipper = '<?php echo base_url('shipper/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_shipper, function (data) {
            $.each(data, function (key, entry) {
                dropdown_shipper.append($('<option></option>').attr('value', entry.idm_shipper).text(entry.debitur_name));
            })
        });

        //Unit Select Box
        let dropdown_receiver = $('#penerima');
        dropdown_receiver.empty();
        dropdown_receiver.append('<option value="">Pilih Penerima</option>');
        dropdown_receiver.prop('selectedIndex', 0);
        const url_receiver = '<?php echo base_url('receiver/getData/');?>';

        // Populate dropdown with list
        $.getJSON(url_receiver, function (data) {
            $.each(data, function (key, entry) {
                dropdown_receiver.append($('<option></option>').attr('value', entry.idm_receiver).text(entry.receiver_name));
            })
        });
    }

    function add(){
        enable_input();
        save_method = 'add';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Save');
        $('.select2').select2({
        });
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Dokumen Kapal'); // Set title to Bootstrap modal title
    }

    function enable_input(){
        $('#no_seal').prop( "disabled", false );
        $('#no_bl').prop( "disabled", false );
        $('#do_expire_date').prop( "disabled", false );
        $('#size').prop( "disabled", false );
        $('#tgl_proses_dok').prop( "disabled", false );
        $('#cmpy').prop( "disabled", false );
        $('#agen').prop( "disabled", false );
        $('#kota_asal').prop( "disabled", false );
        $('#pengirim').prop( "disabled", false );
        $('#penerima').prop( "disabled", false );
        $('#ship_name').prop( "disabled", false );
        $('#io').prop( "disabled", false );
        $('#kondisi').prop( "disabled", false );
        $('#produk').prop( "disabled", false );
        $('#stuffing').prop( "disabled", false );
        $('#td').prop( "disabled", false );
        $('#berat').prop( "disabled", false );
        $('#tgl_tiba').prop( "disabled", false );
        $('#tgl_bm').prop( "disabled", false );
    }

    function disable_input(){
        $('#no_seal').prop( "disabled", true );
        $('#no_bl').prop( "disabled", true );
        $('#do_expire_date').prop( "disabled", true );
        $('#size').prop( "disabled", true );
        $('#tgl_proses_dok').prop( "disabled", true );
        $('#cmpy').prop( "disabled", true );
        $('#agen').prop( "disabled", true );
        $('#kota_asal').prop( "disabled", true );
        $('#pengirim').prop( "disabled", true );
        $('#penerima').prop( "disabled", true );
        $('#ship_name').prop( "disabled", true );
        $('#io').prop( "disabled", true );
        $('#kondisi').prop( "disabled", true );
        $('#produk').prop( "disabled", true );
        $('#stuffing').prop( "disabled", true );
        $('#td').prop( "disabled", true );
        $('#berat').prop( "disabled", true );
        $('#tgl_tiba').prop( "disabled", true );
        $('#tgl_bm').prop( "disabled", true );
    }

    function edit(id){
        save_method = 'update';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');
        $('.select2').select2({
        });

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('shipment/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Dokumen Kapal'); // Set title to Bootstrap modal title

                $('#idm').val(data.id_doc);
                $('#no_seal').val(data.seal_number);
                $('#no_bl').val(data.bl_number);
                $('#do_expire_date').val(data.do_expire_date);
                $('#size').val(data.size).change();
                $('#tgl_proses_dok').val(data.process_date);
                $('#cmpy').val(data.company).change();
                $('#agen').val(data.id_agent).change();
                $('#kota_asal').val(data.origin_city).change();
                $('#pengirim').val(data.id_shipper).change();
                $('#penerima').val(data.id_receiver).change();
                $('#ship_name').val(data.ship_name);
                $('#io').val(data.io).change();
                $('#kondisi').val(data.condition).change();
                $('#produk').val(data.product);
                $('#stuffing').val(data.stuffing).change();
                $('#td').val(data.departure_date);
                $('#berat').val(data.weight);
                $('#tgl_tiba').val(data.arrival_date);
                $('#tgl_bm').val(data.unload_load_date);

                if(data.locked == '1'){
                    disable_input();
                    $('#btnSave').attr('disabled',true); //set button disable 
                }else{
                    enable_input();
                    $('#btnSave').attr('disabled',false); //set button disable 
                }
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
        
        url = "<?php echo site_url('shipment/ajax_save');?>";
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
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save_doc(){    
        var url;
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        if(save_method_doc == 'add') {
            $('#btnSaveDoc').text('Saving...'); //change button text
            $('#btnSaveDoc').attr('disabled',true); //set button disable 
            url = "<?php echo site_url('document/ajax_add_doc/');?>";
        } else {
            $('#btnSaveDoc').text('Updating...'); //change button text
            $('#btnSaveDoc').attr('disabled',true); //set button disable 
            url = "<?php echo site_url('document/ajax_update_doc');?>";
        }
        
        formData = new FormData($('#form-modal')[0]);
        
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
                    reload_table_doc();
                    $('#form-modal')[0].reset();
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
        //init_select();
    }

    function refresh(){
        init_select();
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);
    }

    function reload_table_doc(){
        //reload datatable ajax 
        table_doc.ajax.reload(null,false); 
    }

    function open_doc(id){
        window.open('<?php echo base_url()?>'+id,'_blank');
        window.focus();
    }

    function delete_file(id){
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url : '<?php echo site_url('document/deleteFile/')?>'+id,
                type: "GET",
                async: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data){
                    if(data.status){
                        reload_table();
                        reload_table_doc();
                        alert('Sukses Menghapus File');
                    }
                    else{
                        alert('something missing');
                    }                
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error deleting file');
                }
            });
        }
    }

    function verify(id){
        swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: 'Konfirmasi Dokumen Kapal Telah Selesai !',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url : "<?php echo site_url('shipment/confirm_doc')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        swal.fire('Berhasil','Dokumen Berhasil Diverifikasi','success');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal.fire("Gagal","Data Batal Verifikasi","error");
                    }
                });
            } else {
                swal.fire("Batal","Data Batal Verifikasi","warning");
            }
        });
    }

    $(document).ready(function(){
        table = $('#tabel').DataTable({
            processing  : true, //Feature control the processing indicator.
            serverSide  : true, //Feature control DataTables' server-side processing mode.
            order       : [], //Initial no order.
            autowidth   : true,
            ordering    : true,
            //scrollY     : 300,
            scrollX     : true,
            //scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 2,
                heightMatch: 'auto'
            },

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('shipment/ajax_list')?>" ,
                "type": "POST",
                "data": function ( data ) {
                    data.company            = $('#company').val();
                    data.shipper            = $('#shipper').val();
                    data.receiver           = $('#receiver').val();
                    data.product            = $('#product').val();
                    data.agent              = $('#agent').val();
                    data.nama_kapal         = $('#nama_kapal').val();
                    
                    if($('#tgl_kapal').val() != ''){
                        data.tgl_kapal_awal     = $('#tgl_kapal').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        data.tgl_kapal_akhir    = $('#tgl_kapal').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    }

                    if($('#tgl_bm').val() != ''){
                        data.tgl_bm_awal        = $('#tgl_bm').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        data.tgl_bm_akhir       = $('#tgl_bm').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    }

                    if($('#tgl_tiba').val() != ''){
                        data.tgl_tiba_awal      = $('#tgl_tiba').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        data.tgl_tiba_akhir     = $('#tgl_tiba').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    }
                }
            },
        });
        //$('#container').css( 'display', 'block' );
        //table.columns.adjust().draw();
        init_select();

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
                        reload_table_doc();
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
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        var locked = $('#locked'+id).val();
        if(locked == '1'){
            $('[name="jenis_doc"]').prop( "disabled", true );
            $('[name="no_doc"]').prop( "readonly", true );
            $('[name="doc_date"]').prop( "disabled", true );
        }else{
            $('[name="jenis_doc"]').prop( "disabled", false );
            $('[name="no_doc"]').prop( "readonly", false );
            $('[name="doc_date"]').prop( "disabled", false );
        }

        $.ajax({
            url : "<?php echo site_url('shipment/ajax_edit_doc_table/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                //console.log(data);
                //tabel untuk dokumen kapal
                table_doc = $('#tb_doc').DataTable({
                    processing  : true, //Feature control the processing indicator.
                    serverSide  : true, //Feature control DataTables' server-side processing mode.
                    order       : [], //Initial no order.
                    autowidth   : true,
                    ordering    : false,
                    destroy     : true,
                    pageLength  : 5,
                    lengthMenu: [5, 10, 20, 50, 100],
                    ajax : {
                        url : "<?php echo base_url('document/ajax_list_doc_table/');?>",
                        type : 'POST',
                        data : function ( data ) {
                            data.id = id;
                            data.locked = locked;
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

    $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });

    $('.tanggal-picker').daterangepicker({
        dateLimit: { days: 360 },
        format: 'yyyy-mm-dd'
    });

</script>