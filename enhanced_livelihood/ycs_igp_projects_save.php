<?php
    include '../layouts/config.php';
    include '../lib.php';
   
        if(isset($_POST['Submit']))
            { 
            $hh_code = $_POST["hh_code"];
            $btype= iga_type($link,$_POST["btype"]);
            $igp_name = $_POST['igp_name'];
            $sdate = $_POST["sdate"];
            $fdate = $_POST["fdate"];
            $capital = $_POST['capital'];
            
                $sql1 = mysqli_query($link,"update tblycs  SET igp = '1' where hh_code = '$hh_code'");
            
                $sql = "INSERT INTO tblycs_igp (hh_code,btype,igp_name,sdate,fdate,capital)
                VALUES ('$hh_code','$btype','$igp_name','$sdate','$fdate','$capital')";
                
            if (mysqli_query($link, $sql) and $sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("YCS IGP Record has been added successfully !");'; 
                echo 'window.location.href = "ycs_igp_check.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }

        
?>
