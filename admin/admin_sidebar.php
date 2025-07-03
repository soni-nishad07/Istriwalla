        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="admin_dashboard.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="40">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="admin_dashboard.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
    
            <div class="dropdown sidebar-user m-1 rounded">
                <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center gap-2">
                        <!-- <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar"> -->
                    </span>
                </button>
                
            </div>
            <div id="scrollbar">
                <div class="container-fluid">


                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Admin Dashboard</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="admin_dashboard.php" class="nav-link" data-key="t-analytics"> Home </a>
                                    </li>
                             
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                   


                              
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="./add_apartment.php">
                               <i class="ri-building-line"></i> <span data-key="t-widgets">Add Apartment Name</span>
                            </a>
                        </li>


                        
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="user_show.php">
                               <i class="ri-user-line"></i>  <span data-key="t-widgets">Customer Register</span>
                            </a>
                        </li>



                        
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="orders.php">
                                <i class="ri-shopping-cart-line"></i><span data-key="t-widgets">All Order </span>
                            </a>
                        </li>



                                  <li class="nav-item">
                            <a class="nav-link menu-link" href="contact_show.php">
                              <i class="ri-question-line"></i> <span data-key="t-widgets">Inquiry form</span>
                            </a>
                        </li>


                        
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Admin Data</span></li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="admin_profile.php">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Profile</span>
                            </a>
                        </li>


                           <li class="nav-item">
                            <a class="nav-link menu-link" href="admin_change_password.php">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Change Password</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>