<?php
    include_once '././../../layouts/config2.php';
    if(isset($_POST['submit']))
    {    
        $sectorID = $_POST['sectorID'];
        $orientationDate = $_POST['orientationDate'];
        $NoOrientedF = $_POST['NoOrientedF'];
        $NoOrientedM = $_POST['NoOrientedM'];
        
        function dis_code($link_cs, $disname)
            {
            $dis_query = mysqli_query($link_cs,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
            $dis = mysqli_fetch_array($dis_query);// fetch data
            return $dis['DistrictID'];
        }

        function region_code($link_cs, $rname)
            {
            $rg_query = mysqli_query($link_cs,"select regionID from tblregion where name='$rname'"); // select query
            $rg = mysqli_fetch_array($rg_query);// fetch data
            return $rg['regionID'];
        }

            $DistrictID = $_POST['district']; 
            $regionID = $_POST['region'];

            if(($_POST['region'] != '') and ($_POST['sectorID'] != '') and ($_POST['purpose'] != '') and ($_POST['NoOrientedF'] != '') and ($_POST['NoOrientedM'] != '') ) {
                $sql = "INSERT INTO tblawareness_meetings (regionID,DistrictID,sectorID,femalesNo,malesNo,orientationDate)
                VALUES ('$regionID','$DistrictID','$sectorID','$NoOrientedF','$NoOrientedM','$orientationDate')";
                if (mysqli_query($link_cs, $sql)) {
                    
                    echo '<script type="text/javascript">'; 
                        echo 'if (confirm("New Awareness and Orientation Meeting has been added Successfully! Add Another Meeting in the Same Area?"))';
                            echo '{';
                            echo 'history.go(-2)';
                            echo '}';
                        echo 'else';
                            echo '{';
                            echo 'window.location.href = "csepwp_basic_livelihood_meetings.php";';
                        echo '}';
                    echo '</script>';
                    
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
            } else {
                echo '<script type="text/javascript">';
                    echo 'if (confirm("Incorrect Values Filled,,Please Fill in the Form with Correct Values!"))'; 
                    echo '{';
                        echo 'history.go(-1)';
                        echo '}';
                    
                    
                echo '</script>';
            }
        mysqli_close($link_cs);
    }
?>

        