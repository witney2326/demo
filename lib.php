<?php
    
    function dis_code($link, $disname)
    {
        $dis_query = mysqli_query($link,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);
        return $dis['DistrictID'];
    }

    function r_code($link, $rname)
    {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['regionID'];
    }

    function dis_name($link, $disID)
    {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);
        return $dis['DistrictName'];
    }

    function cls_name($link, $clID)
    {
        $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clID'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['ClusterName'];
    }

    function r_name($link, $rcode)
    {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
    }

    function tname($link, $tcode)
    {
        $rg_query = mysqli_query($link,"select TAName from tblta where TAID='$tcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAName'];
    }

    function tcode($link, $tname)
    {
        $rg_query = mysqli_query($link,"select TAID from tblta where TAName='$tname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAID'];
    }

    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
    }

    
    ?>
    
</div>