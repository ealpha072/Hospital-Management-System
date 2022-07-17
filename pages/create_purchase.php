<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <a href="">
            <button class="btn btn-md btn-primary"> <i class="fa fa-list mr-2"></i> Purchase List</button>
        </a>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                         <div class="col">
                             <h5><strong>Alpha Hospital</strong></h5>
                             <h6><strong>BOX 227 Nairobi</strong></h6>
                             <h6>ealpha072@gmail.com</h6>
                         </div>
                         <div class="col">
                            <h6><strong>PURCHASE ORDER</strong></h6>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th scope="col">PO NUMBER</th>
                                        <th scope="col">DATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <th>
                                            <input type="text" placeholder="PO Num." class="form-control form-control-sm">
                                        </th>
                                        <th>
                                            <input type="date" name="" id="" class="form-control form-control-sm">
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    </div>

                    <div class="mt-2">
                        <!--Add shipping info-->
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Company Name" class="form-control form-control-sm">
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Email Address" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="tel" placeholder="Phone" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Company Name" class="form-control form-control-sm">
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Email Address" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="tel" placeholder="Phone" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                    
                                </tr>
                            </tbody>
                        </table>
                        <!--Add items table-->
                        <table class="table table-bordered table-sm">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="po-table-body">
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm arppt"><i class="fa fa-plus-circle"></i></button>
                                            <button class="btn btn-info btn-sm"><i class="fa fa-minus-circle"></i></button>
                                        </div>
                                    </td>                                    
                                    <td>
                                        <input type="text" class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" placeholder="0.00" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="row mt-2">
                        <div class="col-7">                                                            
                            <textarea name="" id="" cols="30" rows="5" class="form-control form-control-sm" placeholder="Additional Notes"></textarea>                                                            
                        </div>
                        <div class="col-5">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subtotal</th>
                                        <th>
                                            <input type="number" class="form-control form-control-sm" placeholder="0.00">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Discount (%)</td>
                                        <td>
                                            <input type="number" class="number form-control form-control-sm" placeholder="0.00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>G.Total</strong> </td>
                                        <td>
                                            <input type="number" class="number form-control form-control-sm" placeholder="0.00">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-md btn-success"><i class="fa fa-save mr-2"></i> Save and Print</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>