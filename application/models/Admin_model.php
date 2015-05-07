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

    public function getClientes(){
    	$this->db->select("*")->from("tb_cliente");
    	return $this->db->get()->result();
    }
}
