

    

    <?php
        include "layouts/config.php"; // Using database connection file here

        if(isset($_POST['Submit']))
        {
            $jsg_id = $_POST["jsg_id"];
            $jsg_name = $_POST['jsg_name'];           
            $no_males = $_POST['no_males'];
            $no_females = $_POST['no_females'];
            $initialInvest = $_POST['initialInvest'];
          
            if ( $no_males == ""){$no_males=0;}
            if ( $no_females == ""){$no_females=0;}
            
            $sql = "UPDATE tbljsg SET jsg_name ='$jsg_name', no_male ='$no_males', no_female = '$no_females', initial_invest ='$initialInvest'
            WHERE recID = '$jsg_id'";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("JSG Record has been successfully edited!");'; 
                echo 'window.location.href = "jsgs.php";';
                echo '</script>';
  
            } else {
                echo "Error updating record: " . $link->error;
            }
        }       
    ?>

    
