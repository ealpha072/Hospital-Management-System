<?php require "header.php" ?>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Hospital System</h3>
            </div>

            <!--dashboard items-->
            <ul class="list-unstyled components">
                <!-- dashboard-->
                <li class="">
                    <a href="dashboard.php"><i class="fas fa-server mr-2"></i> Dashboard</a>
                </li>

                <!-- patients -->
                <li>
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle mr-2"></i> Patient</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li>
                            <a href="patients.php?patient_page=add"><i class="fa fa-user-plus fa-sm mr-2"></i> Register</a>
                        </li>
                       
                        <li>
                            <a href="patients.php?patient_page=view&page_number=1"><i class="fa fa-heartbeat fa-sm mr-2"></i> Manage Patients</a>
                        </li>
                    </ul>
                </li>  

                <!--Staff-->
                <li>
                    <a href="#host-staffs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users mr-2"></i> Human Resource</a>
                    <ul class="collapse list-unstyled" id="host-staffs">
                        <li>
                            <a href="staff.php?staff_page=add"><i class="fa fa-plus fa-sm mr-2"></i> Add Staff</a>
                        </li>
                        <li>
                            <a href="staff.php?staff_page=view&page_number=1"><i class="fa fa-list fa-sm mr-2"></i> Manage Staff</a>
                        </li>
                    </ul>
                </li>

                <!-- DEPARTMENTS -->
                <li>
                    <a href="#depts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-database mr-2"></i> Departments</a>
                    <ul class="collapse list-unstyled" id="depts">
                        <li>
                            <a href="depts.php?depts_page=add"><i class="fa fa-plus fa-sm mr-2"></i> Create New</a>
                        </li>
                        <li>
                            <a href="depts.php?depts_page=view&page_number=1"><i class="fa fa-wrench fa-sm mr-2"></i> Manage</a>
                        </li>
                    </ul>
                </li>

                <!-- wards -->
                <li>
                    <a href="#wards" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-hospital mr-2"></i> Ward Rooms</a>
                    <ul class="collapse list-unstyled" id="wards">
                        <li>
                            <a href="ward.php?ward_page=add"><i class="fa fa-plus fa-sm mr-2"></i> Add New</a>
                        </li>
                        <li>
                            <a href="ward.php?ward_page=view&page_number=1"><i class="fa fa-wrench fa-sm mr-2"></i> Manage</a>
                        </li>
                    </ul>
                </li>

                <!--SERVICES-->
                <li>
                    <a href="#dpts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-credit-card mr-2"></i> Billing</a>
                    <ul class="collapse list-unstyled" id="dpts">
                        <li>
                            <a href="services.php?services_page=add"><i class="fa fa-user-plus fa-sm mr-2"></i> Add Billing service</a>
                        </li>
                        <li>
                            <a href="services.php?services_page=view&page_number=1"><i class="fa fa-list fa-sm mr-2"></i> Service List</a>
                        </li>
                        <li>
                            <a href="bill_patient.php"><i class="fa fa-credit-card fa-sm mr-2"></i> Bill Patient</a>
                        </li>
                    </ul>
                </li>

                <!--Reports-->
                <li>
                    <a href="#schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user mr-2"></i> Reports</a>
                    <ul class="collapse list-unstyled" id="schools">
                        <li>
                            <a href="#"><i class="fa fa-list fa-sm"></i> Patient List Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bars fa-sm"></i> Patient Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-sm"></i> Employee List</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-sm"></i> Expense Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-truck fa-sm"></i> Inventory Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-credit-card fa-sm"></i> Profit/Loss Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-balance-scale fa-sm"></i> Balance Sheet</a>
                        </li>
                    </ul>
                </li>

                <!--store-->

                <!--Supplier-->
                <li>
                    <a href="#suppliers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase mr-2"></i> Suppliers</a>
                    <ul class="collapse list-unstyled" id="suppliers">
                        <li>
                            <a href="suppliers.php?suppliers_page=add"><i class="fa fa-user-plus fa-sm"></i>  Add Supplier</a>
                        </li>
                        <li>
                            <a href="suppliers.php?suppliers_page=view&page_number=1"><i class="fa fa-wrench fa-sm"></i>  Manage Suppliers</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="settings.php"><i class="fa fa-cogs mr-2"></i> Settings</a>
                </li>

                <!--OTHERS-->
                <li>
                    <a href="logout.php"><i class="fa fa-arrow-right fa-sm"></i> Logout</a>
                </li>
            </ul>
    </nav>
    <!--sidebar toggle button-->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info btn-sm">
                    <i class="fas fa-align-left"></i>
                    <!--<span>Toggle Sidebar</span>-->
                </button>
            </div>
            <div class="logout">
                <b><a href="logout.php" class="text-success"> Logout</a></b>
            </div>
        </nav>
        <hr>

