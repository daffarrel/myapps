<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Ubah Data Pengirim</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Ubah Data Pengirim</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('shipper/updateData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Nama Pengirim</label>
                                        <input hidden value="<?php echo $attr['data']->idm_shipper?>" name="idm" id="idm">
                                        <input value="<?php echo $attr['data']->debitur_name?>" required id="pengirim" name="pengirim" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Alamat</label>
                                        <input value="<?php echo $attr['data']->address?>" required id="alamat" name="alamat" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Kota</label>
                                        <input value="<?php echo $attr['data']->city?>" required id="kota" name="kota" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">PIC</label>
                                        <input value="<?php echo $attr['data']->pic?>" required id="pic" name="pic" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Finance</label>
                                        <input value="<?php echo $attr['data']->finance?>" required id="finance" name="finance" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No Telepon</label>
                                        <input value="<?php echo $attr['data']->telp?>" id="telp" name="telp" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No HP</label>
                                        <input value="<?php echo $attr['data']->hp?>" id="hp" name="hp" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No Fax</label>
                                        <input value="<?php echo $attr['data']->fax?>" id="fax" name="fax" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Nama Perusahaan</label>
                                        <input value="<?php echo $attr['data']->corporate_name?>" required id="perusahaan" name="perusahaan" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Bank</label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No Rekening</label>
                                        <input value="<?php echo $attr['data']->account_number?>" required id="no_rek" name="no_rek" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('main/master/shipper')?>')
    }
</script>