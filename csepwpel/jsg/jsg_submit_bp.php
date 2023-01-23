<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<?php
    include "././../../layouts/config2.php"; // Using database connection file here     
    
    $Rec_ID = $_GET['id']; 

        $sql = mysqli_query($link_cs,"update tbljsg  SET bp_submitted = '1' where recID = '$Rec_ID'");
                            
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Business Plan Successfully Submitted and Recorded !");'; 
            echo 'window.location.href = "jsgs_business_plans.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
        }
    
    mysqli_close($link_cs);
        
            
?>

