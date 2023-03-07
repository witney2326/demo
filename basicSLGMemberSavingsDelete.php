<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Delete HH Savings Record</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     

        $id = $_GET['id'];

        $sql = mysqli_query($link,"delete from tblslg_member_savings where savingID = '$id'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Savings Record has been DELETED successfully !");'; 
            echo 'window.location.href = "basic_livelihood_member_mgt.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
               
    ?>
    
</div>