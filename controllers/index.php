<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Index extends CI_Controller {
	public function _construct(){
		parent::_construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('jpn_form');
		
		$this->load->library('form_validation');
	}
	
	
	//-------------------// function password reset din start //---------------------------//
	

     
	public function checkemail(){
	
		$this->load->model('login_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('sendemail');
		$this->form_validation->set_rules('useremail', 'Email','required');
	
		if ($this->form_validation->run() == TRUE){
			
		$email = $this->security->xss_clean($this->input->post('useremail'));
		
		
			
			$query = $this->login_model->getEmail($email);
	
        	$numofrow = $query->num_rows();
			
			//if jumpa user dlm CUID
			if($numofrow > 0){
					//hantar email
					foreach ($query->result() as $row){
					
					  $usrname 		= $row->oper_id;
					  $pwd			= $row->password;
					 
				}
					$this->sendemail->send_emailjpn($email,$usrname,$pwd);
					
					echo "<script>
					alert('Kata Laluan Telah berjaya dihantar');  
					window.location.href='login';

					</script>";
					
					
				}
			
			else
			//$this->load->view('email_template');  
			 
			 echo "<script>
					alert('Email Tidak Terdapat Dalam pangkalan data.')
					alert('sila Pastikan emel yang sah dimasukkan bagi memudahkan proses penghantaran kata laluan anda');  
					window.location.href='login';

					</script>"; 
			
			//header( "refresh:2;url=login" );
	
			
			
			
			
			
			
			

		}

}
	
	
	
	//-------------------// end //---------------------------//
	
	
	
	function home(){
		$this->load->view('front_view');
	}
	
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
	
	function loginuser(){
	
		$this->load->model('login_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->database();
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('loginusername', 'ID Pengguna','required');
		$this->form_validation->set_rules('loginpassword', 'Kata Laluan','required');
		
		if ($this->form_validation->run() == TRUE){
			
			$usr = $this->security->xss_clean($this->input->post('loginusername'));
			$pwd = $this->security->xss_clean($this->input->post('loginpassword'));
			$passwordx = md5($pwd);


			$uid='';
			$query = $this->login_model->getProfileLogin($usr, $passwordx);

			//$query = $this->login_model->getProfileLogin($usr, $pwd);
        	$numofrow = $query->num_rows();
			//if jumpa user dlm CUID
			if($numofrow > 0){
				foreach ($query->result() as $row){
					  $uid 			= $row->cuid_id;
					  $usrhsc 		= $row->hsc_no;
					  $usrname 		= $row->oper_id;
					  $usrbranch 	= $row->branch_code;
					  $sirenK1		= $row->sirenKelas1;
					  $sirenK2		= $row->sirenKelas2;
					  $exp_date 	= $row->tarikh_tamat;
				}
			
				$todays_date = date("Y-m-d"); 
				$today = strtotime($todays_date); 
				$expiration_date = strtotime($exp_date); 
				
				if ($expiration_date > $today) { 
					$valid = "yes"; 
					$newdata = array(
						'hscno'=> $usrhsc,
						'operid'=> $usrname,
						'userid'=> $uid,
						'branchcode'=> $usrbranch,
						'sirenKelas1'=> $sirenK1,
						'sirenKelas2'=> $sirenK2,
						'valid_user' => $valid,
						'loginsession' => TRUE	
					);
					
					$this->session->set_userdata($newdata);
					
					redirect('index/senarai_sistem');
				} else { 
					$valid = "no"; 
					$data['errors'] = "Tempoh anda telah tamat.Rujuk kepada Penyelia CUID";
					log_message('error', 'ID Pengguna tamat tempoh : '.$usr);
					$this->load->view('login_form',$data);
					
				}
			
			}else{//if user not found in CUID
				$data['errors'] = "ID Pengguna atau kata laluan tidak sah";
				log_message('error', 'Salah id :'.$usr.' & kata laluan:'.$pwd);
				$this->load->view('login_form',$data);
			}
		}
		
		else{
			$this->load->view('login_form');
			
		} 

	}
	
	
	public function senarai_sistem(){
		$this->load->library('session');		
		$thisdata = $this->profileUser();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('pilih_sistem',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	public function pilih_menu(){
		$this->load->library('session');		
		$thisdata = $this->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('kematian/pilih_view',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	
	
	public function laporanKKM(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
		//farhana 150121
		
		
			$thisdata['totalData'] = $this->laporankkm_m->total_data_baru();
			$thisdata['totalIntegrasi'] = $this->laporankkm_m->total_integrasi_baru();
			$thisdata['totalNotIntegrasi'] = $this->laporankkm_m->total_not_integrasi_baru();
			$thisdata['totalNotDaftar'] = $this->laporankkm_m->total_not_daftar_baru();
			$thisdata['totalProblem'] = $this->laporankkm_m->total_problem_baru();
		
				
			
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('home_laporan_kkm', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	//farhana 141010
	public function laporanKKM_1(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
			$thisdata['query'] = $this->laporankkm_m->statistik2014();
			
			
			
			
			//$thisdata['totalDataCur'] = $this->laporankkm_m->total_data_cur();
			//$thisdata['totalIntegrasiCur'] = $this->laporankkm_m->total_integrasi_cur();
			//$thisdata['totalNotIntegrasiCur'] = $this->laporankkm_m->total_not_integrasi_cur();
			//$thisdata['totalNotDaftarCur'] = $this->laporankkm_m->total_not_daftar_cur();
			//$thisdata['totalProblemCur'] = $this->laporankkm_m->total_problem_cur();
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_1', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	
	
	
	
	//farhana 141010
	public function laporanKKM_2(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
			$thisdata['query'] = $this->laporankkm_m->statistik2014();
			$thisdata['query_arc'] = $this->laporankkm_m->stastistik_archive();
			
			
			//$queryData = $this->hedjaz_model->get_record($icno);
		
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_2', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	//farhana 141010
	public function laporanKKM_3(){
		$this->load->library('session');
		$thisdata = $this->profileUser();	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();	
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/inq_view', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	
	public function report(){
		$this->load->library('session');
		$thisdata = $this->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('home_report',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	public function sistem_lahir(){
		$this->load->library('session');
		
		$thisdata = $this->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('home_lahir',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	
	public function daftar(){
		$this->load->library('session');
		
		$thisdata = $this->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('kematian/skrin1_view',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	
	public function permit(){
		$this->load->library('session');
		
		$thisdata = $this->profileUser();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('permit/skrin1',$thisdata);
		}else{
			redirect('index/login');
		}
	}
	
	public function login(){
		$this->load->view('login_form');
	}
	
	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->view('front_view');
	}
	
	public function register(){
		$this->load->view('register_form');
	}
	
	public function register_valid(){
		$this->load->model('register_model');
		$this->load->helper('security');
		$this->load->database();
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		//$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[userdata.username]|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register_form');
		}
		else{
			$str1 = $this->input->post('fullname');
			
			$xsscleanfullname = $this->security->xss_clean($str1);
			$xsscleaninputname = $this->security->xss_clean($this->input->post('username'));
			$xsscleaninputemail = $this->security->xss_clean($this->input->post('email'));
			
			$str2 = $this->security->xss_clean($this->input->post('password'));
			$passwordencrypt = do_hash($str2, 'md5');
			
			
			$datatodatabase = array(
					'fullname'=>$xsscleanfullname ,
					'username'=>$xsscleaninputname ,
					'password'=>$passwordencrypt,
					'email'=>$xsscleaninputemail
					);
					
			$this->register_model->insertdatatodatabase($datatodatabase);
			
			redirect('index/login');
			//$this->load->view('formsuccess');
		
		} 
	}
	
	
	function displayCalendar(){
		$prefs = array (
               'start_day'    => 'saturday',
               'month_type'   => 'long',
               'day_type'     => 'short',
			    'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url().'index.php/index/displayCalendar/'
             );

	$this->load->library('calendar', $prefs);

		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
	
	}	
	
	function otherCalendar($year,$month){
	
	$prefs = array (
               'start_day'    => 'saturday',
               'month_type'   => 'long',
               'day_type'     => 'short',
			    'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url().'index.php/otherCalendar/'
             );

	$this->load->library('calendar', $prefs);

		return $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
	
	}
	
	
}

?>