
    <?php
        include "layouts/config.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $id = $_POST['cluster_id'];
            $cluster_name = $_POST['cluster_name'];          
            $gvh = $_POST['gvh'];           
            $cohort = $_POST['cohort'];
          
            
            $sql = "UPDATE tblcluster SET ClusterName ='$cluster_name',gvhID = '$gvh', cohort = $cohort
            WHERE ClusterID = '$id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Record has been successfully edited!");'; 
                echo 'window.location.href = "basic_livelihood_clusters.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
        }       
    ?>

    
