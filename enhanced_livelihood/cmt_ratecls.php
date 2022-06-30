<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG Assesment|Cluster Rating</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $grpID = $_POST['grpID'];
        $rating = $_POST['rating'];

        
        $query="select cmt_assesed,cmt_assesed_result from tblcluster where ClusterID='$grpID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $cmt_assesed= $row["cmt_assesed"];$cmt_assesed_result = $row["cmt_assesed_result"];}
            $result_set->close();
        }
 
        if (($cmt_assesed =='0') and ($rating == '2'))
        {
            $sql = mysqli_query($link,"update tblcluster  SET cmt_status = '1', cmt_assesed = '1', cmt_assesed_result = '$rating' where ClusterID = '$grpID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster successfully Rated!");'; 
                echo 'window.location.href = "cmt_cluster_assesment.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        if (($cmt_assesed =='0') and ($rating == '1'))
        {
            $sql = mysqli_query($link,"update tblcluster  SET cmt_status = '0', cmt_assesed = '1', cmt_assesed_result = '$rating' where ClusterID = '$grpID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster successfully Rated!");'; 
                echo 'window.location.href = "cmt_cluster_assesment.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        if (($cmt_assesed =='1'))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Already Rated!");'; 
            echo 'window.location.href = "cmt_cluster_assesment.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>