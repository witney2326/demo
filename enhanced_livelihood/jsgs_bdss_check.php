<?php
    include '../layouts/session.php';
   
    if (($_SESSION["user_role"]== '05')) {
        header("location: jsgs_bdss_filter2_results.php");
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: jsgs_bdss_filter2_results.php");
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: jsgs_bdss_filter1_results.php");
    }
    if (($_SESSION["user_role"]== '02')) {
        header("location: jsgs_bdss.php");
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: jsgs_bdss.php");
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");
    }

    if (($_SESSION["user_role"]== '06')) {
        header("location: enhancedReports.php");
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: jsgs_bdss.php");
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: enhancedReports.php");
    }
?>