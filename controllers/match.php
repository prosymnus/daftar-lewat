<?php

class Match extends Controller {

 public function __construct()
 {
 parent::Controller();
 $this->load->model('report_m');
 }

 public function index()
 {

 }

 public function list_dropdown()
 {
 $tnmnt_id = $this->input->post('tnmnt'); //Read the tournament id sent by POST
 $matches = $this->report_m->get_record_by_apl_no($tnmnt_id); //Get the matches list for that tournament from the DB
 $teams = array(); //We store the names of the teams in the form "team_id" => "team_name"
 if(!empty($matches))
 {
     foreach($matches as $match)
     {
         if(!array_key_exists($match["teama"], $teams))
         {
             $team_name_A = $this->team_model->get_team_name($match["teama"]);
             $teams[$match["teama"]] = $team_name_A;
         }
         if(!array_key_exists($match["teamb"], $teams))
         {
             $team_name_B = $this->team_model->get_team_name($match["teamb"]);
             $teams[$match["teamb"]] = $team_name_B;
         }
     }
 }
 $data["matches"] = $matches;
 $data["teams"] = $teams;
 $this->load->view('list_dropdown_view',$data);
 }
}


?>