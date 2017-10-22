<?php
$start_date = "";
$end_date = "";
$ampl_part_no = "";
if(isset($_POST['search'])){
    $_data = $_POST;
    unset($_POST);
    $start_date = $_data['start_date'];
    $end_date = $_data['end_date'];
    $ampl_part_no = $_data['ampl_part_no'];
    $get_wo_detail = get_wo_filter_detail($_data);
}
else{
    $get_wo_detail = get_wo_list_detail();
}
?>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row space30">
                    <div class="col-md-6 col-sm-6">
                        <h1 class="main_title">Work Order</h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="header_btn text-right">
                            <a class="btn btn-default btn_collapse collapsed" role="button" data-toggle="collapse" href="work_order.php?addwo" aria-expanded="false" aria-controls="collapseProjects"><i class="fa fa-plus" aria-hidden="true"></i> new workorder</a>
                        </div>
                    </div>
                </div>
                <?= getMessage(); ?>
                <div class="row">                            
                    <div class="col-md-12">                                
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Select Date Range</label>
                                    <div id="reportrange" class="date_range_picker" class="pull-right">
                                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                        <span><?= $start_date." - ".$end_date ?></span> <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                                        <input type="hidden" id="start_date" name="start_date" value="<?= $start_date ?>">
                                        <input type="hidden" id="end_date" name="end_date" value="<?= $end_date ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>AMPL Part No.</label>
                                    <input type="text" name="ampl_part_no" class="form-control" value="<?= $ampl_part_no ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="display: block;">&nbsp;</label>
                                    <button type="submit" name="search" class="btn btn-default">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered custom_table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>AMPL Part No.</th>
                                        <th>Rod Size</th>
                                        <th>Drawing No</th>
                                        <th>Created At</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $record_count = 0;
                                foreach($get_wo_detail as $data){
                                $record_count++;
                                ?>
                                    <tr>
                                        <td><?= $record_count ?></td>
                                        <td><?= $data['ampl_part_no'] ?></td>
                                        <td><?= $data['rod_size'] ?></td>
                                        <td><?= $data['drawing_no'] ?></td>
                                        <td><?= $data['audit_created_date'] ?></td>
                                        <td>
                                            <a href="work_order.php?editwo&id=<?= $data['id'] ?>" class="btn btn-default btn-fa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a onclick="copy_wo(<?= $data['id'] ?>)" class="btn btn-default btn-fa"><i class="fa fa-files-o" aria-hidden="true"></i></a>
                                            <a onclick="delete_wo(<?= $data['id'] ?>)" class="btn btn-default btn-fa delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>