<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     $ta = $_POST['ta'];
     $clinicname = $_POST['clinicname'];
     $DateFormed = $_POST['DateFormed'];
     $NoOrientedF = $_POST['NoOrientedF'];
     $NoOrientedM = $_POST['NoOrientedM'];
     $DistrictID = $_POST['district'];
     $region = $_POST['region'];


     
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

        if(($_POST['region'] != '') and ($_POST['ta'] != '') and ($_POST['clinicname'] != '') and ($_POST['NoOrientedF'] != '') and ($_POST['NoOrientedM'] != '') ) {
            //do something
            $sql = "INSERT INTO tblclinics (regionID,districtID,ta,clinicname,femalesNo,malesNo,dateformed)
            VALUES ('$region','$DistrictID','$ta','$clinicname','$NoOrientedF','$NoOrientedM','$DateFormed')";
            if (mysqli_query($link, $sql)) {
                
                echo '<script type="text/javascript">'; 
                echo 'alert("New Clinic has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_pyschosocial_clinics.php";';
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