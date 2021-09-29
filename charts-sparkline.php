<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Sparkline Charts | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18">Sparkline charts</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active">Sparkline charts</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pie Chart</h4>
                                <div id="sparkline1" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bar Chart</h4>
                                <div id="sparkline2" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title">Line Chart</h4>
                                <div id="sparkline4"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Composite Bar Chart</h4>
                                <div id="sparkline3" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Line Charts</h4>
                                <div id="sparkline5" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h4 class="card-title text-white">Discrete Chart</h4>
                                <div id="sparkline6" class="text-center"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bullet Chart</h4>
                                <div id="sparkline7"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Box Plot Chart</h4>
                                <div id="sparkline8" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tristate Charts</h4>
                                <div id="sparkline9" class="text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include 'layouts/vendor-scripts.php'; ?>

<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/pages/sparklines.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>