<?php 
/**
* 
*/
class Permission extends CI_Controller
{	

	private $data = array();
	private $page = "pages/permissions/";
	private $title = "permission";

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('PermissionModel','permissionModel');
		$this->data['title'] = $this->title;
		$this->data['status'] = $this->permissionModel->count();
	}

	public function index(){
		$this->data['data'] = $this->permissionModel->getAll();
		$this->load->view($this->page."list", $this->data);
	}

	public function sortby($status=null){
		$this->data['data'] = $this->permissionModel->findAllByStatus($status);
		$this->load->view($this->page."list", $this->data);
	}

	public function create(){

		$this->form_validation->set_rules('permission_name', 'Permission Name', 'trim|required|min_length[2]|max_length[20]|is_unique[permission.permission_name]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Record can not save!'
			);
		}else{
			$this->permissionModel->create();
			$response = array(
				'status' => 'success',
				'message' => 'Record has been saved successfully'
			);
		}
		echo json_encode($response);
	}

	public function update($id=null){

		$this->form_validation->set_rules('permission_name', 'Permission Name', 'trim|required|min_length[2]|max_length[20]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Record can not update!'
			);
		}else{
			$this->permissionModel->update($id);
			$response = array(
				'status' => 'success',
				'message' => 'Record has been updated successfully'
			);
		}
		echo json_encode($response);
	}

	public function delete($id)
	{
		$output = $this->permissionModel->deleteById($id);
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

	public function getById($id=null){
		$output = $this->permissionModel->findOne($id);
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

	function changeStatus($id, $status){
		$output = $this->permissionModel->changeStatus($id, $status);
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

}

 ?>