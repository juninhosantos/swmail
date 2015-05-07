<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Junior
 */
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view("admin/login");
    }

    public function autenticar() {
        $this->load->model("admin_model", "admin");
        $usr = $this->admin->getUsuario();
        if (!empty($usr)) {
            $newdata = array(
                'username' => 'johndoe',
                'email' => 'johndoe@some-site.com',
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
        }
    }

}
