<?php require "../public/wrapper.php" ?>
    <div class="card mb-4 mr-4 ml-4">
        <div class="card-header">
            <a href="">
                <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Notice List</button>
            </a>
        </div>
        <div class="card-body">
            <form action="../config/formsprocess.php" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Tittle<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="text" name="title" id="" class="form-control form-control-sm" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Description<sup>*</sup></label>
                        <div class="col-sm-6">
                            <textarea name="description" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Start Date<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="date" name="start_date" id="" class="form-control form-control-sm" placeholder="Start Date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">End Date<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="date" name="end_date" id="" class="form-control form-control-sm" placeholder="End Date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Status<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="status" id="" class="form-control form-control-sm">
                                <option value="" disabled selected>--Select status--</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div> 

                    <button class="btn btn-sm btn-primary" name="add_notice"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
<?php require "../public/footer.php" ?>