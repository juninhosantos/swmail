<?php

class Cliente_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getUsuario($args){
        if(isset($args['ic_cliente_ativo'])) {
            $args['ic_cliente_ativo'] = 1;
        }

        if(isset($args['nm_senha_cliente'])) {
            $args['nm_senha_cliente'] = md5($args['nm_senha_cliente']);
        }


    	$this->db->select("*")->from("tb_cliente")->where($args);
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
        $this->db->delete("tb_assinante");
        
        $this->db->where("cd_lista",$id);
        $this->db->delete("tb_lista");
        
    }
    
    public function getAssinantes($id,$lista=NULL,$assinante=NULL){
        $this->db->select("a.*,l.nm_lista")->from("tb_assinante as a")->join('tb_lista as l','a.cd_lista = l.cd_lista')->where("l.cd_cliente",$id)->order_by('email_assinante','asc');
        if($assinante != NULL){
            $this->db->where("a.cd_assinante",$assinante);
        }

        if($lista != NULL) {
            $this->db->where("a.cd_lista",$lista);
        }
        return $this->db->get()->result();
    }

    public function checkDuplicado($email){
        $this->db->select("email_assinante")->from("tb_assinante")->like("email_assinante",$email);
        return $this->db->get()->num_rows();

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

    public function getCampanhas($usr){
        $query = $this->db->query("Select c.ic_status,c.cd_campanha,c.nm_campanha, c.nm_assunto,l.nm_lista, (SELECT count(*) FROM tb_relatorio WHERE ic_tipo_interacao = 1 and cd_campanha = c.cd_campanha) as qt_abertura, (SELECT count(*) FROM tb_relatorio WHERE ic_tipo_interacao = 2 and cd_campanha = c.cd_campanha) as qt_clique, (SELECT count(*) FROM tb_relatorio WHERE ic_tipo_interacao = 0 and cd_campanha = c.cd_campanha) as qt_enviados FROM tb_campanha as c, tb_lista as l WHERE c.cd_lista = l.cd_lista and c.cd_cliente = ".$usr);
        return $query->result();
    }

    public function salvarCampanha($args){
        $this->db->insert("tb_campanha",$args);
        return $this->db->insert_id();
    }

    public function duplicarCampanha($id){
        $this->db->query("INSERT INTO tb_campanha (nm_campanha,nm_assunto,nm_remetente,nm_email_remetente,ds_mensagem,cd_cliente,cd_lista,ic_status) SELECT nm_campanha,nm_assunto,nm_remetente,nm_email_remetente,ds_mensagem,cd_cliente,cd_lista,'0' FROM tb_campanha WHERE cd_campanha = ".$id);
        return $this->db->insert_id();

    }

    public function getCampanha($id){
        $this->db->select("*")->from("tb_campanha")->where("cd_campanha",$id);
        return $this->db->get()->result();
    }

    public function atualizarCampanha($args){
        $this->db->where("cd_campanha",$args['cd_campanha']);
        unset($args['cd_campanha']);
        $this->db->update("tb_campanha",$args);
    }

    public function deletarCampanha($id){
        $this->db->where("cd_campanha",$id);
        $this->db->delete("tb_relatorio");

        $this->db->where("cd_campanha",$id);
        $this->db->delete("tb_campanha");

    }

    public function salvarEnvio($assinante,$campanha){
        $this->db->insert("tb_relatorio",array('dt_interacao'=>date("Y-m-d H:i:s"),'ic_tipo_interacao'=>0,'cd_assinante'=>$assinante,'cd_campanha'=>$campanha));
    }

    public function getCota($user){
        $r = $this->db->query("SELECT (SELECT qt_cota_envio_cliente FROM tb_cliente where cd_cliente = ".$user.") as total, count(*) as enviado  FROM tb_relatorio as r, tb_campanha as c WHERE  c.cd_campanha = r.cd_campanha and c.cd_cliente = ".$user);
        return $r->row();
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

    public function insertRelatorio($tipo,$assinante,$campanha,$url=NULL){
        //$url = str_replace("http://","",$url);
        //$url = str_replace("https://","",$url);
        $this->db->insert("tb_relatorio",array('dt_interacao'=>strftime("%F %T"),'ic_tipo_interacao'=>$tipo,"cd_assinante"=>$assinante,"cd_campanha"=>$campanha,"nm_url_interacao"=>$url));
    }
}
