<?php
include_once 'layouts/config.php';
if(isset($_POST['Submit']))
{    
     $region = $_POST['region'];
     $district = $_POST['district'];
     $hotspot = $_POST['hotspot'];
     $issue = $_POST['issue'];
     $chance = $_POST['chance'];
     
     
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

        
        $region = region_code($link,$_POST['region']);

        if(($_POST['region'] != '') and ($_POST['district'] != '') and ($_POST['hotspot'] != '') and ($_POST['issue'] != '') and ($_POST['chance'] != '') ) {
            //do something
            $sql = "INSERT INTO tblhotspot (region,districtID,place,issueID,probability)
            VALUES ('$region','$district','$hotspot','$issue','$chance')";
            if (mysqli_query($link, $sql)) {
                
                echo '<script type="text/javascript">'; 
                echo 'alert("New hotspot has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_cbdra.php";';
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