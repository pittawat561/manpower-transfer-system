<?php
include '../template/header.php';
$doc_num = $_GET["doc_id"];
?>
<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li class="active">View</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading">
            ดูข้อมูล
            <div class="float-end">
                <!-- <button type="button" name="export" id="export" class="btn btn-xl btn-success right" -->
                <!-- onclick="xls(this.id)">export</button> -->
                <!-- <form method="post" action="report_v1.php">
                    <input type="hidden" name="doc" id="doc" value="<?php echo $doc_num;?>">
                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                </form> -->
            </div>
        </div>
        <div class="panel-body">

            <form>
                <table id="example1" class="table table-bordered">
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
                        ?>

                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">
            <div>

            </div>
        </div>

    </div>
</div>

<?php include '../template/footer.php' ?>

<script>
// function xls(id) {
//     $.ajax({
//         url: "exportxls.php",
//         type: "POST",
//         data: {
//             val: id,
//         },
//     });
// };

// $(document).ready(function() {
//     $('#example1').DataTable({});


// });
</script>