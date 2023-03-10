<?php
include_once '././../../layouts/config2.php';
if(isset($_POST['Submit']))
{    
    $groupID = $_POST["group_code"];
    $district= $_POST["district"];
    $buscat = $_POST['buscat'];
    $iga = $_POST['iga'];
    $males = $_POST["males"];
    $females = $_POST["females"];
    $jsg_name = $_POST['jsg_name'];
    $mapped =$_POST['mapped'];

    if ($mapped == '1')
     {
        if (isset($jsg_name)&&(($males>0)||($females>0)))
        {
            $sql = "INSERT INTO tbljsg (groupID,districtID,bus_category,type,jsg_name,no_male,no_female)
            VALUES ('$groupID','$district','$buscat','$iga','$jsg_name','$males','$females')";
            
            if (mysqli_query($link_cs, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("JSG Record has been added successfully !");'; 
                echo 'window.location.href = "jsg_formation_check.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("JSG has no name or no members !");'; 
            echo 'window.location.href = "jsg_formation_check.php";';
            echo '</script>';
        }
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Group Not Mapped For Joint Skill Groups!");'; 
        echo 'window.location.href = "jsg_formation_check.php";';
        echo '</script>';
    }
    mysqli_close($link_cs);
            
}
?>