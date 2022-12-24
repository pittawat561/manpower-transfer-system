<?php
include '../template/header.php';
?>

<div class="container-fluid px-4">
    <ol class="breadcrumb">
        <li class="">Home</li>
        <li class="">Approve</li>
        <li class="active">Inbox</li>
    </ol>


    <div class="panel panel-default animated fadeInUp">
        <div class="panel-heading"> <i class="ti-email"></i>
            แผนกต้นสังกัด
        </div>
        <div class="panel-body">
            <form>
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="40%">Form</th>
                            <th width="20%">Date</th>
                            <th width="10%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                $sql = $connDB_MTS->query("SELECT * FROM mts_document as doc 
                                INNER JOIN mts_apf as apf ON (doc.Document_num = apf.mtsAP_doc)
                                INNER JOIN mts_fm_name as fn ON (doc.Form_id = fn.Form_id)
                                INNER JOIN mts_status as st ON (apf.mtsAP_status = st.Status_id)
                                WHERE apf.mtsAP_empid = '".$objResult["Emp_ID"]."' AND apf.mtsAP_status = '1' ORDER BY apf.mtsAP_datetime ASC");
                                
                                
                                
                                while ($row = $sql->fetch_array()) {
                                    $rows[] = $row;
                                    $i = 1;
                                };
                                foreach ($rows as $row) {
                                    $table = '
                                    <tr>
                                        <td>' . $i++ .  '</td> 
                                        <td>' . $row["Form_name"] .  '</td> 
                                        <td>' . $row["Date"] .  '</td> 
                                        <td>' . $row["status_name"] .  '</td> 
                                    
                                     ';

                                    if(isset($row)){
                                        
                                        if($row['mtsAP_role'] == 1 && $row['Form_ID'] == 1){
                                            if($row['mtsAP_step'] == 1){
                                                echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_check.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                            }elseif($row['mtsAP_step'] == 2){
                                                echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                            }elseif($row['mtsAP_step'] == 0){
                                                echo $table.'<td><a class="btn btn-warning btn-xl" href="../ApproveFlow/mts_edit_f3.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-pencil"></i> Edit</a></td></tr>';
                                            }elseif($row['mtsAP_step'] == 5){
                                                echo $table.'<td><a class="btn btn-warning btn-xl" href="../ApproveFlow/mts_edit.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-pencil"></i> Edit</a></td></tr>';
                                            }elseif($row['mtsAP_step'] == 6){
                                                 echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                            };
                                        }elseif($row['mtsAP_role'] == 11){
                                            echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_check.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                        }elseif($row['mtsAP_role'] == 13){
                                            echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                        }elseif($row['mtsAP_role'] == 16){
                                            echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                        };
                                        if($row['mtsAP_role'] == 1 && $row['Form_ID'] == 3){
                                           
                                            if($row['mtsAP_group'] == 1){
                                                if($row['mtsAP_step'] == 3){
                                                    echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                                }elseif($row['mtsAP_step'] == 0){
                                                    echo $table.'<td><a class="btn btn-warning btn-xl" href="../ApproveFlow/mts_edit_f3.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-pencil"></i> Edit</a></td></tr>';
                                                }else{
                                                    echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_check.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                                };
                                            };

                                            if($row['mtsAP_group'] == 9){
                                                
                                               if($row['mtsAP_step'] == 9){
                                                echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_com_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                               }elseif($row['mtsAP_step'] == 6){
                                                echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_com_received.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                               }else{
                                                echo $table.'<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_com_check.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                                               };
                                            };
                                        };
                                        
                                    }

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