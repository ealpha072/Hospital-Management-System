<?php require "../public/wrapper.php" ?>

<div class="card">
    <div class="card-header">Create Department</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group row">
                <label for="" class="form-label col-2">Dept Name <sup>*</sup> </label>
                <div class="col-9">
                    <input type="text" name="" id="" placeholder="Department Name" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="form-label col-2">HOD <sup>*</sup> </label>
                <div class="col-9">
                    <select name="" id="" class="form-control form-control-sm">
                        <option value="" disabled selected>--Select Incharge--</option>
                        <!--populate from DB-->
                    </select>
                    
                </div>
            </div>
            <button class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>