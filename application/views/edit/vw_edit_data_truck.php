<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Data Truk</h2>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('notif');?>
                        <form id="form_input" action="<?php echo base_url('truck/updateData')?>" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city_code" class="form-label">Kode Truk</label>
                                    <input hidden value="<?php echo $attr['truck']['idm_truck']?>" id="idm" name="idm">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_identity</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" id="kode_truk" name="kode_truk" required="required" class="form-control" value="<?php echo $attr['truck']['truck_code']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city_name" class="form-label">No Polisi</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">keyboard</i>
                                        </span>
                                        <div class="form-line">
                                            <input id="no_polisi" name="no_polisi" value="<?php echo $attr['truck']['plate_number']?>" required="required" class="form-control" type="text">
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
        window.location.replace('<?php echo site_url('master/page/city')?>')
    }

    function master() {
        window.location.replace('<?php echo site_url('master/page/city')?>')
    }

    $(function () {
        var form = $('#form_input');
        form.validate({
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-label').append(error);
            }
        });
    });
</script>