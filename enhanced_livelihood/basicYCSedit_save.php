<?php
    include "../layouts/config.php"; // Using database connection file here

    if(isset($_POST['Submit']))
    {
        $hhcode = $_POST['hhcode'];
        $ben = $_POST['ben'];
        $voc_skill = $_POST['voc_skill'];
        $natID = $_POST['natID'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $voc = $_POST['voc'];
        $concept = $_POST['concept'];
        $conc_assesed = $_POST['conc_assesed'];
        $recid = $_POST['recid'];
        
        $sql = "UPDATE tblycs SET beneficiary ='$ben',voc_type = '$voc_skill', national_id = '$natID', dob ='$dob', gender = '$gender'
        WHERE recID = '$recid'";
        
        if (mysqli_query($link, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("YCS Record has been successfully edited!");'; 
            echo 'window.location.href = "ycs_identification_check.php";';
            echo '</script>';

        } else {
            echo "Error updating record: " . $link->error;
        }
    }       
?>

    
