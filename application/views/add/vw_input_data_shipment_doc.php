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