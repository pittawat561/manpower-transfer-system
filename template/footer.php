</main>


<footer class="py-4 bg-body mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">© Denso Website 2022</div>
            <div>
                <a href="javascript:void(0);">Privacy Policy</a>
                &middot;
                <a href="javascript:void(0);">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>


</div>
</div>
<?php 
$connDB_MTS->close();
$connDB_DBMC->close();
?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/select2.full.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/plugin/gridforms/gridforms.js"></script>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>
<!-- DEMO -->
<!-- <script type="text/javascript" src="../assets/plugin/datatables/datatables.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/b-2.2.2/b-html5-2.2.2/datatables.min.js">
</script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.5/datatables.min.js"></script> -->



<script>
$(document).ready(function() {
    $('#example').DataTable({

        responsive: true
    });




    function loadDoc() {


        setInterval(function() {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("noti_inbox").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../template/Notification/Notification-inbox.php", true);
            xhttp.send();

        }, 2000);

        setInterval(function() {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("noti_number").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../template/Notification/Notification_role.php", true);
            xhttp.send();

        }, 2000);


    }
    loadDoc();



});
</script>


</body>

</html>