<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Tambah Data Dokumen Kapal</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Dokumen Kapal</a></li>
                <li class="active"><a href="#"> Tambah Data Dokumen Kapal</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('shipment/addData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Seal</label>
                                        <input required id="no_seal" name="no_seal" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Container</label>
                                        <select id="no_kontainer" name="no_kontainer" class="form-control select2">
                                            <?php
                                            foreach ($attr['container'] as $data){
                                                echo '<option value="'.$data->idm_container.'">'.$data->container_number.'</option>';                
                                            }
                                            ?>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Proses Dokumen</label>
                                        <input required id="tgl_proses_dok" name="tgl_proses_dok" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Perusahaan</label>
                                        <select required id="cmpy" name="cmpy" class="form-control select2">
                                            <?php
                                                foreach ($attr['company'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Agent</label>
                                        <select required id="agent" name="agent" class="form-control select2">
                                            <?php
                                                foreach ($attr['agent'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_agent?>"><?php echo $data->agent_name?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Terima BA</label>
                                        <input required id="tgl_ba" name="tgl_ba" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Kota Asal</label>
                                        <select required id="kota_asal" name="kota_asal" class="form-control select2">
                                            <?php
                                                foreach ($attr['city'] as $data){
                                                    ?>
                                                    <option value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Pengirim</label>
                                        <select id="shipper" name="shipper" class="form-control select2">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Penerima</label>
                                        <select id="receiver" name="receiver" class="form-control select2">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. BA</label>
                                        <input required id="no_ba" name="no_ba" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Surat Jalan</label>
                                        <input required id="no_surat_jalan" name="no_surat_jalan" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">PO</label>
                                        <input required id="po" name="po" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">DO</label>
                                        <input required id="do" name="do" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">I/O</label>
                                        <select id="io" name="io" class="form-control select">
                                            <option value="I">IN</option>
                                            <option value="O">OUT</option>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Kondisi</label>
                                        <select required id="kondisi" name="kondisi" class="form-control">
                                            <option value="FULL">FULL</option>
                                            <option value="CURAH">CURAH</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Stuffing</label>
                                        <select id="stuffing" name="stuffing" class="form-control select">
                                            <option value="yes">YA</option>
                                            <option value="no">TIDAK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Produk</label>
                                        <input required id="produk" name="produk" class="form-control" type="text">
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