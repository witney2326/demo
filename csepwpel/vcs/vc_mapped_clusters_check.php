
<?php
 include '././../../layouts/session.php';
 
    if (($_SESSION["user_role"]== '05')) {
        header("location: vc_production_clusters_filter3.php");   
    }
    if (($_SESSION["user_role"]== '04')) {
        header("location: vc_production_clusters_filter2.php");   
    }
    if (($_SESSION["user_role"]== '03')) {
        header("location: vc_production_clusters_filter1.php");   
    }

    if (($_SESSION["user_role"]== '02')) {
        header("location: vc_mapped_clusters.php");   
    }
    if (($_SESSION["user_role"]== '01')) {
        header("location: vc_mapped_clusters.php");   
    }
    if (($_SESSION["user_role"]== '00')) {
        header("location: index.php");   
    }
    
    if (($_SESSION["user_role"]== '06')) {
        header("location: enhancedReports.php");   
    }
    if (($_SESSION["user_role"]== '07')) {
        header("location: vc_mapped_clusters.php");   
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: enhancedReports.php");   
    }
?>

