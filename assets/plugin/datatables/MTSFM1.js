// ! [ DATA TABLE ]
$(document).ready(function() {
    var count = 0;

    $("#save").click(function() {
        var error_Emp_ID = "";
        var error_mts_psn_gr = "";
        var error_mts_pon_name = "";
        var error_mts_scc_id = "";
        var error_mts_sc_type = "";
        var error_mts_cc_id = "";
        var error_mts_sf_name = "";
        var error_Supervisor_Code = "";
        var Emp_ID = "";
        var emp_name = "";
        var psn_gr = "";
        var pos_name = "";
        var sc_name = "";
        var sc_code = "";
        var sc_type = "";
        var CostCenter_ID = "";
        var shift = "";
        var mts_psn_gr = "";
        var mts_pon_name = "";
        var mts_sc_name = "";
        var mts_scc_id = "";
        var mts_sc_type = "";
        var mts_cc_id = "";
        var mts_sf_name = "";
        var eff_date = "";
        var Supervisor_Code = "";
        var supname = "";
        var reason = "";

        if ($("#Emp_ID").val() == "") {
            error_Emp_ID = "*";
            $("#error_Emp_ID").text(error_Emp_ID);
            $("#Emp_ID").css("border-color", "#dd191d");
            Emp_ID = "";
        } else {
            error_Emp_ID = "";
            $("#error_Emp_ID").text(error_Emp_ID);
            $("#Emp_ID").css("border-color", "#dd191d");
            Emp_ID = $("#Emp_ID").val();
        }
        if ($("#emp_name").val() == "") {
            $("#emp_name");
            emp_name = "";
        } else {
            $("#emp_name");
            emp_name = $("#emp_name").val();
        }
        if ($("#psn_gr").val() == "") {
            $("#psn_gr");
            psn_gr = "";
        } else {
            $("#psn_gr");
            psn_gr = $("#psn_gr").val();
        }
        if ($("#pos_name").val() == "") {
            $("#pos_name");
            pos_name = "";
        } else {
            $("#pos_name");
            pos_name = $("#pos_name").val();
        }
        if ($("#sc_name").val() == "") {
            $("#sc_name");
            sc_name = "";
        } else {
            $("#sc_name");
            sc_name = $("#sc_name").val();
        }
        if ($("#sc_code").val() == "") {
            $("#sc_code");
            sc_code = "";
        } else {
            $("#sc_code");
            sc_code = $("#sc_code").val();
        }
        if ($("#sc_type").val() == "") {
            $("#sc_type");
            sc_type = "";
        } else {
            $("#sc_type");
            sc_type = $("#sc_type").val();
        }
        if ($("#CostCenter_ID").val() == "") {
            $("#CostCenter_ID");
            CostCenter_ID = "";
        } else {
            $("#CostCenter_ID");
            CostCenter_ID = $("#CostCenter_ID").val();
        }
        if ($("#shift").val() == "") {
            $("#shift");
            shift = "";
        } else {
            $("#shift");
            shift = $("#shift").val();
        }
        if ($("#mts_psn_gr").val() == "") {
            error_mts_psn_gr = "*";
            $("#error_mts_psn_gr").text(error_mts_psn_gr);
            $("#mts_psn_gr").css("border-color", "#dd191d");
            mts_psn_gr = "";
        } else {
            error_mts_psn_gr = "";
            $("#error_mts_psn_gr").text(error_mts_psn_gr);
            $("#mts_psn_gr").css("border-color", "");
            mts_psn_gr = $("#mts_psn_gr").val();
        }
        if ($("#mts_pon_name").val() == "") {
            error_mts_pon_name = "*";
            $("#error_mts_pon_name").text(error_mts_pon_name);
            $("#mts_pon_name").css("border-color", "#dd191d");
            mts_pon_name = "";
        } else {
            error_mts_pon_name = "";
            $("#error_mts_pon_name").text(error_mts_pon_name);
            $("#mts_pon_name").css("border-color", "");
            mts_pon_name = $("#mts_pon_name").val();
        }
        if ($("#mts_sc_name").val() == "") {
            $("#mts_sc_name").css("border-color", "#dd191d");
            mts_sc_name = "";
        } else {
            $("#mts_sc_name").css("border-color", "");
            mts_sc_name = $("#mts_sc_name").val();
        }
        if ($("#mts_scc_id").val() == "") {
            error_mts_scc_id = "*";
            $("#error_mts_scc_id").text(error_mts_scc_id);
            $("#mts_scc_id").css("border-color", "#dd191d");
            mts_scc_id = "";
        } else {
            error_mts_scc_id = "";
            $("#error_mts_scc_id").text(error_mts_scc_id);
            $("#mts_scc_id").css("border-color", "");
            mts_scc_id = $("#mts_scc_id").val();
        }
        if ($("#mts_sc_type").val() == "") {
            error_mts_sc_type = "*";
            $("#error_mts_sc_type").text(error_mts_sc_type);
            $("#mts_sc_type").css("border-color", "#dd191d");
            mts_sc_type = "";
        } else {
            error_mts_sc_type = "";
            $("#error_mts_sc_type").text(error_mts_sc_type);
            $("#mts_sc_type").css("border-color", "");
            mts_sc_type = $("#mts_sc_type").val();
        }
        if ($("#mts_cc_id").val() == "") {
            error_mts_cc_id = "*";
            $("#error_mts_cc_id").text(error_mts_cc_id);
            $("#mts_cc_id").css("border-color", "#dd191d");
            mts_cc_id = "";
        } else {
            error_mts_cc_id = "";
            $("#error_mts_cc_id").text(error_mts_cc_id);
            $("#mts_cc_id").css("border-color", "");
            mts_cc_id = $("#mts_cc_id").val();
        }
        if ($("#mts_sf_name").val() == "") {
            error_mts_sf_name = "*";
            $("#error_mts_sf_name").text(error_mts_sf_name);
            $("#mts_sf_name").css("border-color", "#dd191d");
            mts_sf_name = "";
        } else {
            error_mts_sf_name = "";
            $("#error_mts_sf_name").text(error_mts_sf_name);
            $("#mts_sf_name").css("border-color", "");
            mts_sf_name = $("#mts_sf_name").val();
        }
        if ($("#eff_date").val() == "") {
            $("#eff_date").css("border-color", "#dd191d");
            eff_date = "";
        } else {
            $("#eff_date").css("border-color", "");
            eff_date = $("#eff_date").val();
        }
        if ($("#Supervisor_Code").val() == "") {
            error_Supervisor_Code = "*";
            $("#error_Supervisor_Code").text(error_Supervisor_Code);
            $("#Supervisor_Code").css("border-color", "#dd191d");
            Supervisor_Code = "";
        } else {
            error_Supervisor_Code = "";
            $("#error_Supervisor_Code").text(error_Supervisor_Code);
            $("#Supervisor_Code").css("border-color", "");
            Supervisor_Code = $("#Supervisor_Code").val();
        }
        if ($("#supname").val() == "") {
            error_supname = "*";
            $("#error_supname").text(error_supname);
            $("#supname").css("border-color", "#dd191d");
            supname = "";
        } else {
            error_supname = "";
            $("#error_supname").text(error_supname);
            $("#supname").css("border-color", "");
            supname = $("#supname").val();
        }
        if ($("#reason").val() == "") {
            $("#reason").css("border-color", "#dd191d");
            reason = "";
        } else {
            $("#reason").css("border-color", "");
            reason = $("#reason").val();
        }

        if (
            error_Emp_ID != "" ||
            error_mts_psn_gr != "" ||
            error_mts_pon_name != "" ||
            error_mts_scc_id != "" ||
            error_mts_sc_type != "" ||
            error_mts_cc_id != "" ||
            error_mts_sf_name != "" ||
            error_Supervisor_Code != "" ||
            error_supname != ""
        ) {
            return false;
        } else {
            if ($("#save").text() == "Add") {
                count = count + 1;

                output = '<tr id="row_' + count + '">';

                output +=
                    '<td class="txt">' +
                    Emp_ID +
                    ' <input type="hidden" name="hidden_Emp_ID[]" id="Emp_ID' +
                    count +
                    '" class="Emp_ID" value="' +
                    Emp_ID +
                    '" /></td>';

                output +=
                    "<td>" +
                    emp_name +
                    ' <input type="hidden" name="hidden_emp_name[]" id="emp_name' +
                    count +
                    '" value="' +
                    emp_name +
                    '" /></td>';

                output +=
                    '<td><a class="btn btn-success btn-sm" data-bs-toggle="collapse" href="#cs_' +
                    count +
                    '"role="button" aria-expanded="false" aria-controls="cs_' +
                    count +
                    '">ดูข้อมูล</a>  <button type="button" name="remove_details" class="btn btn-danger btn-sm remove_details" id="' +
                    count +
                    '">ลบ</button></td>';

                output += '<tr class="collapse" id="cs_' + count + '">';
                output += '<td colspan="3">';

                output += '<div class="row col-12">';
                output += '<div class="col-3">';
                output +=
                    "<label>ระดับพนักงาน: <a>" +
                    mts_psn_gr +
                    ' <input type="hidden" name="hidden_mts_psn_gr[]" id="mts_psn_gr' +
                    count +
                    '" class="mts_psn_gr" value="' +
                    mts_psn_gr +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    psn_gr +
                    '</a><input type="hidden" name="hidden_psn_gr[]" id="psn_gr' +
                    count +
                    '" class="psn_gr" value="' +
                    psn_gr +
                    '" /></p>';
                output +=
                    "<label>ประเถทงาน: <a>" +
                    mts_sc_type +
                    ' <input type="hidden" name="hidden_mts_sc_type[]" id="mts_sc_type' +
                    count +
                    '" class="mts_sc_type" value="' +
                    mts_sc_type +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    sc_type +
                    '</a><input type="hidden" name="hidden_sc_type[]" id="sc_type' +
                    count +
                    '" class="sc_type" value="' +
                    sc_type +
                    '" /></p>';

                output += "</div>";
                output += '<div class="col-3">';
                output +=
                    "<label>ตำแหน่ง: <a>" +
                    mts_pon_name +
                    ' <input type="hidden" name="hidden_mts_pon_name[]" id="mts_pon_name' +
                    count +
                    '" class="mts_pon_name" value="' +
                    mts_pon_name +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    pos_name +
                    '</a><input type="hidden" name="hidden_pos_name[]" id="pos_name' +
                    count +
                    '" class="pos_name" value="' +
                    pos_name +
                    '" /></p>';
                output +=
                    "<label>รหัสศูนย์ต้นทุน: <a>" +
                    mts_cc_id +
                    ' <input type="hidden" name="hidden_mts_cc_id[]" id="mts_cc_id' +
                    count +
                    '" class="mts_cc_id" value="' +
                    mts_cc_id +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    CostCenter_ID +
                    '</a><input type="hidden" name="hidden_CostCenter_ID[]" id="CostCenter_ID' +
                    count +
                    '" class="CostCenter_ID" value="' +
                    CostCenter_ID +
                    '" /></p>';

                output += "</div>";
                output += '<div class="col-3">';
                output +=
                    "<label>ชื่อหน่วยงาน: <a>" +
                    mts_sc_name +
                    ' <input type="hidden" name="hidden_mts_sc_name[]" id="mts_sc_name' +
                    count +
                    '" class="mts_sc_name" value="' +
                    mts_sc_name +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    sc_name +
                    '</a><input type="hidden" name="hidden_sc_name[]" id="sc_name' +
                    count +
                    '" class="sc_name" value="' +
                    sc_name +
                    '" /></p>';
                output +=
                    "<label>กะเวลาเข้างาน: <a>" +
                    mts_sf_name +
                    ' <input type="hidden" name="hidden_mts_sf_name[]" id="mts_sf_name' +
                    count +
                    '" class="mts_sf_name" value="' +
                    mts_sf_name +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    shift +
                    '</a><input type="hidden" name="hidden_shift[]" id="shift' +
                    count +
                    '" class="shift" value="' +
                    shift +
                    '" /></p>';
                output += "</div>";
                output += '<div class="col-3">';
                output +=
                    "<label>รหัสหน่วยงาน: <a>" +
                    mts_scc_id +
                    ' <input type="hidden" name="hidden_mts_scc_id[]" id="mts_scc_id' +
                    count +
                    '" class="mts_scc_id" value="' +
                    mts_scc_id +
                    '" /></a></label>';
                output +=
                    "<p>" +
                    sc_code +
                    '</a><input type="hidden" name="hidden_sc_code[]" id="sc_code' +
                    count +
                    '" class="sc_code" value="' +
                    sc_code +
                    '" /></p>';
                output +=
                    "<label>วันที่มีผลบังคับใช้: <a>" +
                    eff_date +
                    ' <input type="hidden" name="hidden_eff_date[]" id="eff_date' +
                    count +
                    '" class="eff_date" value="' +
                    eff_date +
                    '" /></a></label>';
                output += "</div>";
                output += "</div>";

                output += '<div class="row col-12">';

                output += '<div class="col-12">';
                output +=
                    "<label>สาเหตุการย้าย: <a>" +
                    reason +
                    ' <input type="hidden" name="hidden_reason[]" id="reason' +
                    count +
                    '" class="reason" value="' +
                    reason +
                    '" /></a></label>';
                output += "</div>";
                output += "</div><hr>";
                output += "<h6>ผู้บังคับบัญชา</h6>";
                output += '<div class="row col-12">';
                output += '<div class="col-3">';
                output +=
                    "<label>รหัสพนักงาน: <a>" +
                    Supervisor_Code +
                    ' <input type="hidden" name="hidden_Supervisor_Code[]" id="Supervisor_Code' +
                    count +
                    '" class="Supervisor_Code" value="' +
                    Supervisor_Code +
                    '" /></a></label>';
                output += "</div>";
                output += '<div class="col-9">';
                output +=
                    "<label>ชื่อ-สกุล: <a>" +
                    supname +
                    ' <input type="hidden" name="hidden_supname[]" id="supname' +
                    count +
                    '" class="supname" value="' +
                    supname +
                    '" /></a></label>';
                output += "</div>";
                output += "</div><hr>";
                output += "</td>";
                output += "</tr>";
                output += "</tr>";


                $("#TB1").append(output);
            } else {
                var row_id = $("#hidden_row_id").val();
                output =
                    "<td>" +
                    Emp_ID +
                    ' <input type="hidden" name="hidden_Emp_ID[]" id="Emp_ID' +
                    row_id +
                    '" class="Emp_ID" value="' +
                    Emp_ID +
                    '" /></td>';

                output +=
                    "<td>" +
                    emp_name +
                    ' <input type="hidden" name="hidden_emp_name[]" id="emp_name' +
                    row_id +
                    '" value="' +
                    emp_name +
                    '" /></td>';

                output +=
                    '<td><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#cs_' +
                    row_id +
                    '"role="button" aria-expanded="false" aria-controls="cs_' +
                    row_id +
                    '">Link</a><button type="button" name="view_details" class="btn btn-warning btn-sm view_details" id="' +
                    row_id +
                    '">View</button> | <button type="button" name="remove_details" class="btn btn-danger btn-sm remove_details" id="' +
                    row_id +
                    '">Remove</button></td>';

                $("#row_" + row_id + "").html(output);

            }

            $("#Emp_ID").val("");
            $("#emp_name").val("");
            $("#psn_gr").val("");
            $("#pos_name").val("");
            $("#sc_name").val("");
            $("#sc_code").val("");
            $("#sc_type").val("");
            $("#CostCenter_ID").val("");
            $("#shift").val("");
            $("#mts_psn_gr").val("");
            $("#mts_pon_name").val("");
            $("#mts_company").val("");
            $("#mts_dp_name").val("");
            $("#mts_sc_name").val("");
            $("#mts_scc_id").val(null).trigger('change');
            $("#mts_sc_type").val(null).trigger('change');
            $("#mts_cc_id").val("");
            $("#mts_sf_name").val(null).trigger('change');
            $("#Supervisor_Code").val(null).trigger('change');
            $("#supname").val("");
            $("#reason").val("");
        }
    });

    $(document).on("click", ".view_details", function() {
        var row_id = $(this).attr("id");
        var Emp_ID = $("#Emp_ID" + row_id + "").val();
        var emp_name = $("#emp_name" + row_id + "").val();
        var psn_gr = $("#psn_gr" + row_id + "").val();
        var pos_name = $("#pos_name" + row_id + "").val();
        var sc_name = $("#sc_name" + row_id + "").val();
        var sc_code = $("#sc_code" + row_id + "").val();
        var sc_type = $("#sc_type" + row_id + "").val();
        var CostCenter_ID = $("#CostCenter_ID" + row_id + "").val();
        var shift = $("#shift" + row_id + "").val();
        var mts_psn_gr = $("#mts_psn_gr" + row_id + "").val();
        var mts_pon_name = $("#mts_pon_name" + row_id + "").val();
        var mts_sc_name = $("#mts_sc_name" + row_id + "").val();
        var mts_scc_id = $("#mts_scc_id" + row_id + "").val();
        var mts_sc_type = $("#mts_sc_type" + row_id + "").val();
        var mts_cc_id = $("#mts_cc_id" + row_id + "").val();
        var mts_sf_name = $("#mts_sf_name" + row_id + "").val();
        var eff_date = $("#eff_date" + row_id + "").val();
        var Supervisor_Code = $("#Supervisor_Code" + row_id + "").val();
        var supname = $("#supname" + row_id + "").val();
        var reason = $("#reason" + row_id + "").val();
        $("#Emp_ID").val(Emp_ID);
        $("#emp_name").val(emp_name);
        $("#psn_gr").val(psn_gr);
        $("#pos_name").val(pos_name);
        $("#sc_name").val(sc_name);
        $("#sc_code").val(sc_code);
        $("#sc_type").val(sc_type);
        $("#CostCenter_ID").val(CostCenter_ID);
        $("#shift").val(shift);
        $("#mts_psn_gr").val(mts_psn_gr);
        $("#mts_pon_name").val(mts_pon_name);
        $("#mts_sc_name").val(mts_sc_name);
        $("#mts_scc_id").val(mts_scc_id);
        $("#mts_sc_type").val(mts_sc_type);
        $("#mts_cc_id").val(mts_cc_id);
        $("#mts_sf_name").val(mts_sf_name);
        $("#eff_date").val(eff_date);
        $("#Supervisor_Code").val(Supervisor_Code);
        $("#supname").val(supname);
        $("#reason").val(reason);
        $("#save").text("Edit");
        $("#hidden_row_id").val(row_id);
    });

    $("#save").click(function() {
        $("#save").text("Add");
    });

    $(document).on("click", ".remove_details", function() {
        var row_id = $(this).attr("id");
        if (confirm("Are you sure you want to remove this row data?")) {
            $("#row_" + row_id + "").remove();
            $("#cs_" + row_id + "").remove();
        } else {
            return false;
        }
    });


});