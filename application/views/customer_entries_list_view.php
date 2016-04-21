<div class="row">
    <?php echo $this->breadcrumbs->show(); ?>
    <div class="list-group">
        <a href="<?php echo site_url('customer/listAll'); ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?php echo $title; ?></h4>
        </a>
    </div>
</div>
<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
    <br/>    
    <table id="emp_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Delivery Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item): ?>
                <tr>
                    <td><?php echo $item->account_no; ?></td>
                    <td><?php echo $item->name; ?></td>
                     <td><?php echo $item->cell; ?></td>
                    <td><?php echo $item->message_status; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
