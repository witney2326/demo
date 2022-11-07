<?php
include_once '../layouts/config.php';
if(isset($_POST['Submit']))
{    
    $hhcode = $_POST["hhcode"];
    $iga = $_POST['iga'];
 
    $sql = mysqli_query($link,"update tblbeneficiaries  SET loption = '$iga' where sppCode = '$hhcode'");

    if (($sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Livelihood option added successfully !");'; 
        echo 'window.location.href = "graduation_selected_beneficiary_option_selection.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
        
    mysqli_close($link);
            
}
?>