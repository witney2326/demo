

    <?php
        include "layouts/config.php";     

        $id = $_GET['id'];

        $sql = mysqli_query($link,"delete from tblsafeguard_group_plans where planID = '$id'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Savings Record has been DELETED successfully !");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
               
    ?>
    