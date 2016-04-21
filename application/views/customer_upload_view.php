<div class="row">
    <?php echo $this->breadcrumbs->show(); ?>
    <div class="list-group">
        <a href="<?php echo site_url('customer/listAll'); ?>" class="list-group-item">
            <h4 class="list-group-item-heading">Upload Customer Entries</h4>
            <p class="list-group-item-text">Entries</p>
        </a>
    </div>
</div>
<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
    <?php echo form_open_multipart('customer/uploadData');?>
    <div class="form-group">
        <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <input type="file" name="userfile" size="20"/>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="btn_upload" name="btn_login" type="submit" class="btn btn-primary" value="Upload"/>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

