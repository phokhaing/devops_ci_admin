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
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>module';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-primary">
                            <i class="fe-tag font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['all']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Modules</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>module/sortby/active';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-success">
                            <i class="fe-check-circle font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['active']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Active Modules</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box" onclick="window.location.href = '<?php echo base_url(); ?>module/sortby/inactive';">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-warning">
                            <i class="fe-clock font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $status['inactive']; ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Inactive Modules</p>
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


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <a href="#modal-add" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                <h4 class="header-title mb-4">Manage Modules</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Module Name</th>
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

                                <td><b><?php echo strtoupper($row['module_name']); ?></b></td>

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
                                            <a href="#modal-edit" class="dropdown-item" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a" onclick="edit(<?php echo $row['module_id']; ?>);"><i class="mdi mdi-pencil mr-2 text-warning font-18 vertical-middle"></i>Edit</a>
                                            <!-- view button -->
                                            <a href="#modal-view" class="dropdown-item" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a" onclick="view(<?php echo $row['module_id']; ?>);"><i class="mdi mdi-check-all mr-2 text-success font-18 vertical-middle"></i>View</a>
                                            <!-- remove button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="remove(<?php echo $row['module_id']; ?>);"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove</a>
                                            <!-- change button -->
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="changeStatus(<?php echo $row['module_id']; ?>,<?php echo $row['status']; ?>);"><i class="mdi mdi-star mr-2 font-18 text-primary vertical-middle"></i>Mark as <?php echo ($row['status'] == 0 ? 'Active' : 'Inactive'); ?></a>
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
<?php $this->load->view('pages/modules/form'); ?>
<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">

    // link url
    var baseURL         = '<?php echo base_url(); ?>';
    var controller      = null;

    // modal form
    var formAdd         = '#form-add';
    var formEdit        = '#form-edit';

    // field name
    var moduleId        = null;
    var moduleName      = '.module_name';
    var status          = '.status';
    var createdBy       = '.created_by';
    var createdAt       = '.created_at';
    var updatedBy       = '.updated_by';
    var updatedAt       = '.updated_at';
    var validmoduleName = '.valid-module-name';

    function setPermission(id){
        alert("under construction");
    }

    $(formAdd).submit(function(e){
        e.preventDefault();
            $.ajax({
                url: baseURL+'/module/create',
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
            url: baseURL+'/module/getById/'+id,
            type: 'GET',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response){ 
                if(response.status == 'success'){
                    var module = response.data;
                    moduleId = module.module_id;
                    $(moduleName).val(module.module_name);
                    $(status).val(module.status);
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
                url: baseURL+'/module/update/'+moduleId,
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
            url: baseURL+'/module/getById/'+id,
            type: 'GET',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response)
            { 
                if(response.status == 'success'){
                    var module = response.data;
                    moduleId = module.module_id;
                    $(moduleName).val(module.module_name);
                    $(status).val(module.status);
                    $(createdBy).val(module.created_by);
                    $(createdAt).val(module.created_at);
                    $(updatedAt).val(module.updated_at);
                    $(updatedAt).val(module.updated_at);
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
        controller = "/module/delete/";
        responseDelete(baseURL+controller+id);
    }   

    function changeStatus(id, status){
        controller = baseURL+"/module/changeStatus/"+id+"/"+status;
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
            $(validModuleName).text(error.module_name);
        }else{
            Custombox.modal.close();
            responseMessage(response);
        }
    }
</script>
                