<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG Register Group</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include '../layouts/menu.php'; ?>

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select cmt_cme_trained,cmt_status from tblgroup where groupID='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $cmt_cme_trained= $row["cmt_cme_trained"];$cmt_status = $row["cmt_status"];}
            $result_set->close();
        }
 
        if (($cmt_cme_trained =='1') && ($cmt_status =='1'))
        {
            $sql = mysqli_query($link,"update tblgroup  SET registered_group = '1' where groupID = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG successfully Registered as Cooperative!");'; 
                echo 'window.location.href = "cmt_training_registration.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG Not Trained in CME!");'; 
            echo 'window.location.href = "cmt_training_registration.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>