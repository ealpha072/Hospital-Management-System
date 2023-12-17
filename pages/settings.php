<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-cogs"></i> Settings</h6>
        </div>
        <div class="card-body">
            <?php showSuccessMessage(); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6>System settings</h6>
                </div>
                <div class="card-body">
                    <?php
                        $system_settings->execute();
                        $sys = $system_settings->fetchAll(PDO::FETCH_ASSOC);
                        $sys = $sys[0];
                    ?>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">System Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $sys['name']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $sys['address']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control form-control-sm" value="<?php echo $sys['phone']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">System Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-sm" value="<?php echo $sys['email']?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 10px; margin-bottom:10px">
                <div class="card-header">
                    <h6>School Settings</h6>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($update_school_settings_error) && !empty($update_school_settings_error)){
                            displayErrors($update_school_settings_error);
                        }
                    ?>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $settings['school_name']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $settings['school_email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control form-control-sm" value="<?php echo $settings['school_phone'];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Vision</label>
                        <div class="col-sm-9">
                            <textarea name="" id="" rows="" cols="" class="form-control form-control-sm" readonly><?php echo $settings['vision']?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Mission</label>
                        <div class="col-sm-9">
                            <textarea name="" id="" cols="" rows="" class="form-control form-control-sm" readonly><?php echo $settings['mission']?></textarea>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">School settings</h6>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" value="<?php echo $settings['school_name']?>" required name="school-name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">School email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control-sm" value="<?php echo $settings['school_email']?>" required name="school-email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="form-control form-control-sm" value="<?php echo $settings['school_phone']?>" required name="school-phone">
                                                <small id="emailHelp" class="form-text text-muted">Phone number must be 13 digits (+2547XXXXXXXX)</small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Vision</label>
                                            <div class="col-sm-9">
                                                <textarea cols="" rows="" class="form-control form-control-sm" required name="school-vision"><?php echo $settings['vision']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Mission</label>
                                            <div class="col-sm-9">
                                                <textarea cols="" rows="" class="form-control form-control-sm" required name="school-mission" ><?php echo $settings['mission']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success btn-sm" name="edit-school-settings">Save</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end of modal-->
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row card" style="margin-bottom: 10px;">
                <div class="card-header">
                    <h6>Change Image</h6>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($update_image_error) && !empty($update_image_error)) {
                            displayErrors($update_image_error);
                        }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control form-control-sm" name="admin-photo" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm" name="upload-image" id="upload-img">Upload</button>
                    </form>
                </div>
            </div>

            <div class="card row">
                <div class="card-header">
                    <h6>Login Details</h6>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($update_logins_error) && !empty($update_logins_error)){
                            displayErrors($update_logins_error);
                        }
                    ?>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="<?php echo $settings['user_name']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control form-control-sm" value="<?php echo $settings['password']?>" readonly>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">
                        Edit
                    </button>

                    <!--modal-->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">Login settings</h6>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">New Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" value="" required name="new-username">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Old Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control form-control-sm" value="" required name="old-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control form-control-sm" value="" required name="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control form-control-sm" value="" required name="confirm-password">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success btn-sm" name="update-logins">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of modal-->
                </div>
            </div>
        </div>
    </div>
</div>