<?php 

    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');
    
    if(isset($_GET['services_page'])){
        $database = new Database();
        $new_html = new Html();

        if($_GET['services_page'] === 'add'){
            $newdpt = new Department($database);
            $departments = $newdpt->getDepartments();

            echo '<div class="card mb-4 mr-4 ml-4">
                <div class="card-header">
                    <a href="'.$_SERVER['PHP_SELF'].'?services_page=view&page_number=1">
                        <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Services List</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="../config/formsprocess.php" method="post">';
                        $new_html->showSessionMessage();
                        echo '<div class="form-group row">
                            <label for="" class="form-label col-sm-2"><strong>Service Name <sup>*</sup></strong></label>
                            <div class="col-sm-6">
                                <input type="text" name="servicename" id="" placeholder="Service Name" class="form-control form-control-sm">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="" class="col-sm-2"><strong>Department<sup>*</sup></strong> </label>
                            <div class="col-sm-6">
                                <select name="department" id="" class="form-control form-control-sm" required>
                                    <option value="" disabled selected>--Select Department--</option>';
                                    $new_html->populateSelect($departments, 'name');
                                    echo '
                                </select>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="" class="form-label col-sm-2"><strong>Unit Charge <sup>*</sup></strong></label>
                            <div class="col-sm-6">
                                <input type="number" name="unitcharge" id="" placeholder="Unit Charge" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="form-label col-sm-2"><strong>Description <sup>*</sup></strong></label>
                            <div class="col-sm-6 form-floating">
                                <textarea name="description" id="" placeholder="Description" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-primary btn-sm" name="add_service" > <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                    </form>
                </div>
            </div>';
        }
    
    }

    if( $_GET['services_page'] === 'view' && isset($_GET['page_number'])){
        echo '';
    }
?>




<?php require "../public/footer.php" ?>