<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG|Mapping</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 
 
        $rg_query = mysqli_query($link,"select vc_mapped from tblcluster where ClusterID='$Rec_ID'"); 
        $rg = mysqli_fetch_array($rg_query);
        $status = $rg['vc_mapped'];

        if ($status == '0')
         {   
            $sql = mysqli_query($link,"update tblcluster  SET vc_mapped = '1' where ClusterID = '$Rec_ID'");
                               
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Mapped successfully For VC Production Interventions !");'; 
                echo 'window.location.href = "vc_production_clusters.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster already Mapped for VC Production !");'; 
            echo 'window.location.href = "vc_production_clusters.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>