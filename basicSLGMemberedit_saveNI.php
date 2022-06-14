<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Delete HH Record</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    

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
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                echo '</script>';
            }
            else
            {
                $sql = "UPDATE tblbeneficiaries set hh_head_name = '$hhname',nat_ID = '$nat_ID' where sppCode ='$hhcode' ";
                if (mysqli_query($link, $sql)) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("SLG Member Record has been added successfully !");'; 
                    echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
                mysqli_close($link);
            }
        }
               
    ?>
    
</div>