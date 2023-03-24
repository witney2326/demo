<?php
require_once("layouts/config.php.php");
if(!empty($_GET['region'])) {
        $coun_id = $_GET["region"];           
	$query ="SELECT * FROM tbldistrict WHERE regionID IN ($coun_id)";
	
    $result = mysqli_query($this->$link,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
?>
	<option value="">Select District</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
	}
}
?>