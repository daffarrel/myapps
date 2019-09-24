<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Ubah Data Agen</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Ubah Data Agen</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <form id="form_input_dok" action="<?php echo base_url('agent/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nik" class="form-label">Nama Agen</label>
                                        <input type="hidden" id="idm_agent" name="idm_agent" value="<?php echo $attr['agent']['idm_agent']?>"/>
                                        <input value="<?php echo $attr['agent']['agent_name']?>" id="agent_name" name="agent_name" required="required" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kj" class="form-label">Alamat</label>
                                        <input value="<?php echo $attr['agent']['address']?>" id="address" name="address" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_telp" class="form-label">No Telepon</label>
                                        <input id="no_telp" value="<?php echo $attr['agent']['telp']?>" name="no_telp" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input id="no_hp" value="<?php echo $attr['agent']['hp']?>" name="no_hp" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_fax" class="form-label">No Fax</label>
                                        <input value="<?php echo $attr['agent']['fax']?>" id="no_fax" name="no_fax" class="form-control">
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
</div>
<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }

    function master() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }
</script>