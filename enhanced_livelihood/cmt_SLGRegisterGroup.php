

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select cmt_cme_trained,cmt_status from tblcluster where ClusterID='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $cmt_cme_trained= $row["cmt_cme_trained"];$cmt_status = $row["cmt_status"];}
            $result_set->close();
        }
 
        if (($cmt_cme_trained =='1') && ($cmt_status =='1'))
        {
            $sql = mysqli_query($link,"update tblcluster  SET registered_group = '1' where ClusterID = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG successfully Registered as Cooperative!");'; 
                echo 'window.location.href = "cmt_training_registration_check.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG Not Trained in CME!");'; 
            echo 'window.location.href = "cmt_training_registration_check.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    