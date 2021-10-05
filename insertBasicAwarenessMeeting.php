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

        $DistrictID = dis_code($link,$_POST['district']); 
        $regionID = region_code($link,$_POST['region']);


     $sql = "INSERT INTO tblawareness_meetings (regionID,DistrictID,sectorID,femalesNo,malesNo,orientationDate)
     VALUES ('$regionID','$DistrictID','$sectorID','$NoOrientedF','$NoOrientedM','$orientationDate')";
     if (mysqli_query($link, $sql)) {
        echo "New Awareness and Orientation Meeting has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>