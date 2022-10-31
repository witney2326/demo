<?php
    include "../layouts/config.php"; // Using database connection file here

  
        $recid = $_GET['id'];
        
        
        $sql = "Delete from tblycs WHERE recID = '$recid'";
        
        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("YCS Record has been DELETED successfully!");'; 
            echo 'window.location.href = "ycs_identification_check.php";';
            echo '</script>';

        } else {
            echo "Error updating record: " . $link->error;
        }
          
?>

    
