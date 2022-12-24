<?php
include '../template/header.php';
?>
<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Inbox</li>
        <li class="active">view</li>
    </ol>

    <div class="panel panel-default">
        <div class="panel-heading"> <i class="ti-pencil"></i>
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

                            include 'mts_info_edit.php';

                            echo'<input type="hidden" name="sal" id="sal" value="'.$row1["SAL"].'">';        

                                    
                        };
                        ?>

                    </tbody>

                </table>

            </form>

        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a class="btn btn-success btn-xl" name="app" id="app" onclick="approveuser(this.id)">Send</a>
                <!-- <button type="button" class="btn btn-xl btn-primary" data-bs-toggle="modal" data-bs-target="#approve">
                    Send
                </button> -->
            </div>
        </div>

        <!-- <div class="modal fade" id="approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="approveLabel" aria-hidden="true">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveLabel">Please Select Approver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body form">
                        <div class="form-body">
                            <label>แผนกต้นสังกัด</label>
                            <br>
                            <div class="col-12">
                                <select class="form-control" name="AP" id="AP">
                                    <option value=""> Approved ( Head of Com )</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-xl" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-success btn-xl" name="app" id="app" onclick="approveuser(this.id)">Send</a>
                    </div>
                </div>
            </div>
        </div> -->

    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Edit</h2>
        </div>
        <div class="panel-body">
            <form class="grid-form">

                <fieldset>
                    <legend>ข้อมูลพนักงาน</legend>
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>รหัสพนักงาน <span id="error_Emp_ID" class="text-danger1"></span></label>
                            <input class="input-sm text-left txt" type="text" name="Emp_ID" id="Emp_ID" readonly>
                        </div>
                        <div data-field-span="3">
                            <label>ชื่อ - สกุล</label>
                            <input class="input-sm text-left" type="text" name="emp_name" id="emp_name" readonly>
                        </div>
                    </div>

                    <legend>สังกัดปัจจุบัน</legend>
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>ระดับพนักงาน</label>
                            <input class="input-sm text-left" type="text" name="psn_gr" id="psn_gr" readonly>
                        </div>
                        <div data-field-span="1">
                            <label>ตำแหน่ง</label>
                            <input class="input-sm text-left" type="text" name="pos_name" id="pos_name" readonly>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสหน่วยงาน</label>
                            <input class="input-sm text-left" type="text" name="sc_code" id="sc_code" readonly>
                        </div>
                        <div data-field-span="1">
                            <label>ชื่อหน่วยงาน</label>
                            <input class="input-sm text-left" type="text" name="sc_name" id="sc_name" readonly>
                        </div>
                    </div>

                    <div data-row-span="3">
                        <div data-field-span="1">
                            <label>ประเภทงาน</label>
                            <input class="input-sm text-left" type="text" name="sc_type" id="sc_type" readonly>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสศูนย์ต้นทุน <span id="error_CostCenter_ID" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="CostCenter_ID" id="CostCenter_ID"
                                readonly>
                        </div>
                        <div data-field-span="1">
                            <label>กะเวลาเข้างาน <span id="error_shift" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="shift" id="shift" readonly>
                        </div>
                    </div>

                    <legend>สังกัดใหม่</legend>
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>ระดับพนักงาน</label>
                            <input class="input-sm text-left" type="text" name="mts_psn_gr" id="mts_psn_gr">
                        </div>
                        <div data-field-span="1">
                            <label>ตำแหน่ง</label>
                            <input class="input-sm text-left" type="text" name="mts_pon_name" id="mts_pon_name">
                        </div>
                        <div data-field-span="1">
                            <label>รหัสหน่วยงาน</label>
                            <select name="mts_scc_id" id="mts_scc_id" require>
                                <option value="">-- รหัสหน่วยงาน --</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>ชื่อหน่วยงาน</label>
                            <input class="input-sm text-left" type="text" name="mts_sc_name" id="mts_sc_name">
                        </div>
                    </div>

                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>ประเภทงาน</label>
                            <select name="mts_sc_type" id="mts_sc_type" required>
                                <option value="">-- ประเภทงาน --</option>
                                <option value="Admin">Admin</option>
                                <option value="Direct">Direct</option>
                                <option value="In-Direct">In-Direct</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสศูนย์ต้นทุน</label>
                            <input class="input-sm text-left" type="text" name="mts_cc_id" id="mts_cc_id">
                        </div>
                        <div data-field-span="1">
                            <label>กะ</label>
                            <select name="mts_sf_name" id="mts_sf_name" required>
                                <option value="">-- กะ --</option>
                                <?php
                                $shift_sql = $connDB_DBMC->query("SELECT DISTINCT Shift_name,Shift_ID FROM shift order by Shift_name");
                                while ($row = $shift_sql->fetch_array()) {
                                ?>
                                <option value="<?= $row["Shift_ID"] ?>"><?= $row["Shift_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <!-- <label>วันที่มีผลบังคับใช้</label>
                            <input type="text" name="eff_date" id="eff_date"readonly /> -->
                        </div>
                    </div>

                    <legend>ผู้บังคับบัญชาโดยตรง</legend>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>รหัสพนักงาน - ชื่อ<span id="error_Supervisor_Code"
                                    class="text-danger1"></span></label>
                            <select name="Supervisor_Code" id="Supervisor_Code" required>
                                <option value="">รหัสพนักงาน</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>ตำแหน่ง</label>
                            <input class="input-sm text-left" type="text" name="position" id="position">
                        </div>
                    </div>

                    <legend>สาเหตุการย้าย</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>สาเหตุการย้าย</label>
                            <textarea class="input-sm text-left" type="text" name="reason" id="reason"></textarea>
                        </div>
                    </div>
                </fieldset>

                <br />
                <br />
                <div class="pull-right">
                    <button type="button" name="save" id="save" class="btn btn-xl btn-success right"
                        onclick="mtsupdate(this.id)">Save</button>
                </div>

            </form>


        </div>

    </div>

    <?php include '../template/footer.php' ?>

    <script>
    function edit(str) {
        if (str.length == 0) {
            document.getElementById("Emp_ID").value = "";
            document.getElementById("emp_name").value = "";
            document.getElementById("psn_gr").value = "";
            document.getElementById("pos_name").value = "";
            document.getElementById("sc_name").value = "";
            document.getElementById("sc_code").value = "";
            document.getElementById("sc_type").value = "";
            document.getElementById("CostCenter_ID").value = "";
            document.getElementById("shift").value = "";

            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);
                    document.getElementById("Emp_ID").value = myObj[0];
                    document.getElementById("emp_name").value = myObj[1];
                    document.getElementById("psn_gr").value = myObj[2];
                    document.getElementById("pos_name").value = myObj[3];
                    document.getElementById("sc_name").value = myObj[4];
                    document.getElementById("sc_code").value = myObj[5];
                    document.getElementById("sc_type").value = myObj[6];
                    document.getElementById("CostCenter_ID").value = myObj[7];
                    document.getElementById("shift").value = myObj[8];
                }
            };

            xmlhttp.open(
                "GET",
                "autofill_form_edit.php?Emp_ID=" + str,
                true
            );

            xmlhttp.send();
        }
    }



    function mtsupdate(id) {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4FC1E9',
            cancelButtonColor: '#E9573F',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                doc_num
                var empid = $("#Emp_ID").val();
                var doc = $("#doc_num").val();
                var psn = $("#mts_psn_gr").val();
                var pon = $("#mts_pon_name").val();
                var scc_id = $("#mts_scc_id").val();
                var sc_type = $("#mts_sc_type").val();
                var cc_id = $("#mts_cc_id").val();
                var sf_name = $("#mts_sf_name").val();
                var scode = $("#Supervisor_Code").val();
                var reason = $("#reason").val();

                var data = {
                    empid: empid,
                    doc: doc,
                    psn: psn,
                    pon: pon,
                    scc_id: scc_id,
                    sc_type: sc_type,
                    cc_id: cc_id,
                    sf_name: sf_name,
                    scode: scode,
                    reason: reason,
                };
                if ($('#mts_psn_gr').val() == "") {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#mts_pon_name').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#mts_scc_id').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#mts_sc_type').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#mts_cc_id').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#mts_sf_name').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#Supervisor_Code').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else if ($('#reason').val() == '') {
                    alert("กรอกข้อมูลไม่ครบ");
                } else {
                    $.ajax({
                        url: "../ApproveFlow/mts_update.php",
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
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Successfully Update'
                            })
                            location.reload();
                        }
                    });
                }



            }
        })
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
                var doc = $("#doc_num").val(); //ส่งค่า [ เลข/ลำดับ เอกสาร ]
                var eid = $("#empid").val(); //ส่งค่า [ Emp ID ]
                var step = $("#step").val(); //ส่งค่า [ step ]
                var role = $("#role").val();

                var data = {
                    doc: doc,
                    step: step,
                    eid: eid,
                    role: role,
                    CHQ: $("#CHQ").val(),
                    AP: $("#AP").val(),
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
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
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
    $(document).ready(function() {


        $(document).on('click', '.edit_data', function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "../ApproveFlow/fetch_data.php",
                method: "POST",
                data: {
                    employee_id: employee_id
                },
                dataType: "json",
                success: function(data) {
                    $('#Emp_ID').val(data.emp_id);
                    $('#mts_psn_gr').val(data.Personal_grade);
                    $('#mts_pon_name').val(data.Position_name);
                    $('#mts_scc_id').val(data.Sectioncode_ID);
                    $('#mts_sc_name').val(data.age);
                    $('#mts_sc_type').val(data.Section_type);
                    $('#mts_cc_id').val(data.CostCenter_ID);
                    $('#mts_sf_name').val(data.Shift_ID);
                    $('#Supervisor_Code').val(data.Supervisor_Code);
                    $('#reason').val(data.reason_tranfer);
                }
            });
        });

        $("#mts_sf_name").select2({});
        $("#mts_sc_type").select2({});

        $("#Supervisor_Code").select2({
            ajax: {
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
            dropdownParent: $("#approve"),
            width: '100%',
            ajax: {
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
        $("#CHQ").select2({
            dropdownParent: $("#approve"),
            width: '100%',
            ajax: {
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

        $("#Supervisor_Code").change(function() {
            var ID_supEmp = $(this).val();

            $.ajax({
                type: "POST",
                url: "../assets/ajax/Ajax_SHSPEMP.php",
                data: {
                    id: ID_supEmp,
                    function: "Supervisor_Code",
                },
                success: function(data) {
                    $("#supname").val(data);
                },
            });
        });

        $("#Supervisor_Code").change(function() {
            var ID_supEmp = $(this).val();

            $.ajax({
                type: "POST",
                url: "../assets/ajax/Ajax_SHSPEMP.php",
                data: {
                    id: ID_supEmp,
                    function: "position",
                },
                success: function(data) {
                    $("#position").val(data);
                },
            });
        });

        $("#mts_scc_id").change(function() {
            var scc_id = $(this).val();

            $.ajax({
                type: "POST",
                url: "../assets/ajax/Ajax_SHSPEMP.php",
                data: {
                    id: scc_id,
                    function: "SHSCNAME",
                },
                success: function(data) {
                    $("#mts_sc_name").val(data);
                },
            });
        });

        //# รหัสหน่วยงาน
        $("#mts_scc_id").select2({
            ajax: {
                url: "../assets/ajax/fm-sc.php",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        SC_ID: $("#sc_code").val()
                    };
                },
                processResults: function(response) {
                    return {
                        results: response

                    };
                },
                cache: true
            }
        });
    });
    </script>