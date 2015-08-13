<?php

class Assinantes extends MY_Controller {

    private $dados;
    private $usr;

    public function __construct() {
        parent::__construct();
        $this->load->model("Cliente_model", "cliente");
        $this->usr = $this->session->userdata("id");

        $this->checkLogin();
    }

    public function index() {
        $this->dados['assinantes'] = $this->cliente->getAssinantes($this->usr);
        $this->load->view("client/assinantes", $this->dados);
    }

    public function importar() {
        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->load->view("client/importar_assinante", $this->dados);
    }

    public function importarCSV(){

        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->load->view("client/importar_assinanteCSV", $this->dados);
    }

    public function salvar() {

        $ass = explode("\n", $_POST['assinantes']);
        $args = array();

        foreach ($ass as $texto) {

            $item = explode(",", $texto);

            if($this->cliente->checkDuplicado($item[0]) == 0) {

                if (strstr($item[0], "@")) {

                    $args['email_assinante'] = str_replace('\r', "", $item[0]);

                    if (isset($item[1])) {
                        $args['nm_assinante'] = $item[1];
                    }

                    $args['cd_lista'] = $_POST['cd_lista'];

                    $this->cliente->saveAssinante($args);
                    $this->notifica("sucesso","Assinantes importados com sucesso!");
                }else{
                    $this->notifica("erro","A importação falhou, favor verificar os emails da listagem e tente novamente");
                }
            }
        }

        redirect(site_url("client/assinantes"));
    }

    public function salvarCSV() {

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'csv';


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            echo $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            // print_r($data);
        }

        $path = $data['upload_data']['full_path'];

        $handle = fopen($path,"r");

        $args['cd_lista'] = $_POST['cd_lista'];


        while(($r = fgetcsv($handle,1000,";")) !== FALSE) {

            if($this->cliente->checkDuplicado(utf8_encode($r[0])) == 0) {

                if (strstr($r[0], "@")) {

                    $args['email_assinante'] = utf8_encode($r[0]);

                    if (isset($r[1])) {
                        $args['nm_assinante'] = utf8_encode($r[1]);
                    }

                    $this->cliente->saveAssinante($args);
                    $this->notifica("sucesso","Assinantes importados com sucesso!");
                }else{
                    $this->notifica("erro","A importação de algum(alguns) assinante(s) falhou, favor verificar os emails da listagem e tente novamente");
                }
            }

        }

        fclose($handle);

        unlink($path);

        redirect(site_url("client/assinantes"));
    }

    public function editar($id){
        $this->dados['assinante'] = $this->cliente->getAssinantes($this->usr,NULL,$id);
        $this->load->view("client/editar_assinante",$this->dados);
    }

    public function atualizar(){
        $this->cliente->updateAssinante($_POST);
        $this->notifica("sucesso","Informações do assinante atualizadas!");
        redirect(site_url("client/assinantes"));
    }

    public function deletar($id){
        $this->cliente->deleteAssinante($id);
        $this->notifica('sucesso',"Assinante deletado com sucesso!");
        redirect(site_url("client/assinantes"));
    }

}
