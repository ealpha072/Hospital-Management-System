<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Services List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group row">
                <label for="" class="form-label col-sm-2"><strong>Services Name <sup>*</sup></strong></label>
                <div class="col-sm-6">
                    <input type="text" name="" id="" placeholder="Service Name" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="form-label col-sm-2"><strong>Description <sup>*</sup></strong></label>
                <div class="col-sm-6 form-floating">
                    <textarea name="" id="" placeholder="Description" class="form-control form-control-sm"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="form-label col-sm-2"><strong>Unit Charge <sup>*</sup></strong></label>
                <div class="col-sm-6">
                    <input type="text" name="" id="" placeholder="Unit Charge" class="form-control form-control-sm">
                </div>
            </div>

            <button class="btn btn-primary btn-sm">  <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Save</button>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>