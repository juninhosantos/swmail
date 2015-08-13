<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

   	private $dados;

    public function __construct() {
        parent::__construct();
        $this->load->model("Admin_model", "admin");

        if (!$this->session->userdata('username')) {
            redirect(site_url("administrator/login"));
        }

    }

    public function novo() {
    	
        $this->load->view('admin/novo_cliente',$this->dados);
    }

    public function editar($id) {
        $r = $this->admin->getClientes(array('cd_cliente'=>$id));
        $this->dados['info'] = $r[0];
        $this->load->view('admin/editar_cliente',$this->dados);
    }
    
    public function salvar(){

        $_POST['cd_matricula'] = $this->session->userdata('id');

        $this->admin->salvarCliente($_POST);

        redirect(site_url("administrator"));
    }

    public function atualizar(){
        $id = $_POST['cd_cliente'];
        $this->admin->updateCliente();

        redirect(site_url("administrator/cliente/editar/".$id));
    }



    public function excluir($id){
        $this->admin->deletarCliente($id);
        redirect(site_url("administrator"));
    }

}
