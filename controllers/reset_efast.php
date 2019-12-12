<?php

class Efast extends CI_Controller {
	public function _construct(){
		parent::_construct();
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_death');
		
	}
	
							//***************************profile_pengguna****************************************//
	
	
	
  public function profile_pengguna(){
  
     	$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		$oper_id = $this->session->userdata('operid'); //bawa data user 
		
		
		$thisdata['detail_profile'] =$this->inq_model->profile_pengguna($oper_id);
		
	
		
		
		$this->form_validation->set_rules('password_baru', 'SILA MASUKKAN KATALALUAN BARU', 'required');
		
		
		
		

		
		
	
	
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$password_baru = $this->security->xss_clean($this->input->post('password_baru'));	
			
			if($password_baru == ''){
				$thisdata['errors']	= 'SILA MASUKKAN KATALALUAN BARU';		
			}
		$queryFile = $this->inq_model->update_password();
		
		$numofrow =$queryFile->num_rows();	
			//if jumpa rekod
    	
		
		
			$this->load->view('carian/profile_pengguna',$thisdata);  
		
		}
		else
		{
			$xsscleanID = 0;
			
			$xsscleanpassword_baru = $this->security->xss_clean($this->input->post('password_baru'));
		
			
			$datatorecords = array(
					
					
					
					
					
						
					'password_baru'=>$xsscleanpassword_baru,
			   		
					
					
					);
					
					
			
			//--//-- QUERY KEPADA TABLE records_efast --//--//
			
			$this->db->set('password', $password_baru);
			$this->db->update('cuid_lahir'); 


			
			
		//	$this->db->where('applicationno', $apl_no); //kekunci update
		//	$this->db->update('records_efast', $datatorecords);
			
		    //$this->db->insert('notes', $datatonotes); 
						
		$this->load->view('carian/result_sah',$thisdata);  //--//-- if berjaya pergi pada muka depan --//--//
			}		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('carian/profile_pengguna', $thisdata);
			}else{
				
				redirect('index/login');
			}
	}
        













								//*****************************end*********************************//
								
		/********************** FUNCTION FOR UPDATE password ***********************/
	/*
	public function update_password(){
		
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		$this->form_validation->set_rules('catatan', 'SILA MASUKKAN CATATAN', 'required');
		
		
		
		
	
			if($password_baru == ''){
				$thisdata['errors']	= 'SILA MASUKKAN KATALALUAN BARU';		
			}
			
			$this->inq_model->profile_pengguna($password_baru);
		//$thisdata['detail_profile'] =$this->inq_model->update_password($sql);
		
		$this->load->view('carian/profile_pengguna');  
		
		} */
/********************** END FUNCTION FOR UPDATE RECORD IN EFAST ***********************/
							
	
	
	
		
	/********************** FUNCTION FOR UPDATE RECORD IN EFAST ***********************/
	
	public function update_password(){
		
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
			$oper_id = $this->session->userdata('oper_id');
		$this->form_validation->set_rules('password_baru', 'SILA MASUKKAN KATALALUAN BARU', 'required');
		
		
		
		

		
		
	
	
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$password_baru = $this->security->xss_clean($this->input->post('password_baru'));	
			
			if($password_baru == ''){
				$thisdata['errors']	= 'SILA MASUKKAN KATALALUAN BARU';		
			}
		$queryFile = $this->inq_model->update_password();
		
		$numofrow =$queryFile->num_rows();	
			//if jumpa rekod
    	
		
		
			$this->load->view('carian/profile_pengguna',$thisdata);  
		
		}
		else
		{
			$xsscleanID = 0;
			
			$xsscleanpassword_baru = $this->security->xss_clean($this->input->post('password_baru'));
		
			
			$datatorecords = array(
					
					
					
					
					
						
					'password_baru'=>$xsscleanpassword_baru,
			   		
					
					
					);
					
					
			
			//--//-- QUERY KEPADA TABLE records_efast --//--//
			
			$this->db->set('password', $password_baru);
			$this->db->update('cuid_lahir'); 


			
			
		//	$this->db->where('applicationno', $apl_no); //kekunci update
		//	$this->db->update('records_efast', $datatorecords);
			
		    //$this->db->insert('notes', $datatonotes); 
						
		$this->load->view('carian/result_sah',$thisdata);  //--//-- if berjaya pergi pada muka depan --//--//
			}		
		
	}
/********************** END FUNCTION FOR UPDATE RECORD IN EFAST ***********************/









}

?>