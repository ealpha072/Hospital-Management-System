<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Departments List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post">
            <div class="form-group row">
                <label for="" class="form-label col-sm-2">Dept Name <sup>*</sup> </label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="" placeholder="Department Name" class="form-control form-control-sm" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="form-label col-sm-2">HOD <sup>*</sup> </label>
                <div class="col-sm-6">
                    <select name="hod" id="" class="form-control form-control-sm" required>
                        <option value="" disabled selected>--Select Incharge--</option>
                        <!--populate from DB-->
                        <option value="John">John</option>
                    </select>    
                </div>
            </div>
            <button class="btn btn-primary btn-sm" name="add_department"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>