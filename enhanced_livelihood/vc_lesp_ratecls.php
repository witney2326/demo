

    <?php
        include "../layouts/config.php"; // Using database connection file here     
        
        $grpID = $_POST['grpID'];
        $rating = $_POST['rating'];

        
        $query="select lesp_assesed,lesp_assesed_result from tblcluster where ClusterID='$grpID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $lesp_assesed= $row["lesp_assesed"];$lesp_assesed_result = $row["lesp_assesed_result"];}
            $result_set->close();
        }
 
        if (($lesp_assesed =='0') and ($rating == '2'))
        {
            $sql = mysqli_query($link,"update tblcluster  SET  lesp_assesed = '1', lesp_assesed_result = '$rating' where ClusterID = '$grpID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster Successfully Rated For LESP Programme!");'; 
                echo 'history.go(-1)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        if (($lesp_assesed =='0') and ($rating == '1'))
        {
            $sql = mysqli_query($link,"update tblcluster  SET lesp_status = '0', lesp_assesed = '1', lesp_assesed_result = '$rating' where ClusterID = '$grpID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Cluster successfully Rated For LESP Programme!");'; 
                echo 'history.go(-1)';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        if (($lesp_assesed =='1'))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Already Rated!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    