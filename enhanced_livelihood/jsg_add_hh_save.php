<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG |Save New Household</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here
        
       
       
        if(isset($_POST['Submit']))
        {    
            $groupID = $_POST['groupID'];
            $DistrictID = $_POST['district'];
            $jsgID = $_POST['jsg_id'];
            $hhcode = $_POST['hhcode'];

            $check = substr($groupID, 5, 3);
            
            if ($check == "CLU"){
                $rg_query = mysqli_query($link,"select regionID from tblcluster where ClusterID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($rg_query)){
                $regionID = $rg['regionID'];}
            }
            if ($check == "SLG"){
                $rg_query = mysqli_query($link,"select regionID from tblgroup where groupID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($rg_query)){
                $regionID = $rg['regionID'];}
            }

            if  (empty($hhcode))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Please Enter Household code !");'; 
                echo 'window.location.href = "jsg_formation_check.php";';
                //header("Location: " . $_SERVER["HTTP_REFERER"]);
                echo '</script>';
            }
            else
            {
                $sql = "INSERT INTO tbljsg_hhs (sppCode,jsgID,regionID,districtID,groupID)
                VALUES ('$hhcode','$jsgID','$regionID','$DistrictID','$groupID')";
                if (mysqli_query($link, $sql)) {
                    $sql2 = mysqli_query($link,"update tblbeneficiaries  SET jsg_mapped = '1' where sppCode = '$hhcode'");    
                    $done =  $sql2; 
                    echo '<script type="text/javascript">'; 
                    echo 'alert("JSG Member Record has been added successfully !");'; 
                    echo 'window.location.href = "jsg_formation_check.php";';
                    //header("Location: " . $_SERVER["HTTP_REFERER"]);
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
                mysqli_close($link);
            }
        }
        
            function get_rname($link, $rcode)
            {
            $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['name'];
            };// fetch data
            
            }
    
            function dis_name($link, $disID)
            {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            while($dis = mysqli_fetch_array($dis_query)){
               return $dis['DistrictName'];
            };// fetch data
            
            
            }

            function ta_name($link, $taID)
            {
            $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
            $tame = mysqli_fetch_array($dis_query);// fetch data
            return $tame['TAName'];
            }

            
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    
</div>