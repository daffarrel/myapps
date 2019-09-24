<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<section class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>Tambah Data Kontainer</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Master Data</a></li>
                <li class="active"><a href="#"> Tambah Data Kontainer</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <?php echo $this->session->flashdata('notif');?>
                            <form id="form_input" action="<?php echo base_url('container/addData')?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_name" class="form-label">No Container</label>
                                        <input required id="no_container" name="no_container" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Size</label>
                                        <select required id="size" name="size" class="form-control">
                                            <option value="20">20</option>
                                            <option value="40">40</option>
                                            <option value="N">N</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_telp" class="form-label">Agen</label>
                                        <select required id="agent" name="agent" class="form-control select2">
                                            <?php
                                                foreach ($attr['data'] as $row){
                                                ?>
                                                <option value="<?php echo $row->idm_agent; ?>"> <?php echo $row->agent_name; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
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
    $(document).ready(function() {
        $('.select2').select2();
    });

    function cancel() {
        window.location.replace('<?php echo site_url('main/master/container')?>')
    }
</script>