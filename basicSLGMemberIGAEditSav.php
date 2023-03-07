<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG |Edit Household IGA</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php";   

        if(isset($_POST['Update']))
            {    
            $Rec_ID = $_POST['Rec_ID'];
            $hh_id = $_POST['hh_id'];
            $igatype = $_POST['igatype'];
            $amount1 = $_POST['amount'];
            $groupID = $_POST["group_code"];
            
            
            $sql = mysqli_query($link,"update tblmember_iga  SET type = '$igatype', amount_invested ='$amount1' where recID = '$Rec_ID'");
                  
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household IGA Record has been UPDATED successfully !");'; 
                echo 'window.location.href = "basic_livelihood_member_mgt.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }
               
    ?>
    
</div>