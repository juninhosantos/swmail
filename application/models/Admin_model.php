<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author Junior
 */
class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getClientes($cond=NULL){
    	$this->db->select("*")->from("tb_cliente");
        if($cond != NULL){
            $this->db->where($cond);
        }
    	return $this->db->get()->result();
    }

    public function salvarCliente($args){

        $cl = $this->getClientes(array('nm_email_cliente'=>$args['nm_email_cliente']));
        if(empty($cl)) {
            $args['nm_senha_cliente'] =md5($args['nm_email_cliente']);
            $this->db->insert('tb_cliente', $args);
        }
    }

    public function deletarCliente($id){
        $this->db->where('cd_cliente',$id);
        $this->db->update("tb_cliente",array("ic_cliente_ativo"=>0));
    }

    public function getUsuario($args){
        $args['nm_senha'] = md5($args['nm_senha']);
        $this->db->select("*")->from("tb_empresa")->where($args);
        return $this->db->get()->row();
    }

    public function updateCliente(){
        if(!isset($_POST['nm_senha_cliente']) || empty($_POST['nm_senha_cliente'])){
            unset($_POST['nm_senha_cliente']);
        }else{
            if(!empty($_POST['nm_senha_cliente'])) {
                $_POST['nm_senha_cliente'] = md5($_POST['nm_senha_cliente']);
            }
        }

        $id = $_POST['cd_cliente'];
        unset($_POST['cd_cliente']);
        $this->db->where("cd_cliente",$id);
        $this->db->update("tb_cliente",$_POST);
    }



}
