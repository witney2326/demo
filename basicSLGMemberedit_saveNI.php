
<?php
    include "layouts/config.php"; // Using database connection file here     

    if(isset($_POST['Submit']))
    {    
        $hhname = $_POST['hh_name'];
        $nat_ID = $_POST['nat_ID'];
        $hhcode = $_POST['hh_id'];

        if  (empty($hhcode))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Please Enter Household code!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        }
        else
        {
            $sql = "UPDATE tblbeneficiaries set hh_head_name = '$hhname',nat_ID = '$nat_ID' where sppCode ='$hhcode' ";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Member Record has been added successfully !");'; 
                echo 'history.go(-2)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
        }
    }
            
?>
    