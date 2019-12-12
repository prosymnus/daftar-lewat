<?php

class Pdf_Controller extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->library('Pdf_Library');
	}





public function pdf_minit($apl_no){

	$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['detail'] = $this->inq_model->print_minit($apl_no);

		$this->load->view('/cetakan/minit',$thisdata);


	}

public function pdf_example(){

		$this->load->view('/contoh/example');


	}

public function pdf_kulit($apl_no){
		$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['detail'] = $this->inq_model->print_kulit($apl_no);
		$this->load->view('cetakan/kulit',$thisdata);


	}
public function pdf_maklumat($apl_no){

		$this->load->library('session');
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		$thisdata = $this->lib_global->profileUser();
		
		$thisdata['detail'] = $this->inq_model->print_maklumat($apl_no);
		$this->load->view('/cetakan/maklumat',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}

public function pdf_plkb1($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_plkb($apl_no);
		$this->load->view('cetakan/plkb1',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}


public function pdf_checklist(){

		$this->load->view('/cetakan/checklist');


	}


public function pdf_lampiranA($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_lampiranA($apl_no);
		$this->load->view('/cetakan/lampiranA',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}

public function pdf_lampiranB1($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_lampiranB1($apl_no);
		$this->load->view('/cetakan/lampiranB1',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}

public function pdf_minit_plkb($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_minit_plkb($apl_no);
		$this->load->view('/cetakan/minit_plkb',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}


public function pdf_lampiranC($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_lampiranC($apl_no);
		$this->load->view('/cetakan/lampiranC',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}


public function pdf_lampiranD($apl_no){

	$this->load->library('session');
		
		$this->load->model('inq_model');
		$this->load->helper('security');
		$this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->library('Lib_global');
		$this->load->library('Pdf');
		
		$thisdata = $this->lib_global->profileUser();
		$thisdata['detail'] = $this->inq_model->print_lampiranD($apl_no);
		$this->load->view('/cetakan/lampiranD',$thisdata);

	//	$this->load->view('/contoh/plkb1');
	}



}