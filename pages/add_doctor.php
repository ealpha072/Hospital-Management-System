<?php require "../public/wrapper.php" ?>

<div class="card mr-4 ml-4 mb-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-bars mr-2"></i> Doctor List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!--PERSONAL INFO-->
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2">First Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Last Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Email Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" name="" id="" class="form-control form-control-sm" placeholder="Email Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Phone Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="tel" name="" id="" class="form-control form-control-sm" placeholder="Phone Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Physical Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Physical Address">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Date of Birth<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Date of Birth">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Sex<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Select Gender--</option>
                            <option value="">Man</option>
                            <option value="">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Status<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Status--</option>
                            <option value="">Active</option>
                            <option value="">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Picture<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="file" name="" id="" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Department<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">--Select Department--</option>
                            <!--populate from DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">NHIF Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="NHIF Number">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">NSSF Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="NSSF Number">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">KRA Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="KRA Number">
                    </div>
                </div>
                <button class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>