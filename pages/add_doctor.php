<?php require "../public/wrapper.php" ?>

<div class="card mr-4 ml-4 mb-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Doctor</button>
        </a>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Show</label>
                    </div>
                    <select class="custom-select">
                        <option selected>Choose...</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm btn-outline-success">CSV</button>
                    <button type="button" class="btn btn-sm btn-outline-success">Exel</button>
                    <button type="button" class="btn btn-sm btn-outline-success">Copy</button>
                    <button type="button" class="btn btn-sm btn-outline-success">PDF</button>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-success" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover table-stripped">
                <thead class="">
                    <tr class="text-center">
                        <th>SL No</th>
                        <th>Id No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DoB</th>                        
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>NHIF Number</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div class="card mr-4 ml-4 mb-4" id="add_doctor_page">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary" name="doctor-list"> <i class="fa fa-list mr-2"></i> Doctor List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post" enctype="multipart/form-data">
            <!--PERSONAL INFO
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
                    <label for="" class="col-sm-2">Id Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="id_num" id="" class="form-control form-control-sm" placeholder="Last Name" required maxlength="12">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Email Address<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="" class="form-control form-control-sm" placeholder="Email Address" required>
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
                        <input type="date" name="dob" id="" class="form-control form-control-sm" placeholder="Date of Birth" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Age<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="age" id="" class="form-control form-control-sm" placeholder="Age" required>
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
                    <label for="" class="col-sm-2">Picture </label>
                    <div class="col-sm-6">
                        <input type="file" name="profile_picture" id="" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Department<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="department" id="" class="form-control form-control-sm" required>
                            <option value="">--Select Department--</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Radiology">Radiology</option>
                            <!--populate from DB
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">NHIF Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="nhif" id="" class="form-control form-control-sm" placeholder="NHIF Number" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">NSSF Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="nssf" id="" class="form-control form-control-sm" placeholder="NSSF Number" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">KRA Number<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="kra" id="" class="form-control form-control-sm" placeholder="KRA Number" required>
                    </div>
                </div>
                <button class="btn btn-sm btn-primary" name="add_doctor" type="submit"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div> -->

<?php require "../public/footer.php" ?>