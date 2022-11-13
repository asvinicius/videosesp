<?php
class LoginModel extends CI_Model{
    
    public function search($usuario_nome, $usuario_senha){
        $this->db->where("usuario_nome", $usuario_nome);
        $this->db->where("usuario_senha", $usuario_senha);
        
        return $this->db->get("usuario")->row_array();
    }
}