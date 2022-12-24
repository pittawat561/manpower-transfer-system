<?php
include '../template/header.php';
?>

<div class="container-fluid px-4">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Report Excel</li>
        <li class="active">View Report</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading"> <i class="ti-check-box"></i>
            View Report
        </div>
        <div class="panel-body">
            <form>
                <table id="datatable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Emp Code</th>
                            <th width="50%">Name - Lastname</th>
                            <th width="30%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $doc = $_GET["doc_id"];

                        $empdata1 = $connDB_MTS->query("SELECT * FROM mts_employee AS emp
                        INNER JOIN mts_previousinfo AS pre ON emp.Document_num = pre.Document_num AND emp.Emp_ID = pre.emp_id
                        INNER JOIN mts_document AS doc ON emp.Document_num = doc.Document_num
                        WHERE emp.Document_num='$doc'");
                        while ($row1 = $empdata1->fetch_assoc()) {
                            $rows1[] = $row1;
                            $i = 1;
                        };
                        
                        foreach ($rows1 as $row1) {

                            include '../ApproveFlow/mts_info.php';
                            
                        
                                    
                        };

                        $form_id = $row1['Form_ID'];
                        if($form_id == 1){
                            $F_ID = 'report_v1';
                        }elseif($form_id == 3){
                            $F_ID = 'report_3';
                        };
                        ?>
                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <form method="post" action="<?php echo $F_ID; ?>.php">
                    <input type="hidden" name="doc" id="doc" value="<?php echo $doc;?>">
                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                </form>
            </div>
        </div>

    </div>
</div>

<?php include '../template/footer.php' ?>