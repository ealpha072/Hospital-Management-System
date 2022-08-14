<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Expenses List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post">

            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2">Expense Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="" class="form-control form-control-sm" placeholder="Expense Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Description<sup>*</sup></label>
                    <div class="col-sm-6">
                        <textarea name="description" id="" cols="30" rows="2" class="form-control form-control-sm" maxlength="150" placeholder="A short description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Method<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="payment_method" id="" class="form-control form-control-sm" required>
                            <option value="" selected disabled>--Payment Method--</option>
                            <!--Populate from DB-->
                            <option value="Cash">Cash</option>
                            <option value="Bank">Bank</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Paid From Account<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="paid_from_account" id="" class="form-control form-control-sm" required>
                            <option value="">--Pay from Account--</option>
                            <!--Populate from DB-->
                            <option value="bank 1">Bank 1</option>
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
                        <input type="number" name="amount" id="" class="form-control form-control-sm" placeholder="Amount" required min="0">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Status<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="status" id="" class="form-control form-control-sm" required>
                            <option value="" disabled selected>--Status--</option>
                            <option value="Paid">Paid</option>
                            <option value="Not Paid">Not Paid</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Date Due<sup></sup></label>
                    <div class="col-sm-6">
                        <input type="date" name="due_date" id="" class="form-control form-control-sm" placeholder="Date Due">
                    </div>
                </div>

                <button class="btn btn-sm btn-primary" name="add_expense"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>