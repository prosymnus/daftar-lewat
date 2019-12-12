<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<title><?php ?></title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  
    
    
 <link rel="stylesheet" href="<?php echo CI_BASE_URL ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo CI_BASE_URL ?>css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo CI_BASE_URL ?>css/master_carian.css">
<link rel="stylesheet" href="<?php echo CI_BASE_URL ?>css/dataTables.bootstrap.css">


<link href="<?php echo CI_BASE_URL ?>css/jquery.growl.css" rel="stylesheet" type="text/css" />


<script src= "<?php echo CI_BASE_URL ?>js/jquery-1.11.2.min.js"></script>
<script src= "<?php echo CI_BASE_URL ?>js/bootstrap.min.js"></script> 
<script src="<?php echo CI_BASE_URL ?>js/jquery.growl.js" type="text/javascript"></script>
<script src= "<?php echo CI_BASE_URL ?>js/jquery.dataTables.js"></script>
<script src= "<?php echo CI_BASE_URL ?>js/dataTables.bootsrap.js"></script>




  <!-- Include the Cufon files -->
  <script src="<?php echo CI_BASE_URL ?>js/cufon.js" type="text/javascript"></script>
  <script src="<?php echo CI_BASE_URL ?>js/Aller_400.font.js" type="text/javascript"></script>

  <!-- CSS Browser Compatibility -->
  <script src="<?php echo CI_BASE_URL ?>js/css_browser_select.js" type="text/javascript"></script>

  <!-- Initialize Cufon -->
  <script type="text/javascript">
    Cufon.replace('h1, h2, h3');
    Cufon.replace('ul#nav li a', {hover: true});
    Cufon.replace('blockquote p');
    
    Cufon.replace('#mainSlider h3, .sliderParagraph');
    
    Cufon.replace('a.darkButton');
  </script>
  
    
    <style type="text/css">
    .bs-example{
      margin: 20px;
    }
</style>
<script type="text/javascript">

    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
</script>

</head>
<body>


  <!-- Logo & Contact Info -->
  <div id="topContainer">
    
  </div> <!-- end topContainer -->

    

  <!-- Menu Container -->
    
    
    <div class="bs-example">
    <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">navigation</span>
                  <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <?php if(isset($loginsession) && $loginsession){ ?>
          
        <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>index/senarai_sistem" title="User">SENARAI SISTEM</a></li>
     <!--    <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/PENDAFTARAN" title="User">PENDAFTARAN</a></li>  -->

         <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">PENDAFTARAN <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/PENDAFTARAN">PENDAFTARAN</a></li>
                    <li class="divider"></li>
                        <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/pembetulan">PEMBETULAN</a></li>
                    </ul>
        </li>

                
                <li >
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">DASHBOARD EFAST<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/carian_efast">CARIAN REKOD</a></li>
                    <li class="divider"></li>
                        <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/duplicate_lebih2">SENARAI DUPLIKASI REKOD</a></li>
                    </ul>

<!-- akses by id  -->

<?php if ($sirenK1 != '01000000') : ?>


         <!-- <li><a href="">MyIRES - KELAHIRAN</a></li>   
                <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>laporan_kkm/dashboard_KKM">MyIRES - KELAHIRAN</a></li>   -->
                 <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>report/status_permohonan">STATISTIK DAN CARTA</a></li> 

 <?php else: ?>


<?php endif ?>

<!-- akses by id  -->
        
                <?php }else { ?>
                <li><a href="<?php echo CI_BASE_URL?>" title="Home">LAMAN UTAMA</span></a></li>
        <li><a href="login" title="Home">Log In </a></li>               
                <?php } ?>
            </ul>
             <?php if(isset($loginsession) && $loginsession){ ?>
            <ul class="nav navbar-nav navbar-right">
            <div class="pull-right">
                <ul class="nav pull-right">
            
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $oper_id ?> <?php echo $oper_bc ?></span> <b class="caret"></b></a>
          
           <ul class="dropdown-menu">
                            <li><a href="<?php echo CI_BASE_URL.CI_INDEX_PAGE ?>efast/profile_pengguna"><i class="icon-cog"></i>Tukar Katalaluan</a></li>
                            
                            <li class="divider"></li>
                  
                <li><a href="<?php echo CI_BASE_URL ?>index.php/index/logout">Log Keluar</a></li>
                 <?php } ?>
            </ul>
          
           
        </div>
    </nav>


</div>

  
