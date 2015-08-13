<?php
class Conta extends MY_Controller
{

    private $dados;
    private $usr;

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model("Cliente_model", "cliente");
        $this->usr = $this->session->userdata("id");
    }

    public function index()
    {
        

        $this->dados['info'] = $this->cliente->getUsuario(array('cd_cliente'=>$this->usr));
        $cota = $this->cliente->getCota($this->usr);
        $this->dados['cota'] = $cota->total - $cota->enviado;

       $this->load->view("client/conta", $this->dados);

    }

    public function atualizar(){
        $this->cliente->updateCliente();

        redirect(site_url("client/conta"));
    }
}