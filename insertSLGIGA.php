<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{    
    $groupID = $_POST["group_code"];
    $district= $_POST["district"];
    $buscat = $_POST['buscat'];
    $iga = $_POST['iga'];
    $males = $_POST["males"];
    $females = $_POST["females"];
    $amount = $_POST['amount_invested'];
                

        $sql = "INSERT INTO tblgroup_iga (groupID,districtID,bus_category,type,no_male,no_female,amount_invested)
        VALUES ('$groupID','$district','$buscat','$iga','$males','$females','$amount')";
    if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("SLG IGA Record has been added successfully !");'; 
        echo 'history.go(-1)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
            
}
?>