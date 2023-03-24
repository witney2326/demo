
<?php
      include "../layouts/config.php"; // Using database connection file here
        
      if(isset($_POST['Submit']))
          {    
          $jsg_id = $_POST['jsg_id'];
          $ldate = $_POST['ldate'];
          $rdate = $_POST['rdate'];
          $amount = $_POST['amount'];
          $period = $_POST['lperiod'];
          
          
              $sql = "INSERT INTO tblcomsiv_jsg_fin_linkage (jsg_code,ldate,rdate,period,amount)
              VALUES ('$jsg_id','$ldate','$rdate','$period','$amount')";
          if (mysqli_query($link, $sql)) {
              echo '<script type="text/javascript">'; 
              echo 'alert("JSG Loan Record has been added successfully !");'; 
              echo 'window.location.href = "jsg_fin_linkage_check.php";';
              echo '</script>';
          } else {
              echo "Error: " . $sql . ":-" . mysqli_error($link);
          }
          mysqli_close($link);
          }
    ?>

