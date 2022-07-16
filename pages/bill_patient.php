<?php require "../public/wrapper.php" ?>

<div class="card mr-4 mb-2 ml-4">
    <div class="card-header">
        <form action="" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" placeholder="IP Number" class="form-control form-control-sm mr-2">
                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-search mr-2"></i> Search</button>
            </div>
        </form>
    </div>

    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-9">
                    <div class="form-group row">  
                        <label for="" class="col-sm-2">Patient Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">  
                        <label for="" class="col-sm-2">IP Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">  
                        <label for="" class="col-sm-2">Date of Adm</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <img src="" alt="" class="img-thumbnail" height="150" width="150">
                </div>
            </div>

            <div class="mt-4">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <label for="" class="col-4"><strong>Discharge Date</strong> </label>
                            <div class="col-8">
                                <input type="text" readonly value="" name="" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="" class="col-4"><strong>Total Days</strong> </label>
                            <div class="col-8">
                                <input type="text" readonly value="" name="" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="row">
                            <label for="" class="col-4"><strong>Insurance Provider</strong> </label>
                            <div class="col-8">
                                <input type="text" readonly value="" name="" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <label for="" class="col-4"><strong> Insurance Number</strong></label>
                            <div class="col-8">
                                <input type="text" readonly value="" name="" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <table class="table table-bordered" id="bill-table">
                    <thead class="">
                        <tr>
                            <th><i class="fa fa-cogs"></i></th>
                            <th>Service Name</th>
                            <th>Quantity</th>
                            <th>Unit Charge</th>
                            <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody id="bill-table-body">
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm add-row-btn">+</button>
                                    <button class="btn btn-success btn-sm remove-row-btn">-</button>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" placeholder="Service Name">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="1">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="0.00">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="0.00" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm add-row-btn">+</button>
                                    <button class="btn btn-success btn-sm remove-row-btn">-</button>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" placeholder="Service Name">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="1">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="0.00">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" placeholder="0.00" readonly>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-4">Payment Method</label>
                        <div class="col-8">
                            <select name="" id="" class="form-control form-control-sm">
                                <option value="" selected disabled>--Payment Method--</option>
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-4">Card/ Cheque Number</label>
                        <div class="col-8">
                            <input type="text" placeholder="Card/ Cheque No" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Totals</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <input type="number" name="" id="" class="form-control form-control-sm" placeholder="0.00">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-text">Discount %</span>
                                        <input type="number" name="" id="" class="form-control form-control-sm" placeholder="0.00">
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="" id="" class="form-control form-control-sm"  placeholder="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-text">Tax %</span>
                                        <input type="number" name="" id="" class="form-control" placeholder="0.00" >
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="" id="" class="form-control fom-conrol-sm" placeholder="0.00">
                                </td>
                            </tr>
                            <tr>
                                <td>Payable</td>
                                <td>
                                    <input type="number" name="" id="" class="form-control fom-conrol-sm" placeholder="0.00">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <textarea name="" id="" class="form-control " placeholder="Additional Notes"></textarea>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-md btn-success"><i class="fa fa-save mr-2"></i> Save and Print Invoice</button>
            </div>
        </form>
        
    </div>
</div>
<?php require "../public/footer.php" ?>
