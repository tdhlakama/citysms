<div class="row">
      <?php echo $this->breadcrumbs->show(); ?>
</div>
<div class="row">
      <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
            <legend>Change Password</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "userform", "name" => "userform");
            echo form_open("user/change_password", $attributes);
            ?>
            <fieldset>

                  <div class="form-group">
                        <div class="row colbox">
                              <div class="col-lg-4 col-sm-4">
                                    <label for="old_password" class="control-label m">Old password *</label>
                              </div>
                              <div class="col-lg-8 col-sm-8">
                                    <input id="old_password" name="old_password" placeholder="old_password" type="text" class="form-control"  value="<?php echo set_value('old_password'); ?>" />
                                    <span class="text-danger"><?php echo form_error('old_password'); ?></span>
                              </div>
                        </div>
                  </div>

                  <div class="form-group">
                        <div class="row colbox">
                              <div class="col-lg-4 col-sm-4">
                                    <label for="new_password" class="control-label m">New password *</label>
                              </div>
                              <div class="col-lg-8 col-sm-8">
                                    <input id="new_password" name="new_password" placeholder="new_password" type="text" class="form-control"  value="<?php echo set_value('new_password'); ?>" />
                                    <span class="text-danger"><?php echo form_error('new_password'); ?></span>
                              </div>
                        </div>
                  </div>

                  <div class="form-group">
                        <div class="row colbox">
                              <div class="col-lg-4 col-sm-4">
                                    <label for="new_password_confirm" class="control-label m">Confirm Password *</label>
                              </div>
                              <div class="col-lg-8 col-sm-8">
                                    <input id="new_password_confirm" name="new_password_confirm" placeholder="new_password_confirm" type="text" class="form-control"  value="<?php echo set_value('new_password_confirm'); ?>" />
                                    <span class="text-danger"><?php echo form_error('new_password_confirm'); ?></span>
                              </div>
                        </div>
                  </div>

                  <div class="form-group">
                        <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                              <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Save" />
                              <a href="<?php echo site_url('user/listAll'); ?>" class="btn btn-danger">Cancel</a></td>
                        </div>
                  </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>

      </div>
</div>


