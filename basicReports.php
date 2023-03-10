<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Basic Reports | Basic Livelihood</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php   include 'layouts/menu.php'; 
            include 'layouts/config.php';
    
        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
        $row = mysqli_fetch_assoc($result); 
        $hh_beneficiaries = $row['value_sum'];

        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS grps FROM tblgroup WHERE deleted = 0'); 
        $row = mysqli_fetch_assoc($result); 
        $number_grps = $row['grps'];

        $result = mysqli_query($link, 'SELECT COUNT(ClusterID) AS clusters FROM tblcluster WHERE deleted = 0'); 
        $row = mysqli_fetch_assoc($result); 
        $number_cls = $row['clusters'];

        $result = mysqli_query($link, 'SELECT COUNT(meetingID) AS meetings FROM tblawareness_meetings'); 
        $row = mysqli_fetch_assoc($result); 
        $number_meetings = $row['meetings'];

        $result = mysqli_query($link, 'SELECT SUM(amount) AS recorded_savings FROM tblslg_member_savings'); 
        $row = mysqli_fetch_assoc($result); 
        $hh_savings = $row['recorded_savings'];

        $result = mysqli_query($link, 'SELECT SUM(Amount) AS grp_savings FROM tblgroupsavings'); 
        $row = mysqli_fetch_assoc($result); 
        $grp_savings = $row['grp_savings'];

        $result = mysqli_query($link, 'SELECT SUM(Males) AS males_trained FROM tblgrouptrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $males_trained = $row['males_trained'];

        $result = mysqli_query($link, 'SELECT SUM(Females) AS females_trained FROM tblgrouptrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $females_trained = $row['females_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(distinct sppCode) AS households_trained FROM tblmembertrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $households_trained = $row['households_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(clusterID) AS animators_trained FROM tblanimatortrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $animators_trained = $row['animators_trained'];
        
        $result = mysqli_query($link, 'SELECT COUNT(TrainingID) AS animators_trained_acsa  FROM tblanimatortrainings where (TrainingTypeID = "13" and animatorType = "06")'); 
        $row = mysqli_fetch_assoc($result); 
        $animators_trained_acsa = $row['animators_trained_acsa'];

        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS members_trained_acsa  FROM tblmembertrainings where (TrainingTypeID = "13")'); 
        $row = mysqli_fetch_assoc($result); 
        $members_trained_acsa = $row['members_trained_acsa'];
        
        $result = mysqli_query($link, 'SELECT COUNT(TrainID) AS male_trainers_trained  FROM tbltottraining where (gender = "M")'); 
        $row = mysqli_fetch_assoc($result); 
        $male_trainers_trained = $row['male_trainers_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(TrainID) AS female_trainers_trained  FROM tbltottraining where (gender = "F")'); 
        $row = mysqli_fetch_assoc($result); 
        $female_trainers_trained = $row['female_trainers_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(id) AS adopted_places  FROM tbladoptplace'); 
        $row = mysqli_fetch_assoc($result); 
        $adopted_places = $row['adopted_places'];

        $result = mysqli_query($link, 'SELECT COUNT(id) AS hotspots  FROM tblhotspot'); 
        $row = mysqli_fetch_assoc($result); 
        $hotspots = $row['hotspots'];

        $result = mysqli_query($link, 'SELECT COUNT(distinct groupID) AS esmps  FROM tblsafeguard_group_plans'); 
        $row = mysqli_fetch_assoc($result); 
        $esmps = $row['esmps'];

        $result = mysqli_query($link, 'SELECT COUNT( planID) AS esmps_with_issues  FROM tblsafeguard_group_plans where (achieved_date > finishdate)'); 
        $row = mysqli_fetch_assoc($result); 
        $esmps_with_issues = $row['esmps_with_issues'];


    ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Basic Livelihood Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Basic Livelihood Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Report Category</th>
                                                <th>National Summary</th>
                                                <th>District Summary</th>
                                                <th>Case Worker Summary</th>
                                                <th>Detailed Report</th>
                                                <th>Report Main Statistic</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Sensitization and Awareness</td>
                                                <td><a href="basic_livelihood_sensitization_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_sensitization_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_sensitization_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_sensitization_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($number_meetings); ?> Meeting(s)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>SLG Mobilisation</td>
                                                <td><a href="basic_livelihood_HH_Nat_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_HH_Dis_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_HH_CW_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_SLG_reports1.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($number_grps); ?></td>
                                            </tr>
                                           
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Cluster Mobilisation</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_CLS_Summary_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_CLS_reports1.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($number_cls); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Household Mobilisation</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_HH_Ben_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($hh_beneficiaries); ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Group Savings </td>
                                                <td><a href="basic_livelihood_savings_nat_summary_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_savings_dis_summary_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_savings_CW_summary_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_savings_CW_summary_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($grp_savings,2); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Household Savings </td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_savings_members_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($hh_savings,2); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>SLG Training</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href="basic_livelihood_SLG_training_reports.php"><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($males_trained); echo ' males;'; echo" "; echo number_format($females_trained); echo ' females'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Cluster Training</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td></td>
                                            </tr>                                          
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Household Training</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($households_trained); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>Animator Training</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($animators_trained); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td>ACSA Training</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($animators_trained_acsa);  echo ' Lead Farmer(s)';echo number_format($members_trained_acsa);  echo ' Ordinary Member(s)'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td>Trainer Of Trainer</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($male_trainers_trained); echo" "; echo 'Male(s)'; echo "; "; echo number_format($female_trainers_trained); echo " "; echo 'Female(s)'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">13</th>
                                                <td>Adopt a Place</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($adopted_places);  echo ' Adopted Place(s)'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">14</th>
                                                <td>Disaster Hotspots</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($hotspots);  echo ' Hotspot(s)'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">15</th>
                                                <td>ESMPs</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($esmps);  echo ' ESMP(s)'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">16</th>
                                                <td>ESMPs Progress</td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><a href=""><i class="fa fa-file" style='font-size:24px' aria-hidden="true"></i></a></td>
                                                <td><?php echo number_format($esmps_with_issues);  echo ' ESMP(s) Out of Schedule'; ?></td>
                                            </tr>                                 
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                </div>
                <!-- end row -->

                
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<script src="assets/js/app.js"></script>

</body>

</html>