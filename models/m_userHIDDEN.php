<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_model{

	function __construct(){
		parent :: __construct();
	}

	public function checkusername ($userid){

			$this->db->select('USR_REG_ID');
			$this->db->from('tmar_user');
			$this->db->where('USR_REG_ID',$userid);

			$query=$this->db->get();

			if($query ->num_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;
			}
	}


/*	public function checkuseremail ($useremail,$password){

			$this->db->select('email','password');
			$this->db->from('cuid_lahir');
			$this->db->where('email',$useremail,'password',$password);

			$query=$this->db->get();

			if($query ->num_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;
			}
	}
*/
	
	
	

}