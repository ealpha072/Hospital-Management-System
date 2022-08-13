<?php require "../public/wrapper.php" ?>
    <div class="card mb-4 mr-4 ml-4">
        <div class="card-header">
            <a href="">
                <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Drugs List</button>
            </a>
        </div>
        <div class="card-body">
            <form action="../config/formsprocess.php" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Medicine Name<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="" class="form-control form-control-sm" placeholder="Medicine Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Category<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="category" id="" class="form-control form-control-sm" required>
                                <option value="" selected disabled>--Select Category--</option>
                                <!--popUlate from DB-->
                                <option value="Anti-Deps">Anti-Depresant</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Unit Price<sup>*</sup></label>
                        <div class="col-sm-6">
                            <input type="number" name="unit_price" id="" class="form-control form-control-sm" placeholder="Unit Price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Supplier<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="supplier" id="" class="form-control form-control-sm" required>
                                <option value="" disabled selected>--Choose Supplier--</option>
                                <option value="Alpha Co">Alpha Co</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Status<sup>*</sup></label>
                        <div class="col-sm-6">
                            <select name="status" id="" class="form-control form-control-sm" required>
                                <option value="" disabled selected>--Select status--</option>
                                <option value="Acive">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div> 

                    <button class="btn btn-sm btn-primary" name="add_drug"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
<?php require "../public/footer.php" ?>