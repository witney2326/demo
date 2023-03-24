<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG Assesment|Approval</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

   

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select grad_assesed,grad_assesed_result from tblgroup where groupID='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $grad_assesed= $row["grad_assesed"];$grad_assesed_result = $row["grad_assesed_result"];}
            $result_set->close();
        }
 
        if (($grad_assesed =='1') && ($grad_assesed_result =='1'))
        {
            $sql = mysqli_query($link,"update tblgroup  SET grad_status = '1' where groupID = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG successfully Put on Graduation Pilot!");'; 
                echo 'window.location.href = "graduation_grp_assesment.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert(" Either SLG Has Not Been Assessed OR Check Assesment Results!");'; 
            echo 'window.location.href = "graduation_grp_assesment.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>