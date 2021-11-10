<?php $this->load->view('layouts/header'); ?>
<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) ? ucfirst($title) : $this->uri->segment(1)); ?></li>
                    </ol>
                </div>
                <h4 class="page-title"><?php echo (isset($title) ? ucfirst($title) : $this->uri->segment(2)); ?></h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>role';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-primary">
                            <i class="fe-tag font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['all']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Total</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>role/sortby/active';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-success">
                            <i class="fe-check-circle font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['active']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Active</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>role/sortby/inactive';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-warning">
                            <i class="fe-clock font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['inactive']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Inactive</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-danger">
                            <i class="fe-trash-2 font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">128</span></h3>
                            <p class="text-muted mb-1 text-truncate">Deleted Tickets</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->  

    <!-- table list data -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- <button type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Add Role
                </button> -->
                <a href="#modal-add" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                <h4 class="header-title mb-4">Manage Roles</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th class="hidden-sm">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    if(isset($data)){
                        $i=1;
                        foreach ($data as $row) { ?>

                           <tr>
                                <td><b><?php echo $i++; ?></b></td>

                                <td><b><?php echo strtoupper($row['role_name']); ?></b></td>

                                <td>
                                    <?php echo ($row['status'] == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">In-Active</span>'); ?>
                                </td>
                                <td><?php echo $row['created_by']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['created_at']));; ?></td>

                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- edit button -->
                                            <a href="#modal-edit" class="dropdown-item" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a" onclick="edit(<?php echo $row['role_id']; ?>);"><i class="mdi mdi-pencil mr-2 text-warning font-18 vertical-middle"></i>Edit</a>
                                            <!-- view button -->
                                            <a href="#modal-view" class="dropdown-item" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a" onclick="view(<?php echo $row['role_id']; ?>);"><i class="mdi mdi-check-all mr-2 text-success font-18 vertical-middle"></i>View</a>
                                            <!-- remove button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="remove(<?php echo $row['role_id']; ?>);"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove</a>
                                            <!-- change button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="changeStatus(<?php echo $row['role_id']; ?>,<?php echo $row['status']; ?>);"><i class="mdi mdi-star mr-2 font-18 text-primary vertical-middle"></i>Mark as <?php echo ($row['status'] == 0 ? 'Active' : 'Inactive'); ?></a>
                                            <!-- setPermission button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="window.location.href = '<?php echo base_url(); ?>role/setPermission?role='+<?php echo $row['role_id']; ?>;"><i class="mdi mdi-key mr-2 font-18 text-danger vertical-middle"></i>Set Permission</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        <?php }
                    }?>                    
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end table list data -->

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
    <!-- <?php //$this->load->view('pages/users/form'); ?> -->
    <?php $this->load->view('layouts/footer'); ?>

    <script type="text/javascript">

        // link url
        var baseURL         = '<?php echo base_url(); ?>';
        var controller      = null;

        // modal form
        var formAdd         = '#form-add';
        var formEdit        = '#form-edit';

        // field name
        var roleId          = null;
        var roleName        = '.role_name';
        var status          = '.status';
        var createdBy       = '.created_by';
        var createdAt       = '.created_at';
        var updatedBy       = '.updated_by';
        var updatedAt       = '.updated_at';
        var validRoleName   = '.valid-role-name';

        $(formAdd).submit(function(e){
            e.preventDefault();
                $.ajax({
                    url: baseURL+'/role/create',
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response){ 
                        validationForm(response);
                    },
                    error:function(response){
                        responseServerError();
                    }
                });
        });

        function edit(id){
            $.ajax({
                url: baseURL+'/role/getById/'+id,
                type: 'GET',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(response){ 
                    if(response.status == 'success'){
                        var role = response.data;
                        roleId = role.role_id;
                        $(roleName).val(role.role_name);
                        $(status).val(role.status);
                        // $(modalEditRole).modal('show');
                    }else{
                        Custombox.modal.close();
                        responseError(response);
                    }
                },
                error:function(response){
                    responseServerError();
                }
            });
        }

        $(formEdit).submit(function(e){
            e.preventDefault();
                $.ajax({
                    url: baseURL+'/role/update/'+roleId,
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response){ 
                        validationForm(response);
                    },
                    error:function(response){
                        Custombox.modal.close();
                        responseServerError();
                    }
                });
        });

        function view(id){
            $.ajax({
                url: baseURL+'/role/getById/'+id,
                type: 'GET',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(response)
                { 
                    if(response.status == 'success'){
                        var role = response.data;
                        roleId = role.role_id;
                        $(roleName).val(role.role_name);
                        $(status).val(role.status);
                        $(createdBy).val(role.created_by);
                        $(createdAt).val(role.created_at);
                        $(updatedAt).val(role.updated_at);
                        $(updatedAt).val(role.updated_at);
                    }else{
                        Custombox.modal.close();
                        responseError(response);
                    }
                },
                error:function(response){
                    responseServerError();
                }
            });
        }

        function remove(id){
            controller = "/role/delete/";
            responseDelete(baseURL+controller+id);
        }   

        function changeStatus(id, status){
            controller = baseURL+"/role/changeStatus/"+id+"/"+status;
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to change status?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ml-2 mt-2",
                buttonsStyling: !1
            }).then(function(result) {
                if(result.value){
                    $.ajax({
                        url:  controller,
                        type: "POST",
                        dataType: 'json',
                        success: function(response) {
                            responseMessage(response);
                        },
                        error:function(data) {
                            responseServerError();
                        }
                    });
                }
            });
        }

        function validationForm(response){
            if(response.status == 'error'){
                var error = response.errors;
                $(validRoleName).text(error.role_name);
            }else{
                Custombox.modal.close();
                responseMessage(response);
            }
        }
    </script>
                