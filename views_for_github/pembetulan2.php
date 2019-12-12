<?php 	include("header.php");	
include("lib_carian.php");	?>
	
    
    
    
	<div class="centerContainer">	
       	
        
         <?php 
	$numofrow = $detail->num_rows();
	//if jumpa rekod kelahiran
    if($numofrow > 0){
		$i = 1;///tak letak niiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
		//umpuk data pada variable
		?>
            
		<fieldset>
        
        <legend>KEMASKINI </legend>
         <?php
		$flag_duplicate = 0;
		foreach ($detail->result() as $row){
				 
					 
		$application_date				= $row->applicationdate;
		$apl_no							= $row->applicationno;
		$namapenganjur1					= $row->namapenganjur1;
		$nokppenganjur1					= $row->nokppenganjur1;
		$jenisdokumen_id				= $row->jenisdokumen_id;
		$negarapengeluar_id				= $row->negarapengeluar_id;
		$jenispenganjur_id				= $row->jenispenganjur_id;
		$alamatpenganjur1				= $row->alamatpenganjur1;
		$alamatpenganjur2				= $row->alamatpenganjur2;
		$alamatpenganjur3				= $row->alamatpenganjur3;
		$poskod_penganjur				= $row->kodposkodpenganjur;
		$bandar_penganjur				= $row->kodbandar_penganjur;
		
		$notelefon						= $row->notelefon;
		$emel							= $row->emel;
					
		$namapenganjur2					= $row->namapenganjur2;
		$nokppenganjur2					= $row->nokppenganjur2;
		$jenisdokumen2_id				= $row->jenisdokumen2_id;
		$negarapengeluar2_id			= $row->negarapengeluar2_id;
		$jenispenganjur2_id				= $row->jenispenganjur2_id;
					
		$tarikhterima				= $row->tarikhterima;
		$appstatus_id				= $row->appstatus_id;
		$apl_status					= $row->statuskelulusan;
		$tarikhlulus				= $row->tarikhlulus;
		$nofailrujukanhq			= $row->nofailrujukanhq;
		$nofailrujukanibunegeri		= $row->nofailrujukanibunegeri;
		$nofailrujukancawangan		= $row->nofailrujukancawangan;
		$kodcawangan				= $row->kodcawangan;
		$namaanak 					= $row->namakanak;
		$tarikhlahir				= $row->tarikhlahir;
		$religion_id				= $row->religion_id;
		$race_id					= $row->race_id;
	$warganegara_id					= $row->warganegara_id;
	$branch_id						= $row->branch_id;
	$state_id						= $row->state_id;
	$tempatlahir1					= $row->tempatlahir1;
	$tempatlahir2					= $row->tempatlahir2;
	$kompaun						= $row->kompaun;
	$noresit						= $row->noresit;
	$nodaftarlahir					= $row->nodaftarlahir;
		$nomykid					= $row->chd_hsc_no;

	$tarikhselesai					= $row->tarikhselesai;
				$duplicate			= $row->duplikasi;
				$duplicateappno		= $row->duplicateappno;
				$catatan			= $row->catatan;
				$apl_no		       	= $row->applicationno; 
				$application_date	= $row->applicationdate;
				$namaanak 			=  $row->namakanak;
				$alamatpemaklum1			= $row->alamatpemaklum1;
				$alamatpemaklum2			= $row->alamatpemaklum2;
				$alamatpemaklum3			= $row->alamatpemaklum3;
				$poskodpemaklum				= $row->poskodpemaklum;
				$bandarpemaklum				= $row->bandarpemaklum;
				$negeripemaklum				= $row->negeripemaklum;
				$emel2						= $row->emel2;
				$notelefon2					= $row->notelefon2;
				$apl_status					= $row->statuskelulusan;
			
			
			
			if ($duplicateappno	!=''){
			
				$flag_duplicate = 1;
			}
				
?>

<!-- Edited dari hejaz -->

<?php echo form_open('efast/update_record');

	if(isset($errors)){ ?>
				<br />
 				 <div align="center" ><span style="color:red"><?php echo $errors; ?></span>	</div>
                 <br />
<?php		}	?> 
       <span style="color:red"><?php echo form_error('catatan'); ?></span>
		<div class="display-box">	<h3> MAKLUMAT PERMOHONAN</h3>
 		<!--<div class="display-header"></div>-->
		 <table width="499">
<tr>
          		<td width="192" height="10">&nbsp;</td>
      <td width="21" height="10">&nbsp;</td>
       	   </tr>
			<tr>
				<td height="25"><strong> Nombor Permohonan  </strong></td>   
             <td><strong>:&nbsp;</strong></td>
				<td width="270"><?php 	echo $apl_no; 		?> <input type="hidden" name="flag_duplicate" value="<?php echo $flag_duplicate ?>" </td>
		   </tr>
            
            <tr>
				<td height="25"><strong>  Status Permohonan  </strong></td> 	 <!--tambahan description -->
               <td><strong>:&nbsp;</strong></td> 
              <!--  <td><?php echo $apl_status	?></td> -->
				<td><strong><?php echo strtoupper ($namakod) ?></strong></td>

			</tr>
            
            <tr>
            <td height="25"><strong> No. Daftar Lahir  </strong></td>
          	 <td><strong>:&nbsp;</strong></td> 
           	 <td> <?php echo  $nodaftarlahir	?></td>
            </tr>
            
             <tr>
            <td height="25"><strong> No. Mykid  </strong></td>
          	 <td><strong>:&nbsp;</strong></td> 
           	  <td> 
			 <?php 
				if ($apl_status =="L")
 				 echo  $nomykid	;
			else
				  echo " "; 
				  ?>
            
			 <tr>
				<td height="25"><strong>Tarikh permohonan </strong></td> 
             <td><strong>:&nbsp;</strong></td>
				<td><?php 	echo date("d-m-Y", strtotime($application_date)); 		?></td>
			</tr>
            <tr>
         	    <td width="203" height="25"><strong>Tarikh Lulus </strong></td>
   			    <td width="12"><strong>:&nbsp;</strong></td>
 			    <td width="475"><?php echo   date("d-m-Y", strtotime($tarikhlulus)); ?></td>
  			</tr>
             <tr>
 			  <td height="20"><strong>Kod Cawangan Permohonan</strong></td>
  			  <td><strong>:&nbsp;</strong></td>
               <td width="475"><?php echo $kodcawangan; ?>
               </td>
  		    </tr>
 			 <tr>
 			   <td height="20"><strong>Nama Cawangan </strong></td>
  			   <td><strong>:&nbsp;</strong></td> 
         	   <td>JPN <?php echo strtoupper ($namacawangan) ?></td>                   
            </tr>
  
            
			 <tr>
				<td height="25"><strong> Nama Anak  </strong></td> 
             <td><strong>:&nbsp;</strong></td>
				<td><?php 	echo $namaanak; 		?></td>
			</tr>
             <tr>
			<td height="25"><strong>Tarikh Lahir </strong></td>
             <td><strong>:&nbsp;</strong></td>
				<td><?php echo date("d-m-Y", strtotime($tarikhlahir));	 ?></td>
                </tr>
			<tr>
			<td height="25"><strong> Agama </strong></td>  					 <!--tambahan description -->
                <td><strong>:&nbsp;</strong></td> 
                
		<!--		<td><?php echo $religion_id ?></td>   -->
  								             
              <td><?php echo strtoupper ($namaagama) ?></td>
               
                </tr>
			<tr>
			<td height="25"><strong>  Keturunan</strong></td>				  <!--tambahan description -->
               <td><strong>:&nbsp;</strong></td> 
		<!--			<td><?php echo $race_id ?></td> </td>  -->
				<td><?php echo strtoupper ($namaketurunan) ?></td>
                </tr>
			<tr>
			<td height="25"><strong> Warganegara </strong></td>
             <td><strong>:&nbsp;</strong></td>
				<td><?php echo $warganegara_id ?></td>
                </tr>	

            <tr>
			<td height="25"><strong> Tempat Lahir </strong></td>
             <td><strong>:&nbsp;</strong></td>
				<td><?php echo $tempatlahir1 ?></td>
                </tr>
			<tr>
			<td height="46"><strong> </strong></td>
             <td><strong>:&nbsp;</strong></td>
				<td><?php echo $tempatlahir2 ?></td>
                </tr>
            
			</tr>			
      </table>
     </div>

<div class="display-box">	
 		<h3> MAKLUMAT PEMAKLUM</h3>
		 <table width="603">
<tr>
          		<td width="145" height="10">&nbsp;</td>
      <td width="19" height="10">&nbsp;</td>
       	   </tr>
				<tr>
			<td height="25"><strong>  Nama Pemaklum   </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $namapenganjur1; 		?></td>
		   </tr>
           		<tr>
			<td height="25"><strong>  No. KP. Pemaklum </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td><?php 	echo $nokppenganjur1 		?></td>
				</tr>
                	   <tr>
				<td height="25"><strong>  Jenis Dokumen </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td><?php 	echo $jenisdokumen_id; 		?></td>
				</tr>


				<tr>
				<td height="25"><strong>  Negara Pengeluar  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td><?php 	echo $negarapengeluar_id; 		?></td>
				</tr>
                
                  <tr>
			<td height="25"><strong>  Alamat  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $alamatpenganjur1; 		?></td>
		   </tr>
            <tr>
			<td height="25"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $alamatpenganjur2; 		?></td>
		   </tr>
            <tr>
			<td height="25"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $alamatpenganjur3; 		?></td>
		   </tr>
            <tr>
			<td height="25"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $poskod_penganjur; 		?></td>
		   </tr>
           
           
           <tr>
			<td height="25"><strong>Bandar </strong></td>   				<!--tambahan description -->
                <td><strong>:&nbsp;</strong></td> 
			<!--	<td width="282"><?php 	echo $bandar_penganjur; ?>  -->
              
                <td width="282"><?php 	echo $namabandar; ?>             
		   </tr>
           <tr>
			<td height="25"><strong>  No. Telefon </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $notelefon; 		?></td>
		   </tr>
                <tr>
			<td height="25"><strong>  Emel </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				<td width="423"><?php 	echo $emel; 		?></td>
		   </tr>
           
                     
        	    <tr>
				<td height="25"><strong> Hubungan </strong></td>   

                <td><strong>:&nbsp;</strong></td> 
				<td><?php 	echo $jenispenganjur2_id; 		?></td>
				</tr>


    <td height="15"></tr>       

</tr>			
      </table>
     </div>

<div class="display-box">	
 		<h3> MAKLUMAT UNTUK DIHUBUNGI </h3>
         <input type="hidden" name="apl_no" class="input-efast"  value="<?php echo $apl_no;?>"> 
		 <table width="601" height="462">
<tr>
          		<td width="201" height="10">&nbsp;</td>
      <td width="22" height="10">&nbsp;</td>
       	   </tr>
				<tr>
				<td height="25"><strong> Nama </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur2"  class="input-efast"  name="namapenganjur2" id="namapenganjur2" value="<?php  if (isset($namapenganjur2)) { 
						    echo $namapenganjur2; } 
					    else {
							echo set_value('namapenganjur2'); 
							} ?>" /></td>
	
		   </tr>
           		<tr>
				<td height="25"><strong> No. Dokumen </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                
                 <td width="475"><input type="nokppenganjur2"   class="input-efast" name="nokppenganjur2" id="nokppenganjur2" value="<?php  if (isset($nokppenganjur2)) { 
						    echo $nokppenganjur2; } 
					    else {
							echo set_value('nokppenganjur2'); 
							} ?>" /></td>
	
		   </tr>
                 
                
<tr>
				<td width="201" height="10"><strong> Jenis Dokumen Pemaklum</strong></td>   
      <td><strong>:&nbsp;</strong></td>
               <td width="475"> <input type="hidden" name="info_city"  value="<?php echo $jenisdokumen2_id;?>">
                        <?php if (isset($jenisdokumen2_id)) {  echo get_entity_combo("DCTY","jenisdokumen2_id",$jenisdokumen2_id); } else { echo get_entity_combo("DCTY","jenisdokumen2_id",$jenisdokumen2_id); } ?>
                          </td>
      	</tr>
				<tr>
				<td height="25"><strong> Negara Pengeluar </strong></td>   
             <td><strong>:&nbsp;</strong></td>
             <td width="475"> <input type="hidden" name="info_city"  value="<?php echo $negarapengeluar2_id;?>">
                        <?php if (isset($negarapengeluar2_id)) {  echo get_entity_combo("NGR","negarapengeluar2_id",$negarapengeluar2_id); } else {  echo get_entity_combo("NGR","negarapengeluar2_id",$negarapengeluar2_id); } ?>
                          </td>	</tr>

	<tr>
			<td height="25"><strong>  Alamat  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
               <td width="475"><input type="alamatpemaklum1"  class="input-efast"  name="alamatpemaklum1" id="alamatpemaklum1" value="<?php  if (isset($alamatpemaklum1)) { 
						    echo $alamatpemaklum1; } 
					    else {
							echo set_value('alamatpemaklum1'); 
							} ?>" /></td>  </tr> 
                
                
                
                
                
 <!-- <td><input type="alamatpemaklum1" name="alamatpemaklum1" id="alamatpemaklum1" value="<?php echo set_value('alamatpemaklum1'); ?>" /></td> </tr>-->
            <tr>
			<td height="25"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamatpemaklum2"  class="input-efast"  name="alamatpemaklum2" id="alamatpemaklum2" value="<?php  if (isset($alamatpemaklum2)) { 
						    echo $alamatpemaklum2; } 
					    else {
							echo set_value('alamatpemaklum2'); 
							} ?>" /></td>  </tr> 
                
                
            <tr>
			<td height="25"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="alamatpemaklum3"  class="input-efast"  name="alamatpemaklum3" id="alamatpemaklum3" value="<?php  if (isset($alamatpemaklum3)) { 
						    echo $alamatpemaklum3; } 
					    else {
							echo set_value('alamatpemaklum3'); 
							} ?>" /></td>  </tr> 
                
           
            <tr>
			<td height="25"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="poskodpemaklum"  class="input-efast"  name="poskodpemaklum" id="poskodpemaklum" value="<?php  if (isset($poskodpemaklum)) { 
						    echo $poskodpemaklum; } 
					    else {
							echo set_value('poskodpemaklum'); 
							} ?>" /></td>  </tr> 
                
                
           
            </tr>
            <tr>
			<td height="25"><strong>Bandar </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
                
                           <td width="475"> <input type="hidden" name="info_city"  value="<?php echo $bandarpemaklum;?>">
                        <?php if (isset($bandarpemaklum)) {  echo get_entity_combo("CITY","bandarpemaklum",$bandarpemaklum); } else { echo get_entity_combo("CITY","bandarpemaklum",$bandarpemaklum); }  ?>
                          </td>
		   </tr>
           
            </tr>
            <tr>
			<td height="36"><strong> Negeri</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
				 <td width="475"> <input type="hidden" name="info_city"  value="<?php echo $negeripemaklum;?>">
                        <?php if (isset($negeripemaklum)) {  echo get_entity_combo("CITY","negeripemaklum",$negeripemaklum); } else { echo get_entity_combo("NEG","negeripemaklum",set_value('negeripemaklum')); } ?>
                          </td>
                 
            
                
		   </tr>
           
           <tr>
			<td height="25"><strong>  No. Telefon </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
                <td width="475"><input type="notelefon2"  class="input-efast"  name="notelefon2" id="notelefon2" value="<?php  if (isset($notelefon2)) { 
						    echo $notelefon2; } 
					    else {
							echo set_value('notelefon2'); 
							} ?>" /></td>  </tr> 
                
                <tr>
			<td height="25"><strong>  Emel </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
                <td width="475"><input type="emel2"  class="input-efast"  name="emel2" id="emel2" value="<?php  if (isset($emel2)) { 
						    echo $emel2; } 
					    else {
							echo set_value('emel2'); 
							} ?>" /></td>  </tr> 
           
           
                 <tr>
				<td height="25"><strong> Hubungan </strong></td>   
                <td><strong>:&nbsp;</strong></td>
                 <td width="475"><input type="jenispenganjur2_id"  class="input-efast"  name="jenispenganjur2_id" id="jenispenganjur2_id" value="<?php  if (isset($jenispenganjur2_id)) { 
						    echo $jenispenganjur2_id; } 
					    else {
							echo set_value('jenispenganjur2_id'); 
							} ?>" /></td>  </tr> 
                
                
                
                
				</tr>
<td height="15"></tr>
</tr>			
      </table>
     </div>

<div class="display-box">	
 		<h3> <strong>MAKLUMAT FAIL PERMOHONAN</strong></h3>
		 <table width="829" height="363">
           
             
          
          <!-- <tr>
             <td height="15"><strong> Tarikh terima </strong></td>
             <td><strong>:&nbsp;</strong></td>
             <td width="286">  <input type="tarikhterima" name="tarikhterima" id="tarikhterima" value="<?php echo $tarikhterima; ?>" /></td>
           </tr> 
           <tr>
             <td height="25"><strong> Status Permohonan </strong></td>
             <td><strong>:&nbsp;</strong></td>
             <td><?php echo  $apl_status ?></td>
           </tr> -->
                      
        <td height="15"></tr>   


<!-- start sini -->

 <?php if ($sirenK1 == '11100000') : ?>

<tr>
    <td width="204" height="25"><strong>No. Fail Rujukan Ibu Pejabat</strong></td>
    <td width="9"><strong>:&nbsp;</strong></td>
    <td width="672">  <input type="nofailrujukanhq" class="input-efast" name="nofailrujukanhq" id="nofailrujukanhq" value="<?php echo $nofailrujukanhq; ?>" type="text" readonly /></td> 
</tr>
<tr>
    <td height="25"><strong>No Fail Rujukan Negeri</strong></td>
    <td><strong>:&nbsp;</strong></td>
   
    <td width="672">  <input type="nofailrujukanibunegeri" class="input-efast" name="nofailrujukanibunegeri" id="nofailrujukanibunegeri" value="<?php echo $nofailrujukanibunegeri; ?>" type="text" readonly /></td>
</tr>
<tr>
   <td height="25"><strong>No Fail Rujukan Cawangan</strong></td>
   <td><strong>:&nbsp;</strong></td>
   <td width="672">  <input type="nofailrujukancawangan" class="input-efast" name="nofailrujukancawangan" id="nofailrujukancawangan" value="<?php echo $nofailrujukancawangan; ?>" /></td>
</tr>



<?php  elseif ($sirenK1 == '11110010'): ?>
	
<tr>
    <td width="204" height="25"><strong>No. Fail Rujukan Ibu Pejabat</strong></td>
    <td width="9"><strong>:&nbsp;</strong></td>
     <td width="672">  <input type="nofailrujukanhq" class="input-efast" name="nofailrujukanhq" id="nofailrujukanhq" value="<?php echo $nofailrujukanhq; ?>" type="text" readonly /></td>
</tr>
<tr>
    <td height="25"><strong>No Fail Rujukan Negeri</strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td width="672">  <input type="nofailrujukanibunegeri" class="input-efast" name="nofailrujukanibunegeri" id="nofailrujukanibunegeri" value="<?php echo $nofailrujukanibunegeri; ?>" /></td>
</tr>
<tr>
   <td height="25"><strong>No Fail Rujukan Cawangan</strong></td>
   <td><strong>:&nbsp;</strong></td>
   <td width="672">  <input type="nofailrujukancawangan" class="input-efast" name="nofailrujukancawangan" id="nofailrujukancawangan" value="<?php echo $nofailrujukancawangan; ?>" type="text" readonly  /></td>
</tr>

<?php else: ?>
<tr>
    <td width="204" height="25"><strong>No. Fail Rujukan Ibu Pejabat</strong></td>
    <td width="9"><strong>:&nbsp;</strong></td>
    <td width="672">  <input type="nofailrujukanhq" class="input-efast" name="nofailrujukanhq" id="nofailrujukanhq" value="<?php echo $nofailrujukanhq; ?>" /></td>
</tr>
<tr>
    <td height="25"><strong>No Fail Rujukan Negeri</strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td width="672">  <input type="nofailrujukanibunegeri" class="input-efast" name="nofailrujukanibunegeri" id="nofailrujukanibunegeri" value="<?php echo $nofailrujukanibunegeri; ?>" /></td>
</tr>
<tr>
   <td height="25"><strong>No Fail Rujukan Cawangan</strong></td>
   <td><strong>:&nbsp;</strong></td>
   <td width="672">  <input type="nofailrujukancawangan" class="input-efast" name="nofailrujukancawangan" id="nofailrujukancawangan" value="<?php echo $nofailrujukancawangan; ?>" /></td>
</tr>

  <?php endif ?>

<!-- sampai sini -->




  <!-- 
 
 <div class="form-group">
      <label for="inputPassword">Disabled</label>
      <input class="form-control" id="disabledInput" type="text" disabled>
    </div>


-->




  <!-- <tr>
  <td height="20"><strong>Kompaun</strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td>  <input type="kompaun" name="kompaun" id="kompaun" value="<?php echo $kompaun; ?>" /></td>
     <td> <?php echo  $kompaun	?></td>
  </tr>
  <tr>
    <td height="20"><strong>No. Resit </strong></td>
    <td><strong>:&nbsp;</strong></td>
     <td>  <input type="noresit" name="noresit" id="noresit" value="<?php echo $noresit; ?>" /></td>
  </tr>
  
  <tr>
    <td height="20"><strong> Tarikh Selesai </strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td><?php echo  $tarikhselesai	 ?></td>
  </tr> -->
  <tr>
    <td height="25"><strong>Jumlah Pertindihan Fail</strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td>  <strong> <?php echo $duplicate;	?> </strong> 
    </tr>
    
    
    
    
  <tr>
    <td height="25"><strong>No. Permohonan Pertindihan</strong></td>
    <td><strong>:&nbsp;</strong></td>
     <td>  <input type="duplicateappno" class="input-efast" name="duplicateappno" id="duplicateappno" value="<?php echo $duplicateappno; ?>" /></td>
     
  <tr>
    <td height="25"><strong>Catatan </strong></td>
    <td><strong>:&nbsp;</strong></td>
     <td><input align="left" type="catatan" name="catatan" id="catatan" class="input-efast" value="" /></td> 
	
     <span style="color:red"><?php echo form_error('catatan'); ?></span>    </tr>
   
  <tr>
  <td height="25" colspan="3">
    <table width="536">    
    
    
     <td height="104"><table width="592" height="143">      
             <thead>
              <th height="31" scope="col"></th>
            <th scope="col"><strong>Catatan</strong></th>
            <th scope="col"><strong>ID Pengguna</strong></th>
             <th scope="col"><strong>Cawangan</strong></th>
            <th scope="col"><strong>Tarikh</strong></th>
                     
           
          <td width="53"></thead>
            <tbody>           
                         
            <?php $i = 1; foreach ($notes->result() as $row1){ 
            
            	$catatan	= $row1->catatan;
				$user_id	= $row1->user_id;
				$oper_bc	= $row1->oper_bc;
				$tarikh		= $row1->tarikh
						
				?>
                
             <tr>
               <td width="31" height="32"><strong> <?php echo $i.'. ' ?></strong></td>
              <td width="193"><?php echo $catatan ?></td>
              <td width="69"><?php echo $user_id ?></td>
              <td width="121"><?php echo $oper_bc ?></td>
              <td width="97"><?php echo date("d-m-Y", strtotime($tarikh)); ?></td>
             
             </tr>
            
            <?php $i++;} ?>
            
               </tbody>
            </table>
            
            </table></td> 
            
           </tr>
      </table>
     </div>
   <?php  
   }  ?>


 <div class="well text-center">
    <input type="submit" name="semak" class="btn btn-success" value="SIMPAN" >
    
     
        
    	   <!--  <a href="<?php echo site_url() ?>/efast/carian_efast"> <input type="button" name="batal" class="btn btn-danger" value="BATAL"></a> -->
     
    <button onClick="window.location.href = '<?php echo base_url();?>index.php/efast/dashboard_efast';return false;"class="btn btn-danger">BATAL</button>

    
    
   <!-- <input type="button" name="batal"class="btn btn-sky text-uppercase btn-lg" value="BATAL" onclick="<?php echo site_url() ?>/efast/carian_efast"> 	 

   <a href="<?php echo site_url() ?>/efast/dashboard_efast"> <input type="button" name="BATAL" class="btn btn-danger" value="BATAL"></a>  -->

   
   
   </table>
        
   <?php
     } ?> 
     

  
</fieldset>
    


    
   
   
  
<?php 	include("footer.php");	?>


 <!-- <?php 
				if ($duplicate <="0")
 				 echo "tiada pertindihan";
			else
				  echo "banyak bertindih "; 
				  ?> -->

