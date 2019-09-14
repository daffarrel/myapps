<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Agen</h2>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input_dok" action="<?php echo base_url('agent/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nik" class="form-label">Nama Agen</label>
                                        <input type="hidden" id="idm_agent" name="idm_agent" value="<?php echo $attr['agent']['idm_agent']?>"/>
                                        <div class="input-group">
                                            <input value="<?php echo $attr['agent']['agent_name']?>" id="agent_name" name="agent_name" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kj" class="form-label">Alamat</label>
                                        <div class="input-group">
                                            <input value="<?php echo $attr['agent']['address']?>" id="address" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_telp" class="form-label">No Telepon</label>
                                        <div class="input-group">
                                            <input id="no_telp" value="<?php echo $attr['agent']['telp']?>" name="no_telp" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <div class="input-group">
                                            <input id="no_hp" value="<?php echo $attr['agent']['hp']?>" name="no_hp" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_fax" class="form-label">No Fax</label>
                                        <div class="input-group">
                                            <input value="<?php echo $attr['agent']['fax']?>" id="no_fax" name="no_fax" class="form-control">
                                        </div>
                                    </div>   
                                </div>
                                <br>
                                <button class="btn btn-danger" onclick="cancel();" type="button"><span>Cancel</span></button>
                                <button class="btn btn-warning" type="reset"><span>Reset</span></button>
                                <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }

    function master() {
        window.location.replace('<?php echo site_url('main/master/agent')?>')
    }
</script>