<?php
    include 'layouts/session.php';

    $user = $_SESSION["user_role"];

    switch ($user) 
    {
        case "05":
            header("location: jsg_training_trained_groups_filter3.php");
            break;
        case "04":
            header("location: jsg_training_trained_groups_filter2.php");
            break;
        case "03":
            header("location: jsg_training_trained_groups_filter1.php"); 
            break;
        case "02":
            header("location: jsg_training_trained_groups.php"); 
            break;
        case "01":
            header("location: jsg_training_trained_groups.php"); 
            break;
        case "00":
            header("location: index.php"); 
            break;
        case "06":
            header("location: enhancedReports.php");
            break;
        case "07":
            header("location: jsg_training_trained_groups.php"); 
            break;
        case "08":
            header("location: enhancedReports.php");
            break;
        default:
            header("location: basic_livelihood_training_trained_groups.php");
    }   
?>