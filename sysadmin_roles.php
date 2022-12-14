<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Form Xeditable | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/config.php'; ?>

    <!-- Plugins css -->
    <link href="assets/libs/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Form Xeditable</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Xeditable</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Inline Example</h4>
                                <p class="card-title-desc">This library allows you to create
                                    editable elements on your page. It can be used with any engine
                                    (bootstrap, jquery-ui, jquery only) and includes both popup and inline
                                    modes. Please try out demo to see how it works.</p>

                                <div class="table-responsive">
                                    <table class="table table-striped table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">Inline</th>
                                                <th>Examples</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?Php
                                                $query = "SELECT * FROM users ORDER by id";

                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    echo "<tr>";
                                                    echo "<td>".$row['id']."</td>";
                                                    echo "<td>".$row['username']."</td>";
                                                    echo "<td>".$row['useremail']."</td>";                                                       
                                                    echo "<td>".$row['userrole']."</td>";
                                                    echo "<td>".$row['ustatus']."</td>";
                                                    echo "<td>".$row['userreg']."</td>";
                                                    echo "<td>".$row['userdis']."</td>";
                                                    echo "<td>".$row['userta']."</td>";

                                                    echo "<td>
                                                        <a href=\"sysadmin_userview.php?id=".$row['id']."\"><i class='far fa-eye' title='View User' style='font-size:18px;color:purple'></i></a>
                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To Activate This User');\" href=\"sysadmin_useractivate.php?id=".$row['id']."\"><i class='fa  fa-check' title='Activate User' style='font-size:18px;color:green'></i></a>
                                                        <a href=\"basicSLGview.php?id=".$row['id']."\"><i class='fa fa-envelope' title='Send Mail' style='font-size:18px'></i></a>
                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This SLG - You Must Be a Supervisor');\" href=\"basicSLGdelete.php?id=".$row['id']."\"><i class='far fa-trash-alt' title='Delete SLG' style='font-size:18px;color:Red'></i></a>
                                                        </td>\n";
                                                    echo "</tr>";
                                                }
                                                $result_set->close();
                                                }  
                                                                        
                                                ?>
                                            <tr>
                                                <td>Simple Text Field</td>
                                                <td>
                                                    <a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">superuser</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Empty text field, required</td>
                                                <td>
                                                    <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Select, local array, custom display</td>
                                                <td>
                                                    <a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Combodate</td>
                                                <td>
                                                    <a href="#" id="inline-dob" data-type="combodate" data-value="2015-09-24" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Textarea, buttons below. Submit by ctrl+enter</td>
                                                <td>
                                                    <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

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

<!-- Plugins js -->
<script src="assets/libs/bootstrap-editable/js/index.js"></script>
<script src="assets/libs/moment/min/moment.min.js"></script>

<!-- Init js-->
<script src="assets/js/pages/form-xeditable.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>