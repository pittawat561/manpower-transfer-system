<?php
include '../template/header.php';
?>

<div class="container-fluid px-4">
<ol class="breadcrumb">
        <li>Home</li>
        <li class="active">HR C&B</li>
    </ol>


    <div class="panel panel-default animated fadeInUp">
        <div class="panel-heading">
            HR C&B
        </div>
        <div class="panel-body">
            <form method="post" id="FORM1">
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
                        // error_reporting(0);
                        $sql = $connDB_MTS->query("SELECT * FROM mts_document as doc 
                                INNER JOIN mts_apf as apf ON (doc.Document_num = apf.mtsAP_doc)
                                INNER JOIN mts_fm_name as fn ON (doc.Form_ID = fn.Form_id)
                                INNER JOIN mts_status as st ON (apf.mtsAP_status = st.Status_id)
                                WHERE ( mtsAP_role = '" . $objResult["Role"] . "' ) AND ( mtsAP_status = '1' )");
                        while ($row = $sql->fetch_array()) {
                            $rows[] = $row;
                            $i = 1;
                        };
                        foreach ($rows as $row) {
                            $table = '<tr><td>' . $i++ .  '</td> <td>' . $row["Form_name"] .  '</td> <td>' . $row["Date"] .  '</td> <td>' . $row["status_name"] .  '</td> ';
                            if ($row['mtsAP_role'] == 8) {
                                echo $table . '<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_hrcb_edit.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                            } elseif ($row['mtsAP_role'] == 9) {
                                echo $table . '<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_hrcb_check.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                            } elseif ($row['mtsAP_role'] == 10) {
                                echo $table . '<td><a class="btn btn-success btn-xl" href="../ApproveFlow/mts_hrcb_approve.php?doc_id=' . $row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td></tr>';
                            }
                        }
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