<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private $dados;

    public function index() {
        if(!$this->session->userdata('username')){
            redirect(site_url("administrator/login"));
        }
        $this->load->model("Admin_model", "admin");
        $this->dados['clientes'] = $this->admin->getClientes();
        $this->load->view('admin/dashboard', $this->dados);
    }

    public function pesquisar() {
        echo $_GET['s'];
    }

}
