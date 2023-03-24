<?php
    include "layouts/config.php"; 

    $Rec_ID = $_GET['id'];

    $sql = mysqli_query($link,"update users  SET ustatus = '0' where id = '$Rec_ID'");
            
    if ($sql) {
        echo '<script type="text/javascript">'; 
        echo 'alert("User Deactivated Successfully !");'; 
        echo 'window.location.href = "sysadmin1.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
    
?>