<!-- Form create module -->
<div id="modal-add" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Modules</h4>
    <div class="custom-modal-text text-left">
        <form id="form-add">
            <div class="form-group">
                <label for="module_name">module Name</label>
                <input type="text" class="form-control module_name" name="module_name" placeholder="Enter module name" required>
                <span class="text-danger valid-module-name"></span>
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
                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.modal.close();">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Form update module -->
<div id="modal-edit" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Edit modules</h4>
    <div class="custom-modal-text text-left">
        <form id="form-edit">
            <div class="form-group">
                <label for="module_name">module Name</label>
                <input type="text" class="form-control module_name" name="module_name" placeholder="Enter module name" required>
                <span class="text-danger valid-module-name"></span>
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

<!-- Form view module -->
<div id="modal-view" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">View Module</h4>
    <div class="custom-modal-text text-left">
        <form id="form-edit">
            <div class="form-group">
                <label for="module_name">module Name</label>
                <input type="text" class="form-control module_name" placeholder="NULL">
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