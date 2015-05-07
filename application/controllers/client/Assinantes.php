<?php

class Assinantes extends CI_Controller {

    private $dados;
    private $usr;

    public function __construct() {
        parent::__construct();
        $this->load->model("Cliente_model", "cliente");
        $this->usr = $this->session->userdata("id");
    }

    public function index() {
        $this->dados['assinantes'] = $this->cliente->getAssinantes($this->usr);
        $this->load->view("client/assinantes", $this->dados);
    }

    public function importar() {
        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->load->view("client/importar_assinante", $this->dados);
    }

    public function salvar() {
        
        $ass = explode("\n", $_POST['assinantes']);
        $args = array();
        foreach ($ass as $texto) {

            $item = explode(",", $texto);

            if (strstr($item[0], "@")) {
                
                $args['email_assinante'] = str_replace('\r', "",$item[0]);
                
                if(isset($item[1])) {
                    $args['nm_assinante'] = $item[1];
                }
                
                $args['cd_lista'] =  $_POST['cd_lista'];

                $this->cliente->saveAssinante($args);
            }
        }

        redirect(site_url("client/assinantes"));
    }
    
    public function editar($id) {
        $this->dados['assinante'] = $this->cliente->getAssinantes($this->usr,$id);
        $this->load->view("client/editar_assinante",$this->dados);
    }
    
    public function atualizar(){
        $this->cliente->updateAssinante($_POST);
        redirect(site_url("client/assinantes"));
    }
    
     public function deletar($id){
        $this->cliente->deleteAssinante($id);
        redirect(site_url("client/assinantes"));
    }

}
