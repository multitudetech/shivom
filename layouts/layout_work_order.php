<?php
$get_wo_detail = get_wo_list_detail();
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
                            <a class="btn btn-default btn_collapse collapsed" role="button" data-toggle="collapse" href="" aria-expanded="false" aria-controls="collapseProjects"><i class="fa fa-plus" aria-hidden="true"></i> new workorder</a>
                        </div>
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
                                            <a href="edit-project.html" class="btn btn-default btn-fa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-default btn-fa"><i class="fa fa-files-o" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-default btn-fa delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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