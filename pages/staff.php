<?php 
    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');

    if(isset($_GET['staff_page'])){
        $database = new Database();
        $new_html = new Html();

        if($_GET['staff_page'] === 'add'){
            echo '
                <div class="card mb-4 mr-4 ml-4">
                <div class="card-header">
                    <a href="">
                        <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Employees List</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="../config/formsprocess.php" method="post">
                        <div class="card-body">';
                        
                        if(isset($_SESSION['msg']) && count($_SESSION['msg']) > 0){
                            if($_SESSION['msg'][1] === 'Success'){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <p>'.$_SESSION['msg'][0].'</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
        
                            if($_SESSION['msg'][1] === 'Error'){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h5>Please fix below and try again:</h5>
                                    <ul>';
        
                                    foreach($_SESSION['msg'][0] as $error){
                                        echo '<li>'.$error.'</li>';
                                    }
                                echo '</ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                            }
                            //sleep(5);
                            //unset($_SESSION['msg']);
                        }
        
                        echo '<div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-2">First Name<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="text" name="first_name" id="" class="form-control form-control-sm" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Last Name<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" id="" class="form-control form-control-sm" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">ID Num<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="digit" name="id_num" id="" class="form-control form-control-sm" placeholder="ID Number" required maxlength="8" minlength="8">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Email Address<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="email" name="email" id="" class="form-control form-control-sm" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Phone Number<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="tel" name="phone" id="" class="form-control form-control-sm" placeholder="Phone Number" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Physical Address<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_address" id="" class="form-control form-control-sm" placeholder="Physical Address" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Date of Birth<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="date" name="dob" id="" class="form-control form-control-sm" placeholder="Date of Birth" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Sex<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <select name="sex" id="" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>--Select Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Job Title<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <input type="job_title" name="job_title" id="" class="form-control form-control-sm" placeholder="Doctor, Nurse, Store Keeper etc" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="" class="col-sm-2">Department<sup>*</sup></label>
                                <div class="col-sm-6">
                                    <select name="department" id="" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>--Select Department--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
        
                            <button class="btn btn-sm btn-primary" name="add_staff"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>';
        }
    }
    

?>

<?php require "../public/footer.php" ?>