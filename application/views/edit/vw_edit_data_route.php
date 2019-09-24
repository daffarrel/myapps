<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Ubah Data Rute</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Ubah Data Rute</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('route/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Nama Rute</label>
                                        <input hidden value="<?php echo $attr['data']->idm_route?>" name="idm" id="idm">
                                        <input value="<?php echo $attr['data']->route_name?>" required id="nama_rute" name="nama_rute" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Asal</label>
                                        <select id="asal" name="asal" class="form-control">
                                            <?php
                                            foreach ($attr['city'] as $data){
                                                if($data->idm_city == $attr['data']->origin){
                                                ?>
                                                    <option selected value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                            <?php
                                                }
                                                else{
                                                    ?>
                                                    <option value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>                                              
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tujuan</label>
                                        <select id="tujuan" name="tujuan" class="form-control">
                                            <?php
                                            foreach ($attr['city'] as $data){
                                                if($data->idm_city == $attr['data']->destination){
                                                ?>
                                                    <option selected value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                            <?php
                                                }
                                                else{
                                                    ?>
                                                    <option value="<?php echo $data->idm_city?>"><?php echo $data->city_name?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>                                            
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tipe Truck</label>
                                        <select id="tipe" name="tipe" class="form-control">
                                            <?php
                                            foreach ($attr['tipe'] as $data){
                                                if($data->subID == $attr['data']->type){
                                                ?>
                                                    <option selected value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                            <?php
                                                } else{
                                                    ?>
                                                    <option value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Size Muatan</label>
                                        <select id="size" name="size" class="form-control">
                                            <?php
                                            foreach ($attr['size'] as $data){
                                                if($data->subID == $attr['data']->size){
                                                ?>
                                                    <option selected value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                            <?php
                                                } else{
                                                    ?>
                                                    <option value="<?php echo $data->subID?>"><?php echo $data->value?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Biaya</label>
                                        <input value="<?php echo $attr['data']->fare?>" required id="biaya" name="biaya" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('main/master/bank')?>')
    }
</script>