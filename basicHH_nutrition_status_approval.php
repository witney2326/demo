<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Nutrition Status|Approval</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 
 
            
        $sql = mysqli_query($link,"update tblbeneficiaries  SET hhnutritionstatus = '1' where sppCode = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Approved successfully !");'; 
            echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
               
    ?>
    
</div>