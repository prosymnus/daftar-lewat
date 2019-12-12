<?php 	include("header.php");	
include("lib_carian.php");	?>
	


<link rel="stylesheet" href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/js/bootstrap.min.js">
<link href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src= "<?php echo CI_BASE_URL ?>jquery/3.2.1/jquery.min.js"></script>




<h3> PENDAFTARAN </h3>
<div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Maklumat Kanak-kanak</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Maklumat Pemaklum</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Maklumat Ibu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3">Maklumat Bapa</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">



    <div id="home" class="container tab-pane active"><br>

     
 		<h3> MAKLUMAT KANAK - KANAK</h3>
         <table width="600" >


 <?php echo form_open('efast/pendaftaran_record'); ?>
<tr>
    <td height="25"><strong>test field</strong></td>
    <td><strong>:&nbsp;</strong></td>
    <td width="672">  <input type="applicationno" class="input-efast" name="applicationno" id="applicationno" value="" /></td>
</tr>






<tr>
				<td height="30"><strong> Nombor Fail Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>


                <td width="475"><input type="no_file"  class="input-efast"  name="no_file" id="no_file" value="<?php  if (isset($no_file)) { 
						    echo $no_file; } 
					    else {
							echo set_value('no_file'); 
							} ?>" </td>
</tr>



<tr>
				<td height="30" width="250"><strong> Tarikh Permohonan </strong></td>   
             <td width="10"><strong>:&nbsp;</strong></td>
                <td width="200"><input type="applicationdate"  class="input-efast"  name="applicationdate " id="applicationdate " value="<?php  if (isset($applicationdate )) { 
						    echo $applicationdate ; } 
					    else {
							echo set_value('applicationdate '); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Nombor Permohonan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="applicationno"  class="input-efast"  name="applicationno" id="applicationno" value="<?php  if (isset($applicationno)) { 
						    echo $applicationno; } 
					    else {
							echo set_value('applicationno'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> tarikh lahir  </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tarikhlahir"  class="input-efast"  name="tarikhlahir" id="tarikhlahir" value="<?php  if (isset($tarikhlahir)) { 
						    echo $tarikhlahir; } 
					    else {
							echo set_value('tarikhlahir'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Agama </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="religion_id "  class="input-efast"  name="religion_id " id="religion_id " value="<?php  if (isset($religion_id )) { 
						    echo $religion_id ; } 
					    else {
							echo set_value('religion_id '); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Nama Kanak-kanak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namakanak"  class="input-efast"  name="namakanak" id="namakanak" value="<?php  if (isset($namakanak)) { 
						    echo $namakanak; } 
					    else {
							echo set_value('namakanak'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Bangsa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="race_id"  class="input-efast"  name="race_id" id="race_id" value="<?php  if (isset($race_id)) { 
						    echo $race_id; } 
					    else {
							echo set_value('race_id'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Tempat Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir1 "  class="input-efast"  name="tempatlahir1 " id="tempatlahir1 " value="<?php  if (isset($tempatlahir1 )) { 
						    echo $tempatlahir1 ; } 
					    else {
							echo set_value('tempatlahir1 '); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong></strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tempatlahir2 "  class="input-efast"  name="tempatlahir2 " id="tempatlahir2 " value="<?php  if (isset($tempatlahir2 )) { 
						    echo $tempatlahir2 ; } 
					    else {
							echo set_value('tempatlahir2 '); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Nama Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nama_medic"  class="input-efast"  name="nama_medic" id="nama_medic" value="<?php  if (isset($nama_medic)) { 
						    echo $nama_medic; } 
					    else {
							echo set_value('nama_medic'); 
							} ?>" </td>
</tr>



<tr>
				<td height="30"><strong> No. Pengenalan Penyambut Kelahiran </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="id_medic"  class="input-efast"  name="id_medic" id="id_medic" value="<?php  if (isset($id_medic)) { 
						    echo $id_medic; } 
					    else {
							echo set_value('id_medic'); 
							} ?>" </td>
</tr>



<tr>
				<td height="30"><strong> Pekerjaan Penyambut Kelahiran </strong></td>   
             <td width="15"><strong>:&nbsp;</strong></td>
                <td width="475"><input type="job_medic"  class="input-efast"  name="job_medic" id="job_medic" value="<?php  if (isset($job_medic)) { 
						    echo $job_medic; } 
					    else {
							echo set_value('job_medic'); 
							} ?>" </td>
</tr>





<tr>
				<td height="30"><strong> No Daftar Lahir </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nodaftarlahir"  class="input-efast"  name="nodaftarlahir" id="nodaftarlahir" value="<?php  if (isset($nodaftarlahir)) { 
						    echo $nodaftarlahir; } 
					    else {
							echo set_value('nodaftarlahir'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> No. Kad Pengenalan Anak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="chd_hsc_no"  class="input-efast"  name="chd_hsc_no" id="chd_hsc_no" value="<?php  if (isset($chd_hsc_no)) { 
						    echo $chd_hsc_no; } 
					    else {
							echo set_value('chd_hsc_no'); 
							} ?>" </td>
</tr>

<tr>  <td height="100"></td></tr>




</table>

<div class="well text-center"> </div>
    
    </div>






    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Maklumat Pemaklum</h3>
       <table width="600" >
     

<tr>
				<td height="30"><strong> Nama Penganjur 1</strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur1"  class="input-efast"  name="namapenganjur1" id="namapenganjur1" value="<?php  if (isset($namapenganjur1)) { 
						    echo $namapenganjur1; } 
					    else {
							echo set_value('namapenganjur1'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> No. Pengenalan Penganjur 1 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="nokppenganjur1"  class="input-efast"  name="nokppenganjur1" id="nokppenganjur1" value="<?php  if (isset($nokppenganjur1)) { 
						    echo $nokppenganjur1; } 
					    else {
							echo set_value('nokppenganjur1'); 
							} ?>" </td>
</tr>


<tr>
			<td height="30"><strong>  Alamat Penganjur 1  </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
               <td width="475"><input type="alamatpenganjur1"  class="input-efast"  name="alamatpenganjur1" id="alamatpenganjur1" value="<?php  if (isset($alamatpenganjur1)) { 
						    echo $alamatpenganjur1; } 
					    else {
							echo set_value('alamatpemaklum1'); 
							} ?>" /></td>  </tr> 
                
                
                
          
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
                
              <td width="475"><input type="alamatpenganjur2"  class="input-efast"  name="alamatpenganjur2" id="alamatpenganjur2" value="<?php  if (isset($alamatpenganjur2)) { 
						    echo $alamatpenganjur2; } 
					    else {
							echo set_value('alamatpenganjur2'); 
							} ?>" /></td>  </tr> 
                
                
            <tr>
			<td height="30"><strong> </strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="alamatpenganjur3"  class="input-efast"  name="alamatpenganjur3" id="alamatpenganjur3" value="<?php  if (isset($alamatpenganjur3)) { 
						    echo $alamatpenganjur3; } 
					    else {
							echo set_value('alamatpenganjur3'); 
							} ?>" /></td>  </tr> 
                
           
            <tr>
			<td height="30"><strong> Poskod</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="kodposkodpenganjur"  class="input-efast"  name="kodposkodpenganjur" id="kodposkodpenganjur" value="<?php  if (isset($kodposkodpenganjur)) { 
						    echo $kodposkodpenganjur; } 
					    else {
							echo set_value('kodposkodpenganjur'); 
							} ?>" /></td>  </tr> 
                
            <tr>
			<td height="30"><strong> Bandar</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="kodbandar_penganjur"  class="input-efast"  name="kodbandar_penganjur" id="kodbandar_penganjur" value="<?php  if (isset($kodbandar_penganjur)) { 
						    echo $kodbandar_penganjur; } 
					    else {
							echo set_value('kodbandar_penganjur'); 
							} ?>" /></td>  </tr> 
                  
           <tr>
			<td height="30"><strong> Negeri</strong></td>   
                <td><strong>:&nbsp;</strong></td> 
				
              <td width="475"><input type="kodnegeri_penganjur"  class="input-efast"  name="kodnegeri_penganjur" id="kodnegeri_penganjur" value="<?php  if (isset($kodnegeri_penganjur)) { 
						    echo $kodnegeri_penganjur; } 
					    else {
							echo set_value('kodnegeri_penganjur'); 
							} ?>" /></td>  </tr> 
           





<tr>
				<td height="30"><strong> Nama Penganjur 2 </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namapenganjur2"  class="input-efast"  name="namapenganjur2" id="namapenganjur2" value="<?php  if (isset($namapenganjur2)) { 
						    echo $namapenganjur2; } 
					    else {
							echo set_value('namapenganjur2'); 
							} ?>" </td>
</tr>





<tr>
				<td height="30"><strong> Jenis Penganjur ID </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="jenispenganjur_id"  class="input-efast"  name="jenispenganjur_id" id="jenispenganjur_id" value="<?php  if (isset($jenispenganjur_id)) { 
						    echo $jenispenganjur_id; } 
					    else {
							echo set_value('jenispenganjur_id'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Negara Pengeluar id Penganjur</strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="negarapengeluar_id"  class="input-efast"  name="negarapengeluar_id" id="negarapengeluar_id" value="<?php  if (isset($negarapengeluar_id)) { 
						    echo $negarapengeluar_id; } 
					    else {
							echo set_value('negarapengeluar_id'); 
							} ?>" </td>
</tr>

<tr>  <td height="100"></td></tr>



    </table>
    <div class="well text-center"> </div>
    </div>










    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Maklumat Ibu</h3>
       <table width="600" >
      

<tr>
				<td height="30"><strong> Nama Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namaibu"  class="input-efast"  name="namaibu" id="namaibu" value="<?php  if (isset($namaibu)) { 
						    echo $namaibu; } 
					    else {
							echo set_value('namaibu'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> No. Pengenalan Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="ibu_id"  class="input-efast"  name="ibu_id" id="ibu_id" value="<?php  if (isset($ibu_id)) { 
						    echo $ibu_id; } 
					    else {
							echo set_value('ibu_id'); 
							} ?>" </td>
</tr>


<tr>
				<td height="30"><strong> Jenis Pengenalan Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="jenis_id_ibu"  class="input-efast"  name="jenis_id_ibu" id="jenis_id_ibu" value="<?php  if (isset($jenis_id_ibu)) { 
						    echo $jenis_id_ibu; } 
					    else {
							echo set_value('jenis_id_ibu'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Negara Pengeluar Pengenalan Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="negara_id_ibu"  class="input-efast"  name="negara_id_ibu" id="negara_id_ibu" value="<?php  if (isset($negara_id_ibu)) { 
						    echo $negara_id_ibu; } 
					    else {
							echo set_value('negara_id_ibu'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Warganegara Ibu </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="warganegara_ibu"  class="input-efast"  name="warganegara_ibu" id="warganegara_ibu" value="<?php  if (isset($warganegara_ibu)) { 
						    echo $warganegara_ibu; } 
					    else {
							echo set_value('warganegara_ibu'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Status Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="status_perkahwinan"  class="input-efast"  name="status_perkahwinan" id="status_perkahwinan" value="<?php  if (isset($status_perkahwinan)) { 
						    echo $status_perkahwinan; } 
					    else {
							echo set_value('status_perkahwinan'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> No. Sijil Kahwin </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="No_Sijil_Kahwin"  class="input-efast"  name="No_Sijil_Kahwin" id="No_Sijil_Kahwin" value="<?php  if (isset($No_Sijil_Kahwin)) { 
						    echo $No_Sijil_Kahwin; } 
					    else {
							echo set_value('No_Sijil_Kahwin'); 
							} ?>" </td>
</tr>



<tr>
				<td height="30"><strong> Tarikh Perkahwinan </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="tarikh_perkahwinan"  class="input-efast"  name="tarikh_perkahwinan" id="tarikh_perkahwinan" value="<?php  if (isset($tarikh_perkahwinan)) { 
						    echo $tarikh_perkahwinan; } 
					    else {
							echo set_value('tarikh_perkahwinan'); 
							} ?>" </td>
</tr>




<tr>
				<td height="30"><strong> Bilangan Anak </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bilangan_anak"  class="input-efast"  name="bilangan_anak" id="bilangan_anak" value="<?php  if (isset($bilangan_anak)) { 
						    echo $bilangan_anak; } 
					    else {
							echo set_value('bilangan_anak'); 
							} ?>" </td>
</tr>



<tr>
				<td height="30"><strong> Subjek adalah anak yang pertama / ke </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="rank_anak"  class="input-efast"  name="rank_anak" id="rank_anak" value="<?php  if (isset($rank_anak)) { 
						    echo $rank_anak; } 
					    else {
							echo set_value('rank_anak'); 
							} ?>" </td>
</tr>


<tr>  <td height="100"></td></tr>







    </div>


    </table>
    <div class="well text-center"> </div>
    </div>




<div id="menu3" class="container tab-pane fade"><br>
      <h3>Maklumat Bapa</h3>
       <table width="600" >
      


<tr>
				<td height="30"><strong> Nama Bapa</strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="namabapa"  class="input-efast"  name="namabapa" id="namabapa" value="<?php  if (isset($namabapa)) { 
						    echo $namabapa; } 
					    else {
							echo set_value('namabapa'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> No. Pengenalan Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="bapa_id"  class="input-efast"  name="bapa_id" id="bapa_id" value="<?php  if (isset($bapa_id)) { 
						    echo $bapa_id; } 
					    else {
							echo set_value('bapa_id'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Jenis Pengenalan Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="jenis_id_bapa"  class="input-efast"  name="jenis_id_bapa" id="jenis_id_bapa" value="<?php  if (isset($jenis_id_bapa)) { 
						    echo $jenis_id_bapa; } 
					    else {
							echo set_value('jenis_id_bapa'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Negara Pengenalan Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="negara_id_bapa"  class="input-efast"  name="negara_id_bapa" id="negara_id_bapa" value="<?php  if (isset($negara_id_bapa)) { 
						    echo $negara_id_bapa; } 
					    else {
							echo set_value('negara_id_bapa'); 
							} ?>" </td>
</tr>

<tr>
				<td height="30"><strong> Warganegara Bapa </strong></td>   
             <td><strong>:&nbsp;</strong></td>
                <td width="475"><input type="warganegara_bapa"  class="input-efast"  name="warganegara_bapa" id="warganegara_bapa" value="<?php  if (isset($warganegara_bapa)) { 
						    echo $warganegara_bapa; } 
					    else {
							echo set_value('warganegara_bapa'); 
							} ?>" </td>
</tr>


<tr>  <td height="100"></td></tr>





    </div>
    </table>



 <div class="well text-center">
    <input type="submit" name="semak" class="btn btn-success" value="SIMPAN" >
      
    <button onClick="window.location.href = '<?php echo base_url();?>index.php/efast/dashboard_efast';return false;"class="btn btn-danger">BATAL</button>
</div>




    </div>


  </div>
</div>























       
   



   <?php 	include("footer.php");	?>  </table>