<?php

class Home extends CI_Controller {

    public function index() {
        $this->load->model("homemodel","hm");
        $result = $this->hm->getAllUsuarios();
        
        $this->load->view("home",array('r'=>$result));
    }
    
    public function verMais($link){
        
    }

}
