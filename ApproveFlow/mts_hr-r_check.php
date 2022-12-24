<?php
include '../template/header.php';
?>
<style>
.hide {
    display: none;
}
</style>

<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>HR-RECRUITMENT</li>
        <li class="active">view</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading"> <i class="ti-check-box"></i>
            HR-RECRUITMENT
        </div>
        <div class="panel-body">
            <form>
                <table id="table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="20%">Employee Code</th>
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

                            include 'mts_info.php';
                            
                                    
                        };

                        
                        ?>

                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-mb" data-bs-toggle="modal"
                    data-bs-target="#myModal">Send</button>
                <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick='approveuser(this.id)'>
                    Rejected </a>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Check SAL Plan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="sal" name="sal" value="1" onclick="show()" /> Follow

                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="sal" name="sal" value="2" onclick="show()" /> Over
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div id="hidenmodal" class="hide">
                                <?php
                                if ($row1['Form_ID'] == '1') {
                                    echo '<a class="btn btn-success btn-mb float-end" name="app" id="app" onclick="approveuser(this.id)">Send</a>';
                                } elseif ($row1['Form_ID'] == '2') {
                                    echo '<a class="btn btn-success btn-mb float-end" name="app" id="app" onclick="approveuser(this.id)">Send</a>';
                                } elseif ($row1['Form_ID'] == '3') {
                                    echo '<a class="btn btn-success btn-mb float-end" name="app" id="app" onclick="approveuser(this.id)">Send</a>';
                                };
                                ?>
                                <button type="button" class="btn btn-secondary btn-mb float-end"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</main>


<?php include '../template/footer.php' ?>


<script>
function show() {
    document.getElementById('hidenmodal').style.display = 'block';
}

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
            var sal = $(".sal:checked").val(); //ส่งค่า [ sal ]
            var doc = $("#doc_num").val(); //ส่งค่า [ เลข/ลำดับ เอกสาร ]
            var eid = $("#empid").val(); //ส่งค่า [ Emp ID ]
            var step = $("#step").val(); //ส่งค่า [ step ]
            var role = $("#role").val();

            var data = {
                doc: doc,
                step: step,
                eid: eid,
                role: role,
                sal: sal
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
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
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