<?php
    include 'layouts/session.php';

    if (($_SESSION["user_role"] == '05')) {
        header("location: basic_livelihood_slg_mgt_filter3_results.php");   
    }
    if (($_SESSION["user_role"] == '04')) {
        header("location: basic_livelihood_cls_mgt_region_cood_filter_results.php");
        /*
        header("location: basic_livelihood_slg_mgt_filter2_results.php");
        */   
    }
    if (($_SESSION["user_role"] == '03')) {
        header("location: basic_livelihood_slg_mgt_filter_results.php");   
    }

    if (($_SESSION["user_role"] == '02')) {
        header("location: basic_livelihood_slg_mgt2.php");   
    }
    if (($_SESSION["user_role"] == '01')) {
        header("location: basic_livelihood_slg_mgt2.php");   
    }
    if (($_SESSION["user_role"] == '00')) {
        header("location: index.php");   
    }

    if (($_SESSION["user_role"]== '06')) {
        header("location: basic_livelihood_HH_Dis_reports.php");
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: basic_livelihood_HH_Dis_reports.php");
    }

    if (($_SESSION["user_role"]== '08')) {
        header("location: basic_livelihood_HH_Dis_reports.php");
    }
?>

