
<link href="<?php echo base_url() ?>css/signup-form.css" type="text/css"/ rel="stylesheet" >

<?php include("lib_pelanggan.php"); ?>

</head>

<body>
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
         $db2_bdate     = trim($row['GPN_BIRTHDATE']);
         $db2_gender    = trim($row['GPN_SEX_CD']); 
         $db2_religion  = trim($row['GPN_REL_CD']);
         $db2_race      = trim($row['GPN_RACE_CD']);
         $db2_cit_stat  = trim($row['GPN_CIT_STAT']);
         $db2_add1      = trim($row['GPN_ADDR1']);
         $db2_add2      = trim($row['GPN_ADDR2']);
         $db2_add3      = trim($row['GPN_ADDR3']);
         $db2_postcd    = trim($row['GPN_POSTCD']);
         $db2_city_cd   = trim($row['GPN_CITY_CD']);
         $db2_state_cd  = trim($row['GPN_STATE_CD']);

  
         $desc_rel = get_religion('REL','agama', $db2_religion);
         $desc_race = get_race_desc('RACE','race', $db2_race);



        if ($db2_gender == 'P'){

            $desc_gender = 'PEREMPUAN';
        } else if ($db2_gender == 'L'){

            $desc_gender = 'LELAKI';
        }
        
         $desc_city = get_city_desc('CITY','city',$db2_city_cd);
         $desc_state = get_state_desc('NEG','state',$db2_state_cd);
        
         //$add4 = $db2_postcd .' '.$desc_city ;
         $add5 = $desc_state;
      }
    }


 ?>   

  <div id="ajax-content-container"> 
        
    <div class="signup-form-container">
          <?php echo form_open('pelanggan/simpan_maklumat', 'role="form" id="register-form" autocomplete="off"'); ?>
         <!-- form start -->

        <!-- semua medan yang diambil dari db2 utk pass to controllers -->
         <input name="ctry_cd" type="hidden" value='3000'>
         <input name="mykad" type="hidden" value="<?php echo $db2_icno; ?>">
         <input name="name" type="hidden" value="<?php echo $db2_name; ?>">
         <input name="race" type="hidden" value="<?php echo $db2_race; ?>">
         <input name="agama" type="hidden" value="<?php echo $db2_religion; ?>">
         <input name="gen_cd" type="hidden" value="<?php echo $db2_gender; ?>">
         <input name="postcd" type="hidden" value="<?php echo $db2_postcd; ?>">
         <input name="city_cd" type="hidden" value="<?php echo $db2_city_cd; ?>">
         <input name="state_cd" type="hidden" value="<?php echo $db2_state_cd; ?>">

         <div class="form-header">
          <h3 class="form-title"><i class="fa fa-user"></i> MAKLUMAT PELANGGAN</h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
         
         <div class="form-body">

          <div class="form-group">
              <div class="input-group">
               <div class="input-group-addon">BAHAGIAN</div>
               <input name="text6" type="disabled" class="form-control" placeholder="WARGANEGARA" disabled>
               </div>
               <span class="help-block" id="error"></span>
          </div>

          <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon">Jenis Dokumen <font color="#FF0000">*</font></div>
                   <?php  echo get_entity_combo("DCMY","doc_type",set_value('doc_type'));?>
                   </div> 
                   <span class="help-block" id="error"></span>                     
           </div>
         
         <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Negara Pengeluar </div>
              <input name="text7" type="disabled" class="form-control" placeholder="MALAYSIA" disabled>
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>

        <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Nombor Dokumen </div>
               <input name="text1" disabled class="form-control" value="<?php echo $db2_icno; ?>">
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>
                  
        <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Nama Penuh </div>
               <input name="text2" disabled class="form-control" value="<?php echo $db2_name; ?>">
               </div>
               <span class="help-block" id="error"></span>
          </div>
           <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Jantina </div>
              
                <input name="text3" disabled class="form-control" value="<?php echo $desc_gender; ?>">
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>

           <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Keturunan </div>
                <input name="text4" disabled class="form-control" value="<?php echo $desc_race; ?>">
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>
        
           <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Agama </div>
             
               <input name="text5" disabled class="form-control" value="<?php echo $desc_race; ?>">
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>

              <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon" style="vertical-align:top">Alamat <font color="#FF0000">*</font></div>
               <input name="add1" type="text" class="form-control" value="<?php echo $db2_add1; ?>">
               <input name="add2" type="text" class="form-control" value="<?php echo $db2_add2; ?>">
               <input name="add3" type="text" class="form-control" value="<?php echo $db2_add3; ?>">
               
               <!--<input name="add4" type="text" class="form-control" value="<?php //echo $add4; ?>">-->
               <!--<input name="add5" type="text" class="form-control" value="<?php //echo $add5; ?>">-->
               </div> 

               <span class="help-block" id="error"></span>                     
          </div>
          
          <!-- Tambah 20.04.2017 -->

              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon">POSKOD <font color="#FF0000">*</font></div>
                    <input name="postcd" type="text" class="form-control" onKeyPress="return isNumberKey(event)" value="<?php echo $db2_postcd; ?>" maxlength="5">
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon">BANDAR <font color="#FF0000">*</font></div>
                   <?php if (isset($db2_city_cd)) {  echo get_entity_combo("CITY","city_cd",$db2_city_cd); } ?>
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon">NEGERI <font color="#FF0000">*</font></div>
                   <?php if (isset($db2_state_cd)) {  echo get_entity_combo("NEG","state_cd",$db2_state_cd); } ?>
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
          
          <!-- End of Tambah 20.04.2017 -->
                    
          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Nombor Telefon </div>
               <input name="phone" type="text" class="form-control" onKeyPress="return isNumberKey(event)" maxlength="12">
               </div> 
               (Isikan tanpa tanda '-')
               <span class="help-block" id="error"></span>                     
          </div>

       
          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Urusan <font color="#FF0000">*</font></div>
               <?php  echo get_entity_combo("URUS","urusan",set_value('urusan'));?>
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>

          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon">Catatan</div>
               <textarea class="form-control" rows="5" name="catatan"></textarea>
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>

        <div class="form-footer">
             <button type="submit" class="btn btn-info">
             <span class="glyphicon glyphicon-log-in"></span> SIMPAN MAKLUMAT
             </button>
        </div>


        </form>
        
       </div>



   </div>

    
  </div>
    
    <!-- Include the js files -->
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/1.12.4-jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/register.js"></script>
<script type="text/javascript">

function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	else
	return true;
}		

</script>    

</body>
</html>
