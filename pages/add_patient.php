<?php require "../public/wrapper.php" ?>

<div class="card">
    <div class="card-header">Patient Info</div>
    <div class="card-body">
        <form action="" method="post">
            <!--PERSONAL INFO-->
            <div class="body">
                <div class="card-header">Personal Info</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" placeholder="First Name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Mid Name</label>
                                <input type="text" placeholder="Mid Name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" placeholder="Last Name" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" name="" id="" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="" selected disabled>--Marital Status--</option>
                                    <option value="">Single</option>
                                    <option value="">Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Occupation</label>
                                <input type="text" name="" id="" placeholder="Patient Occupation" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CONTACT INFO-->
            <div class="body">
                <div class="card-header">Contact info</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <label for="">Email</label>
                            <input type="email" name="" id="" placeholder="Email Address" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Phone Number</label>
                            <input type="tel" name="" id="" placeholder="Phone Number" class="form-control form-control-sm">
                        </div>
                        <div class="col">
                            <label for="">Physical Address</label>
                            <input type="text" name="" id="" placeholder="Physical Address" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-primary">Save</button>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>