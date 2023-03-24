
<?php

include 'layouts/config.php';

if(isset($_REQUEST['btn']))
{
    
    // you can your shell script here like: 
    // shell_exec("/var/www/html/Camera/CameraScript.sh");
    $DB_TBLName = "tblgroup"; 
$filename = "cimis_savings";  //your_file_name
$file_ending = "xls";   //file_extention

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.$file_ending");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t";

$sql="SELECT tblregion.name, COUNT(tbldistrict.DistrictName) as NoOfDistricts,COUNT(tblgroup.groupname) as NoGroups, sum(tblgroup.MembersM) as NoMales, sum(MembersF) as NoFemales, SUM(tblgroupsavings.Amount) as AmountSaved
FROM tblgroup 
INNER JOIN tblcw on tblcw.cwID = tblgroup.cwID 
inner join tblgroupsavings on tblgroup.groupID = tblgroupsavings.GroupID
inner join tbldistrict on tblgroupsavings.DistrictID = tbldistrict.DistrictID
inner join tblregion on tbldistrict.regionID = tblregion.regionID
GROUP BY tblregion.name"; 
$resultt = $link->query($sql);

while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
    echo $property->name."\t";
}

print("\n");    

while($row = mysqli_fetch_row($resultt))  //fetch_table_data
{
    $schema_insert = "";
    for($j=0; $j< mysqli_num_fields($resultt);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
}
?>