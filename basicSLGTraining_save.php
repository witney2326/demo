<?php
        include "layouts/config.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $training_id = $_POST['training_id'];
            $trainingtype = $_POST['trainingtype'];
            $trainedby = $_POST['trainedby'];
            $malesn = $_POST['malesn'];
            $femalesn = $_POST['femalesn'];
            $startdate = $_POST['startdate'];
            $finishdate = $_POST['finishdate']; 

            
            $sql = "UPDATE tblgrouptrainings SET TrainingTypeID ='$trainingtype',trainedBy = '$trainedby', Males = '$malesn', Females ='$femalesn', StartDate = '$startdate', FinishDate = '$finishdate' WHERE TrainingID = '$training_id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Training Record has been successfully edited!");'; 
                echo 'history.go(-2);';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
        }       
    ?>
