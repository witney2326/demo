<?php
include('layouts/config.php');






 
 $id=$_POST['disid'];

 $stmt = mysqli_query($link,"SELECT * FROM cw WHERE TAID='$id'"); 
 ?>
 
 <option value="00" selected="selected">Select Caseworker </option><?php
 while($row=mysqli_fetch_array($stmt))
 {

  ?>
  <option value="<?php echo htmlentities($row['cwID']); ?>"><?php echo htmlentities($row['cwName']); ?></option>
<?php
 }

?>