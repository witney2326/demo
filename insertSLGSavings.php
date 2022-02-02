<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{    
    $groupID = $_POST['group_id'];
    $DistrictID = $_POST['district'];
     $year = $_POST['year'];
    $month = $_POST['month'];
    $amount = $_POST['amount'];
     
     
        $sql = "INSERT INTO tblgroupsavings (GroupID,DistrictID,Yr,Month,Amount)
        VALUES ('$groupID','$DistrictID','$year','$month','$amount')";
      if (mysqli_query($link, $sql)) {
         echo '<script type="text/javascript">'; 
         echo 'alert("SLG Savings has been added successfully !");'; 
         echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
         echo '</script>';
        } else {
           echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
}
?>