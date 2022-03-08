<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG|Mapping</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 
 
            
        $sql = mysqli_query($link,"update tblgroup  SET ycs_mapped = '1' where groupID = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG Mapped successfully For YCS Interventions !");'; 
            echo 'window.location.href = "ycs_identification.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);
            
               
    ?>
    
</div>