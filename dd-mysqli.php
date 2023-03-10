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

@$cat=$_GET['cat']; // Use this line or below line if register_global is off
if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}

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
self.location='dd-mysqli.php?cat=' + val ;
}
//-->

</script>
</head>

<body >

<?Php

///////// Getting the data from Mysql table for first list box//////////
$query2="SELECT DISTINCT category,cat_id FROM category order by category"; 
///////////// End of query for first list box////////////


echo "<form method=post name=f1 action='dd-check.php'>";
//////////        Starting of first drop downlist /////////
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
if($stmt = $link->query("$query2")){
	while ($row2 = $stmt->fetch_assoc()) {
	if($row2['cat_id']==@$cat){echo "<option selected value='$row2[cat_id]'>$row2[category]</option>";}
else{echo  "<option value='$row2[cat_id]'>$row2[category]</option>";}

  }
}else{
echo $link->error;
}

echo "</select>";
//////////////////  This will end the first drop down list ///////////
echo "<select name='subcat'><option value=''>Select one</option>";
if(isset($cat) and strlen($cat) > 0){
if($stmt = $link->prepare("SELECT DISTINCT subcategory FROM subcategory where cat_id=? order by subcategory")){
$stmt->bind_param('i',$cat);
$stmt->execute();
 $result = $stmt->get_result();
 while ($row1 = $result->fetch_assoc()) {
  echo  "<option value='$row1[subcategory]'>$row1[subcategory]</option>";
	}

}else{
 echo $link->error;
} 

/////////
}else{
///////
$query="SELECT DISTINCT subcategory FROM subcategory order by subcategory"; 

if($stmt = $link->query("$query")){
	while ($row1 = $stmt->fetch_assoc()) {
	
echo  "<option value='$row1[subcategory]'>$row1[subcategory]</option>";

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
