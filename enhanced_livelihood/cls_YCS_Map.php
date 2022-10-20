
    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        function chk_mapped($link,$grpID)
        {
            $grp_query = mysqli_query($link,"select ycs_mapped from tblcluster where groupID='$grpID'"); // select query
            $grp = mysqli_fetch_array($grp_query);
            return $grp['ycs_mapped'];
        }
 
        if (chk_mapped($link,$Rec_ID) == 0)
        {   
            $sql = mysqli_query($link,"update tblcluster  SET ycs_mapped = '1' where ClusterID = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Mapped successfully For YCS Interventions !");'; 
                echo 'window.location.href = "ycs_identification.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        } else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Already Mapped For YCS Interventions !");'; 
            echo 'window.location.href = "ycs_identification.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    