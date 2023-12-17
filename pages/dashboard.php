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
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                   
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    
                </div>
                <div class="col">
                   
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<?php require "../public/footer.php" ?>