<div class="row">
    <?php echo $this->breadcrumbs->show(); ?>
    <div class="list-group">
        <a href="<?php echo site_url('customer/listAll'); ?>" class="list-group-item">
            <h4 class="list-group-item-heading">All Customer Entries</h4>
            <p class="list-group-item-text">Entries</p>
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
                <th>Cell Number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item): ?>
                <tr>
                    <td><?php echo $item->account_no; ?></td>
                    <td><?php echo $item->name; ?></td>
                    <td ><?php echo $item->email; ?></td>
                    <td><?php echo $item->cell; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php/customer/dashboard/<?php echo $item->customer_id; ?> " class="btn-sm btn-success">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
