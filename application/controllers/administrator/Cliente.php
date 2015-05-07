<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

   	private $dados;

    public function novo() {
    	
        $this->load->view('admin/novo_cliente',$this->dados);
    }
    
    public function pesquisar(){
        echo $_GET['s'];
    }

}
