
<?php
 include '../layouts/session.php';
 
    if (($_SESSION["user_role"]== '05')) {
        header("location: jsg_new_bds_filter2_results.php");   
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: jsg_new_bds_filter2_results.php");   
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: jsg_new_bds_filter1_results.php");   
    }

    if (($_SESSION["user_role"]== '02')) {
        header("location: jsg_new_bds_filter_results.php");   
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: jsg_new_bds_filter_results.php");   
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");   
    }
    
    if (($_SESSION["user_role"]== '06')) {
        header("location: enhancedReports.php");   
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: jsg_new_bds_filter_results.php");   
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: enhancedReports.php");   
    }
?>

