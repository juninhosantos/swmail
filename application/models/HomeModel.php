<?php

class HomeModel extends CI_Model {
    public function getAllUsuarios(){
        $this->db->select("*")->from("usuarios")->order_by("nome","asc");
        return $this->db->get()->result();
    }
}
