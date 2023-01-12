<?php
include_once '../layouts/config2.php';
include '../layouts/session.php';
include 'lib2.php';

if(isset($_POST['submit']))
{    
     
   $groupname = $_POST["groupname"];
   $DateEstablished = $_POST['DateEstablished'];
   $clusterID = $_POST['clusterID'];
   $GVHID = $_POST["GVHID"];
   $membersM = $_POST['membersM'];
   $membersF = $_POST['membersF'];
   $cw = $_POST['cw'];
   $regionID = $_POST['region'];
   $DistrictID = $_POST['district']; 
   $TAID = $_POST['ta'];

   
   
   function get_grp_count($link_cs)
   {
      $sql = "SELECT * FROM tblgroup";

      $mysqliStatus = $link_cs->query($sql);
      
      $rows_count_value = mysqli_num_rows($mysqliStatus);
      
      return $rows_count_value; 
      
   }
   
   

   $dbgrpcount= sprintf("%06d", get_grp_count($link_cs)+1);

   $x=date("Y");		
   $x.="/SLG/";				
   $x.=$dbgrpcount;

   $groupID = $x;

   
   
   $sql = "INSERT INTO tblgroup (groupid,groupname,DateEstablished,clusterID,DistrictID,TAID,gvhID,MembersM,MembersF,regionID,cwID,deleted)
   VALUES ('$groupID','$groupname','$DateEstablished','$clusterID','$DistrictID','$TAID','$GVHID','$membersM','$membersF','$regionID','$cw','0')";
   if (mysqli_query($link_cs, $sql)) 
   {
      echo '<script type="text/javascript">'; 
         echo 'if (confirm("SLG Added! Add Another SLG in the Same Area?"))';
            echo '{';
               echo 'history.go(-1)';
            echo '}';
         echo 'else';
            echo '{';
               echo 'window.location.href = "csepwp_basic_livelihood_slg_mgt2.php";';
            echo '}';
      echo '</script>';
   } 
   else 
   {
      echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
   }
   mysqli_close($link_cs);
      
}
?>