<?php
include_once 'layouts/config.php';

 
    $hh_ID = $_POST["hh_id"];
    $groupID = $_POST["group_code"];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $supType=$_POST['supplimenttype'];
    $quantity = $_POST['quantity'];
 
    
        $sql = "INSERT INTO tblslg_member_suppliments (hh_code,groupID,year,month,supType,qty)
        VALUES ('$hh_ID','$groupID','$year','$month','$supType','$quantity')";
    if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("HH Suppliment Record has been added successfully !");'; 
        echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
    

?>