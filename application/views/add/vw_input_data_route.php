<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Input Data Rute</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('route/addData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Rute</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input required id="nama_rute" name="nama_rute" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Asal</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="asal" name="asal" class="form-control">
                                                <?php
                                                foreach ($attr['city'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>                                              </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tujuan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="tujuan" name="tujuan" class="form-control">
                                                <?php
                                                foreach ($attr['city'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tipe Truck</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">device_hub</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="tipe" name="tipe" class="form-control">
                                                <?php
                                                foreach ($attr['tipe'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Size Muatan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">control_point</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="size" name="size" class="form-control">
                                                <?php
                                                foreach ($attr['size'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Biaya</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input required id="biaya" name="biaya" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('master/page/route')?>')
    }
</script>