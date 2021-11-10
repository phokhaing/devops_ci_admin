<?php 
/**
* @author: khaing.pho1991@gmail.com
*/
class Module extends CI_Controller
{	

	private $data = array();
	private $page = "pages/modules/";
	private $title = "Module";

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModuleModel','moduleModel');
		$this->data['title'] = $this->title;
		$this->data['status'] = $this->moduleModel->count();
	}

	public function index(){
		$this->data['data'] = $this->moduleModel->getAll();
		$this->load->view($this->page."list", $this->data);
	}

	public function sortby($status=null){
		$this->data['data'] = $this->moduleModel->findAllByStatus($status);
		$this->load->view($this->page."list", $this->data);
	}

	public function create(){

		$this->form_validation->set_rules('module_name', 'Module Name', 'trim|required|min_length[2]|max_length[20]|is_unique[module.module_name]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Module can not save!'
			);
		}else{
			$this->moduleModel->create();
			$response = array(
				'status' => 'success',
				'message' => 'Module has been saved successfully'
			);
		}
		echo json_encode($response);
	}

	public function update($id=null){

		$this->form_validation->set_rules('module_name', 'Module Name', 'trim|required|min_length[2]|max_length[20]');

		if($this->form_validation->run() == false){
			$response = array(
				'status' => 'error',
				'errors' => $this->form_validation->error_array(),
				'message' => 'Module can not update!'
			);
		}else{
			$this->moduleModel->update($id);
			$response = array(
				'status' => 'success',
				'message' => 'Module has been updated successfully'
			);
		}
		echo json_encode($response);
	}

	public function delete($id)
	{
		$output = $this->moduleModel->deleteById($id);
		if($output){
			$response = array(
				'status' => 'success',
				'message' => 'Module has been deleted successfully'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Module can not delete!'
			);
		}
		echo json_encode($response);
	}

	public function getById($id=null){
		$output = $this->moduleModel->findOne($id);
		if($output){
			$response = array(
				'data' => $output,
				'status' => 'success',
				'message' => 'Module was found.'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Module was not found!'
			);
		}
		echo json_encode($response);

	}

	function changeStatus($id, $status){
		$output = $this->moduleModel->changeStatus($id, $status);
		if($output){
			$response = array(
				'status' => 'success',
				'message' => 'Module has been changed successfully'
			);
		}else{
			$response = array(
				'status' => 'error',
				'message' => 'Module can not change!'
			);
		}
		echo json_encode($response);
	}

}

 ?>