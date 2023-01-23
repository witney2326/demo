
<?php
 include '././../../layouts/session.php';
 
    if (($_SESSION["user_role"]== '05')) {
        header("location: graduation_cluster_assesment_filter3.php");   
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: graduation_cluster_assesment_filter2.php");   
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: graduation_cluster_assesment_filter1.php");   
    }

    if (($_SESSION["user_role"]== '02')) {
        header("location: graduation_cluster_assesment.php");   
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: graduation_cluster_assesment.php");   
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");   
    }
    
    if (($_SESSION["user_role"]== '06')) {
        header("location: graduationReports.php");   
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: graduation_cluster_assesment.php");   
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: graduationReports.php");   
    }
?>

