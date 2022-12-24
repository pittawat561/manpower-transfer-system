<?php  
//export.php  
include "../service/DB-Config.php";
$output = '';
if(isset($_POST["export"])){
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';

   $output .= '
    <tr>  
                         <td>test</td>  
                         <td>test</td>  
                         <td>test</td>  
                         <td>test</td>  
                         <td>test</td>  
                    </tr>
   ';
  
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 
}
?>