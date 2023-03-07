<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG |Edit Household Savings</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here     

        if(isset($_POST['Update']))
            {    
            $Rec_ID = $_POST['Rec_ID'];
            $year1 = $_POST['year'];
            $month1 = $_POST['month'];
            $amount1 = $_POST['amount'];
            $groupID = $_POST["group_code"];
            
            
            $sql = mysqli_query($link,"update tblslg_member_savings  SET year = '$year1', month ='$month1', amount =$amount1 where savingID = '$Rec_ID'");
                  
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Savings Record has been EDITED successfully !");'; 
                echo 'window.location.href = "basic_livelihood_member_mgt.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }
               
    ?>
    
</div>