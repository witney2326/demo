
<?php
include "layouts/config.php"; // Using database connection file here



    $id = $_GET['id'];
             
    
    $sql = "UPDATE tblgroup SET deleted ='1' WHERE groupID = '$id'";
    $sql20 = "DELETE FROM cimis.tblhousehold_savings WHERE id = '$id'";


    
    if ( (mysqli_query($link, $sql20)) ) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Record Successfully DELETED!");'; 
        echo 'window.location.href = "upload.php";';
        echo '</script>';

    } else {
        echo "Error deleting record: " . $link->error;
    }
       
?>


