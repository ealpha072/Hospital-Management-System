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
                    <a href="../dashboard/dashboard.php"><i class="fas fa-server"></i> Dashboard</a>
                </li>
                <!--students -->
                <li>
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle"></i>  Students</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li>
                            <a href="../students/addst.php"><i class="fa fa-user-plus fa-sm"></i>  Add Student</a>
                        </li>
                        <li>
                            <a href="../students/bulkstudents.php"><i class="fa fa-users fa-sm"></i>  Add bulk Students</a>
                        </li>
                        <li>
                            <a href="../students/managest.php"><i class="fa fa-wrench fa-sm"></i>  Manage Students</a>
                        </li>
                    </ul>
                </li>                
                <!--syllabus-->
                <li>
                    <a href="#syllabus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book"></i> Subjects</a>
                    <ul class="collapse list-unstyled" id="syllabus">
                        <li>
                            <a href="../subjects/addsub.php"><i class="fa fa-plus fa-sm"></i> Add Subjects</a>
                        </li>
                        <li>
                            <a href="../subjects/managesub.php"><i class="fa fa-wrench fa-sm"></i> Manage Subjects</a>
                            
                        </li>
                    </ul>
                </li>
                <!--Finance-->
                <li>
                    <a href="#dpts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle"></i> Teachers</a>
                    <ul class="collapse list-unstyled" id="dpts">
                        <li>
                            <a href="../teachers/addteach.php"><i class="fa fa-user-plus fa-sm"></i>  Add Teacher</a>
                        </li>
                        <li>
                            <a href="../teachers/manageteach.php"><i class="fa fa-wrench fa-sm"></i> Manage Teachers</a>
                    
                        </li>
                    </ul>
                </li>
                <!---->
                <li>
                    <a href="#schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> Parents</a>
                    <ul class="collapse list-unstyled" id="schools">
                        <li>
                            <a href="../parents/managepar.php"><i class="fa fa-wrench fa-sm"></i>  Manage Parents</a>
                        </li>
                    </ul>
                </li>
                <!--REGISTER-->

                <li>
                    <a href="#staff" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> Support Staff</a>
                    <ul class="collapse list-unstyled" id="staff">
                        <li>
                            <a href="../staff/addstaff.php"><i class="fa fa-user-plus fa-sm"></i>  Add Staff</a>
                        </li>
                        <li>
                            <a href="../staff/managestaff.php"><i class="fa fa-wrench fa-sm"></i>  Manage Staff</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#streams" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home"></i> Streams</a>
                    <ul class="collapse list-unstyled" id="streams">
                        <li>
                            <a href="../streams/addstream.php"><i class="fa fa-plus fa-sm"></i> Add Streams</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#roles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase"></i> Roles</a>
                    <ul class="collapse list-unstyled" id="roles">
                        <li>
                            <a href="../roles/addrole.php"><i class="fa fa-plus fa-sm"></i> Add a Role</a>
                        </li>
                        <li>
                            <a href="../roles/managerole.php"><i class="fa fa-wrench fa-sm"></i> Manage Roles</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#hostels" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home"></i> Hostels</a>
                    <ul class="collapse list-unstyled" id="hostels">
                        <li>
                            <a href="../hostels/addhostel.php"><i class="fa fa-plus fa-sm"></i> Add a hostel</a>
                        </li>
                        <li>
                            <a href="../hostels/managehost.php"><i class="fa fa-wrench fa-sm"></i> Manage Hostels</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../dashboard/settings.php"><i class="fa fa-cogs"></i> Settings</a>
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

