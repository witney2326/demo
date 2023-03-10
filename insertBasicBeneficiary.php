<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     $sppcode = $_POST['sppcode'];
     $hhname = $_POST['hhname'];
     $hhdob = $_POST['hhdob'];
     $nationalID = $_POST['nationalID'];
     $GVHID = $_POST['GVHID'];
     $village = $_POST['village'];
     $sppname = $_POST['sppname'];
     $sex = $_POST['sex'];
     $clusterID = $_POST['clusterID'];
     $groupID = $_POST['groupID'];

     function get_hh_count($link)
     {
        $sql = "SELECT * FROM tblbasic_beneficiary";
 
        $mysqliStatus = $link->query($sql);
         
        $rows_count_value = mysqli_num_rows($mysqliStatus);
         
        return $rows_count_value; 
        
     }
     
     function dis_code($link, $disname)
        {
        $dis_query = mysqli_query($link,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictID'];
        }

    function ta_code($link, $taname)
        {
        $ta_query = mysqli_query($link,"select TAID from tblta where TAName='$taname'"); // select query
        $ta = mysqli_fetch_array($ta_query);// fetch data
        return $ta['TAID'];
        }

        function region_code($link, $rname)
        {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
        }

        $dbcount= sprintf("%06d", get_hh_count($link)+1);

        $x=date("Y");		
        $x.="/BEN/";				
        $x.=$dbcount;

        $hhcode = $x;
        $DistrictID = dis_code($link,$_POST['district']); 
        $TAID = ta_code($link,$_POST['ta']);
        $regionID = region_code($link,$_POST['region']);


     $sql = "INSERT INTO tblbasic_beneficiary (hhcode,sppcode,hhname,nationalID,hhdob,regionID,districtID,taID,gvhID,village,sppname,sex,clusterID,groupID)
     VALUES ('$hhcode','$sppcode','$hhname','$nationalID','$hhdob','$regionID','$DistrictID','$TAID','$GVHID','$village','$sppname','$sex','$clusterID','$groupID')";
     if (mysqli_query($link, $sql)) {
        echo "New Household has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>