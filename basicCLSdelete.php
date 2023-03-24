
    <?php
        include "layouts/config.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "UPDATE tblcluster SET deleted ='1' WHERE ClusterID = '$id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Record successfully been deleted!");'; 
                echo 'window.location.href = "basic_livelihood_clusters.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
               
    ?>

    
