<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>VC Production|Submit Proposal</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>   
</head>

<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 
 
        
           
            $sql = mysqli_query($link,"update tblcluster  SET vc_p_submitted = '1' where ClusterID = '$Rec_ID'");
                               
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("VC Proposal successfully Submitted and Recorded !");'; 
                echo 'window.location.href = "vc_mapped_clusters.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        
        mysqli_close($link);
            
               
    ?>
    
</div>