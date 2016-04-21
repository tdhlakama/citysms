<!-- Page Heading -->
<div class="row">
    <?php echo $this->breadcrumbs->show(); ?>
</div>
<!-- /.row -->

<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
       <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">All Customer Entries</a></li>
        <li><a data-toggle="tab" href="#sectionB">Unsent Entries </a></li>
           <li><a data-toggle="tab" href="#sectionC">Sent Entries </a></li>
    </ul>

    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <div class="panel-body">
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
        </div>
        <div id="sectionB" class="tab-pane fade">
            <div class="panel-body">
                <table id="emp_table1" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Account No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Delivery Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($unsentlist as $item): ?>
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
        </div>
        <div id="sectionC" class="tab-pane fade">
            <div class="panel-body">
                <table id="emp_table2" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Account No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Delivery Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sentlist as $item): ?>
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
        </div>
    </div>

</div>
