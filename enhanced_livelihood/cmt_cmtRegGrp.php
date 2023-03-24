<?php
include '../layouts/config.php';

    $GID = $_GET["id"];
    $check = substr($GID, 5, 3);
    if (($check == "CLU") or ($check == "CLS"))
    {
        $query = "UPDATE tblcluster SET cmt_cmt_trained ='1' WHERE ClusterID ='$GID'";
            
        if (mysqli_query($link, $query)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Training Record has been updated successfully !");'; 
            echo 'window.location.href = "cmt_cmt_training_registration_check.php";';
            echo '</script>';
        } else {
            echo "Error: " . $query . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    } else
    if (($check == "SLG")){
        $sql_cls_update = "UPDATE tblgroup SET cmt_cmt_trained ='1' WHERE groupID=$GID";
        if (mysqli_query($link, $sql_cls_update)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG Training Record has been added successfully !");'; 
            echo 'window.location.href = "cmt_cmt_training_registration_check.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql_cls_update . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
    }

       
?>

