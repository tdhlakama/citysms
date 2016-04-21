<div class="row">
    <?php echo $this->breadcrumbs->show(); ?>
</div>
<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customers
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row colbox">

                            <div class="col-lg-4 col-sm-4">
                                <label for="account_no" class="control-label">Account No</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <?php echo $emp->account_no; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="name" class="control-label">Name</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <?php echo $emp->name; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="email" class="control-label">Email</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <?php echo $emp->email; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="cell" class="control-label">Cell</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <?php echo $emp->cell; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Balances For Months
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($balancelist as $i => $item): ?>
                            <tr>

                                <td><?php echo($i + 1) ?></td>
                                <td><?php echo $balancelist[$i]->monthname ?></td>
                                <td><?php echo $balancelist[$i]->year ?></td>
                                <td><?php echo $balancelist[$i]->balance ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

    <a href="<?php echo base_url(); ?>index.php/customer/sendSMS" class="btn-sm btn-success">Send SMS</a>

</div>

