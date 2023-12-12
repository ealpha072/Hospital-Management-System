<?php 
    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');

    if(isset($_GET['staff_page'])){
        $database = new Database();
        $new_html = new Html();

        if($_GET['staff_page'] === 'add'){
            $newdpt = new Department($database);
            $departments = $newdpt->getDepartments();

            echo '
                <div class="card mb-4 mr-4 ml-4">
                <div class="card-header">
                    <a href="'.$_SERVER['PHP_SELF'].'?staff_page=view&page_number=1">
                        <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Employees List</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="../config/formsprocess.php" method="post">';
                        $new_html->showSessionMessage();
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
                                        <option value="" disabled selected>--Select Department--</option>';
                                        $new_html->populateSelect($departments, 'name');
                                    echo '</select>
                                </div>
                            </div>
        
                            <button class="btn btn-sm btn-primary" name="add_staff"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>';
        }

        if( $_GET['staff_page'] === 'view' && isset($_GET['page_number'])){
            $current_page = (int)$_GET['page_number'];
            $paginator = new Paginator($database);
            $columnsToSelect= ['id_num', 'first_name', 'last_name', 'email', 'phone_num', 'job_title'];
            $paging_items = $paginator->buildPages("employees", 10, $columnsToSelect);
            $number_of_pages = $paging_items[0];
            $items_to_display = $paging_items[1];

            echo '
                <div class="card mr-4 ml-4 mb-4">
                    <div class="card-header">
                        <a href="staff.php?staff_page=add">
                            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Staff</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Show</label>
                                    </div>
                                    <select class="custom-select">
                                        <option selected>Choose...</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-outline-success">CSV</button>
                                    <button type="button" class="btn btn-sm btn-outline-success">Exel</button>
                                    <button type="button" class="btn btn-sm btn-outline-success">Copy</button>
                                    <button type="button" class="btn btn-sm btn-outline-success">PDF</button>
                                    <button type="button" class="btn btn-sm btn-outline-success">Print</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search ID No">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-success" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-hover table-stripped" id="staff-table">
                                <thead class="">
                                    <tr class="">
                                        <th>SL No</th>';
                                        foreach ($columnsToSelect as $columns) {
                                            # code...
                                            echo '<th>'.ucfirst($columns).'</th>';
                                        }
                                        echo '
                                    </tr>
                                </thead>
                                <tbody>';
                                    for($items = 0; $items < count($items_to_display); $items++){
                                        echo '<tr class = "main-row">
                                            <td class="text-center">
                                                <i class="fa fa-circle-plus"></i>
                                            </td>';
                                                foreach(array_keys($items_to_display[$items]) as $key){
                                                    echo '<td>'.ucfirst($items_to_display[$items][$key]).'</td>';
                                                }
                                        echo '</tr>
                                                <tr style="display:none" class = "minor-row">';
                                                //echo 'This is a test';
                                                $get_details_query = 'SELECT id_num, sex, physical_address, department, date_in FROM employees WHERE id_num = ? AND first_name = ?';
                                                $params = [$items_to_display[$items]['id_num'], $items_to_display[$items]['first_name']];
                                                $single_patient_data = $database->select($get_details_query, $params);
                                                foreach($single_patient_data as $data){

                                                    echo '<td colspan="8" >
                                                        <ul class="list-group">';
                                                            foreach(array_keys($data) as $key){
                                                                echo '
                                                                    <li class="mt-1">
                                                                        <span class="font-weight-bold">'.ucfirst($key).':</span>
                                                                        <span>'.ucfirst($data[$key]).'</span>
                                                                    </li>
                                                                ';
                                                            }
                                                    echo '
                                                            <li>
                                                                <span class="font-weight-bold">Action</span>
                                                                <span>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="'.$_SERVER['PHP_SELF'].'?patient_page=edit&patient_id='.$data['id_num'].'" class="mx-2">
                                                                            <button type="button" class="btn btn-sm btn-success me-1">
                                                                                <i class="fa fa-pencil"></i> Edit
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </td>';
                                                }
                                        echo '</tr>';
                                    }
                                echo'</tbody>
                            </table>
                        </div>
                        <nav class="float-right">
                            <ul class="pagination">
                            ';  $page_range = 2;
                                if($current_page > 1){
                                    echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number=1" ><<<</a></li>';
                                    // $previous_page = $current_page -1;
                                    // echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number='.$previous_page.'" ><<</a></li>'; 
                                }

                                for ($i = $current_page - $page_range ; $i < ($current_page + $page_range) + 1; $i++) { 
                                    if($i > 0 && ($i <= $number_of_pages)){
                                        if($i === $current_page){
                                            echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
                                        }else{
                                            echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number='.$i.'" >'.$i.'</a></li>';
                                        }
                                    }
                                }
                                if($current_page != $number_of_pages){
                                    $next_page = $current_page + 1;
                                    //echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number='.$next_page.'" > >> </a></li>';
                                    echo '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number='.$number_of_pages.'" >>>></a></li>';
                                }
                            echo '
                            </ul>
                        </nav>
                    </div>
                </div>
            ';
        }
    }

?>

<?php require "../public/footer.php" ?>