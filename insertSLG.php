<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     $groupID = $_POST['groupID'];
     $groupname = $_POST['groupname'];
     $DateEstablished = $_POST['DateEstablished'];
     $clusterID = $_POST['clusterID'];
     $GVHID = $_POST['GVHID'];
     $membersM = $_POST['membersM'];
     $membersF = $_POST['membersF'];
     
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

        $DistrictID = dis_code($link,$_POST['district']); 
        $TAID = ta_code($link,$_POST['ta']);
        $regionID = region_code($link,$_POST['region']);


     $sql = "INSERT INTO tblgroup (groupid,groupname,DateEstablished,clusterID,DistrictID,TAID,gvhID,MembersM,MembersF,regionID)
     VALUES ('$groupID','$groupname','$DateEstablished','$clusterID','$DistrictID','$TAID','$GVHID','$membersM','$membersF','$regionID')";
     if (mysqli_query($link, $sql)) {
        echo "New SLG has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>