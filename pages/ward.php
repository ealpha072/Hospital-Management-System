<?php 
    require_once "../config/classes.php";
    require "../public/wrapper.php";
    require_once('../config/pagination.php');
    
    if(isset($_GET['ward_page'])){
        $database = new Database();
        $new_html = new Html();

        if($_GET['ward_page'] === 'add'){
            echo '<div class="card mb-4 mr-4 ml-4">
                <div class="card-header">
                    <a href="'.$_SERVER['PHP_SELF'].'?ward_page=view&page_number=1">
                        <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Wards List</button>
                    </a>
                </div>
                <div class="card-body">';
                    $new_html->showSessionMessage();
                    echo '<form action="../config/formsprocess.php" method="post">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="wardname" id="" placeholder="Ward Name" class="form-control form-control-sm" required>
                                </div>
                            </div>
        
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Incharge</label>
                                    <select name="incharge" id="" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>--Choose Incharge--</option>
                                        <option value="John">John</option>
                                    </select>
                                </div>
                            </div>
        
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Capacity</label>
                                    <input type="number" name="capacity" id="" placeholder="Number of Beds" class="form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" name="add_ward"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Add</button>
                    </form>
                </div>
            </div>';
        }

        if($_GET['ward_page'] === 'view' && isset($_GET['page_number']) ){
            $current_page = (int)$_GET['page_number'];
            $paginator = new Paginator($database);
            $columnsToSelect= ['name', 'incharge', 'capacity'];
            $paging_items = $paginator->buildPages("wards", 10, $columnsToSelect);
            $number_of_pages = $paging_items[0];
            $items_to_display = $paging_items[1];

            echo '
            <div class="card mr-4 ml-4 mb-4">
                <div class="card-header">
                    <a href="ward.php?ward_page=add">
                        <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Ward</button>
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
                        <table class="table table-sm table-bordered table-hover table-stripped">
                            <thead class="">
                                <tr class="">
                                    <th>SL No</th>';
                                    foreach ($columnsToSelect as $columns) {
                                        # code...
                                        echo '<th>'.ucfirst($columns).'</th>';
                                    }
                                    echo '
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                                for($items = 0; $items < count($items_to_display); $items++){
                                    echo '<tr class = "">
                                            <td class="text-center">
                                                <i class="fa fa-circle-plus"></i>
                                            </td>';
                                            foreach(array_keys($items_to_display[$items]) as $key){
                                                echo '<td>'.ucfirst($items_to_display[$items][$key]).'</td>';
                                            }
                                            echo '<td>
                                                <a href="'.$_SERVER['PHP_SELF'].'?ward_page=edit&ward_id='.'" class="mx-2">
                                                    <button type="button" class="btn btn-sm btn-success me-1">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </button>
                                                </a>
                                            </td>';
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