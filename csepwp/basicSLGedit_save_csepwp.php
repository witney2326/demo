
    <?php
        include "../layouts/config.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $id = $_POST['group_id'];
            $groupname = $_POST['group_name'];
            $DateEstablished = $_POST['date_formed'];
            $gvh = $_POST['gvh'];
            $males = $_POST['no_males'];
            $females = $_POST['no_females'];
            $cluster = $_POST['cluster'];
            $cohort = $_POST['cohort'];
            $spProg = $_POST['spProg'];
            
            $sql = "UPDATE tblgroup SET groupname ='$groupname',DateEstablished = '$DateEstablished', gvhID = '$gvh', MembersM ='$males', MembersF = '$females', clusterID = '$cluster', cohort = $cohort,
            deleted = '0', programID = '$spProg' WHERE groupID = '$id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Record has been successfully edited!");'; 
                echo 'window.location.href = "csepwp_basic_livelihood_slg_mgt2.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
        }       
    ?>

    
