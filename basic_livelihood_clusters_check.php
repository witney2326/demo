
<?php

include 'layouts/session.php';

    if (($_SESSION["user_role"]== '05')) {
        header("location: basic_livelihood_slg_mgt_cls_filter3_results.php");   
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: basic_livelihood_slg_mgt_cls_filter2_results.php");   
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: basic_livelihood_slg_mgt_cls_filter1_results.php");   
    }
    if (($_SESSION["user_role"]== '02')) {
        header("location: basic_livelihood_clusters.php");   
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: basic_livelihood_clusters.php");   
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");   
    }

    if (($_SESSION["user_role"]== '06')) {
        header("location: basicReports.php");   
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: basic_livelihood_clusters.php");   
    }
    
    if (($_SESSION["user_role"]== '08')) {
        header("location: basicReports.php");   
    }
?>

