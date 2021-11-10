<!-- Form create permission -->
<div id="modal-add" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Users</h4>
    <div class="custom-modal-text text-left">
        <form id="form-add">
            <div class="row">
                <!-- staff_id -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff_id"><?php echo lang('staff_id'); ?></label>
                        <input type="text" class="form-control staff_id" name="staff_id" placeholder="Enter staff_id" required>
                        <span class="text-danger valid_staff_id"></span>
                    </div>
                </div>
                <!-- firstname -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname"><?php echo lang('firstname');?></label>
                        <input type="text" class="form-control firstname" name="firstname" placeholder="Enter firstname" required>
                        <span class="text-danger valid_firstname"></span>
                    </div>
                </div>
                <!-- lastname -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname"><?php echo lang('lastname');?></label>
                        <input type="text" class="form-control lastname" name="lastname" placeholder="Enter lastname" required>
                        <span class="text-danger valid_lastname"></span>
                    </div>
                </div>
                <!-- gender -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender"><?php echo lang('gender');?></label>
                        <select class="form-control gender" name="gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <!-- dob -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dob"><?php echo lang('dob');?></label>
                        <input type="text" class="form-control dob" name="dob" placeholder="Enter date of birth" required>
                        <span class="text-danger valid_dob"></span>
                    </div>
                </div>
                <!-- email -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><?php echo lang('email');?></label>
                        <input type="email" class="form-control email" name="email" placeholder="Enter email address" required>
                        <span class="text-danger valid_email"></span>
                    </div>
                </div>
                <!-- username -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username"><?php echo lang('username');?></label>
                        <input type="text" class="form-control username" name="username" placeholder="Enter username" required>
                        <span class="text-danger valid_username"></span>
                    </div>
                </div>
                <!-- password -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password"><?php echo lang('password');?></label>
                        <input type="text" class="form-control password" name="password" placeholder="Enter password" required>
                        <span class="text-danger valid_password"></span>
                    </div>
                </div>
                <!-- confirm_password -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password"><?php echo lang('confirm').' '.lang('password');?></label>
                        <input type="text" class="form-control confirm_password" name="confirm_password" placeholder="example@gmail.com" required>
                        <span class="text-danger valid_confirm_password"></span>
                    </div>
                </div>
                <!-- phone -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone"><?php echo lang('phone').' '.lang('number');?></label>
                        <input type="text" class="form-control phone" placeholder="0123456789" required>
                        <span class="text-danger valid_phone"></span>
                    </div>
                </div>
                <!-- extension -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="extension"><?php echo lang('extension');?></label>
                        <input type="text" class="form-control extension" placeholder="0123456789" required>
                        <span class="text-danger valid_extension"></span>
                    </div>
                </div>
                <!-- rolea -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="roles"><?php echo lang('role');?></label>
                        <select class="form-control select2-multiple roles" data-toggle="select2" multiple data-placeholder="Choose ...">>
                            <option value="">--- Select roles ---</option>
                            <?php if(!empty($roles)): ?>
                            <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role['role_id']; ?>"> <?php echo $role['role_name']; ?> </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <!-- statuss -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="statuss"><?php echo lang('status');?></label>
                        <select class="form-control statuss" name="statuss" data-toggle="select2">
                            <option value="1">Active</option>
                            <option value="0">In-Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success waves-effect waves-light"><?php echo lang('save');?></button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.modal.close();">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Form update permission -->
<div id="modal-edit" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Edit Permissions</h4>
    <div class="custom-modal-text text-left">
        <form id="form-edit">
            <div class="form-group">
                <label for="permission_name">Permission Name</label>
                <input type="text" class="form-control permission_name" name="permission_name" placeholder="Enter permission name" required>
                <span class="text-danger valid-permission-name"></span>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <!-- <select class="form-control" dd="status" name="status" data-toggle="select2"> -->
                <select class="form-control status" name="status">
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success waves-effect waves-light">Save Change</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.modal.close();">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Form view permission -->
<div id="modal-view" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">View Permission</h4>
    <div class="custom-modal-text text-left">
        <form id="form-view">
            <div class="form-group">
                <label for="permission_name">Permission Name</label>
                <input type="text" class="form-control permission_name" placeholder="NULL">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control status">
                    <option value="1">Active</option>
                    <option value="0">In-Active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" class="form-control created_by" placeholder="NULL">
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="text" class="form-control created_at" placeholder="NULL">
            </div>
            <div class="form-group">
                <label for="updated_by">Updated By</label>
                <input type="text" class="form-control updated_by" placeholder="NULL">
            </div>
            <div class="form-group">
                <label for="updated_at">Updated At</label>
                <input type="text" class="form-control updated_at" placeholder="NULL">
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.modal.close();">Close</button>
            </div>
        </form>
    </div>
</div>