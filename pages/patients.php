<?php

    use function PHPSTORM_META\type;

    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');

    if(isset($_GET['patient_page'])){
        $database = new Database();
        $new_html = new Html();

        if($_GET['patient_page'] === 'add'){
            echo '
                <div class="card mb-4 mr-4 ml-4">
                    <div class="card-header">
                        <a href="'.$_SERVER['PHP_SELF'].'?patient_page=view&page_number=1">
                            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Patients List</button>
                        </a>
                    </div>
                    <div class="card-body">
                       <form action="../config/formsprocess.php" method="post">
                            <div class="card-body">';
                                if(isset($_SESSION['msg']) && $_SESSION['msg'] !== ""){
                                    echo '
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"><h5>';
                                        echo $_SESSION['msg'];
                                    echo'
                                    </h5>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                                    sleep(5);
                                    unset($_SESSION['msg']);
                                }

                                echo '<div class="form-group row">
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
                                    <label for="" class="col-sm-2">Age<sup>*</sup></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="age" id="" class="form-control form-control-sm" placeholder="Age" max="120" min="0" required>
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
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="" class="col-sm-2">Marital Status<sup>*</sup></label>
                                    <div class="col-sm-6">
                                        <select name="status" id="" class="form-control form-control-sm" required>
                                            <option value="" disabled selected>--Status--</option>
                                            <option value="active">Married</option>
                                            <option value="active">Widowed</option>
                                            <option value="inactive">Divorced</option>
                                            <option value="inactive">N/A (For children) </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2">NHIF Number<sup>*</sup></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="nhif" id="" class="form-control form-control-sm" placeholder="NHIF Number">
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-primary" name="add_patient"> <i class="fa fa-plus mr-2" aria-hidden="true"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            ';
        }

        if( $_GET['patient_page'] === 'view' && isset($_GET['page_number'])){
            $current_page = (int)$_GET['page_number'];
            $paginator = new Paginator($database);
            $paging_items = $paginator->buildPages("patients");
            $number_of_pages = $paging_items[0];
            $items_to_display = $paging_items[1];

            echo '
                <div class="card mr-4 ml-4 mb-4">
                    <div class="card-header">
                        <a href="patients.php?patient_page=add">
                            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Patient</button>
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
                            <table class="table table-sm table-bordered table-hover table-stripped" id="patients-table">
                                <thead class="">
                                    <tr class="">
                                        <th>SL No</th>
                                        <th>Id No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>DoB</th>
                                        <th>Phone Number</th>
                                        <th>NHIF Number</th>
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
                                                $get_details_query = 'SELECT id_no, op_num, sex, physical_address, marital_status, date_in FROM patients WHERE id_no = ? AND first_name = ?';
                                                $params = [$items_to_display[$items]['id_no'], $items_to_display[$items]['first_name']];
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
                                                                        <a href="'.$_SERVER['PHP_SELF'].'?patient_page=edit&patient_id='.$data['id_no'].'" class="mx-2">
                                                                            <button type="button" class="btn btn-sm btn-success me-1">
                                                                                <i class="fa fa-pencil"></i> Edit
                                                                            </button>
                                                                        </a>
                                                                        <a href="'.$_SERVER['PHP_SELF'].'?patient_page=admit&patient_id='.$data['id_no'].'" class="mx-1">
                                                                            <button type="button" class="btn btn-sm btn-secondary">
                                                                                <i class="fa fa-plus"></i> Admit
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

        if( $_GET['patient_page'] === 'admit'){
            $patient_id = (int)$_GET['patient_id'];
            $new_ward = new Ward($database);
            $wards = $new_ward->getWards();
            $patient_data = $database->select('SELECT * FROM patients WHERE id_no = ?', [$patient_id])[0];

            echo '
                <div class="card mb-4 mr-4 ml-4">
                    <div class="card-header">
                        <form action="" class="form-inline">
                            <input type="text" placeholder="Search Name" class="form-control form-control-sm mr-2">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-search mr-2" ></i>Search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="../config/formsprocess.php" method="post">
                            <div class="card-body">';
                            if(isset($_SESSION['msg']) && $_SESSION['msg'] !== ""){
                                echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"><h5>';
                                    echo $_SESSION['msg'];
                                echo'
                                </h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                                sleep(5);
                                unset($_SESSION['msg']);
                            }
                            echo '<div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Patient Name</strong> </label>
                                <div class="col-sm-6">
                                    <input 
                                        type="text" 
                                        value="'.ucfirst($patient_data['first_name']).' '.ucfirst($patient_data['last_name']).'" 
                                        placeholder="" 
                                        name="" 
                                        class="form-control form-control-sm" 
                                        disabled
                                    >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>ID Number</strong> </label>
                                <div class="col-sm-6">
                                    <input 
                                        type="text" 
                                        value="'.$patient_data['id_no'].'" 
                                        placeholder="" 
                                        name="patient_id" 
                                        class="form-control form-control-sm" 
                                        readonly 
                                    >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Ward Name</strong> </label>
                                <div class="col-sm-6">
                                    <select name="ward_name" class="form-control form-control-sm">
                                        <option value="" disabled selected>--Select Ward--</option>';
                                        $new_html->populateSelect($wards, 'name');
                                    echo '</select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Bed Number</strong> </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-sm" max="" name="bed_number" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Next of Kin</strong></label>
                                <div class="col-sm-6">
                                    <input type="text" name="next_of_kin" class="form-control form-control-sm" value="" placeholder="Next of Kin" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Relationship</strong> </label>
                                <div class="col-sm-6">
                                    <input type="text" name="relationship" class="form-control form-control-sm" value="" placeholder="Relationship with next of Kin" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"><strong>Kin (Phone Number)</strong> </label>
                                <div class="col-sm-6">
                                    <input type="tel" name="kin_phone" class="form-control form-control-sm" value="" placeholder="Phone number for next of kin" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary" name="admit_patient"><i class="fa fa-plus-circle mr-2"></i> Admit</button>
                        </form>
                    </div>
                </div>
            ';
        }

        if( $_GET['patient_page'] === 'edit' ){
            echo "<h1>Coming soon</h1>";

        }
    }
?>

<?php require "../public/footer.php" ?>