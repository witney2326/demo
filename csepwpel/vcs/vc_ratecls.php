<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>VC Proposal Assesment</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

    <?php
        include "././../../layouts/config.php"; // Using database connection file here     
        
        $grpID = $_POST["grpID"];
        $rating = $_POST["rating"];

        
        $query="select vc_p_rating_flag, vc_p_submitted from tblcluster where ClusterID='$grpID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $vc_p_submitted = $row["vc_p_submitted"];$vc_p_rating_flag = $row["vc_p_rating_flag"];} 
        }
 
        if (($vc_p_submitted ==1) and ($vc_p_rating_flag ==0))
        {
            $sql = mysqli_query($link,"update tblcluster  SET vc_p_result = '$rating', vc_p_rating_flag = '1' where ClusterID = '$grpID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster VC successfully Rated!");'; 
                echo 'window.location.href = "vc_mapped_clusters.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Business Proposal NOT Submitted OR Already Rated!");'; 
            echo 'window.location.href = "vc_mapped_clusters.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>