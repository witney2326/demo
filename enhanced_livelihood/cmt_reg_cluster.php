<?php   
include '../layouts/config.php';
$id = $_GET['id']; 


        $query = "UPDATE tblcluster SET cmt_cme_trained ='1' WHERE ClusterID = '$id'";
            
        if (mysqli_query($link, $query)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Training Record has been updated successfully !");'; 
            echo 'window.location.href = "cmt_training_registration_check.php";';
            echo '</script>';
        } else {
            echo "Error: " . $query . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    
       

?>