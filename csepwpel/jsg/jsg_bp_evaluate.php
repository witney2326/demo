
<?php
    include "././../../layouts/config2.php"; // Using database connection file here     
    
    $grpID = $_POST['grpID'];
    $rating = $_POST['rating'];

    
    $query="select bp_submitted,bp_evaluated from tbljsg where recID='$grpID'";
    
    if ($result_set = $link_cs->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { $bp_submitted= $row["bp_submitted"];$bp_evaluated = $row["bp_evaluated"];}
        $result_set->close();
    }

    if (($bp_submitted =='1') and ($bp_evaluated =='0'))
    {
        $sql = mysqli_query($link_cs,"update tbljsg  SET bp_evaluated = '1', evaluation_result = '$rating' where recID = '$grpID'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
            echo 'alert("JSG successfully Rated!");'; 
            echo 'window.location.href = "jsgs_business_plans_check.php";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("JSG Already Rated! OR JSG does not have a BP");'; 
        echo 'window.location.href = "jsgs_business_plans_check.php";';
        echo '</script>';
    }
    mysqli_close($link_cs);
        
            
?>
    
