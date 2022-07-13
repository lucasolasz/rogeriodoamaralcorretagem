<?php

class Usuario
{

    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    //Realiza o login do usuário baseado no email e senha hash
    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM tb_usuario WHERE ds_email_usuario = :ds_email_usuario");

        $this->db->bind("ds_email_usuario", $email);

        if ($this->db->resultado()) {

            $resultado = $this->db->resultado();


            //Verifica o hash code
            if (password_verify($senha, $resultado->ds_senha)) {
                return $resultado;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Verifica se email existe
    public function checarEmailUsuario($dados)
    {
        $this->db->query("SELECT ds_email_usuario FROM tb_usuario WHERE ds_email_usuario = :ds_email_usuario");

        $this->db->bind("ds_email_usuario", $dados['txtEmail']);

        if ($this->db->resultado()) {
            return true;
        } else {
            return false;
        }
    }


    //Armazena usuário no banco
    public function armazenarUsuario($dados)
    {

        $this->db->query("INSERT INTO tb_usuario (ds_nome_usuario, ds_email_usuario, ds_senha, fk_cargo, fk_tipo_usuario) VALUES (:ds_nome_usuario, :ds_email_usuario, :ds_senha, :fk_cargo, :fk_tipo_usuario)");

        $this->db->bind("ds_nome_usuario", $dados['txtNome']);
        $this->db->bind("ds_email_usuario", $dados['txtEmail']);
        $this->db->bind("ds_senha", $dados['txtSenha']);
        $this->db->bind("fk_cargo", $dados['cboCargoUsuario']);
        $this->db->bind("fk_tipo_usuario", $dados['cboTipoUsuario']);


        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }

    //A principio, criada para retornar a linha com os dados do usuário específico
    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM tb_usuario WHERE id_usuario = :id_usuario");
        
        $this->db->bind("id_usuario", $id);

        return $this->db->resultado();
    }

    public function listarTipoUsuario(){
        $this->db->query("SELECT * FROM tb_tipo_usuario ORDER BY ds_tipo_usuario");
        
        return $this->db->resultados();
    }

    public function listarCargoUsuario(){
        $this->db->query("SELECT * FROM tb_cargo ORDER BY ds_cargo");
        
        return $this->db->resultados();
    }

}
