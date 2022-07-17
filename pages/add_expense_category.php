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
                    <label for="" class="col-sm-2">Category Name<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Expense Name">
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

                <button class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>