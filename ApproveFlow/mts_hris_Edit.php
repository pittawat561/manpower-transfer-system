<?php
include '../template/header.php';
?>

<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>HRIS</li>
        <li class="active">edit</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading"> <i class="ti-check-box"></i>
            HRIS
        </div>
        <div class="panel-body">
            <form>
                <table id="table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Employee ID</th>
                            <th width="50%">Name-Lastname</th>
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

                            include 'mts_info.php';
                        
                            echo'<input type="hidden" name="sal" id="sal" value="'.$row1["SAL"].'">';        
                        };
                        ?>

                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a class="btn btn-success btn-mb" name="app" id="app" onclick='approveuser(this.id)'>
                    Send </a>
                <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick='rej(this.id)'>
                    Rejected </a>
            </div>
        </div>

    </div>
</div>

<?php include '../template/footer.php' ?>


<script>
function approveuser(id) {
    Swal.fire({
        title: 'เลขที่ HR',
        input: 'textarea',
        inputLabel: 'สำหรับเจ้าหน้าที่ HR',
    }).then(function(HRCode) {
        if (HRCode.value) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4FC1E9',
                cancelButtonColor: '#E9573F',
                confirmButtonText: 'Yes !',
            }).then((result) => {
                if (result.isConfirmed) {
                    var doc = $("#doc_num").val();
                    var eid = $("#empid").val();
                    var step = $("#step").val();
                    var role = $("#role").val();
                    var HrCode = (HRCode.value);

                    var data = {
                        doc: doc,
                        step: step,
                        eid: eid,
                        role: role,
                        HrCode: HrCode,
                        sal: $("#sal").val(),
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
                            $('#myModal').modal('hide');
                            window.location.href = "../view/home.php";
                        }
                    });
                }
            })

        }
    })
}

function rej(id) {

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4FC1E9',
        cancelButtonColor: '#E9573F',
        confirmButtonText: 'Yes !',
    }).then((result) => {
        if (result.isConfirmed) {
            var doc = $("#doc_num").val();
            var eid = $("#empid").val();
            var step = $("#step").val();
            var role = $("#role").val();

            var data = {
                doc: doc,
                step: step,
                eid: eid,
                role: role,
                sal: $("#sal").val(),
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
                    $('#myModal').modal('hide');
                    window.location.href = "../view/home.php";
                }
            });
        }
    })


}
</script>