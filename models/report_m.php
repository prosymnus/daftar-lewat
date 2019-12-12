<?php
class Report_m extends CI_Model {
	
	public function __construct(){
        parent::__construct();
        $this->load->database();
	
    }
	
	public function get_all_records(){
		$sql = "select * from records_efast";
		return $this->db->query($sql);
	
	}
	
	public function senarai_status_bybulanSem($sid,$month,$year){
		$sql = "select * from records_efast where statuskelulusan='$sid' and MONTH(applicationdate)='$month' and YEAR(applicationdate) ='$year' and substring( kodbandar_penganjur,1,2) NOT IN ('12','13','15')";
		return $this->db->query($sql);
	
	}
	
	public function senarai_status_bybulanNotSem($sid,$month,$year){
		$sql = "select * from records_efast where statuskelulusan='$sid' and MONTH(applicationdate)='$month' and YEAR(applicationdate) ='$year' and substring( kodbandar_penganjur,1,2) IN ('12','13','15') ORDER BY applicationno";
		return $this->db->query($sql);
	
	}
	
	public function permohonan_tahunan(){
		$sql = "SELECT Year(o.applicationdate) As AppYear, COUNT(o.applicationno) as Quantity FROM records_efast as o GROUP BY Year(o.applicationdate) ORDER BY Year(o.applicationdate)";
		return $this->db->query($sql);
	
	}
	
	public function permohonan_tahunan_negeriSem(){
		$sql = "SELECT Year(o.applicationdate) As AppYear, COUNT(o.applicationno) as Quantity FROM records_efast as o 
WHERE substring( o.kodbandar_penganjur,1,2) NOT IN ('12','13','15')
 GROUP BY Year(o.applicationdate) ORDER BY Year(o.applicationdate)";
		return $this->db->query($sql);
	}
	
	public function permohonan_tahunan_negeriNotSem(){
		$sql = "SELECT Year(o.applicationdate) As AppYearSab, COUNT(o.applicationno) as QuantitySab FROM records_efast as o 
WHERE substring( o.kodbandar_penganjur,1,2) IN ('12','13','15')
 GROUP BY Year(o.applicationdate) ORDER BY Year(o.applicationdate)";
		return $this->db->query($sql);
	}
	
	public function permohonan_status_ikut_negeriSem($year,$sid){
		$sql = "SELECT YEAR(applicationdate) as Years, 
       MONTH(applicationdate) as MonthNum, 
      COUNT(applicationno) as Quantity
FROM records_efast
where statuskelulusan='$sid'
and substring( kodbandar_penganjur,1,2) NOT IN ('12','13','15')
and YEAR(applicationdate) = '$year'
GROUP BY YEAR(applicationdate), 
         MONTH(applicationdate)
         ";
		return $this->db->query($sql);
	
	}
	public function permohonan_status_ikut_negeriNotSem($year,$sid){
		$sql = "SELECT YEAR(applicationdate) as Years, 
       MONTH(applicationdate) as MonthNum, 
      COUNT(applicationno) as Quantity
FROM records_efast
where statuskelulusan='$sid'
and substring( kodbandar_penganjur,1,2) IN ('12','13','15')
and YEAR(applicationdate) = '$year'
GROUP BY YEAR(applicationdate), 
         MONTH(applicationdate)";
		return $this->db->query($sql);
	
	}
	
	public function permohonan_bynegeri_byyear($year){
	
		$sql = "SELECT substring( o.applicationno,1,2) as state_cd ,COUNT(o.applicationno) as Quantity FROM records_efast as o WHERE Year(o.applicationdate) = '$year' 
 GROUP BY substring( o.applicationno,1,2) ";
 		return $this->db->query($sql);
	
	}
	
	public function permohonan_selesai_tahunan(){
	$sql = "SELECT Year(o.applicationdate) As AppYear, COUNT(o.applicationno) as Quantity FROM records_efast as o 
WHERE o.tarikhlulus != '0001-01-01' GROUP BY Year(o.applicationdate)";
		return $this->db->query($sql);
	
	}
	
	public function permohonan_dlmproses_tahunan(){
	$sql = "SELECT Year(o.applicationdate) As AppYear, COUNT(o.applicationno) as Quantity FROM records_efast as o 
WHERE o.tarikhlulus = '0001-01-01' GROUP BY Year(o.applicationdate)";
		return $this->db->query($sql);
	
	}
	public function list_statusID(){
		$sql = "Select StatusID,StatusName from dl_status GROUP BY StatusID,StatusName ORDER BY SID ASC";
		return $this->db->query($sql);
	
	}
	
	public function status_permohonan_semenanjung($intYear,$sid){
		
		/*$sql = "SELECT  Year(o.PROC_DT) as YearNum,d.StatusName, g.EntityID, g.EntityName, COUNT(o.HSC_NO) as Quantity FROM dl_entity as g,  dl_lahir as o, dl_status as d WHERE year(o.PROC_DT)=$intYear and o.NEG_RPT NOT IN(12,13,15) and o.APRV_RESULT = '$sid' and g.EntityID= o.KPI_Stat and o.APRV_RESULT = d.StatusID  GROUP BY o.APRV_RESULT order by Month(o.PROC_DT)";*/
		$sql="select Year(o.applicationdate) as YearNum,COUNT(o.applicationno) as Quantity, d.StatusName,d.SID from records_efast as o, dl_status as d  WHERE year(o.applicationdate)= '$intYear' 
and o.statuskelulusan='$sid' and substring(o.kodbandar_penganjur,1,2) NOT IN(12,13,15) and o.statuskelulusan = d.StatusID   
GROUP BY o.statuskelulusan order by Month(o.applicationdate)";
		return $this->db->query($sql);
	
	}
	
 	public function permohonan_ikutnegeri_year($state,$year,$sid){
		$state = intval($state);
	
			if ($state < 10) {
			$state='0'.$state;
		}
	$sql="select Year(o.applicationdate) as YearNum,COUNT(o.applicationno) as Quantity, d.StatusName,d.SID from records_efast as o, dl_status as d  WHERE year(o.applicationdate)= '$year' 
and o.statuskelulusan='$sid' and substring(o.kodbandar_penganjur,1,2)='$state' and o.statuskelulusan = d.StatusID   
GROUP BY o.statuskelulusan";
	return $this->db->query($sql);
	}
	
	
	
	
	public function status_permohonan_sabnswak($intYear,$sid){
		
		/*$sql = "SELECT  Year(o.PROC_DT) as YearNum,d.StatusName, g.EntityID, g.EntityName, COUNT(o.HSC_NO) as Quantity FROM dl_entity as g,  dl_lahir as o, dl_status as d WHERE year(o.PROC_DT)=$intYear and o.NEG_RPT IN(12,13,15) and o.APRV_RESULT = '$sid' and g.EntityID= o.KPI_Stat and o.APRV_RESULT = d.StatusID  GROUP BY o.APRV_RESULT order by Month(o.PROC_DT)";*/
		
		$sql="select Year(o.applicationdate) as YearNum,COUNT(o.applicationno) as Quantity, d.StatusName,d.SID from records_efast as o, dl_status as d  WHERE year(o.applicationdate)= '$intYear' 
and o.statuskelulusan='$sid' and substring(o.kodbandar_penganjur,1,2) IN(12,13,15) and o.statuskelulusan = d.StatusID   
GROUP BY o.statuskelulusan order by Month(o.applicationdate)";
		return $this->db->query($sql);
	
	}
	
	public function total_takcapai_kpi_year($intYear)
	{
		
		$sql = "SELECT COUNT(o.HSC_NO) as Val FROM dl_lahir as o,dl_entity as d WHERE APRV_DT = '0001-01-01' and Year(o.PROC_DT)=$intYear and o.NEG_RPT NOT IN('12','13','15') and o.KPI_STAT = d.EntityID group by o.KPI_STAT";
		return $this->db->query($sql);
	
	}
	
	public function total_capai_kpi_year($intYear)
	{
		
		$sql = "SELECT Year(o.PROC_DT) As AppYear,o.KPI_STAT as EntId,d.EntityName as EntName, COUNT(o.HSC_NO) as Total FROM dl_lahir as o,dl_entity as d WHERE APRV_DT != '0001-01-01' and Year(o.PROC_DT)=$intYear and o.NEG_RPT NOT IN('12','13','15') and o.KPI_STAT = d.EntityID group by o.KPI_STAT";
		return $this->db->query($sql);
	
	}
	
	
	
	
	
	public function data_masuk(){
		$sql = "select BTL_DATE from tbtl_track_log order by BTL_ID DESC limit 1;";
		return $this->db->query($sql);
	}
	
	public function track_log()
	{
		$sql = "select * from tbtl_track_log order by BTL_ID DESC";
		return $this->db->query($sql);
	}
	
	
	
	public function profile_pengguna(){
		$this->load->library('session');
		$alldata['loginsession'] = $this->session->userdata('loginsession');
		
		if(isset($alldata['loginsession']) && $alldata['loginsession']){
			$alldata['userid'] = $this->session->userdata('userid');
			$alldata['oper_id'] = $this->session->userdata('operid');
			$alldata['oper_hsc_no'] = $this->session->userdata('hscno');
			$alldata['oper_bc'] = $this->session->userdata('branchcode');
		}
		
		return $alldata;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function profileUser(){
		$this->load->library('session');
		$alldata['loginsession'] = $this->session->userdata('loginsession');
		
		if(isset($alldata['loginsession']) && $alldata['loginsession']){
			$alldata['userid'] = $this->session->userdata('userid');
			$alldata['oper_id'] = $this->session->userdata('operid');
			$alldata['oper_hsc_no'] = $this->session->userdata('hscno');
			$alldata['oper_bc'] = $this->session->userdata('branchcode');
		}
		
		return $alldata;
	}
	function paging_track(){  
		$this->load->library('pagination');
		
		
		$data = $this->profileUser();
		
        $string_query       = "select * from tbtl_track_log order by BTL_ID desc";  
        $query          = $this->db->query($string_query);              
        $config['base_url']     = base_url().'index.php/report/track_log/';  
        $config['total_rows']   = $query->num_rows();  
        $config['per_page']     = '30';  
        $num            = $config['per_page'];  
        $offset         = $this->uri->segment(3);  
        $offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
          
        if(empty($offset))  
        {  
            $offset=0;  
        }  
          
        $this->pagination->initialize($config);         
          
        $data['query']      = $this->db->query($string_query." limit $offset,$num");    
        $data['base']       = $this->config->item('base_url');  
      
        return $data;  
    }  
	
	function paging_not_reg(){  
		$this->load->library('pagination');
		
		
		$data = $this->profileUser();
		
        $string_query       = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >41 AND BWL_FLAG_WEB IN (2,3) order by BWL_CHD_BIR_DT";  
        $query          = $this->db->query($string_query);      
		
        $config['base_url']     = base_url().'index.php/report/list_not_reg/';  
        $config['total_rows']   = $query->num_rows();  
        $config['per_page']     = '100';  
        $num            = $config['per_page'];  
        $offset         = $this->uri->segment(3);  
        $offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
          
        if(empty($offset))  
        {  
            $offset=0;  
        }  
          
        $this->pagination->initialize($config);         
          
        $data['query']      = $this->db->query($string_query." limit $offset,$num");    
        $data['base']       = $this->config->item('base_url');  
      
        return $data;  
    }  
   
    function print_not_reg(){  
		$this->load->library('pagination');
		
		
		$data = $this->profileUser();
		
        $string_query       = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >41 AND BWL_FLAG_WEB IN (2,3) order by BWL_CHD_BIR_DT";  
        $data['query']        = $this->db->query($string_query);              
       
      
        return $data; 
    }  
	
   	function getdesc()
  	{
	$string_query   = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >41 AND BWL_FLAG_WEB IN (2,3) order by BWL_CHD_BIR_DT";  
    $query          = $this->db->query($string_query);      
		//rozana edited
		
	$numofrow = $query->num_rows();
	if($numofrow > 0){
	 	foreach ($query->result() as $row){
    			  $kodHospital   = $row->BWL_HOSP_CD_KKM;
 	              $query2 = $this->db->get_where('TBWL_KODHOSPITAL' , array('kkm_hosp_id' =>$kodHospital ));
				  
				      foreach ($query2->result() as $row){
				              $namaHospital = $row->kkm_hosp_name;
							  $thisdata['namaHos'] = $row->kkm_hosp_name;
						//	  echo $namaHospital;
					  }
		        }
	    }return $query2;
    }


/***************************LAPORAN KKM LAMA************************************/

public function total_15days($strData)
	{
	$this->db_kkm->db_select();
		$sql = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH < 15 AND BWL_FLAG_WEB IN ($strData)";
		return $this->db->query($sql);
	}
	
	public function total_42days($strData)
	{
	$this->db_kkm->db_select();
		$sql = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >14 AND BWL_TEMPOH < 43 AND BWL_FLAG_WEB IN ($strData)";
		return $this->db->query($sql);
	}
	public function total_more42days($strData)
	{
		$sql = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >42 AND BWL_FLAG_WEB IN ($strData)";
		return $this->db->query($sql);
	}

	function getnamahosp($kod)
	{
		$query = $this->db->get_where('TBWL_KODHOSPITAL' , array('kkm_hosp_id' =>$kod));	
		
		foreach ($query->result() as $row){
		         $namaHospital = $row->kkm_hosp_name;
		}

	return $namaHospital;
	}
	
	function getStatusKelulusan($sid)
	{
		$query = $this->db->get_where('dl_status' , array('SID' =>$sid));	
		
		foreach ($query->result() as $row){
		         $statusID = $row->StatusID;
		}

	return $statusID;
	}
	
	
	function getStatusName($sid)
	{
		$query = $this->db->get_where('dl_status' , array('SID' =>$sid));	
		
		foreach ($query->result() as $row){
		         $statusname = $row->StatusName;
		}

	return $statusname;
	}
	
	function getMonthName($month)
	{
		
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
	return $month;
	}
	
	function getrecord()
	{
	    $string_query   = "select * from TBWL_WEB_LAHIR where BWL_TEMPOH >41 AND BWL_FLAG_WEB IN (2,3) order by BWL_CHD_BIR_DT";  
        return $string_query;
	}
	

}




?>
