<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Patients List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post">
            <div class="card-body">
                <div class="form-group row">
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
                    <label for="" class="col-sm-2">Email Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="" class="form-control form-control-sm" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Age<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="age" id="" class="form-control form-control-sm" placeholder="Age" required>
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
                        <input type="text" name="dob" id="" class="form-control form-control-sm" placeholder="Date of Birth" required>
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
                    <label for="" class="col-sm-2">Status<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="status" id="" class="form-control form-control-sm" required>
                            <option value="" disabled selected>--Status--</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">NHIF Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="nhif" id="" class="form-control form-control-sm" placeholder="NHIF Number" required>
                    </div>
                </div>

                <button class="btn btn-sm btn-primary" name="add_patient"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>