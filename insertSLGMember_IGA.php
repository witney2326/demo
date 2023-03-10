<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{   
    $hhcode = $_POST["hhcode"]; 
    $groupID = $_POST["groupid"]; 
    $district= $_POST["district"];
    $buscat = $_POST['buscat'];
    $iga = $_POST['iga'];
    $amount = $_POST['amount_invested'];
     
    if(empty($hhcode) or empty($groupID) or empty($district) or empty($buscat) or empty($iga)){
        echo '<script type="text/javascript">'; 
        echo 'alert("Missing Value! Make sure all values are entered!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    }
    else
    {

            $sql = "INSERT INTO tblmember_iga (sppCode,groupID,districtID,bus_category,type,amount_invested)
            VALUES ('$hhcode','$groupID','$district','$buscat','$iga','$amount')";
        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household IGA Record has been added successfully !");'; 
            echo 'history.go(-2)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    mysqli_close($link);
            
}
?>