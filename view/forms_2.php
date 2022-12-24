<?php
include '../template/header.php';
include '../insert/generate_F-number.php';
?>

<div class="container-fluid px-4 animated fadeInUp">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Forms</li>
        <li class="active">ฟอร์มย้ายคนข้ามแผนก</li>
    </ol>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Form</h2>
        </div>
        <div class="panel-body">
            <form method="post" id="FORM">
                
                <div class="pull-left">
                    <a style="margin-right: 10px; margin-bottom: 10px; font-weight: 600;">Company Form</a>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form_company" type="radio" name="form_company" id="form_company"
                            value="SKD" required>SKD
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input form_company" type="radio" name="form_company" id="form_company"
                            value="SDM" required>SDM
                    </div>
                </div>

                <table class="table table-bordered" id="TBDATA">
                    <thead>
                        <tr>
                            <th width="20%">รหัสพนักงาน</th>
                            <th width="50%">ชื่อ-สกุล</th>
                            <th width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <input type="hidden" name="create" id="create" value="<?php echo $objResult["Emp_ID"]; ?>" readonly>
                <input type="hidden" name="form_number" id="form_number" value="<?php echo $formB_number; ?>">
                <input type="hidden" name="form_type" id="form_type" value="2" readonly>


                <div class="modal fade" id="approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="approveLabel" aria-hidden="true">
                    <div class=" modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="approveLabel">Please Select Approver</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body form">
                                <div class="form-body">
                                    <div class="form-group col-12 row">
                                        <label>แผนกต้นสังกัด</label>
                                        <div class="col-4">
                                            <select class="form-control" name="CHQ1" id="CHQ1">
                                                <option value=""> Checked 1 </option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="CHQ2" id="CHQ2">
                                                <option value=""> Checked 2 </option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="AP" id="AP">
                                                <option value=""> Approved </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Create" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-xl btn-primary" data-bs-toggle="modal" data-bs-target="#approve">
                    Create
                </button>
            </div>
        </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Create Forms</h2>
        </div>
        <div class="panel-body">

            <form class="grid-form">
                <fieldset>
                    <legend>ข้อมูลพนักงาน</legend>
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>รหัสพนักงาน <span id="error_Emp_ID" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="Emp_ID" id="Emp_ID"
                                oninput="autofillFM47(this.value)">
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
                            <label>แผนก</label>
                            <input class="input-sm text-left" type="text" name="dp_name" id="dp_name" readonly>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสหน่วยงาน</label>
                            <input class="input-sm text-left" type="text" name="sc_code" id="sc_code" readonly>
                        </div>

                    </div>

                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>ชื่อหน่วยงาน</label>
                            <input class="input-sm text-left" type="text" name="sc_name" id="sc_name" readonly>
                        </div>
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
                            <label>ระดับพนักงาน <span id="error_mts_psn_gr" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="mts_psn_gr" id="mts_psn_gr">
                        </div>
                        <div data-field-span="1">
                            <label>ตำแหน่ง <span id="error_mts_pon_name" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="mts_pon_name" id="mts_pon_name">
                        </div>
                        <div data-field-span="1">
                            <label>แผนก <span id="error_mts_dp_name" class="text-danger1"></span></label>
                            <select name="mts_dp_name" id="mts_dp_name">
                                <option value=""> แผนก </option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสหน่วยงาน <span id="error_mts_scc_id" class="text-danger1"></span></label>
                            <select name="mts_scc_id" id="mts_scc_id" required>
                                <option value=""> รหัสหน่วยงาน </option>
                            </select>
                        </div>

                    </div>

                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>ชื่อหน่วยงาน <span id="error_mts_sc_name" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="mts_sc_name" id="mts_sc_name">
                        </div>
                        <div data-field-span="1">
                            <label>ประเภทงาน <span id="error_mts_sc_type" class="text-danger1"></span></label>
                            <select name="mts_sc_type" id="mts_sc_type" required>
                                <option value=""> ประเภทงาน </option>
                                <option value="Admin">Admin</option>
                                <option value="Direct">Direct</option>
                                <option value="In-Direct">In-Direct</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>รหัสศูนย์ต้นทุน <span id="error_mts_cc_id" class="text-danger1"></span></label>
                            <input class="input-sm text-left" type="text" name="mts_cc_id" id="mts_cc_id">
                        </div>
                        <div data-field-span="1">
                            <label>กะเวลาเข้างาน <span id="error_mts_sf_name" class="text-danger1"></span></label>
                            <select name="mts_sf_name" id="mts_sf_name" required>
                                <option value=""> กะเวลาเข้างาน </option>
                                <?php
                                        $hand = $connDB_DBMC->query("SELECT DISTINCT Shift_name FROM shift order by Shift_name");
                                        while ($row = $hand->fetch_array()) {
                                        ?>
                                <option value="<?= $row["Shift_name"] ?>"><?= $row["Shift_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>วันที่มีผลบังคับใช้ <span id="error_eff_date" class="text-danger1"></span></label>
                            <?php $Date_EX  = date("Y-m-d", strtotime("+7 day"));
                                    echo '<input type="text" name="eff_date" id="eff_date" value="' . $Date_EX . '"
                                        readonly />';
                                    ?>

                        </div>
                        <div data-field-span="3"></div>
                    </div>

                    <legend>ผู้บังคับบัญชาโดยตรง</legend>
                    <div data-row-span="3">
                        <div data-field-span="2">
                            <label>รหัสพนักงาน - ชื่อ<span id="error_Supervisor_Code"
                                    class="text-danger1"></span></label>
                            <select name="Supervisor_Code" id="Supervisor_Code" required>
                                <option value="">รหัสพนักงาน</option>
                            </select>
                            <input class="input-sm text-left" type="hidden" name="supname" id="supname">
                        </div>
                        <div data-field-span="1">
                            <label>ตำแหน่ง</label>
                            <input class="input-sm text-left" type="text" name="position" id="position">
                        </div>
                    </div>

                    <legend>สาเหตุการย้าย</legend>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>สาเหตุการย้าย<span id="error_reason"></span></label>
                            <textarea class="input-sm text-left" type="text" name="reason" id="reason"></textarea>
                        </div>
                    </div>
                </fieldset>

                <br />

            </form>




        </div>

        <div class="panel-footer">
            <div class="pull-right">
                <input type="hidden" name="row_id" id="hidden_row_id" />
                <button type="button" name="save" id="save" class="btn btn-xl btn-success">Add</button>
            </div>
        </div>

    </div>




</div>

<?php include '../template/footer.php' ?>

<script src="../assets/plugin/datatables/MTSFM2.js"></script>

<script>
//! 
$(document).ready(function() {

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
                    show_supemp: params.term,
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
    $("#mts_dp_name").select2({
        ajax: {
            url: "../assets/ajax/select2_dp.php",
            type: "POST",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    dep_name: params.term,
                };
            },
            processResults: function(response) {
                return {
                    results: response

                };
            },
            cache: true
        },
    });
    $("#mts_scc_id").select2({

        ajax: {
            url: "../assets/ajax/ajax_sc.php",
            type: "POST",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    SC_ID: $("#mts_dp_name").val()
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
    $("#CHQ1").select2({
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
    $("#CHQ2").select2({
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
                function: "position",
            },
            success: function(data) {
                $("#position").val(data);
            },
        });
    });



});
</script>