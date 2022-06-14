<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     
     $groupname = $_POST['groupname'];
     $DateEstablished = $_POST['DateEstablished'];
     $clusterID = $_POST['clusterID'];
     $GVHID = $_POST['GVHID'];
     $membersM = $_POST['membersM'];
     $membersF = $_POST['membersF'];
     $cohort = $_POST['Cohort'];
     $spp = $_POST['spp'];
     $cw = $_POST['cw'];
     $regionID = $_POST['region'];
     $DistrictID = $_POST['district']; 
     $TAID = $_POST['ta'];
     
     function get_grp_count($link)
     {
        $sql = "SELECT * FROM tblgroup";
 
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

        $dbgrpcount= sprintf("%06d", get_grp_count($link)+1);

        $x=date("Y");		
        $x.="/SLG/";				
        $x.=$dbgrpcount;

        $groupID = $x;

        
     $sql = "INSERT INTO tblgroup (groupid,groupname,DateEstablished,clusterID,DistrictID,TAID,gvhID,MembersM,MembersF,regionID,cohort,programID,cwID,deleted)
     VALUES ('$groupID','$groupname','$DateEstablished','$clusterID','$DistrictID','$TAID','$GVHID','$membersM','$membersF','$regionID','$cohort','$spp','$cw','0')";
     if (mysqli_query($link, $sql)) {
      echo '<script type="text/javascript">'; 
      echo 'alert("New SLG has been added successfully !");'; 
      echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
      echo '</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>