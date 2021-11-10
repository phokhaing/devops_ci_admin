<?php 
/**
  *--------------------------------
  * @author: khaing.pho1991@gmail.com
  * @param: controller for manage the role
  *--------------------------------
  */
class Role extends CI_Controller
{	

	/**
	  *--------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param: globale varaible
	  *--------------------------------
	  */
	private $data = array();
	private $page = "pages/roles/";
	private $title = "role";

	/**
	  *--------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param: default construtor
	  *--------------------------------
	  */
	function __construct()
	{
		parent::__construct();
		$this->load->model('RoleModel','roleModel');
		$this->load->model('ModuleModel','moduleModel');
		$this->load->model('PermissionModel','permissionModel');
		$this->load->helper('permission');
		$this->data['title'] = $this->title;
		$this->data['status'] = $this->roleModel->count();
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param: method for list all roles data
	  *---------------------------------------
	  */
	public function index(){
		$this->data['data'] = $this->roleModel->getAll();
		$this->load->view($this->page."list", $this->data);
	}

	public function sortby($status=null){
		$this->data['data'] = $this->roleModel->findAllByStatus($status);
		$this->load->view($this->page."list", $this->data);
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param: method for submit form create role
	  * @return: json data
	  */
	public function create(){

		$this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|min_length[2]|max_length[20]|is_unique[role.role_name]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Record can not save!'
			);
		}else{
			$this->roleModel->create();
			$response = array(
				'status' => 'success',
				'message' => 'Record has been saved successfully'
			);
		}
		echo json_encode($response);
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param: method for submit form update role
	  * @return: json data
	  */
	public function update($id=null){

		$this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|min_length[2]|max_length[20]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Record can not update!'
			);
		}else{
			$this->roleModel->update($id);
			$response = array(
				'status' => 'success',
				'message' => 'Record has been updated successfully'
			);
		}
		echo json_encode($response);
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for delete role by id
	  * @return: json data
	  *---------------------------------------
	  */
	public function delete($id)
	{
		$output = $this->roleModel->deleteById($id);
		if($output){
			$response = array(
				'status' => 'success',
				'message' => 'Record has been deleted successfully'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Record can not delete!'
			);
		}
		echo json_encode($response);
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for get role by id
	  * @return: json data
	  *---------------------------------------
	  */
	public function getById($id=null){
		$output = $this->roleModel->findOne($id);
		if($output){
			$response = array(
				'data' => $output,
				'status' => 'success',
				'message' => 'Record was found.'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Record was not found!'
			);
		}
		echo json_encode($response);

	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for change status role
	  * @param : status active, inactive
	  * @param : id is role id
	  * @return: json data
	  *---------------------------------------
	  */
	function changeStatus($id, $status){
		$output = $this->roleModel->changeStatus($id, $status);
		if($output){
			$response = array(
				'status' => 'success',
				'message' => 'Record has been changed successfully'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Record can not change!'
			);
		}
		echo json_encode($response);
	}

	/**
	  *---------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for set permission to role
	  *---------------------------------------
	  */
	public function setPermission(){
		$this->data['roleId'] = $_GET['role'];
		$this->data['data'] = $this->roleModel->getAllRoleModule($_GET['role']);
		$this->data['modules'] = $this->moduleModel->getAll();
		$this->data['permissions'] = $this->permissionModel->getAll();
		$this->load->view($this->page."permission", $this->data);
	}

	/**
	  *------------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for create module to role
	  * @return: json data
	  *------------------------------------------
	  */
	public function createModule(){

		$this->form_validation->set_rules('module_id', 'Module Name', 'required|callback_checkExistingModulePermission');
		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Record can not save!'
			);
		}else{
			$this->roleModel->createModule();
			$response = array(
				'status' => 'success',
				'message' => 'Record has been saved successfully'
			);
		}
		echo json_encode($response);
	}

	/**
	  *---------------------------------------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for check the module permission, already exist or not
	  * @param : if already exsit return message, else submit create new
	  * @return: boolean true or false
	  *----------------------------------------------------------------------
	  */
	function checkExistingModulePermission($moduleId){
        $roleId = $this->input->post('role_id');
        $output = $this->roleModel->checkExistingModulePermission($roleId, $moduleId);
        if($output == null){
        	return true;
        }else{
        	$this->form_validation->set_message('checkExistingModulePermission', 'This record already exists.');
            return false;
        }
    }

    /**
	  *---------------------------------------------------
	  * @author: khaing.pho1991@gmail.com
	  * @param : method for add permission to each modules
	  * @return: json data
	  *---------------------------------------------------
	  */
    function checkPermission($modulePermissionId, $moduleId, $permissionId){
    	$output = $this->roleModel->checkPermission($modulePermissionId, $moduleId, $permissionId);
    	echo json_encode($output);
    }
}

 ?>