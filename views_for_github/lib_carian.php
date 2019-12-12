<?php

error_reporting(E_ALL ^ E_DEPRECATED); // coding untuk hilangkan error use mysqli or pdo instead -DIN-

function opendatabase () {
$host = 'localhost';
$sqluser ='root';
$pass = '';
	//Attempt to open a connection to MySQL.
	try {
		if ($db = mysql_connect ($host, $sqluser, $pass)){
			try {
				if (!mysql_select_db ('db_kpi', $db)){
					throw new exception ("Maaf database tidak boleh dibuka");
				}
				else
					return $db;
				} catch (exception $e) {
					echo $e->getmessage();
				}
			
		} else {
			throw new exception ("Maaf, gagal akses database mysql.");
		}
	} catch (exception $e) {
	  echo $e->getmessage ();
	}
}

//A function to close the connection to MySQL.
function closedatabase ($db){
  //When you finish up, you have to close the connection.
  mysql_close ($db);
}

function get_country_passport($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select name='$name' class='input-country'>
	 			<option value='0'>Negara Pengeluar</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_entity_combo($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_entity_pemaklum($entity_id,$field_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	/*if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";*/

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px' name='$name' id='$field_id' class='input-select'  onchange='open_field()'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_entity_negara_pemaklum($entity_id,$field_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' id='$field_id' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}


// RADIO BUTTON RELATED **************************************************************************************************
function get_entity_radio($entity_id, $name, $code){

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id'";
	$rs = mysql_query($sql);
	$str = "";
	$disabled = "";

	while ($row=mysql_fetch_assoc($rs)) {
		if($code == $row["ENT_CODE"])
			$s = "checked='checked'";
		else
			$s = "";
			
		$str.="<input type='radio' name='".$name."' value=' ".$row["ENT_CODE"]."' $s disabled = 'disabled' >"." ".$row["ENT_DESC1"]."       ";
	}
	//$str.="</select>";
	
	return $str;
}



// RADIO BUTTON RELATED **************************************************************************************************
function get_entity_radio_choose($entity_id, $name, $code){

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id'";
	$rs = mysql_query($sql);
	$str = "";
	$disabled = "";

	while ($row=mysql_fetch_assoc($rs)) {
		if($code == $row["ENT_CODE"])
			$s = "checked='checked'";
		else
			$s = "";
			
		$str.="<input type='radio' name='".$name."' value=' ".$row["ENT_CODE"]."' $s >"." ".$row["ENT_DESC1"]."       ";
	}
	//$str.="</select>";
	
	return $str;
}

// CHECK BOX RELATED **************************************************************************************************
function get_entity_checkbox($entity_id, $Access, $verHon, $myrow = 4) { // Checkbox

	$db = open_database();
	$sql = "SELECT * FROM ENTITY WHERE ENTITY_ID = '$entity_id'";
	$rs = odbc_exec($db,$sql);
	$str = "";
	$nInc = 1;
	$chk = "";
	$strChk = "";


	$str = "<table border='0' cellspacing='0' cellpadding='0'>";
	
		while ($row=odbc_fetch_array($rs)) {
			$str.= "<td><input type='checkbox' name='chkboxes' value="."'".trim($row["CODE"])."'";
			
			$bFlag = (substr_count($Access, trim($row["CODE"]."|")) > 0);
			
			if ($bFlag){
				$str.= " checked = 'checked'";
			}

			$str.=  " >".trim($row["DESC1"]."</td>");
				if (strcmp($nInc,$myrow) == 0){
					$str = $str. "</tr>";
					$nInc = 0;
				}

				$nInc++;
		  }
		  $str.= "</table>";
          $str.= "<input type='hidden' name='chkHidden' id='chkHidden' value = '' />";

	return $str;
}

function extract_ChkBox($entity_id, $wholestr) { // Checkbox
	$db = open_database();
	$sql = "SELECT * FROM ENTITY WHERE ENTITY_ID = '$entity_id'";
	$rs = odbc_exec($db,$sql);
	$str = "";
	$nInc = 1;
  
	$code  = explode("|", $wholestr);
	$numRec = substr_count($wholestr,"|");
	$str.=" <br />";
	 while ($row=odbc_fetch_array($rs)) {
			for ($n=0; $n < $numRec; $n++){
				if (trim($code[$n]) == trim($row["CODE"])){
					$str.=$nInc. ") " .trim($row["DESC1"]);
					$str.=" <br />";
					$nInc++;
				}
			}
		
	} 
	$str.=" <br />";	
	return $str;
}

function extract_ChkBox_Print($entity_id, $wholestr) { // Checkbox
	$aplha = array('0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	
	$db = open_database();
	$sql = "SELECT * FROM ENTITY WHERE ENTITY_ID = '$entity_id'";
	$rs = odbc_exec($db,$sql);
	$str = "";
	$nInc = 1;
  
	$code  = explode("|", $wholestr);
	$numRec = substr_count($wholestr,"|");
	//$str.= " \line ";
	 while ($row=odbc_fetch_array($rs)) {
			for ($n=0; $n < $numRec; $n++){
				if (trim($code[$n]) == trim($row["CODE"])){
					$str.=" \line ";
					$str.= "(".$aplha[$nInc]. ") " .trim($row["DESC1"]);
					$nInc++;
				}
			}
		
	} 

	return $str;
}
// CHECK BOX RELATED **************************************************************************************************

// OTHER FUNCTION **************************************************************************************************

function getEntityDesc($entity_id,$code) { // Checkbox

	$db = open_database();
	$sql = "SELECT * FROM ENTITY WHERE ENTITY_ID = '$entity_id' AND CODE = '$code'";
	$rs = odbc_exec($db,$sql);
	if ($row=odbc_fetch_array($rs))
		return (trim($row['DESC1']));
	else
		return ($msgInvalidCtryCode);
}

function ConvertDate($conDate) {
	
	if ((strlen(trim($conDate)) != 0) or ($conDate != "--") or (trim($conDate) != '0')) {
		$wrongPos = false;
		$dateSign1 = "-";
		$dateSign2 = "/";
		$dateSign = "";	   
		$conDate = substr($conDate,0,10);
		$noNeedChange = false;
		
		$myDate = "";
		$myDate = explode($dateSign1,$conDate);
		if (strlen($myDate[0]) == 2){
			$wrongPos = true;
			$dateSign = $dateSign1;
		}
			
		$myDate = "";				
		$myDate = explode($dateSign2,$conDate);
		if (strlen($myDate[0]) == 2){
			$wrongPos = true;
			$dateSign = $dateSign2;				
		}
		
		if ($wrongPos){
			$myDate = "";				
			$myDate = explode($dateSign,$conDate);
			$dateDB2 = $myDate[2]."-".$myDate[1]."-".$myDate[0];
		}		   
	    else{
			$myDate = "";			
			$myDate = explode($dateSign1,$conDate);
			if (strlen($myDate[0]) == 4)
				$noNeedChange = true;
				
			$myDate = "";	
			$myDate = explode($dateSign2,$conDate);
			if (strlen($myDate[0]) == 4)
				$noNeedChange = true;
			
			if (!($noNeedChange)){
				$dtYYDB2 = substr($conDate,6,4);
				$dtMMDB2 = substr($conDate,3,2);
				$dtDDDB2 = substr($conDate,0,2);
				$dateDB2 = $dtYYDB2."-".$dtMMDB2."-".$dtDDDB2;
			}
			else
				$dateDB2 = $conDate;
		}
	}
	else
	   $dateDB2 = $conDate;

	return $dateDB2;
}

function ConvertDateToStr($conDate) {
if ((strlen(trim($conDate)) != 0) or (trim($conDate) != "")) {
 	   $dtDDStr = substr($conDate,8,2);
	   $dtMMStr = substr($conDate,5,2);
	   $dtYYStr = substr($conDate,0,4);
	   $dateStr = $dtDDStr."/".$dtMMStr."/".$dtYYStr;
       return $dateStr;
}
}

function DisplayPoskod($intPoskod) {
	$fixLen = 5;
	$myPost = trim($intPoskod);
	$postLen = strlen($myPost);	
	if (($postLen < $fixLen) && ($postLen != "0")){
		$myPost = str_pad($myPost, $fixLen, "0", STR_PAD_LEFT);  
	}
	return $myPost;
}

function DisplayRegPlc($intRegPlc) {
	$fixLen = 8;
	$myRegPlc = trim($intRegPlc);
	$regPlcLen = strlen($myRegPlc);	
	if (($regPlcLen < $fixLen) && ($postLen != "0")){
		$myRegPlc = str_pad($myRegPlc, $fixLen, "0", STR_PAD_LEFT);
	}
	return $myRegPlc;
}

function checkNum($int){
	$int = trim($int);
	if (is_numeric($int) == TRUE)
		return TRUE;
	else
		return FALSE;
} 

function DatePicker($txtDate,$valDate,$formName,$default){

	$onclick = "";
	$image = "calbtn.gif";
	$href = "";
	$empty = "";
	
	if ($default == 1){
		$image = "calbtn2.gif";
	}
	else{
		$onclick = "onClick='if(self.gfPop)gfPop.fPopCalendar(document.".$formName.".".$txtDate.");return false;' ";
		$onclickBlk = "";
		$onclickDel = "onClick='document.".$formName.".".$txtDate.".value = ".'"'.' "'."'";
		$starthref = "<a id='".$txtDate."_btn' href='javascript:void(0)' $onclick>";
		$endhref = "</a>";
		$starthrefDel = "<a href='javascript:void(0)' name = 'myDateDel' $onclickDel >";
		$endhrefDel = "</a>";		
	}

	echo "<input name= '$txtDate' value= '$valDate' size='11' readonly> $starthref <img class='PopcalTrigger' align='absmiddle' src='../Images/$image' width='34' height='22' border='0' alt=''>$endhref ";
	
	echo "$starthrefDel <img align='absmiddle' src='../Images/del.png' width='16' height='16' border='0' alt=''>$endhref ";	
}


function DatePickerFrame(){
	echo "<iframe width=174 height=189 name='gToday:normal:agenda.js' id='gToday:normal:agenda.js' src='../Kalendar/ipopeng.htm' scrolling='no' frameborder='0' style='visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;'>";
	echo "</iframe>";
}

function setDefaultVal($value, $option){
	
	$defaultDt = "01-01-0001";
	$defaultVal = 0;
	
	if ((strlen(trim($value)) == 0) or ($value == "--") or (trim($value) == '0')) {
		switch ($option){
			case 'D' 	: 	return $defaultDt; break;		// Date
			case 'I' 	:	return $defaultVal; break;		// Integer
			default 	:	return "";						// Other
		}
	}
	return $value;

}

function delete_file($dirname,$file) {
	if (is_dir($dirname)){
		$dir_handle = opendir($dirname);
	}
	
	if (!$dir_handle)
		return false;
		
	if (!is_dir($dirname."/".$file))
		unlink($dirname."/".$file);

}

/********************************************************************************** 
Function:Validate phone number based on certain formats
Creator : Norilyana
Date : 10/11/2011
Description : Validate a range of phone number formats
			1)	03-80007000
			2)	0380007000
			3)	038000700
			4)	03-8000700
			5)	010-2000300
			6)	0102000300
**********************************************************************************/

function validate_telephone_number($number, $formats)
{
$format = trim(ereg_replace("[0-9]", "#", $number));

return (in_array($format, $formats)) ? true : false;
}


// List of possible formats: You can add new formats or modify the existing ones

$formats = array('###-#######', '##-########',
				 '##-#######', '##########',
				 '#########', '####-####', '###-###-###',
				 '#####-###-###', '##########');
/*********************************************************************************************/

/********************************************************************************** 
Function:Validate poscode 
Creator : Norilyana
Date : 10/11/2011
**********************************************************************************/

function validate_pcode_number($number, $pcode_formats)
{
$format = trim(ereg_replace("[0-9]", "#", $number));

return (in_array($format, $pcode_formats)) ? true : false;
}


// List of possible formats: You can add new formats or modify the existing ones

$pcode_formats = array('#####');
/*********************************************************************************************/


/********************************************************************************** 
Function: To retrieve all details about user
Creator : Norilyana
Date : 17/11/2011
**********************************************************************************/
function getUserInfo(){
	$db = opendatabase();
	/* get all the information: */
	/* $user_info[user_id] = array(user_id, ...) */
	$sql_info = "SELECT * FROM TDW_USER";
	$rs_info = mysql_query($sql_info);
	while ($row = mysql_fetch_assoc($rs_info)) {
		$user_info[$row['USR_REG_ID']]['USR_REG_ID']   		= $row['USR_REG_ID'];
		$user_info[$row['USR_REG_ID']]['USR_REG_PWD']  		= $row['USR_REG_PWD'];
		$user_info[$row['USR_REG_ID']]['USR_REG_NAME']  		= $row['USR_REG_NAME'];
		$user_info[$row['USR_REG_ID']]['USR_REG_ADDR']   		= $row['USR_REG_ADDR'];
		$user_info[$row['USR_REG_ID']]['USR_REG_POSCODE'] 	= $row['USR_REG_POSCODE'];
		$user_info[$row['USR_REG_ID']]['USR_REG_STATE']  		= $row['USR_REG_STATE'];
		$user_info[$row['USR_REG_ID']]['USR_REG_PHONE']  		= $row['USR_REG_PHONE'];
		$user_info[$row['USR_REG_ID']]['USR_REG_EMAIL']  	 	= $row['USR_REG_EMAIL'];
		$user_info[$row['USR_REG_ID']]['USR_REG_LAST_DT_LOGIN']	= $row['USR_REG_LAST_DT_LOGIN'];
		$user_info[$row['USR_REG_ID']]['USR_REG_DT']  	 		= $row['USR_REG_DT'];
	}
	return $user_info;
}


function print_state($entity_id, $name, $code,$width = 40)
{

	 $db = opendatabase();
	 $sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	 $rs = mysql_query($sql);
	 
	 $row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "N/A";
	 
	 }	 
}

function print_date_only($date){
	$dt = $date;
	list($year, $month, $day, $hours, $min, $sec) = explode('[/: -]', $dt);
	echo "$day-$month-$year";
}

function print_bdate($date){
	$dt = $date;
	list($year, $month, $day) = explode('[-]', $dt);
	echo "$day-$month-$year";
}

function get_religion($entity_id, $name, $code){
	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "TIADA MAKLUMAT";
	 
	 }	

}
function get_race_desc($entity_id, $name, $code){
	$code = intval($code);
	if ($code < 1000) {
		$code ='0'.$code;
	}
	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "TIADA MAKLUMAT"; 
	 }	

}
//niza add
function get_city_desc($entity_id, $name, $code){
	$code = intval($code);
	if ($code < 1000) {
		$code ='0'.$code;
	}
	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "TIADA MAKLUMAT";	 
	 }	
}

function get_state_desc($entity_id, $name, $code){
	$code = intval($code);
//	echo 'code'.$code;
//	if ($code < 1000) {
//		$code ='0'.$code;
//	}
    if ($code < 10) {
		$code ='0'.$code;
	}
	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "TIADA MAKLUMAT";	 
	 }	
}

function get_cit_stat($entity_id, $name, $code){
	$code = intval($code);
	//if ($code < 3) {
	//	$code ='0'.$code;
	//}
	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	return $row["ENT_DESC1"];
	 }else{
	 	return "TIADA MAKLUMAT";
	 
	 }	

}

function get_sex_desc($entity_id, $name, $code){

	$db = opendatabase();
	$sql = "SELECT * FROM TDW_ENTITY WHERE ENT_ID = '$entity_id' AND ENT_CODE='$code'";
	$rs = mysql_query($sql);
	
	$row=mysql_fetch_assoc($rs);
	 if ($row){
	 	$gender = $row["ENT_DESC1"];
	 	return strtoupper($gender);
	 }else{
	 	return "TIADA MAKLUMAT";
	 
	 }		 
}
//end

/*******************************************/
/*Function get age in days,months and year */
/*                                         */   
/*******************************************/
function get_Age_difference($start_date,$end_date){     
	list($start_year,$start_month,$start_date) = explode('-', $start_date);     
	list($current_year,$current_month,$current_date) = explode('-', $end_date);
	$result = '';       
	
	
	/** days of each month **/      
	for($x=1 ; $x<=12 ; $x++){ 
    	$dim[$x] = date('t',mktime(0,0,0,$x,1,date('Y'))); 
		//echo  $dim[$x];    
	}      
	
	/** calculate differences **/      
	$m = $current_month - $start_month;  
	$d = $current_date - $start_date;     
	$y = $current_year - $start_year;      
		  
	 /** if the start day is ahead of the end day **/      
	if($d < 0) { 
		$diff = $current_month-1;
		$mid = $dim[$diff]; 
		$today_day = $current_date + $mid ;
		$today_month = $current_month - 1;         
		$d = $today_day - $start_date; 
		$m = $today_month - $start_month;         
			 
		if(($today_month - $start_month) < 0) {               
			$today_month += 12;             
			$today_year = $current_year - 1;             
			$m = $today_month - $start_month;             
			$y = $today_year - $start_year;           
		}      
	}      
			  
	/** if start month is ahead of the end month **/          
	if($m < 0) {          
		$today_month = $current_month + 12;        
		$today_year = $current_year - 1;        
		$m = $today_month - $start_month;      
		$y = $today_year - $start_year;          
	}      
					 
	/** Calculate dates **/     
	if($y < 0) {	die("Start Date Entered is a Future date than End Date."); } 
	else {  
		switch($y) {       
			case 0 : $result .= ''; break;
			case 1 : $result .= $y.($m == 0 && $d == 0 ? ' year old' : ' year'); break; 
			default : $result .= $y.($m == 0 && $d == 0 ? ' years old' : ' years');
		}           
		
		switch($m) {
			case 0: $result .= ''; break;
			case 1: $result .= ($y == 0 && $d == 0 ? $m.' month old' : ($y == 0 && $d != 0 ? $m.' month' : ($y != 0 && $d == 0 ? ' and '.$m.' month old' : ', '.$m.' month'))); break;             
			default: $result .= ($y == 0 && $d == 0 ? $m.' months old' : ($y == 0 && $d != 0 ? $m.' months' : ($y != 0 && $d == 0 ? ' and '.$m.' months old' : ', '.$m.' months'))); break;       
		}           
		switch($d) {
		case 0: $result .= ($m == 0 && $y == 0 ? 'Today' : ''); break;
		case 1: $result .= ($m == 0 && $y == 0 ? $d.' day old' : ($y != 0 || $m != 0 ? ' and '.$d.' day old' : '')); break;
		default: $result .= ($m == 0 && $y == 0 ? $d.' days old' : ($y != 0 || $m != 0 ? ' and '.$d.' days old' : ''));
		}       
	}       
	
	return $y.' tahun '.$m.' bulan '.$d.' hari';  
} 
//--------------------------------------------------- din tambah --------------------------------------------------------//

function get_rel_combo_anak($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_sex_combo_anak($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_race_combo_anak($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_cit_combo_anak($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_state_combo_pemaklum($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_state_combo_pemaklum2($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}




function get_idtype_combo_penganjur1($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_state_combo_penganjur1($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_idtype_combo_penganjur2($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_state_combo_penganjur2($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_idtype_combo_mo($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_idctry_combo_mo($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_cit_combo_mo($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}


function get_idtype_combo_fa($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_idctry_combo_fa($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_cit_combo_fa($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}

function get_marstat_combo($entity_id, $name, $code, $bonChange=false, $bonClick=false, $bonDisable=false,$bonVisible=false,$width = 40) {
	
	$onChange = '';
	$Disable = '';
	$onClick = '';
	$Visible = '';	

	if ($bonVisible)	
		$Visible = " style='visibility:hidden;'";
	
	if ($bonDisable)
		$Disable = " disabled = disabled";
	
	if ($bonChange)
		$onChange = " onChange = '".$name."_onChange()'";

	if ($bonClick)
		$onClick = " onClick = '".$name."_onClick()'";

	 $db = opendatabase();
	 $sql = "SELECT * FROM TBWL_ENTITY WHERE ENT_ID = '$entity_id' order by ENT_DESC1 ASC";
	 $rs = mysql_query($sql);
	 $str = "<select width='300' style='width: 300px'  name='$name' class='input-select'>
	 			<option value='0'>--Sila Pilih--</option>";
	 while ($row=mysql_fetch_assoc($rs)) {
	 
	 	if(trim($code) == trim($row["ENT_CODE"]))
			$s = "selected";
		else
			$s = "";
			
		$str .= "<option value ='".$row["ENT_CODE"]."' $s>".substr(trim($row["ENT_DESC1"]),0,$width)."</option>"; 
		
	 }
	 $str.="</select>";
	 
	 echo $str;
}
//----------------------------------------------- end ---------------------------------------------------------------------//




?>