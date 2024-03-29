<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Search SLG</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config2.php'; ?>
<!-- DataTables -->
    <link_cs href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link_cs href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link_cs href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link_cs rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
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

    <?php include '../layouts/vertical-menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

				<?php include '../layouts/body.php'; ?>
				<div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Search SLG</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

				<div class="col-lg-9">
					<div class="card border border-success">
						<div class="card-header bg-transparent border-success">
							<h5 class="my-0 text-success">Search Results</h5>
						</div>
						<div class="card-body">

							<table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
											
								<thead>
									<tr>
										<th>Group Code</th>   
										<th>Group Name</th>
										<th>Cluster Name</th>
										<th>District</th>

									</tr>
								</thead>


								<tbody>
									<?Php

										function dis_name($link_cs, $disID)
										{
											$dis_query = mysqli_query($link_cs,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
											$dis = mysqli_fetch_array($dis_query);// fetch data
											return $dis['DistrictName'];
										}

										$search = $_POST['search'];
						
										$sql = "select * from tblgroup where groupname = '$search'";
						
										$result = $link_cs->query($sql);
						
										if ($result->num_rows > 0){
										while($row = $result->fetch_assoc() ){
											$disname = dis_name($link_cs,$row["DistrictID"]);
											echo "<tr>\n";                                           
											echo "<td>".$row["groupID"]."</td>\n";
											echo "<td>".$row["groupname"]."</td>\n";
											echo "<td>".$row["clusterID"]."</td>\n";
											echo "<td>\t\t$disname</td>\n";
																			
											echo "<td>
											<a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' style='font-size:18px; color:purple'></i></a> 
											<a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"basicSLGdelete.php?id=".$row['groupID']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
											</td>\n";
										echo "</tr>\n";
										}
										} else {
											echo "0 records";
										}
						
										$link_cs->close();			   
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
<?php include '../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '../layouts/vendor-scripts.php'; ?>

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
