<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>ACSA |Add Demo Plot</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
       
        if(isset($_POST['Submit']))
            {    
                $clusterID = $_POST['group_id'];
                $DistrictID = dis_code($link,$_POST['district']);
                $region = region_code($link,$_POST['region']);
                $ta = tcode($link,$_POST['ta']);
                $plot = $_POST['plot'];
                $acreage = $_POST['acreage'];

                if (isset($plot) and  ($acreage > 0))
                {
                    $sql = "INSERT INTO tblacsademoplot (region,districtID,ta,cluster,plot,acreage)
                    VALUES ('$region','$DistrictID','$ta','$clusterID','$plot','$acreage')";
                
                    if (mysqli_query($link, $sql)) 
                    {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("ACSA Demo Plot Record has been added successfully !");'; 
                        echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
                        echo '</script>';
                    } 
                    else 
                        {echo "Error: " . $sql . ":-" . mysqli_error($link);}
                }
                else
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Please Fill in Demo Plot name or Plot Size !");'; 
                    echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
                    echo '</script>'; 
                }
            mysqli_close($link);
            }
        
        function dis_code($link, $disname)
        {
        $dis_query = mysqli_query($link,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictID'];
        }

        function region_code($link, $rname)
        {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
        }


            
        function dis_name($link, $disID)
        {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            $dis = mysqli_fetch_array($dis_query);
            return $dis['DistrictName'];
        }

        function cls_name($link, $clID)
        {
            $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clID'"); // select query
            $rg = mysqli_fetch_array($rg_query);
            return $rg['ClusterName'];
        }

        function rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function tname($link, $tcode)
        {
        $rg_query = mysqli_query($link,"select TAName from tblta where TAID='$tcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAName'];
        }

        function tcode($link, $tname)
        {
        $rg_query = mysqli_query($link,"select TAID from tblta where TAName='$tname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAID'];
        }

    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    
</div>