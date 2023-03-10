<?php
include_once '././../../layouts/config2.php';
if(isset($_POST['submit']))
{    
    $regionID = $_POST['region']; 
    $districtID = $_POST['district']; 
    $sectorID = $_POST['sectorID'];
    $bdsname = $_POST['bdsname'];
     
        if(($regionID != '') and ($_POST['sectorID'] != '') and ($districtID != '') and ($bdsname != '') ) {
            
            $sql = "INSERT INTO tblbds (regionID,districtID,busCat,bdsname)
            VALUES ('$regionID','$districtID','$sectorID','$bdsname')";
            if (mysqli_query($link_cs, $sql)) {
                
                echo '<script type="text/javascript">'; 
                echo 'alert("New BDS Record has been added successfully !");'; 
                echo 'window.location.href = "jsgs_bdss.php";';
                echo '</script>';
                
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
            }

          } else {
                echo '<script type="text/javascript">'; 
                echo 'alert("Fill in required values !");'; 
                echo 'window.location.href = "jsgs_bdss.php";';
                echo '</script>';
          }
     mysqli_close($link_cs);
}
?>