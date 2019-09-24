<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Tambah Data Agen</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Tambah Data Agen</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <form id="form_input_dok" action="<?php echo base_url('agent/addData')?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="nik" class="form-label">Nama Agen</label>
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
                                <div class=" col-md-12">
                                    <br>
                                    <button class="btn btn-danger" onclick="cancel();" type="button"><span>Cancel</span></button>
                                    <button class="btn btn-warning" type="reset"><span>Reset</span></button>
                                    <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                                <div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>

<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }

    function master() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }
</script>