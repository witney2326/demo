<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************

require 'layouts/config.php';
//////// End of connecting to database ////////

@$cat=$_GET['regionID']; // Use this line or below line if register_global is off


?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Multiple drop down list box from plus2net</title>
<SCRIPT language=JavaScript>
//<!--
function reload(form)
{
    
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='dd-mysqli1.php?cat=' + val ;
}
//-->

</script>
</head>

<body >

<?Php

///////// Getting the data from Mysql table for first list box//////////
$query2="SELECT  name,regionID FROM tblregion"; 
///////////// End of query for first list box////////////


echo "<form method=post name=f1 action='dd-check.php'>";
//////////        Starting of first drop downlist /////////
echo "<select name='name' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
if($stmt = $link->query("$query2")){
	while ($row2 = $stmt->fetch_assoc()) {
	
echo  "<option value='$row2[regionID]'>$row2[name]</option>";}

  }



echo "</select>";
//////////////////  This will end the first drop down list ///////////
echo "<select name='DistrictName'><option value=''>Select one</option>";
@$cat = $row2['regionID'];
if(isset($cat)){
if($stmt = $link->prepare("SELECT  DistrictName, DistrictID FROM tbldistrict where regionID=?")){
$stmt->bind_param('i',$cat);
$stmt->execute();
 $result = $stmt->get_result();
 while ($row1 = $result->fetch_assoc()) {
  echo  "<option value='$row1[DistrictID]'>$row1[DistrictName]</option>";
	}

}else{
 echo $link->error;
} 

/////////
}else{
///////
$query="SELECT DISTINCT DistrictName, DistrictID FROM tbldistrict order by DistrictName"; 

if($stmt = $link->query("$query")){
	while ($row1 = $stmt->fetch_assoc()) {
	
echo  "<option value='$row1[DistrictID]'>$row1[DistrictName]</option>";

  }
}else{
echo $link->error;
}

} 
////////// end of query for second subcategory drop down list box ///////////////////////////
echo "</select>";
//////////////////  This will end the second drop down list ///////////

echo "<input type=submit value='Submit'></form>";

?>
<br><br>
<a href=dd-mysqli.php>Reset and start again</a>
<br><br>
<center><a href='http://www.plus2net.com' rel="nofollow">PHP SQL HTML free tutorials and scripts</a></center> 
</body>

</html>
