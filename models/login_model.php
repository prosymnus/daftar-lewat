<?php
class Login_model extends CI_Model {
	
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	function loginauth($usr, $pwd){ 
		
        $query = $this->db->get_where('cuid_lahir', array('oper_id' => $usr,'password' => $pwd));

        $numofrow = $query->num_rows();

			if($numofrow == 1){
				  foreach ($query->result() as $row){
					  $data['uid'] = $row->uid;
					  $data['fullname'] = $row->hsc_no;
					  $data['username'] = $row->oper_id;
					  $data['password'] = $row->password;
					  $data['branchcode'] = $row->branch_code;
				   }
				   return $data;
			}else{
				return false;
			}
	}
	
	function getProfileLogin($usr, $pwd){
		//$usr = strtoupper ($usr);
		//$pwd = strtoupper ($pwd);
		
		$query = $this->db->get_where('cuid_lahir', array('oper_id' => $usr,'password like binary' => $pwd));	
		return $query; 
	}
	
	function getEmail($email){
	
		
		$query = $this->db->get_where('cuid_lahir', array('email'=> $email));
		return $query; 
	}
    
}

?>
