<?php
class Inq_model extends CI_Model {
	
	public function __construct(){
         parent::__construct();
        $this->load->database();
    }
	

	
	public function getCarianDetail($keysearch,$keyid){ 
		switch ($keysearch) {
			case 1: $sql = "select * from records_efast where applicationno = '$keyid';"; break;
			case 2: $sql = "select * from records_efast where nokppenganjur1='$keyid' or nokppenganjur2='$keyid';"; break;
			case 3: $sql = "select * from records_efast where ibu_id = '$keyid';"; break;	
			case 4: $sql = "select * from records_efast where bapa_id = '$keyid';"; break;	
			//case 5: $sql = "select * from records_efast where no_file LIKE '%$keyid%';"; break;
			case 5: $sql = "select * from records_efast where nofailrujukanhq LIKE '%$keyid%' or nofailrujukanibunegeri LIKE '%$keyid%' or nofailrujukancawangan LIKE '%$keyid%' or no_file LIKE'%$keyid%';"; break;		
			case 6: $sql = "select * from records_efast where namakanak LIKE '%$keyid%' or namabapa LIKE '%$keyid%' or namapenganjur1 LIKE '%$keyid%' or namaibu LIKE '%$keyid%';";  break;
			//echo  $sql; break;			
			case 7: $sql = "select * from records_efast where duplicateappno = '$keyid';"; break;	
			case 8: $sql = "select * from records_efast where nodaftarlahir = '$keyid';"; break;
			case 9: $sql = "select * from records_efast where chd_hsc_no = '$keyid';"; break;			
		}

		$query  = $this->db->query($sql);      
		return $query;
	}
	
	
	public function getuserdata()
	{
		$sql = "select * from TBWL_WEB_LAHIR where BWL_PROC_IND = 1 and BWL_FLAG_WEB = 1";
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
	
	
	
	
	//**********************************profile_pengguna**************************//
	
	
	function profile_pengguna($oper_id){
	
	
	 $sql = "select * from cuid_lahir where oper_id ='$oper_id';";
	 return $this->db->query($sql);
			
	}
	
	function get_user_admin(){
	
	$sql = "select * from cuid_lahir ";

	return $this->db->query($sql);
			
	}
	//------------------------///------------- Desc by code --------///////////---------------///////////
	function getCityDesc($bandar_penganjur)
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>`CITY`,'ENT_CODE' =>$bandar_penganjur));	
		$numofrow = $query->num_rows();
			//if jumpa rekod
    	
			foreach ($query->result() as $row){
			$desc = $row->ENT_DESC1;
		} 
		
		return $desc;
		
	}
	
	
	/*function getCityDesc($bandar_penganjur)//bandar penganjur
	{
		$query = $this->db->get_where('kod_bandar' , array('CITY_CODE' =>$bandar_penganjur));	
		$numofrow = $query->num_rows();
		
    	foreach ($query->result() as $row){
				      $desc = $row->CITY_DESC;
		} 
		return $desc;
		}
	*/
	
	
	function getRegPlace($kod)//cawangan
	{
		$query = $this->db->get_where('tbwl_branch_cd' , array('bwl_branch_cd' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->bwl_branch_desc;
			  
		}
		return $desc;
	}
	function getRegPlace2($kod)//cawangan
	{
		$query = $this->db->get_where('tbwl_branch_cd' , array('bwl_branch_cd' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->bwl_branch_desc;
			  
		}
		return $desc;
	}
	
	
	function getRelCd($kod)
	{	
	
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>REL,'ENT_CODE' =>$kod));	
		
		

	return $query;
	}	



//din edit 09102018
	function getAppStat($kod)
	{
		$query = $this->db->get_where('dl_status' , array('StatusID' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->StatusName;
			  
		}
		return $desc;
	}
	


function getpengeluaridibu($kod)//kod id ibu
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'NGR','ENT_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}

function getpengeluaridbapa($kod)//kod id bapa
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'NGR','ENT_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}

function getpengeluaridpemaklum($kod) //kod id pemaklum
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'NGR','ENT_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}

function getpengeluarjenisibu($kod) //kod jenis id ibu
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'DCTY','ENT_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}

	function getpengeluarjenisbapa($kodid) //kod jenis id bapa
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'DCTY','ENT_CODE' =>$kodid));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}


function getpengeluarjenispemaklum($kod) //kod jenis id pemaklum
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>'DCTY','ENT_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
		}
		return $desc;
	}


//---------///--------------////////------  end  ----------------///////////------------/////////// 
	
	function getDescription($id,$kod)
	{
		$query = $this->db->get_where('TBWL_ENTITY' , array('ENT_ID' =>$id,'ENT_CODE' =>$kod));	
		$numofrow = $query->num_rows();
			//if jumpa rekod
    	if($numofrow > 0){
			foreach ($query->result() as $row){
				      $desc = $row->ENT_DESC1;
			  
			}
			
		} else { $desc = "Tiada"; }
		
		return $desc;
		
	}
	
	
	
	//---------------///////--------------///////////-------     carian efast     -------\\\\\\\\\\\--------------\\\\\\\---------------\\
	
	function get_duplicate_all($apl_no){
	
	$sql = "select * from records_efast  where duplicateappno ='$apl_no';";
	return $this->db->query($sql);
			
	}
	
	function get_duplicate_lebih2(){
	
	$sql = "select applicationno,duplikasi from records_efast where duplikasi >= 2;";

	return $this->db->query($sql);
			
	}
	
	//carian berdasarkan nama ibu,bapa,pemaklum,anak//
	function get_name($namaparent){ 
	
	$sql = "select * from records_efast where namakanak='$namaparent' or namabapa='$namaparent' or namapenganjur1='$namaparent' or namaibu='$namaparent';";
	return $this->db->query($sql);
	}
	
	
	function get_carian_duplicate($carian_duplicate){ 

		$query = $this->db->get_where('records_efast', array('duplicateappno' => $carian_duplicate));	
		return $query; 
	}
	
	
	function get_fail_Cawangan($fail_Cawangan){ 

		$query = $this->db->get_where('records_efast', array('no_file' => $fail_Cawangan));	
		return $query; 
	}
	
	function get_Kod_Cawangan($Kod_Cawangan){ 
		
		$query = $this->db->get_where('records_efast', array('kodcawangan' => $Kod_Cawangan));	
		return $query; 
	}
	
	
	function get_Status_Kelulusan($Status_Kelulusan){ 
		
		$query = $this->db->get_where('records_efast', array('statuskelulusan' => $Status_Kelulusan));	
		return $query; 
	}
	
	
	function get_no_kp_penganjur($no_kp_penganjur){
	
	$sql = "select * from records_efast where nokppenganjur1='$no_kp_penganjur' or nokppenganjur2='$no_kp_penganjur';";
	return $this->db->query($sql);
	}
	
	function get_apl_no($apl_no){ 
		
		$query = $this->db->get_where('records_efast', array('applicationno' => $apl_no));	
		return $query; 
	}
	
	function get_senarai_fail($apl_no){ 
		
		$query = $this->db->get_where('records_efast', array('duplicateappno' => $apl_no));	
		return $query; 
	}
	
	function get_senarai_catatan($apl_no){ 

		$query = $this->db->get_where('notes', array('application_no' => $apl_no));	
		return $query; 
	}
	
	
	//kira duplicate *ana*
	function updDuplA($duplicateappno) {

		
		
		$string_query = "UPDATE records_efast SET duplikasi = LAST_INSERT_ID(duplikasi+1) WHERE applicationno='$duplicateappno' "; 
		$this->db->query($string_query);   
		
		return ($this->db->affected_rows()); 
		
	}
	
	
	//kira duplicate *ana*
	function updDuplB($apl_no,$duplicateappno) {

		
		 $string_query = "UPDATE records_efast SET duplikasi = 1,  duplicateappno='$duplicateappno' WHERE applicationno='$apl_no'" ; 
		//echo $string_query;
		$this->db->query($string_query);   
		
		return ($this->db->affected_rows()); 
		
	}
		
	function notes($apl_no){
		$sql = "select * from notes ";
		return $this->db->query($sql);
	}
	
	//farhana
	function getuserrec($id, $bir){ 
		
		//$sql= "select * from TBWL_WEB_LAHIR where BWL_MO_HSC_NO = '$id' and BWL_CHD_BIR_DT = '$bir'";
		$query = $this->db->get_where('TBWL_WEB_LAHIR', array('BWL_MO_HSC_NO' => $id,'BWL_CHD_BIR_DT'=>$bir));	
		return $query; 
	}
	
	// tukar kod ke description  din 10/10/2018   ===============================
		function getlulus($kod)//kod kelulusan
	{
		$query = $this->db->get_where('dl_status' , array('StatusID' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->StatusName;
			  
		}
		return $desc;
	}


function getagama($kod)//kod agama
	{
		$query = $this->db->get_where('dl_rel' , array('Kod' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->Keterangan;
			  
		}
		return $desc;
	}

function getketurunan($kod)//kod keturunan
	{
		$query = $this->db->get_where('dl_keturunan' , array('Kod' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->Keterangan;
			  
		}
		return $desc;
	}

function getbandar($kod)//kod bandar penganjur
	{
		$query = $this->db->get_where('kod_bandar' , array('CITY_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->CITY_DESC;
			  
		}
		return $desc;
	}
function getbandar2($kod)//kod bandar pemaklum
	{
		$query = $this->db->get_where('kod_bandar' , array('CITY_CODE' =>$kod));	
		
		foreach ($query->result() as $row){
				      $desc = $row->CITY_DESC;
			  
		}
		return $desc;
	}


	//==============================================================	
	
	

/* --------------------------------------------------- print pdf ---------------------------------------------------------*/
	



	function print_plkb($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

function print_maklumat($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

function print_kulit($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

	function print_minit($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

function print_lampiranA($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

	function print_lampiranB1($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

function print_minit_plkb($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

function print_lampiranC($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}

	function print_lampiranD($apl_no){
	
	
	 $sql = "select * from records_efast where applicationno ='$apl_no';";
	 return $this->db->query($sql);
			
	}


	/* --------------------------------------------------- end print  ---------------------------------------------------------*/
	

	/****************pendaftaran rekod  **************************/


function form_insert($data){
// Inserting in Table(rekod_efast)
$this->db->insert('records_efast', $data);
}



function batch_update($data){
// Inserting in Table(rekod_efast)
$this->db->insert('data_anak', $data);
}








	/****************kemaskini rekod **************************/

function form_updateeee($data){
// Inserting in Table(rekod_efast)
$this->db->update('records_efast_development', $data);
}

/*/ Update record by aplno
function form_update($data, $applicationno){
       
   

$this->db->where('applicationno', $array['applicationno']);
$this->db->update('records_efast, $data); 
 }*/


	/*****************test*************************/



	



	
	
	
	
}

?>