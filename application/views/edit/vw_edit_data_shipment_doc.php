<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Ubah Data Dokumen Kapal</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('shipment/updateData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. Seal</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input hidden id="idm" name="idm" value="<?php echo $attr['data']->id_doc?>">
                                            <input value="<?php echo $attr['data']->seal_number?>" required id="no_seal" name="no_seal" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. Container</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">format_list_numbered</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="no_kontainer" name="no_kontainer" class="form-control select selectpicker show-tick" data-live-search="true">
                                                <?php
                                                    foreach ($attr['container'] as $data){
                                                        if($data->idm_container == $attr['data']->idm_container )
                                                            echo '<option selected value="'.$data->idm_container.'">'.$data->container_number.'</option>'; 
                                                        else
                                                            echo '<option value="'.$data->idm_container.'">'.$data->container_number.'</option>';                   
                                                    }
                                                ?>
                                            </select>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Proses Dokumen</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->process_date?>" required id="tgl_proses_dok" name="tgl_proses_dok" class="form-control tanggal" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Perusahaan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">people</i>
                                        </span>
                                        <div class="form-line">
                                            <select required id="cmpy" name="cmpy" class="form-control select selectpicker show-tick">
                                                <?php
                                                    foreach ($attr['company'] as $data){
                                                        if($data->subID == $attr['data']->idm_company)
                                                            echo '<option selected value="'.$data->subID.'">'.$data->value.'</option>';
                                                        else
                                                            echo '<option value="'.$data->subID.'">'.$data->value.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Tanggal Terima BA</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">people_outline</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->ba_recv_date?>" required id="tgl_ba" name="tgl_ba" class="form-control tanggal" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Agent</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </span>
                                        <div class="form-line">
                                            <select required id="agent" name="agent" class="form-control select selectpicker show-tick" data-live-search="true">
                                                <?php
                                                    foreach ($attr['agent'] as $data){
                                                        if($data->idm_agent == $attr['data']->idm_agent)
                                                            echo '<option selected value="'.$data->idm_agent.'">'.$data->agent_name.'</option>';
                                                        else
                                                            echo '<option value="'.$data->idm_agent.'">'.$data->agent_name.'</option>';    
                                                    }                
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kota Asal</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">speaker_phone</i>
                                        </span>
                                        <div class="form-line">
                                            <select required id="kota_asal" name="kota_asal" class="form-control select selectpicker show-tick" data-live-search="true">
                                                <?php
                                                    foreach ($attr['city'] as $data){
                                                        if($data->idm_city == $attr['data']->idm_city)
                                                            echo '<option selected value="'.$data->idm_city.'">'.$data->city_name.'</option>';
                                                        else
                                                            echo '<option value="'.$data->idm_city.'">'.$data->city_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Pengirim</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phonelink_ring</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="shipper" name="shipper" class="form-control selectpicker show-tick" data-live-search="true">
                                                <?php
                                                foreach ($attr['shipper'] as $data){
                                                    if($data->idm_shipper == $attr['data']->idm_shipper)
                                                        echo '<option selected value="'.$data->idm_shipper.'">'.$data->debitur_name.'</option>'; 
                                                    else
                                                        echo '<option value="'.$data->idm_shipper.'">'.$data->debitur_name.'</option>'; 
                                                }
                                                ?>
                                            </select>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Penerima</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">local_shipping</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="receiver" name="receiver" class="form-control selectpicker show-tick" data-live-search="true">
                                                <?php
                                                foreach ($attr['receiver'] as $data){  
                                                    if($data->idm_receiver == $attr['data']->idm_receiver)
                                                        echo '<option selected value="'.$data->idm_receiver.'">'.$data->receiver_name.'</option>';
                                                    else
                                                        echo '<option value="'.$data->idm_receiver.'">'.$data->receiver_name.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. BA</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">business_center</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->report_num?>" required id="no_ba" name="no_ba" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. Surat Jalan</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->safeconduct_num?>" required id="no_surat_jalan" name="no_surat_jalan" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">PO</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->po?>" required id="po" name="po" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">DO</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->do?>" required id="do" name="do" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">I/O</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="io" name="io" class="form-control select">
                                                <?php 
                                                    if($attr['data']->io == 'I'){
                                                        echo '<option selected value="I">IN</option>';
                                                        echo '<option value="O">OUT</option>';
                                                    }
                                                    else{
                                                        echo '<option value="I">IN</option>';
                                                        echo '<option selected value="O">OUT</option>';
                                                    }
                                                ?>
                                            </select>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Kondisi</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->kondisi?>" required id="kondisi" name="kondisi" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Stuffing</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <select id="stuffing" name="stuffing" class="form-control select">
                                            <?php 
                                                if($attr['data']->stuffing == 'yes'){
                                                    echo '<option selected value="yes">YA</option>';
                                                    echo '<option value="no">TIDAK</option>';
                                                }else{
                                                    echo '<option value="yes">YA</option>';
                                                    echo '<option selected value="no">TIDAK</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Produk</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">monetization_on</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="<?php echo $attr['data']->product?>" required id="produk" name="produk" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('master/cost/shipment_doc')?>')
    }

    $('.tanggal').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
</script>