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
    function grp_name($link, $clID)
    {
        $rg_query = mysqli_query($link,"select groupname from tblgroup where groupID='$clID'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['groupname'];
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

    function iga_name($link, $igaID)
         {
         $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
         $iga = mysqli_fetch_array($iga_query);// fetch data
         return $iga['name'];
         }
    
    function ta_name($link, $taID)
        {
        $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
        $taname = mysqli_fetch_array($ta_query);// fetch data
        return $taname['TAName'];
    }
    
        function prog_name($link, $progID)
        {
        $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
        $prog = mysqli_fetch_array($prog_query);// fetch data
        return $prog['progName'];
        }

        
        function bus_cat_name($link, $catID)
        {
        $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

         function clsname($link, $clscode)
         {
         $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['ClusterName'];
         }

         function purpose_name($link, $purposeid)
         {
         $rg_query = mysqli_query($link,"select purpose from tbladoptplacepurpose where id='$purposeid'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['purpose'];
         }

         function cluster_name($link, $clsID)
        {
        $grp_query = mysqli_query($link,"select clustername from tblcluster where clusterID='$clsID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['clustername'];
        }

        function region_code($link, $rname)
        {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
        }

        function rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function cat_name($link, $catID)
        {
        $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

        function activity_name($link, $activityID)
        {
        $act_query = mysqli_query($link,"select action from tblsafeguards_mitigation_activity where activityID='$activityID'"); // select query
        $act = mysqli_fetch_array($act_query);// fetch data
        return $act['action'];
        }

        function indicator_name($link, $indicatorID)
        {
        $indi_query = mysqli_query($link,"select indicator from tblsafeguard_indicators where indicatorID='$indicatorID'"); // select query
        $indi = mysqli_fetch_array($indi_query);// fetch data
        return $indi['indicator'];
        }

        function user_position($link, $roleID)
        {
        $role_query = mysqli_query($link,"select rolename as position from userroles where roleid='$roleID'"); // select query
        $position = mysqli_fetch_array($role_query);// fetch data
        return $position['position'];
        }


        
    ?>
    
</div>