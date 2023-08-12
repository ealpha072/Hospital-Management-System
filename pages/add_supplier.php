<?php 
    require "../public/wrapper.php"; 
    include_once "../config/utilities.php";
?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Suppliers List</button>
        </a>
    </div>
    
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2">Supplier ID<sup>*</sup></label>
                    <div class="col-sm-6">
                        <!--autogenerate-->
                        <input type="text" name="supplier_id" id="" class="form-control form-control-sm" readonly value=<?php echo(generateSupplierId());?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="" class="form-control form-control-sm" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Email Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="" class="form-control form-control-sm" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Company Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="company_name" id="" class="form-control form-control-sm" placeholder="Company Name" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Phone Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="tel" name="phone_number" id="" class="form-control form-control-sm" placeholder="Phone Number" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Physical Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="p_address" id="" class="form-control form-control-sm" placeholder="Physical Address" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Status<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="status" id="" class="form-control form-control-sm" required>
                            <option value="" disabled selected>--Status--</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-sm btn-primary" name="add_supplier"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>