
    <?php
        include "layouts/config.php"; // Using database connection file here

        $id = $_GET['id'];
                    
        
        $sql = "UPDATE users SET deleted ='1' WHERE id = '$id'";
                    
        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("User Record Successfully DELETED from the Database!");'; 
            echo 'window.location.href = "sysadmin1.php";';
            echo '</script>';

        } else {
            echo "Error deleting record: " . $link->error;
        }
               
    ?>

    
