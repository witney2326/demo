<?php
include('layouts/config.php');






 
 $id=$_POST['disid'];
 $sql = "SELECT * FROM tblta WHERE TAID='$id'";
 $result = $link->query($sql);
 $fetchRow = mysqli_fetch_array($result);
 $districtid = $fetchRow["DistrictID"];

 $stmt = mysqli_query($link,"SELECT * FROM tblcw WHERE districtID='$districtid'"); 
 ?>
 
 <option value="00" selected="selected">Select Caseworker </option><?php
 while($row=mysqli_fetch_array($stmt))
 {

  ?>
  <option value="<?php echo htmlentities($row['cwID']); ?>"><?php echo htmlentities($row['cwName']); ?></option>
<?php
 }

?>