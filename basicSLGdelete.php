
    <?php
        include "layouts/config.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "UPDATE tblgroup SET deleted ='1' WHERE groupID = '$id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Record successfully been deleted!");'; 
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
               
    ?>

    
