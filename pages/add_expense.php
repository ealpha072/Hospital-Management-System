<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Expenses List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="" method="post">

            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2">Expense Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Expense Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Description<sup>*</sup></label>
                    <div class="col-sm-6">
                        <textarea name="" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Method<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="" selected disabled>--Payment Method--</option>
                            <!--Populate from DB-->
                            <option value="">Cash</option>
                            <option value="">Bank</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Paid From Account<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">--Pay from Account--</option>
                            <!--Populate from DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Account Balance<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Amount<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="Amount">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Status<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Status--</option>
                            <option value="">Paid</option>
                            <option value="">Not Paid</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Date Due<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="Date Due">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Date Added<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="Date Added">
                    </div>
                </div>

                <button class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>