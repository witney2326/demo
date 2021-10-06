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
        echo "SLG Savings Record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>