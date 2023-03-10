<?php 
    include 'layouts/config.php'; 

    if(isset($_POST['Submit']))
        {
            $hhcode = $_POST['hhcode'];
            $regionID = $_POST['region'];
            $groupID = $_POST['group_id'];
            $DistrictID = $_POST['district'];
            $trainingtype = $_POST['trainingtype'];
            $startdate = $_POST['startdate'];
            $finishdate = $_POST['finishdate'];
            $trainedby = $_POST['trainedby'];

            
            
                $sql = "INSERT INTO tblmembertrainings (regionID,districtID,groupID,sppCode,trainingTypeID,startDate,finishDate,trainedBy)
                VALUES ('$regionID ','$DistrictID','$groupID','$hhcode','$trainingtype','$startdate','$finishdate','$trainedby')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'if (confirm("Household Training Recorded Successfully! Add another Training Record For Household?"))';
                    echo '{';
                        echo 'history.go(-1)';
                        echo '}';
                    echo 'else';
                        echo '{';
                        //echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
                        echo 'history.go(-2)';
                    echo '}';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
        }
             
?>

        
