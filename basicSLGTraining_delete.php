<?php
        include "layouts/config.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "DELETE from tblgrouptrainings WHERE TrainingID = '$id'";


            
            if ((mysqli_query($link, $sql)) ) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Training Record has been successfully DELETED!");'; 
                echo 'history.go(-1);';
                echo '</script>';
  
            } else {
                echo "Error deleting record: " . $link->error;
            }
               
    ?>