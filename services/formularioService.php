<?php
require_once __DIR__ . '/../repository/formularioRepository.php';

class formularioService {

    public static $instance;
 
    private function __construct() {
        //
    }
    
    //Creates a self instance of the class checking if it hasn't be already create
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new formularioRepository();
 
        return self::$instance;
    }

    function readAll() {
        $user = formularioRepository::getInstance()->readAll();
        return $user;
    }
    
    function insert() {
        if (!empty($_POST['cliente'])) {
            $data = $_POST['cliente'];
            $customer = new Formulario();
            $customer->setCorretor($data["'corretor'"]);
            $customer->setSegurado($data["'segurado'"]);
            $customer->setEmail($data["'email'"]);
            
            formularioRepository::getInstance()->insert($customer);
        }
    }
}