
<?php
include "../layouts/config2.php"; // Using database connection file here



    $id = $_GET['id'];
             
    
    $sql = "UPDATE tblgroup SET deleted ='1' WHERE groupID = '$id'";
    $sql1 = "DELETE FROM cimis.csepwp_tblhousehold_savings WHERE id = '$id'";


    
    if ( (mysqli_query($link_cs, $sql1)) ) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Record Successfully DELETED!");'; 
        echo 'window.location.href = "csepwp_upload.php";';
        echo '</script>';

    } else {
        echo "Error deleting record: " . $link_cs->error;
    }
       
?>


