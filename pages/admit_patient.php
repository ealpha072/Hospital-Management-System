<?php require "../public/wrapper.php" ?>
    <div class="card">
        <div class="card-header">
            <form action="" class="form-inline">
                <input type="text" placeholder="Search Name" class="form-control form-control-sm mr-2">
                <button class="btn btn-sm btn-primary"><i class="fa fa-search mr-2" ></i>Search</button>
            </form>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group row">
                    <label for="" class="col-2 col-form-label">Patient Name</label>
                    <div class="col-8">
                        <input type="text" value="" placeholder="" name="" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-2 col-form-label">IP Number</label>
                    <div class="col-8">
                        <input type="text" value="GET FROM DB" placeholder="" name="" class="form-control form-control-sm" readonly >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-2 col-form-label">Ward Name</label>
                    <div class="col-8">
                        <select name="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Select Ward--</option>
                            <!--POPULATE FROM DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-2 col-form-label">Bed Number</label>
                    <div class="col-8">
                        <select name="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Select Ward--</option>
                            <!--POPULATE FROM DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-2 col-form-label">Date of Admission</label>
                    <div class="col-8">
                        <input type="text" class="form-control form-control-sm" value="" readonly>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Admit</button>

            </form>
        </div>
    </div>

<?php require "../public/footer.php" ?>