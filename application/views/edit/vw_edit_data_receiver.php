<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Ubah Data Penerima</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('receiver/updateData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Penerima</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input hidden value="<?php echo $attr['data']->idm_receiver?>" name="idm" id="idm">
                                            <input value="<?php echo $attr['data']->receiver_name?>" required id="penerima" name="penerima" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">format_list_numbered</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->address?>" required id="alamat" name="alamat" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kota</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->city?>" required id="kota" name="kota" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Telepon</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->telp?>" id="telp" name="telp" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No HP</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">speaker_phone</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->hp?>" id="hp" name="hp" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Fax</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phonelink_ring</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->fax?>" id="fax" name="fax" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Perusahaan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">local_shipping</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->corporate_name?>" required id="perusahaan" name="perusahaan" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Bank</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">business_center</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="bank" name="bank" class="form-control">
                                                <?php
                                                foreach ($attr['bank'] as $data){
                                                    if($data->bank_name == $attr['data']->bank_name){
                                                    ?>
                                                    <option selected value="<?php echo $data->idm_bank?>"><?php echo $data->bank_name?></option>
                                                <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option value="<?php echo $data->idm_bank?>"><?php echo $data->bank_name?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Rekening</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->account_number?>" required id="no_rek" name="no_rek" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('master/page/receiver')?>')
    }
</script>