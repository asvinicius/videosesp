<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        if ($this->isLogged()){
            redirect(base_url('welcome'));
        } else {
            $this->load->view('public/login');
        }
    }

    public function entrar() {
		if ($this->isLogged()){
			redirect(base_url('welcome'));
		} else {
			$this->load->model("LoginModel");
			
			$usuario_nome = $this->input->post("usuario_nome");
			$usuario_senha = $this->input->post("usuario_senha");
			
			$usuario = $this->LoginModel->search($usuario_nome, $usuario_senha);
			
			if($usuario){
                $session = array('logged' => TRUE);

                $this->session->set_userdata($session);

                redirect(base_url('login'));
            } else {
                echo "Seu login para ".$usuario_nome." falhou";
                return false;
            }
        }
    }
}