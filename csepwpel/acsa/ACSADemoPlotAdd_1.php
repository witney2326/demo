<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>ACSA |Add Demo Plot</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

</head>

<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; 
          include '../lib2.php';
    ?>

    <?php
        include "././../../layouts/config2.php"; // Using database connection file here
       
        if(isset($_POST['Submit']))
            {    
                $clusterID = $_POST['group_id'];
                $DistrictID = dis_code($link_cs,$_POST['district']);
                $region = region_code($link_cs,$_POST['region']);
                $ta = tcode($link_cs,$_POST['ta']);
                $plot = $_POST['plot'];
                $acreage = $_POST['acreage'];

                if (isset($plot) and  ($acreage > 0))
                {
                    $sql = "INSERT INTO tblacsademoplot (region,districtID,ta,cluster,plot,acreage)
                    VALUES ('$region','$DistrictID','$ta','$clusterID','$plot','$acreage')";
                
                    if (mysqli_query($link_cs, $sql)) 
                    {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("ACSA Demo Plot Record has been added successfully !");'; 
                        echo 'history.go(-2);';
                        echo '</script>';
                    } 
                    else 
                        {echo "Error: " . $sql . ":-" . mysqli_error($link_cs);}
                }
                else
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Please Fill in Demo Plot name or Plot Size !");'; 
                    echo 'history.go(-1);';
                    echo '</script>'; 
                }
            mysqli_close($link_cs);
            }
        
        

    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    
</div>