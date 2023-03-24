
<?php
 include '../layouts/session.php';
 
    if (($_SESSION["user_role"]== '05')) {
        header("location: youths_bus_concept_devt_filter3_selected.php");   
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: youths_bus_concept_devt_filter2_selected.php");   
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: youths_bus_concept_devt_filter1_selected.php");   
    }

    if (($_SESSION["user_role"]== '02')) {
        header("location: youths_bus_concept_devt_selected.php");   
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: youths_bus_concept_devt_selected.php");   
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");   
    }
    
    if (($_SESSION["user_role"]== '06')) {
        header("location: enhancedReports.php");   
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: youths_bus_concept_devt_selected.php");   
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: enhancedReports.php");   
    }
?>

