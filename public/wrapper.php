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
                            <a href="add_patient.php"><i class="fa fa-user-plus fa-sm mr-2"></i> Register</a>
                        </li>
                        <li>
                            <a href="admit_patient.php"><i class="fa fa-user-circle fa-sm mr-2"></i> Admit Patient</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-sm mr-2"></i> Patient List</a>
                        </li>
                    </ul>
                </li>  

                <!--Staff-->
                <li>
                    <a href="#host-staffs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users mr-2"></i> Hospital Staff</a>
                    <ul class="collapse list-unstyled" id="host-staffs">
                        <li>
                            <a href="add_staff.php"><i class="fa fa-plus fa-sm mr-2"></i> New Employee</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm mr-2"></i> Manage</a>
                        </li>
                    </ul>
                </li>

                 <!--DOCTOR-->
                <li>
                    <a href="#doctor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-md mr-2"></i> Doctor</a>
                    <ul class="collapse list-unstyled" id="doctor">
                        <li>
                            <a href="add_doctor.php"><i class="fa fa-plus fa-sm mr-2"></i> Add Doctor</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm mr-2"></i> Doctor List</a>
                        </li>
                    </ul>
                </li>

                <!-- DEPARTMENTS -->
                <li>
                    <a href="#depts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book mr-2"></i> Departments</a>
                    <ul class="collapse list-unstyled" id="depts">
                        <li>
                            <a href="add_depts.php"><i class="fa fa-plus fa-sm mr-2"></i> Create New</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm mr-2"></i> Manage</a>
                        </li>
                    </ul>
                </li> 

                <!-- wards -->
                <li>
                    <a href="#wards" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-hospital mr-2"></i> Ward Rooms</a>
                    <ul class="collapse list-unstyled" id="wards">
                        <li>
                            <a href="add_ward.php"><i class="fa fa-plus fa-sm mr-2"></i> Add New</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm mr-2"></i> Manage</a>
                        </li>
                    </ul>
                </li>

                <!--Finance-->
                <li>
                    <a href="#dpts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-credit-card mr-2"></i> Billing</a>
                    <ul class="collapse list-unstyled" id="dpts">
                        <li>
                            <a href="add_service.php"><i class="fa fa-user-plus fa-sm mr-2"></i> Add service</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-sm mr-2"></i> Service List</a>
                        </li>
                        <li>
                            <a href="bill_patient.php"><i class="fa fa-user-plus fa-sm mr-2"></i> Bill Patient</a>
                        </li>
                    </ul>
                </li>

                <!--Reports-->
                <li>
                    <a href="#schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user mr-2"></i> Reports</a>
                    <ul class="collapse list-unstyled" id="schools">
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Patient List Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Patient Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Employee List</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Expense Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Inventory Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Profit/Loss Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-sm"></i> Balance Sheet</a>
                        </li>
                    </ul>
                </li>

                <!--store-->

                <!--Accounting-->
                <li>
                    <a href="#suppliers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase mr-2"></i> Suppliers</a>
                    <ul class="collapse list-unstyled" id="suppliers">
                        <li>
                            <a href="add_supplier.php"><i class="fa fa-user-plus fa-sm"></i>  Add Supplier</a>
                        </li>
                        <li>
                            <a href="add_supplier.php"><i class="fa fa-user-plus fa-sm"></i> Invoice Supplier</a>
                        </li>
                        <li>
                            <a href=" "><i class="fa fa-wrench fa-sm"></i>  Manage Suppliers</a>
                        </li>
                    </ul>
                </li>

                <!--Expenses-->
                <li>
                    <a href="#expenses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-credit-card mr-2"></i> Expenses</a>
                    <ul class="collapse list-unstyled" id="expenses">
                        <li>
                            <a href="add_category.php"><i class="fa fa-user fa-sm"></i>  Add Category</a>
                        </li>
                        <li>
                            <a href="add_expense.php"><i class="fa fa-plus-circle fa-sm"></i>  Add Expenses</a>
                        </li>
                        <li>
                            <a href=" "><i class="fa fa-wrench fa-sm"></i>  Expense List</a>
                        </li>
                    </ul>
                </li>

                <!--Inventory --> 
                <li>
                    <a href="#staff" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user mr-2"></i> Inventory</a>
                    <ul class="collapse list-unstyled" id="staff">
                        <li>
                            <a href="add_drugs.php"><i class="fa fa-user-plus fa-sm"></i>  Add Drugs</a>
                        </li>
                        <li>
                            <a href="add_drugs.php"><i class="fa fa-user-plus fa-sm"></i>  Add Inventory</a>
                        </li>
                        <li>
                            <a href=" "><i class="fa fa-wrench fa-sm"></i>  Drugs List</a>
                        </li>
                    </ul>
                </li>

                <!--NoticeBoard-->
                <li>
                    <a href="#notice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-exclamation-circle mr-2"></i> Noticeboard</a>
                    <ul class="collapse list-unstyled" id="notice">
                        <li>
                            <a href="add_notice.php"><i class="fa fa-user-plus fa-sm"></i> Add Notice</a>
                        </li>
                        <li>
                            <a href=" "><i class="fa fa-wrench fa-sm"></i>  Notice List</a>
                        </li>
                    </ul>
                </li>

                
                <li>
                    <a href="../dashboard/settings.php"><i class="fa fa-cogs mr-2"></i> Settings</a>
                </li>

                <!--OTHERS-->
                <li>
                    <a href="../shared/endsession.php"><i class="fa fa-arrow-right fa-sm"></i> Logout</a>
                </li>
            </ul>
    </nav>
    <!--sidebar toggle button-->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <!--<span>Toggle Sidebar</span>-->
                </button>
            </div>
            <div class="logout">
                <b><a href=" " class="text-success"> Logout</a></b>
            </div>
        </nav>
        <hr>

