<?php

class Usuario {

    private $nome;
    private $senha;
    private $nivel;

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNivel() {
        return $this->nivel;
    }
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
}