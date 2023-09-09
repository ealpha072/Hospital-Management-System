<?php 
    
    use function PHPSTORM_META\type;

    require_once "../config/classes.php";
    require "../public/wrapper.php";
    
    echo '<div class="card mb-4 mr-4 ml-4">
        <div class="card-header">Ward Info</div>
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
                sleep(3);
                unset($_SESSION['msg']);
            };
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
                <button class="btn btn-sm btn-primary" name="add_ward">Add</button>
            </form>
        </div>
    </div>';
?>

<?php require "../public/footer.php" ?>