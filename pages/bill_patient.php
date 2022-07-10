<?php require "../public/wrapper.php" ?>

<div class="card">
    <div class="card-header">
        <form action="" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" placeholder="IP Number" class="form-control form-control-sm mr-2">
                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-search mr-2"></i> Search</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="search-results">
            <div class="form-group row">  
                <label for="" class="col-sm-2">Patient Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" value="" readonly>
                </div>
            </div>
            <div class="form-group row">  
                <label for="" class="col-sm-2">IP Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" value="" readonly>
                </div>
            </div>
            <div class="form-group row">  
                <label for="" class="col-sm-2">D.O.B</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" value="" readonly>
                </div>
            </div>
        </div>
        <div class="card-header">Bill Patient</div>
    </div>
</div>
<?php require "../public/footer.php" ?>