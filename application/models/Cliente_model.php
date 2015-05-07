<?php

class Cliente_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getUsuario($args){
        $args['ic_cliente_ativo'] = 1;
        $args['nm_senha_cliente'] = md5($args['nm_senha_cliente']);
    	$this->db->select("nm_email_cliente,nm_cliente,cd_cliente")->from("tb_cliente")->where($args);
    	return $this->db->get()->row();
    }
    
    public function getListas($id,$lista=NULL){
        $this->db->select("*")->from("tb_lista")->where("cd_cliente",$id);
        if($lista != NULL){
            $this->db->where("cd_lista",$lista);
        }
        return $this->db->get()->result();
    }
    
    public function saveLista($args,$id){
        $args['cd_cliente'] = $id;
        $this->db->insert("tb_lista",$args);
    }
    
    public function updateLista($args){
        $this->db->where("cd_lista",$args['cd_lista']);
        unset($args['cd_lista']);
        $this->db->update("tb_lista",$args);
    }
    
    public function deleteLista($id){
        $this->db->where("cd_lista",$id);
        $this->db->delete("tb_assinantes");
        
        $this->db->where("cd_lista",$id);
        $this->db->delete("tb_lista");
        
    }
    
     public function getAssinantes($id,$assinante=NULL){
        $this->db->select("a.*,l.nm_lista")->from("tb_assinante as a")->join('tb_lista as l','a.cd_lista = l.cd_lista')->where("l.cd_cliente",$id)->order_by('email_assinante','asc');
        if($assinante != NULL){
            $this->db->where("a.cd_assinante",$assinante);
        }
        return $this->db->get()->result();
    }
    
    public function saveAssinante($args){
        $this->db->insert("tb_assinante",$args);
    }
    
    public function updateAssinante($args){
        $this->db->where("cd_assinante",$args['cd_assinante']);
        unset($args['cd_assinante']);
        $this->db->update("tb_assinante",$args);
    }
    
    public function deleteAssinante($id){
              
        $this->db->where("cd_assinante",$id);
        $this->db->delete("tb_assinante");
        
    }
}
