<!-- Include the style files -->
<link href="<?php echo base_url() ?>css/signup-form.css" type="text/css"/ rel="stylesheet" >

 <link rel="stylesheet" href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/js/bootstrap.min.js">
 <link href="<?php echo CI_BASE_URL ?>bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src= "<?php echo CI_BASE_URL ?>jquery/3.2.1/jquery.min.js"></script> 
<script src= "<?php echo CI_BASE_URL ?>bootstrap/moment.min.js"></script>
<?php include("lib_carian.php"); ?>

</head>

<body>



<div class="signup-form-container">
          <?php echo form_open('efast/semak_rekod', 'role="form" id="register-form" autocomplete="off"'); ?>

<!-- form start -->             
<div class="form-header">
  <h3 class="form-title"><i class="fa fa-user"></i> SEMAK NOMBOR DOKUMEN</h3>         
  <div class="pull-right">
    <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
  </div>        
</div>

<div class="form-group">
   <div class="input-group">
   <div class="input-group-addon">Nombor Dokumen</div>
   <input name="mykad" type="text" class="form-control" maxlength="12" placeholder="MYKAD,MYPR,MYKID,MYTENTERA">   
   <button type="submit" class="btn btn-info">
  <span class="glyphicon glyphicon-log-in"></span> pertanyaan
  </button>
   </div> 


   <span class="help-block" id="error"></span>                     
</div>
<!--       
<div class="form-footer">
  <button type="submit" class="btn btn-info">
  <span class="glyphicon glyphicon-log-in"></span> SEMAK MAKLUMAT
  </button>
</div>  -->
</form>

<!-- Include the js files -->
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/1.12.4-jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/3.3.7/js/register.js"></script>