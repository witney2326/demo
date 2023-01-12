<?php
include_once '../layouts/config2.php';
if(isset($_POST['submit']))
{    
     
     $clustername = $_POST['clustername'];
     $GVHID = $_POST['GVHID'];
     $cw = $_POST['cw'];
     $TAID = $_POST['ta'];
     $regionID = $_POST['region'];
     $DistrictID = $_POST['district'];

     function get_cls_count($link_cs)
     {
        $sql = "SELECT * FROM tblcluster";
 
        $mysqliStatus = $link_cs->query($sql);
         
        $rows_count_value = mysqli_num_rows($mysqliStatus);
         
        return $rows_count_value; 
        
     }
     
        $dbclscount= sprintf("%06d", get_cls_count($link_cs)+1);

        $x=date("Y");		
        $x.="/CLS/";				
        $x.=$dbclscount;

        $clusterID = $x;

     $sql = "INSERT INTO tblcluster (ClusterID,ClusterName,regionID,districtID,taID,gvhID,cwID,deleted)
     VALUES ('$clusterID','$clustername','$regionID','$DistrictID','$TAID','$GVHID','$cw','0')";
     if (mysqli_query($link_cs, $sql)) {
      echo '<script type="text/javascript">'; 
         echo 'if (confirm("New Cluster Added! Add Another Cluster in the Same Area?"))';
            echo '{';
               echo 'history.go(-1)';
            echo '}';
         echo 'else';
            echo '{';
               echo 'history.go(-2);';
            echo '}';
      echo '</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
     }
     mysqli_close($link_cs);
}
?>
