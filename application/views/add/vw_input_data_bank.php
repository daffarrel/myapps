<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Tambah Data Agen</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Tambah Data Bank</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <form id="form_input_bank" action="<?php echo base_url('bank/addData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_bank" class="form-label">Kode Bank</label>
                                        <input id="bank_code" name="bank_code" required="required" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_name" class="form-label">Nama Bank</label>
                                        <input id="bank_name" name="bank_name" required="required" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class=" col-md-12">
                                    <br>
                                    <button class="btn btn-danger" onclick="cancel();" type="button"><span>Cancel</span></button>
                                    <button class="btn btn-warning" type="reset"><span>Reset</span></button>
                                    <button type="submit" class="btn btn-primary"><span>Simpan</span></button>
                                <div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<script type="text/javascript">
    function cancel() {
        window.location.replace('<?php echo site_url('main/master/bank')?>')
    }
</script>