
<?php
    include "../layouts/config.php"; // Using database connection file here     
    
    $Rec_ID = $_GET['id']; 

    $query="select lesp_assesed,lesp_assesed_result from tblcluster where ClusterID='$Rec_ID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $lesp_assesed= $row["lesp_assesed"];$lesp_assesed_result = $row["lesp_assesed_result"];}
        $result_set->close();
    }

    if (($lesp_assesed =='1') && ($lesp_assesed_result =='2'))
    {
        $sql = mysqli_query($link,"update tblcluster  SET lesp_status = '1' where ClusterID = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Cluster Successfully Put on LESP Programme!");'; 
            echo 'history.go(-1)';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert(" Either Cluster Has Not Been Assessed OR Check Assesment Results!");'; 
        echo 'history.go(-1)';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>
    