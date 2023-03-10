<?php
include('layouts/config.php');

 $id=$_POST['cwID'];

 $stmt = mysqli_query($link,"SELECT cwID, districtID, cwName FROM tblcw");
 ?><option selected="selected">Select Caseworker </option><?php
 while($row=mysqli_fetch_array($stmt))
 {

  ?>
  <option value="<?php echo htmlentities($row['cwID']); ?>"><?php echo htmlentities($row['cwName']); ?></option>
<?php
 }

?>