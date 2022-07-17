<?php require "../public/wrapper.php" ?>
    <div class="card mb-4 mr-4 ml-4">
        <div class="card-header">
            <a href="">
                <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Notice List</button>
            </a>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Medicine Name<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Medicine Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Category<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="" selected disabled>--Select Category--</option>
                                <!--popUlate from DB-->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Unit Price<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="email" name="" id="" class="form-control form-control-sm" placeholder="Unit Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Supplier<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Supplier">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Status<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="" disabled selected>--Select status--</option>
                                <option value="">Active</option>
                                <option value="">Inactive</option>
                            </select>
                        </div>
                    </div> 

                    <button class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
<?php require "../public/footer.php" ?>