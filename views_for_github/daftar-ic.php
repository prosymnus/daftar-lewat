<?php 	include("header.php");	
include("lib_carian.php");
	?>





 <link rel="stylesheet" href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/js/bootstrap.min.js">
 <link href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src= "<?php echo CI_BASE_URL ?>jquery/3.2.1/jquery.min.js"></script> 
<script src= "<?php echo CI_BASE_URL ?>bootstrap/moment.min.js"></script>

<!-- test page  -->

<button onClick="window.location.href = 'maklumat_JPN';return false;"class="btn btn-danger">BATAL</button> </td>






<h3> PENDAFTARAN </h3> 

					
<div class="container">

	<?php echo form_open('efast/index'); ?>

  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Maklumat Pendaftaran</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Maklumat Pemaklum / Penganjur</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Maklumat Ibu / Bapa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3"></a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">



    <div id="home" class="container tab-pane active"><br>



<?php if (isset($message)) { ?>

<CENTER><h3 style="color:green;"> Permohonan <?php echo $applicationno ?> Telah Berjaya didaftarkan</h3></CENTER><br>

<?php } ?>

<div class="alert alert-error">
    <?php echo validation_errors();?>
</div>




     
 		<h3> MAKLUMAT REKOD</h3>
         <table width="600" >



<div id="container">

   
<tr>
				<td height="30"><strong> Nombor Fail</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
             <td width="475"><input type="no_file"  class="input-efast"  name="no_file" id="no_file" value=""?> </td>
</tr>



<tr>
				<td height="30" width="250"><strong> Tarikh Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
             <!--   <td width="475"><input type="applicationdate"  class="input-efast"  name="applicationdate" id="applicationdate" value=""?> </td> -->
                 <td height="30" width="475"> <input id="applicationdate" name="applicationdate" type="date" data-date="" data-date-format="DD-MM-YYYY" value=""> </td>
</tr>


<tr>
				<td height="30"><strong> Nombor Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="24" type="applicationno"  class="input-efast"  name="applicationno" id="applicationno" value="" ?> <?php echo form_error('applicationno'); ?> </td>
</tr>

<tr>
				<td height="30"><strong> Cawangan* </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="branch_id"  class="input-efast"  name="branch_id" id="branch_id" value="<?php echo $oper_bc ?>" ?> </td>
</tr>

<tr>
           
                <td width="475"><input type="hidden"  class="input-efast"  name="kodcawangan" id="kodcawangan" value="<?php echo $oper_bc ?>" ?> </td>
</tr>

<tr>
                <td height="30"><strong> user id *</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                <td width="475"><input type="reg_oper_id"  class="input-efast"  name="reg_oper_id" id="reg_oper_id" value="<?php echo $oper_id ?>" ?> </td>
</tr>

<tr>
            <td height="30"><strong> Negeri</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="state_id"  value="$state_id">
                        <?php if (isset($state_id)) {  echo get_entity_combo("CITY","state_id",$state_id); } else { echo get_entity_combo("NEG","state_id",set_value('state_id')); } ?>
                          </td>
</tr>





</TABLE>

<h3  > MAKLUMAT KANAK - KANAK </h3>
 <table width="600" >


<tr>
				<td height="30" width="250"><strong> Nama Kanak-kanak </strong></td>   
            <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namakanak"  class="input-efast"  name="namakanak" id="namakanak" value=""?> </td>
</tr>

<tr>
				<td height="30"><strong> Tarikh lahir  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
            <!--    <td width="475"><input type="tarikhlahir"  class="input-efast"  name="tarikhlahir" id="tarikhlahir" value=""?> </td> -->
                 <td height="30" width="475"> <input id="tarikhlahir" name="tarikhlahir" type="date" data-date="" data-date-format="DD-MM-YYYY" value=""> </td>

</tr>



<tr>
            <td height="30"><strong> Jantina</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="jantina_anak"  value="$jantina_anak">
                        <?php if (isset($jantina_anak)) {  echo get_sex_combo_anak("GEN","jantina_anak",$jantina_anak); } else { echo get_sex_combo_anak("GEN","jantina_anak",set_value('jantina_anak')); } ?>
                          </td>
</tr>

<tr>
            <td height="30"><strong> Agama</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="religion_id"  value="$religion_id">
                        <?php if (isset($religion_id)) {  echo get_rel_combo_anak("REL","religion_id",$religion_id); } else { echo get_rel_combo_anak("REL","religion_id",set_value('religion_id')); } ?>
                          </td>
</tr>
<!--
<tr>
				<td height="30"><strong> Agama 0</strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="religion_id"  class="input-efast"  name="religion_id" id="religion_id" value=""?> </td>
</tr>
-->

<tr>
            <td height="30"><strong> Bangsa</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="race_id"  value="$race_id">
                        <?php if (isset($race_id)) {  echo get_race_combo_anak("RACE","race_id",$race_id); } else { echo get_race_combo_anak("RACE","race_id",set_value('race_id')); } ?>
                          </td>
</tr>


<!--

<tr>
				<td height="30"><strong> Bangsa 0000</strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="race_id"  class="input-efast"  name="race_id" id="race_id" value=""?> </td>
</tr>  -->
<tr>
				<td height="30"><strong> Tempat Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir1"  class="input-efast"  name="tempatlahir1" id="tempatlahir1" value=""?> </td>
</tr>


<tr>
				<td height="30"><strong></strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir2"  class="input-efast"  name="tempatlahir2" id="tempatlahir2" value=""?> </td>
</tr>

<tr>
				<td height="30"><strong> No Daftar Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="15" type="nodaftarlahir"  class="input-efast"  name="nodaftarlahir" id="nodaftarlahir" value=""?> </td>
</tr>

<tr>
				<td height="30"><strong> No. Kad Pengenalan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="chd_hsc_no"  class="input-efast"  name="chd_hsc_no" id="chd_hsc_no" value=""?> </td>
</tr>


<tr>
            <td height="30"><strong> Warganegara</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="warganegara_anak"  value="$warganegara_id">
                        <?php if (isset($warganegara_id)) {  echo get_cit_combo_anak("CIT","warganegara_id",$warganegara_id); } else { echo get_cit_combo_anak("CIT","warganegara_id",set_value('warganegara_id')); } ?>
                          </td>
</tr>









</TABLE>

<h3> MAKLUMAT PENYAMBUT KELAHIRAN</h3>
 <table width="600" >


<tr>
				<td height="30" width="250"><strong> Nama Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_medic"  class="input-efast"  name="nama_medic" id="nama_medic" value=""?> </td>
</tr>



<tr>
				<td height="30"><strong> No. Pengenalan Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="id_medic"  class="input-efast"  name="id_medic" id="id_medic" value=""?> </td>
</tr>



<tr>
				<td height="30"><strong> Pekerjaan Penyambut Kelahiran </strong></td>   
             <td width="15"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="pekerjaan_medic"  class="input-efast"  name="pekerjaan_medic" id="pekerjaan_medic" value=""?> </td>
</tr>







<tr>  <td height="100"></td></tr>




</table>



<div class="well text-center"> </div>
    
    </div>






    <div id="menu1" class="container tab-pane fade"><br>




<H3> Pemaklum Selain Dari Ibu / Bapa  &nbsp;&nbsp;  </H3>
<table width="600" >


                  
                 
                      
                                                       

<tr>
                <td height="30" width="250"><strong> Nama Pemaklum * </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_pemaklum2"  class="input-efast"  name="nama_pemaklum2" id="nama_pemaklum2" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> No. Pengenalan Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nopengenalan_pemaklum2"  class="input-efast"  name="nopengenalan_pemaklum2" id="nopengenalan_pemaklum2" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Alamat Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_1"  class="input-efast"  name="alamat_pemaklum2_1" id="alamat_pemaklum2_1" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_2"  class="input-efast"  name="alamat_pemaklum2_2" id="alamat_pemaklum2_2" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat_pemaklum2_3"  class="input-efast"  name="alamat_pemaklum2_3" id="alamat_pemaklum2_3" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> poskod Pemaklum </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="poskod_pemaklum2"  class="input-efast"  name="poskod_pemaklum2" id="poskod_pemaklum2" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Bandar Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bandar_pemaklum2"  class="input-efast"  name="bandar_pemaklum2" id="bandar_pemaklum2" value=""?> </td>
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
                <td width="475"><input type="hubungan_pemaklum2"  class="input-efast"  name="hubungan_pemaklum2" id="hubungan_pemaklum2" value=""?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> Emel Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="emel_pemaklum2"  class="input-efast"  name="emel_pemaklum2" id="emel_pemaklum2" value=""?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> No. Telefon Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="notelefon_pemaklum2"  class="input-efast"  name="notelefon_pemaklum2" id="notelefon_pemaklum2" value=""?> </td>  
</tr>



                            </table>
                    
                 
             





<!--

      <h3>Maklumat Pemaklum (Selain Ibu Bapa)</h3>
       <table width="600" >
    




<tr>
                <td height="30" width="250"><strong> Nama Pemaklum * </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur1"  class="input-efast"  name="namapenganjur1" id="namapenganjur1" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Alamat Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat1pemaklum1"  class="input-efast"  name="alamat1pemaklum1" id="alamat1pemaklum1" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat2pemaklum2"  class="input-efast"  name="alamat2pemaklum2" id="alamat2pemaklum2" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong>    </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="alamat3pemaklum3"  class="input-efast"  name="alamat3pemaklum3" id="alamat3pemaklum3" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> poskod Pemaklum </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="poskodpemaklum"  class="input-efast"  name="poskodpemaklum" id="poskodpemaklum" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Bandar Pemaklum  </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bandarpemaklum"  class="input-efast"  name="bandarpemaklum" id="bandarpemaklum" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Negeri Pemaklum </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="negeripemaklum"  class="input-efast"  name="negeripemaklum" id="negeripemaklum" value=""?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Pekerjaan Pemaklum</strong></td>   `
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="Pekerjaanpemaklum"  class="input-efast"  name="Pekerjaanpemaklum" id="Pekerjaanpemaklum" value=""?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> Emel Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="emel2"  class="input-efast"  name="emel2" id="emel2" value=""?> </td>  
</tr>

<tr>
                <td height="30" width="250"><strong> No. Telefon Pemaklum</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="notelefon2"  class="input-efast"  name="notelefon2" id="notelefon2" value=""?> </td>  
</tr>
</TABLE>   -->


  <h3>Maklumat Penganjur 1</h3>
       <table width="600" >

<tr>
				<td height="30" width="250"><strong> Nama Penganjur 1</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur1"  class="input-efast"  name="namapenganjur1" id="namapenganjur1" value=""?> </td>
</tr>


<tr>
				<td height="30"><strong> No. Pengenalan Penganjur 1 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="nokppenganjur1"  class="input-efast"  name="nokppenganjur1" id="nokppenganjur1" value=""?> </td>
</tr>

<tr>
            <td height="36"><strong> Jenis Pengenalan Penganjur 1 </strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="jeniskppenganjur1"  value="$jeniskppenganjur1">
                        <?php if (isset($jeniskppenganjur1)) {  echo get_idtype_combo_penganjur1("DCTY","jeniskppenganjur1",$jeniskppenganjur1); } else { echo get_idtype_combo_penganjur1("DCTY","jeniskppenganjur1",set_value('jeniskppenganjur1')); } ?>
                          </td>
</tr>


<tr>
			<td height="30"><strong>  Alamat Penganjur 1  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
               <td width="475"><input type="alamat1penganjur1"  class="input-efast"  name="alamat1penganjur1" id="alamat1penganjur1" value=""?> </td>
                
                
                
          
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamat2penganjur1"  class="input-efast"  name="alamat2penganjur1" id="alamat2penganjur1" value=""?> </td>
            </tr> 
                
                
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="alamat3penganjur1"  class="input-efast"  name="alamat3penganjur1" id="alamat3penganjur1" value=""?> </td>
            </tr> 
                
           
            <tr>
			<td height="30"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="kodposkodpenganjur1"  class="input-efast"  name="kodposkodpenganjur1" id="kodposkodpenganjur1" value=""?> </td>
            </tr> 
                
            <tr>
			<td height="30"><strong> Bandar</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="kodbandar_penganjur1"  class="input-efast"  name="kodbandar_penganjur1" id="kodbandar_penganjur1" value=""?> </td>
            </tr> 
                  
           <tr>
			<td height="30"><strong> Negeri</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
                   <td width="475"> <input type="hidden" name="kodnegeri_penganjur1"  value="$kodnegeri_penganjur1">
                        <?php if (isset($kodnegeri_penganjur1)) {  echo get_state_combo_penganjur1("CITY","kodnegeri_penganjur1",$kodnegeri_penganjur1); } else { echo get_state_combo_penganjur1("NEG","kodnegeri_penganjur1",set_value('kodnegeri_penganjur1')); } ?>
                          </td>
            </tr> 
           

</table>

<h3>Maklumat Penganjur 2</h3>
       <table width="600" >



<tr>
				<td height="30" width="250"><strong> Nama Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur2"  class="input-efast"  name="namapenganjur2" id="namapenganjur2" value=""?> </td>
            
</tr>  

<tr>
                <td height="30"><strong> No. Pengenalan Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="nokppenganjur2"  class="input-efast"  name="nokppenganjur2" id="nokppenganjur2" value=""?> </td>
</tr>


<tr>
            <td height="36"><strong> Jenis Pengenalan Penganjur 2 </strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="jeniskppenganjur2"  value="$jeniskppenganjur2">
                        <?php if (isset($jeniskppenganjur2)) {  echo get_idtype_combo_penganjur2("DCTY","jeniskppenganjur2",$jeniskppenganjur2); } else { echo get_idtype_combo_penganjur2("DCTY","jeniskppenganjur2",set_value('jeniskppenganjur2')); } ?>
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
                
              <td width="475"><input type="kodposkodpenganjur2"  class="input-efast"  name="kodposkodpenganjur2" id="kodposkodpenganjur2" value=""?> </td>
            </tr> 
                
            <tr>
            <td height="30"><strong> Bandar</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="kodbandar_penganjur2"  class="input-efast"  name="kodbandar_penganjur2" id="kodbandar_penganjur2" value=""?> </td>
            </tr> 
                  
           <tr>
            <td height="30"><strong> Negeri</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
            
              <td width="475"> <input type="hidden" name="kodnegeri_penganjur2"  value="$kodnegeri_penganjur2">
                        <?php if (isset($kodnegeri_penganjur2)) {  echo get_state_combo_penganjur2("CITY","kodnegeri_penganjur2",$get_state_combo_penganjur2); } else { echo get_state_combo_penganjur2("NEG","kodnegeri_penganjur2",set_value('kodnegeri_penganjur2')); } ?>
                          </td>
            </tr> 
  

<tr>  <td height="100"></td></tr>



    </table> 
    <div class="well text-center"> </div>
    </div>




<?php
  /*************** Papar Nama Atas Kad - Hanita 10/11/2016 *********************/
    if (strlen($chipName)>0) {
        
        $db2_name = $chipName;
    } else if (strlen($shortName)>0)  {
      
      $db2_name = $shortName;
    }else if (strlen($gpnName)>0)  {

       $db2_name = $gpnName;
    }

 if (isset($queryTGPN)) { 
      while ($row = odbc_fetch_array($queryTGPN)) { //ambil data db2
        
         $db2_icno      = trim($row['GPN_HSC_NO']);
         $db2_cit_stat  = trim($row['GPN_RES_STAT_CD']);
         $db2_NTNLY     = trim($row['GPN_CIT_NTNLY_CD']);
         $db2_MAR_STAT    = trim($row['GPN_MAR_STAT_CD']);
         



      }
    }


 ?>   





<!-- *****************************************************************   -->




<!-- ***********************************************************************************************************   -->
 <!-- semua medan yang diambil dari db2 utk pass to controllers -->
         <input name="ctry_cd" type="hidden" value='3000'>
         <input name="mykad" type="hidden" value="<?php echo $db2_icno; ?>">
         <input name="name" type="hidden" value="<?php echo $db2_name; ?>">
          <input name="citizen" type="hidden" value="<?php echo $db2_cit_stat; ?>">
          <input name="nationality" type="hidden" value="<?php echo $db2_NTNLY; ?>">
          <input name="marriage" type="hidden" value="<?php echo $db2_MAR_STAT; ?>">
          



<!--  *********************************************************************************************************** -->
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Maklumat Ibu</h3>
       <table width="600" >
    

      <div class="input-group">
   <div class="">Nombor Dokumen</div>
   <input name="mykad" type="text" class="form-control" maxlength="12" placeholder="No. dokumen JPN">
   <button type="submit" class="btn btn-info"> pertanyaan </button>
   </div> 




<tr>
				<td height="30"><strong> No. Pengenalan Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="ibu_id"  class="input-efast"  name="ibu_id" id="ibu_id" value="<?php echo $db2_icno; ?>"?> </td>
</tr>

<tr>
                <td height="30" width="250"><strong> Nama Ibu </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namaibu"  class="input-efast"  name="namaibu" id="namaibu" value="<?php echo $db2_name; ?>"?> </td>
</tr>

<tr>
            <td height="36"><strong> Jenis Pengenalan Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="jenis_id_ibu"  value="$jenis_id_ibu">
                        <?php if (isset($jenis_id_ibu)) {  echo get_idtype_combo_mo("DCTY","jenis_id_ibu",$jenis_id_ibu); } else { echo get_idtype_combo_mo("DCTY","jenis_id_ibu",set_value('jenis_id_ibu')); } ?>
                          </td>
</tr>

<tr>
            <td height="36"><strong> Negara Pengeluar Pengenalan Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="negara_id_ibu"  value="$negara_id_ibu">
                        <?php if (isset($ctry_cd)) {  echo get_idctry_combo_mo("NGR","negara_id_ibu",$negara_id_ibu); } else { echo get_idctry_combo_mo("NGR","negara_id_ibu",set_value('$ctry_cd')); } ?>
                          </td>
</tr>


<tr>
            <td height="36"><strong> Warganegara Ibu</strong></td>   
              <td><strong>:&nbsp;</strong></td> 
                 <td width="475"> <input type="hidden" name="warganegara_ibu"  value="$warganegara_ibu">
                        <?php if (isset($db2_cit_stat)) {  echo get_cit_combo_mo("CIT","warganegara_ibu",$warganegara_ibu); } else { echo get_cit_combo_mo("CIT","warganegara_ibu",set_value('$db2_cit_stat')); } ?>
                          </td>
</tr>


<tr>
				<td height="30"><strong> Bilangan Anak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bilangan_anak"  class="input-efast"  name="bilangan_anak" id="bilangan_anak" value=""?> </td>
</tr>



<tr>
				<td height="30"><strong> Subjek adalah anak yang pertama / ke </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="rank_anak"  class="input-efast"  name="rank_anak" id="rank_anak" value=""?> </td>
</tr>
</table>



  



    
      <h3>Maklumat Bapa</h3>
       <table width="600" >
      


<tr>
				<td height="30" width="250"><strong> Nama Bapa</strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namabapa"  class="input-efast"  name="namabapa" id="namabapa" value=""?> </td>
</tr>

<tr>
				<td height="30"><strong> No. Pengenalan Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input maxlength="12" type="bapa_id"  class="input-efast"  name="bapa_id" id="bapa_id" value=""?> </td>
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


</div>

    </div>
    </table>
<h3>Maklumat Perkahwinan</h3>
       <table width="600" >



<tr>
              <td height="30" width="250"><strong> Status Perkahwinan</strong></td>   
              <td width="10"><strong>:&nbsp;</strong></td>
                 <td width="475"> <input type="hidden" name="status_perkahwinan"  value="$status_perkahwinan">
                        <?php if (isset($db2_MAR_STAT)) {  echo get_marstat_combo("MAR","status_perkahwinan",$status_perkahwinan); } else { echo get_marstat_combo("MAR","status_perkahwinan",set_value('$db2_MAR_STAT')); } ?>
                          </td>
</tr>


<tr>
                <td height="30"><strong> No. Sijil Kahwin * </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="No_Sijil_Kahwin"  class="input-efast"  name="No_Sijil_Kahwin" id="No_Sijil_Kahwin" value=""?> </td>
</tr>



<tr>
                <td height="30"><strong> Tarikh Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tarikh_perkahwinan"  class="input-efast"  name="tarikh_perkahwinan" id="tarikh_perkahwinan" value=""?> </td>
</tr>

<tr>
                <td height="30"><strong> Daerah / Negeri Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempat_perkahwinan"  class="input-efast"  name="tempat_perkahwinan" id="tempat_perkahwinan" value=""?> </td>
</tr>


</table>








<!--<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?> -->
<table >
	<td width="200"><strong>&nbsp;</strong></td>
<td width="200">

 <input type="submit" name="semak" class="btn btn-success" value="SIMPAN" > </td>
 <?php echo form_close(); ?><br/>
 <td> 
 	<td><strong>&nbsp;</strong></td>
 	<td><strong>&nbsp;</strong></td>
 	<td><strong>&nbsp;</strong></td>
 	<td width="200">
<button onClick="window.location.href = '<?php echo base_url();?>index.php/efast/dashboard_efast';return false;"class="btn btn-danger">BATAL</button> </td>
<div id="fugo">

</div>
</div>
<tr>  <td height="100"></td></tr>
</table>






<STYLE>

input {
    position: relative;
    width: 150px; height: 28px;
    color: white;
}

input:before {
    position: absolute;
    top: 3px; left: 3px;
    content: attr(data-date);
    display: inline-block;
    color: black;
}

input::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
    display: none;
}

input::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 1px;
    right: 0;
    color: black;
    opacity: 1;
}

</STYLE>



<script>

    function adjustCollapseView(){
    var desktopView = $(document).width();
    if(desktopView >= "900")
    {
        $("#collapseOne a[data-toggle]").attr("data-toggle","");
        $("#collapseOne.collapse").addClass("in").css("height","auto")
        
        $("#collapseTwo a[data-toggle]").attr("data-toggle","");
        $("#collapseTwo.collapse").addClass("in").css("height","auto")
        
        $("#collapseThree a[data-toggle]").attr("data-toggle","");
        $("#collapseThree.collapse").addClass("in").css("height","auto")
        
        $("#collapseFour a[data-toggle]").attr("data-toggle","");
        $("#collapseFour.collapse").addClass("in").css("height","auto")
        
    }else{
        $("#collapseOne a[data-toggle]").attr("data-toggle","collapse");
        $("#collapseOne.collapse").removeClass("in").css("height","0")
        $("#collapseOne .collapse:first").addClass("in").css("height","auto")
        
        
        $("#collapseTwo a[data-toggle]").attr("data-toggle","collapse");
        $("#collapseTwo.collapse").removeClass("in").css("height","0")
        $("#collapseTwo .collapse:first").addClass("in").css("height","auto")
        
        $("#collapseThree a[data-toggle]").attr("data-toggle","collapse");
        $("#collapseThree.collapse").removeClass("in").css("height","0")
        $("#collapseThree .collapse:first").addClass("in").css("height","auto")
        
        $("#collapseFour a[data-toggle]").attr("data-toggle","collapse");
        $("#collapseFour.collapse").removeClass("in").css("height","0")
        $("#collapseFour .collapse:first").addClass("in").css("height","auto")
    }
}




</script>



<script> //calendar

$(function(){
    adjustCollapseView();
    $(window).on("resize", function(){
        adjustCollapseView();
    });
});





  $("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")

</script>

<script> //button next
 $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>

<style >
 $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</style>

