<?php
    include 'layouts/session.php';

    $user = $_SESSION["user_role"];

    switch ($user) 
    {
        case "05":
            header("location: basic_livelihood_slg_training_filter3_results.php");
            break;
        case "04":
            header("location: basic_livelihood_slg_training_filter2_results.php");
            break;
        case "03":
            header("location: basic_livelihood_slg_training_filter1_results.php"); 
            break;
        case "02":
            header("location: basic_livelihood_training.php"); 
            break;
        case "01":
            header("location: basic_livelihood_training.php"); 
            break;
        case "00":
            header("location: index.php"); 
            break;
        case "06":
            header("location: basicReports.php");
            break;
        case "07":
            header("location: basic_livelihood_training.php"); 
            break;
        case "08":
            header("location: basicReports.php");
            break;
        default:
            header("location: basic_livelihood_training.php");
    }   
?>