<?php
include_once '../layouts/config.php';


if(isset($_POST['Allocate']))
{    
    $jsgID = $_POST["group_id"];
    $bustype= $_POST["bustype"];
    $bds = $_POST["bds"];
    
    $startdate = $_POST["startdate"];
    $finishdate = $_POST["finishdate"];

                
        $sql = "INSERT INTO tbljsg_training_plan (jsgID,skillTypeID,startdate,finishdate,bds)
        VALUES ('$jsgID','$bustype','$startdate','$finishdate','$bds')";

        $sql2 = mysqli_query($link,"update tbljsg  SET bds_identified = '1', bds_allocated ='1' where recID = '$jsgID'");
    
        if (mysqli_query($link, $sql) and ($sql2)) {
        
        echo '<script type="text/javascript">'; 
        echo 'alert("Traing Plan Scheduled successfully !");'; 
        echo 'window.location.href = "jsgs_bds_check.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }

    mysqli_close($link);

    
            
}
?>