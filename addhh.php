<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
        <?php
                        
                include "layouts/config.php"; // Using database connection file here
                
                $region =$_POST['region'];
                $district =$_POST['district'];
                $ta =$_POST['ta'];
                $gvh =$_POST['gvh'];
                $village =$_POST['village'];

            if(isset($_POST['Submit']))
            {
                
                if(isset($_POST['region'])) {
                    $region =$_POST['region'];
                   $region = "Not Set";

                }
                if(isset($_POST['district'])) {
                    $district =$_POST['district'];
                   $district = "Not Set";

                }
                if(isset($_POST['ta'])) {
                    $ta =$_POST['ta'];
                   $ta = "Not Set";

                }
                if(isset($_POST['gvh'])) {
                    $gvh =$_POST['gvh'];
                   $gvh = "Not Set";

                }
                if(isset($_POST['village'])) {
                    $village =$_POST['village'];
                   $village = "Not Set";

                }
                

                //$hhname =  $_POST['hhname'];
                //$progcode = $_POST['progcode'];
                //$progname =  $_POST['progname'];
                //$hhcode = $_POST['hhcode'];
                //$nationalID = $_POST['nationalID'];
                //$hhdob =  $_POST['hhdob'];
                //$region = $_POST['region'];
                //$district =  $_POST['district'];
                //$ta = $_POST['ta'];
                //$gvh = $_POST['gvh'];
                //$village =  $_POST['village'];
                //$sex = $_POST['sex'];
                //$cluster =  $_POST['cluster'];
               //$group = $_POST['group'];
                    
                   
               // $result=mysqli_query($link,"insert into tblbasic_beneficiary(hhcode,sppcode,hhname,nationalID,hhdob, regionID, districtID, taID, gvhID, village, sppname, sex, clusterID, groupID ) 
               // values('$hhcode','$progcode','$hhname','$nationalID','$hhdob', '$region', '$district', '$ta', '$gvh', '$village', '$progname', '$sex, '$cluster', '$group')");
               $result=mysqli_query($link,"insert into tblbasic_beneficiary(regionID, districtID, taID, gvhID, village) values('$region', '$district', '$ta', '$gvh', '$village')");       
                if($result)
                    { mysqli_close($link); // Close connection
                        echo "succes";
                            
                } 
            }
             	
        ?>
</body>
</html>