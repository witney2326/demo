<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>CBDRA |Edit Adopt a Place</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; ?>

    <?php
        include "././../../layouts/config2.php"; // Using database connection file here     

        if(isset($_POST['Update']))
            {    
            $plan_id = $_POST['plan_id'];
            $achieved = $_POST['achieved'];
            $achieved_date = $_POST['achieved_date'];
            
            
            
            $sql = mysqli_query($link_cs,"update tblsafeguard_group_plans  SET achieved = '$achieved', achieved_date ='$achieved_date' where planID = '$plan_id'");
                  
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("ESMP Record has been UPDATED successfully !");'; 
                echo 'history.go(-2);';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
            }
            mysqli_close($link_cs);
            }
               
    ?>
    
</div>