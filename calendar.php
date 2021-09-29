<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Calendar | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="assets/libs/tui-time-picker/tui-time-picker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/tui-date-picker/tui-date-picker.min.css">
    <link href="assets/libs/tui-calendar/tui-calendar.min.css" rel="stylesheet" type="text/css" />
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
                            <h4 class="mb-sm-0 font-size-18">Calendar</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Skote</a></li>
                                    <li class="breadcrumb-item active">Calendar</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="lnb">


                                    <div id="right">
                                        <div id="menu" class="mb-3">

                                            <span id="menu-navi" class="d-sm-flex flex-wrap text-center text-sm-start justify-content-sm-between">
                                                <div class="d-sm-flex flex-wrap gap-1">
                                                    <div class="btn-group mb-2" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-primary move-day" data-action="move-prev">
                                                            <i class="calendar-icon ic-arrow-line-left mdi mdi-chevron-left" data-action="move-prev"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary move-day" data-action="move-next">
                                                            <i class="calendar-icon ic-arrow-line-right mdi mdi-chevron-right" data-action="move-next"></i>
                                                        </button>
                                                    </div>


                                                    <button type="button" class="btn btn-primary move-today mb-2" data-action="move-today">Today</button>
                                                </div>

                                                <h4 id="renderRange" class="render-range fw-bold pt-1 mx-3"></h4>

                                                <div class="dropdown align-self-start mt-3 mt-sm-0 mb-2">
                                                    <button id="dropdownMenu-calendarType" class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i id="calendarTypeIcon" class="calendar-icon ic_view_month" style="margin-right: 4px;"></i>
                                                        <span id="calendarTypeName">Dropdown</span>&nbsp;
                                                        <i class="calendar-icon tui-full-calendar-dropdown-arrow"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" role="menu" aria-labelledby="dropdownMenu-calendarType">
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-daily">
                                                                <i class="calendar-icon ic_view_day"></i>Daily
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-weekly">
                                                                <i class="calendar-icon ic_view_week"></i>Weekly
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-monthly">
                                                                <i class="calendar-icon ic_view_month"></i>Month
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-weeks2">
                                                                <i class="calendar-icon ic_view_week"></i>2 weeks
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-weeks3">
                                                                <i class="calendar-icon ic_view_week"></i>3 weeks
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="dropdown-divider"></li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-workweek">
                                                                <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-workweek" checked>
                                                                <span class="checkbox-title"></span>Show weekends
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-start-day-1">
                                                                <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-start-day-1">
                                                                <span class="checkbox-title"></span>Start Week on Monday
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a class="dropdown-item" role="menuitem" data-action="toggle-narrow-weekend">
                                                                <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-narrow-weekend">
                                                                <span class="checkbox-title"></span>Narrower than weekdays
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </span>

                                        </div>
                                    </div>

                                    <div class="lnb-new-schedule float-sm-end ms-sm-3 mt-4 mt-sm-0">
                                        <button id="btn-new-schedule" type="button" class="btn btn-primary lnb-new-schedule-btn" data-toggle="modal">
                                            New schedule</button>
                                    </div>
                                    <div id="calendarList" class="lnb-calendars-d1 mt-4 mt-sm-0 me-sm-0 mb-4"></div>


                                    <div id="calendar" style="height: 800px;"></div>

                                </div>
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
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>
<script src="assets/libs/tui-dom/tui-dom.min.js"></script>

<script src="assets/libs/tui-time-picker/tui-time-picker.min.js"></script>
<script src="assets/libs/tui-date-picker/tui-date-picker.min.js"></script>

<script src="assets/libs//moment/min/moment.min.js"></script>
<script src="assets/libs/chance/chance.min.js"></script>

<script src="assets/libs/tui-calendar/tui-calendar.min.js"></script>

<script src="assets/js/pages/calendars.js"></script>
<script src="assets/js/pages/schedules.js"></script>
<script src="assets/js/pages/calendar.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


</body>

</html>