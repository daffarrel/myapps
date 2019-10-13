<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Ubah Data Dokumen Kapal Tiba</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Dokumen Kapal</a></li>
                <li class="active"><a href="#"> Ubah Data Dokumen Kapal Tiba</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('shipment/updateDataArr')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. Kontainer</label>
                                        <input hidden id="idm" name="idm" value="<?php echo $attr['data']->id_ship_arr?>">
                                        <select id="no_seal" name="no_seal" class="form-control select2">
                                            <?php
                                            foreach ($attr['seal'] as $data){
                                                if($data->id_doc == $attr['data']->id_doc )
                                                    echo '<option selected value="'.$data->id_doc.'">'.$data->seal_number.' => '.$data->size.'</option>';
                                                else
                                                    echo '<option value="'.$data->id_doc.'">'.$data->seal_number.' => '.$data->size.'</option>';                   
                                            }
                                            ?>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No. BL</label>
                                        <input value="<?php echo $attr['data']->bl_number ?>" required id="no_bl" name="no_bl" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal BL</label>
                                        <input value="<?php echo $attr['data']->bl_date ?>" required id="tgl_bl" name="tgl_bl" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Nama Kapal</label>
                                        <input value="<?php echo $attr['data']->ship_name ?>" required id="nama_kapal" name="nama_kapal" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">TD</label>
                                        <input value="<?php echo $attr['data']->td ?>" required id="td" name="td" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Berat</label>
                                        <input value="<?php echo $attr['data']->weight ?>"required id="berat" name="berat" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Kapal Tiba</label>
                                        <input value="<?php echo $attr['data']->arrival_date ?>" required id="tgl_tiba" name="tgl_tiba" class="form-control tanggal" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">Tanggal Bongkar Muat</label>
                                        <input value="<?php echo $attr['data']->unload_load_date ?>" required id="tgl_bm" name="tgl_bm" class="form-control tanggal" type="text">
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
        window.location.replace('<?php echo site_url('main/document/shipment_arr')?>')
    }

    $(document).ready(function() {
        $('.select2').select2();
    });

    $('.tanggal').datepicker({
        format     : 'yyyy-mm-dd',
        clearBtn   : true,
        autoclose  : true,
    });
</script>