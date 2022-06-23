<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Search Household</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
</head>
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

				<?php include 'layouts/body.php'; ?>
				<div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Search Household</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

				<div class="col-lg-12">
					<div class="card border border-success">
						<div class="card-header bg-transparent border-success">
							<h5 class="my-0 text-success">Search Results</h5>
						</div>
						<div class="card-body">

							<table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
											
								<thead>
									<tr>
										<th>HH Code</th>   
										<th>HH Name</th>
										<th>Nat. ID</th>
										<th>SLG</th>
										<th>District</th>
										<th>HH Status</th>
										<th>JSG Status</th>
										<th>YCS Status</th>
										<th>Grad. Status</th>
									</tr>
								</thead>


								<tbody>
									<?Php

										function dis_name($link, $disID)
										{
											$dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
											$dis = mysqli_fetch_array($dis_query);// fetch data
											return $dis['DistrictName'];
										}

										function grp_name($link, $grpID)
										{
											$grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
											$grp = mysqli_fetch_array($grp_query);// fetch data
											return $grp['groupname'];
										}

										$search = $_POST['search'];
						
										$sql = "select * from tblbeneficiaries where sppCode = '$search'";
						
										$result = $link->query($sql);
						
										if ($result->num_rows > 0){
										while($row = $result->fetch_assoc() ){
											$disname = dis_name($link,$row["districtID"]);
											$grpname = grp_name($link,$row["groupID"]);
											if ($row["hhstatus"]=='0'){$hhstatus = "Not Approved";}if ($row["hhstatus"]=='1'){$hhstatus = "Approved";}
											if ($row["jsg_mapped"]=='0'){$jsg_mapped = "NA";}if ($row["jsg_mapped"]=='1'){$jsg_mapped = "On JSG";}
											if ($row["ycs_mapped"]=='0'){$ycs_mapped = "NA";}if ($row["ycs_mapped"]=='1'){$ycs_mapped = "On YCS";}
											if ($row["grad_status"]=='0'){$grad_status = "NA";}if ($row["grad_status"]=='1'){$grad_status = "On Grad";}
											echo "<tr>\n";                                           
											echo "<td>".$row["sppCode"]."</td>\n";
											echo "<td>".$row["hh_head_name"]."</td>\n";
											echo "<td>".$row["nat_id"]."</td>\n";
											echo "<td>\t\t$grpname</td>\n";
											echo "<td>\t\t$disname</td>\n";
											echo "<td>\t\t$hhstatus</td>\n";	
											echo "<td>\t\t$jsg_mapped</td>\n";
											echo "<td>\t\t$ycs_mapped</td>\n";
											echo "<td>\t\t$grad_status</td>\n";							
											echo "<td>
                                                <a href=\"../basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' style='font-size:18px; color:purple'></i></a> 
                                                <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"../basicSLGMemberdelete.php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
											</td>\n";
										echo "</tr>\n";
										}
										} else {
											echo "0 records";
										}
						
										$link->close();			   
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>
