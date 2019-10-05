<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Ubah Data Dokumen Kapal</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Dokumen Kapal</a></li>
                <li class="active"><a href="#"> Ubah Data Dokumen Kapal</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('shipment/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Seal</label>
                                        <input hidden id="idm" name="idm" value="<?php echo $attr['data']->id_doc?>">
                                        <input value="<?php echo $attr['data']->seal_number?>" required id="no_seal" name="no_seal" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Size</label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Proses Dokumen</label>
                                        <input value="<?php echo $attr['data']->process_date?>" required id="tgl_proses_dok" name="tgl_proses_dok" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Perusahaan</label>
                                        <select required id="cmpy" name="cmpy" class="form-control select selectpicker show-tick">
                                            <option value="">----</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Agent</label>
                                        <select required id="agent" name="agent" class="form-control select2">
                                            <option value="">----</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Terima BA</label>
                                        <input value="<?php echo $attr['data']->ba_recv_date?>" required id="tgl_ba" name="tgl_ba" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Kota Asal</label>
                                        <select required id="kota_asal" name="kota_asal" class="form-control select2">
                                            <option value="">----</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Pengirim</label>
                                        <select id="shipper" name="shipper" class="form-control select2" >
                                            <option value="">----</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Penerima</label>
                                        <select id="receiver" name="receiver" class="form-control select2">
                                            <option value="">----</option>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. BA</label>
                                        <input value="<?php echo $attr['data']->report_num?>" required id="no_ba" name="no_ba" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Surat Jalan</label>
                                        <input value="<?php echo $attr['data']->safeconduct_num?>" required id="no_surat_jalan" name="no_surat_jalan" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">PO</label>
                                        <input value="<?php echo $attr['data']->po?>" required id="po" name="po" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">DO</label>
                                        <input value="<?php echo $attr['data']->do?>" required id="do" name="do" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">I/O</label>
                                        <select id="io" name="io" class="form-control">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Kondisi</label>
                                        <select required id="kondisi" name="kondisi" class="form-control">
                                            <?php 
                                                if($attr['data']->kondisi == 'FULL'){
                                                    echo '<option selected value="FULL">FULL</option>';
                                                    echo '<option value="CURAH">CURAH</option>';
                                                }else{
                                                    echo '<option value="FULL">FULL</option>';
                                                    echo '<option selected value="CURAH">CURAH</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Stuffing</label>
                                        <select id="stuffing" name="stuffing" class="form-control">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Produk</label>
                                        <input value="<?php echo $attr['data']->product?>" required id="produk" name="produk" class="form-control" type="text">
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
    $(document).ready(function() {
        $('.select2').select2();
    });

    function cancel() {
        window.location.replace('<?php echo site_url('main/document/shipment_doc')?>')
    }

    $('.tanggal').datepicker({
        format     : 'yyyy-mm-dd',
        clearBtn   : true,
        autoclose  : true,
    });
</script>