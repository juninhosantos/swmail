<?php

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view("client/login");
    }

    public function autenticar() {
        $this->load->model("Cliente_model", "cliente");
        $usr = $this->cliente->getUsuario($_POST);
        $newdata = array(
            'username' => $usr->nm_cliente,
            'email' => $usr->nm_email_cliente,
            'id' => $usr->cd_cliente,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
        
        redirect(site_url("client"));
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("client"));
    }


}
