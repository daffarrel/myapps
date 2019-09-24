<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Tambah Data Driver</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Tambah Data Driver</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('driver/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Nama Supir</label>
                                        <input value="<?php echo $attr['data']->idm_driver?>" hidden id="idm" name="idm">
                                        <input value="<?php echo $attr['data']->driver_name?>" required id="nama_supir" name="nama_supir" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No Sim</label>
                                        <input value="<?php echo $attr['data']->license_number?>" required id="no_sim" name="no_sim" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tempat Lahir</label>
                                        <input value="<?php echo $attr['data']->dob_city?>" required id="tmpt_lahir" name="tmpt_lahir" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Lahir</label>
                                        <input value="<?php echo $attr['data']->dob?>" required id="tgl_lahir" name="tgl_lahir" class="form-control datepicker" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Alamat</label>
                                        <input value="<?php echo $attr['data']->address?>" required id="alamat" name="alamat" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <button class="btn btn-danger" onclick="cancel();" type="button"><span>Cancel</span></button>
                                    <button class="btn btn-warning" type="reset"><span>Reset</span></button>
                                    <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/master/driver')?>')
    }

    $('.datepicker').datepicker({
        format     : 'yyyy-mm-dd',
        clearBtn   : true,
        autoclose  : true,
    });
</script>