
    <?php
        include "../layouts/config2.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $id = $_POST['cluster_id'];
            $cluster_name = $_POST['cluster_name'];          
            $gvh = $_POST['gvh'];
          
            
            $sql = "UPDATE tblcluster SET ClusterName ='$cluster_name',gvhID = '$gvh'
            WHERE ClusterID = '$id'";
            
            if (mysqli_query($link_cs, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Record Successfully Edited!");'; 
                echo 'history.go(-2);';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link_cs->error;
            }
        }       
    ?>

    
