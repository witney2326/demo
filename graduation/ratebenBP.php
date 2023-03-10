<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Beneficiary Assesment|Beneficiary Rating</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>  
</head>

<div id="layout-wrapper">

    <?php
        include "../layouts/config.php";   
        
        $sppCode = $_POST['sppCode'];
        $rating = $_POST['rating'];

        $query="select bp_assesed,bp_assesed_result from tblbeneficiaries where sppCode='$sppCode'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $bp_assesed= $row["bp_assesed"];$bp_assesed_result = $row["bp_assesed_result"];}
            $result_set->close();
        }
 
        if (($bp_assesed =='0'))
        {
            $sql = mysqli_query($link,"update tblbeneficiaries  SET bp_assesed = '1', bp_assesed_result = '$rating' where sppCode = '$sppCode'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household successfully Rated!");'; 
                echo 'window.location.href = "graduation_selected_beneficiary_option_selection.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Rated!");'; 
            echo 'window.location.href = "graduation_selected_beneficiary_option_selection.php";';
            echo '</script>';
        }
        mysqli_close($link);          
    ?>
    
</div>