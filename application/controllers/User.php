<?php 
/**
* 
*/
class User extends CI_Controller
{	

	private $data = array();
	private $page = "pages/users/";
	private $title = "user";

	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('userModel', 'roleModel'));
		$this->data['title'] = $this->title;
		$this->data['status'] = $this->userModel->count();
	}

	public function index(){
		$this->data["data"]  = $this->userModel->getAll();
		$this->data["roles"] = $this->roleModel->getAll();
		$this->load->view($this->page."list", $this->data);
	}

	public function sortby($status=null){
		$this->data['data'] = $this->userModel->findAllByStatus($status);
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
			$this->userModel->create();
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
			$this->userModel->update($id);
			$response = array(
				'status' => 'success',
				'message' => 'Record has been updated successfully'
			);
		}
		echo json_encode($response);
	}

	public function delete($id)
	{
		$output = $this->userModel->deleteById($id);
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
		$output = $this->userModel->findOne($id);
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
		$output = $this->userModel->changeStatus($id, $status);
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