
<?php
    include "../layouts/config.php"; // Using database connection file here     
    
    $Rec_ID = $_GET['id']; 

    $query="select cmt_assesed,cmt_assesed_result from tblgroup where groupID='$Rec_ID'";
    
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $cmt_assesed= $row["cmt_assesed"];$cmt_assesed_result = $row["cmt_assesed_result"];}
        $result_set->close();
    }

    if (($cmt_assesed =='1') && ($cmt_assesed_result =='2'))
    {
        $sql = mysqli_query($link,"update tblgroup  SET cmt_status = '1' where groupID = '$Rec_ID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG successfully Put on CME!");'; 
            echo 'window.location.href = "cmt_group_assesment.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert(" Either SLG Has Not Been Assessed OR Check Assesment Results!");'; 
        echo 'window.location.href = "cmt_group_assesment.php";';
        echo '</script>';
    }
    mysqli_close($link);
        
            
?>
    