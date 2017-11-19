<?php
$machine_name = "";
$month_price = "";
if(isset($_POST['search'])){
    $_data = $_POST;
    unset($_POST);
    $machine_name = $_data['machine_name'];
    $month_price = $_data['month_price'];
    $get_machine_detail = get_machine_filter_detail($_data);
}
else{
    $get_machine_detail = get_machine_list_detail();
}
?>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row space30">
                    <div class="col-md-6 col-sm-6">
                        <h1 class="main_title">Machine</h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="header_btn text-right">
                            <a class="btn btn-default btn_collapse collapsed" role="button" data-toggle="collapse" href="machine.php?addmachine" aria-expanded="false" aria-controls="collapseProjects"><i class="fa fa-plus" aria-hidden="true"></i> new machine</a>
                        </div>
                    </div>
                </div>
                <?= getMessage(); ?>
                <div class="row">                            
                    <div class="col-md-12">                                
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Machine Name</label>
                                    <input type="text" name="machine_name" class="form-control" value="<?= $machine_name ?>">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Monthly Price</label>
                                    <input type="text" name="month_price" class="form-control" value="<?= $month_price ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" name="search" class="btn btn-default" style='margin-top: 24px'>Search</button>
                                    <button type="submit" name="reset" class="btn btn-default" style='margin-top: 24px;background: #fff;color:#5caf91'>Reset</button>
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
                                        <th>Machine Name</th>
                                        <th>Monthly Price</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $record_count = 0;
                                foreach($get_machine_detail as $data){
                                $record_count++;
                                ?>
                                    <tr>
                                        <td><?= $record_count ?></td>
                                        <td><?= $data['machine_name'] ?></td>
                                        <td><?= $data['month_price'] ?></td>
                                        <td>
                                            <a href="machine.php?editmachine&id=<?= $data['id'] ?>" class="btn btn-default btn-fa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <!-- <a onclick="copy_wo(<?= $data['id'] ?>)" class="btn btn-default btn-fa"><i class="fa fa-files-o" aria-hidden="true"></i></a> -->
                                            <a onclick="delete_machine(<?= $data['id'] ?>)" class="btn btn-default btn-fa delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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