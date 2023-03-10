<?php
include_once 'layouts/config.php';
if(isset($_POST['submit']))
{    
     
     $clustername = $_POST['clustername'];
     $GVHID = $_POST['GVHID'];
     $cohort = $_POST['Cohort'];
     $spp = $_POST['spp'];
     $cw = $_POST['cw'];
     $TAID = $_POST['ta'];
     $regionID = $_POST['region'];
     $DistrictID = $_POST['district'];

     function get_cls_count($link)
     {
        $sql = "SELECT * FROM tblcluster";
 
        $mysqliStatus = $link->query($sql);
         
        $rows_count_value = mysqli_num_rows($mysqliStatus);
         
        return $rows_count_value; 
        
     }
     
        $dbclscount= sprintf("%06d", get_cls_count($link)+1);

        $x=date("Y");		
        $x.="/CLS/";				
        $x.=$dbclscount;

        $clusterID = $x;

     $sql = "INSERT INTO tblcluster (ClusterID,ClusterName,regionID,districtID,taID,gvhID,cohort,programID,cwID,deleted)
     VALUES ('$clusterID','$clustername','$regionID','$DistrictID','$TAID','$GVHID','$cohort','$spp','$cw','0')";
     if (mysqli_query($link, $sql)) {
      echo '<script type="text/javascript">'; 
         echo 'if (confirm("Cluster Created! Add Another Cluster in the Same Area?"))';
            echo '{';
               echo 'history.go(-1)';
            echo '}';
         echo 'else';
            echo '{';
               echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
            echo '}';
      echo '</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>
