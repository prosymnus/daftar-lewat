<?php

class Report extends CI_Controller {
	public function _construct(){
		parent::_construct();
		$this->load->model('register_model');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Lib_death');
	}
	
	public function efast_view()
	{
	
		
		
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		 
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/search_mareps', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	public function ajax_test()
	{
	
		
		
	$this->load->model('laporankkm_m');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		
		
		
		
		$thisdata = $this->lib_global->profileUser();
		
				
			
			
					
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/list_status_bulan', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	public function open_again($state)
	{
	
		
		
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		 
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/search_mareps', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function status_permohonan()
	{
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		 
		$thisdata['carta'] = $this->permohonan();
		$thisdata['carta1'] = $this->permohonanByStateYear();
		//$thisdata['carta2'] = $this->peratusan_permohonan_tahunan();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_permohonan', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function status_permohonan_by_negeriSem($year){
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['carta'] = $this->carta_permohonan_negeri_year($year);
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_permohonan_bynegeri', $thisdata);
			}else{
				redirect('index/login');
			}
	
	}
	
	public function dashboard_efast()
	{
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/dashboard_efast', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	
	public function carian_efast()
	{
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/carian_view', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function fail_tracking()
	{
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('carian/filetracking_view', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	public function status_kpi()
	{
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
	    $thisdata['carta'] = $this->permohonan();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/home_kpi', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function laporan_permohonan($year)
	{
		$intYear = $year;
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		 
		$thisdata['carta'] = $this->permohonan_ikut_tahun_sem($intYear);
		$thisdata['carta1'] = $this->permohonan_ikut_tahun_sabnswak($intYear);
		$thisdata['year'] = $intYear;
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_by_year', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	public function lulus_bulanSem($year,$sid,$month)
	{
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		//load file helper
		$this->load->helper('desc_helper');
		
		$idStatus = $this->report_m->getStatusKelulusan($sid);
		$thisdata ['query'] = $this->report_m->senarai_status_bybulanSem($idStatus,$month,$year);
 		$thisdata['year'] = $year;
		$thisdata['statusname'] = $this->report_m->getStatusName($sid);
		$thisdata['month'] = $this->report_m->getMonthName($month);
		 
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_list_status', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	public function lulus_bulanNotSem($year,$sid,$month)
	{
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		//load file helper
		$this->load->helper('desc_helper');
		
		$idStatus = $this->report_m->getStatusKelulusan($sid);
		$thisdata ['query'] = $this->report_m->senarai_status_bybulanNotSem($idStatus,$month,$year);
 		$thisdata['year'] = $year;
		$thisdata['statusname'] = $this->report_m->getStatusName($sid);
		$thisdata['month'] = $this->report_m->getMonthName($month);
		 
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_list_status', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	public function stat_bykaum_tahun($year,$sid){
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		$idStatus = $this->report_m->getStatusKelulusan($sid);
		$thisdata ['query'] = $this->report_m->senarai_status_bybulanNotSem($idStatus,$month,$year);
 		$thisdata['year'] = $year;
		$thisdata['statusname'] = $this->report_m->getStatusName($sid);
	
	
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_stat', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function laporan_branch($year,$sid)
	{
		$intYear = $year;
		$idStat = $sid;
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['carta'] = $this->carta_permohonan_status_ikut_negeriSem($intYear,$idStat);
		$thisdata['year'] = $year;
		$thisdata['sid'] = $sid;
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_by_branch', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function laporan_branchNotSem($year,$sid)
	{
		$intYear = $year;
		$idStat = $sid;
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['carta'] = $this->carta_permohonan_status_ikut_negeriNotSem($intYear,$idStat);
		 $thisdata['year'] = $year;
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_by_branch', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function laporan_byNegeri($year,$state)
	{
		
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		$thisdata['carta1'] = $this->permohonan_ikut_negeri_tahun($year,$state);
		
		
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_by_state', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	public function laporan_kpi($year)
	{
		$intYear = $year;
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		
		 
		$thisdata['carta'] = $this->pencapaian_kpi_year($intYear);
		
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/view_kpi_by_year', $thisdata);
			}else{
				redirect('index/login');
			}
	}
	
	
	
	public function permohonan()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		$query = $this->report_m->permohonan_tahunan();
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Jumlah permohonan daftar lewat kelahiran mengikut tahun';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $year		= $row['AppYear'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
            	 $strLink = urlencode("javaScript:openPengurusan(" .$year. ");");
				 $strXML .= "	 <set name='".$year."' value='".$quantity."' link='" . $strLink . "' color='AFD8F8' />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	
	public function carta_permohonan_status_ikut_negeriSem($year,$sid)
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		$statusLulus = $this->report_m->getStatusKelulusan($sid);
		$query = $this->report_m->permohonan_status_ikut_negeriSem($year,$statusLulus);
		$statusName = $this->report_m->getStatusName($sid);
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran yang berstatus '.$statusName .' mengikut bulan bagi tahun '.$year;
		$xAxisName = 'Bulan';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $month		= $row['MonthNum'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
				
            	  $strLink = urlencode("javaScript:table_semenanjung(".$year .",".$sid.",".$month.");");
				 $strXML .= "<set name='".$month."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	
	
	
	
	public function carta_permohonan_status_ikut_negeriNotSem($year,$sid)
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		$statusLulus = $this->report_m->getStatusKelulusan($sid);
		$query = $this->report_m->permohonan_status_ikut_negeriNotSem($year,$statusLulus);
		$statusName = $this->report_m->getStatusName($sid); 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran yang berstatus '.$statusName .' mengikut bulan bagi tahun '.$year;
		$xAxisName = 'Bulan';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $month		= $row['MonthNum'];
				 $quantity	= $row['Quantity'];
				 //Generate the link
				
            	  $strLink = urlencode("javaScript:table_sabnsaw(".$year .",".$sid.",".$month.");");
				 $strXML .= "<set name='".$month."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
		
	}
	
	
	
	public function carta_permohonan_negeri_year($year)
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		$query = $this->report_m->permohonan_bynegeri_byyear($year);
		
		 
		
		$width = '600';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran mengikut negeri bagi tahun '.$year;
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
            	  $strLink = urlencode("javaScript:openByState(".$year .",".$state_cd.");");
				 $strXML .= "<set name='".$state."' value='".$quantity."' link='" . $strLink . "'  />";
				 
			}   
		}
		$strXML .= "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	public function permohonanByStateYear()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		
		
		 
		
		$width = '400';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik pemohonan daftar lewat kelahiran mengikut negeri dan tahun';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		
			$strCat = "<categories>";
    		//Initialize datasets
    		$strAmtDS = "<dataset seriesname='Semenanjung' color='90C9E0'>";
    		$strQtyDS = "<dataset seriesName='Sabah dan Sarawak' color='8CC419' parentYAxis='S'>";
		
		$query = $this->report_m->permohonan_tahunan_negeriSem();
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $year		= $row['AppYear'];
				 $quantity	= $row['Quantity'];
				 $strAmtDS .= "<set value='".$quantity."'  />";
				
				
				
				 
			}   
		}
		
		$querySab = $this->report_m->permohonan_tahunan_negeriNotSem();
		if ($querySab->num_rows() > 0) {
	
			foreach ($querySab->result_array() as $row1)
			{
				 $year1		= $row1['AppYearSab'];
				 $quantity1	= $row1['QuantitySab'];
				
				 $strCat .= "<category label='" . $year1 . "' />";
				
				$strQtyDS .= "<set value='" . $quantity1 . "' />";
				 
			}   
		}
		
		//Closing elements
	$strCat .= "</categories>";
	$strAmtDS .= "</dataset>";
	$strQtyDS .= "</dataset>";
	
	//Entire XML - concatenation
	$strXML = $graph.$strCat.$strAmtDS .$strQtyDS. "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/MSColumn3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
		
	}
	
	public function peratusan_permohonan_tahunan(){
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		 $width = '400';
		$height = '325';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Peratusan selesai permohonan daftar lewat kelahiran mengikut tahun';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		
			$strCat = "<categories>";
    		//Initialize datasets
    		$strAmtDS = "<dataset seriesname='Selesai' color='0081FF'>";
    		$strQtyDS = "<dataset seriesName='Dalam Proses' color='C00000' parentYAxis='S'>";
			
			$query = $this->report_m->permohonan_selesai_tahunan();
		if ($query->num_rows() > 0) {
	
			foreach ($query->result_array() as $row)
			{
				 $year		= $row['AppYear'];
				 $quantity	= $row['Quantity'];
				 $strAmtDS .= "<set value='".$quantity."'  />";
				
				
				
				 
			}   
		}
		
		$queryDlmProses = $this->report_m->permohonan_dlmproses_tahunan();
		if ($queryDlmProses->num_rows() > 0) {
	
			foreach ($queryDlmProses->result_array() as $row1)
			{
				 $year1		= $row1['AppYear'];
				 $quantity1	= $row1['Total'];
				
				 $strCat .= "<category label='" . $year1 . "' />";
				 $strQtyDS .= "<set value='" . $quantity1 . "' />";
				 
			}   
		}
		
		//Closing elements
		$strCat .= "</categories>";
		$strAmtDS .= "</dataset>";
		$strQtyDS .= "</dataset>";
		
		//Entire XML - concatenation
		$strXML = $graph.$strCat.$strAmtDS .$strQtyDS. "</graph>";
		
		$myChart = $chart->renderChartHTML(base_url().'charts/MSColumn3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
	}


	public function permohonan_ikut_tahun_sem($year){
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		 $width = '400';
		$height = '325';
		 //To store categories - also flag to check whether category is
		 //already generated
   		 $catXMLDone = false;
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran mengikut status bagi Semenanjung ('.$year.')';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		
			$strCat = "<categories>";
			  //To store datasets and sets
   			 $strDataXML = "";
			
			//get status ID
			$query = $this->report_m->list_statusID();
			if ($query->num_rows() > 0) {
				
			foreach ($query->result_array() as $row)
			{
				$sid		= $row['StatusID'];
				$strDataXML .= "<dataset seriesname='".$row['StatusName']."'>";
				
				//now get status yearly
				$queryStatusPermohonan = $this->report_m->status_permohonan_semenanjung($year,$sid);
				if ($queryStatusPermohonan->num_rows() > 0) {
	
					foreach ($queryStatusPermohonan->result_array() as $row2)
					{
						$idStatus		= $row2['SID'];
						$intYear = $row2['YearNum'];
						
						 //Append <category label=''> if not already done
                		if (!$catXMLDone) {
							$strCat .= "<category label='" . $intYear . "' />";
						}
						//Append data
						$strLink = urlencode("javaScript:openByBranch(".$intYear .",".$idStatus.");");
               			$strDataXML .= "<set value='" . $row2['Quantity'] . "' link='" . $strLink . "' />";
					}
					//Update flag that we've appended categories		
            		$catXMLDone = true;
				
				}//end queryStatusPermohonan
				
				 $strDataXML .= "</dataset>";
				
			}   
		}//end of query list_statusID()
		
		 //Close </categories>
		$strCat .= "</categories>";
		//Entire XML - concatenation
		$strXML = $graph.$strCat .$strDataXML. "</graph>";

    	$myChart = $chart->renderChartHTML(base_url().'charts/MSColumn3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
	}
	
	public function permohonan_ikut_tahun_sabnswak($year){
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		 $width = '400';
		$height = '325';
		 //To store categories - also flag to check whether category is
		 //already generated
   		 $catXMLDone = false;
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik permohonan daftar lewat kelahiran mengikut status bagi Sabah dan Sarawak ('.$year.')';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		
			$strCat = "<categories>";
			  //To store datasets and sets
   			 $strDataXML = "";
			
			//get status ID
			$query = $this->report_m->list_statusID();
			if ($query->num_rows() > 0) {
				
			foreach ($query->result_array() as $row)
			{
				$sid		= $row['StatusID'];
				$strDataXML .= "<dataset seriesname='".$row['StatusName']."'>";
				
				//now get status yearly
				$queryStatusPermohonan = $this->report_m->status_permohonan_sabnswak($year,$sid);
				if ($queryStatusPermohonan->num_rows() > 0) {
	
					foreach ($queryStatusPermohonan->result_array() as $row2)
					{
						$idStatus		= $row2['SID'];
						$intYear = $row2['YearNum'];
						 //Append <category label=''> if not already done
                		if (!$catXMLDone) {
							$strCat .= "<category label='" . $row2['YearNum'] . "' />";
						}
						//Append data
						$strLink = urlencode("javaScript:openByBranchNotSem(".$intYear .",".$idStatus.");");
               			$strDataXML .= "<set value='" . $row2['Quantity'] . "' link='" . $strLink . "' />";
					}
					//Update flag that we've appended categories		
            		$catXMLDone = true;
				
				}//end queryStatusPermohonan
				
				 $strDataXML .= "</dataset>";
				
			}   
		}//end of query list_statusID()
		
		 //Close </categories>
		$strCat .= "</categories>";
		//Entire XML - concatenation
		$strXML = $graph.$strCat .$strDataXML. "</graph>";

    	$myChart = $chart->renderChartHTML(base_url().'charts/MSColumn3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
	}
	
	
	public function permohonan_ikut_negeri_tahun($year,$state){
	
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		 
					switch($state){
					case 00 :
					$descstate = "TIADA MAKLUMAT";
					break;
					case 01 :
					$descstate = "JOHOR";
					break;
					case 02 :
					$descstate = "KEDAH";
					break;
					case 03 :
					$descstate = "KELANTAN";
					break;
					case 04 :
					$descstate = "MELAKA";
					break;
					case 05 :
					$descstate = "NEGERI SEMBILAN";
					break;
					case 06 :
					$descstate = "PAHANG";
					break;
					case 07 :
					$descstate = "PULAU PINANG";
					break;
					case 8 :
					$descstate = "PERAK";
					break;
					case 9 :
					$descstate = "PERLIS";
					break;
					case 10 :
					$descstate = "SELANGOR";
					break;
					case 11 :
					$descstate = "TERENGGANU";
					break;
					case 12 :
					$descstate = "SABAH";
					break;
					case 13 :
					$descstate = "SARAWAK";
					break;
					case 14 :
					$descstate = "W.P.KUALA LUMPUR";
					break;
					case 15 :
					$descstate = "LABUAN";
					break;
					case 16 :
					$descstate = "PUTRAJAYA";
					break;
					
					
					}
		 
		 $width = '400';
		$height = '325';
		 //To store categories - also flag to check whether category is
		 //already generated
   		 $catXMLDone = false;
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'STATISTIK PERMOHONAN DAFTAR KELAHIRAN LEWAT MENGIKUT STATUS BAGI NEGERI '.$descstate.' UNTUK TAHUN '.$year.'';
		$xAxisName = 'Status';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>";
		
			$strCat = "<categories>";
			  //To store datasets and sets
   			 $strDataXML = "";
			
			//get status ID
			$query = $this->report_m->list_statusID();
			if ($query->num_rows() > 0) {
				
			foreach ($query->result_array() as $row)
			{
				$sid		= $row['StatusID'];
				$strDataXML .= "<dataset seriesname='".$row['StatusName']."'>";
				
				//now get status yearly
				$queryStatusPermohonan = $this->report_m->permohonan_ikutnegeri_year($state,$year,$sid);
				if ($queryStatusPermohonan->num_rows() > 0) {
	
					foreach ($queryStatusPermohonan->result_array() as $row2)
					{
						$idStatus		= $row2['SID'];
						$intYear = $row2['YearNum'];
						
						 //Append <category label=''> if not already done
                		if (!$catXMLDone) {
							$strCat .= "<category label='" . $intYear . "' />";
						}
						//Append data
						$strLink = '';
               			$strDataXML .= "<set value='" . $row2['Quantity'] . "' link='" . $strLink . "' />";
					}
					//Update flag that we've appended categories		
            		$catXMLDone = true;
				
				}//end queryStatusPermohonan
				
				 $strDataXML .= "</dataset>";
				
			}   
		}//end of query list_statusID()
		
		 //Close </categories>
		$strCat .= "</categories>";
		//Entire XML - concatenation
		$strXML = $graph.$strCat .$strDataXML. "</graph>";

    	$myChart = $chart->renderChartHTML(base_url().'charts/MSColumn3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
	}
	
	
	
	public function pencapaian_kpi_year($year){
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		 
		$width = '450';
		$height = '325';
		
		$color[0] = "028FE1";
		$color[1] = "FFAD1D";
    	$count = 0;
		$strData = "";
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Pencapaian KPI untuk permohonan daftar lewat kelahiran bagi tahun ('.$year.')';
		$xAxisName = 'Tahun';
		$yAxisName = 'Jumlah';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$graph = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='0' showLabels='0' showLegend='1' subcaption='(". $strUpdate .")'>";
	
		$queryX = $this->report_m->total_takcapai_kpi_year($year);
		if ($queryX->num_rows() > 0) {
				
			foreach ($queryX->result_array() as $row)
			{
				$val = $row['Val'];
			}
			
		}//end first Q
		
		$queryY = $this->report_m->total_capai_kpi_year($year);
		if ($queryY->num_rows() > 0) {
				$slicePies = 4;
				if ($slicePies && ($count<5))
                $slicedOut="0";
            	else
                $slicedOut="1";
			foreach ($queryY->result_array() as $ors)
			{
				
				if($count == 1){
				$ors['Total'] = $ors['Total'] + $val;
				}
            	$strData .= "<set label='" . $ors['EntName'] . "' value='" . $ors['Total'] . "' isSliced='" . $slicedOut . "' color='".$color[$count]."' />";
			 	$count++;
			}
			
		}//end 2nd Q
		
		$strXML = $graph.$strData. "</graph>";

    	$myChart = $chart->renderChartHTML(base_url().'charts/Pie3D.swf', '', $strXML, 'chartId', $width, $height);
		
		return $myChart;
	}
	
	
	
	public function total_reg_chart()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		
		$width = '700';
		$height = '500';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik rekod kelahiran KKM yang telah berdaftar di JPN menggunakan MyID';
		$xAxisName = '';
		$yAxisName = 'Bilangan rekod';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>
			 <set name='Rekod Berdaftar' value='".$this->report_m->total_register()->num_rows()."' color='AFD8F8' />
			 <set name='Belum Berdaftar' value='".$this->report_m->total_notReg()->num_rows()."' color='F6BD0F' />
		</graph>";
		
		$thisdata['chart'] = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		$thisdata['total'] = $this->report_m->total_myID()->num_rows();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/carta', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	public function total_reg_time()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		
		$width = '700';
		$height = '500';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik rekod kelahiran yang berdaftar ikut tempoh';
		$xAxisName = '';
		$yAxisName = 'Bilangan rekod';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>
			 <set name='Dalam 15 hari' value='".$this->report_m->total_15days('1')->num_rows()."' color='AFD8F8' />
			 <set name='15 sehingga 42 hari' value='".$this->report_m->total_42days('1')->num_rows()."' color='F6BD0F' />
			 <set name='Melebihi 42 hari' value='".$this->report_m->total_more42days('1')->num_rows()."' color='84CE22' />
		</graph>";
		
		$thisdata['chart'] = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		$thisdata['total'] = $this->report_m->total_register()->num_rows();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/carta', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	public function total_notReg_time()
	{			
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$thisdata = $this->lib_global->profileUser();
		
		 $strUpdate = $this->lib_global->subcaption();
		
		$width = '700';
		$height = '500';
		
		$chart = new FusionCharts($chartType, $width, $height);
		
		$caption = 'Statistik rekod kelahiran yang belum berdaftar ikut tempoh';
		$xAxisName = '';
		$yAxisName = 'Bilangan rekod';
		$decimalPrecision = '0';
		$formatNumberScale = '0';
		$showNames = '1';
		
		$strXML = "
		<graph caption='".$caption."'  xAxisName='".$xAxisName."' xAxisName='".$yAxisName."' formatNumberScale='0' showValues='1' plotBorderColor='FFFFFF' numberPrefix='' isSmartLineSlanted='0' showValues='1' showLabels='1' showLegend='1' subcaption='(". $strUpdate .")'>
			 <set name='Dalam 15 hari' value='".$this->report_m->total_15days('2,3')->num_rows()."' color='AFD8F8' />
			 <set name='15 sehingga 42 hari' value='".$this->report_m->total_42days('2,3')->num_rows()."' color='F6BD0F' />
			 <set name='Melebihi 42 hari' value='".$this->report_m->total_more42days('2,3')->num_rows()."' color='84CE22' />
		</graph>";
		
		$thisdata['chart'] = $chart->renderChartHTML(base_url().'charts/Column3D.swf', '', $strXML, 'chartId', $width, $height);
		$thisdata['total'] = $this->report_m->total_notReg()->num_rows();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
				$this->load->view('report_lewat/carta', $thisdata);
			}else{
				redirect('index/login');
			}
		
	}
	
	public function track_log(){
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
				
		$thisdata['strUpdate'] = $this->lib_global->subcaption();
		
		$thisdata= $this->report_m->paging_track();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('report_lewat/track_view',$thisdata);
		}else{
			redirect('index/login');
		}
			
		
	}
	
	public function list_not_reg(){
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
		$this->load->library('form_validation');
				
		$thisdata['strUpdate'] = $this->lib_global->subcaption();
       	$thisdata  = $this->report_m->paging_not_reg();

		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('report_lewat/list_notReg_view',$thisdata);
		}else{
			redirect('index/login');
		}
			
		
	}
	
	public function cetak(){
		
		
		$this->load->library('FusionCharts');
		$this->load->model('report_m');
		$this->load->library('session');
		$this->load->library('Lib_global');
				
		$thisdata['strUpdate'] = $this->lib_global->subcaption();
				
		
		$thisdata= $this->report_m->print_not_reg();
		
		if(isset($thisdata['loginsession']) && $thisdata['loginsession']){
			$this->load->view('report_lewat/print_view',$thisdata);
		}else{
			redirect('index/login');
		}
			
		
	}


}

?>