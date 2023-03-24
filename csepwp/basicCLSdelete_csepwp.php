
    <?php
        include "../layouts/config2.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "UPDATE tblcluster SET deleted ='1' WHERE ClusterID = '$id'";
            
            if (mysqli_query($link_cs, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Record Successfully Deleted!");'; 
                echo 'history.go(-1);';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link_cs->error;
            }
               
    ?>

    
