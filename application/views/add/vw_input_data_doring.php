<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Tambah Data Doring</h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Master Data</a></li>
            <li class="active"><a href="#"> Tambah Data Doring</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header">
                </div>
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="no_seal" class="col-sm-2 control-label">No Seal</label>
                            <div class="col-md-3 col-sm-10">
                                <select id="no_seal" name="no_seal" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach($attr['seal'] as $data){
                                            echo '<option value"'.$data->id_ship_arr.'">'.$data->seal_number.' => '.$data->size.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_surat_jalan" class="col-sm-2 control-label">No Surat Jalan</label>
                            <div class="col-md-3 col-sm-10">
                                <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rute" class="col-sm-2 control-label">Rute</label>
                            <div class="col-md-3 col-sm-10">
                                <select id="rute" name="rute" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach($attr['rute'] as $data){
                                            echo '<option value"'.$data->idm_route.'">'.$data->route_name.' ('.$data->origin.' => '.$data->destination.')</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dk_lk" class="col-sm-2 control-label">DK/LK</label>
                            <div class="col-md-3 col-sm-10">
                                <select id="dk_lk" class="form-control">
                                    <option value="DK">Dalam Kota</option>
                                    <option value="LK">Luar Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="door" class="col-sm-2 control-label">Tanggal Bongkar</label>
                            <div class="col-md-3 col-sm-10">
                                <input type="text" class="form-control datepicker" name="door" id="door"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="on_chassis" class="col-sm-2 control-label">Tanggal Muat</label>
                            <div class="col-md-3 col-sm-10">
                                <input type="text" class="form-control datepicker" name="on_chassis" id="on_chassis"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="truck" class="col-sm-2 control-label">Truck</label>
                            <div class="col-md-3 col-sm-10">
                                <select id="truck" name="truck" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach($attr['truck'] as $data){
                                            echo '<option value"'.$data->idm_truck.'">'.$data->truck_code.' ('.$data->plate_number.')</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="supir" class="col-sm-2 control-label">Supir</label>
                            <div class="col-md-3 col-sm-10">
                                <select id="supir" name="supir" class="form-control select2" style="width: 100%;">
                                    <?php
                                        foreach($attr['supir'] as $data){
                                            echo '<option value"'.$data->idm_driver.'">'.$data->driver_name.' ('.$data->license_number.')</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-left">Simpan</button>
                </div>
            </div>
      </section>
    </div>
</section>

<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/document/doring')?>')
    }

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option',
            livesearch: true
        });
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format:"yyyy-mm-dd",
        });
    });
</script>