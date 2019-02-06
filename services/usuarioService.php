<?php
require_once __DIR__ . '/../repository/usuarioRepository.php';

class usuarioService {

    public function readAll() {
        $user = usuarioRepository::getInstance()->readAll();
        return $user;
    }
    
    public function insert() {
        if (!empty($_POST['cliente'])) {
            $data = $_POST['cliente'];
            $usuario = new Usuario();
            $usuario->setNome($data["'nome'"]);
            $usuario->setSenha($data["'senha'"]);
            $usuario->setNivel($data["'nivel'"]);
            
            usuarioRepository::getInstance()->insert($usuario);
        }
    }

    public function autUser($nome, $senha) {
        $usuario = usuarioRepository::getInstance()->autUser($nome, $senha);
        if ($usuario->getNome() == "") {
            return false;
        } else {
            return $usuario;
        }
    }

    public function validUser($nome) {
        $usuario = usuarioRepository::getInstance()->validUser($nome);
        if ($usuario->getNome() == "") {
            return false;
        } else {
            return $usuario;
        }
    }
}