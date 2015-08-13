<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view("admin/login");
    }

    public function autenticar() {
        $this->load->model("Admin_model", "admin");
        $usr = $this->admin->getUsuario($_POST);
        $newdata = array(
            'username' => $usr->nm_administrador,
            'email' => $usr->nm_login,
            'id' => $usr->cd_matricula,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);

        redirect(site_url("administrator"));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("administrator"));
    }

}
