<?php   
    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');    
?>

<div class="dashboard">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-building"></i> School Infomation</h6>
            <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }
            ?>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <?php buildCard('Students', $select_student, ['text-white', 'bg-primary'], '../students/managest.php'); ?>
                </div>
                <div class="col">
                    <?php buildCard('Teachers', $select_teacher, ['text-white','bg-dark'], '../teachers/manageteach.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-success'], '../hostels/managehost.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Streams', $select_stream, ['text-white','bg-secondary'], '#')?>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    <?php buildCard('Parents', $select_parent, ['text-white','bg-danger'], '../parents/managepar.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Subjects', $select_subjects, ['text-white','bg-warning'], '../subjects/managesub.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-info'],'../hostels/managehost.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Support Staff', $select_support_staff, ['text-dark', 'bg-light'], '../staff/managestaff.php')?>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<?php require "../public/footer.php" ?>