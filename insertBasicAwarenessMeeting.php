<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     $sectorID = $_POST['sectorID'];
     $orientationDate = $_POST['orientationDate'];
     $NoOrientedF = $_POST['NoOrientedF'];
     $NoOrientedM = $_POST['NoOrientedM'];
     
    function dis_code($link, $disname)
        {
        $dis_query = mysqli_query($link,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictID'];
    }

    function region_code($link, $rname)
        {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
    }

        $DistrictID = $_POST['district']; 
        $regionID = region_code($link,$_POST['region']);

        if(($_POST['region'] != '') and ($_POST['sectorID'] != '') and ($_POST['purpose'] != '') and ($_POST['NoOrientedF'] != '') and ($_POST['NoOrientedM'] != '') ) {
            //do something
            $sql = "INSERT INTO tblawareness_meetings (regionID,DistrictID,sectorID,femalesNo,malesNo,orientationDate)
            VALUES ('$regionID','$DistrictID','$sectorID','$NoOrientedF','$NoOrientedM','$orientationDate')";
            if (mysqli_query($link, $sql)) {
                
                echo '<script type="text/javascript">'; 
                echo 'alert("New Awareness and Orientation Meeting has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_meetings.php";';
                echo '</script>';
                
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            // end here

          } else {
            //user leaved default value for dropdown, tell him that:
            echo "Please select valid value from dropdown list";
          }

     
     mysqli_close($link);
}
?>