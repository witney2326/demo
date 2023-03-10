<?php
include('layouts/config.php');
if(!empty($_POST["disid"])) 
{
 $id=$_POST['disid'];
 

 $stmt = mysqli_query($link,"SELECT TAID,TAName FROM tblta WHERE DistrictID ='$id'");
 ?><option selected="selected">Select TA </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['TAID']); ?>"><?php echo htmlentities($row['TAName']); ?></option>
  <?php
 }


}
?>