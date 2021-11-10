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
        <div class="col-12">
            <div class="card-box">
                <!-- <button type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Add Role
                </button> -->
                <a href="#modal-add-module" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add Permission</a>
                <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-sm btn-blue waves-effect">< Back</a>
                <h4 class="header-title mb-4"></h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Module</th>
                        <th>Permission</th>
                        <th class="hidden-sm">Action</th>
                    </tr>
                    </thead>
                        <?php 
                    if(isset($data)){
                        $i=1;
                        foreach ($data as $row) { ?>
                           <tr>
                                <td><b><?php echo $i++; ?></b></td>
                                <td><b><?php echo strtoupper($row['module_name']); ?></b></td>
                                <td>
                                    <?php foreach ($permissions as $permission){
                                            $isChecked = checkedPermission($row['module_id'],$permission['permission_id']);
                                        ?>
                                        
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" <?php echo ($isChecked != 0 ? 'checked' : ''); ?> class="custom-control-input" value="<?php echo checkedPermission($row['module_id'],$permission['permission_id']); ?>" onchange="checkPermission('<?php echo strtolower($row['module_name'].'-'.$permission['permission_name']); ?>',<?php echo $row['module_id'] ?>,<?php echo $permission['permission_id']; ?>);" id="<?php echo strtolower($row['module_name'].'-'.$permission['permission_name']); ?>">
                                            <label class="custom-control-label" for="<?php echo strtolower($row['module_name'].'-'.$permission['permission_name']); ?>"><?php echo $permission['permission_name'] ?></label>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- edit button -->
                                            <a href="#modal-edit" class="dropdown-item" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a" onclick="edit(<?php echo $row['id']; ?>);"><i class="mdi mdi-pencil mr-2 text-warning font-18 vertical-middle"></i>Edit</a>
                                            <!-- remove button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="remove(<?php echo $row['id']; ?>);"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        
                        <?php }
                    }?>  
                    <tbody>                  
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
<?php $this->load->view('pages/roles/form'); ?>
<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">

    // link url
    var baseURL         = '<?php echo base_url(); ?>';
    var controller      = null;

    // modal form 
    var formAddModule   = '#form-add-module';
    var formEditModule  = '#form-edit-module';

    // field name 
    var roleId          = '.role_id';
    var moduleId        = '.module_id';
    var validModuleId   = '.valid-module-name';

    function checkPermission(div, moduleId, permissionId){
        var value = $('#'+div).val();
        $.ajax({
            url: baseURL+'/role/checkPermission/'+value+'/'+moduleId+'/'+permissionId,
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response){ 
                
            }
        });
    }

    $(formAddModule).submit(function(e){
        e.preventDefault();
            $.ajax({
                url: baseURL+'/role/createModule',
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

    $(formEditModule).submit(function(e){
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
            $(validModuleId).text(error.module_id);
        }else{
            Custombox.modal.close();
            responseMessage(response);
        }
    }
</script>
                