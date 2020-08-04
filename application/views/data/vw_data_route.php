<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Master Data Rute</h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Master Data</a></li>
          <li class="active"><a href="#"> Data Rute</a></li>
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
                            <th><center>No</th>
                            <th><center>Nama Rute</th>
                            <th><center>Asal</th>
                            <th><center>Tujuan</th>
                            <th><center>Type Truck</th>
                            <th><center>Ukuran</th>
                            <th><center>Biaya</th>
                            <th><center>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th><center>No</th>
                            <th><center>Nama Rute</th>
                            <th><center>Asal</th>
                            <th><center>Tujuan</th>
                            <th><center>Type Truck</th>
                            <th><center>Ukuran</th>
                            <th><center>Biaya</th>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Rute</label>
                                    <input hidden id="idm" name="idm">
                                    <input required id="nama_rute" name="nama_rute" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Asal</label>
                                    <input required id="asal" name="asal" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tujuan</label>
                                    <input required id="tujuan" name="tujuan" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tipe Truck</label>
                                    <select id="tipe" name="tipe" class="form-control">
                                        <option value="">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Size Muatan</label>
                                    <select id="size" name="size" class="form-control">
                                        <option value="">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Biaya</label>
                                    <input required id="biaya" name="biaya" class="form-control uang" type="text">
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
        $('.select2').select2({});
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Data Daftar Gaji'); // Set title to Bootstrap modal title
    }

    function edit(id){
        save_method = 'update';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');
        $('.select2').select2({});

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('route/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#idm').val(data.idm_route);
                $('#nama_rute').val(data.route_name);
                $('#asal').val(data.origin);
                $('#tujuan').val(data.destination);
                $('#tipe').val(data.type).change();
                $('#size').val(data.size).change();
                $('#biaya').val(formatNumber(data.fare));

                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Daftar Gaji'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
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
        
        url = "<?php echo site_url('route/ajax_save');?>";
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

    function init_select(){
        //Unit Select Box
        let dropdown_tipe = $('#tipe');
        dropdown_tipe.empty();
        dropdown_tipe.append('<option value="">Pilih Truk</option>');
        dropdown_tipe.prop('selectedIndex', 0);
        const url_tipe = '<?php echo base_url('route/getOptionData/truck');?>';

        // Populate dropdown with list
        $.getJSON(url_tipe, function (data) {
            $.each(data, function (key, entry) {
                dropdown_tipe.append($('<option></option>').attr('value', entry.subID).text(entry.value));
            })
        });

        //Unit Select Box
        let dropdown_size = $('#size');
        dropdown_size.empty();
        dropdown_size.append('<option value="">Pilih Size</option>');
        dropdown_size.prop('selectedIndex', 0);
        const url_size = '<?php echo base_url('route/getOptionData/size');?>';

        // Populate dropdown with list
        $.getJSON(url_size, function (data) {
            $.each(data, function (key, entry) {
                dropdown_size.append($('<option></option>').attr('value', entry.subID).text(entry.value));
            })
        });
    }

    function refresh(){
        init_select();
        table.ajax.reload(null,false);
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
                "url": "<?php echo site_url('route/ajax_list')?>" ,
                "type": "POST",
            },
        });
        //$('[data-mask]').inputmask();
        // Format mata uang.
        $( '.uang' ).mask('000.000.000', {reverse: true});
        init_select();
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
                    url : "<?php echo site_url('route/delete')?>/"+id,
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
</script>