<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>YCS Business Concept|Rating</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>  
</head>

<div id="layout-wrapper">

    <?php
        include "../layouts/config.php";   
        
        $hhID = $_POST['hhID'];
        $rating = $_POST['rating'];

        
        $query="select bc_assesed,bc_assesed_result from tblycs where hh_code='$hhID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $bc_assesed= $row["bc_assesed"];$bc_assesed_result = $row["bc_assesed_result"];}
            $result_set->close();
        }
 
        if (($bc_assesed =='0'))
        {
            $sql = mysqli_query($link,"update tblycs  SET bc_assesed = '1', bus_concept_developed = '1', bc_assesed_result = '$rating' where hh_code = '$hhID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("YCS Record successfully Rated!");'; 
                echo 'window.location.href = "youths.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("YCS Record Already Rated!");'; 
            echo 'window.location.href = "youths.php";';
            echo '</script>';
        }
        mysqli_close($link);          
    ?>
    
</div>