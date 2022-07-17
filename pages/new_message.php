<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-sm btn-primary"> 
                <a href=""><i class="fa fa-inbox mr-2"></i> Inbox</a>
            </button>
            <button type="button" class="btn btn-sm btn-info">
                <a href=""><i class="fa fa-share-square mr-2"></i> Sent</a> 
            </button>
        </div>
        
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!--PERSONAL INFO-->
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2">Send To<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="" id="" class="form-control form-control-sm" >
                            <option value="">--Select Recipient--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Subject<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Subject">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Message<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="email" name="" id="" class="form-control form-control-sm" placeholder="Message">
                    </div>
                </div>
                
                <button class="btn btn-sm btn-success"> <i class="fa fa-paper-plane mr-2" aria-hidden="true"></i> Send</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>