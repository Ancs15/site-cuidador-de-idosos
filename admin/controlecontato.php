<?php

class ClasseContato{

    public $nomeContato;
    public $foneContato;
    public $emailContato;
    public $mensContato;

    public function Inserir(){

        $sql = "INSERT INTO tbl_contato(
        nome_contato,
        telefone_contato,
        email_contato,
        mensagem_contato
        ) VALUES(
        '". $this->nomeContato ."',
        '". $this->foneContato ."',
        '". $this->emailContato ."',
        '". $this->mensContato ."'
        );";

        require_once('conexao.php');

        $conexao = Conexao::LigarConexao();
        // Estático = chamar sem criar objeto

        $conexao->exec($sql);

    }


}


