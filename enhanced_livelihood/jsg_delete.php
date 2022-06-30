
    <?php
        include "layouts/config.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "UPDATE tbljsg SET deleted ='1' WHERE recID = '$id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("JSG Record successfully been deleted!");'; 
                echo 'window.location.href = "jsgs.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
               
    ?>

    
