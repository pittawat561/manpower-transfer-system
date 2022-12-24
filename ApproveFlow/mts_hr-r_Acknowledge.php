<?php
include '../template/header.php';
?>

<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>HR-RECRUITMENT</li>
        <li class="active">Acknowledge</li>
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
                <?php
                include "../ApproveFlow/role.php";
                if ($row1['Form_ID'] == '1') {
                    if (isset($row1['SAL'])) {
                        echo '<a class="btn btn-success btn-mb" name="app" id="app" onclick="approveuser(this.id)">Acknowledge</a>
                            <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>';
                    } //elseif ($row1['SAL'] == '2') {
                    //     $sql004 = $connDB_DBMC->query("SELECT * FROM employee WHERE Emp_ID = '".$row1['Create_By']."' ");
                    //     $row004 = $sql004->fetch_assoc();
                    //     $name004 = $row004["Emp_ID"].' '.$row004["Empname_engTitle"].' '.$row004["Empname_eng"].' '.$row004["Empsurname_eng"];

                    //     echo '<a type="button" class="btn btn-primary btn-mb" data-bs-toggle="modal" data-bs-target="#myModal">Acknowledge</a>
                    //         <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>
                    
                    //         <div class="modal" id="myModal">
                    //         <div class="modal-dialog modal-dialog-centered modal-lg">
                    //             <div class="modal-content">
                    //                 <div class="modal-header">
                    //                     <h5 class="modal-title">แผนกต้นสังกัด</h5>
                    //                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    //                 </div>
                    //                 <div class="modal-body">
                    //                     <div class="container-fluid">
                    //                         <div class="row">
                    //                             <div class="col-md-6 ">
                    //                                 <label class="form-label required">Requester</label>
                    //                                 <input class="form-control" name="AP" id="AP" value="' . $name004 . '" readonly></input>
                    //                             </div>
                    //                             <div class="col-md-6 ">
                    //                                 <label class="form-label required">Approve</label>
                    //                                 <select class="form-control" name="CK2" id="CK2"></select>
                    //                             </div>
                    //                         </div>
                    //                     </div>
                    //                 </div>
                    //             <div class="modal-footer">
                    //                 <a class="btn btn-primary btn-mb" name="app" id="app" onclick="approveuser(this.id)">
                    //                         Acknowledge </a>
                    //                 <button type="button" class="btn btn-secondary btn-mb" data-bs-dismiss="modal">Close</button>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>';
                    // }
                } elseif ($row1['Form_ID'] == '2') {
                    if ($row1['SAL'] == '1') {
                        echo '<a type="button" class="btn btn-primary btn-mb" data-bs-toggle="modal" data-bs-target="#myModal">Acknowledge</a>
                        <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>
                                  
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">บริษัทที่รับโอน</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label required">Received</label>
                                                    <select class="form-control" name="RECV" id="RECV"></select>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <label class="form-label required">Check 1</label>
                                                    <select class="form-control" name="CK1" id="CK1"></select>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <label class="form-label required">Approve</label>
                                                    <select class="form-control" name="APS" id="APS"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary btn-mb" name="app" id="app" onclick="approveuser(this.id)">
                                            Acknowledge </a>
                                    <button type="button" class="btn btn-secondary btn-mb" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>';
                    } elseif ($row1['SAL'] == '2') {
                        echo '2';
                    }
                } elseif ($row1['Form_ID'] == '3') {
                    echo '<a type="button" class="btn btn-primary btn-mb" data-bs-toggle="modal" data-bs-target="#myModal">Acknowledge</a>
                        <a class="btn btn-danger btn-mb float-end" name="rej" id="rej" onclick="approveuser(this.id)">Rejected</a>
                                  
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">บริษัทที่รับโอน</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label required">Received <br><a style="color:red">Head of Sec.</a></label>
                                                <select class="form-control" name="RECV" id="RECV"></select>
                                            </div>
                                            <div class="col-md-3 ">
                                                <label class="form-label required">Check 1 <br><a style="color:red">Head of Dept.</a></label>
                                                <select class="form-control" name="CK1" id="CK1"></select>
                                            </div>
                                            <div class="col-md-3 ">
                                                <label class="form-label required">Check 2 <br><a style="color:red">Head of Div.</a></label>
                                                <select class="form-control" name="CK2" id="CK2"></select>
                                            </div>
                                            <div class="col-md-3 ">
                                                <label class="form-label required">Approve <br><a style="color:red">Head of Com.</a></label>
                                                <select class="form-control" name="AP" id="AP"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary btn-mb" name="app" id="app" onclick="approveuser(this.id)">
                                        Acknowledge </a>
                                <button type="button" class="btn btn-secondary btn-mb" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>';
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
            var doc = $("#doc_num").val();
            var eid = $("#empid").val();
            var step = $("#step").val();
            var role = $("#role").val();
            var sal = $("#sal").val();
            var create = $("#create").val();
            var CK2 = $("#CK2").val();

            var data = {
                doc: doc,
                step: step,
                eid: eid,
                role: role,
                sal: sal,
                CK2: CK2,
                create: create,
                RECV: $("#RECV").val(),
                CK1: $("#CK1").val(),
                AP: $("#AP").val(),
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

$("#RECV").select2({
    dropdownParent: $("#myModal"),
    width: '100%',
    ajax: {
        // url: "../ApproveFlow/select2-checked.php",
        url: "../assets/ajax/Ajax-SPEMP.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params) {
            return {
                show_supemp: params.term, // search term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,
    },
});
$("#CK1").select2({
    dropdownParent: $("#myModal"),
    width: '100%',
    ajax: {
        // url: "../ApproveFlow/select2-checked.php",
        url: "../assets/ajax/Ajax-SPEMP.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params) {
            return {
                show_supemp: params.term, // search term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,
    },
});
$("#CK2").select2({
    dropdownParent: $("#myModal"),
    width: '100%',
    ajax: {
        // url: "../ApproveFlow/select2-checked.php",
        url: "../assets/ajax/Ajax-SPEMP.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params) {
            return {
                show_supemp: params.term, // search term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,
    },
});
$("#AP").select2({
    dropdownParent: $("#myModal"),
    width: '100%',
    ajax: {
        // url: "../ApproveFlow/select2-checked.php",
        url: "../assets/ajax/Ajax-SPEMP.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params) {
            return {
                show_supemp: params.term, // search term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,
    },
});
$("#APS").select2({
    dropdownParent: $("#myModal"),
    width: '100%',
    ajax: {
        url: "../assets/ajax/Ajax-SPEMP.php",
        // url: "../assets/ajax/Ajax-SPEMP.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params) {
            return {
                APS: params.term, // search term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,
    },
});
</script>