<?php 
    require "../public/wrapper.php"; 
    require_once "../config/config.php";
?>
    <div class="card mb-4 mr-4 ml-4">
        <div class="card-header">
            <form action="" class="form-inline">
                <input type="text" placeholder="Search Name" class="form-control form-control-sm mr-2">
                <button class="btn btn-sm btn-primary"><i class="fa fa-search mr-2" ></i>Search</button>
            </form>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Patient Name</strong> </label>
                    <div class="col-sm-6">
                        <input type="text" value="" placeholder="" name="" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>IP Number</strong> </label>
                    <div class="col-sm-6">
                        <input type="text" value="GET FROM DB" placeholder="" name="" class="form-control form-control-sm" readonly >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Ward Name</strong> </label>
                    <div class="col-sm-6">
                        <select name="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Select Ward--</option>
                            <!--POPULATE FROM DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Bed Number</strong> </label>
                    <div class="col-sm-6">
                        <select name="" class="form-control form-control-sm">
                            <option value="" disabled selected>--Select Ward--</option>
                            <!--POPULATE FROM DB-->
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Date of Admission</strong> </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" value="" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Next of Kin</strong></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" value="" placeholder="Next of Kin">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Relationship</strong> </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" value="" placeholder="Relationship with next of Kin">
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle mr-2"></i> Admit</button>

            </form>
        </div>
    </div>

<?php require "../public/footer.php" ?>