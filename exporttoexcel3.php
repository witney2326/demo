
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

$sql="SELECT cimis_sql.tblregion.name, COUNT(tbldistrict.DistrictName) as NoOfDistricts,COUNT(tblgroup.groupname) as NoGroups, sum(tblgroup.MembersM) as NoMales, sum(MembersF) as NoFemales, SUM(tblgroupsavings.Amount) as AmountSaved
FROM cimis_sql.tblgroup 
INNER JOIN cimis_sql.tblcw on cimis_sql.tblcw.cwID = cimis_sql.tblgroup.cwID 
inner join cimis_sql.tblgroupsavings on cimis_sql.tblgroup.groupID = cimis_sql.tblgroupsavings.GroupID
inner join cimis_sql.tbldistrict on cimis_sql.tblgroupsavings.DistrictID = cimis_sql.tbldistrict.DistrictID
inner join cimis_sql.tblregion on cimis_sql.tbldistrict.regionID = cimis_sql.tblregion.regionID
GROUP BY cimis_sql.tblregion.name"; 
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