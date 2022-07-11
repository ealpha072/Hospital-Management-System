<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Departments List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group row">
                <label for="" class="form-label col-sm-2">Dept Name <sup>*</sup> </label>
                <div class="col-sm-6">
                    <input type="text" name="" id="" placeholder="Department Name" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="form-label col-sm-2">HOD <sup>*</sup> </label>
                <div class="col-sm-6">
                    <select name="" id="" class="form-control form-control-sm">
                        <option value="" disabled selected>--Select Incharge--</option>
                        <!--populate from DB-->
                    </select>
                    
                </div>
            </div>
            <button class="btn btn-primary btn-sm">  <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>