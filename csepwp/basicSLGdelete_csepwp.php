
    <?php
        include "../layouts/config2.php"; // Using database connection file here

        
        
            $id = $_GET['id'];
                     
            
            $sql = "UPDATE tblgroup SET deleted ='1' WHERE groupID = '$id'";
            $sql2 = "DELETE from tblbeneficiaries WHERE groupID = '$id'";
            $sql3 = "DELETE from tblgroup_iga WHERE groupID = '$id'";
            $sql4 = "DELETE from tblgroupincome WHERE groupID = '$id'";
            $sql5 = "DELETE from tblgroupinvestments WHERE groupID = '$id'";
            $sql6 = "DELETE from tblgroupsavings WHERE groupID = '$id'";
            $sql7 = "DELETE from tblgrouptrainings WHERE groupID = '$id'";
            $sql8 = "DELETE from tbljsg WHERE groupID = '$id'";
            $sql9 = "DELETE from tbljsg_hhs WHERE groupID = '$id'";
            $sql10 = "DELETE from tblmembertrainings WHERE groupID = '$id'";
            $sql11 = "DELETE from tblsafeguard_group_plans WHERE groupID = '$id'";
            $sql12 = "DELETE from tblslg_member_iga WHERE groupID = '$id'";
            $sql13 = "DELETE from tblslg_member_loans WHERE groupID = '$id'";
            $sql14 = "DELETE from tblslg_member_savings WHERE groupID = '$id'";
            $sql15 = "DELETE from tblycs WHERE groupID = '$id'";


            
            if ((mysqli_query($link_cs, $sql)) && (mysqli_query($link_cs, $sql2)) && (mysqli_query($link_cs, $sql3)) && (mysqli_query($link_cs, $sql4)) && (mysqli_query($link_cs, $sql5)) && (mysqli_query($link_cs, $sql6)) && (mysqli_query($link_cs, $sql7) &&
            (mysqli_query($link_cs, $sql8))) && (mysqli_query($link_cs, $sql9)) && (mysqli_query($link_cs, $sql10)) && (mysqli_query($link_cs, $sql11)) && (mysqli_query($link_cs, $sql12)) && (mysqli_query($link_cs, $sql13)) && (mysqli_query($link_cs, $sql14)) && (mysqli_query($link_cs, $sql15)) ) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Record Successfully DELETED and Corresponding Records in the Database!");'; 
                echo 'window.location.href = "csepwp_basic_livelihood_slg_mgt2.php";';
                echo '</script>';
  
            } else {
                echo "Error deleting record: " . $link_cs->error;
            }
               
    ?>

    
