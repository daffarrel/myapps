<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Input Data Dokumen Kapal</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('shipment/addData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No. Seal</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input required id="no_seal" name="no_seal" class="form-control" type="text">
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
                                            <select id="no_kontainer" name="no_kontainer" class="form-control select">
                                                    <option value="">------</option>
                                                    <?php
                                                    foreach ($attr['container'] as $data){
                                                        ?>
                                                        <option value="<?php echo $data->idm_container?>"><?php echo $data->container_number?></option>
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
                                    <label for="agent_name" class="form-label">Tanggal Proses Dokumen</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                        <div class="form-line">
                                            <input required id="tgl_proses_dok" name="tgl_proses_dok" class="form-control" type="text">
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
                                            <input required id="cmpy" name="cmpy" class="form-control" type="text">
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
                                            <input required id="tgl_ba" name="tgl_ba" class="form-control" type="text">
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
                                            <input required id="agent" name="agent" class="form-control" type="text">
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
                                            <input required id="kota_asal" name="kota_asal" class="form-control" type="text">
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
                                            <select id="shipper" name="shipper" class="form-control select">
                                                <?php
                                                foreach ($attr['shipper'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_shipper?>"><?php echo $data->debitur_name?></option>
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
                                    <label for="agent_name" class="form-label">Penerima</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">local_shipping</i>
                                        </span>
                                        <div class="form-line">
                                            <select id="receiver" name="receiver" class="form-control select">
                                                <?php
                                                foreach ($attr['receiver'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_receiver?>"><?php echo $data->receiver_name?></option>
                                                <?php
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
                                            <input required id="no_ba" name="no_ba" class="form-control" type="text">
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
                                            <input required id="no_surat_jalan" name="no_surat_jalan" class="form-control" type="text">
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
                                            <input required id="po" name="po" class="form-control" type="text">
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
                                            <input required id="do" name="do" class="form-control" type="text">
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
                                                <option value="I">IN</option>
                                                <option value="O">OUT</option>
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
                                            <input required id="kondisi" name="kondisi" class="form-control" type="text">
                                        </div>
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
                                            <input required id="produk" name="produk" class="form-control" type="text">
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
                                            <option value="YES">YA</option>
                                            <option value="NO">TIDAK</option>
                                        </select>
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
        window.location.replace('<?php echo site_url('master/page/shipper')?>')
    }
</script>