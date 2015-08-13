<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Listas
 *
 * @author Junior
 */
class Listas extends MY_Controller {

    private $dados;
    private $usr;
    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->model("Cliente_model","cliente");
        $this->usr = $this->session->userdata("id");
    }

    public function index(){

        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->load->view("client/listas",$this->dados);
    }

    public function nova(){
        $this->load->view("client/nova_lista");
    }

    public function salvar(){
        $this->cliente->saveLista($_POST,$this->usr);
        $this->notifica("sucesso","Lista salva com sucesso!");
        redirect(site_url("client/listas"));
    }

    public function editar($id) {
        $this->dados['listas'] = $this->cliente->getListas($this->usr,$id);
        $this->load->view("client/editar_lista",$this->dados);
    }

    public function atualizar(){
        $this->cliente->updateLista($_POST);
        $this->notifica("sucesso","Lista atualizada!");
        redirect(site_url("client/listas/"));
    }

    public function deletar($id){
        $this->cliente->deleteLista($id);
        $this->notifica("sucesso","Lista deletada com sucesso!");
        redirect(site_url("client/listas"));
    }
}
