<!DOCTYPE html>
<html lang="en">

<?php 
include '../DB-Config.php';
include '../template/session.php';
include '../template/head.php';
include '../template/menu.php';
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>


            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading">
                    History
                </div>
                <div class="panel-body">
                    <form method="post" id="FORM1">
                        <table class="table table-bordered" id="TB1">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="40%">Form</th>
                                    <th width="20%">Date</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // error_reporting(0);
                                $mts_doc = mysqli_query($connDB_MTS, "SELECT * FROM mts_document as doc
                                INNER JOIN mts_apf as apf ON (doc.Document_num = apf.mtsAP_doc)
                                INNER JOIN mts_fm_name as fn ON (doc.Form_type = fn.Form_id)
                                INNER JOIN mts_status as st ON (apf.mtsAP_status = st.Status_id)
                                WHERE ( mtsAP_empid = '".$objResult["Emp_ID"]."' ) AND ( mtsAP_status = '1' )" );
                                while ($row = $mts_doc->fetch_array()){
                                    $rows[] = $row;
                                };
                                foreach($rows as $row) {
                                    // $md5_doc = md5($row["Document_num"]);
                                    if ($row['Form_id'] == 1 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 1){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 1){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 2){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_CheckedSAL.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 3 && $row['mtsAP_group'] == 2){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Acknowledge.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 4 ){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Edit.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 3){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_CheckHRIS.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 4){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 4){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 0 && $row['mtsAP_group'] == 9){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Req.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 1 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 9){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }
                                    //# APF - 3
                                    elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 1){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 1){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 2){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_CheckedSAL.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 3 && $row['mtsAP_group'] == 2){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Acknowledge.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 5 && $row['mtsAP_group'] == 3){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 3){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 3){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 4){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 4){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 4 ){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Edit.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 5){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_CheckHRIS.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 1 && $row['mtsAP_group'] == 6){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Checked.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }elseif ($row['Form_id'] == 3 && $row['mtsAP_role'] == 2 && $row['mtsAP_group'] == 6){
                                        echo '<tr>
                                            <td>' . $row["Document_num"] .  '</td> 
                                            <td>' . $row["Form_name"] .  '</td> 
                                            <td>' . $row["Date"] .  '</td> 
                                            <td>' . $row["status_name"] .  '</td> 
                                            <td><a class="btn btn-success btn-sm" href="Fl-1_Approve.php?doc_id='.$row["Document_num"].'" >ดูข้อมูล</a></td>
                                        </tr>';
                                    }else{
                                        
                                    }
                                    
                                }
                                mysqli_close($connDB_MTS);
                                mysqli_close($connDB_DBMC);
                                ?>
                            </tbody>

                        </table>

                    </form>

                </div>
                <div class="panel-footer">

                </div>

            </div>
        </div>
    </main>


    <?php include'../template/footer.php'?>