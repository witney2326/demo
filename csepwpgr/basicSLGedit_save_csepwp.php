
    <?php
        include "../layouts/config2.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $id = $_POST['group_id'];
            $groupname = $_POST['group_name'];
            $DateEstablished = $_POST['date_formed'];
            $gvh = $_POST['gvh'];
            $males = $_POST['no_males'];
            $females = $_POST['no_females'];
            $cluster = $_POST['cluster'];

            
            $sql = "UPDATE tblgroup SET groupname ='$groupname',DateEstablished = '$DateEstablished', gvhID = '$gvh', MembersM ='$males', MembersF = '$females', clusterID = '$cluster',
            deleted = '0' WHERE groupID = '$id'";
            
            if (mysqli_query($link_cs, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Record has been successfully edited!");'; 
                echo 'history.go(-2);';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link_cs->error;
            }
        }       
    ?>

    
