<?php
include_once '././../../layouts/config2.php';


if(isset($_POST['Allocate']))
{    
    $jsgID = $_POST["group_id"];
    $bustype= $_POST["bustype"];
    $bds = $_POST["bds"];
    
    $startdate = $_POST["startdate"];
    $finishdate = $_POST["finishdate"];

                
        $sql = "INSERT INTO tbljsg_training_plan (jsgID,skillTypeID,startdate,finishdate,bds)
        VALUES ('$jsgID','$bustype','$startdate','$finishdate','$bds')";
    if (mysqli_query($link_cs, $sql)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Traing Plan Scheduled successfully !");'; 
        echo 'window.location.href = "jsgs_bds_check.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
    }

    mysqli_close($link_cs);

    
            
}
?>