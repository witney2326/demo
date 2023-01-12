<?php
include_once '././../../layouts/config2.php';

function grp_taID($link_cs, $grpID)
{
$ta_query = mysqli_query($link_cs,"select TAID from tblgroup where groupID='$grpID'"); // select query
$taID = mysqli_fetch_array($ta_query);// fetch data
return $taID['TAID'];
}

if(isset($_POST['Submit']))
{    
    $groupID = $_POST["group_code"];
    $district= $_POST["district"];
    $ta = grp_taID($link_cs,$_POST["group_code"]);
    $bustype = $_POST["bustype"];

    $activity = $_POST["sactivity"];
    $indicator = $_POST["indicator"];
    $target = $_POST["target"];
    $startdate = $_POST["startdate"];
    $finishdate = $_POST["finishdate"]; 
    $amount_invested = $_POST["amount_invested"];
                
        $sql = "INSERT INTO tblsafeguard_group_plans (groupID,districtID,taID,busTypeID,activityID,indicator,target,startdate,finishdate,budget)
        VALUES ('$groupID','$district','$ta','$bustype','$activity','$indicator','$target','$startdate','$finishdate','$amount_invested')";
    if (mysqli_query($link_cs, $sql)) {
        echo '<script type="text/javascript">'; 
            echo 'alert("SLG Safeguard Record has been added successfully !");'; 
            echo 'history.go(-1);';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link_cw);
    }
    mysqli_close($link_cs);

    
            
}
?>