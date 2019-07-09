<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Ubah Data Container</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('container/updateData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Container</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input hidden id="idm_container" name="idm_container" value="<?php echo $attr['data']->idm_container; ?>">
                                            <input required id="no_container" name="no_container" value="<?php echo $attr['data']->container_number; ?>"class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Size</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">keyboard</i>
                                        </span>
                                        <div class="form-line">
                                            <select required id="size" name="size" class="form-control">
                                                <?php
                                                    if($attr['data']->size == '20') {
                                                        ?>
                                                        <option selected value="20">20</option>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <option value="20">20</option>
                                                        <?php
                                                    }
                                                    if($attr['data']->size == '40') {
                                                        ?>
                                                        <option selected value="40">40</option>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <option value="40">40</option>
                                                        <?php
                                                    }
                                                    if($attr['data']->size == 'N') {
                                                        ?>
                                                        <option selected value="N">N</option>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <option value="N">N</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_telp" class="form-label">Agen</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"></i>
                                        </span>
                                        <div class="form-line">
                                            <select required id="agent" name="agent" class="form-control">
                                                <?php
                                                foreach ($attr['agent'] as $row){
                                                    if($row->idm_agent == $attr['data']->id_agent){
                                                ?>
                                                <option selected value="<?php echo $row->idm_agent; ?>"> <?php echo $row->agent_name; ?></option>
                                                <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <option value="<?php echo $row->idm_agent; ?>"> <?php echo $row->agent_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn bg-red waves-effect" onclick="cancel();" type="button"><i class="material-icons">undo</i><span>Cancel</span></button>
                            <button class="btn bg-blue waves-effect" type="reset"><i class="material-icons">clear</i><span>Reset</span></button>
                            <button type="submit" class="btn bg-orange waves-effect"><i class="material-icons">save</i><span>Simpan</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('master/page/container')?>')
    }

    function master() {
        window.location.replace('<?php echo site_url('master/page/container')?>')
    }
</script>