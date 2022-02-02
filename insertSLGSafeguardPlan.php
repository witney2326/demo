<?php
include_once 'layouts/config.php';

function grp_taID($link, $grpID)
{
$ta_query = mysqli_query($link,"select TAID from tblgroup where groupID='$grpID'"); // select query
$taID = mysqli_fetch_array($ta_query);// fetch data
return $taID['TAID'];
}

if(isset($_POST['Submit']))
{    
    $groupID = $_POST["group_code"];
    $district= $_POST["district"];
    $ta = grp_taID($link,$_POST["group_code"]);
    $bustype = $_POST["bustype"];

    $activity = $_POST["sactivity"];
    $indicator = $_POST["indicator"];
    $target = $_POST["target"];
    $startdate = $_POST["startdate"];
    $finishdate = $_POST["finishdate"];

                
        $sql = "INSERT INTO tblsafeguard_group_plans (groupID,districtID,taID,busTypeID,activityID,indicator,target,startdate,finishdate)
        VALUES ('$groupID','$district','$ta','$bustype','$activity','$indicator','$target','$startdate','$finishdate')";
    if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("SLG Safeguard Record has been added successfully !");'; 
        echo 'window.location.href = "basic_livelihood_safeguards_mgt.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);

    
            
}
?>