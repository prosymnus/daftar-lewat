<?php include("header.php");
include("lib_carian.php"); ?>
<div class="container">
<?php if ($sirenK1 != '01000000') : ?>

<form name="searchform" id="searchform">
	<div class="panel panel-primary">
	  <div class="panel-heading">
		<h3 class="panel-title">PEMBETULAN MAKLUMAT</h3>
	  </div>
	  <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="input-group">
                <input type="text" maxlength="24" name = "searchkey" id="searchkey" class="input-efast" aria-label="Keysearch" placeholder="Sila Masukkan No. Permohonan">
                <div class="input-group-btn">
				  <button OnClick="searchsubmit('1')" type="button" class="btn btn-primary"> Carian </button>
              <!--    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                  <ul id = 'options' class="dropdown-menu dropdown-menu-right" role="menu">
                    <li OnClick="searchsubmit('1')"><a href="#">No. Permohonan</a></li> -->
                   
                    
                   
                   
                  </ul>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
          </div>
          <!-- /.row -->
	  </div> <!-- /.panel-body -->
	</div><!-- /.panel panel-primary -->
</form> 


<?php
$found = FALSE;
if (isset($info)){
	foreach ($info->result() as $row){
						
		$applicationdate				= $row->applicationdate;
		$applicationno= $row->applicationno;	
					
					$no_file= $row->no_file;	
$kodcawangan= $row->kodcawangan;
$branch_id= $row->branch_id;
$reg_oper_id = $row->reg_oper_id;
$namakanak= $row->namakanak;
$tarikhlahir= $row->tarikhlahir;
$jantina_anak= $row->jantina_anak;
$religion_id= $row->religion_id;
$race_id= $row->race_id;
$warganegara_id= $row->warganegara_id; 
$tempatlahir1= $row->tempatlahir1;
$tempatlahir2= $row->tempatlahir2;
$nodaftarlahir= $row->nodaftarlahir;
$state_id= $row->state_id;
$chd_hsc_no= $row->chd_hsc_no;
$nama_medic= $row->nama_medic;
$id_medic= $row->id_medic;			
$pekerjaan_medic= $row->pekerjaan_medic;	
$no_file= $row->no_file;			
$namapenganjur1= $row->namapenganjur1;
$nokppenganjur1= $row->nokppenganjur1;
$alamatpenganjur1= $row->alamatpenganjur1;
$alamatpenganjur2= $row->alamatpenganjur2;
$alamatpenganjur3= $row->alamatpenganjur3;
$kodposkodpenganjur= $row->kodposkodpenganjur;
$kodbandar_penganjur= $row->kodbandar_penganjur;
$kodnegeri_penganjur= $row->kodnegeri_penganjur;
$jenispenganjur_id= $row->jenispenganjur_id;
$negarapengeluar_id= $row->negarapengeluar_id;   

        $nama_pemaklum2= $row->nama_pemaklum2;
        $nopengenalan_pemaklum2= $row->nopengenalan_pemaklum2;
        $alamat_pemaklum2_1= $row->alamat_pemaklum2_1;
        $alamat_pemaklum2_2= $row->alamat_pemaklum2_2;
        $alamat_pemaklum2_3= $row->alamat_pemaklum2_3;
        $poskod_pemaklum2= $row->poskod_pemaklum2;
        $bandar_pemaklum2= $row->bandar_pemaklum2;
        $negeri_pemaklum2= $row->negeri_pemaklum2;
        $hubungan_pemaklum2= $row->hubungan_pemaklum2;
        $emel_pemaklum2= $row->emel_pemaklum2;
        $notelefon_pemaklum2= $row->notelefon_pemaklum2;


$namaibu= $row->namaibu;
$ibu_id= $row->ibu_id;
$jenis_id_ibu= $row->jenis_id_ibu;
$negara_id_ibu= $row->negara_id_ibu;
$warganegara_ibu= $row->warganegara_ibu;
$bilangan_anak= $row->bilangan_anak;
$rank_anak= $row->rank_anak;
$namabapa= $row->namabapa;
$bapa_id= $row->bapa_id;
$jenis_id_bapa= $row->jenis_id_bapa;
$negara_id_bapa= $row->negara_id_bapa;
$warganegara_bapa= $row->warganegara_bapa;
$status_perkahwinan= $row->status_perkahwinan;
$tarikh_perkahwinan= $row->tarikh_perkahwinan;						
$tempat_perkahwinan= $row->tempat_perkahwinan;	
$no_sijil_kahwin= $row->no_sijil_kahwin;	

$nama_penganjur_1= $row->nama_penganjur_1;  
$nokp_penganjur_1= $row->nokp_penganjur_1;  
$hubungan_penganjur_1= $row->hubungan_penganjur_1;  

$nama_penganjur_2= $row->nama_penganjur_2;  
$nokp_penganjur_2= $row->nokp_penganjur_2;  
$hubungan_penganjur_2= $row->hubungan_penganjur_2;  


						  $found = TRUE;					  
	
	}	

if($found)
{
?>



<?php echo form_open('efast/update_pembetulan', 'role="form" id="register-form" autocomplete="off"'); ?>





 <table >
	 
		<h3 class="panel-title">KEPUTUSAN CARIAN</h3> 
	  

       

<!-- ============================================================================================================================================ -->

<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> MAKLUMAT PERMOHONAN </center> </strong></td>
         </tr>

<tr>
				<td height="30"><strong> Nombor Fail Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
             <td width="475"><input type="dname"  class="input-efast"  name="no_file" id="no_file" value="<?php echo $no_file ?>"?> </td>
</tr>



<tr>
				<td height="30" width="250"><strong> Tarikh Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
               <td height="30" width="475"> <input id="applicationdate" name="applicationdate" type="date" data-date="" data-date-format="DD-MM-YYYY" value="<?php echo  $applicationdate ?>"> </td>
</tr>


<tr>
				<td height="30"><strong> Nombor Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
             <!--   <td width="475"><input maxlength="24" type="applicationno"  class="input-efast"  name="applicationno" id="applicationno" value="<?php echo $applicationno ?>" ?> </td> -->
                <td> <?php echo strtoupper ($applicationno)  ?></td>   
                <input type="hidden"  class="input-efast"  name="applicationno" id="applicationno" value="<?php echo $applicationno ?>" ?> 
</tr>

<tr>
				<td height="30"><strong> Cawangan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
             <input type="hidden"  class="input-efast"  name="kodcawangan" id="kodcawangan" value="<?php echo $kodcawangan ?>" ?>
                <input type="hidden"  class="input-efast"  name="branch_id" id="branch_id" value="<?php echo $oper_bc ?>" ?> 

                 <td> <?php echo strtoupper ($kodcawangan) ?></td>   
</tr>

 <tr>
          <td height="41"><strong> Nama Cawangan  </strong></td> 
            <td><strong>:&nbsp;</strong></td> 

            <td> <?php echo strtoupper ($namacawangan) ?></td>                    
 </tr>


<tr>

                <td ><input type="hidden"  class="input-efast"  name="reg_oper_id" id="reg_oper_id" value="<?php echo $oper_id ?>" ?> </td>

               <td ><input type="hidden"  class=""  name="state_id" id="state_id" value="<?php echo $state_id ?> "?> </td>
                
</tr>


<tr>  <td height="20"></td></tr>

		<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> MAKLUMAT KANAK - KANAK </strong> </center></td>
         </tr>



<tr>
				<td height="30" width="250"><strong> Nama Kanak-kanak </strong></td>   
            <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namakanak"  class="input-efast"  name="namakanak" id="namakanak" value="<?php echo $namakanak ?> "?> </td>
</tr>

<tr>
				<td height="30"><strong> Tarikh lahir  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td height="30" width="475"> <input id="tarikhlahir" name="tarikhlahir" type="date" data-date="" data-date-format="DD-MM-YYYY" value="<?php echo  $tarikhlahir ?>"> </td>

            <!--    <td width="475"><input type="tarikhlahir"  class="input-efast"  name="tarikhlahir" id="tarikhlahir" value="<?php echo date("d-m-Y", strtotime($tarikhlahir));	 ?>"?> </td> -->


</tr>



<tr>
            <td height="36"><strong> Jantina</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                   <td width="475"> <input type="hidden" name="jantina_anak"  value="$jantina_anak">
                       <?php if (isset($jantina_anak)) {  echo get_sex_combo_anak("GEN","jantina_anak",$jantina_anak); } else { echo get_sex_combo_anak("GEN","jantina_anak",set_value('jantina_anak')); } ?>
                          </td>
</tr>

<tr>
            <td height="36"><strong> Agama</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
               <td width="475"> <input type="hidden" name="religion_id"  value="$religion_id">
                        <?php if (isset($religion_id)) {  echo get_rel_combo_anak("REL","religion_id",$religion_id); } else { echo get_rel_combo_anak("REL","religion_id",set_value('religion_id')); } ?>
                          </td>  
</tr>


<tr>
            <td height="36"><strong> Bangsa</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
               <td width="475"> <input type="hidden" name="race_id"  value="$race_id">
                        <?php if (isset($race_id)) {  echo get_race_combo_anak("RACE","race_id",$race_id); } else { echo get_race_combo_anak("RACE","race_id",set_value('race_id')); } ?>
                          </td> 
</tr>

<tr>
				<td height="30"><strong> Tempat Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir1"  class="input-efast"  name="tempatlahir1" id="tempatlahir1" value="<?php echo $tempatlahir1 ?>"?> </td>
</tr>


<tr>
				<td height="30"><strong></strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir2"  class="input-efast"  name="tempatlahir2" id="tempatlahir2" value="<?php echo $tempatlahir2 ?>"?> </td>
</tr>
<!--
<tr>
				<td height="30"><strong> No Daftar Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="15" type="nodaftarlahir"  class="input-efast"  name="nodaftarlahir" id="nodaftarlahir" value="<?php echo $nodaftarlahir ?>"?> </td>
</tr>

<tr>
				<td height="30"><strong> No. Kad Pengenalan Anak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="chd_hsc_no"  class="input-efast"  name="chd_hsc_no" id="chd_hsc_no" value="<?php echo $chd_hsc_no ?>"?> </td>
</tr>
-->

<tr>
            <td height="36"><strong> Warganegara</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="warganegara_anak"  value="$warganegara_id">
                        <?php if (isset($warganegara_id)) {  echo get_cit_combo_anak("CIT","warganegara_id",$warganegara_id); } else { echo get_cit_combo_anak("CIT","warganegara_id",set_value("<?php echo $warganegara_id?>")); } ?>
                         <?php //echo $warganegara_id?> </td>
</tr>


<tr>  <td height="20"></td></tr>
<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> MAKLUMAT PENYAMBUT KELAHIRAN </strong></center></td>
         </tr>




<tr>
				<td height="30" width="250"><strong> Nama Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_medic"  class="input-efast"  name="nama_medic" id="nama_medic" value="<?php echo $nama_medic ?> "?> </td>
</tr>



<tr>
				<td height="30"><strong> No. Pengenalan Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="id_medic"  class="input-efast"  name="id_medic" id="id_medic" value="<?php echo $id_medic ?>  "?> </td>
</tr>



<tr>
				<td height="30"><strong> Pekerjaan Penyambut Kelahiran </strong></td>   
             <td width="15"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="pekerjaan_medic"  class="input-efast"  name="pekerjaan_medic" id="pekerjaan_medic" value="<?php echo $pekerjaan_medic ?> "?> </td>
</tr>







<tr>  <td height="20"></td></tr>




<tr>
            <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> Pemaklum Selain Dari Ibu / Bapa </strong> </center></td>
         </tr>


                               

<tr>
                <td height="30" width="250"><strong> Nama Pemaklum * </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_pemaklum2"  class="input-efast"  name="nama_pemaklum2" id="nama_pemaklum2" value="<?php echo $nama_pemaklum2 ?>"?> </td>
              
</tr>

<tr>
                <td height="30" width="250"><strong> No. Pengenalan Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nopengenalan_pemaklum2"  class="input-efast"  name="nopengenalan_pemaklum2" id="nopengenalan_pemaklum2" value="<?php echo $nopengenalan_pemaklum2 ?> "?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Alamat Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_1"  class="input-efast"  name="alamat_pemaklum2_1" id="alamat_pemaklum2_1" value="<?php echo $alamat_pemaklum2_1 ?> "?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_2"  class="input-efast"  name="alamat_pemaklum2_2" id="alamat_pemaklum2_2" value="<?php echo $alamat_pemaklum2_2 ?>"?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_3"  class="input-efast"  name="alamat_pemaklum2_3" id="alamat_pemaklum2_3" value="<?php echo $alamat_pemaklum2_3 ?>"?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Poskod Pemaklum </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="5" type="poskod_pemaklum2"  class="input-efast"  name="poskod_pemaklum2" id="poskod_pemaklum2" value="<?php echo $poskod_pemaklum2 ?>"?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Bandar Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
               

                 <td width="475"> <input type="hidden" name="bandar_pemaklum2"  value="$bandar_pemaklum2">
                        <?php if (isset($bandar_pemaklum2)) {  echo get_state_combo_pemaklum2("CITY","bandar_pemaklum2",$bandar_pemaklum2); } else { echo get_state_combo_pemaklum2("CITY","bandar_pemaklum2",set_value('bandar_pemaklum2')); } ?>
                          </td> 
</tr>

<tr>
                <td height="30" width="250"><strong> Negeri Pemaklum </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
               <td width="475"> <input type="hidden" name="negeri_pemaklum2"  value="$state_id">
                        <?php if (isset($negeri_pemaklum2)) {  echo get_state_combo_pemaklum("NEG","negeri_pemaklum2",$negeri_pemaklum2); } else { echo get_state_combo_pemaklum("NEG","negeri_pemaklum2",set_value('negeri_pemaklum2')); } ?>
                          </td>
</tr>
<tr>
           
            
</tr>

<tr>
                <td height="30" width="250"><strong> Hubungan Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="hubungan_pemaklum2"  class="input-efast"  name="hubungan_pemaklum2" id="hubungan_pemaklum2" value="<?php echo $hubungan_pemaklum2 ?> "?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> Emel Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="emel_pemaklum2"  class="input-efast"  name="emel_pemaklum2" id="emel_pemaklum2" value="<?php echo $emel_pemaklum2 ?> "?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> No. Telefon Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="notelefon_pemaklum2"  class="input-efast"  name="notelefon_pemaklum2" id="notelefon_pemaklum2" value="<?php echo $notelefon_pemaklum2 ?> "?> </td>  
</tr>




<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> Maklumat Penganjur 1 </strong> </center></td>
         </tr>

     

<tr>
				<td height="30" width="250"><strong> Nama Penganjur 1</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_penganjur_1"  class="input-efast"  name="nama_penganjur_1" id="nama_penganjur_1" value="<?php echo $nama_penganjur_1 ?> "?> </td>
</tr>


<tr>
				<td height="30"><strong> No. Pengenalan Penganjur 1 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="nokp_penganjur_1"  class="input-efast"  name="nokp_penganjur_1" id="nokp_penganjur_1" value="<?php echo $nokp_penganjur_1 ?> "?> </td>
</tr>

<tr>
                <td height="30"><strong> Hubungan Penganjur 1 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="hubungan_penganjur_1"  class="input-efast"  name="hubungan_penganjur_1" id="hubungan_penganjur_1" value="<?php echo $hubungan_penganjur_1 ?> "?> </td>
</tr>

<!--
<tr>
			<td height="30"><strong>  Alamat Penganjur 1  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
               <td width="475"><input type="alamatpenganjur1"  class="input-efast"  name="alamatpenganjur1" id="alamatpenganjur1" value="<?php echo $alamatpenganjur1 ?> "?> </td>
                
                
                
          
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamatpenganjur2"  class="input-efast"  name="alamatpenganjur2" id="alamatpenganjur2" value="<?php echo $alamatpenganjur2 ?>"?> </td>
            </tr> 
                
                
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="alamatpenganjur3"  class="input-efast"  name="alamatpenganjur3" id="alamatpenganjur3" value="<?php echo $alamatpenganjur3 ?>"?> </td>
            </tr> 
                
           
            <tr>
			<td height="30"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input maxlength="5" type="kodposkodpenganjur"  class="input-efast"  name="kodposkodpenganjur" id="kodposkodpenganjur" value="<?php echo $kodposkodpenganjur ?>"?> </td>
            </tr> 
                
            <tr>
			<td height="30"><strong> Bandar</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
        <td width="475"> <input type="hidden" name="kodbandar_penganjur"  value="$kodbandar_penganjur">
           <?php if (isset($kodbandar_penganjur)) {  echo get_state_combo_pemaklum2("CITY","kodbandar_penganjur",$kodbandar_penganjur); } else { echo get_state_combo_pemaklum2("CITY","kodbandar_penganjur",set_value('kodbandar_penganjur')); } ?>
        </td> 

            </tr> 
                  
           <tr>
			<td height="30"><strong> Negeri</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
               <td width="475"><input type="kodnegeri_penganjur"  class="input-efast"  name="kodnegeri_penganjur" id="kodnegeri_penganjur" value="<?php echo $kodnegeri_penganjur ?>"?> </td> 
           <td width="475"> <input type="hidden" name="kodnegeri_penganjur"  value="$kodnegeri_penganjur">
                        <?php if (isset($kodnegeri_penganjur)) {  echo get_state_combo_pemaklum2("NEG","kodnegeri_penganjur",$kodnegeri_penganjur); } else { echo get_state_combo_pemaklum2("NEG","kodnegeri_penganjur",set_value('kodnegeri_penganjur')); } ?>
                          </td> 

            </tr> -->
           

<tr>  <td height="20"></td></tr>

<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> Maklumat Penganjur 2 </strong> </center></td>
         </tr>

   



<tr>
				<td height="30" width="250"><strong> Nama Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_penganjur_2"  class="input-efast"  name="nama_penganjur_2" id="nama_penganjur_2" value="<?php echo $nama_penganjur_2 ?> "?> </td>
            
</tr>  

<tr>
                <td height="30"><strong> No. Pengenalan Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="nokp_penganjur_2"  class="input-efast"  name="nokp_penganjur_2" id="nokp_penganjur_2" value="<?php echo $nokp_penganjur_2 ?> "?> </td>
</tr>

<tr>
                <td height="30"><strong> Hubungan Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="hubungan_penganjur_2"  class="input-efast"  name="hubungan_penganjur_2" id="hubungan_penganjur_2" value="<?php echo $hubungan_penganjur_2 ?> "?> </td>
</tr>

<!--

<tr>
                <td height="30"><strong> Jenis Pengenalan Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="jeniskppenganjur2"  class="input-efast"  name="jeniskppenganjur2" id="jeniskppenganjur2" value=""?> </td>
</tr>
<tr>
            <td height="36"><strong> Jenis Pengenalan Penganjur 2 </strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="jeniskppenganjur2"  value="$jeniskppenganjur2">
                          </td>
</tr>

<tr>
            <td height="30"><strong>  Alamat Penganjur 2  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
               <td width="475"><input type="alamat1penganjur2"  class="input-efast"  name="alamat1penganjur2" id="alamat1penganjur2" value=""?> </td>
                
                
                
          
            <tr>
            <td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamat2penganjur2"  class="input-efast"  name="alamat2penganjur2" id="alamat2penganjur2" value=""?> </td>
            </tr> 
                
                
            <tr>
            <td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamat3penganjur2"  class="input-efast"  name="alamat3penganjur2" id="alamat3penganjur2" value=""?> </td>
            </tr> 
                
           
            <tr>
            <td height="30"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input maxlength="5" type="kodposkodpenganjur2"  class="input-efast"  name="kodposkodpenganjur2" id="kodposkodpenganjur2" value=""?> </td>
            </tr> 
                
            <tr>
            <td height="30"><strong> Bandar</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
             
              <td width="475"> <input type="hidden" name="kodbandar_penganjur2"  value="$kodbandar_penganjur2">
           <?php if (isset($kodbandar_penganjur2)) {  echo get_state_combo_pemaklum2("CITY","kodbandar_penganjur2",$kodbandar_penganjur2); } else { echo get_state_combo_pemaklum2("CITY","kodbandar_penganjur2",set_value('kodbandar_penganjur2')); } ?>
        </td> 


            </tr> 
                  
           <tr>
            <td height="30"><strong> Negeri</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
             

              <td width="475"> <input type="hidden" name="kodnegeri_penganjur2"  value="$kodnegeri_penganjur2">
           <?php if (isset($kodnegeri_penganjur2)) {  echo get_state_combo_pemaklum2("NEG","kodnegeri_penganjur2",$kodnegeri_penganjur2); } else { echo get_state_combo_pemaklum2("NEG","kodnegeri_penganjur2",set_value('kodnegeri_penganjur2')); } ?>
        </td> 
            </tr> -->
  




<tr>  <td height="20"></td></tr>

<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> <strong> Maklumat Ibu </strong></center></td>
         </tr>
     
    
      

<tr>
				<td height="30" width="250"><strong> Nama Ibu </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namaibu"  class="input-efast"  name="namaibu" id="namaibu" value="<?php echo $namaibu ?> "?> </td>
</tr>


<tr>
				<td height="30"><strong> No. Pengenalan Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="ibu_id"  class="input-efast"  name="ibu_id" id="ibu_id" value="<?php echo $ibu_id ?>  "?> </td>
</tr>

<tr>
            <td height="36"><strong> Jenis Pengenalan Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                <td width="475"> <input type="hidden" name="jenis_id_ibu"  value="$jenis_id_ibu">
                        <?php if (isset($jenis_id_ibu)) {  echo get_idtype_combo_mo("DCTY","jenis_id_ibu",$jenis_id_ibu); } else { echo get_idtype_combo_mo("DCTY","jenis_id_ibu",set_value('jenis_id_ibu')); } ?>
                    
</tr>

<tr>
            <td height="36"><strong> Negara Pengeluar Pengenalan Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                <td width="475"> <input type="hidden" name="negara_id_ibu"  value="$negara_id_ibu">
                        <?php if (isset($negara_id_ibu)) {  echo get_idctry_combo_mo("NGR","negara_id_ibu",$negara_id_ibu); } else { echo get_idctry_combo_mo("NGR","negara_id_ibu",set_value('negara_id_ibu')); } ?>
                          </td>
</tr>


<tr>
            <td height="36"><strong> Warganegara Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                  <td width="475"> <input type="hidden" name="warganegara_ibu"  value="$warganegara_ibu">
                        <?php if (isset($warganegara_ibu)) {  echo get_cit_combo_mo("CIT","warganegara_ibu",$warganegara_ibu); } else { echo get_cit_combo_mo("CIT","warganegara_ibu",set_value('warganegara_ibu')); } ?>
                          </td>
</tr>


<tr>
				<td height="30"><strong> Bilangan Anak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bilangan_anak"  class="input-efast"  name="bilangan_anak" id=" bilangan_anak" value="<?php echo  $bilangan_anak?>"?> </td>
</tr>



<tr>
				<td height="30"><strong> Subjek adalah anak yang pertama / ke </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="rank_anak"  class="input-efast"  name="rank_anak" id="rank_anak" value="<?php echo $rank_anak ?> "?> </td>
</tr>

<tr>  <td height="20"></td></tr>

<tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> Maklumat Bapa </strong></center> </td>
         </tr>


<tr>
				<td height="30" width="250"><strong> Nama Bapa</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namabapa"  class="input-efast"  name="namabapa" id="namabapa" value="<?php echo $namabapa ?> "?> </td>
</tr>

<tr>
				<td height="30"><strong> No. Pengenalan Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="bapa_id"  class="input-efast"  name="bapa_id" id="bapa_id" value="<?php echo $bapa_id ?> "?> </td>
</tr>

<tr>
            <td height="36"><strong> Jenis Pengenalan Bapa</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                  <td width="475"> <input type="hidden" name="jenis_id_bapa"  value="$jenis_id_bapa">
                        <?php if (isset($jenis_id_bapa)) {  echo get_idtype_combo_fa("DCTY","jenis_id_bapa",$jenis_id_bapa); } else { echo get_idtype_combo_fa("DCTY","jenis_id_bapa",set_value('jenis_id_bapa')); } ?>
                          </td> 
</tr>

<tr>
            <td height="36"><strong> Negara Pengeluar Pengenalan Bapa</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="negara_id_bapa"  value="$negara_id_bapa">
                        <?php if (isset($negara_id_bapa)) {  echo get_idctry_combo_fa("NGR","negara_id_bapa",$negara_id_bapa); } else { echo get_idctry_combo_fa("NGR","negara_id_bapa",set_value('negara_id_bapa')); } ?>
                          </td>
</tr>


<tr>
            <td height="36"><strong> Warganegara Bapa</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                <td width="475"> <input type="hidden" name="warganegara_bapa"  value="$warganegara_bapa">
                        <?php if (isset($warganegara_bapa)) {  echo get_cit_combo_fa("CIT","warganegara_bapa",$warganegara_bapa); } else { echo get_cit_combo_fa("CIT","warganegara_bapa",set_value('warganegara_bapa')); } ?>
                          </td>
</tr>


<tr>  <td height="20"></td></tr>

    <tr>
              <td colspan="3" height="10px" bgcolor="#e6ecf7"> <strong> <center> Maklumat Perkahwinan </strong> </center> </td>
         </tr>

     



<tr>
              <td height="30" width="250"><strong> Status Perkahwinan</strong></td>   
              <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"> <input type="hidden" name="status_perkahwinan"  value="$status_perkahwinan">
                        <?php if (isset($status_perkahwinan)) {  echo get_marstat_combo("MAR","status_perkahwinan",$status_perkahwinan); } else { echo get_marstat_combo("MAR","status_perkahwinan",set_value('status_perkahwinan')); } ?>
                          </td>
</tr>


<tr>
                <td height="30"><strong> No. Sijil Kahwin * </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="No_Sijil_Kahwin"  class="input-efast"  name="No_Sijil_Kahwin" id="No_Sijil_Kahwin" value="<?php echo $no_sijil_kahwin ?> "?> </td>
</tr>



<tr>
                <td height="30"><strong> Tarikh Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
           <!--     <td width="475"><input type="tarikh_perkahwinan"  class="input-efast"  name="tarikh_perkahwinan" id="tarikh_perkahwinan" value="<?php echo $tarikh_perkahwinan ?>"?> </td> -->

                <td height="30" width="475"> <input id="tarikh_perkahwinan" name="tarikh_perkahwinan" type="date" data-date="" data-date-format="DD-MM-YYYY" value="<?php echo  $tarikh_perkahwinan ?>"> </td>

</tr>

<tr>
                <td height="30"><strong> Daerah / Negeri Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempat_perkahwinan"  class="input-efast"  name="tempat_perkahwinan" id="tempat_perkahwinan" value="<?php echo $tempat_perkahwinan ?> "?> </td>
</tr>






          <!-- ============================================================================================================================ -->
  
    
  
	</div>

<tr>  <td height="40"></td></tr>
    
  		
  </table> 

   
     
	 
	
<!--
    

Reg id = <?php echo $reg_oper_id ?> </br>
Oper id  =<?php echo $oper_id ?>   -->

<tr>  <td height="20"></td></tr>

</br>
   
<?php if ($oper_id != $reg_oper_id) : ?>


	<tr>
              <td colspan="3" height="20px"  width="750" bgcolor="#e6ecf7" > </td>
         </tr>

 <div class="well text-center">
 <td width="25"><div align = "center" class="btn btn-danger"><?php echo anchor('efast/pembetulan','KEMBALI','title="BACK"') ?></div>  </td>



		

<tr>  <td height="60"></td></tr>


<?php else: ?>
    



 <div class="well text-center">
 <td ><button onClick="window.location.href = '<?php echo base_url();?>index.php/efast/dashboard_efast';return false;"class="btn btn-danger">BATAL</button>
 </td> 


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="semak" class="btn btn-success btn-lg" value="SIMPAN" > </td> </div>  
</form>
 <?php //echo form_close(); ?> <br/> 

<?php endif ?>
	  




<div align = "center">
          <?php
}//if (found)
else
{
?>



    
<script type="text/javascript">
        $.growl.error({ message: "Rekod Tidak Dijumpai" });

window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "http://SPARKLE.JPN.GOV.MY/efast/pembetulan";

    }, 2000);




    </script>


<?php
}//else if (found)
        ?>
        </div>  
        
<?php
}
?>


	
</div>

<script type="text/javascript">
   function searchsubmit(keysearch){
   	  
	  //keyid = searchform.searchkey.value;
	  var keyid = document.getElementById("searchkey").value;
	   url = "";
	   
	   if (keyid == "")
			//alert ('Sila masukkan Kekunci Carian');
			$.growl.error({ message: "Sila masukkan Kekunci Carian" });
            		
		else
	   		location.href = url+"pembetulan_result/"+keysearch+"/"+keyid;
   }
</script>


  

<?php else: ?>

    <script>
        setTimeout(function () {
   window.location.href= 'carian_efast'; // the redirect goes here

},100);
</script>


<?php endif ?>

    
   
   
  
<?php   include("footer.php");  ?>