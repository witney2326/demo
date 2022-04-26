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

        $id = $_GET['id'];

        $sql = mysqli_query($link,"delete from tblbeneficiaries where sppCode = '$id'");
        $sql2 = mysqli_query($link,"delete from tblslg_member_savings where hh_code = '$id'");
        $sql3 = mysqli_query($link,"delete from tblslg_member_loans where hh_code = '$id'");
        $sql4 = mysqli_query($link,"delete from tblslg_member_iga where hh_code = '$id'");
               
        if ($sql and $sql2 and $sql3 and $sql4) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Record has been DELETED from Database successfully !");'; 
            echo 'window.location.href = "basic_livelihood_member_mgt.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
               
    ?>
    
</div>