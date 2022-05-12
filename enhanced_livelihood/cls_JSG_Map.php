<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Status|Approval</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $cls_query = mysqli_query($link,"select jsg_mapped from tblcluster where ClusterID='$Rec_ID'"); // select query
        $cls = mysqli_fetch_array($cls_query);
        $jsg_mapped= $cls['jsg_mapped'];
 
        if ($jsg_mapped == '0')
        {
            $sql = mysqli_query($link,"update tblcluster  SET jsg_mapped = '1' where ClusterID = '$Rec_ID'");
                
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Mapped successfully For JSG Interventions !");'; 
                echo 'window.location.href = "jsg_clusters.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        } else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Already Mapped For JSG Interventions !");'; 
            echo 'window.location.href = "jsg_clusters.php";';
            echo '</script>';
        }
        mysqli_close($link);          
    ?>
    
</div>