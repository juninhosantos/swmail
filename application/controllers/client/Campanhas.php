<?php

class Campanhas extends MY_Controller{

    private $dados;
    private $usr;

    public function __construct() {
        parent::__construct();
        $this->load->model("Cliente_model", "cliente");
        $this->usr = $this->session->userdata("id");

        $this->checkLogin();
    }

    public function index(){
        $this->dados['campanhas'] = $this->cliente->getCampanhas($this->usr);
        $this->load->view("client/campanhas",$this->dados);

    }

    public function nova(){

        if (!$this->session->userdata('username')) {
            redirect(site_url("client/login"));
        }
        

        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->load->helper('ckeditor');

        // Array com as configurações pra essa instância do CKEditor ( você pode ter mais de uma )
        $this->dados['ckeditor_texto1'] = array
        (
            //id da textarea a ser substituída pelo CKEditor
            'id'   => 'texto1',

            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
            'path' => 'ckeditor',

            // configurações opcionais
            'config' => array(
                'toolbar' => "Basic",
                'filebrowserBrowseUrl'      => base_url().'ckeditor/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Images',
                'filebrowserFlashBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Flash',
                'filebrowserUploadUrl'      => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserFlashUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );
        $this->load->view("client/nova_campanha",$this->dados);
    }

    public function salvar(){
        $_POST['cd_cliente']  = $this->usr;

        isset($_POST['enviar']) ? $enviar =  $_POST['enviar'] : "";
        unset($_POST['enviar']);

        $id = $this->cliente->salvarCampanha($_POST);

        if(isset($enviar)){
            redirect(site_url('client/campanhas/enviar/'.$id));
        }
        $this->notifica('sucesso','Campanha salva com sucesso!');
        redirect(site_url('client/campanhas/'));
    }

    public function editar($id){

        if (!$this->session->userdata('username')) {
            redirect(site_url("client/login"));
        }
        

        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->dados['info'] = $this->cliente->getCampanha($id);
        $this->load->helper('ckeditor');

        // Array com as configurações pra essa instância do CKEditor ( você pode ter mais de uma )
        $this->dados['ckeditor_texto1'] = array
        (
            //id da textarea a ser substituída pelo CKEditor
            'id'   => 'texto1',

            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
            'path' => 'ckeditor',

            // configurações opcionais
            'config' => array(
                'toolbar' => "Basic",
                'filebrowserBrowseUrl'      => base_url().'ckeditor/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Images',
                'filebrowserFlashBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Flash',
                'filebrowserUploadUrl'      => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserFlashUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );
        $this->load->view('client/edit_campanha',$this->dados);
    }

    public function atualizar(){
        $id = $_POST['cd_campanha'];
        isset($_POST['enviar']) ? $enviar =  $_POST['enviar'] : "";
        unset($_POST['enviar']);
        $this->cliente->atualizarCampanha($_POST);

        if(isset($enviar)){
            redirect(site_url('client/campanhas/enviar/'.$id));
        }
        $this->notifica('sucesso','Campanha atualizada com sucesso!');
        redirect(site_url('client/campanhas/editar/'.$id));
    }

    public function deletar($id){
        $this->cliente->deletarCampanha($id);
        $this->notifica("sucesso","Campanha deletada com sucesso!");
        redirect(site_url('client/campanhas/'));
    }

    public function enviar($id){
        if (!$this->session->userdata('username')) {
            redirect(site_url("client/login"));
        }
        
        
        $this->dados['id'] = $id;
        $this->load->view("client/enviar", $this->dados);
    }

    public function ver($id){
        $this->dados['listas'] = $this->cliente->getListas($this->usr);
        $this->dados['info'] = $this->cliente->getCampanha($id);
        $this->load->view('client/ver_campanha',$this->dados);
    }

    public function reenviar($id){
        $insertId = $this->cliente->duplicarCampanha($id);
        redirect(site_url('client/campanhas/editar/'.$insertId));
    }

    public function sendMail($id){
        $cota = $this->cliente->getCota($this->usr);
        $restantes = $cota->total - $cota->enviado;
        $campanha = $this->cliente->getCampanha($id);
        $assinantes = $this->cliente->getAssinantes($this->usr,$campanha[0]->cd_lista);
        echo '<link href="'.base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo ' <table class="table table-striped">';
        foreach($assinantes as $i){
            if($restantes > 0) :
                $this->cliente->salvarEnvio($i->cd_assinante,$id);

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mx1.hostinger.com.br',
                    'smtp_port' => 587,
                    'smtp_user' => 'contato@swmail.16mb.com',
                    'smtp_pass' => '1020304050',
                    'mailtype'  => 'html',
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE

                );
                $this->load->library('email', $config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");
                $this->email->from($campanha[0]->nm_email_remetente, $campanha[0]->nm_remetente);

                //$list = array('joseleonidasjunior@gmail.com');
                $msg = $campanha[0]->ds_mensagem;
                $msg = str_replace('href="', 'href="'.site_url('client/relatorios/getInteracao/2/'.$i->cd_assinante."/".$campanha[0]->cd_campanha)."/?return=" , $msg);
                $this->email->to($i->email_assinante);
                $this->email->subject($campanha[0]->nm_assunto);
                $this->email->message($msg."<img style='display:none' src='".site_url('client/relatorios/getInteracao/1/'.$i->cd_assinante."/".$campanha[0]->cd_campanha)."' />" );

                $this->email->send();
                ?>

                <tr>
                    <?php if(!empty($i->nm_assinante)) : ?>
                        <td><?= $i->nm_assinante ?></td>
                    <?php  endif; ?>
                    <td><?= $i->email_assinante; ?></td>
                    <td style="color:green">OK</td>
                </tr>

                <?php
                @ ob_flush();
                @ flush();
                sleep(4);
            else:
                echo "<tr><td><h3>VOCÊ ATINGIU A COTA DE ENVIOS</h3></td></tr>";
                echo '</table>';
                $this->cliente->atualizarCampanha(array('cd_campanha'=>$id,'ic_status'=>1));
                exit();
            endif;

            $restantes--;
        }

        echo '</table>';

        $this->cliente->atualizarCampanha(array('cd_campanha'=>$id,'ic_status'=>1));
    }



}