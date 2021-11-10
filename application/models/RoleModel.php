<?php 
/**
* @author: khaing.pho1991@gmail.com
*/
class RoleModel extends CI_Model
{	
	// tables
	private $tblModulePermission = "modules_permissions";
	private $tblRoleModule = "roles_modules";
	private $tblModule = "module";
	private $table     = "role";

	// fields
	private $id        = "role_id";
	private $moduleId  = "module_id";
	private $permissionId = 'permission_id';
	private $roleName  = "role_name";
	private $createdBy = "created_by";
	private $createdAt = "created_at";
	private $updatedBy = "updated_by";
	private $updatedAt = "updated_at";
	private $status    = 'status';

	function __construct()
	{
		parent::__construct();
	}

	function create()
	{
		$data = array(
			$this->roleName  => strtoupper($this->input->post('role_name')),
			$this->status    => (int) $this->input->post('status'),
			$this->createdAt => date("Y-m-d H:i:s")
		);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update($id)
	{
		$data = array(
			$this->roleName  => strtoupper($this->input->post('role_name')),
			$this->status    => (int) $this->input->post('status'),
			$this->updatedAt => date("Y-m-d H:i:s")
		);
		$this->db
		     ->where($this->id, $id)
		     ->update($this->table, $data);
			 return $this->db->affected_rows();
	}

	function getAll(){
		$result = $this->db->get($this->table);
		return $result->result_array();
	}

	function findAllByStatus($status){

		if($status == 'active'){
			$status = 1;
		}else{
			$status = 0;
		}

		$result = $this->db->get_where($this->table, array($this->status=>$status));
		return $result->result_array();
	}

	function count(){
		$total = array();
		$total['all'] = $this->db->count_all($this->table);

		// count status active
		$total['active'] =  $this->db
								 ->where($this->status, 1)
								 ->from($this->table)
								 ->count_all_results();

		// count status in-active
		$total['inactive'] =  $this->db
								   ->where($this->status, 0)
								   ->from($this->table)
								   ->count_all_results();
		return $total;
	}

	function deleteById($id){
		$this->db
			 ->where($this->id, $id)
			 ->delete($this->table);
			 return $this->db->affected_rows();
	}

	function findOne($id){
		$result = $this->db->get_where($this->table, array($this->id => $id));
		return $result->row();
	}

	function changeStatus($id, $status){
		$data = array(
			$this->status => (int) ($status == 1 ? 0 : 1)
		);
		$this->db
		     ->where($this->id, $id)
		     ->update($this->table, $data);
			 return $this->db->affected_rows();
	}

	function checkExistingModulePermission($roleId, $moduleId){
		$data = $this->db->get_where($this->tblRoleModule, array($this->id=>$roleId, $this->moduleId=>$moduleId));
		return $data->row();

	}

	function createModule(){
		$data = array(
			$this->id  		=> (int) $this->input->post('role_id'),
			$this->moduleId => (int) $this->input->post('module_id')
		);

		$this->db->insert($this->tblRoleModule, $data);
		return $this->db->insert_id();
	}

	function getAllRoleModule(){
		return $this->db
		     ->select('id,'.$this->tblModule.'.module_id'.',module_name')
		     ->from($this->table)
		     ->join($this->tblRoleModule, $this->table.'.'.$this->id.'='.$this->tblRoleModule.'.'.$this->id, 'INNER')
		     ->join($this->tblModule, $this->tblRoleModule.'.'.$this->moduleId.'='.$this->tblModule.'.'.$this->moduleId, 'INNER')
		     ->get()
		     ->result_array();

	}

	function checkPermission($modulePermissionId, $moduleId, $permissionId){
		$data = array(
					$this->moduleId => (int) $moduleId,
					$this->permissionId => $permissionId
				);

		if($modulePermissionId == 0){
			$this->db
				 ->insert($this->tblModulePermission, $data);
				 return $this->db->insert_id();
		}else{
			$this->db
		 		 ->where('id', $modulePermissionId)
		 		 ->delete($this->tblModulePermission);
		 		 return $this->db->affected_rows();
		}
	}
}

?>