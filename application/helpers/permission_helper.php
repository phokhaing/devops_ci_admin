<?php 

function checkedPermission($moduleId, $permissionId){
    $ci=& get_instance();
    $ci->load->database();

    $result = $ci->db
                 ->where('module_id', $moduleId)
                 ->where('permission_id', $permissionId)
                 ->get('modules_permissions')
                 ->row();

    if(!empty($result)){
        return $result->id;
    }else{
        return 0;
    }
}


?>