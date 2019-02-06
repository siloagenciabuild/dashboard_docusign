<?php

class Formulario {

    private $corretor;
    private $segurado;
    private $email;

    public function getCorretor() {
        return $this->corretor;
    }
    public function getSegurado() {
        return $this->segurado;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setCorretor($corretor) {
        $this->corretor = $corretor;
    }
    public function setSegurado($segurado) {
        $this->segurado = $segurado;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
}