<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                        
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                        
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                        
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="70">
                        
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="<?php echo $language["Search"]; ?>">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo ucfirst($_SESSION["username"]); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo $language["Profile"]; ?></span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet"><?php echo $language["My_Wallet"]; ?></span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings"><?php echo $language["Settings"]; ?></span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen"><?php echo $language["Lock_screen"]; ?></span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo $language["Menu"]; ?></li>

                <li>
                    <a href="index.php" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">CIMIS Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-layouts">Programs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="basic_livelihood.php" class="has-arrow" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="enhanced_livelihood.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="graduation.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-walk"></i>
                        <span key="t-layouts">Monitoring</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-line-chart"></i>
                        <span key="t-layouts">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <!-- start here -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Basic </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Beneficiary</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Mobilisation</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">SLGs</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Training</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">CBDRA</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Nutrition</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">ACSA</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Safeguards</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- End here -->
                        </li>

                        <li>
                           <!-- Start here --> 
                           <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Enhanced </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Joint Skill Grps</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Youth Support</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">LESP</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Production VC</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Coop Devt</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- End here -->
                        </li>

                        <li>
                            <!-- start here -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Graduation</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Beneficiary</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Asset Transfer</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Status</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- end Here -->
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end" key="t-new"></span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">Citizen Engagement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login-1.php" key="t-login"><?php echo $language["Login"]; ?></a></li>
                        <li><a href="auth-login-2.php" key="t-login-2"><?php echo $language["Login"]; ?> 2</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-report"></i>
                        <span key="t-layouts">Case Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="case-register.php" class="has-arrow" key="t-vertical">Case Register</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Case Status</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                       
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-building"></i>
                        <span key="t-layouts">System Administration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            
                            <a href="user-mgt.php" class="has-arrow" key="t-vertical">User Management</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Module Configuration</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Systems Maintainance</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                
 

               

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end" key="t-new"><?php echo $language["New"]; ?></span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication"><?php echo $language["Authentication"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login-1.php" key="t-login"><?php echo $language["Login"]; ?></a></li>
                        <li><a href="auth-login-2.php" key="t-login-2"><?php echo $language["Login"]; ?> 2</a></li>
                        <li><a href="auth-register-1.php" key="t-register"><?php echo $language["Register"]; ?></a></li>
                        <li><a href="auth-register-2.php" key="t-register-2"><?php echo $language["Register"]; ?> 2</a></li>
                        <li><a href="auth-recoverpw-1.php" key="t-recover-password"><?php echo $language["Recover_Password"]; ?></a></li>
                        <li><a href="auth-recoverpw-2.php" key="t-recover-password-2"><?php echo $language["Recover_Password"]; ?> 2</a></li>
                        <li><a href="auth-lock-screen.php" key="t-lock-screen"><?php echo $language["Lock_screen"]; ?></a></li>
                        <li><a href="auth-lock-screen-2.php" key="t-lock-screen-2"><?php echo $language["Lock_screen"]; ?> 2</a></li>
                        <li><a href="auth-confirm-mail.php" key="t-confirm-mail"><?php echo $language["Confirm_Mail"]; ?></a></li>
                        <li><a href="auth-confirm-mail-2.php" key="t-confirm-mail-2"><?php echo $language["Confirm_Mail"]; ?> 2</a></li>
                        <li><a href="auth-email-verification.php" key="t-email-verification"><?php echo $language["Email_verification"]; ?></a></li>
                        <li><a href="auth-email-verification-2.php" key="t-email-verification-2"><?php echo $language["Email_verification"]; ?> 2</a></li>
                        <li><a href="auth-two-step-verification.php" key="t-two-step-verification"><?php echo $language["Two_step_verification"]; ?></a></li>
                        <li><a href="auth-two-step-verification-2.php" key="t-two-step-verification-2"><?php echo $language["Two_step_verification"]; ?> 2</a></li>
                    </ul>
                </li>

               

                <li class="menu-title" key="t-components"><?php echo $language["Components"]; ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tone"></i>
                        <span key="t-ui-elements"><?php echo $language["UI_Elements"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.php" key="t-alerts"><?php echo $language["Alerts"]; ?></a></li>
                        <li><a href="ui-buttons.php" key="t-buttons"><?php echo $language["Buttons"]; ?></a></li>
                        <li><a href="ui-cards.php" key="t-cards"><?php echo $language["Cards"]; ?></a></li>
                        <li><a href="ui-carousel.php" key="t-carousel"><?php echo $language["Carousel"]; ?></a></li>
                        <li><a href="ui-dropdowns.php" key="t-dropdowns"><?php echo $language["Dropdowns"]; ?></a></li>
                        <li><a href="ui-grid.php" key="t-grid"><?php echo $language["Grid"]; ?></a></li>
                        <li><a href="ui-images.php" key="t-images"><?php echo $language["Images"]; ?></a></li>
                        <li><a href="ui-lightbox.php" key="t-lightbox"><?php echo $language["Lightbox"]; ?></a></li>
                        <li><a href="ui-modals.php" key="t-modals"><?php echo $language["Modals"]; ?></a></li>
                        <li><a href="ui-offcanvas.php" key="t-offcanvas"><?php echo $language["Off_canvas"]; ?></a></li>
                        <li><a href="ui-rangeslider.php" key="t-range-slider"><?php echo $language["Range_Slider"]; ?></a></li>
                        <li><a href="ui-session-timeout.php" key="t-session-timeout"><?php echo $language["Session_Timeout"]; ?></a></li>
                        <li><a href="ui-progressbars.php" key="t-progress-bars"><?php echo $language["Progress_Bars"]; ?></a></li>
                        <li><a href="ui-sweet-alert.php" key="t-sweet-alert"><?php echo $language["Sweet_Alert"]; ?></a></li>
                        <li><a href="ui-tabs-accordions.php" key="t-tabs-accordions"><?php echo $language["Tabs_&_Accordions"]; ?></a></li>
                        <li><a href="ui-typography.php" key="t-typography"><?php echo $language["Typography"]; ?></a></li>
                        <li><a href="ui-video.php" key="t-video"><?php echo $language["Video"]; ?></a></li>
                        <li><a href="ui-general.php" key="t-general"><?php echo $language["General"]; ?></a></li>
                        <li><a href="ui-colors.php" key="t-colors"><?php echo $language["Colors"]; ?></a></li>
                        <li><a href="ui-rating.php" key="t-rating"><?php echo $language["Rating"]; ?></a></li>
                        <li><a href="ui-notifications.php" key="t-notifications"><?php echo $language["Notifications"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge rounded-pill bg-danger float-end">10</span>
                        <span key="t-forms"><?php echo $language["Forms"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.php" key="t-form-elements"><?php echo $language["Form_Elements"]; ?></a></li>
                        <li><a href="form-layouts.php" key="t-form-layouts"><?php echo $language["Form_Layouts"]; ?></a></li>
                        <li><a href="form-validation.php" key="t-form-validation"><?php echo $language["Form_Validation"]; ?></a></li>
                        <li><a href="form-advanced.php" key="t-form-advanced"><?php echo $language["Form_Advanced"]; ?></a></li>
                        <li><a href="form-editors.php" key="t-form-editors"><?php echo $language["Form_Editors"]; ?></a></li>
                        <li><a href="form-uploads.php" key="t-form-upload"><?php echo $language["Form_File_Upload"]; ?></a></li>
                        <li><a href="form-xeditable.php" key="t-form-xeditable"><?php echo $language["Form_Xeditable"]; ?></a></li>
                        <li><a href="form-repeater.php" key="t-form-repeater"><?php echo $language["Form_Repeater"]; ?></a></li>
                        <li><a href="form-wizard.php" key="t-form-wizard"><?php echo $language["Form_Wizard"]; ?></a></li>
                        <li><a href="form-mask.php" key="t-form-mask"><?php echo $language["Form_Mask"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-tables">Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.php" key="t-basic-tables"><?php echo $language["Basic_Tables"]; ?></a></li>
                        <li><a href="tables-datatable.php" key="t-data-tables"><?php echo $language["Data_Tables"]; ?></a></li>
                        <li><a href="tables-responsive.php" key="t-responsive-table"><?php echo $language["Responsive_Table"]; ?></a></li>
                        <li><a href="tables-editable.php" key="t-editable-table"><?php echo $language["Editable_Table"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-charts"><?php echo $language["Charts"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.php" key="t-apex-charts"><?php echo $language["Apex_Charts"]; ?></a></li>
                        <li><a href="charts-echart.php" key="t-e-charts"><?php echo $language["E_Charts"]; ?></a></li>
                        <li><a href="charts-chartjs.php" key="t-chartjs-charts"><?php echo $language["Chartjs_Charts"]; ?></a></li>
                        <li><a href="charts-flot.php" key="t-flot-charts"><?php echo $language["Flot_Charts"]; ?></a></li>
                        <li><a href="charts-tui.php" key="t-ui-charts"><?php echo $language["Toast_UI_Charts"]; ?></a></li>
                        <li><a href="charts-knob.php" key="t-knob-charts"><?php echo $language["Jquery_Knob_Charts"]; ?></a></li>
                        <li><a href="charts-sparkline.php" key="t-sparkline-charts"><?php echo $language["Sparkline_Charts"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-aperture"></i>
                        <span key="t-icons"><?php echo $language["Icons"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons.php" key="t-boxicons">Boxicons</a></li>
                        <li><a href="icons-materialdesign.php" key="t-material-design">Material Design</a></li>
                        <li><a href="icons-dripicons.php" key="t-dripicons">Dripicons</a></li>
                        <li><a href="icons-fontawesome.php" key="t-font-awesome">Font awesome</a></li>
                    </ul>
                </li>

                

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
