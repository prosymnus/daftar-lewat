<?php

class Efast extends CI_Controller {
	public function _construct(){
		parent::_construct();
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_death');
		
	}
	
	/********************** GENERAL FUNCTION IN EFAST ***********************/
	
	
	
	
	function profileUser(){
		$this->load->library('session');
		$alldata['loginsession'] = $this->session->userdata('loginsession');
		
		if(isset($alldata['loginsession']) && $alldata['loginsession']){
			$alldata['userid'] = $this->session->userdata('userid');
			$alldata['oper_id'] = $this->session->userdata('operid');
			$alldata['oper_hsc_no'] = $this->session->userdata('hscno');
			$alldata['oper_bc'] = $this->session->userdata('branchcode');
			$alldata['valid'] = $this->session->userdata('valid_user');
			$alldata['sirenK1'] = $this->session->userdata('sirenKelas1');
			$alldata['sirenK2'] = $this->session->userdata('sirenKelas2');
		}
		
		return $alldata;
	}
	
	public function dashboard_efast()
	{
	
		$this->load->library('FusionCharts');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/carian_view', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function carian_efast()
	{
	
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();

		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/carian_view', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	

	//////*************************************** KATEGORI CARIAN *********************//////////
	
	public function carian_result($keysearch,$keyid){
	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
		
		
		$keyid = $this->security->xss_clean($keyid);	

		$detail= $this->inq_model->getCarianDetail($keysearch, $keyid);
		$thisdata['info'] = $detail;
		$numofrow = $detail->num_rows();
	
		
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodcawangan = $row->kodcawangan;
				}
				if ($kodcawangan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace2($kodcawangan);
				}else if ($kodcawangan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}
			}
			
			// tukar status dari kod kepada nama	 din 10/10/2018 =================================================================================================
	//kod kelulusan	
				if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodkelulusan = $row->statuskelulusan;
				}
				if ($kodkelulusan !=''){
					$thisdata['namakod'] = $this->inq_model->getlulus($kodkelulusan);
				}else if ($kodkelulusan==''){
					$thisdata['namakod'] = 'DALAM PROSES';
				}
			}

//kod agama

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodagamna = $row->religion_id;
				}
				if ($kodagamna !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($kodagamna);
				}else if ($kodagamna==''){
					$thisdata['namaagama'] = 'MAKLUMAT TIADA';
				}
			}


//kod keturunan

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodketurunan = $row->race_id;
				}
				if ($kodketurunan !=''){
					$thisdata['namaketurunan'] = $this->inq_model->getketurunan($kodketurunan);
				}else if ($kodketurunan==''){
					$thisdata['namaketurunan'] = 'MAKLUMAT TIADA';
				}
			}


//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodbandar = $row->kodbandar_penganjur;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar'] = $this->inq_model->getbandar($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA';
				}
			}

//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodbandar = $row->bandarpemaklum;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar2'] = $this->inq_model->getbandar2($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar2'] = 'MAKLUMAT TIADA';
				}
			}



//kod negara pengeluar id ibu

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->negara_id_ibu;
				}
				if ($kod !=''){
					$thisdata['negaraidibu'] = $this->inq_model->getpengeluaridibu($kod);
				}else if ($kod==''){
					$thisdata['namaidibu'] = 'MAKLUMAT TIADA';
				}
			}		

//kod negara pengeluar id bapa

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->negara_id_bapa;
				}
				if ($kod !=''){
					$thisdata['negaraidbapa'] = $this->inq_model->getpengeluaridbapa($kod);
				}else if ($kod==''){
					$thisdata['negaraidbapa'] = 'MAKLUMAT TIADA';
				}
			}	

//kod negara pengeluar id pemaklum

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->negarapengeluar_id;
				}
				if ($kod !=''){
					$thisdata['negaraidpemaklum'] = $this->inq_model->getpengeluaridpemaklum($kod);
				}else if ($kod==''){
					$thisdata['negaraidpemaklum'] = 'MAKLUMAT TIADA';
				}
			}		



//kod JENIS id ibu

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->jenis_id_ibu;
				}
				if ($kod !=''){
					$thisdata['jenisidibu'] = $this->inq_model->getpengeluarjenisibu($kod);
				}else if ($kod==''){
					$thisdata['jenisidibu'] = 'MAKLUMAT TIADA';
				}
			}		


//kod JENIS id bapa

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->jenis_id_bapa;
				}
				if ($kod !=''){
					$thisdata['jenisidbapa'] = $this->inq_model->getpengeluarjenisbapa($kod);
				}else if ($kod==''){
					$thisdata['jenisidbapa'] = 'MAKLUMAT TIADA';
				}
			}		


//kod JENIS id pemaklum

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kod = $row->jenisdokumen_id;
				}
				if ($kod !=''){
					$thisdata['jenisidpemaklum'] = $this->inq_model->getpengeluarjenispemaklum($kod);
				}else if ($kod==''){
					$thisdata['jenisidpemaklum'] = 'MAKLUMAT TIADA';
				}
			}		

//  ======================================================================================================================================================
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			if( $keysearch == 7){
				$this->load->view('carian/duplicate_all_view',$thisdata);
			
			}if( $keysearch == 6){
				$this->load->view('carian/list_nama_view',$thisdata);
			}else{
				$this->load->view('carian/carian_view2',$thisdata);
			}
		}else{
				redirect('index/login');
			}
	}
	
	public function no_permohonan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();	
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/apl_no_view', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	function carian_ibu(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/parents_name_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	function no_kp_penganjur(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
	
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/KP_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	function fail_Cawangan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	

		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/fail_Cawangan_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	function carian_duplicate(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
	
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/carian_duplicate_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	/**************************** PAPAR KEPUTUSAN CARIAN *******************///
	
	public function displayrec_aplno()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();	
		
		$this->form_validation->set_rules('apl_no', 'Nombor Permohonan','required');
		

		
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$apl_no = $this->security->xss_clean($this->input->post('apl_no'));
			
			
			$thisdata['pilihan']	 = 'Nombor Permohonan :'.$apl_no;
			//load query dari model untuk getusserrec (apl_no)
			
			
			$queryData = $this->inq_model->get_apl_no($apl_no);
			$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
			$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		
			$queryFile = $this->inq_model->get_apl_no($apl_no);
			$numofrow =$queryFile->num_rows();
			$thisdata['queryduplikasi'] = $this->inq_model->get_senarai_fail($apl_no);
			$numofrow = $queryData->num_rows();
			
			//untuk paparkan description based on kod bandar dalam table
		$queryFile = $this->inq_model->get_apl_no($apl_no);
			$numofrow =$queryFile->num_rows();
		
		
			
			
			//untuk paparkan description based on kod cawangan dalam table
			$queryFile = $this->inq_model->get_apl_no($apl_no);
			$numofrow =$queryFile->num_rows();
		
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodTptCwgnPermohonan = $row->kodcawangan;
				}
				if ($kodTptCwgnPermohonan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace($kodTptCwgnPermohonan);
				}else if ($kodTptCwgnPermohonan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}
			}
			// sampai sini
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/detail_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/apl_no_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	 //carian berdasarkan nama semua
	 function displayrec_parent_name()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('namaparent', 'nama parent','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$namaparent = $this->security->xss_clean($this->input->post('namaparent'));
			$thisdata['pilihan']	 = 'Nama parent :'.$namaparent;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_name($namaparent);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/parents_name_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	
	 function displayrec_kp_penganjur()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('no_kp_penganjur', 'Nombor KP Penganjur','required');
		
				$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$no_kp_penganjur = $this->security->xss_clean($this->input->post('no_kp_penganjur'));
			$thisdata['pilihan']	 = 'Nombor KP Penganjur :'.$no_kp_penganjur;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_no_kp_penganjur($no_kp_penganjur);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/kp_view.php',$thisdata);
			}else{
				redirect('index/login');
			}
		}
		
		
	}
	
	function displayrec_fail_Cawangan()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('fail_Cawangan', 'Kod fail_Cawangan','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$fail_Cawangan = $this->security->xss_clean($this->input->post('fail_Cawangan'));
			$thisdata['pilihan']	 = 'Fail Cawangan :'.$fail_Cawangan;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_fail_Cawangan($fail_Cawangan);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/fail_Cawangan_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	
function displayrec_carian_duplicate()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('carian_duplicate', 'carian_duplicate','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$carian_duplicate = $this->security->xss_clean($this->input->post('carian_duplicate'));
			$thisdata['pilihan']	 = 'Carian Duplicate :'.$carian_duplicate;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_carian_duplicate($carian_duplicate);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/carian_duplicate_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}

	/**************************** end PAPAR KEPUTUSAN CARIAN *******************///
	/************************* DUPLIKASI *******************/
	
	public function duplicate_lebih2(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['listduplikasi'] =$this->inq_model->get_duplicate_lebih2();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/duplicate_lebih_view2', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	public function duplicate_all($apl_no){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['info'] =$this->inq_model->get_duplicate_all($apl_no);
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/duplicate_all_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
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
		
	
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('carian/profile_pengguna', $thisdata);
			}else{
				
				redirect('index/login');
			}
	}
       

								
								/********************** FUNCTION FOR UPDATE password ***********************/
	
	public function update_password(){
	
	$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
	
	
	
			$xsscleanID = 0;
			$oper_id = $this->security->xss_clean($this->input->post('oper_id'));
			$password = $this->security->xss_clean($this->input->post('password'));	
			$xsscleanpassword = $this->security->xss_clean($this->input->post('password'));
			
				$datatorecords = array(


					'password'=>md5($xsscleanpassword)
					);
			
			$this->db->where('oper_id', $oper_id); //kekunci update
			$this->db->update('cuid_lahir', $datatorecords);
	
	$this->load->view('carian/result_sah');
	}
		
		
/********************** END FUNCTION FOR UPDATE RECORD IN EFAST ***********************/
 public function profile_pengguna_admin(){
  $this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['listduplikasi'] =$this->inq_model->get_user_admin();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/profile_pengguna_admin', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	public function reset_password($ID){
  
     	$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		//$oper_id = $this->session->userdata('ID'); //bawa data user 
		
		
		$thisdata['detail_profile'] =$this->inq_model->profile_pengguna($ID);
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('carian/reset_password', $thisdata);
			}else{
				
				redirect('index/login');
			}
	}
	
	
	public function update_password_admin(){
		
		$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
	
		$thisdata = $this->lib_global->profileUser();
	
	
	
			$xsscleanID = 0;
			$oper_id = $this->security->xss_clean($this->input->post('oper_id'));
			$password = $this->security->xss_clean($this->input->post('password'));	
			$xsscleanpassword = $this->security->xss_clean($this->input->post('password'));

			$data = array(

           'password' => md5($xsscleanpassword)
        );

    $this->db->where('oper_id', $this->input->post('oper_id'));
    $this->db->update('cuid_lahir', $data);


			
	
echo $xsscleanpassword;  echo $oper_id;

	$this->load->view('carian/result_sah');
	}
	
	
	/************** DETAIL VIEW **************************/
	public function detail_view($apl_no){
	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
	/*	
		//untuk paparkan description based on kod bandar dalam table
			$queryFile = $this->inq_model->get_apl_no($apl_no);
			$numofrow =$queryFile->num_rows();
		
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodBandarPermohonan = $row->bandar;
				}
				if ($kodBandarPermohonan !=''){
					$thisdata['namabandar'] = $this->inq_model->getCityDesc($kodBandarPermohonan);
				}else if ($kodBandarPermohonan==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA1234';
				}
			}
			// sampai sini */
		
		
		$queryFile = $this->inq_model->get_apl_no($apl_no);
		$numofrow =$queryFile->num_rows();
			
		//if jumpa rekod
    	if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodTptCwgnPermohonan = $row->kodcawangan;
				}
				if ($kodTptCwgnPermohonan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace($kodTptCwgnPermohonan);
				}else if ($kodTptCwgnPermohonan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}

				}
			
		// tukar status dari kod kepada nama	 din 10/10/2018 =================================================================================================
	//kod kelulusan	
				if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodkelulusan = $row->statuskelulusan;
				}
				if ($kodkelulusan !=''){
					$thisdata['namakod'] = $this->inq_model->getlulus($kodkelulusan);
				}else if ($kodkelulusan==''){
					$thisdata['namakod'] = 'DALAM PROSES';
				}
			}

//kod agama

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodagamna = $row->religion_id;
				}
				if ($kodagamna !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($kodagamna);
				}else if ($kodagamna==''){
					$thisdata['namaagama'] = 'MAKLUMAT TIADA';
				}
			}


//kod keturunan

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodketurunan = $row->race_id;
				}
				if ($kodketurunan !=''){
					$thisdata['namaketurunan'] = $this->inq_model->getketurunan($kodketurunan);
				}else if ($kodketurunan==''){
					$thisdata['namaketurunan'] = 'MAKLUMAT TIADA';
				}
			}


//kod kod_bandar penganjur

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->kodbandar_penganjur;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar'] = $this->inq_model->getbandar($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA';
				}
			}

//kod kod_bandar pemaklum

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->bandarpemaklum;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar2'] = $this->inq_model->getbandar2($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar2'] = 'MAKLUMAT TIADA';
				}
			}





	//	========================================================================
			
			
			
		$thisdata['queryduplikasi'] = $this->inq_model->get_senarai_fail($apl_no);
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
		$this->load->view('carian/detail_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}

	/************************* KEMASKINI REKOD ***************************/
	
	public function display_edit($apl_no){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		
		
		
		$queryFile = $this->inq_model->get_apl_no($apl_no);
		$numofrow =$queryFile->num_rows();
		
		//if jumpa rekod
    	if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodTptCwgnPermohonan = $row->kodcawangan;
				}
				if ($kodTptCwgnPermohonan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace($kodTptCwgnPermohonan);
				}else if ($kodTptCwgnPermohonan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}
			}
		
// tukar status dari kod kepada nama	 din 10/10/2018 =================================================================================================
	//kod kelulusan	
				if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodkelulusan = $row->statuskelulusan;
				}
				if ($kodkelulusan !=''){
					$thisdata['namakod'] = $this->inq_model->getlulus($kodkelulusan);
				}else if ($kodkelulusan==''){
					$thisdata['namakod'] = 'MAKLUMAT TIADA';
				}
			}

//kod agama

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodagamna = $row->religion_id;
				}
				if ($kodagamna !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($kodagamna);
				}else if ($kodagamna==''){
					$thisdata['namaagama'] = 'MAKLUMAT TIADA';
				}
			}


//kod keturunan

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodketurunan = $row->race_id;
				}
				if ($kodketurunan !=''){
					$thisdata['namaketurunan'] = $this->inq_model->getketurunan($kodketurunan);
				}else if ($kodketurunan==''){
					$thisdata['namaketurunan'] = 'MAKLUMAT TIADA';
				}
			}


//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->kodbandar_penganjur;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar'] = $this->inq_model->getbandar($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA';
				}
			}

//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->bandarpemaklum;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar2'] = $this->inq_model->getbandar2($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar2'] = 'MAKLUMAT TIADA';
				}
			}
//  ======================================================================================================================================================

		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
		$this->load->view('carian/edit', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	/********************** FUNCTION FOR UPDATE RECORD IN EFAST ***********************/
	
	public function update_record(){
		
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		$this->form_validation->set_rules('namapenganjur2','nama','optional');
		$this->form_validation->set_rules('nokppenganjur2', 'nokppenganjur2', 'optional');
		$this->form_validation->set_rules('alamatpemaklum1', 'alamat', 'optional');
		$this->form_validation->set_rules('alamatpemaklum2', 'alamat2', 'optional');
		$this->form_validation->set_rules('alamatpemaklum3', 'alamat3', 'optional');
		$this->form_validation->set_rules('poskodpemaklum', 'poskodpemaklum', 'optional');
		$this->form_validation->set_rules('bandarpemaklum', 'bandarpemaklum', 'optional');
		$this->form_validation->set_rules('negeripemaklum', 'negeripemaklum', 'optional');
		$this->form_validation->set_rules('notelefon2', 'notelefon2', 'optional');
		$this->form_validation->set_rules('emel2', 'emel2', 'optional');
		$this->form_validation->set_rules('jenisdokumen2_id', 'jenisdokumen2_id', 'optional');
		$this->form_validation->set_rules('negarapengeluar2_id', 'negarapengeluar2_id', 'optional');
		$this->form_validation->set_rules('jenispenganjur2_id', 'jenispenganjur2_id', 'optional');
		$this->form_validation->set_rules('catatan', 'SILA MASUKKAN CATATAN', 'required');
		
		
		
		

		
		date_default_timezone_set('Asia/Singapore');
	    $date = new DateTime();
		$upd_dt  = $date->format('Y-m-d H:i:s');
		
		$oper_uid = $this->session->userdata('operid');
		$oper_bc = $this->session->userdata('branchcode');
		
		if ($this->form_validation->run() == FALSE)
		{
			$apl_no = $this->security->xss_clean($this->input->post('apl_no'));	
			$catatan = $this->security->xss_clean($this->input->post('catatan'));	
			
			if($catatan == ''){
				$thisdata['errors']	= 'SILA MASUKKAN CATATAN';		
			}
		$queryFile = $this->inq_model->get_apl_no($apl_no);
		$numofrow =$queryFile->num_rows();	
			//if jumpa rekod
    	if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodTptCwgnPermohonan = $row->kodcawangan;
				}
				if ($kodTptCwgnPermohonan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace($kodTptCwgnPermohonan);
				}else if ($kodTptCwgnPermohonan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}
			}

// tukar status dari kod kepada nama	 din 10/10/2018 =================================================================================================
	//kod kelulusan	
				if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodkelulusan = $row->statuskelulusan;
				}
				if ($kodkelulusan !=''){
					$thisdata['namakod'] = $this->inq_model->getlulus($kodkelulusan);
				}else if ($kodkelulusan==''){
					$thisdata['namakod'] = 'MAKLUMAT TIADA';
				}
			}

//kod agama

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodagamna = $row->religion_id;
				}
				if ($kodagamna !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($kodagamna);
				}else if ($kodagamna==''){
					$thisdata['namaagama'] = 'MAKLUMAT TIADA';
				}
			}


//kod keturunan

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodketurunan = $row->race_id;
				}
				if ($kodketurunan !=''){
					$thisdata['namaketurunan'] = $this->inq_model->getketurunan($kodketurunan);
				}else if ($kodketurunan==''){
					$thisdata['namaketurunan'] = 'MAKLUMAT TIADA';
				}
			}


//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->kodbandar_penganjur;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar'] = $this->inq_model->getbandar($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA';
				}
			}

//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($queryFile->result() as $row){  				 
					  $kodbandar = $row->bandarpemaklum;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar2'] = $this->inq_model->getbandar2($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar2'] = 'MAKLUMAT TIADA';
				}
			}
//  ======================================================================================================================================================



		
					
			//QUERY KEPADA TABLE PSD CHECK NOM SRL WUJUD ATAU X			
		   
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		
		
			$this->load->view('carian/edit',$thisdata);  
		
		}
		else
		{
			$xsscleanID = 0;
			$apl_no = $this->security->xss_clean($this->input->post('apl_no'));	
			$xsscleannamapenganjur2 = $this->security->xss_clean($this->input->post('namapenganjur2'));
			$xsscleannokppenganjur2 = $this->security->xss_clean($this->input->post('nokppenganjur2'));
			$xsscleanjenisdokumen2_id = $this->security->xss_clean($this->input->post('jenisdokumen2_id'));
			$xsscleannegarapengeluar2_id = $this->security->xss_clean($this->input->post('negarapengeluar2_id'));
			$xsscleanjenispenganjur2_id = $this->security->xss_clean($this->input->post('jenispenganjur2_id'));
			$xsscleantarikhterima = $this->security->xss_clean($this->input->post('tarikhterima'));
			$xsscleannofailrujukanhq = $this->security->xss_clean($this->input->post('nofailrujukanhq'));
			$xsscleannofailrujukanibunegeri = $this->security->xss_clean($this->input->post('nofailrujukanibunegeri'));
			$xsscleannofailrujukancawangan = $this->security->xss_clean($this->input->post('nofailrujukancawangan'));
			$xsscleankodcawangan = $this->security->xss_clean($this->input->post('kodcawangan'));
			
			$xsscleanbranch_id = $this->security->xss_clean($this->input->post('branch_id'));
			$xsscleanstate_id = $this->security->xss_clean($this->input->post('state_id'));
			
			$xsscleannodaftarlahir = $this->security->xss_clean($this->input->post('nodaftarlahir'));
			$xsscleanduplicateappno = $this->security->xss_clean($this->input->post('duplicateappno'));
			$xsscleancatatan = $this->security->xss_clean($this->input->post('catatan'));
			$xsscleanduplicate = $this->security->xss_clean($this->input->post('duplicate'));
			$xsscleanalamatpemaklum1 = $this->security->xss_clean($this->input->post('alamatpemaklum1'));
			$xsscleanalamatpemaklum2 = $this->security->xss_clean($this->input->post('alamatpemaklum2'));
			$xsscleanalamatpemaklum3 = $this->security->xss_clean($this->input->post('alamatpemaklum3'));
			$xsscleanposkodpemaklum = $this->security->xss_clean($this->input->post('poskodpemaklum'));
			$xsscleanbandarpemaklum = $this->security->xss_clean($this->input->post('bandarpemaklum'));
			$xsscleannegeripemaklum = $this->security->xss_clean($this->input->post('negeripemaklum'));
			$xsscleanjenisdokumen2= $this->security->xss_clean($this->input->post('jenisdokumen2_id'));
			$xsscleannegarapengeluar2= $this->security->xss_clean($this->input->post('negarapengeluar2_id'));
			$xsscleanjenispenganjur2_id= $this->security->xss_clean($this->input->post('jenispenganjur2_id'));
			$xsscleanemel2 = $this->security->xss_clean($this->input->post('emel2'));
			$xsscleannotelefon2 = $this->security->xss_clean($this->input->post('notelefon2'));
			$xsscleanbandar_penganjur = $this->security->xss_clean($this->input->post('bandar_penganjur')); 
			
			$flag_duplicate = $this->security->xss_clean($this->input->post('flag_duplicate')); 
			
			$datatorecords = array(
					
					
					
					'namapenganjur2'=>$xsscleannamapenganjur2,
					'nokppenganjur2'=>$xsscleannokppenganjur2,
					'jenisdokumen2_id'=>$xsscleanjenisdokumen2_id,
					'negarapengeluar2_id'=>$xsscleannegarapengeluar2_id,
					'alamatpemaklum1'=>$xsscleanalamatpemaklum1,
					'alamatpemaklum2'=>$xsscleanalamatpemaklum2,
					'alamatpemaklum3'=>$xsscleanalamatpemaklum3,
					'poskodpemaklum'=>$xsscleanposkodpemaklum,
					'bandarpemaklum'=>$xsscleanbandarpemaklum,
					'negeripemaklum'=>$xsscleannegeripemaklum,
					'jenisdokumen2_id'=>$xsscleanjenisdokumen2,
					'negarapengeluar2_id' =>$xsscleannegarapengeluar2,
					'jenispenganjur2_id' =>$xsscleanjenispenganjur2_id,
					
					'emel2'=>$xsscleanemel2,
					'notelefon2'=>$xsscleannotelefon2,
					'jenispenganjur2_id'=>$xsscleanjenispenganjur2_id,
					'tarikhterima'=>$xsscleantarikhterima,
					'nofailrujukanhq'=>$xsscleannofailrujukanhq,
					'nofailrujukanibunegeri'=>$xsscleannofailrujukanibunegeri,
					'nofailrujukancawangan'=>$xsscleannofailrujukancawangan,
					'branch_id'=>$xsscleanbranch_id,
					'state_id'=>$xsscleanstate_id,
					
					'nodaftarlahir'=>$xsscleannodaftarlahir,					
					'catatan'=>$xsscleancatatan,
			   		
					
					
					);
					
					$datatonotes = array(
					
				'id' => 0,
				'catatan'=>$xsscleancatatan,
				'tarikh'=>$upd_dt,
				'user_id'=>$oper_uid,
				'oper_bc'=>$oper_bc,
				'application_no'=>$apl_no,
					
		);
			
			//--//-- QUERY KEPADA TABLE records_efast --//--//
			
			$this->db->where('applicationno', $apl_no); //kekunci update
			$this->db->update('records_efast', $datatorecords);
			
		    $this->db->insert('notes', $datatonotes); 
		//duplicate ANA
	
		if ($flag_duplicate == 0){    
			$thisdata['duplicateA'] = $this->inq_model->updDuplA($xsscleanduplicateappno ); //up
			$thisdata['duplicateB'] = $this->inq_model->updDuplB($apl_no,$xsscleanduplicateappno ); 
		}
		
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		$thisdata['queryduplikasi'] = $this->inq_model->get_senarai_fail($apl_no);
				
		$this->load->view('carian/result_sah',$thisdata);  //--//-- if berjaya pergi pada muka depan --//--//
			}		
		
	}
/********************** END FUNCTION FOR UPDATE RECORD IN EFAST ***********************/

/************************* PENDAFTARAN  REKOD ***************************/
	
	public function PENDAFTARAN(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();


	/*	//----------------------query db2-------------------------//
//all field that need to insert into database
	$dataContent['title'] = "DAFTAR PELANGGAN";	
		$cust_doc_no = $this->security->xss_clean($this->input->post('mykad'));
	

		// 3 fungsi ini untuk ambil ChipName, ShortName dan GPNName - Hanita 11/11/2016
		
		$dataContent['gpnName']= $this->inq_model->cariNamaPersonGPN($cust_doc_no);

		$dataContent['queryTGPN'] = $this->inq_model->get_record_person($cust_doc_no);
		$numofrow = $this->inq_model->count_record_person($cust_doc_no);

		

	
		//---------------------end query db2---------------------------// */
		

		//---------------------bawak user session---------------------//
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
		$this->load->view("input/daftar",$thisdata );
		}else{
				redirect('index/login');
		}
		
/* -----------------------------------------------------------------------------------------


		//$this->load->library('form_validation');
		

		//all field that need to insert into database	
		$cust_doc_no = $this->security->xss_clean($this->input->post('mykad'));
	

		// 3 fungsi ini untuk ambil ChipName, ShortName dan GPNName - Hanita 11/11/2016
		
		$dataContent['gpnName']= $this->inq_model->cariNamaPersonGPN($cust_doc_no);

		$dataContent['queryTGPN'] = $this->inq_model->get_record_person($cust_doc_no);
		$numofrow = $this->inq_model->count_record_person($cust_doc_no);


		

		if($numofrow > 0){
			$this->load->view("input/daftar",$dataContent );
		} else {
			$this->load->view("input/error_page",$dataContent);
		}


--------------------------------------------------------------------------------------------- */

	}

/********************* END PENDAFTARAN *************************************************/
public function error_page(){
		
		$dataContent['title'] = "SEMAK REKOD PELANGGAN";	
		$this->load->view("input/error_page",$dataContent); 
	}

/*********************************form pendaftaran*************************************/


function pendaftaran_record() {

		
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		$this->load->helper('form');

		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('input/daftar', $thisdata);
		}else{
				redirect('index/login');
		}
/*
$cust_doc_no = $this->security->xss_clean($this->input->post('mykad'));
	

		// 3 fungsi ini untuk ambil ChipName, ShortName dan GPNName - Hanita 11/11/2016
		$dataContent['chipName']= $this->inq_model->cariNamaPersonChip($cust_doc_no);
		$dataContent['shortName']= $this->inq_model->cariNamaPersonHSN($cust_doc_no);
		$dataContent['gpnName']= $this->inq_model->cariNamaPersonGPN($cust_doc_no);

		$dataContent['queryTGPN'] = $this->inq_model->get_record_person($cust_doc_no);
		$numofrow = $this->inq_model->count_record_person($cust_doc_no);


		

		if($numofrow > 0){
			$this->load->view("input/daftar",$dataContent );
		} else {
			$this->load->view("input/error_page",$dataContent);
		}

*/



$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
$this->form_validation->set_rules('applicationno', 'applicationno', 'required|numeric|min_length[24]|max_length[24]');
$this->form_validation->set_rules('applicationdate', 'applicationdate', 'required|date');

//Validating Email Field
//$this->form_validation->set_rules('applicationdate', 'applicationdate', 'required|date');

//Validating Mobile no. Field
//$this->form_validation->set_rules('dmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

//Validating Address Field
//$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');
date_default_timezone_set('Asia/Singapore');
	   $date = new DateTime();
		
		
		$oper_uid = $this->session->userdata('operid');
		$oper_bc = $this->session->userdata('branchcode');





if ($this->form_validation->run() == FALSE) {

 $thisdata['errors']	= 'SILA MASUKKAN MAKLUMAT MANDATORI';		
echo "SILA LENGKAPKAN MAKLUMAT "; 

//$this->load->view('input/daftar');
	
 
} 



else {
//Setting values for tabel columns
$xsscleanID = 0;
			$xsscleanapplicationno = $this->security->xss_clean($this->input->post('applicationno'));	
			$xsscleanconvertDate = $this->security->xss_clean($this->input->post('applicationdate'));
			$xsscleanno_file = $this->security->xss_clean($this->input->post('no_file'));
	

	$xsscleankodcawangan = $this->security->xss_clean($this->input->post('kodcawangan'));	
	$xsscleanbranch_id = $this->security->xss_clean($this->input->post('branch_id'));
				$xsscleanreg_oper_id = $this->security->xss_clean($this->input->post('reg_oper_id'));
				$xsscleanstate_id = $this->security->xss_clean($this->input->post('state_id'));
		$xsscleannamakanak = $this->security->xss_clean($this->input->post('namakanak'));	
		$xsscleantarikhlahir = $this->security->xss_clean($this->input->post('tarikhlahir'));	
		$xsscleanjantina_anak = $this->security->xss_clean($this->input->post('jantina_anak'));	
		$xsscleanreligion_id = $this->security->xss_clean($this->input->post('religion_id'));	
		$xsscleanrace_id = $this->security->xss_clean($this->input->post('race_id'));	
		$xsscleantempatlahir1 = $this->security->xss_clean($this->input->post('tempatlahir1'));	
		$xsscleantempatlahir2 = $this->security->xss_clean($this->input->post('tempatlahir2'));	
		$xsscleannodaftarlahir = $this->security->xss_clean($this->input->post('nodaftarlahir'));	 
		$xsscleanchd_hsc_no = $this->security->xss_clean($this->input->post('chd_hsc_no'));	
		$xsscleanwarganegara_id = $this->security->xss_clean($this->input->post('warganegara_id'));	
				//warganegara_anak	


		$xsscleannama_medic = $this->security->xss_clean($this->input->post('nama_medic'));	
		$xsscleanid_medic = $this->security->xss_clean($this->input->post('id_medic'));	
		$xsscleanpekerjaan_medic = $this->security->xss_clean($this->input->post('pekerjaan_medic'));	
				

/*						
//penganjur 1 adalah pemaklum
									$xsscleannamapenganjur1 = $this->security->xss_clean($this->input->post('namapenganjur1'));	
									$xsscleannokppenganjur1 = $this->security->xss_clean($this->input->post('nokppenganjur1'));	        
									$xsscleanalamatpenganjur1 = $this->security->xss_clean($this->input->post('alamatpenganjur1'));	
									$xsscleanalamatpenganjur2 = $this->security->xss_clean($this->input->post('alamatpenganjur2'));	
									$xsscleanalamatpenganjur3 = $this->security->xss_clean($this->input->post('alamatpenganjur3'));	
									$xsscleankodposkodpenganjur = $this->security->xss_clean($this->input->post('kodposkodpenganjur'));	 
									$xsscleankodbandar_penganjur = $this->security->xss_clean($this->input->post('kodbandar_penganjur'));	
									$xsscleankodnegeri_penganjur = $this->security->xss_clean($this->input->post('kodnegeri_penganjur'));	 
									$xsscleanjenispenganjur_id = $this->security->xss_clean($this->input->post('jenispenganjur_id'));	
									$xsscleannegarapengeluar_id = $this->security->xss_clean($this->input->post('negarapengeluar_id'));	     */

									$xsscleannama_pemaklum2 = $this->security->xss_clean($this->input->post('nama_pemaklum2'));	
									$xsscleannopengenalan_pemaklum2 = $this->security->xss_clean($this->input->post('nopengenalan_pemaklum2'));	
									$xsscleanalamat_pemaklum2_1 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_1'));	
									$xsscleanalamat_pemaklum2_2 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_2'));	
									$xsscleanalamat_pemaklum2_3 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_3'));	
									$xsscleanposkod_pemaklum2 = $this->security->xss_clean($this->input->post('poskod_pemaklum2'));	 
									$xsscleanbandar_pemaklum2 = $this->security->xss_clean($this->input->post('bandar_pemaklum2'));	
									$xsscleannegeri_penganjur2 = $this->security->xss_clean($this->input->post('negeri_pemaklum2'));	 
									$xsscleanhubungan_pemaklum2 = $this->security->xss_clean($this->input->post('hubungan_pemaklum2'));	
									$xsscleanemel_pemaklum2 = $this->security->xss_clean($this->input->post('emel_pemaklum2'));	
									$xsscleannotelefon_pemaklum2 = $this->security->xss_clean($this->input->post('notelefon_pemaklum2')); 

//maklumat penganjur 1 dan penganjur 2

									$xsscleannama_penganjur_1 = $this->security->xss_clean($this->input->post('nama_penganjur_1'));	
									$xsscleannokp_penganjur_1 = $this->security->xss_clean($this->input->post('nokp_penganjur_1'));
									$xsscleanhubungan_penganjur_1 = $this->security->xss_clean($this->input->post('hubungan_penganjur_1'));	
									
									$xsscleannama_penganjur_2 = $this->security->xss_clean($this->input->post('nama_penganjur_2'));	
									$xsscleannokp_penganjur_2 = $this->security->xss_clean($this->input->post('nokp_penganjur_2'));
									$xsscleanhubungan_penganjur_2 = $this->security->xss_clean($this->input->post('hubungan_penganjur_2'));




		$xsscleannamaibu = $this->security->xss_clean($this->input->post('namaibu'));	         
		$xsscleanibu_id = $this->security->xss_clean($this->input->post('ibu_id'));	
		$xsscleanjenis_id_ibu = $this->security->xss_clean($this->input->post('jenis_id_ibu'));	
		$xsscleannegara_id_ibu = $this->security->xss_clean($this->input->post('negara_id_ibu'));	
		$xsscleanwarganegara_ibu = $this->security->xss_clean($this->input->post('warganegara_ibu'));	
		$xsscleanbilangan_anak = $this->security->xss_clean($this->input->post('bilangan_anak'));	
		$xsscleanrank_anak = $this->security->xss_clean($this->input->post('rank_anak'));	

		$xsscleannamabapa = $this->security->xss_clean($this->input->post('namabapa'));	
		$xsscleanbapa_id = $this->security->xss_clean($this->input->post('bapa_id'));	
		$xsscleanjenis_id_bapa = $this->security->xss_clean($this->input->post('jenis_id_bapa'));	
		$xsscleannegara_id_bapa = $this->security->xss_clean($this->input->post('negara_id_bapa'));	
		$xsscleanwarganegara_bapa = $this->security->xss_clean($this->input->post('warganegara_bapa'));	

		$xsscleanstatus_perkahwinan = $this->security->xss_clean($this->input->post('status_perkahwinan'));	 
					//no_sijil_perkahwinan 
		$xsscleantarikh_perkahwinan = $this->security->xss_clean($this->input->post('tarikh_perkahwinan'));	
$xsscleantempat_perkahwinan = $this->security->xss_clean($this->input->post('tempat_perkahwinan'));	
$xsscleanNo_Sijil_Kahwin = $this->security->xss_clean($this->input->post('No_Sijil_Kahwin'));	
																										

			$data = array(
					
					
					'applicationno'=>$xsscleanapplicationno,	
					'applicationdate'=>$xsscleanconvertDate,	
					'no_file'=>$xsscleanno_file,	
'kodcawangan'=>$xsscleankodcawangan,
'branch_id'=>$xsscleanbranch_id,
'reg_oper_id' =>$xsscleanreg_oper_id,
'namakanak'=>$xsscleannamakanak,
'tarikhlahir'=>$xsscleantarikhlahir,
'jantina_anak'=>$xsscleanjantina_anak,
'religion_id'=>$xsscleanreligion_id,
'race_id'=>$xsscleanrace_id,
'warganegara_id'=>$xsscleanwarganegara_id, 
'tempatlahir1'=>$xsscleantempatlahir1,
'tempatlahir2'=>$xsscleantempatlahir2,
'nodaftarlahir'=>$xsscleannodaftarlahir,
'state_id'=>$xsscleanstate_id,
'chd_hsc_no'=>$xsscleanchd_hsc_no,
'nama_medic'=>$xsscleannama_medic,
'id_medic'=>$xsscleanid_medic,			
'pekerjaan_medic'=>$xsscleanpekerjaan_medic,					/*
'namapenganjur1'=>$xsscleannamapenganjur1,
'nokppenganjur1'=>$xsscleannokppenganjur1,
'alamatpenganjur1'=>$xsscleanalamatpenganjur1,
'alamatpenganjur2'=>$xsscleanalamatpenganjur2,
'alamatpenganjur3'=>$xsscleanalamatpenganjur3,
'kodposkodpenganjur'=>$xsscleankodposkodpenganjur,
'kodbandar_penganjur'=>$xsscleankodbandar_penganjur,
'kodnegeri_penganjur'=>$xsscleankodnegeri_penganjur,
'jenispenganjur_id'=>$xsscleanjenispenganjur_id,
'negarapengeluar_id'=>$xsscleannegarapengeluar_id,    */

				'nama_pemaklum2' =>$xsscleannama_pemaklum2,
				'nopengenalan_pemaklum2' =>$xsscleannopengenalan_pemaklum2,
				'alamat_pemaklum2_1' =>$xsscleanalamat_pemaklum2_1,
				'alamat_pemaklum2_2' =>$xsscleanalamat_pemaklum2_2,
				'alamat_pemaklum2_3' =>$xsscleanalamat_pemaklum2_3,
				'poskod_pemaklum2' =>$xsscleanposkod_pemaklum2,
				'bandar_pemaklum2' =>$xsscleanbandar_pemaklum2,
				'negeri_pemaklum2' =>$xsscleannegeri_penganjur2,
				'hubungan_pemaklum2' =>$xsscleanhubungan_pemaklum2,
				'emel_pemaklum2' =>$xsscleanemel_pemaklum2,
				'notelefon_pemaklum2' =>$xsscleannotelefon_pemaklum2,



'namaibu'=>$xsscleannamaibu,
'ibu_id'=>$xsscleanibu_id,
'jenis_id_ibu'=>$xsscleanjenis_id_ibu,
'negara_id_ibu'=>$xsscleannegara_id_ibu,
'warganegara_ibu'=>$xsscleanwarganegara_ibu,
'bilangan_anak'=>$xsscleanbilangan_anak,
'rank_anak'=>$xsscleanrank_anak,
'namabapa'=>$xsscleannamabapa,
'bapa_id'=>$xsscleanbapa_id,
'jenis_id_bapa'=>$xsscleanjenis_id_bapa,
'negara_id_bapa'=>$xsscleannegara_id_bapa,
'warganegara_bapa'=>$xsscleanwarganegara_bapa,
'status_perkahwinan'=>$xsscleanstatus_perkahwinan,
'tarikh_perkahwinan'=>$xsscleantarikh_perkahwinan,						
'tempat_perkahwinan'=>$xsscleantempat_perkahwinan,	
'No_Sijil_Kahwin'=>$xsscleanNo_Sijil_Kahwin,
//maklumat penganjur 1 dan penganjur 2

									'nama_penganjur_1'=>$xsscleannama_penganjur_1,
									'nokp_penganjur_1'=>$xsscleannokp_penganjur_1,
									'hubungan_penganjur_1'=>$xsscleanhubungan_penganjur_1,
									
									'nama_penganjur_2'=>$xsscleannama_penganjur_2,	
									'nokp_penganjur_2'=>$xsscleannokp_penganjur_2, 
									'hubungan_penganjur_2'=>$xsscleanhubungan_penganjur_2,


//
					
						);


$this->inq_model_dev->form_insert($data);



}
}
//------------------ rekod anak ------------------


 public function data_anak()
  {
  	/*$this->session->set_userdata('ibu_id',n2);*/

$i = 0; // untuk loopingnya
    $a = $this->input->post('nama_siblings');
    $b = $this->input->post('tarikh_lahir_siblings');
    $c = $this->input->post('tempat_lahir_siblings');
    $d = $this->input->post('warganegara_siblings');
    $e = $this->input->post('ibu_id');

    if ($a[0] !== null) 
    {
      foreach ($a as $row) 
      {
        $data = [
          'nama_siblings'=>$row,
          'tarikh_lahir_siblings'=>$b[$i],
          'tempat_lahir_siblings'=>$c[$i],
          'warganegara_siblings'=>$d[$i],
          'ibu_id'=>$e[$i],

        ];

        $insert = $this->db->insert('data_anak', $data);
        if ($insert) {
          $i++;
        }
      }
    }

$arr['success'] = TRUE;

$arr['notif'] ='<div class="alert alert-success"><i class="fa fa-check"></i> Data berjaya Disimpan </div> ';

//$this->load->view('input/daftar');

return $this->output->set_output(json_encode($arr));

}




//------------------ rekod anak ------------------








/************************************end form*************************************/

/************************* pembetulan REKOD ***************************/
	
	public function pembetulan(){
	
		$this->load->library('session');
		 $this->load->helper('text');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('input/pembetulan', $thisdata);
			}else{
				redirect('index/login');
			}
	}



public function pembetulan_result($keysearch,$keyid){
	
		$this->load->library('session');
		 $this->load->helper('text');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
		
		$keyid = $this->security->xss_clean($keyid);	
		
		$detail= $this->inq_model->getCarianDetail($keysearch, $keyid);
		$thisdata['info'] = $detail;
		$numofrow = $detail->num_rows();
	
		
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodcawangan = $row->kodcawangan;
				}


				if ($kodcawangan !=''){
					$thisdata['namacawangan'] = $this->inq_model->getRegPlace($kodcawangan);
				}else if ($kodcawangan==''){
					$thisdata['namacawangan'] = 'MAKLUMAT TIADA';
				}
			}
			
			// tukar status dari kod kepada nama	 din 10/10/2018 ================
/*	//kod kelulusan	
				if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodkelulusan = $row->statuskelulusan;
				}
				if ($kodkelulusan !=''){
					$thisdata['namakod'] = $this->inq_model->getlulus($kodkelulusan);
				}else if ($kodkelulusan==''){
					$thisdata['namakod'] = 'MAKLUMAT TIADA';
				}
			}

//kod agama

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodagamna = $row->religion_id;
				}
				if ($kodagamna !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($kodagamna);
				}else if ($kodagamna==''){
					$thisdata['namaagama'] = 'MAKLUMAT TIADA';
				}
			}
*/

//kod keturunan

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodketurunan = $row->race_id;
				}
				if ($kodketurunan !=''){
					$thisdata['namaketurunan'] = $this->inq_model->getketurunan($kodketurunan);
				}else if ($kodketurunan==''){
					$thisdata['namaketurunan'] = 'MAKLUMAT TIADA';
				}
			}


//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodbandar = $row->kodbandar_penganjur;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar'] = $this->inq_model->getbandar($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar'] = 'MAKLUMAT TIADA';
				}
			}

//kod kod_bandar

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodbandar = $row->bandarpemaklum;
				}
				if ($kodbandar !=''){
					$thisdata['namabandar2'] = $this->inq_model->getbandar2($kodbandar);
				}else if ($kodbandar==''){
					$thisdata['namabandar2'] = 'MAKLUMAT TIADA';
				}
			}



//kod negara pengeluar id ibu

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->negara_id_ibu;
				}
				if ($kodid !=''){
					$thisdata['negaraidibu'] = $this->inq_model->getpengeluaridibu($kodid);
				}else if ($kodid==''){
					$thisdata['namaidibu'] = 'MAKLUMAT TIADA';
				}
			}		

//kod negara pengeluar id bapa

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->negara_id_bapa;
				}
				if ($kodid !=''){
					$thisdata['negaraidbapa'] = $this->inq_model->getpengeluaridbapa($kodid);
				}else if ($kodid==''){
					$thisdata['negaraidbapa'] = 'MAKLUMAT TIADA';
				}
			}	

//kod negara pengeluar id pemaklum

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->negarapengeluar_id;
				}
				if ($kodid !=''){
					$thisdata['negaraidpemaklum'] = $this->inq_model->getpengeluaridpemaklum($kodid);
				}else if ($kodid==''){
					$thisdata['negaraidpemaklum'] = 'MAKLUMAT TIADA';
				}
			}		



//kod JENIS id ibu

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->jenis_id_ibu;
				}
				if ($kodid !=''){
					$thisdata['jenisidibu'] = $this->inq_model->getpengeluarjenisibu($kodid);
				}else if ($kodid==''){
					$thisdata['jenisidibu'] = 'MAKLUMAT TIADA';
				}
			}		


//kod JENIS id bapa

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->jenis_id_bapa;
				}
				if ($kodid !=''){
					$thisdata['jenisidbapa'] = $this->inq_model->getpengeluarjenisbapa($kodid);
				}else if ($kodid==''){
					$thisdata['jenisidbapa'] = 'MAKLUMAT TIADA';
				}
			}		


//kod JENIS id pemaklum

			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $kodid = $row->jenisdokumen_id;
				}
				if ($kodid !=''){
					$thisdata['jenisidpemaklum'] = $this->inq_model->getpengeluarjenispemaklum($kodid);
				}else if ($kodid==''){
					$thisdata['jenisidpemaklum'] = 'MAKLUMAT TIADA';
				}
			}		


//agama
/*
			if($numofrow > 0){
			 	foreach ($detail->result() as $row){  				 
					  $state_id = $row->state_id;
				}
				if ($state_id !=''){
					$thisdata['namaagama'] = $this->inq_model->getagama($state_id);
				}else if ($state_id==''){
					$thisdata['state_id'] = 'MAKLUMAT TIADA';
				}
			}
*/

			


//  ======================session======
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			if( $keysearch == 7){
				$this->load->view('index/login',$thisdata);
			
			}if( $keysearch == 6){
				$this->load->view('index/login',$thisdata);
			}else{
				$this->load->view('input/pembetulan',$thisdata);
			}
		}else{
				redirect('index/login');
			}
	}
	//  =================================================================end pembetulan =====================================================================================

/*********************************form pendaftaran*************************************/


function update_pembetulan() {

		
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		$this->load->helper('form');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
//$this->form_validation->set_rules('applicationno', 'applicationno', 'required|min_length[24]|max_length[24]');
	//$this->form_validation->set_rules('applicationdate', 'applicationdate', 'required|date');
	//$this->form_validation->set_rules('tarikhlahir', 'tarikhlahir', 'required|date');
	//$this->form_validation->set_rules('namaibu', 'namaibu', 'required|date');

//Validating Email Field
//$this->form_validation->set_rules('applicationdate', 'applicationdate', 'required|date');

//Validating Mobile no. Field
//$this->form_validation->set_rules('dmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

//Validating Address Field
//$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');
date_default_timezone_set('Asia/Singapore');
	   $date = new DateTime();
		
		
		$oper_uid = $this->session->userdata('operid');
		$oper_bc = $this->session->userdata('branchcode');



// if ($this->form_validation->run() == FALSE) {
// $applicationno = $this->security->xss_clean($this->input->post('applicationno'));	
// 	 $thisdata['errors'] = "Sila isi medan yang terlibat";
//  echo "errorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr";


// } 


// else {
//Setting values for tabel columns
$xsscleanID = 0;
$applicationno = $this->security->xss_clean($this->input->post('applicationno'));	
			//$xsscleanapplicationno = $this->security->xss_clean($this->input->post('applicationno'));	
			$xsscleanconvertDate = $this->security->xss_clean($this->input->post('applicationdate'));
			$xsscleanno_file = $this->security->xss_clean($this->input->post('no_file'));
	

	$xsscleankodcawangan = $this->security->xss_clean($this->input->post('kodcawangan'));	
	$xsscleanbranch_id = $this->security->xss_clean($this->input->post('branch_id'));
				$xsscleanreg_oper_id = $this->security->xss_clean($this->input->post('reg_oper_id'));
				$xsscleanstate_id = $this->security->xss_clean($this->input->post('state_id'));
		$xsscleannamakanak = $this->security->xss_clean($this->input->post('namakanak'));	
		$xsscleantarikhlahir = $this->security->xss_clean($this->input->post('tarikhlahir'));	
		$xsscleanjantina_anak = $this->security->xss_clean($this->input->post('jantina_anak'));	
		$xsscleanreligion_id = $this->security->xss_clean($this->input->post('religion_id'));	
		$xsscleanrace_id = $this->security->xss_clean($this->input->post('race_id'));	
		$xsscleantempatlahir1 = $this->security->xss_clean($this->input->post('tempatlahir1'));	
		$xsscleantempatlahir2 = $this->security->xss_clean($this->input->post('tempatlahir2'));	
		$xsscleannodaftarlahir = $this->security->xss_clean($this->input->post('nodaftarlahir'));	 
	//	$xsscleanchd_hsc_no = $this->security->xss_clean($this->input->post('chd_hsc_no'));	
		$xsscleanwarganegara_id = $this->security->xss_clean($this->input->post('warganegara_id'));	
				
		$xsscleannama_medic = $this->security->xss_clean($this->input->post('nama_medic'));	
		$xsscleanid_medic = $this->security->xss_clean($this->input->post('id_medic'));	
		$xsscleanpekerjaan_medic = $this->security->xss_clean($this->input->post('pekerjaan_medic'));	
				

					
//penganjur 1 adalah pemaklum
									$xsscleannamapenganjur1 = $this->security->xss_clean($this->input->post('namapenganjur1'));	
									$xsscleannokppenganjur1 = $this->security->xss_clean($this->input->post('nokppenganjur1'));	        
									$xsscleanalamatpenganjur1 = $this->security->xss_clean($this->input->post('alamatpenganjur1'));	
									$xsscleanalamatpenganjur2 = $this->security->xss_clean($this->input->post('alamatpenganjur2'));	
									$xsscleanalamatpenganjur3 = $this->security->xss_clean($this->input->post('alamatpenganjur3'));	
									$xsscleankodposkodpenganjur = $this->security->xss_clean($this->input->post('kodposkodpenganjur'));	 
									$xsscleankodbandar_penganjur = $this->security->xss_clean($this->input->post('kodbandar_penganjur'));	
									$xsscleankodnegeri_penganjur = $this->security->xss_clean($this->input->post('kodnegeri_penganjur'));	 
									$xsscleanjenispenganjur_id = $this->security->xss_clean($this->input->post('jenispenganjur_id'));	
									$xsscleannegarapengeluar_id = $this->security->xss_clean($this->input->post('negarapengeluar_id'));	     

									$xsscleannama_pemaklum2 = $this->security->xss_clean($this->input->post('nama_pemaklum2'));	
									$xsscleannopengenalan_pemaklum2 = $this->security->xss_clean($this->input->post('nopengenalan_pemaklum2'));	
									$xsscleanalamat_pemaklum2_1 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_1'));	
									$xsscleanalamat_pemaklum2_2 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_2'));	
									$xsscleanalamat_pemaklum2_3 = $this->security->xss_clean($this->input->post('alamat_pemaklum2_3'));	
									$xsscleanposkod_pemaklum2 = $this->security->xss_clean($this->input->post('poskod_pemaklum2'));	 
									$xsscleanbandar_pemaklum2 = $this->security->xss_clean($this->input->post('bandar_pemaklum2'));	
									$xsscleannegeri_penganjur2 = $this->security->xss_clean($this->input->post('negeri_pemaklum2'));	 
									$xsscleanhubungan_pemaklum2 = $this->security->xss_clean($this->input->post('hubungan_pemaklum2'));	
									$xsscleanemel_pemaklum2 = $this->security->xss_clean($this->input->post('emel_pemaklum2'));	
									$xsscleannotelefon_pemaklum2 = $this->security->xss_clean($this->input->post('notelefon_pemaklum2')); 
// maklumat penganjur 1 dan 2

$xsscleannama_penganjur_1 = $this->security->xss_clean($this->input->post('nama_penganjur_1'));
$xsscleannokp_penganjur_1 = $this->security->xss_clean($this->input->post('nokp_penganjur_1'));
$xsscleanhubungan_penganjur_1 = $this->security->xss_clean($this->input->post('hubungan_penganjur_1'));

$xsscleannama_penganjur_2 = $this->security->xss_clean($this->input->post('nama_penganjur_2'));
$xsscleannokp_penganjur_2 = $this->security->xss_clean($this->input->post('nokp_penganjur_2'));
$xsscleanhubungan_penganjur_2 = $this->security->xss_clean($this->input->post('hubungan_penganjur_2'));





		$xsscleannamaibu = $this->security->xss_clean($this->input->post('namaibu'));	         
		$xsscleanibu_id = $this->security->xss_clean($this->input->post('ibu_id'));	
		$xsscleanjenis_id_ibu = $this->security->xss_clean($this->input->post('jenis_id_ibu'));	
		$xsscleannegara_id_ibu = $this->security->xss_clean($this->input->post('negara_id_ibu'));	
		$xsscleanwarganegara_ibu = $this->security->xss_clean($this->input->post('warganegara_ibu'));	
		$xsscleanbilangan_anak = $this->security->xss_clean($this->input->post('bilangan_anak'));	
		$xsscleanrank_anak = $this->security->xss_clean($this->input->post('rank_anak'));	

		$xsscleannamabapa = $this->security->xss_clean($this->input->post('namabapa'));	
		$xsscleanbapa_id = $this->security->xss_clean($this->input->post('bapa_id'));	
		$xsscleanjenis_id_bapa = $this->security->xss_clean($this->input->post('jenis_id_bapa'));	
		$xsscleannegara_id_bapa = $this->security->xss_clean($this->input->post('negara_id_bapa'));	
		$xsscleanwarganegara_bapa = $this->security->xss_clean($this->input->post('warganegara_bapa'));	

		$xsscleanstatus_perkahwinan = $this->security->xss_clean($this->input->post('status_perkahwinan'));	 
					//no_sijil_perkahwinan 
		$xsscleantarikh_perkahwinan = $this->security->xss_clean($this->input->post('tarikh_perkahwinan'));	
$xsscleantempat_perkahwinan = $this->security->xss_clean($this->input->post('tempat_perkahwinan'));	
$xsscleanNo_Sijil_Kahwin = $this->security->xss_clean($this->input->post('No_Sijil_Kahwin'));	
																										

			$data = array(
					
					
					//'applicationno'=>$xsscleanapplicationno,	
					'applicationdate'=>$xsscleanconvertDate,	
					'no_file'=>$xsscleanno_file,	
'kodcawangan'=>$xsscleankodcawangan,
'branch_id'=>$xsscleanbranch_id,
'reg_oper_id' =>$xsscleanreg_oper_id,
'namakanak'=>$xsscleannamakanak,
'tarikhlahir'=>$xsscleantarikhlahir,
'jantina_anak'=>$xsscleanjantina_anak,
'religion_id'=>$xsscleanreligion_id,
'race_id'=>$xsscleanrace_id,
'warganegara_id'=>$xsscleanwarganegara_id, 
'tempatlahir1'=>$xsscleantempatlahir1,
'tempatlahir2'=>$xsscleantempatlahir2,
'nodaftarlahir'=>$xsscleannodaftarlahir,
'state_id'=>$xsscleanstate_id,
//'chd_hsc_no'=>$xsscleanchd_hsc_no,
'nama_medic'=>$xsscleannama_medic,
'id_medic'=>$xsscleanid_medic,			
'pekerjaan_medic'=>$xsscleanpekerjaan_medic,					
'namapenganjur1'=>$xsscleannamapenganjur1,
'nokppenganjur1'=>$xsscleannokppenganjur1,
'alamatpenganjur1'=>$xsscleanalamatpenganjur1,
'alamatpenganjur2'=>$xsscleanalamatpenganjur2,
'alamatpenganjur3'=>$xsscleanalamatpenganjur3,
'kodposkodpenganjur'=>$xsscleankodposkodpenganjur,
'kodbandar_penganjur'=>$xsscleankodbandar_penganjur,
'kodnegeri_penganjur'=>$xsscleankodnegeri_penganjur,
'jenispenganjur_id'=>$xsscleanjenispenganjur_id,
'negarapengeluar_id'=>$xsscleannegarapengeluar_id,    

				'nama_pemaklum2' =>$xsscleannama_pemaklum2,
				'nopengenalan_pemaklum2' =>$xsscleannopengenalan_pemaklum2,
				'alamat_pemaklum2_1' =>$xsscleanalamat_pemaklum2_1,
				'alamat_pemaklum2_2' =>$xsscleanalamat_pemaklum2_2,
				'alamat_pemaklum2_3' =>$xsscleanalamat_pemaklum2_3,
				'poskod_pemaklum2' =>$xsscleanposkod_pemaklum2,
				'bandar_pemaklum2' =>$xsscleanbandar_pemaklum2,
				'negeri_pemaklum2' =>$xsscleannegeri_penganjur2,
				'hubungan_pemaklum2' =>$xsscleanhubungan_pemaklum2,
				'emel_pemaklum2' =>$xsscleanemel_pemaklum2,
				'notelefon_pemaklum2' =>$xsscleannotelefon_pemaklum2,

				'namaibu'=>$xsscleannamaibu,
				'ibu_id'=>$xsscleanibu_id,
				'jenis_id_ibu'=>$xsscleanjenis_id_ibu,
				'negara_id_ibu'=>$xsscleannegara_id_ibu,
				'warganegara_ibu'=>$xsscleanwarganegara_ibu,
				'bilangan_anak'=>$xsscleanbilangan_anak,
				'rank_anak'=>$xsscleanrank_anak,
				'namabapa'=>$xsscleannamabapa,
				'bapa_id'=>$xsscleanbapa_id,
				'jenis_id_bapa'=>$xsscleanjenis_id_bapa,
				'negara_id_bapa'=>$xsscleannegara_id_bapa,
				'warganegara_bapa'=>$xsscleanwarganegara_bapa,
				'status_perkahwinan'=>$xsscleanstatus_perkahwinan,
				'tarikh_perkahwinan'=>$xsscleantarikh_perkahwinan,						
				'tempat_perkahwinan'=>$xsscleantempat_perkahwinan,	
				'No_Sijil_Kahwin'=>$xsscleanNo_Sijil_Kahwin,

//maklumat penganjur 1 dan penganjur 2

				'nama_penganjur_1'=>$xsscleannama_penganjur_1,
				'nokp_penganjur_1'=>$xsscleannokp_penganjur_1,
				'hubungan_penganjur_1'=>$xsscleanhubungan_penganjur_1,
							
				'nama_penganjur_2'=>$xsscleannama_penganjur_2,	
				'nokp_penganjur_2'=>$xsscleannokp_penganjur_2, 
				'hubungan_penganjur_2'=>$xsscleanhubungan_penganjur_2,


//
					
					);


//Transfering data to Model
//echo $applicationno;
$this->db->where('applicationno', $applicationno); //kekunci update
$this->db->update('records_efast', $data);




//$this->inq_model->form_update($data, $applicationno);
//echo $applicationno;
$this->load->view('carian/result_sah');
//redirect('efast/dashboard_efast');

//echo "berjayaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
//$data['message'] = 'REKOD TELAH BERJAYA DIDAFTARKAN';



//}
}




/************************************end form*************************************/






}

?>