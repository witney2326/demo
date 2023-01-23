<?php
        include "../layouts/config.php";

        if(isset($_POST['Submit']))
        {    
            $groupID = $_POST['groupID'];
            $DistrictID = $_POST['district'];
            $groupID = $_POST['groupID'];
            $sppCode = $_POST['sppCode'];
            $nh_1 = $_POST['nh_1'];
            $nh_2 = $_POST['nh_2'];
            $nh_3 = $_POST['nh_3'];
            $nh_4 = $_POST['nh_4'];
            $nh_5 = $_POST['nh_5'];
            $nh_6 = $_POST['nh_6'];
            $nh_7 = $_POST['nh_7'];
            $nh_8 = $_POST['nh_8'];

            $check = mysqli_query($link, "SELECT id FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
            $row_check = mysqli_fetch_assoc($check); 
            $id_check = $row_check['id'];

            if  (empty($id_check))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household NOT BEING TRACKED !");'; 
                echo 'window.location.href = "graduation_hh_tracking.php";';
                echo '</script>';
            }
            else
            {
                $sql = "UPDATE tblbeneficiaries_graduating SET diet_diversification ='$nh_1',vegitable_garden ='$nh_2',small_livestock ='$nh_3', pit_latrine ='$nh_4', safe_drinking_water ='$nh_5',Other_hygiene_behaviour ='$nh_6',medical_health_care ='$nh_7',Perceived_malnutrition ='$nh_8' where sppCode ='$sppCode' ";
                mysqli_query($link, $sql);
            }
            if  (isset($id_check)){
                $sql2 = "INSERT INTO tblbeneficiaries_graduating_nh (sppCode,vegitable_garden,small_livestock,pit_latrine,safe_drinking_water,Other_hygiene_behaviour,medical_health_care,Perceived_malnutrition)
                VALUES ('$sppCode','$nh_1','$nh_2','$nh_3','$nh_4','$nh_5','$nh_6','$nh_7','$nh_8')";
                
                if (mysqli_query($link, $sql2) ){
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Nutrition Health and Sanitation Record Updated Successfully!");'; 
                    echo 'window.location.href = "graduation_hh_tracking.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
                mysqli_close($link);
            }
        }
?>