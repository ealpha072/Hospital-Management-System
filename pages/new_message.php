<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-sm btn-primary"> 
                <a href="inbox.php"><i class="fa fa-inbox mr-2"></i> Inbox</a>
            </button>
            <button type="button" class="btn btn-sm btn-info">
                <a href="sent_sms.php"><i class="fa fa-share-square mr-2"></i> Sent</a> 
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="../config/formsprocess.php" method="post" enctype="multipart/form-data">
            <!--PERSONAL INFO-->
            <div class="card-body">
            <div class="form-group row">
                    <label for="" class="col-sm-2">From<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="" name="from_email" class="form-control form-control-sm" readonly value="Admin">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Send To<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="to_email" id="" class="form-control form-control-sm" required>
                            <option value="">--Select Recipient Department--</option>
                            <option value="Neurology"> Neurology</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">CC<sup>*</sup></label>
                    <div class="col-sm-6">
                        <select name="cc_email" id="" class="form-control form-control-sm" >
                            <option value="">--Select Department to CC--</option>
                            <option value="Xray"> Xray</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Subject<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="text" name="subject" id="" class="form-control form-control-sm" placeholder="Subject" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Message<sup>*</sup></label>
                    <div class="col-sm-6">
                        <textarea name="body" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Attachments<sup>*</sup></label>
                    <div class="col-sm-6">
                        <input type="file" name="attachments[]" id="" class="form-control form-control-sm" placeholder="Message" multiple>
                    </div>
                </div>
                
                <button class="btn btn-sm btn-success" name="send_message"> <i class="fa fa-paper-plane mr-2" aria-hidden="true"></i> Send</button>
            </div>
        </form>
    </div>
</div>

<?php require "../public/footer.php" ?>