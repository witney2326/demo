<?php
include('././../../layouts/config2.php');
if(!empty($_POST["regID"])) 
{
 $id=$_POST['regID'];
 

 $stmt = mysqli_query($link_cs,"SELECT DistrictID,DistrictName FROM tbldistrict WHERE regionID ='$id'");
 ?><option selected="selected">Select District </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['DistrictID']); ?>"><?php echo htmlentities($row['DistrictName']); ?></option>
<?php
 }


}
?>