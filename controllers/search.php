<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


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
	
//------------------ UPDATE REKOD ------------------//
		
		function update_record(){
		
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
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
		$this->form_validation->set_rules('catatan', 'CATATAN', 'required');
		
		
		$thisdata = $this->profileUser();
		

		
		date_default_timezone_set('Asia/Singapore');
	    $date = new DateTime();
		$upd_dt  = $date->format('Y-m-d H:i:s');
		
		$oper_uid = $this->session->userdata('operid');
		$oper_bc = $this->session->userdata('branchcode');
		
		if ($this->form_validation->run() == FALSE)
		{
			$apl_no = $this->security->xss_clean($this->input->post('apl_no'));	
			
			
			
					
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
			$xsscleanposkodpemaklum = $this->security->xss_clean($this->input->post('poskodpemaklum '));
			$xsscleanbandarpemaklum = $this->security->xss_clean($this->input->post('bandarpemaklum'));
			$xsscleannegeripemaklum = $this->security->xss_clean($this->input->post('negeripemaklum'));
			$xsscleanjenisdokumen2= $this->security->xss_clean($this->input->post('jenisdokumen2_id'));
			$xsscleannegarapengeluar2= $this->security->xss_clean($this->input->post('negarapengeluar2_id'));
			$xsscleanjenispenganjur2_id= $this->security->xss_clean($this->input->post('jenispenganjur2_id'));
			$xsscleanemel2 = $this->security->xss_clean($this->input->post('emel2'));
			$xsscleannotelefon2 = $this->security->xss_clean($this->input->post('notelefon2'));
		
			
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
		$thisdata['duplicateA'] = $this->inq_model->updDuplA($xsscleanduplicateappno ); //up
		$thisdata['duplicateB'] = $this->inq_model->updDuplB($apl_no,$xsscleanduplicateappno );
		
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		$thisdata['queryduplikasi'] = $this->inq_model->get_senarai_fail($apl_no);
				
			
		$this->load->view('carian/display_view_carian',$thisdata);  //--//-- if berjaya pergi pada muka depan --//--//
			}		
		
	}


//------------------------------------//
	
	function duplicate_all($apl_no){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['allduplikasi'] =$this->inq_model->get_duplicate_all($apl_no);
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/duplicate_all_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	public function duplicate_lebih2(){
		$this->load->library('session');
		//$thisdata = $this->profileUser();	
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
	
	
	function carian_ibu(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
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
	
	
	
	function carian_duplicate(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
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
	
	
	function display_edit($apl_no){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		$thisdata['notes'] = $this->inq_model->get_senarai_catatan($apl_no);
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
		$this->load->view('carian/edit', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
		
	
	function detail_view($apl_no){
	
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
		$thisdata['queryduplikasi'] = $this->inq_model->get_senarai_fail($apl_no);
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
		$this->load->view('carian/detail_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
		
	
	
	function inquiry(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report/inq_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	function child_name(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/child_name_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	function Status_Kelulusan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/Status_Kelulusan_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
		function Kod_Cawangan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/Kod_Cawangan_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	function fail_Cawangan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
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
	
	
		
	function no_permohonan(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/apl_no_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	function no_kp_penganjur(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
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
	
	//--//--//--//--//--// FUNCTION DISLPAYREC START SINI //--//--//--//--//--// 
	
		
	function displayrec_duplicate_all()
	
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['detail'] = $this->inq_model->get_duplicate_all();
		
	}
	
	
	
	function displayrec_duplicate_lebih2()
	
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['detail'] = $this->inq_model->get_duplicate_lebih();
			
				
	}
	
	
	
	
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
			$thisdata['detail'] = $this->inq_model->get_mother_name($namaparent);
			
			
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
	
	
	
	
	function displayrec_fail_Cawangan()
	{	
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
	
	
	
	function displayrec_Kod_Cawangan()
	{	
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->form_validation->set_rules('Kod_Cawangan', 'Kod Cawangan','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$Kod_Cawangan = $this->security->xss_clean($this->input->post('Kod_Cawangan'));
			$thisdata['pilihan']	 = 'Kod Cawangan :'.$Kod_Cawangan;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_Kod_Cawangan($Kod_Cawangan);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
						if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/Kod_Cawangan_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	
	
	
	
	
	 function displayrec_child_name()
	{	
			$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('child_name', 'child name','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$child_name = $this->security->xss_clean($this->input->post('child_name'));
			$thisdata['pilihan']	 = 'Nama Kanak-Kanak :'.$child_name;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_child_name($child_name);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/child_name_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	
	
	function displayrec_Status_Kelulusan()
	{	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('Status_Kelulusan', 'Status Kelulusan','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$Status_Kelulusan = $this->security->xss_clean($this->input->post('Status_Kelulusan'));
			$thisdata['pilihan']	 = 'Status Kelulusan :'.$Status_Kelulusan;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_Status_Kelulusan($Status_Kelulusan);
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/Status_Kelulusan_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
	
	
	

   function displayrec_aplno()
	{	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('apl_no', 'Nombor Permohonan','required');
		
		
			
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$apl_no = $this->security->xss_clean($this->input->post('apl_no'));
			$thisdata['pilihan']	 = 'Nombor Permohonan :'.$apl_no;
			//load query dari model untuk getusserrec (apl_no)
			$thisdata['detail'] = $this->inq_model->get_apl_no($apl_no);
		
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				//kalau jumpa dia pergi sini				
				$this->load->view('carian/display_view_carian',$thisdata);
				
				
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
	
	
	
	  function displayrec_kp_penganjur()
	{	
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
				$this->load->view('carian/KP_view.php',$thisdata);
			}else{
				redirect('index/login');
			}
		}
		
		
	}


    function displayrec()
	{	
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		$this->form_validation->set_rules('id_ibu', 'Username','required');
		$this->form_validation->set_rules('bir_dt', 'Tarikh','required');
		
		
		$thisdata = $this->lib_global->profileUser();
		
		if ($this->form_validation->run() == TRUE)
		{
			$idIbu = $this->security->xss_clean($this->input->post('id_ibu'));
			$birAnak = $this->security->xss_clean($this->input->post('bir_dt'));
			
			$thisdata['query'] = $this->inq_model->getuserrec($idIbu, $birAnak);
			$queryData = $this->inq_model->getuserrec($idIbu, $birAnak);
			$numofrow = $queryData->num_rows();
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($queryData->result() as $row){
	  				  $kodHospital   = $row->BWL_HOSP_CD_KKM;
					  $kodNegeri    = $row->BWL_MO_STATE_CD;
					  $kodNegara    = $row->BWL_MO_CTRY_CD;
					  $kodTptDaftar = $row->BWL_REG_PLC_CD;
				}
				if ($kodTptDaftar !=''){
					$thisdata['tempatDaftar'] = $this->inq_model->getRegPlace($kodTptDaftar);
				}
				$thisdata['namaHos'] = $this->inq_model->getnamahosp($kodHospital);
				$thisdata['negeri']  = $this->inq_model->getDescription('NEG',$kodNegeri);
				$thisdata['negara']  = $this->inq_model->getDescription('NGR',$kodNegara);
			}
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report/display_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report/inq_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}
 
 
  
     function display(){
	//	$this->load->library('session');
	//	$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report/display_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}
	
	
	function display_calendar(){
	//	$this->load->library('session');
	//	$this->load->library('Lib_global');
	//	$thisdata = $this->lib_global->profileUser();
	    $thisdata = $this->lib_calendar->calendar();
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report/inq_view', $thisdata);
		}else{
				redirect('index/login');
		}
		
	}

}
?>