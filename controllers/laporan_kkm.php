<?php

class Laporan_kkm extends CI_Controller {
	public function _construct(){
		parent::_construct();
		$this->load->model('register_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_death');
		
	}
	
	
		function dashboard_KKM(){
		$this->load->library('session');
		
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
				$this->load->view('report_kkm/home_laporan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	public function all_rekod(){
		$this->load->library('session');
		$this->load->library('Lib_report');
		
		$data = $this->lib_report->profileUser();
	
		$this->load->view('report/semua_rekod',$data);
		
	}
	
	
   public function index() {
        $this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		

		
		
		$thisdata = $this->lib_global->profileUser();
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$thisdata['query'] = $this->laporankkm_m->data_terima();
			$thisdata['queryIntegrasi'] = $this->laporankkm_m->data_integrasi();
			$thisdata['queryNotIntegrasi'] = $this->laporankkm_m->data_not_integrasi();
			$thisdata['queryNotDaftar'] = $this->laporankkm_m->data_not_daftar();
			$thisdata['queryProblem'] = $this->laporankkm_m->data_problem();
			
			$thisdata['totalData'] = $this->laporankkm_m->total_data();
			$thisdata['totalIntegrasi'] = $this->laporankkm_m->total_integrasi();
			$thisdata['totalNotIntegrasi'] = $this->laporankkm_m->total_not_integrasi();
			$thisdata['totalNotDaftar'] = $this->laporankkm_m->total_not_daftar();
			$thisdata['totalProblem'] = $this->laporankkm_m->total_problem();
			
			}else{
				redirect('index/login');
			}
				
			
  }
	
	public function senarai_daftar(){
		$this->load->library('session');
		$this->load->model('anggapan_model');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata  = $this->anggapan_model->paging_anggapan();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('anggapan/list_anggapan_view',$thisdata);//based on page ape nk view
		}else{
			redirect('index/login');
		}
	}
	
	public function statistik_kkm()
	{	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
				
			$thisdata['query'] = $this->laporankkm_m->data_terima();
			$thisdata['queryIntegrasi'] = $this->laporankkm_m->data_integrasi();
			$thisdata['queryNotIntegrasi'] = $this->laporankkm_m->data_not_integrasi();
			$thisdata['queryNotDaftar'] = $this->laporankkm_m->data_not_daftar();
			$thisdata['queryProblem'] = $this->laporankkm_m->data_problem();
			
			$thisdata['totalData'] = $this->laporankkm_m->total_data();
			$thisdata['totalIntegrasi'] = $this->laporankkm_m->total_integrasi();
			$thisdata['totalNotIntegrasi'] = $this->laporankkm_m->total_not_integrasi();
			$thisdata['totalNotDaftar'] = $this->laporankkm_m->total_not_daftar();
			$thisdata['totalProblem'] = $this->laporankkm_m->total_problem();
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/statistik',$thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana0504
	public function laporankkm_2015_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2015();
			
			$thisdata['year'] = '2015';
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_archive_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	//farhana 2303
	public function laporankkm_2014_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2014();
			
			$thisdata['year'] = '2014';
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_archive_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana 2015
	public function laporankkm_2013_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2013();
		$thisdata['year'] = '2013';
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_archive_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana 2303
	public function laporankkm_2012_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2012();
		$thisdata['year'] = '2012';
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_archive_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	//farhana 2015
	public function laporanKKM_4_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik2015_bulan();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_4_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana 141010
	public function laporanKKM_4_maklumat($month){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		//load file helper
		$this->load->helper('desc_helper');
		
	
		
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2015($month);
		
		// hanita added this line - 29/01/2015
		$queryData = $this->laporankkm_m->makl_daftar_lewat_2015($month);
			
			
			 
			switch($month){
			case 01 :
			$month = "Januari";
			break;
			case 02 :
			$month = "Februari";
			break;
			case 03 :
			$month = "Mac";
			break;
			case 04 :
			$month = "April";
			break;
			case 05 :
			$month = "Mei";
			break;
			case 06 :
			$month = "Jun";
			break;
			case 07 :
			$month = "Julai";
			break;
			case 08 :
			$month = "Ogos";
			break;
			case 09 :
			$month = "September";
			break;
			case 10 :
			$month = "Oktober";
			break;
			case 11 :
			$month = "November";
			break;
			case 12 :
			$month = "Disember";
			break;
		
		} 
		// hanita added this line - 29/01/2015
		 $numofrow = $queryData->num_rows();
			
		
			//$thisdata['year'] = $year;
			$thisdata['month'] = $month;
			
			
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_4_maklumat', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
		public function bulan_archive_maklumat($month,$arcYear){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		//load file helper
		$this->load->helper('desc_helper');
		
	
		
		$thisdata = $this->lib_global->profileUser();
		
		
		
		 if ($arcYear=='2014'){
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2014($month);
		}else if ($arcYear=='2013'){
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2013($month);
		}else if ($arcYear=='2012'){
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2012($month);
		} 
		// farhana 0504
		else if ($arcYear=='2015'){
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2015($month);
		} 
		
		
		$thisdata['year'] = $arcYear;
		
		
		//$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2013($month);
		
		// hanita added this line - 29/01/2015
		$queryData = $this->laporankkm_m->makl_daftar_lewat_2013($month);
			
			
			 
			switch($month){
			case 01 :
			$month = "Januari";
			break;
			case 02 :
			$month = "Februari";
			break;
			case 03 :
			$month = "Mac";
			break;
			case 04 :
			$month = "April";
			break;
			case 05 :
			$month = "Mei";
			break;
			case 06 :
			$month = "Jun";
			break;
			case 07 :
			$month = "Julai";
			break;
			case 08 :
			$month = "Ogos";
			break;
			case 09 :
			$month = "September";
			break;
			case 10 :
			$month = "Oktober";
			break;
			case 11 :
			$month = "November";
			break;
			case 12 :
			$month = "Disember";
			break;
		
		} 
		// hanita added this line - 29/01/2015
		 $numofrow = $queryData->num_rows();
			
		
			//$thisdata['year'] = $year;
			$thisdata['month'] = $month;
			
			
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_archive_maklumat', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	public function status_permohonan_by_negeriSem2015(){
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['carta'] = $this->carta_permohonan_negeri_2015();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_permohonan_bynegeri', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}
	
	
	
	
	
	
	//farhana 141010
	public function laporanKKM_1_bulan(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		$thisdata = $this->lib_global->profileUser();
		
		
			$thisdata['query'] = $this->laporankkm_m->statistik2014_bulan();
		
		//$thisdata['year'] = $year;
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_1_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana 141010
	public function laporanKKM_1_maklumat($month){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		//load file helper
		$this->load->helper('desc_helper');
		
	
		
		$thisdata = $this->lib_global->profileUser();
		
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2014($month);
			
			
		// hanita added this line - 29/01/2015
		$queryData = $this->laporankkm_m->makl_daftar_lewat_2014($month);	
			
			 
			switch($month){
			case 01 :
			$month = "Januari";
			break;
			case 02 :
			$month = "Februari";
			break;
			case 03 :
			$month = "Mac";
			break;
			case 04 :
			$month = "April";
			break;
			case 05 :
			$month = "Mei";
			break;
			case 06 :
			$month = "Jun";
			break;
			case 07 :
			$month = "Julai";
			break;
			case 08 :
			$month = "Ogos";
			break;
			case 09 :
			$month = "September";
			break;
			case 10 :
			$month = "Oktober";
			break;
			case 11 :
			$month = "November";
			break;
			case 12 :
			$month = "Disember";
			break;
		
		} 
		
		// hanita added this line - 29/01/2015
		 $numofrow = $queryData->num_rows();
		
		
		
		
			
			//$thisdata['year'] = $year;
			$thisdata['month'] = $month;
			
			
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_1_maklumat', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	
	//farhana 141010
	public function laporanKKM_2_bulan($arcYear){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
	
		
		
		$thisdata = $this->lib_global->profileUser();
		
		if ($arcYear=='2013'){
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2013();
		}else if ($arcYear=='2012'){
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2012();
		}else if ($arcYear=='2014'){
			$thisdata['query'] = $this->laporankkm_m->statistik_arc_2014();
		}
		
		
		$thisdata['year'] = $arcYear;
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_2_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	//farhana 141010
	public function laporanKKM_2_maklumat($month,$year){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		//load file helper
		$this->load->helper('desc_helper');
	
		
			$thisdata = $this->lib_global->profileUser();
		
		 
		
			$thisdata['query'] = $this->laporankkm_m->makl_daftar_lewat_2013($month,$year);
			$thisdata = $this->laporankkm_m->paging_arc($month,$year);
			
			
			// hanita added this line - 29/01/2015
			$query = $this->laporankkm_m->makl_daftar_lewat_2013($month,$year);	
			 
			switch($month){
			case 01 :
			$month = "Januari";
			break;
			case 02 :
			$month = "Februari";
			break;
			case 03 :
			$month = "Mac";
			break;
			case 04 :
			$month = "April";
			break;
			case 05 :
			$month = "Mei";
			break;
			case 06 :
			$month = "Jun";
			break;
			case 07 :
			$month = "Julai";
			break;
			case 08 :
			$month = "Ogos";
			break;
			case 09 :
			$month = "September";
			break;
			case 10 :
			$month = "Oktober";
			break;
			case 11 :
			$month = "November";
			break;
			case 12 :
			$month = "Disember";
			break;
		
		} 
			// hanita added this line - 29/01/2015
		 $numofrow = $query->num_rows();
			
		// farhana 150123
		
			$thisdata['month'] = $month;
			
			
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_kkm_2_maklumat', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	///farhana 022015
	
	public function status_permohonan_by_negeriSem($year){
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['carta'] = $this->carta_permohonan_negeri_year($year);
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_permohonan_bynegeri', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}
	
	public function status_permohonan_by_negeriSem2014(){
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['carta'] = $this->carta_permohonan_negeri_2014();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/laporan_permohonan_bynegeri', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}
	
	
	public function carta_permohonan_negeri_year($year)
	{			
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		$query = $this->laporankkm_m->permohonan_bynegeri_byyear_kkm($year);
		
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik rekod tidak berdaftar mengikut negeri lahir bagi tahun '.$year;
		$xAxisName = 'Negeri';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $state_cd		= $row['state_cd'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
				
					switch($state_cd){
					case 00 :
					$state = "TIADA MAKLUMAT";
					break;
					case 01 :
					$state = "JOHOR";
					break;
					case 02 :
					$state = "KEDAH";
					break;
					case 03 :
					$state = "KELANTAN";
					break;
					case 04 :
					$state = "MELAKA";
					break;
					case 05 :
					$state = "NEGERI SEMBILAN";
					break;
					case 06 :
					$state = "PAHANG";
					break;
					case 07 :
					$state = "PULAU PINANG";
					break;
					case 8 :
					$state = "PERAK";
					break;
					case 9 :
					$state = "PERLIS";
					break;
					case 10 :
					$state = "SELANGOR";
					break;
					case 11 :
					$state = "TERENGGANU";
					break;
					case 12 :
					$state = "SABAH";
					break;
					case 13 :
					$state = "SARAWAK";
					break;
					case 14 :
					$state = "W.P.KUALA LUMPUR";
					break;
					case 15 :
					$state = "LABUAN";
					break;
					case 16 :
					$state = "PUTRAJAYA";
					break;
					
					
					}
            	  //$strLink = urlencode("javaScript:openByState(".$year .",".$state_cd.");");
				   $strLink='';
				 $strXML .= "<set name='".$state."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	public function carta_permohonan_negeri_2014()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		$query = $this->laporankkm_m->permohonan_bynegeri_2014();
		
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran mengikut negeri bagi tahun 2014';
		$xAxisName = 'Negeri';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $state_cd		= $row['state_cd'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
				
					switch($state_cd){
					case 00 :
					$state = "TIADA MAKLUMAT";
					break;
					case 01 :
					$state = "JOHOR";
					break;
					case 02 :
					$state = "KEDAH";
					break;
					case 03 :
					$state = "KELANTAN";
					break;
					case 04 :
					$state = "MELAKA";
					break;
					case 05 :
					$state = "NEGERI SEMBILAN";
					break;
					case 06 :
					$state = "PAHANG";
					break;
					case 07 :
					$state = "PULAU PINANG";
					break;
					case 8 :
					$state = "PERAK";
					break;
					case 9 :
					$state = "PERLIS";
					break;
					case 10 :
					$state = "SELANGOR";
					break;
					case 11 :
					$state = "TERENGGANU";
					break;
					case 12 :
					$state = "SABAH";
					break;
					case 13 :
					$state = "SARAWAK";
					break;
					case 14 :
					$state = "W.P.KUALA LUMPUR";
					break;
					case 15 :
					$state = "LABUAN";
					break;
					case 16 :
					$state = "PUTRAJAYA";
					break;
					
					
					}
            	  $strLink = urlencode("javaScript:openByState("."2014" .",".$state_cd.");");
				 $strXML .= "<set name='".$state."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	
	public function carta_permohonan_negeri_2015()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		$query = $this->laporankkm_m->permohonan_bynegeri_2015();
		
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran mengikut negeri bagi tahun 2015';
		$xAxisName = 'Negeri';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $state_cd		= $row['state_cd'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
				
					switch($state_cd){
					case 00 :
					$state = "TIADA MAKLUMAT";
					break;
					case 01 :
					$state = "JOHOR";
					break;
					case 02 :
					$state = "KEDAH";
					break;
					case 03 :
					$state = "KELANTAN";
					break;
					case 04 :
					$state = "MELAKA";
					break;
					case 05 :
					$state = "NEGERI SEMBILAN";
					break;
					case 06 :
					$state = "PAHANG";
					break;
					case 07 :
					$state = "PULAU PINANG";
					break;
					case 8 :
					$state = "PERAK";
					break;
					case 9 :
					$state = "PERLIS";
					break;
					case 10 :
					$state = "SELANGOR";
					break;
					case 11 :
					$state = "TERENGGANU";
					break;
					case 12 :
					$state = "SABAH";
					break;
					case 13 :
					$state = "SARAWAK";
					break;
					case 14 :
					$state = "W.P.KUALA LUMPUR";
					break;
					case 15 :
					$state = "LABUAN";
					break;
					case 16 :
					$state = "PUTRAJAYA";
					break;
					
					
					}
            	  $strLink = urlencode("javaScript:openByState("."2015" .",".$state_cd.");");
				 $strXML .= "<set name='".$state."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	
	public function statistik_masalah()
	{	
		$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		
		
		$thisdata = $this->lib_global->profileUser();
		
				
			
			$thisdata['queryProblem'] = $this->laporankkm_m->data_problem();
			$thisdata['totalProblem'] = $this->laporankkm_m->total_problem();
			
			$thisdata['queryNoKPT'] = $this->laporankkm_m->prob_no_kpt();
			$thisdata['queryDuplicate'] = $this->laporankkm_m->prob_dup_id();
			$thisdata['queryBdateValid'] = $this->laporankkm_m->prob_bdate_valid();
			
			$thisdata['totalNoKPT'] = $this->laporankkm_m->total_no_kpt();
			$thisdata['totalDuplicate'] = $this->laporankkm_m->total_dup_id();
			$thisdata['totalBdateValid'] = $this->laporankkm_m->total_bdate_valid();
			
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/statistik_prob',$thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	
	
	public function carta_kkm(){
	
		$this->load->library('session');
		$this->load->library('FusionCharts');
		$this->load->model('laporankkm_m');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		 $queryData = $this->report_m->data_masuk();
		 $numofrow = $queryData->num_rows();
			//if jumpa rekod
    		if($numofrow > 0){
			 	foreach ($queryData->result() as $row){
	  				  $date   = $row->BTL_DATE;
					
				}
			}
		$dt = $date;
		list($year, $month, $day) = preg_split('[-]', $dt);
		
		switch($month){
			case 01 :
			$month = "Januari";
			break;
			case 02 :
			$month = "Februari";
			break;
			case 03 :
			$month = "Mac";
			break;
			case 04 :
			$month = "April";
			break;
			case 05 :
			$month = "Mei";
			break;
			case 06 :
			$month = "Jun";
			break;
			case 07 :
			$month = "Julai";
			break;
			case 08 :
			$month = "Ogos";
			break;
			case 09 :
			$month = "September";
			break;
			case 10 :
			$month = "Oktober";
			break;
			case 11 :
			$month = "November";
			break;
			case 12 :
			$month = "Disember";
			break;
		
		}
		
		$formatted_date = $day.'hb '.$month.' '.$year;
		
		
		$width = '700';
		$height = '500';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Pecahan statistik rekod kelahiran yang diterima sehingga'.$formatted_date;
		$xAxisName = '';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>
			<set name='Daftar Integrasi' value='".$this->laporankkm_m->total_integrasi()->num_rows()."' color='84CE22' />
			<set name='Daftar Bukan Integrasi' value='".$this->laporankkm_m->total_not_integrasi()->num_rows()."' color='F6BD0F' />
			<set name='Belum Berdaftar' value='".$this->laporankkm_m->total_not_daftar()->num_rows()."' color='AFD8F8' />
			<set name='Rekod Bermasalah' value='".$this->laporankkm_m->total_problem()->num_rows()."' color='E93D38' />					 
		</graph>";
		
		$thisdata['chart'] = $chart->renderChartHTML(base_url().'charts/Pie3D.swf', '', $strXML, 'chartId', $width, $height);
		$thisdata['total'] = '20';
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/carta', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}


	public function detail_masalah(){
		$this->load->library('session');
		$this->load->model('laporankkm_m');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/detail_prob', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}
	
	//farhana 200115
	
	function displayrec()
	{	
		$this->load->model('laporankkm_m');
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
			
			$thisdata['query'] = $this->laporankkm_m->getuserrec($idIbu, $birAnak);
			$queryData = $this->laporankkm_m->getuserrec($idIbu, $birAnak);
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
					$thisdata['tempatDaftar'] = $this->laporankkm_m->getRegPlace($kodTptDaftar);
				}
				$thisdata['namaHos'] = $this->laporankkm_m->getnamahosp($kodHospital);
				$thisdata['negeri']  = $this->laporankkm_m->getDescription('NEG',$kodNegeri);
				$thisdata['negara']  = $this->laporankkm_m->getDescription('NGR',$kodNegara);
			}
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/display_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}else {
			$thisdata['errors'] = "Sila isi medan yang terlibat";
			
			if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_kkm/inq_view',$thisdata);
			}else{
				redirect('index/login');
			}
		}
	}


//unautorize page

	public function unautorize(){
		$this->load->library('session');
		
		$this->load->database();
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata = $this->lib_global->profileUser();
	
		$this->load->view('carian/unautor');
		

	}





}

?>