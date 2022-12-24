<?php
include '../template/header.php';
?>

<div class="container-fluid px-4">
    <ol class="breadcrumb">
        <li class="">Home</li>
        <li class="active">Report Excel</li>
    </ol>


    <div class="panel panel-default animated fadeInUp">
        <div class="panel-heading"> <i class="ti-receipt"></i>
            Report Excel
        </div>
        <div class="panel-body">
            <form>
                <table class="table table-bordered" id="example" width="auto">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="5%">Company</th>
                            <th width="30%">Form</th>
                            <th width="10%">HR Number</th>
                            <th width="15%">Date</th>
                            <th width="10%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                $sql = $connDB_MTS->query("SELECT * FROM mts_document as doc 
                                INNER JOIN mts_fm_name as fn ON (doc.Form_id = fn.Form_id)
                                WHERE `status` = '4' ORDER BY `Date` ASC");
                                
                                while ($row = $sql->fetch_array()) {
                                    $rows[] = $row;
                                    $i = 1;
                                };
                                foreach ($rows as $row) {
                                    if($row["status"] == 4){
                                        $status = 'Success';
                                    }else{
                                        $status = '-';
                                    };
                                    $date = $row["Date"];
                                    $table = '
                                    <tr>
                                        <td>' . $i++ .  '</td>
                                        <td>' . $row["Form_Company"] .  '</td>
                                        <td>' . $row["Form_name"] .  '</td>
                                        <td>' . $row["HR_Code"] .  '</td>  
                                        <td>' . substr($date,0,10) .  '</td> 
                                        <td>' . $status .  '</td> 
                                        <td><a class="btn btn-success btn-xl" href="view_report.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td> 
                                    </tr>
                                    ';

                                echo $table;
                                    

                                };
                                
                                ?>
                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">

        </div>

    </div>
</div>

<?php include '../template/footer.php' ?>