<?php
include_once 'layouts/config.php';

 
if(isset($_POST['Submit']))
{    
$hh_ID = $_POST["hh_id"];
$district= $_POST["district"];
$year = $_POST['year'];
$month = $_POST['month'];
$amount = $_POST['amount'];
$groupID = $_POST["group_code"];


    $sql = "INSERT INTO tblslg_member_savings (districtID,hh_code,groupID,year,month,amount)
    VALUES ('$district','$hh_ID','$groupID','$year','$month','$amount')";
if (mysqli_query($link, $sql)) {
    echo '<script type="text/javascript">'; 
        echo 'if (confirm("SLG Savings Record has been added successfully! Add another Savings Record For Household?"))';
            echo '{';
               echo 'history.go(-1)';
            echo '}';
         echo 'else';
            echo '{';
               //echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
               echo 'history.go(-2)';
        echo '}';
    echo '</script>';
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);
}

?>