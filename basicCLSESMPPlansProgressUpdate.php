
<?php
    include "layouts/config.php";     

    if(isset($_POST['Update']))
        {    
        $plan_id = $_POST['plan_id'];
        $achieved = $_POST['achieved'];
        $achieved_date = $_POST['achieved_date'];

        $sql = mysqli_query($link,"update tblsafeguard_group_plans  SET achieved = '$achieved', achieved_date ='$achieved_date' where planID = '$plan_id'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("ESMP Record has been UPDATED successfully !");'; 
            echo 'history.go(-2)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
        }
            
?>
    
