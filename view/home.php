<?php
include '../template/header.php';
?>

<div class="container-fluid px-4">
    <ol class="breadcrumb">
        <li class="active">Home</li>
    </ol>


    <div class="panel panel-default animated fadeInUp">
        <div class="panel-heading"> <i class="ti-timer"></i>
            ประวัติการทํารายการ
        </div>
        <div class="panel-body">
            <form>
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Form Name</th>
                            <th width="15%">Date</th>
                            <th width="10%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $mts_doc = $connDB_MTS->query("SELECT * FROM mts_document AS doc
                        INNER JOIN mts_fm_name AS fm ON doc.Form_ID = fm.Form_id
                        INNER JOIN mts_status AS sta ON doc.`status` = sta.Status_id
                        WHERE Create_By = '" . $objResult["Emp_ID"] . "' ORDER BY date ASC");
                        while ($f_row = $mts_doc->fetch_array()) {
                            $f_rows[] = $f_row;
                            $i = 1;
                        };
                        foreach ($f_rows as $f_row) {
                            echo '<tr>
                                        <td>' . $i++ . '</td> 
                                        <td>' . $f_row["Form_name"] .  '</td> 
                                        <td>' . $f_row["Date"] .  '</td> 
                                        <td>' . $f_row["status_name"] .  '</td>
                                        ';
                                    
                                    if($f_row["status_name"] == 'wait'){
                                    echo '<td><a class="btn btn-success btn-xl" href="view.php?doc_id=' . $f_row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a>
                                        <a class="btn btn-danger btn-xl" name="cancel" id="' . $f_row["Document_num"] . '" onclick="cancel(this.id)"><i class="ti-close"></i> Cancel</a></td>
                                    </tr>
                                    ';
                                    }else{
                                        echo'<td><a class="btn btn-success btn-xl" href="view.php?doc_id=' . $f_row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td>';
                                    };
                                    echo'<input type="hidden" name="doc_num" id="doc_num" value="' . $f_row["Document_num"] . '">';
                        }
                        
                        ?>
                    </tbody>

                </table>

            </form>

        </div>


        <div class="panel-footer">

        </div>

    </div>




    <div class="panel panel-default animated fadeInUp">
        <div class="panel-heading"> <i class="ti-timer"></i>
            ประวัติการทํารายการ Approve
        </div>
        <div class="panel-body">
            <form>
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="40%">Form Name</th>
                            <th width="15%">Date</th>
                            <th width="10%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $log = $connDB_MTS->query("SELECT * FROM `mts_apf_log` as log
                        INNER JOIN mts_document as doc on log.log_document = doc.Document_num
                        INNER JOIN mts_fm_name AS fm ON doc.Form_ID = fm.Form_id
                        WHERE log_Emp_ID = '" . $objResult["Emp_ID"] . "' ORDER BY log_time ASC");
                        while ($a_row = $log->fetch_array()) {
                            $a_rows[] = $a_row;
                            $i = 1;
                        };
                        foreach ($a_rows as $a_row) {
                            $status = $a_row["log_status"];
                            if($status == 3){
                                $stus = '<a class="btn btn-success btn-sm">Approve  </a>';
                            }elseif($status == 2){
                                $stus = '<a class="btn btn-danger btn-sm">Reject  </a>';
                            };
                            echo '<tr>
                                        <td>' . $i++ . '</td> 
                                        <td>' . $a_row["Form_name"] .  '</td> 
                                        <td>'.$a_row["log_date"].' ' . $a_row["log_time"] .  '</td> 
                                        <td>'.$stus.'</td>
                                        <td><a class="btn btn-success btn-xl" href="view.php?doc_id=' . $a_row["Document_num"] . '" ><i class="ti-zoom-in"></i> View</a></td>
                                    </tr>';
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

<script>
$(document).ready(function() {
    $('#example1').DataTable({

        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        // },
        // responsive: true,
        // "lengthMenu": [
        //     [10, 25, 50, -1],
        //     [10, 25, 50, "All"]
        // ],
        // dom: 'Bfrtip',
        // buttons: [
        //     'copyHtml5',
        //     'excelHtml5',
        //     'csvHtml5',
        //     'pdfHtml5'
        // ]
    });
});
</script>

<script>
function cancel(id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4FC1E9',
        cancelButtonColor: '#E9573F',
        confirmButtonText: 'Yes !'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "cancel.php",
                type: "POST",
                data: {
                    val: id,
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
                    //window.location.href = "../view/home.php";
                }
            });
        }
    })
}
</script>