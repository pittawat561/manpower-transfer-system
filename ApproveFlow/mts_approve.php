<?php
include '../template/header.php';
?>
<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Inbox</li>
        <li class="active">Approve</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading"> <i class="ti-check-box"></i>
            แผนกต้นสังกัด
        </div>
        <div class="panel-body">
            <form>
                <table id="table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
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
                            
                            echo'<input type="hidden" name="sal" id="sal" value="'.$row1["SAL"].'">';      
                        };


                        
                        ?>

                    </tbody>

                </table>


            </form>

        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <?php
                if ($row1['Form_ID'] == '1') {
                    echo '
                            <a class="btn btn-success btn-mb" name="app" id="app" onclick="approveuser(this.id)">Approve</a>
                            <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>';
                } elseif ($row1['Form_ID'] == '2') {
                    echo '<a class="btn btn-success btn-mb" name="app" id="app" onclick="approveuser(this.id)">Approve</a>
                            <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>';
                } elseif ($row1['Form_ID'] == '3') {
                    echo '<a class="btn btn-success btn-mb" name="app" id="app" onclick="approveuser(this.id)">Approve</a>
                            <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>';
                } else {
                }

                ?>
            </div>
        </div>

    </div>
</div>

<?php include '../template/footer.php' ?>

<script>
function approveuser(id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4FC1E9',
        cancelButtonColor: '#E9573F',
        confirmButtonText: 'Yes !'
    }).then((result) => {
        if (result.isConfirmed) {
            var doc = $("#doc_num").val(); //ส่งค่า [ เลข/ลำดับ เอกสาร ]
            var eid = $("#empid").val(); //ส่งค่า [ Emp ID ]
            var step = $("#step").val(); //ส่งค่า [ step ]
            var role = $("#role").val();

            var data = {
                doc: doc,
                step: step,
                eid: eid,
                role: role,
                sal: $("#sal").val()
            };


            $.ajax({
                url: "APF-1.php",
                type: "POST",
                data: {
                    val: id,
                    data: data
                },
                success: function(result) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Added'
                    })
                    window.location.href = "../view/home.php";
                }
            });
        }
    })
}
</script>