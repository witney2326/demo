<?php
    include 'layouts/session.php';
   
    if (($_SESSION["user_role"]== '05')) {
        header("location: basic_livelihood_HH_Ben_reports_filter3.php");
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: basic_livelihood_HH_Ben_reports_filter2.php");
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: basic_livelihood_HH_Ben_reports_filter1.php");
    }
    if (($_SESSION["user_role"]== '02')) {
        header("location: basic_livelihood_HH_Ben_reports.php");
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: basic_livelihood_HH_Ben_reports.php");
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");
    }

    if (($_SESSION["user_role"]== '06')) {
        header("location: basic_livelihood_HH_Ben_reports.php");
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: basic_livelihood_HH_Ben_reports.php");
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: basic_livelihood_HH_Ben_reports.php");
    }
?>