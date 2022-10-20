<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{    
    $groupID = $_POST["group_code"];
    $district= $_POST["district"];
    $voc = $_POST['voc'];
    
    $ml_code = $_POST["ml_code"];
    $youth_NID = $_POST["youth_NID"];
    $youth_name = $_POST["youth_name"];
    $gender = $_POST["gender"];
    $ben_dob = $_POST['ben_dob'];
    $mapped =$_POST['mapped'];

    if ($mapped == '1')
     {
        $my_sql = mysqli_query($link,"update tblbeneficiaries  SET ycs_mapped = '1' where sppCode = '$ml_code'");

        if ((isset($youth_name))&&(isset($ml_code))&&(isset($youth_NID))&&(isset($voc)))
        {
            $sql = "INSERT INTO tblycs (groupID,districtID,voc_type,hh_code,national_id,beneficiary,gender,dob)
            VALUES ('$groupID','$district','$voc','$ml_code','$youth_NID','$youth_name','$gender','$ben_dob')";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("YCS Record has been added successfully !");'; 
                echo 'window.location.href = "ycs_identification_check.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("YCS has either no name or no ML Code or no National ID or no vocational skill selected  !");'; 
            echo 'window.location.href = "ycs_identification_check.php";';
            echo '</script>';
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Group Not Mapped For Youth Challenge Support!");'; 
        echo 'window.location.href = "ycs_identification.php";';
        echo '</script>';
    }
    mysqli_close($link);
            
}
?>