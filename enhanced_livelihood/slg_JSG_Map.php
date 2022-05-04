<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG|Mapping</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     
        $Rec_ID = $_GET['id']; 

        function chk_mapped($link,$grpID)
        {
        $grp_query = mysqli_query($link,"select jsg_mapped from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);
        return $grp['jsg_mapped'];
        }

        if (chk_mapped($link,$Rec_ID) == 0)
        {
          
            $sql = mysqli_query($link,"update tblgroup  SET jsg_mapped = '1' where groupID = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Mapped successfully For JSG Interventions !");'; 
                echo 'window.location.href = "jsg_formation.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        } else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("SLG Already Mapped For JSG Interventions !");'; 
            echo 'window.location.href = "jsg_formation.php";';
            echo '</script>'; 
        }
        mysqli_close($link);
            
               
    ?>
    
</div>