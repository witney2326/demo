<?php
include('layouts/config.php');
if(!empty($_POST["regID"])) 
{
 /*
 $id=$_POST['regID'];
 */
session_start();
$id = $_SESSION["user_dis"];

 $stmt = mysqli_query($link,"SELECT DistrictID,DistrictName FROM tbldistrict WHERE DistrictID ='$id'");
 ?><option value="00" selected="selected">Select District </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['DistrictID']); ?>"><?php echo htmlentities($row['DistrictName']); ?></option>
<?php
 }


}
?>