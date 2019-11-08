<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Master Data Penerima</h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Master Data</a></li>
          <li class="active"><a href="#"> Data Penerima</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="box box-default">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button>
                    <button class="btn btn-info" onclick="refresh()"> <span>Refresh Halaman</span></button>
                    <br><br>   
                </div>
                <div class="box-body table-responsive">
                    <table id="tabel" class="table table-bordered table-striped table-hover js-basic-example dataTable nowrap" cellspacing="0" width="100%" role="grid" >
                        <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>Nama Penerima</th>
                            <th><center>Alamat</th>
                            <th><center>Kota</th>
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
                                    <label for="agent_name" class="form-label">Nama Penerima</label>
                                    <input hidden id="idm" name="idm">
                                    <input required id="penerima" name="penerima" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Alamat</label>
                                    <input required id="alamat" name="alamat" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kota</label>
                                    <input required id="kota" name="kota" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Telepon</label>
                                    <input id="telp" name="telp" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No HP</label>
                                    <input id="hp" name="hp" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Fax</label>
                                    <input id="fax" name="fax" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Perusahaan</label>
                                    <input id="perusahaan" name="perusahaan" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Bank</label>
                                    <select id="bank" name="bank" class="form-control select2">
                                        <option value="">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Rekening</label>
                                    <input required id="no_rek" name="no_rek" class="form-control" type="text">
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
        $('.modal-title').text('Tambah Data Penerima'); // Set title to Bootstrap modal title
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
            url : "<?php echo site_url('receiver/ajax_edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#idm').val(data.idm_receiver);
                $('#penerima').val(data.receiver_name);
                $('#alamat').val(data.address);
                $('#kota').val(data.city);
                $('#perusahaan').val(data.corporate_name);
                $('#telp').val(data.telp);
                $('#hp').val(data.hp);
                $('#fax').val(data.fax);
                $('#bank').val(data.id_bank).trigger('change.select2');
                $('#no_rek').val(data.account_number);

                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Penerima'); // Set title to Bootstrap modal title
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
        
        url = "<?php echo site_url('receiver/ajax_save');?>";
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
        let dropdown = $('#bank');
        dropdown.empty();
        dropdown.append('<option value="">Pilih Bank</option>');
        dropdown.prop('selectedIndex', 0);
        const url = '<?php echo base_url('bank/getData');?>';

        // Populate dropdown with list
        $.getJSON(url, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.idm_bank).text(entry.bank_name));
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
            scrollX : true,

            // Load data for the table's content from an Ajax source
            ajax: {
                "url": "<?php echo site_url('receiver/ajax_list')?>" ,
                "type": "POST",
            },
        });
        init_select();
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
                    url : "<?php echo site_url('receiver/delete')?>/"+id,
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

    $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });
</script>